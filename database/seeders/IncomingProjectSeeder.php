<?php

namespace Database\Seeders;

use App\Models\IncomingProject;
use App\Models\Project;
use Illuminate\Database\Seeder;

class IncomingProjectSeeder extends Seeder
{
    public function run(): void
    {
        $firstIncomingProject = IncomingProject::create([
            'title' => 'Kotak Kasih Insan',
            'subtitle' => '',
            'details' => 'Bantuan makanan untuk golongan yang memerlukan di Selatan Thailand',
            'date_from' => '2022-01-01',
            'date_to' => '2022-12-31',
            'image_path' => 'assets/img/kotak_kasih_sayang.jpg',
        ]);

        Project::create([
            'projectable_type' => IncomingProject::class,
            'projectable_id' => $firstIncomingProject->id,
            'has_passed' => false,
            'is_featured' => false,
        ]);

        $secondIncomingProject = IncomingProject::create([
            'title' => 'Waqaf Sejadah',
            'subtitle' => '',
            'details' => 'Perwaqafan sejadah-sejadah di beberapa buah masjid',
            'date_from' => '2022-01-01',
            'date_to' => '2022-12-31',
            'image_path' => 'assets/img/edaran_daging_korban.jpg',
        ]);

        Project::create([
            'projectable_type' => IncomingProject::class,
            'projectable_id' => $secondIncomingProject->id,
            'has_passed' => false,
            'is_featured' => true,
        ]);

        $thirdIncomingProject = IncomingProject::create([
            'title' => 'Bantuan Pelarian',
            'subtitle' => '',
            'details' => 'Pemberian keperluan harian kepada para pelarian',
            'date_from' => '2022-01-01',
            'date_to' => '2022-12-31',
            'image_path' => 'assets/img/waqaf_al_quran.jpg',
        ]);

        Project::create([
            'projectable_type' => IncomingProject::class,
            'projectable_id' => $thirdIncomingProject->id,
            'has_passed' => false,
            'is_featured' => false,
        ]);

        $fourthIncomingProject = IncomingProject::create([
            'title' => 'Sumbangan Baju Raya',
            'subtitle' => '',
            'details' => 'Sumbangan baju raya pada bulan Ramadhan',
            'date_from' => '2022-01-01',
            'date_to' => '2022-12-31',
            'image_path' => 'assets/img/iftar_selatan_thai.jpeg',
        ]);

        Project::create([
            'projectable_type' => IncomingProject::class,
            'projectable_id' => $fourthIncomingProject->id,
            'has_passed' => false,
            'is_featured' => true,
        ]);

        $fourthIncomingProject = IncomingProject::create([
            'title' => 'Sumbangan Kelengkapan Sekolah',
            'subtitle' => '',
            'details' => 'Sumbangan kelengkapan sekolah bagi kanak-kanak di Selatan Thai',
            'date_from' => '2022-01-01',
            'date_to' => '2022-12-31',
            'image_path' => 'assets/img/iftar_selatan_thai.jpeg',
        ]);

        Project::create([
            'projectable_type' => IncomingProject::class,
            'projectable_id' => $fourthIncomingProject->id,
            'has_passed' => false,
            'is_featured' => false,
        ]);
    }
}
