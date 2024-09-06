<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         'id' => 1,
         'nome' => 'Like Admin',
         'email' => 'dev@likepublicidade.com',
         'password' => bcrypt('admin'),
         'nivel' => 1,
       ]);
        DB::table('empresa')->insert([
         'id' => 1,
         'nomefantasia' => 'Laboratório Cortez Moreira',
         'telefone' => '(99) 3524-3600',
         'email' => 'contato@labcortezmoreira.com.br',
         'endereco' => 'Rua Piauí, 882 - Centro Imperatriz - MA',
         'instagram' => 'https://www.instagram.com/labcortezmoreira/',
         'facebook' => 'https://www.facebook.com/labcortezmoreira/',
       ]);        
    }
}
