<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ConfigurationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('configurations')->delete();
        
        \DB::table('configurations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'app.name',
                'value' => 'Grupo Escalante',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'direccion',
                'value' => 'Ingrese la direccion del local desde el menu configuraciones',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'localidad',
                'value' => 'Ingrese la localidad del local desde el menu configuraciones',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'telefono',
                'value' => 'Ingrese el numero de telefono del local desde el menu configuraciones',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'email',
                'value' => 'Ingrese el email del local desde el menu configuraciones',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'dolar',
                'value' => '29',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL,
            )

        ));
        
        
    }
}