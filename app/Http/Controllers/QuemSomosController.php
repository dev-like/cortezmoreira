<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\QuemSomos;
use Illuminate\Http\Request;
use Image;
use Storage;

class QuemSomosController extends Controller
{
    public function index()
    {
      $quemsomos = QuemSomos::get();
      $quemsomos = count($quemsomos) ? $quemsomos[0] : new QuemSomos();

      return view('admin.quemsomos.index', ['quemsomos' => $quemsomos]);
    }

    public function create()
    {
      return view('admin.quemsomos.index');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
        'imagem'    => 'sometimes|image|mimes:jpeg,png,jpg',
      ));

      $quemsomos = new QuemSomos;
      $quemsomos->texto  = $request->texto;

      if ($request->hasFile('imagem')) {
        $image = $request->file('imagem');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/quemsomos/' . $filename);
        Image::make($image)->save($location);
        $quemsomos->imagem = $filename;
      }

      $quemsomos->save();

      $request->session()->flash('success', 'Quem somos cadastrado com sucesso.');
      return redirect('admin/quemsomos')->with('flash_message', 'Quem Somos adicionado!');
    }

    public function edit($id)
    {
      $quemsomos = QuemSomos::findOrFail($id);
      return view('admin.quemsomos.edit', compact('quemsomos'));
    }

    public function update(Request $request, $id)
    {
      $quemsomos = QuemSomos::find($id);
      $quemsomos->fill($request->all());

      if ($request->hasFile('imagem')) {
        $image = $request->file('imagem');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/quemsomos/' . $filename);
        Image::make($image)->save($location);
        if ($quemsomos->imagem) {
          $oldFilename = $quemsomos->imagem;
          Storage::delete('uploads/quemsomos/'.$oldFilename);
        }
        $quemsomos->imagem = $filename;
      }

      $quemsomos->save();

      $request->session()->flash('success', 'Registro modificado com sucesso.');
      return redirect('admin/quemsomos')->with('flash_message', 'Quem somos alterado com sucesso !');
    }
}
