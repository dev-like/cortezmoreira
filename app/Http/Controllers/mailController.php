<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;

use Mail;
use DB;

class mailController extends Controller
{
    public function index()
    {
        return view('front/corporativo');
    }

    public function post(Request $request)
    {

      $document = $request->file('document');

      $request->validate([
        'nome' => 'required',
        'whatsapp' => 'required',
        'dia' => 'required',
        'horario' => 'required',
        'pedido' => 'required',
      ]);
      $data = [
        'nome'=>$request->nome,
        'whatsapp'=>$request->whatsapp,
        'dia'=>$request->dia,
        'horario'=>$request->horario,
        'pedido'=>$request->pedido,
      ];

      Mail::send('mail.mail', $data, function ($mensagem) use ($data) {
        $mensagem->from('agendamentos@labcortezmoreira.com.br');
        $mensagem->to('bruno@labcortezmoreira.com.br', 'Agendamento de Exame');
        $mensagem->subject('Mensagem site.');
        $mensagem->attach($data['pedido']->getRealPath(),
                [
                    'as' => $data['pedido']->getClientOriginalName(),
                    'mime' => $data['pedido']->getClientMimeType(),
                ]);
      });

      $ultimo = DB::table('events')->orderBy('id','desc')->get();
      $agendamento = new Event;
      $agendamento->title          = $request->nome;
      $agendamento->celular         = $request->whatsapp;
      $agendamento->start_date = $request->dia." ".$request->horario;
      $agendamento->end_date = $request->dia." ".$request->horario;

      $agendamento->save();
      $agendamento->codigo = '000'.$agendamento->id.'EX';
      $agendamento->save();

        // return redirect()->back()->with('alert', 'E-mail enviado com sucesso !');
      return redirect()->back()->with('alert','Data: '.$agendamento->start_date.' - '.'Codigo: '.$agendamento->codigo);

    }
}
