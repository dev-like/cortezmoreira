<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function index()
    {
      $unidades = Unidade::all();
      return view('admin.unidade.index', ['unidades' => $unidades]);
    }

    public function create()
    {
      return view('admin.unidade.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
        'rua'      => 'required|max:200',
        'bairro'   => 'required|max:150',
        'numero'   => 'required|max:50',
      ));
        $requestData = $request->all();
        $unidades = Unidade::create($requestData);

        $request->session()->flash('success', 'Unidade cadastrada com sucesso !');
        return redirect('admin/unidades');
    }

    public function edit($id)
    {
      $unidade = Unidade::findOrFail($id);

      return view('admin.unidade.edit', compact('unidade'));
    }

    public function update(Request $request, $id)
    {
      $requestData = $request->all();
      $unidades = Unidade::findOrFail($id);
      $unidades->update($requestData);

      $request->session()->flash('success', 'Unidade modificada com sucesso.');
      return redirect('admin/unidades');
    }

    public function destroy($id)
    {
      $unidades = Unidade::find($id)->delete();

      return [response()->json("success"), redirect('admin/unidades')];
    }
}
