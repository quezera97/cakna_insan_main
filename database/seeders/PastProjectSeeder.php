<?php

namespace Database\Seeders;

use App\Models\PastProject;
use App\Models\Project;
use Illuminate\Database\Seeder;

class PastProjectSeeder extends Seeder
{
    public function run(): void
    {
        $firstPastProject = PastProject::create([
            'title' => 'Kotak Kasih Sayang',
            'subtitle' => '',
            'details' => 'Bantuan makanan untuk golongan yang memerlukan di Selatan Thailand',
            'date_from' => '2022-01-01',
            'date_to' => '2022-12-31',
            'image_path' => 'assets/img/kotak_kasih_sayang.jpg',
        ]);

        Project::create([
            'projectable_type' => PastProject::class,
            'projectable_id' => $firstPastProject->id,
            'has_passed' => true,
            'is_featured' => false,
        ]);

        $secondPastProject = PastProject::create([
            'title' => 'Ibadah Korban',
            'subtitle' => '',
            'details' => 'Pengedaran daging korban di Selatan Thailand',
            'date_from' => '2022-01-01',
            'date_to' => '2022-12-31',
            'image_path' => 'assets/img/edaran_daging_korban.jpg',
        ]);

        Project::create([
            'projectable_type' => PastProject::class,
            'projectable_id' => $secondPastProject->id,
            'has_passed' => true,
            'is_featured' => false,
        ]);

        $thirdPastProject = PastProject::create([
            'title' => 'Waqaf Al-Quran & Pakaian Solat',
            'subtitle' => '',
            'details' => 'Waqaf Al-Quran dan pakaian solat di beberapa buah masjid',
            'date_from' => '2022-01-01',
            'date_to' => '2022-12-31',
            'image_path' => 'assets/img/waqaf_al_quran.jpg',
        ]);

        Project::create([
            'projectable_type' => PastProject::class,
            'projectable_id' => $thirdPastProject->id,
            'has_passed' => true,
            'is_featured' => false,
        ]);

        $fourthPastProject = PastProject::create([
            'title' => 'Majlis Iftar',
            'subtitle' => '',
            'details' => 'Iftar di Selatan Thailand pada bulan Ramadhan',
            'date_from' => '2022-01-01',
            'date_to' => '2022-12-31',
            'image_path' => 'assets/img/iftar_selatan_thai.jpeg',
        ]);

        Project::create([
            'projectable_type' => PastProject::class,
            'projectable_id' => $fourthPastProject->id,
            'has_passed' => true,
            'is_featured' => false,
        ]);
    }
}
