<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'name' => 'Admin',],
            ['id' => 2, 'name' => 'Customer',],

        ];

        foreach ($items as $item) {
            Role::create($item);
        }
    }
}
