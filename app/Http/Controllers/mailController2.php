<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coleta;

use Mail;
use DB;

class mailController2 extends Controller
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
        'endereco' => 'required',
        'pedido' => 'required',
      ]);
      $data = [
        'nome'=>$request->nome,
        'whatsapp'=>$request->whatsapp,
        'dia'=>$request->dia,
        'horario'=>$request->horario,
        'endereco'=>$request->endereco,
        'pedido'=>$request->pedido,
      ];

      Mail::send('mail.mail2', $data, function ($mensagem) use ($data) {
        $mensagem->from('agendamentos@labcortezmoreira.com.br');
        $mensagem->to('bruno@labcortezmoreira.com.br', 'Agendamento de Coleta');
        $mensagem->subject('Mensagem site.');
        $mensagem->attach($data['pedido']->getRealPath(),
                [
                    'as' => $data['pedido']->getClientOriginalName(),
                    'mime' => $data['pedido']->getClientMimeType(),
                ]);
      });
      $ultimo = DB::table('coleta')->orderBy('id','desc')->get();

      $agendamento = new Coleta;
      $agendamento->title          = $request->nome;
      $agendamento->celular         = $request->whatsapp;
      $agendamento->endereco         = $request->endereco;
      $agendamento->start_date = $request->dia." ".$request->horario;
      $agendamento->end_date = $request->dia." ".$request->horario;

      $agendamento->save();
      $agendamento->codigo = '000'.$agendamento->id.'COL';
      $agendamento->save();

        // return redirect()->back()->with('alert', 'E-mail enviado com sucesso !');
        return redirect()->back()->with('alert2','Data: '.$agendamento->start_date.' - '.'Codigo: '.$agendamento->codigo);

    }
}
