<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actividad = new Activity();

        $actividad->nombre = 'Zumba';
        $actividad->descripcion = 'Baile';
        $actividad->aforo = '20';

        $actividad->save();

        $actividad1 = new Activity();

        $actividad1->nombre = 'Pilates';
        $actividad1->descripcion = 'Ejercicio';
        $actividad1->aforo = '10';

        $actividad1->save();

        $actividad2 = new Activity();

        $actividad2->nombre = 'Bicicleta';
        $actividad2->descripcion = 'Estatica';
        $actividad2->aforo = '30';

        $actividad2->save();

        $actividad3 = new Activity();

        $actividad3->nombre = 'Pesas';
        $actividad3->descripcion = 'En la maquina';
        $actividad3->aforo = '5';

        $actividad3->save();

        $actividad4 = new Activity();

        $actividad4->nombre = 'BodyCombat';
        $actividad4->descripcion = 'Mucha energia';
        $actividad4->aforo = '15';

        $actividad4->save();

        $actividad5 = new Activity();

        $actividad5->nombre = 'Aerobic';
        $actividad5->descripcion = 'Baile movidito';
        $actividad5->aforo = '30';

        $actividad5->save();
    }
}
