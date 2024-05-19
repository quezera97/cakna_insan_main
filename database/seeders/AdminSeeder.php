<?php

namespace Database\Seeders;

use App\Models\DonorDetail;
use App\Models\LocationCoordinate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Cakna Insan Malaysia',
            'email' => 'caknainsanmalaysia@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('nasira66'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('87654321'),
        ]);

        DonorDetail::create([
            'name' => 'Cakna Insan Malaysia',
            'email' => 'caknainsanmalaysia@gmail.com',
            'phone_no' => '60123903309',
        ]);

        LocationCoordinate::create([
            'longitude' => '101.2501',
            'latitude' => '6.8648',
            'place_or_country' => 'Pattani, Thailand',
            'date' => '2024-05-19',
        ]);
    }
}
