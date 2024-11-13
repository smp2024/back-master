<?php

use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::created([
            'name' => 'Galería',
            'slug' => 'galeria',
            'description' => '<p><Como resultado de un programa de limpieza de playas , el fotógrafo Alfredo Blásquez ha documentado una colección de objetos de la vida cotidiana , que provienen de diferentes puntos del planeta . Las corrientes marítimas arrojan objetos a miles de kilometros de distancia dañando la flora y fauna del planeta</p>',
            'path' => '/Gallery',
        ]);

        Section::created([
            'name' => 'Justificación',
            'slug' => 'justificacion',
            'description' => '<p>CIUDAD OCÉANO es una plataforma de comunicación creada para que, a través del arte y la información, transformemos nuestros hábitos de consumo mejorando la relación con el medio ambiente</p>',
            'path' => '/Justify',
        ]);

        Section::created([
            'name' => 'Detalles',
            'slug' => 'detalles',
            'description' => '<p>El plástico ha sido un solución práctica para la sociedad humana.</p>
            <p>El día de hoy el plástico se encuentra en todos lados.</p>
            <p>Los hábitos que tenemos en las ciudades, impactan los océanos.</p>
            <p>Es tiempo de re-educarnos en el manejo de plásticos de un solo uso</p>',
            'text' => 'Cada año llegan al océano cerca de 9 toneladas de residuos.',
            'path' => '/Details',
        ]);

        Section::created([
            'name' => 'Video',
            'slug' => 'video',
            'description' => '<iframe id="vi" width="1000" height="500" src="https://www.youtube.com/embed/9xDSC2lZVcM" title="Ciudad Océano" frameborder="0"  ></iframe>',
            'path' => '/Video',
        ]);
    }
}
