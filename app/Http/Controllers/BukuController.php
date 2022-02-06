<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penulis;
use App\Http\Controllers\AbstractController;

/**
 * Description of BukuController
 *
 * @author apple
 */
class BukuController extends AbstractController 
{
    public function index()
    {
        return view('buku.index', [
            'data' => Buku::with(['penulis'])->paginate(10)
        ]);
    }
    
    public function create(Request $request)
    {
        $this->authorize('super');
        if (Request::METHOD_POST === $request->getMethod()) {
            $validator = [
                'isbn' => 'required',
                'judul' => 'required',
                'deskripsi' => 'required',
                'tahun' => 'required',
                'penulis_id' => 'required',
                'stok' => 'required',
                'image' => 'file|image|max:1024'
            ];
            $response = $this->handleRequest($request, $validator, function (Request $request) {
                $image = (null !== $request->file('image')) ? $request->file('image')->store("book") : null;
                
                return Buku::create([
                    'isbn' => $request->isbn,
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'tahun' => $request->tahun,
                    'penulis_id' => $request->penulis_id,
                    'stok' => $request->stok,
                    'image' => $image
                ]);
            });
            
            return $this->json($response);
        }
        
        return view('buku.form', [
            'action' => route('buku_create'),
            'object' => new Buku(),
            'penulis' => Penulis::all()
        ]);
    }
    
    public function show($id)
    {
        return view('buku.show', [
            'buku' => Buku::findOrFail($id)
        ]);
    }
    
    public function edit(Request $request, $id)
    {
        $this->authorize('super');        
        $object = Buku::findOrFail($id);
        if (Request::METHOD_POST === $request->getMethod()) {
            $validator = [
                'isbn' => 'required',
                'judul' => 'required',
                'deskripsi' => 'required',
                'tahun' => 'required',
                'penulis_id' => 'required',
                'stok' => 'required',
                'image' => 'file|image|max:1024'
            ];
            $response = $this->handleRequest($request, $validator, function (Request $request) use ($object) {
                $image = (null !== $request->file('image')) ? $request->file('image')->store("book") : null;
                
                $object->update([
                    'isbn' => $request->isbn,
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'tahun' => $request->tahun,
                    'penulis_id' => $request->penulis_id,
                    'stok' => $request->stok,
                    'image' => $image
                ]);
                
                return $object;
            });
            
            return $this->json($response);
        }
        
        return view('buku.form', [
            'action' => route('buku_edit', ['id' => $id]),
            'object' => $object,
            'penulis' => Penulis::all()
        ]);
    }
    
    public function remove($id)
    {
        $this->authorize('super');
        $object = Buku::findOrFail($id);
        $object->delete();

        if ($object) {
            return redirect()
                ->route('buku_index')
                ->with([
                    'success' => 'data has been deleted successfully'
                ]);
        }
        
        return redirect()
            ->route('buku_index')
            ->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
    }
}
