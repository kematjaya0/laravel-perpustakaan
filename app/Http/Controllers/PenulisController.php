<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Description of PenulisController
 *
 * @author apple
 */
class PenulisController extends AbstractController
{
    public function index()
    {
        return view('penulis.index', [
            'data' => DB::table('penulis')->paginate(10)
        ]);
    }
    
    public function create(Request $request)
    {
        if (Request::METHOD_POST === $request->getMethod()) {
            $validator = [
                'nama' => 'required'
            ];
            $response = $this->handleRequest($request, $validator, function (Request $request) {
                return Penulis::create([
                    'nama' => $request->nama
                ]);
            });
            
            return $this->json($response);
        }
        
        return view('penulis.form', [
            'action' => route('penulis_create'),
            'penulis' => new Penulis()
        ]);
    }
    
    public function edit(Request $request, $id)
    {
        $penulis = Penulis::findOrFail($id);
        if (Request::METHOD_POST === $request->getMethod()) {
            $validator = [
                'nama' => 'required'
            ];
            $response = $this->handleRequest($request, $validator, function (Request $request) use ($penulis) {
                $penulis->update([
                    'nama' => $request->nama
                ]);
                
                return $penulis;
            });
            
            return $this->json($response);
        }
        
        return view('penulis.form', [
            'action' => route('penulis_edit', ['id' => $id]),
            'penulis' => $penulis
        ]);
    }
    
    public function remove($id)
    {
        $post = Penulis::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('penulis_index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        }
        
        return redirect()
            ->route('penulis_index')
            ->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
    }
}
