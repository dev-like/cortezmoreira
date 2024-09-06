<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\InfoSite;
use Illuminate\Http\Request;

class InfoSiteController extends Controller
{
    public function index()
    {
      $infosite = InfoSite::get();
      $infosite = count($infosite) ? $infosite[0] : new InfoSite();

      return view('admin.infosite.index', ['infosite' => $infosite]);
    }

    public function create()
    {
      return view('admin.infosite.index');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(

      ));
      $requestData = $request->all();
      $infosite = InfoSite::create($requestData);

      $request->session()->flash('success', 'Informação cadastrada com sucesso.');
      return redirect('admin/infosite')->with('flash_message', 'Quem Somos adicionado!');
    }

    public function edit($id)
    {
      $infosite = InfoSite::findOrFail($id);
      return view('admin.infosite.edit', compact('infosite'));
    }

    public function update(Request $request, $id)
    {
      $requestData = $request->all();
      $infosite = InfoSite::findOrFail($id);
      $infosite->update($requestData);

      $request->session()->flash('success', 'Registro modificado com sucesso.');
      return redirect('admin/infosite')->with('flash_message', 'Quem somos alterado com sucesso !');
    }
}
