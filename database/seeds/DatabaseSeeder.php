<?php

use Illuminate\Database\Seeder;
use App\Models\Onibus;
use App\Models\Anel;
use App\Models\Evento;
use App\Models\Parada;
use App\Models\Logradouro;
use App\Models\Linha;

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
        $this->call('ParadaSeeder');
        $this->call('LogradouroSeeder');
        $this->call('LinhaSeeder');
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

class ParadaSeeder extends Seeder
{
    public function run()
    {
        DB::table('paradas')->delete();

        Parada::create(['cod_identificacao' => '0001', 'nome' => 'Parada 1', 'endereco_completo' => 'Teste']);
        Parada::create(['cod_identificacao' => '0002', 'nome' => 'Parada 2', 'endereco_completo' => 'Teste']);
        Parada::create(['cod_identificacao' => '0003', 'nome' => 'Parada 3', 'endereco_completo' => 'Teste']);
        Parada::create(['cod_identificacao' => '0004', 'nome' => 'Parada 4', 'endereco_completo' => 'Teste']);
        Parada::create(['cod_identificacao' => '0005', 'nome' => 'Parada 5', 'endereco_completo' => 'Teste']);
    }
}

class LogradouroSeeder extends Seeder
{
    public function run()
    {
        DB::table('logradouros')->delete();

        Logradouro::create(['nome' => 'Túnel da Abolição', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'Praça Agamenon Salazar', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'Rua Bruno Veloso', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'Rua da Aurora', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'Rua São Bento', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'Largo da Bica', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'Rua Macaíba', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
    }
}

class LinhaSeeder extends Seeder
{
    public function run()
    {
        DB::table('linhas')->delete();

        Linha::create(['nome' => 'Linha Teste 01', 'classificacao' => 'Circular']);
        Linha::create(['nome' => 'Linha Teste 02', 'classificacao' => 'Circular']);
        Linha::create(['nome' => 'Linha Teste 03', 'classificacao' => 'Circular']);
        Linha::create(['nome' => 'Linha Teste 05', 'classificacao' => 'Circular']);
        Linha::create(['nome' => 'Linha Teste 06', 'classificacao' => 'Circular']);
        Linha::create(['nome' => 'Linha Teste 07', 'classificacao' => 'Circular']);
        Linha::create(['nome' => 'Linha Teste 08', 'classificacao' => 'Circular']);

    }
}