<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Premio;
use App\Models\InfoSite;
use Illuminate\Http\Request;

use Image;
use Storage;

class PremioController extends Controller
{
    public function index()
    {
      $premios = Premio::all();
      $infosite = InfoSite::find(1);

      return view('admin.premio.index', compact('premios','infosite'));
    }

    public function create()
    {
      return view('admin.premio.index');
    }

    public function infostore(Request $request)
    {
      $infosite = new InfoSite;
      $infosite->premios_texto = $request->premios_texto;

      $infosite->save();

      $request->session()->flash('success', 'Informações Cadastradas !');
      return redirect('admin/premios')->with('flash_message', 'Premio cadastrado com sucesso !');

    }

    public function infoupdate(Request $request, $id)
    {

      $requestData = $request->all();
      $infosite = InfoSite::findOrFail($id);
      $infosite->update($requestData);

      $request->session()->flash('success', 'Registro modificado com sucesso.');
      return redirect('admin/premios')->with('flash_message', 'Premio cadastrado com sucesso !');

    }


    public function store(Request $request)
    {
      $this->validate($request, array(
        'imagem' => 'sometimes|image|mimes:jpeg,png,jpg',
      ));

        $premios = new Premio;
        $premios->descricao  = $request->descricao;

        if ($request->hasFile('imagem')) {
          $image = $request->file('imagem');
          $filename = time() . '.' . $image->getClientOriginalName();
          $location = public_path('uploads/premio/' . $filename);
          Image::make($image)->save($location);
          $premios->imagem = $filename;
        }

        $premios->save();

        $request->session()->flash('success', 'Prêmio cadastrado com sucesso !');
        return redirect('admin/premios');
    }

    public function edit($id)
    {
      $premios = Premio::findOrFail($id);

      return view('admin.premio.edit', compact('premios'));
    }

    public function update(Request $request, $id)
    {
      $premios = Premio::find($id);
      $premios->fill($request->all());

      if ($request->hasFile('imagem')) {
        $image = $request->file('imagem');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/premio/' . $filename);
        Image::make($image)->save($location);
        if ($premios->imagem) {
          $oldFilename = $premios->imagem;
          Storage::delete('uploads/premio/'.$oldFilename);
        }
        $premios->imagem = $filename;
      }

      $premios->save();

      $request->session()->flash('success', 'Prêmio modificado com sucesso.');
      return redirect('admin/premios');
    }

    public function destroy($id)
    {
      $premios = Premio::find($id)->delete();
      return [response()->json("success"), redirect('admin/premios')];
    }
}
