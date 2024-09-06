<?php
namespace App\Providers;
use App\User;

use App\Models\Premio;
use App\Models\Unidade;
use App\Models\Empresa;
use App\Models\Parceiro;
use App\Models\Convenio;
use App\Models\CorpoClinico;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);

        //Tabela da Empresa
        Empresa::saved(function ($dados) {
            DB::table('logs')->insert([
                'user' => \Auth::user()->nome,
                'descricao' => $dados,
                'acoes' => 'Editou as informações da Empresa',
                'date' => $dados->updated_at
            ]);
        });
        //Tabela Unidade
        Unidade::saved(function ($dados) {
          $msg = ($dados->created_at == $dados->updated_at) ? 'Adicionou' : 'Editou';
          $date = ($dados->created_at == $dados->updated_at) ? $dados->created_at : $dados->updated_at;
              DB::table('logs')->insert([
                  'user' => \Auth::user()->nome,
                  'descricao' => $dados,
                  'acoes' =>$msg.' a unidade da rua"'.$dados->rua.'"',
                  'date' => $date
              ]);
          });
        Unidade::deleted(function ($dados) {
            DB::table('logs')->insert([
                'user' => \Auth::user()->nome,
                'descricao' => $dados,
                'acoes' => 'Deletou a unidade da rua "'.$dados->rua.'"',
                'date' => $dados->deleted_at
            ]);
        });
        //Tabela Premio
        Premio::saved(function ($dados) {
          $msg = ($dados->created_at == $dados->updated_at) ? 'Adicionou' : 'Editou';
          $date = ($dados->created_at == $dados->updated_at) ? $dados->created_at : $dados->updated_at;
              DB::table('logs')->insert([
                  'user' => \Auth::user()->nome,
                  'descricao' => $dados,
                  'acoes' =>$msg.' o parceiro "'.$dados->nome.'"',
                  'date' => $date
              ]);
          });
        Premio::deleted(function ($dados) {
            DB::table('logs')->insert([
                'user' => \Auth::user()->nome,
                'descricao' => $dados,
                'acoes' => 'Deletou o parceiro "'.$dados->nome.'"',
                'date' => $dados->deleted_at
            ]);
        });
        //Tabela Parceiro
        Parceiro::saved(function ($dados) {
          $msg = ($dados->created_at == $dados->updated_at) ? 'Adicionou' : 'Editou';
          $date = ($dados->created_at == $dados->updated_at) ? $dados->created_at : $dados->updated_at;
              DB::table('logs')->insert([
                  'user' => \Auth::user()->nome,
                  'descricao' => $dados,
                  'acoes' =>$msg.' o parceiro "'.$dados->id.'"',
                  'date' => $date
              ]);
          });
        Parceiro::deleted(function ($dados) {
            DB::table('logs')->insert([
                'user' => \Auth::user()->nome,
                'descricao' => $dados,
                'acoes' => 'Deletou o parceiro "'.$dados->id.'"',
                'date' => $dados->deleted_at
            ]);
        });
        //Tabela Convenio
        Convenio::saved(function ($dados) {
          $msg = ($dados->created_at == $dados->updated_at) ? 'Adicionou' : 'Editou';
          $date = ($dados->created_at == $dados->updated_at) ? $dados->created_at : $dados->updated_at;
              DB::table('logs')->insert([
                  'user' => \Auth::user()->nome,
                  'descricao' => $dados,
                  'acoes' =>$msg.' o convenio "'.$dados->descricao.'"',
                  'date' => $date
              ]);
          });
        Convenio::deleted(function ($dados) {
            DB::table('logs')->insert([
                'user' => \Auth::user()->nome,
                'descricao' => $dados,
                'acoes' => 'Deletou o convenio "'.$dados->descricao.'"',
                'date' => $dados->deleted_at
            ]);
        });
        //Tabela Corpo Clinico
        CorpoClinico::saved(function ($dados) {
          $msg = ($dados->created_at == $dados->updated_at) ? 'Adicionou' : 'Editou';
          $date = ($dados->created_at == $dados->updated_at) ? $dados->created_at : $dados->updated_at;
              DB::table('logs')->insert([
                  'user' => \Auth::user()->nome,
                  'descricao' => $dados,
                  'acoes' =>$msg.' o clinico "'.$dados->nome.'"',
                  'date' => $date
              ]);
          });
        CorpoClinico::deleted(function ($dados) {
            DB::table('logs')->insert([
                'user' => \Auth::user()->nome,
                'descricao' => $dados,
                'acoes' => 'Deletou o clinico "'.$dados->nome.'"',
                'date' => $dados->deleted_at
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
