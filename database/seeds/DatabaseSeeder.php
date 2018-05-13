<?php

use Illuminate\Database\Seeder;
use App\Models\Onibus;
use App\Models\Anel;
use App\Models\Evento;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('OnibusSeeder');
        $this->call('AnelSeeder');
        $this->call('EventoSeeder');
    }
}

class OnibusSeeder extends Seeder
{
    public function run()
    {
        DB::table('onibus')->delete();

        Onibus::create(['nome' => 'Ônibus 01', 'marca' => 'Mercedes Benz']);
        Onibus::create(['nome' => 'Ônibus 02', 'marca' => 'Volkswagen']);
        Onibus::create(['nome' => 'Ônibus 03', 'marca' => 'Scania']);
        Onibus::create(['nome' => 'Ônibus 04', 'marca' => 'Volkswagen']);
        Onibus::create(['nome' => 'Ônibus 05', 'marca' => 'Scania']);
        Onibus::create(['nome' => 'Ônibus 06', 'marca' => 'Volkswagen']);
    }
}

class AnelSeeder extends Seeder
{
    public function run()
    {
        DB::table('aneis')->delete();

        Anel::create(['nome' => 'Tarifa A', 'tarifa' => '3.20']);
        Anel::create(['nome' => 'Tarifa B', 'tarifa' => '4.40']);
        Anel::create(['nome' => 'Tarifa D', 'tarifa' => '3.45']);
        Anel::create(['nome' => 'Tarifa G', 'tarifa' => '2.10']);
    }
}

class EventoSeeder extends Seeder
{
    public function run()
    {
        DB::table('eventos')->delete();

        Evento::create(['nome' => 'Engarrafamento', 'duracao' => '25']);
        Evento::create(['nome' => 'Chuva intensa', 'duracao' => '20']);
        Evento::create(['nome' => 'Acidente na pista', 'duracao' => '27']);
        Evento::create(['nome' => 'Acidente grave na pista', 'duracao' => '40']);
        Evento::create(['nome' => 'Manifestação', 'duracao' => '50']);
    }
}
