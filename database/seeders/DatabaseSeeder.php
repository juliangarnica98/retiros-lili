<?php

namespace Database\Seeders;

use Database\Factories\BossFactory;
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
        // \App\Models\Boss::factory(5)->create();
        // \App\Models\User::factory(10)->create();
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TypeRetirementSeeder::class);
        // $this->call(AreaSeeder::class);
        $this->call(RegionalSeeder::class);
        $this->call(GerenciaSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(BossSeeder::class);
        $this->call(PositionsTableSeeder::class);
        // $this->call(BossSeeder::class);
        
        
    }
}
