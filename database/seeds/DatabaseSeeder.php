<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(ScrapRequestSeeder::class);
        $this->call(ScrappedShoeSeeder::class);
    }
}
