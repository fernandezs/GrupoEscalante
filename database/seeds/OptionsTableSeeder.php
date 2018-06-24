<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('options')->delete();
        
        \DB::table('options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'padre' => NULL,
                'nombre' => 'Admin',
                'ruta' => NULL,
                'descripcion' => 'Opciones de administración',
                'icono_l' => 'fa-user-secret',
                'icono_r' => 'fa-angle-left',
                'orden' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'padre' => 1,
                'nombre' => 'Usuarios',
                'ruta' => 'admin/users',
                'descripcion' => 'Administración de usuarios',
                'icono_l' => 'fa-users',
                'icono_r' => '',
                'orden' => 2,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'padre' => 1,
                'nombre' => 'Opciones',
                'ruta' => 'admin/option',
                'descripcion' => 'Administración de las opciones del menu',
                'icono_l' => 'fa-circle-o',
                'icono_r' => '',
                'orden' => 4,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'padre' => 1,
                'nombre' => 'Roles',
                'ruta' => 'admin/rols',
                'descripcion' => 'Administración de los roles de los usuarios',
                'icono_l' => 'fa-expeditedssl',
                'icono_r' => '',
                'orden' => 5,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'padre' => 1,
                'nombre' => 'Configuraciones',
                'ruta' => 'admin/configurations',
                'descripcion' => NULL,
                'icono_l' => 'fa-wrench',
                'icono_r' => NULL,
                'orden' => 1,
                'created_at' => '2017-07-11 10:30:19',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'padre' => NULL,
                'nombre' => 'Notas',
                'ruta' => 'notas',
                'descripcion' => NULL,
                'icono_l' => 'fa-book',
                'icono_r' => NULL,
                'orden' => 5,
                'created_at' => '2017-11-07 16:38:35',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'padre' => NULL,
                'nombre' => 'Articulos',
                'ruta' => NULL,
                'descripcion' => 'Articulos del negocio',
                'icono_l' => 'fa-cubes',
                'icono_r' => 'fa-angle-left',
                'orden' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'padre' => 7,
                'nombre' => 'Listar todos los articulos',
                'ruta' => 'articulos',
                'descripcion' => 'Administración de usuarios',
                'icono_l' => 'fa-barcode',
                'icono_r' => '',
                'orden' => 2,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'padre' => 7,
                'nombre' => 'Categorías',
                'ruta' => 'categorias',
                'descripcion' => 'Administración de las categorias',
                'icono_l' => 'fa-th-large',
                'icono_r' => '',
                'orden' => 3,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'padre' => 7,
                'nombre' => 'Marcas',
                'ruta' => 'marcas',
                'descripcion' => 'Administración de las marcas',
                'icono_l' => 'fa-copyright',
                'icono_r' => '',
                'orden' => 4,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'padre' => NULL,
                'nombre' => 'Proveedores',
                'ruta' => 'proveedores',
                'descripcion' => 'Administración de las marcas',
                'icono_l' => 'fa-truck',
                'icono_r' => '',
                'orden' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'padre' => NULL,
                'nombre' => 'Reparaciones',
                'ruta' => NULL,
                'descripcion' => 'Administración de las reparaciones',
                'icono_l' => 'fa-calendar-check-o',
                'icono_r' => 'fa-angle-left',
                'orden' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'padre' => 12,
                'nombre' => 'Listar todas',
                'ruta' => 'reparaciones',
                'descripcion' => 'Administración de las reparaciones',
                'icono_l' => 'fa-calendar-minus-o',
                'icono_r' => '',
                'orden' => 1,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'padre' => 12,
                'nombre' => 'Estados',
                'ruta' => 'estados',
                'descripcion' => 'Administración de los estados',
                'icono_l' => 'fa-sitemap',
                'icono_r' => '',
                'orden' => 2,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'padre' => NULL,
                'nombre' => 'Deudas',
                'ruta' => 'deudas',
                'descripcion' => 'Administración de las deudas de los clientes',
                'icono_l' => 'fa-handshake-o',
                'icono_r' => '',
                'orden' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'padre' => NULL,
                'nombre' => 'Clientes',
                'ruta' => 'clientes',
                'descripcion' => 'Administración de los clientes del negocio',
                'icono_l' => 'fa-smile-o',
                'icono_r' => 'fa-angle-left',
                'orden' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'padre' => 16,
                'nombre' => 'Listar todos',
                'ruta' => 'clientes',
                'descripcion' => 'Lista los clientes del negocio',
                'icono_l' => 'fa-list-alt',
                'icono_r' => '',
                'orden' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'padre' => 16,
                'nombre' => 'Nuevo cliente',
                'ruta' => 'clientes/create',
                'descripcion' => 'Agrega un nuevo cliente',
                'icono_l' => 'fa-user-plus',
                'icono_r' => '',
                'orden' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'padre' => 1,
                'nombre' => 'Empleados',
                'ruta' => 'admin/empleados',
                'descripcion' => 'Administración de usuarios',
                'icono_l' => 'fa-user',
                'icono_r' => '',
                'orden' => 3,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'padre' => 7,
                'nombre' => 'Crear nuevo',
                'ruta' => 'articulos/create',
                'descripcion' => 'Agrega un nuevo articulo',
                'icono_l' => 'fa-plus',
                'icono_r' => '',
                'orden' => 1,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2017-11-07 16:42:44',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}