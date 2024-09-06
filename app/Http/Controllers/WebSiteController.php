<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\QuemSomos;
use App\Models\InfoSite;
use App\Models\Convenio;
use App\Models\Premio;
use App\Models\Parceiro;
use App\Models\Coleta;
use App\Models\CorpoClinico;
use App\Models\Unidade;
use App\Models\Event;
use App\Models\Banner;
use DB;

class WebSiteController extends Controller
{

    public function home()
    {
      $empresa = Empresa::find(1);
      $empresa->telefone = explode(',',$empresa->telefone);
      $infosite = InfoSite::find(1);

      $banners = Banner::all();
      $unidades = Unidade::all();
      $premios = Premio::all();
      $parceiros = Parceiro::all();

      return view('pages.index',compact('empresa','unidades','infosite','banners','premios','parceiros'));
    }
    public function quemsomos()
    {
      $empresa = Empresa::find(1);
      $infosite = InfoSite::find(1);

      $empresa->telefone = explode(',',$empresa->telefone);
      $quemsomos = QuemSomos::find(1);
      $empresa->page = 'quemsomos';

      $unidades = Unidade::all();

      return view('pages.quemsomos',compact('empresa','unidades','quemsomos','infosite'));
    }
    public function corpoclinico()
    {
      $empresa = Empresa::find(1);
      $infosite = InfoSite::find(1);

      $empresa->telefone = explode(',',$empresa->telefone);
      $empresa->page = 'corpoclinico';

      $unidades = Unidade::all();
      $clinicos = CorpoClinico::all();

      return view('pages.corpoclinico',compact('empresa','unidades','clinicos','infosite'));
    }
    public function resultados()
    {
      $empresa = Empresa::find(1);
      $infosite = InfoSite::find(1);

      $empresa->telefone = explode(',',$empresa->telefone);

      return view ('pages.resultados',compact('empresa','infosite'));
    }
    public function pagenotfound()
    {
      $empresa = Empresa::find(1);
      $infosite = InfoSite::find(1);

      $empresa->telefone = explode(',',$empresa->telefone);
      $empresa->page = 'corpoclinico';

      $unidades = Unidade::all();
      $clinicos = CorpoClinico::all();

      return view('pages.pagenotfound',compact('empresa','unidades','clinicos','infosite'));
    }
    public function convenios()
    {
      $empresa = Empresa::find(1);
      $infosite = InfoSite::find(1);

      $empresa->telefone = explode(',',$empresa->telefone);
      $empresa->page = 'convenios';

      $convenios = Convenio::all();
      $unidades = Unidade::all();

      return view('pages.convenios',compact('empresa','unidades','convenios','infosite'));
    }
    public function agendamento()
    {
      $empresa = Empresa::find(1);
      $infosite = InfoSite::find(1);

      $empresa->telefone = explode(',',$empresa->telefone);
      $empresa->page = 'a';

      $convenios = Convenio::all();
      $unidades = Unidade::all();

      return view('pages.agendamentos',compact('empresa','unidades','convenios','infosite'));
    }
    public function cadastroAgendamento(Request $request)
    {
      $empresa = Empresa::find(1);
      $empresa->telefone = explode(',',$empresa->telefone);
      $infosite = InfoSite::find(1);

      $banners = Banner::all();
      $unidades = Unidade::all();
      $premios = Premio::all();
      $parceiros = Parceiro::all();
      $ultimo = DB::table('events')->orderBy('id','desc')->get();

        $this->validate($request, array(
        'nome'                => 'required|max:225',
        'whatsapp'            => 'required|max:50',
        ));

        $agendamento = new Event;
        $agendamento->title          = $request->nome;
        $agendamento->celular         = $request->whatsapp;
        $agendamento->start_date = $request->dia." ".$request->horario;
        $agendamento->end_date = $request->dia." ".$request->horario;

        $agendamento->save();
        $agendamento->codigo = '000'.$agendamento->id.'EX';
        $agendamento->save();


        return redirect()->back()->with('alert','Data: '.$agendamento->start_date.' - '.'Codigo: '.$agendamento->codigo);
    }
    public function cadastroColeta(Request $request)
    {
      $empresa = Empresa::find(1);
      $empresa->telefone = explode(',',$empresa->telefone);
      $infosite = InfoSite::find(1);

      $banners = Banner::all();
      $unidades = Unidade::all();
      $premios = Premio::all();
      $parceiros = Parceiro::all();

        $this->validate($request, array(
        'nome'                => 'required|max:225',
        'whatsapp'            => 'required|max:50',
        ));

        $agendamento = new Coleta;
        $agendamento->title          = $request->nome;
        $agendamento->celular         = $request->whatsapp;
        $agendamento->endereco         = $request->endereco;
        $agendamento->start_date = $request->dia." ".$request->horario;
        $agendamento->end_date = $request->dia." ".$request->horario;

        $agendamento->save();


        return redirect()->back()->with('alert2', 'Pedido enviado com sucesso !');
    }

}
