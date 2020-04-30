<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'type' => 'Ultra Admin'
        ]);

        DB::table('roles')->insert([
            'type' => 'Super Admin'
        ]);

        DB::table('roles')->insert([
            'type' => 'Admin'
        ]);

        DB::table('roles')->insert([
            'type' => 'Aux'
        ]);

        DB::table('roles')->insert([
            'type' => 'User'
        ]);

        DB::table('roles')->insert([
            'type' => 'Public'
        ]);
    }
}
