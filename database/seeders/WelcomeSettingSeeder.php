<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WelcomeSetting;

class WelcomeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WelcomeSetting::create([
            'site_title' => 'NEX GROUP',
            'hero_letter' => 'N',
            'hero_text' => 'is for <strong class="font-extrabold">NEX</strong>',
            'hero_description' => 'As we outlined in our initial letter, "NEX is not a conventional company. We do not intend to become one." We believe true innovation requires long-term patience and structural freedom.',
            'founder_name' => 'Engr. Mohammad Shahrair Khan',
            'founder_title' => 'Research Fellow || APU, Malaysia',
            'investor_link' => '#investor',
        ]);
    }
}
