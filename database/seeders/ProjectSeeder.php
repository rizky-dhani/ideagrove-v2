<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Go Alien Trip',
                'client_name' => 'Alien Tour',
                'slug' => 'go-alien-trip',
                'description' => 'A boutique tour company offering off-the-beaten-path adventures across Indonesia. The site showcases small-group tours (capped at 6–8 travellers) to hidden, least-visited destinations — from campervan trips through Java\'s small towns to two-wheeled explorations of Bali\'s unseen corners and remote tribe encounters in West Sumatra. Features include tour listings with details, Instagram feed integration, a whimsical alien brand identity, and a "what do you want to do today" interactive selector that guides visitors to the right trip.',
            ],
            [
                'name' => 'Baby Melon Villas',
                'client_name' => 'The Gutsy Granny',
                'description' => 'A luxury private villa website in the heart of Seminyak, Bali. The site presents eight uniquely designed rooms — Master Room, Pool Room, Garden Room, Temple Room, Goddess Room, Heavenly Room, and more — each with its own photo gallery, starting price, and detailed description. The brand voice is warm, soulful, and personal: "Live Boldly. Stay Soft." The design blends tropical elegance with boutique charm, featuring a pastel melon-toned palette, fluid layouts, and an inviting sense of place.',
                'slug' => 'baby-melon-villas',
            ],
            [
                'name' => 'PT. Okdo Harapan Mulia',
                'client_name' => 'PT. Okdo Harapan Mulia',
                'description' => 'A corporate website for a licensed Indonesian migrant worker placement agency (P3MI) operating since 2005. Ministry of Manpower-approved and ISO 9001:2015 certified. The site communicates trust and professionalism through a clean, authoritative design. It covers the company\'s 21+ year history, 7 branch offices across Indonesia, 10K+ workers placed across key global markets (Malaysia, Singapore, Taiwan, Hong Kong, Japan, Qatar, UAE, Germany), services (permanent & temporary staffing, recruitment, training), industries served, board of directors, training centre in Medan, and a photo gallery.',
                'slug' => 'pt-okdo-harapan-mulia',
            ],
            [
                'name' => 'STRIDE',
                'client_name' => 'STRIDE Athletic',
                'slug' => 'sports-shop',
                'description' => 'A premium sports apparel e-commerce brand built for athletes who don\'t compromise. The site spans four pages — a full-bleed hero landing with asymmetric collection bento, an alternating editorial product showcase, an about page with brand story and team bios, and a clean contact form. Built with a light bone palette, forest green accent, Clash Display typography, and scroll-reveal motion. Every product line (Running, Training, Lifestyle, Recovery) gets its own category with curated photography. Tested on real roads, designed without shortcuts.',
                'web_url' => '/en/work/sports-shop',
            ],
        ];

        foreach ($projects as $data) {
            Project::firstOrCreate(
                ['slug' => $data['slug']],
                $data,
            );
        }
    }
}
