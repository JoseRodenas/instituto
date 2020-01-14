<?php

use Illuminate\Database\Seeder;
use App\Materia;

class MateriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::seedMateria();
    }

    private static function seedMateria()
    {
        Materia::truncate();
        foreach (self::$arrayMaterias as $materia) {
            $m = new Materia;
            $m->nombre = $materia;
            $m->save();
        }
    }

    private  static $arrayMaterias = array(
        'Sistemas informaticos',
        'Base de datos',
        'Programacion',
        'Entornos de desarrollo',
        'Formación y orientación laboral',
        'Empresa e iniciativa emprendedora',
        'Inglés técnico para desarrollo de aplicaciones web',
        'Lenguajes de marcas y sistemas de gestión de información',
        'Desarrollo web en entorno cliente',
        'Desarrollo web en entorno servidor',
        'Despliegue de aplicaciones web',
        'Diseño de interfaces web',
        'Proyecto de desarrollo de aplicaciones web',
        'Formación en centros de trabajo',
    );
}
