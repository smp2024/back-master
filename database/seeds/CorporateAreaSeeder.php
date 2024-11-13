<?php

use Illuminate\Database\Seeder;
use App\CorporateArea;

class CorporateAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CorporateArea::create([
            'icon' => '<i class="fal fa-newspaper"></i>',
            'name' => 'Logo y Descripción Corta',
            'slug' => 'logo-y-descripcion-corta',
            'orden_dash' => '1',

        ]);
        CorporateArea::create([
            'icon' => '<i class="far fa-cookie"></i>',
            'name' => 'Política de Cache',
            'slug' => 'politica-de-cache',
            'orden_dash' => '8',
        ]);
        CorporateArea::create([
            'icon' => '<i class="fal fa-money-check-edit"></i>',
            'name' => 'Aviso de Privacidad',
            'slug' => 'aviso-de-privacidad',
            'orden_dash' => '6',
        ]);
        CorporateArea::create([
            'icon' => '<i class="far fa-users-class"></i>',
            'name' => 'Condiciones de uso',
            'slug' => 'condiciones-de-uso',
            'orden_dash' => '9',

        ]);
        CorporateArea::create([
            'icon' => '<i class="fal fa-poll-h"></i>',
            'name' => 'Políticas Generales de Servicio',
            'slug' => 'politicas-generales-de-servicio',
            'orden_dash' => '7',
        ]);
        CorporateArea::create([
            'icon' => '<i class="fal fa-comment-alt-exclamation"></i>',
            'name' => 'Misión',
            'slug' => 'mision',
            'orden_dash' => '2',
        ]);
        CorporateArea::create([
            'icon' => '<i class="far fa-glasses-alt"></i>',
            'name' => 'Visión',
            'slug' => 'vision',
            'orden_dash' => '3',

        ]);
        CorporateArea::create([
            'icon' => '<i class="fal fa-users-crown"></i>',
            'name' => 'Nosotros',
            'slug' => 'nosotros',
            'orden_dash' => '4',
        ]);
        CorporateArea::create([
            'icon' => '<i class="fal fa-id-card"></i>',
            'name' => 'Contacto',
            'slug' => 'contacto',
            'orden_dash' => '5',
        ]);
    }
}

