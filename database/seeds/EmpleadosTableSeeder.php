<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('empleados')->delete();
        
        \DB::table('empleados')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'SISTEMA',
                'fecha_ingreso' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            )
        ));
    }
}
