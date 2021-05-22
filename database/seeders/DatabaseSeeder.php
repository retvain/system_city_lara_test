<?php

namespace Database\Seeders;

use App\Models\Models\StoreProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\StoreProduct::factory(20)->create();
    }
}
