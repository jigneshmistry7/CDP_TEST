<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password")
        ];

        Admin::create($admin);
    }
}
