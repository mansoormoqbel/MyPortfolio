<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        
    User::create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123123123'),
        'is_admin' => true,
    ]);

    Service::create(['title'=>'تطوير واجهات','description'=>'تصميم واجهات احترافية','icon'=>'fa-solid fa-code']);
    Service::create(['title'=>'تصميم','description'=>'تصميم UI/UX','icon'=>'fa-solid fa-paint-brush']);

    Project::factory(5)->create();
    }
}
