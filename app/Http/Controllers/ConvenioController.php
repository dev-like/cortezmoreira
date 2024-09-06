<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Convenio;
use App\Models\InfoSite;
use Illuminate\Http\Request;

use Image;
use Storage;

class ConvenioController extends Controller
{
    public function index()
    {
      $convenios = Convenio::all();
      $infosite = InfoSite::find(1);

      return view('admin.convenio.index', compact('convenios','infosite'));
    }

    public function create()
    {
      return view('admin.convenio.index');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
        'descricao' => 'required',
      ));

        $convenios = new Convenio;
        $convenios->descricao  = $request->descricao;

        $convenios->save();

        $request->session()->flash('success', 'Convênio cadastrado com sucesso !');
        return redirect('admin/convenios')->with('flash_message', 'Convenio cadastrado com sucesso !');
    }

    public function infostore(Request $request)
    {
      $infosite = new InfoSite;
      $infosite->convenio_texto = $request->convenio_texto;

      $infosite->save();

      $request->session()->flash('success', 'Informações Cadastradas !');
      return redirect('admin/convenios')->with('flash_message', 'Premio cadastrado com sucesso !');
    }

    public function infoupdate(Request $request, $id)
    {

      $requestData = $request->all();
      $infosite = InfoSite::findOrFail($id);
      $infosite->update($requestData);

      $request->session()->flash('success', 'Registro modificado com sucesso.');
      return redirect('admin/convenios')->with('flash_message', 'Premio cadastrado com sucesso !');
    }

    public function edit($id)
    {
      $convenios = Convenio::findOrFail($id);

      return view('admin.convenio.edit', compact('convenios'));
    }

    public function update(Request $request, $id)
    {
      $convenios = Convenio::find($id);
      $convenios->fill($request->all());

      $convenios->save();

      $request->session()->flash('success', 'Convênio modificado com sucesso.');
      return redirect('admin/convenios')->with('flash_message', 'Convenio alterado com sucesso !');
    }

    public function destroy($id)
    {
      $convenios = Convenio::find($id)->delete();
      return [response()->json("success"), redirect('admin/convenios')];
    }
}
