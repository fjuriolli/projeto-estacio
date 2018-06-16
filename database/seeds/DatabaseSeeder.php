<?php

use Illuminate\Database\Seeder;
use App\Models\Onibus;
use App\Models\Anel;
use App\Models\Evento;
use App\Models\Parada;
use App\Models\Logradouro;
use App\Models\Linha;
use App\Models\Itinerario;

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
        $this->call('LogradouroParadaSeeder');
        $this->call('ItinerarioSeeder');
        $this->call('ItinerarioLogradouroSeeder');
        $this->call('OnibusLinhaSeeder');
    }
}

class OnibusSeeder extends Seeder
{
    public function run()
    {
        DB::table('onibus')->delete();

        Onibus::create(['nome' => 'Ônibus 01 - Aeroporto (opcional)', 'marca' => 'Mercedes Benz']);
        Onibus::create(['nome' => 'Ônibus 02 - Aeroporto (opcional)', 'marca' => 'Volkswagen']);
        Onibus::create(['nome' => 'Ônibus 03 - Jardim São Paulo (Abdias de Carvalho)', 'marca' => 'Scania']);
        Onibus::create(['nome' => 'Ônibus 04 - Jardim São Paulo (Abdias de Carvalho)', 'marca' => 'Volkswagen']);
    }
}

class LinhaSeeder extends Seeder
{
    public function run()
    {
        DB::table('linhas')->delete();

        Linha::create(['nome' => 'Jardim São Paulo (Abdias de Carvalho)', 'classificacao' => 'Circular', 'anel_id' => 1]);
        Linha::create(['nome' => 'Aeroporto (Opcional)', 'classificacao' => 'Circular', 'anel_id' => 2]);
    }   
}

class OnibusLinhaSeeder extends Seeder
{
    public function run()
    {
        DB::table('linha_onibus')->delete();

        DB::table('linha_onibus')->insert(array(
            array('linha_id' => 1, 'onibus_id' => 3),
            array('linha_id' => 1, 'onibus_id' => 4),
            array('linha_id' => 2, 'onibus_id' => 1),
            array('linha_id' => 2, 'onibus_id' => 2)
        ));
    }   
}

class AnelSeeder extends Seeder
{
    public function run()
    {
        DB::table('aneis')->delete();

        Anel::create(['nome' => 'Tarifa A', 'tarifa' => '3.25']);
        Anel::create(['nome' => 'Tarifa B', 'tarifa' => '4.45']);
        Anel::create(['nome' => 'Tarifa D', 'tarifa' => '3.45']);
        Anel::create(['nome' => 'Tarifa G', 'tarifa' => '2.15']);
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

        Parada::create(['cod_identificacao' => '001', 'nome' => 'Parada 1 - Estação Tejipió', 'endereco_completo' => 'Estação de Metrô Tejipió']);
        Parada::create(['cod_identificacao' => '002', 'nome' => 'Parada 2 - Estação Tejipió', 'endereco_completo' => 'Estação de Metrô Tejipió']);
        Parada::create(['cod_identificacao' => '003', 'nome' => 'Parada 3 - Rua Padre Ibiapina', 'endereco_completo' => 'Rua Padre Ibiapina']);
        Parada::create(['cod_identificacao' => '004', 'nome' => 'Parada 4 - Rua Padre Ibiapina', 'endereco_completo' => 'Rua Padre Ibiapina']);
        Parada::create(['cod_identificacao' => '005', 'nome' => 'Parada 5 - Rua Padre Ibiapina', 'endereco_completo' => 'Rua Padre Ibiapina']);
        Parada::create(['cod_identificacao' => '006', 'nome' => 'Parada 6 - Rua Padre Ibiapina', 'endereco_completo' => 'Rua Padre Ibiapina']);
        Parada::create(['cod_identificacao' => '007', 'nome' => 'Parada 7 - Rua Padre Ibiapina', 'endereco_completo' => 'Rua Padre Ibiapina']);
        Parada::create(['cod_identificacao' => '008', 'nome' => 'Parada 8 - Rua Padre Ibiapina', 'endereco_completo' => 'Rua Padre Ibiapina']);
        Parada::create(['cod_identificacao' => '009', 'nome' => 'Parada 9 - Rua Padre Ibiapina', 'endereco_completo' => 'Rua Padre Ibiapina']);
        Parada::create(['cod_identificacao' => '010', 'nome' => 'Parada 10 - Avenida Liberdade', 'endereco_completo' => 'Avenida Liberdade']);

        Parada::create(['cod_identificacao' => '011', 'nome' => 'Parada 11 - Avenida Liberdade', 'endereco_completo' => 'Avenida Liberdade']);
        Parada::create(['cod_identificacao' => '012', 'nome' => 'Parada 12 - Avenida Leandro Barreto', 'endereco_completo' => 'Avenida Leandro Barreto']);
        Parada::create(['cod_identificacao' => '013', 'nome' => 'Parada 13 - Avenida Leandro Barreto', 'endereco_completo' => 'Avenida Leandro Barreto']);
        Parada::create(['cod_identificacao' => '014', 'nome' => 'Parada 14 - Viaduto Jardim São Paulo', 'endereco_completo' => 'Viaduto Jardim São Paulo']);
        Parada::create(['cod_identificacao' => '015', 'nome' => 'Parada 15 - Viaduto Jardim São Paulo', 'endereco_completo' => 'Viaduto Jardim São Paulo']);
        Parada::create(['cod_identificacao' => '016', 'nome' => 'Parada 16 - Viaduto Jardim São Paulo', 'endereco_completo' => 'Viaduto Jardim São Paulo']);
        Parada::create(['cod_identificacao' => '017', 'nome' => 'Parada 17 - Avenida São Paulo', 'endereco_completo' => 'Avenida São Paulo']);
        Parada::create(['cod_identificacao' => '018', 'nome' => 'Parada 18 - Avenida São Paulo', 'endereco_completo' => 'Avenida São Paulo']);
        Parada::create(['cod_identificacao' => '019', 'nome' => 'Parada 19 - Avenida São Paulo', 'endereco_completo' => 'Avenida São Paulo']);
        Parada::create(['cod_identificacao' => '020', 'nome' => 'Parada 20 - Rua Aníbal Portela', 'endereco_completo' => 'Rua Aníbal Portela']);
    }
}

