<?php

namespace Database\Seeders;

use App\Models\Tramo;
use Illuminate\Database\Seeder;

class TramoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tramo = new Tramo();

        $tramo->dia = 'Lunes';
        $tramo->hora_inicio = '10:30:00';
        $tramo->hora_fin = '11:00:00';
        $tramo->actividad_id = '1';
        $tramo->fecha_alta = '2021-02-26';
        $tramo->fecha_baja = '2021-03-30';

        $tramo->save();

        $tramo1 = new Tramo();

        $tramo1->dia = 'Martes';
        $tramo1->hora_inicio = '15:30:00';
        $tramo1->hora_fin = '17:15:00';
        $tramo1->actividad_id = '2';
        $tramo1->fecha_alta = '2021-02-26';
        $tramo1->fecha_baja = '2021-03-30';

        $tramo1->save();

        $tramo2 = new Tramo();

        $tramo2->dia = 'Miercoles';
        $tramo2->hora_inicio = '09:30:00';
        $tramo2->hora_fin = '10:30:00';
        $tramo2->actividad_id = '3';
        $tramo2->fecha_alta = '2021-02-26';
        $tramo2->fecha_baja = '2021-03-30';

        $tramo2->save();

        $tramo3 = new Tramo();

        $tramo3->dia = 'Jueves';
        $tramo3->hora_inicio = '11:30:00';
        $tramo3->hora_fin = '12:00:00';
        $tramo3->actividad_id = '4';
        $tramo3->fecha_alta = '2021-02-26';
        $tramo3->fecha_baja = '2021-03-30';

        $tramo3->save();

        $tramo4 = new Tramo();

        $tramo4->dia = 'Viernes';
        $tramo4->hora_inicio = '13:30:00';
        $tramo4->hora_fin = '14:00:00';
        $tramo4->actividad_id = '5';
        $tramo4->fecha_alta = '2021-02-26';
        $tramo4->fecha_baja = '2021-03-30';

        $tramo4->save();

        $tramo5 = new Tramo();

        $tramo5->dia = 'Sabado';
        $tramo5->hora_inicio = '14:30:00';
        $tramo5->hora_fin = '15:00:00';
        $tramo5->actividad_id = '2';
        $tramo5->fecha_alta = '2021-02-26';
        $tramo5->fecha_baja = '2021-03-30';

        $tramo5->save();
    }
}
