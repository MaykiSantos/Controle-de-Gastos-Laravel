<?php

use App\DespesaCategoria;
use App\ReceitaCategoria;
use App\ReservaCategoria;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriaCategorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DespesaCategoria::query()->insert([
            ['categoria'=>'Gás'],
            ['categoria'=>'Água'],
            ['categoria'=>'Energia'],
            ['categoria'=>'Aluguel'],
            ['categoria'=>'Super Mercado'],
            ['categoria'=>'Internet'],
            ['categoria'=>'Compra Eletrodomestico'],
            ['categoria'=>'Tv a Cabo'],
            ['categoria'=>'Streaming'],
            ['categoria'=>'Saude'],
            ['categoria'=>'Outros']
            ]);

        ReceitaCategoria::query()->insert([
            ['categoria'=>'Salario'],
            ['categoria'=>'Presente'],
            ['categoria'=>'Bonus'],
            ['categoria'=>'Reembolso']
        ]);

        ReservaCategoria::query()->insert([
            ['categoria'=>'Banco'],
            ['categoria'=>'Outros']
        ]);
    }
}
