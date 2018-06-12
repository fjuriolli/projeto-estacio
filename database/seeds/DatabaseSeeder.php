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
        Parada::create(['cod_identificacao' => '021', 'nome' => 'Parada 21 - Rua Aníbal Portela', 'endereco_completo' => 'Rua Aníbal Portela']);
        Parada::create(['cod_identificacao' => '022', 'nome' => 'Parada 22 - Rua Aníbal Portela', 'endereco_completo' => 'Rua Aníbal Portela']);
        Parada::create(['cod_identificacao' => '023', 'nome' => 'Parada 23 - Rua Aníbal Portela', 'endereco_completo' => 'Rua Aníbal Portela']);
        Parada::create(['cod_identificacao' => '024', 'nome' => 'Parada 24 - BR-101', 'endereco_completo' => 'Rodovia BR-101']);
        Parada::create(['cod_identificacao' => '025', 'nome' => 'Parada 25 - BR-101', 'endereco_completo' => 'Rodovia BR-101']);
        Parada::create(['cod_identificacao' => '026', 'nome' => 'Parada 26 - BR-101', 'endereco_completo' => 'Rodovia BR-101']);
        Parada::create(['cod_identificacao' => '027', 'nome' => 'Parada 27 - BR-101', 'endereco_completo' => 'Rodovia BR-101']);
        Parada::create(['cod_identificacao' => '028', 'nome' => 'Parada 28 - VIA DE ACESSO À AVENIDA ABDIAS DE CARVALHO', 'endereco_completo' => 'VIA DE ACESSO À AVENIDA ABDIAS DE CARVALHO']);
        Parada::create(['cod_identificacao' => '029', 'nome' => 'Parada 29 - VIA DE ACESSO À AVENIDA ABDIAS DE CARVALHO', 'endereco_completo' => 'VIA DE ACESSO À AVENIDA ABDIAS DE CARVALHO']);
        Parada::create(['cod_identificacao' => '030', 'nome' => 'Parada 30 - Av. Engenheiro Abdias de Carvalho', 'endereco_completo' => 'Avenida Engenheiro Abdias de Carvalho']);
        Parada::create(['cod_identificacao' => '031', 'nome' => 'Parada 31 - Av. Engenheiro Abdias de Carvalho', 'endereco_completo' => 'Avenida Engenheiro Abdias de Carvalho']);
        Parada::create(['cod_identificacao' => '032', 'nome' => 'Parada 32 - Avenida General San Martin', 'endereco_completo' => 'Avenida General San Martin']);
        Parada::create(['cod_identificacao' => '033', 'nome' => 'Parada 33 - Rua Gomes Taborda', 'endereco_completo' => 'Rua Gomes Taborda']);
        Parada::create(['cod_identificacao' => '034', 'nome' => 'Parada 34 - Rua Carlos Gomes', 'endereco_completo' => 'Rua Carlos Gomes']);

        Parada::create(['cod_identificacao' => '035', 'nome' => 'Parada 35 - Rua Copacabana', 'endereco_completo' => 'Rua Cobacabana ']);
        Parada::create(['cod_identificacao' => '036', 'nome' => 'Parada 36 - Rua Copacabana', 'endereco_completo' => 'Rua Copacabana']);
        Parada::create(['cod_identificacao' => '037', 'nome' => 'Parada 37 - Rua Copacabana', 'endereco_completo' => 'Rua Copacabana']);
        Parada::create(['cod_identificacao' => '038', 'nome' => 'Parada 38 - Rua Vinte de Janeiro', 'endereco_completo' => 'Rua Vinte de Janeiro']);
        Parada::create(['cod_identificacao' => '039', 'nome' => 'Parada 39 - Rua Vinte de Janeiro', 'endereco_completo' => 'Rua Vinte de Janeiro']);
        Parada::create(['cod_identificacao' => '040', 'nome' => 'Parada 40 - Rua Barão de Souza Leão', 'endereco_completo' => 'Rua Barão de Souza Leão']);
        Parada::create(['cod_identificacao' => '041', 'nome' => 'Parada 41 - Rua Barão de Souza Leão', 'endereco_completo' => 'Rua Barão de Souza Leão']);
        Parada::create(['cod_identificacao' => '042', 'nome' => 'Parada 42 - Rua Barão de Souza Leão', 'endereco_completo' => 'Rua Barão de Souza Leão']);
        Parada::create(['cod_identificacao' => '043', 'nome' => 'Parada 43 - Rua Barão de Souza Leão', 'endereco_completo' => 'Rua Barão de Souza Leão']);
        Parada::create(['cod_identificacao' => '044', 'nome' => 'Parada 44 - Rua Barão de Souza Leão', 'endereco_completo' => 'Rua Barão de Souza Leão']);
        Parada::create(['cod_identificacao' => '045', 'nome' => 'Parada 45 - Av. Mascarenhas de Morais (Leste)', 'endereco_completo' => 'Avenida Mascarenhas de Morais (Leste)']);
        Parada::create(['cod_identificacao' => '046', 'nome' => 'Parada 46 - Av. Mascarenhas de Morais (Leste)', 'endereco_completo' => 'Avenida Mascarenhas de Morais (Leste)']);
        Parada::create(['cod_identificacao' => '047', 'nome' => 'Parada 47 - Av. Mascarenhas de Morais (Leste)', 'endereco_completo' => 'Avenida Mascarenhas de Morais (Leste)']);
        Parada::create(['cod_identificacao' => '048', 'nome' => 'Parada 48 - Av. Mascarenhas de Morais (Leste)', 'endereco_completo' => 'Avenida Mascarenhas de Morais (Leste)']);
        Parada::create(['cod_identificacao' => '049', 'nome' => 'Parada 49 - Av. Mascarenhas de Morais (Oeste)', 'endereco_completo' => 'Avenida Mascarenhas de Morais (Oeste)']);
        Parada::create(['cod_identificacao' => '050', 'nome' => 'Parada 50 - Av. Mascarenhas de Morais (Oeste)', 'endereco_completo' => 'Avenida Mascarenhas de Morais (Oeste)']);
        Parada::create(['cod_identificacao' => '051', 'nome' => 'Parada 51 - Avenida Ministro Salgado Filho', 'endereco_completo' => 'Praça Ministro Salgado Filho']);
        Parada::create(['cod_identificacao' => '052', 'nome' => 'Parada 52 - Avenida Ministro Salgado Filho', 'endereco_completo' => 'Praça Ministro Salgado Filho']);
        Parada::create(['cod_identificacao' => '053', 'nome' => 'Parada 53 - Rua Dez de Julho', 'endereco_completo' => 'Rua Dez de Julho']);
        Parada::create(['cod_identificacao' => '054', 'nome' => 'Parada 54 - Rua Dez de Julho', 'endereco_completo' => 'Rua Dez de Julho']);
        Parada::create(['cod_identificacao' => '055', 'nome' => 'Parada 55 - Rua Dez de Julho', 'endereco_completo' => 'Rua Dez de Julho']);
        Parada::create(['cod_identificacao' => '056', 'nome' => 'Parada 56 - Rua Dez de Julho', 'endereco_completo' => 'Rua Dez de Julho']);
        Parada::create(['cod_identificacao' => '057', 'nome' => 'Parada 57 - Rua Dez de Julho', 'endereco_completo' => 'Rua Dez de Julho']);
        Parada::create(['cod_identificacao' => '058', 'nome' => 'Parada 58 - Avenida Vinte de Janeiro', 'endereco_completo' => 'Avenida Vinte de Janeiro']);
        Parada::create(['cod_identificacao' => '059', 'nome' => 'Parada 59 - Avenida Vinte de Janeiro', 'endereco_completo' => 'Avenida Vinte de Janeiro']);
        Parada::create(['cod_identificacao' => '060', 'nome' => 'Parada 60 - Avenida João Cardoso Ayres', 'endereco_completo' => 'Avenida João Cardoso Ayres']);
        Parada::create(['cod_identificacao' => '061', 'nome' => 'Parada 61 - Avenida João Cardoso Ayres', 'endereco_completo' => 'Avenida João Cardoso Ayres']);
        Parada::create(['cod_identificacao' => '062', 'nome' => 'Parada 62 - Avenida João Cardoso Ayres', 'endereco_completo' => 'Avenida João Cardoso Ayres']);
        Parada::create(['cod_identificacao' => '063', 'nome' => 'Parada 63 - Rua Sá e Souza', 'endereco_completo' => 'Rua Sá e Souza']);
        Parada::create(['cod_identificacao' => '064', 'nome' => 'Parada 64 - Rua Sá e Souza', 'endereco_completo' => 'Rua Sá e Souza']);
        Parada::create(['cod_identificacao' => '065', 'nome' => 'Parada 65 - Rua Padre Cabral', 'endereco_completo' => 'Rua Padre Cabral']);
        Parada::create(['cod_identificacao' => '066', 'nome' => 'Parada 66 - Rua Padre Cabral', 'endereco_completo' => 'Rua Padre Cabral']);
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
        Logradouro::create(['nome' => 'AVENIDA GENERAL SAN MARTIN', 'bairro' => 'Madalena', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'AVENIDA GOMES TABORDA', 'bairro' => 'Madalena', 'municipio' => 'Recife']);
        Logradouro::create(['nome' => 'RUA CARLOS GOMES', 'bairro' => 'Madalena', 'municipio' => 'Recife']);

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
        Logradouro::create(['nome' => 'RUA PADRE CABRAL', 'bairro' => 'Boa Viagem', 'municipio' => 'Recife']);

    }
}

