<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Parceiro;
use Illuminate\Http\Request;

use Image;
use Storage;

class ParceiroController extends Controller
{
    public function index()
    {
      $parceiros = Parceiro::all();

      return view('admin.parceiro.index', compact('parceiros'));
    }

    public function create()
    {
      return view('admin.parceiro.index');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
        'imagem' => 'sometimes|image|mimes:jpeg,png,jpg',
      ));

        $parceiros = new Parceiro;
        $parceiros->texto  = $request->texto;

        if ($request->hasFile('imagem')) {
          $image = $request->file('imagem');
          $filename = time() . '.' . $image->getClientOriginalName();
          $location = public_path('uploads/parceiro/' . $filename);
          Image::make($image)->save($location);
          $parceiros->imagem = $filename;
        }

        $parceiros->save();

        $request->session()->flash('success', 'Parceiro cadastrado com sucesso !');
        return redirect('admin/parceiros')->with('flash_message', 'Parceiro cadastrado com sucesso !');
    }

    public function edit($id)
    {
      $parceiros = Parceiro::findOrFail($id);

      return view('admin.parceiro.edit', compact('parceiros'));
    }

    public function update(Request $request, $id)
    {
      $parceiros = Parceiro::find($id);
      $parceiros->fill($request->all());

      if ($request->hasFile('imagem')) {
        $image = $request->file('imagem');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/parceiro/' . $filename);
        Image::make($image)->save($location);
        if ($parceiros->imagem) {
          $oldFilename = $parceiros->imagem;
          Storage::delete('uploads/parceiro/'.$oldFilename);
        }
        $parceiros->imagem = $filename;
      }

      $parceiros->save();

      $request->session()->flash('success', 'Parceiro modificado com sucesso.');
      return redirect('admin/parceiros')->with('flash_message', 'Parceiro alterado com sucesso !');
    }

    public function destroy($id)
    {
      $parceiros = Parceiro::find($id)->delete();
      return [response()->json("success"), redirect('admin/parceiros')];
    }
}
