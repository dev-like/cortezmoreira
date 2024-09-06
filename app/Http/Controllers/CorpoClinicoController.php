<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\CorpoClinico;
use App\Models\InfoSite;
use Illuminate\Http\Request;
use Image;
use Storage;

class CorpoClinicoController extends Controller
{
    public function index()
    {
      $corpoclinico = CorpoClinico::all();
      $infosite = InfoSite::find(1);

      return view('admin.corpoclinico.index', compact('corpoclinico','infosite'));
    }

    public function create()
    {
      return view('admin.corpoclinico.index');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
        'imagem'    => 'sometimes|image|mimes:jpeg,png,jpg',
        'nome'      => 'required|max:150',
        'crf'       => 'required|max:45',
      ));

        $corpoclinico = new CorpoClinico;
        $corpoclinico->nome  = $request->nome;
        $corpoclinico->crf  = $request->crf;
        $corpoclinico->descricao  = $request->descricao;

        if ($request->hasFile('imagem')) {
          $image = $request->file('imagem');
          $filename = time() . '.' . $image->getClientOriginalName();
          $location = public_path('uploads/corpoclinico/' . $filename);
          Image::make($image)->save($location);
          $corpoclinico->imagem = $filename;
        }

        $corpoclinico->save();

        $request->session()->flash('success', 'Cadastrado com sucesso !');
        return redirect('admin/corpoclinico')->with('flash_message', 'Cadastrado com sucesso !');
    }

    public function infostore(Request $request)
    {
      $infosite = new InfoSite;
      $infosite->corpoclinico_texto = $request->corpoclinico_texto;

      $infosite->save();

      $request->session()->flash('success', 'Informações Cadastradas !');
      return redirect('admin/corpoclinico')->with('flash_message', 'Premio cadastrado com sucesso !');

    }

    public function infoupdate(Request $request, $id)
    {

      $requestData = $request->all();
      $infosite = InfoSite::findOrFail($id);
      $infosite->update($requestData);

      $request->session()->flash('success', 'Registro modificado com sucesso.');
      return redirect('admin/corpoclinico')->with('flash_message', 'Premio cadastrado com sucesso !');

    }


    public function edit($id)
    {
      $corpoclinico = CorpoClinico::findOrFail($id);

      return view('admin.corpoclinico.edit', compact('corpoclinico'));
    }

    public function update(Request $request, $id)
    {
      $corpoclinico = CorpoClinico::find($id);
      $corpoclinico->fill($request->all());

      if ($request->hasFile('imagem')) {
        $image = $request->file('imagem');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/corpoclinico/' . $filename);
        Image::make($image)->save($location);
        if ($corpoclinico->imagem) {
          $oldFilename = $corpoclinico->imagem;
          Storage::delete('uploads/corpoclinico/'.$oldFilename);
        }
        $corpoclinico->imagem = $filename;
      }

      $corpoclinico->save();
      $request->session()->flash('success', 'Corpo Clinico modificada com sucesso.');
      return redirect('admin/corpoclinico')->with('flash_message', 'CorpoClinico alterado com sucesso !');
    }

    public function destroy($id)
    {
      $corpoclinico = CorpoClinico::find($id)->delete();

      return [response()->json("success"), redirect('admin/corpoclinicos')];
    }
}