class LogradouroSeeder extends Seeder
{
    public function run()
    {
        DB::table('logradouros')->delete();

        Logradouro::create(['nome' => 'ESTAÇÃO DE METRÔ TEJIPIÓ', 'bairro' => 'Madalena', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'RUA PADRE IBIAPINA', 'bairro' => 'Madalena', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'AVENIDA LIBERDADE', 'bairro' => 'Madalena', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'RUA LEANDRO BARRETO', 'bairro' => 'Madalena', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'VIADUTO DE JARDIM SÃO PAULO', 'bairro' => 'Madalena', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'AVENIDA SÃO PAULO', 'bairro' => 'Madalena', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'RUA ANÍBAL PORTELA', 'bairro' => 'Madalena', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'RODOVIA BR-101', 'bairro' => 'Madalena', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'VIA DE ACESSO À AVENIDA ABDIAS DE CARVALHO', 'bairro' => 'Madalena', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'AVENIDA ENGENHEIRO ABDIAS DE CARVALHO', 'bairro' => 'Madalena', 'municipio' => 'Recife']);

        Logradouro::create(['nome' => 'RUA COPACABANA', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'AVENIDA VINTE DE JANEIRO', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'RUA BARÃO DE SOUZA LEÃO', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'AVENIDA MASCARENHAS DE MORAIS (PISTA LOCAL LESTE)', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'AVENIDA MASCARENHAS DE MORAIS (PISTA LOCAL OESTE)', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'PRAÇA MINISTRO SALGADO FILHO', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'RUA DEZ DE JULHO', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'AVENIDA VINTE DE JANEIRO', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'RUA JOÃO CARDOSO AYRES', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'RUA SÁ E SOUZA', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);
    }
}

class LogradouroParadaSeeder extends Seeder
{
    public function run()
    {
        DB::table('logradouro_parada')->delete();

        DB::table('logradouro_parada')->insert(array(
            array('logradouro_id' => 1, 'parada_id' => 1),
            array('logradouro_id' => 2, 'parada_id' => 2),
            array('logradouro_id' => 3, 'parada_id' => 3),
            array('logradouro_id' => 4, 'parada_id' => 4),
            array('logradouro_id' => 5, 'parada_id' => 5),
            array('logradouro_id' => 6, 'parada_id' => 6),
            array('logradouro_id' => 7, 'parada_id' => 7),
            array('logradouro_id' => 8, 'parada_id' => 8),
            array('logradouro_id' => 9, 'parada_id' => 9),
            array('logradouro_id' => 10, 'parada_id' => 10),

            array('logradouro_id' => 11, 'parada_id' => 11),
            array('logradouro_id' => 12, 'parada_id' => 12),
            array('logradouro_id' => 13, 'parada_id' => 12),
            array('logradouro_id' => 14, 'parada_id' => 14),
            array('logradouro_id' => 15, 'parada_id' => 15),
            array('logradouro_id' => 16, 'parada_id' => 16),
            array('logradouro_id' => 17, 'parada_id' => 17),
            array('logradouro_id' => 18, 'parada_id' => 18),
            array('logradouro_id' => 19, 'parada_id' => 19),
            array('logradouro_id' => 20, 'parada_id' => 20),

        ));
    }
}

class ItinerarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('itinerarios')->delete();

        Itinerario::create(['nome' => 'Principal', 'bairro' => 'Madalena', 'municipio' => 'Recife', 'linha_id' => '1']);
        Itinerario::create(['nome' => 'Principal', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife', 'linha_id' => '2']);
    }   
}

class ItinerarioLogradouroSeeder extends Seeder
{
    public function run()
    {
        DB::table('itinerario_logradouro')->delete();

        DB::table('itinerario_logradouro')->insert(array(
            array('itinerario_id' => 1, 'logradouro_id' => 1),
            array('itinerario_id' => 1, 'logradouro_id' => 2),
            array('itinerario_id' => 1, 'logradouro_id' => 3),
            array('itinerario_id' => 1, 'logradouro_id' => 4),
            array('itinerario_id' => 1, 'logradouro_id' => 5),
            array('itinerario_id' => 1, 'logradouro_id' => 6),
            array('itinerario_id' => 1, 'logradouro_id' => 7),
            array('itinerario_id' => 1, 'logradouro_id' => 8),
            array('itinerario_id' => 1, 'logradouro_id' => 9),
            array('itinerario_id' => 1, 'logradouro_id' => 10),

            array('itinerario_id' => 2, 'logradouro_id' => 11),
            array('itinerario_id' => 2, 'logradouro_id' => 12),
            array('itinerario_id' => 2, 'logradouro_id' => 13),
            array('itinerario_id' => 2, 'logradouro_id' => 14),
            array('itinerario_id' => 2, 'logradouro_id' => 15),
            array('itinerario_id' => 2, 'logradouro_id' => 16),
            array('itinerario_id' => 2, 'logradouro_id' => 17),
            array('itinerario_id' => 2, 'logradouro_id' => 18),
            array('itinerario_id' => 2, 'logradouro_id' => 19),
            array('itinerario_id' => 2, 'logradouro_id' => 20),
        ));
    }
}