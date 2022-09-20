<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // instanciando o objeto
        $f = new Fornecedor();
        $f->nome = 'Fruki';
        $f->site = 'frukaoetop.com.br';
        $f->uf = 'SP';
        $f->email = 'contato@frukaoetop.com.br';
        $f->save();

        // o método create (atenção no atributo fillable)
        Fornecedor::create([
            'nome' => 'Guarana',
            'site' => 'guarana.com.br',
            'uf' => 'DF',
            'email' => 'contato@guarana.com.br'
        ]);

        // insert
        DB::table('fornecedores')->insert([
            'nome' => 'Kibon',
            'site' => 'kibon.com.br',
            'uf' => 'RJ',
            'email' => 'contato@kibon.com.br'
        ]);
    }
}
