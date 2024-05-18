<?php

namespace Database\Seeders;

use App\Models\DonorDetail;
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
    }
}
