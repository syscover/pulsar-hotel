<?php

use Illuminate\Database\Seeder;
use Syscover\Admin\Models\Package;

class HotelPackageTableSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id' => 600, 'name' => 'Hotel Package', 'root' => 'hotel', 'sort' => 600, 'active' => true]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="WinePackageTableSeeder"
 */