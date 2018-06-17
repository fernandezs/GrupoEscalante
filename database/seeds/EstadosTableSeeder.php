<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('estados')->delete();
        
        \DB::table('estados')->insert(array (
            0 => 
            array (
                'id' => 1,
                'estado' => 'INICIADO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'estado' => 'EN TALLER',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'estado' => 'EN GARANTIA OFICIAL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'estado' => 'CON FALTANTES',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'estado' => 'ENTREGADO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            )
        ));
    }
}
