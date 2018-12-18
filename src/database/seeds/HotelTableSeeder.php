<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HotelTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(HotelPackageTableSeeder::class);

        Model::reguard();
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="HotelTableSeeder"
 */