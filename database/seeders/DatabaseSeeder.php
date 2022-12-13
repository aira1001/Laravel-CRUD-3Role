<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Role;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //create role
        Role::create([
            'role' => 'user'
        ]);
        Role::create([
            'role' => 'Gardener'
        ]);
        Role::create([
            'role' => 'Designer'
        ]);
        User::factory(10)->create();

        //create project seed
        Project::factory(10)->create();
    }
}
