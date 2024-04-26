<?php

namespace Database\Seeders;

use App\Models\PastProject;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class PastProjectSeeder extends Seeder
{
    public function run(): void
    {
        $firstPastProject = PastProject::create([
            'title' => 'Kotak Kasih Sayang',
            'subtitle' => '',
            'details' => 'Bantuan makanan untuk golongan yang memerlukan di Selatan Thailand',
            'date' => '2022-01-01',
            'poster_image_path' => 'assets/img/poster/example.jpg',
        ]);

        Project::create([
            'projectable_type' => PastProject::class,
            'projectable_id' => $firstPastProject->id,
            'has_passed' => true,
            'is_featured' => false,
        ]);

        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $firstPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/kotak_kasih_sayang/1.jpeg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $firstPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/kotak_kasih_sayang/2.jpeg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $firstPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/kotak_kasih_sayang/3.jpeg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $firstPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/kotak_kasih_sayang/4.jpeg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $firstPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/kotak_kasih_sayang/5.jpeg',]);

        $secondPastProject = PastProject::create([
            'title' => 'Ibadah Korban',
            'subtitle' => '',
            'details' => 'Pengedaran daging korban di Selatan Thailand',
            'date' => '2022-01-01',
            'poster_image_path' => 'assets/img/poster/example.jpg',
        ]);

        Project::create([
            'projectable_type' => PastProject::class,
            'projectable_id' => $secondPastProject->id,
            'has_passed' => true,
            'is_featured' => false,
        ]);

        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $secondPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/edaran_daging_korban/1.jpg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $secondPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/edaran_daging_korban/2.jpg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $secondPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/edaran_daging_korban/3.jpg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $secondPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/edaran_daging_korban/4.jpg',]);

        $thirdPastProject = PastProject::create([
            'title' => 'Waqaf Al-Quran & Pakaian Solat',
            'subtitle' => '',
            'details' => 'Waqaf Al-Quran dan pakaian solat di beberapa buah masjid',
            'date' => '2022-01-01',
            'poster_image_path' => 'assets/img/poster/example.jpg',
        ]);

        Project::create([
            'projectable_type' => PastProject::class,
            'projectable_id' => $thirdPastProject->id,
            'has_passed' => true,
            'is_featured' => false,
        ]);

        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $thirdPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/waqaf_al_quran/1.jpg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $thirdPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/waqaf_al_quran/2.jpg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $thirdPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/waqaf_al_quran/3.jpg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $thirdPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/waqaf_al_quran/4.jpg',]);

        $fourthPastProject = PastProject::create([
            'title' => 'Majlis Iftar',
            'subtitle' => '',
            'details' => 'Iftar di Selatan Thailand pada bulan Ramadhan',
            'date' => '2022-01-01',
            'poster_image_path' => 'assets/img/poster/example.jpg',
        ]);

        Project::create([
            'projectable_type' => PastProject::class,
            'projectable_id' => $fourthPastProject->id,
            'has_passed' => true,
            'is_featured' => false,
        ]);

        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $fourthPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/iftar_selatan_thai/1.jpeg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $fourthPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/iftar_selatan_thai/2.jpeg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $fourthPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/iftar_selatan_thai/3.jpeg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $fourthPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/iftar_selatan_thai/4.jpeg',]);
        ProjectImage::create(['reference_type' => PastProject::class, 'referenced_id' => $fourthPastProject->id, 'title' => null, 'caption' => null, 'image_path' => 'assets/img/iftar_selatan_thai/5.jpeg',]);
    }
}
