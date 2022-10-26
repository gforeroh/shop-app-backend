<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'name' => 'admin',
            'last_name' => '',
            'document' => '123456789',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        User::factory()->count(15)->create();
    }
}
