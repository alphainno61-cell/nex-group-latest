<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Logo;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logos = [
            ['name' => 'NEX REAL ESTATE', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=NEX+REAL+ESTATE', 'order' => 1],
            ['name' => 'Mechanix', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=Mechanix', 'order' => 2],
            ['name' => 'fervent', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=fervent', 'order' => 3],
            ['name' => 'NexKraft', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=NexKraft', 'order' => 4],
            ['name' => 'ICT OLYMPIAD', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=ICT+OLYMPIAD', 'order' => 5],
            ['name' => 'Nexfly', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=Nexfly', 'order' => 6],
            ['name' => 'MindShaper', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=MindShaper', 'order' => 7],
            ['name' => 'Toudmela', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=Toudmela', 'order' => 8],
            ['name' => 'Bangla Barta', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=Bangla+Barta', 'order' => 9],
            ['name' => 'NEXSTORY', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=NEXSTORY', 'order' => 10],
            ['name' => 'TNN', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=TNN', 'order' => 11],
            ['name' => 'nexAcademy', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=nexAcademy', 'order' => 12],
            ['name' => 'BRAND', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=BRAND', 'order' => 13],
            ['name' => 'NexSports', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=NexSports', 'order' => 14],
            ['name' => 'CSG', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=CSG', 'order' => 15],
            ['name' => 'Finance Tribune', 'url' => 'https://placehold.co/200x60/f9f9f9/333?text=Finance+Tribune', 'order' => 16],
        ];

        foreach ($logos as $logo) {
            Logo::create($logo);
        }
    }
}
