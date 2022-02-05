<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\AbstractController;

/**
 * Description of UserController
 *
 * @author apple
 */
class UserController extends AbstractController 
{
    public function index()
    {
        return view('user.index', [
            'data' => DB::table('users')->paginate(10)
        ]);
    }
    
    public function create(Request $request)
    {
        if (Request::METHOD_POST === $request->getMethod()) {
            $validator = [
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'password' => 'required'
            ];
            $response = $this->handleRequest($request, $validator, function (Request $request) {
                return User::create([
                    'name' => $request->name,
                    'email' => trim($request->email),
                    'role' => $request->role,
                    'password' => bcrypt(trim($request->password))
                ]);
            });
            
            return $this->json($response);
        }
        
        return view('user.form', [
            'action' => route('user_create'),
            'object' => new User(),
            'roles' => User::getRoles()
        ]);
    }
    
    public function edit(Request $request, $id)
    {
        $object = User::findOrFail($id);
        if (Request::METHOD_POST === $request->getMethod()) {
            $validator = [
                'name' => 'required',
                'email' => 'required',
                'role' => 'required'
            ];
            $response = $this->handleRequest($request, $validator, function (Request $request) use ($object) {
                $object->update([
                    'name' => $request->name,
                    'email' => trim($request->email),
                    'role' => $request->role,
                ]);
                
                return $object;
            });
            
            return $this->json($response);
        }
        
        return view('user.form', [
            'action' => route('user_edit', ['id' => $id]),
            'object' => $object,
            'roles' => User::getRoles()
        ]);
    }
    
    public function remove($id)
    {
        $object = User::findOrFail($id);
        $object->delete();

        if ($object) {
            return redirect()
                ->route('user_index')
                ->with([
                    'success' => 'data has been deleted successfully'
                ]);
        }
        
        return redirect()
            ->route('user_index')
            ->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
    }
}
