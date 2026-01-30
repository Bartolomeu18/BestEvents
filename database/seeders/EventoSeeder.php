<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evento::updateOrCreate(
            ['empresa_id' => 1, 'titulo' => 'Conferência de Tecnologia 2026'],
            [
                'site' => 'https://tech-conf.com',
                'descrição' => 'Grande conferência de tecnologia com palestrantes internacionais',
                'data_inicio' => '2026-03-15',
                'data_fim' => '2026-03-17',
                'localização' => 'São Paulo - SP',
                'capacidade' => 500,
                'imagem_capa' => 'evento1.jpg',
                'categoria' => 'tecnologia',
                'status' => 'ativo'
            ]
        );

        Evento::updateOrCreate(
            ['empresa_id' => 2, 'titulo' => 'Workshop de Laravel'],
            [
                'site' => 'https://laravel-workshop.com',
                'descrição' => 'Workshop prático de desenvolvimento com Laravel',
                'data_inicio' => '2026-02-20',
                'data_fim' => '2026-02-22',
                'localização' => 'Rio de Janeiro - RJ',
                'capacidade' => 100,
                'imagem_capa' => 'evento2.jpg',
                'categoria' => 'educacao',
                'status' => 'ativo'
            ]
        );

        Evento::updateOrCreate(
            ['empresa_id' => 3, 'titulo' => 'Hackathon 2026'],
            [
                'site' => 'https://hackathon2026.com',
                'descrição' => 'Maratona de programação com prêmios em dinheiro',
                'data_inicio' => '2026-04-10',
                'data_fim' => '2026-04-12',
                'localização' => 'Brasília - DF',
                'capacidade' => 200,
                'imagem_capa' => 'evento3.jpg',
                'categoria' => 'tecnologia',
                'status' => 'ativo'
            ]
        );

        Evento::updateOrCreate(
            ['empresa_id' => 4, 'titulo' => 'Webinar: Marketing Digital'],
            [
                'site' => 'https://webinar-marketing.com',
                'descrição' => 'Palestra online sobre estratégias de marketing digital moderno',
                'data_inicio' => '2026-02-10',
                'data_fim' => '2026-02-10',
                'localização' => 'Online',
                'capacidade' => 1000,
                'imagem_capa' => 'evento4.jpg',
                'categoria' => 'negocios',
                'status' => 'ativo'
            ]
        );

        Evento::updateOrCreate(
            ['empresa_id' => 5, 'titulo' => 'Expo de Inovação e Startups'],
            [
                'site' => 'https://expo-startup.com',
                'descrição' => 'Exposição com as principais startups e inovações do Brasil',
                'data_inicio' => '2026-05-05',
                'data_fim' => '2026-05-07',
                'localização' => 'Curitiba - PR',
                'capacidade' => 800,
                'imagem_capa' => 'evento5.jpg',
                'categoria' => 'negocios',
                'status' => 'ativo'
            ]
        );
    }
}