class LogradouroParadaSeeder extends Seeder
{
    public function run()
    {
        DB::table('logradouro_parada')->delete();

        DB::table('logradouro_parada')->insert(array(
            array('logradouro_id' => 1, 'parada_id' => 1),
            array('logradouro_id' => 1, 'parada_id' => 2),
            array('logradouro_id' => 2, 'parada_id' => 3),
            array('logradouro_id' => 2, 'parada_id' => 4),
            array('logradouro_id' => 2, 'parada_id' => 5),
            array('logradouro_id' => 2, 'parada_id' => 6),
            array('logradouro_id' => 2, 'parada_id' => 7),
            array('logradouro_id' => 2, 'parada_id' => 8),
            array('logradouro_id' => 2, 'parada_id' => 9),
            array('logradouro_id' => 3, 'parada_id' => 10),
            array('logradouro_id' => 3, 'parada_id' => 11),
            array('logradouro_id' => 4, 'parada_id' => 12),
            array('logradouro_id' => 4, 'parada_id' => 13),
            array('logradouro_id' => 5, 'parada_id' => 14),
            array('logradouro_id' => 5, 'parada_id' => 15),
            array('logradouro_id' => 5, 'parada_id' => 16),
            array('logradouro_id' => 6, 'parada_id' => 17),
            array('logradouro_id' => 6, 'parada_id' => 18),
            array('logradouro_id' => 6, 'parada_id' => 19),
            array('logradouro_id' => 7, 'parada_id' => 20),
            array('logradouro_id' => 7, 'parada_id' => 21),
            array('logradouro_id' => 7, 'parada_id' => 22),
            array('logradouro_id' => 7, 'parada_id' => 23),
            array('logradouro_id' => 8, 'parada_id' => 24),
            array('logradouro_id' => 8, 'parada_id' => 25),
            array('logradouro_id' => 8, 'parada_id' => 26),
            array('logradouro_id' => 8, 'parada_id' => 27),
            array('logradouro_id' => 9, 'parada_id' => 28),
            array('logradouro_id' => 9, 'parada_id' => 29),
            array('logradouro_id' => 10, 'parada_id' => 30),
            array('logradouro_id' => 10, 'parada_id' => 31),
            array('logradouro_id' => 11, 'parada_id' => 32),
            array('logradouro_id' => 12, 'parada_id' => 33),
            array('logradouro_id' => 13, 'parada_id' => 34),

            array('logradouro_id' => 14, 'parada_id' => 35),
            array('logradouro_id' => 14, 'parada_id' => 36),
            array('logradouro_id' => 14, 'parada_id' => 37),
            array('logradouro_id' => 15, 'parada_id' => 38),
            array('logradouro_id' => 15, 'parada_id' => 39),
            array('logradouro_id' => 16, 'parada_id' => 40),
            array('logradouro_id' => 16, 'parada_id' => 41),
            array('logradouro_id' => 16, 'parada_id' => 42),
            array('logradouro_id' => 16, 'parada_id' => 43),
            array('logradouro_id' => 16, 'parada_id' => 44),
            array('logradouro_id' => 17, 'parada_id' => 45),
            array('logradouro_id' => 17, 'parada_id' => 46),
            array('logradouro_id' => 17, 'parada_id' => 47),
            array('logradouro_id' => 17, 'parada_id' => 48),
            array('logradouro_id' => 18, 'parada_id' => 49),
            array('logradouro_id' => 18, 'parada_id' => 50),
            array('logradouro_id' => 19, 'parada_id' => 51),
            array('logradouro_id' => 19, 'parada_id' => 52),
            array('logradouro_id' => 20, 'parada_id' => 53),
            array('logradouro_id' => 20, 'parada_id' => 54),
            array('logradouro_id' => 20, 'parada_id' => 55),
            array('logradouro_id' => 20, 'parada_id' => 56),
            array('logradouro_id' => 20, 'parada_id' => 57),
            array('logradouro_id' => 21, 'parada_id' => 58),
            array('logradouro_id' => 21, 'parada_id' => 59),
            array('logradouro_id' => 22, 'parada_id' => 60),
            array('logradouro_id' => 22, 'parada_id' => 61),
            array('logradouro_id' => 22, 'parada_id' => 62),
            array('logradouro_id' => 23, 'parada_id' => 63),
            array('logradouro_id' => 23, 'parada_id' => 64),
            array('logradouro_id' => 24, 'parada_id' => 65),
            array('logradouro_id' => 24, 'parada_id' => 66),
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
            array('itinerario_id' => 1, 'logradouro_id' => 11),
            array('itinerario_id' => 1, 'logradouro_id' => 12),
            array('itinerario_id' => 1, 'logradouro_id' => 13),

            array('itinerario_id' => 2, 'logradouro_id' => 14),
            array('itinerario_id' => 2, 'logradouro_id' => 15),
            array('itinerario_id' => 2, 'logradouro_id' => 16),
            array('itinerario_id' => 2, 'logradouro_id' => 17),
            array('itinerario_id' => 2, 'logradouro_id' => 18),
            array('itinerario_id' => 2, 'logradouro_id' => 19),
            array('itinerario_id' => 2, 'logradouro_id' => 20),
            array('itinerario_id' => 2, 'logradouro_id' => 21),
            array('itinerario_id' => 2, 'logradouro_id' => 22),
            array('itinerario_id' => 2, 'logradouro_id' => 23),
            array('itinerario_id' => 2, 'logradouro_id' => 24),
        ));
    }
}