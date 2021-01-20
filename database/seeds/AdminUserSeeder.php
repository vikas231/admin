<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::firstOrCreate(
            [
                'email'=>'admin@jobseeker.com'
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@jobseeker.com',
                'password' => Hash::make('admin@123'),
                'role_id' => Role::where('name', 'admin')->value('id'),
                'status' => 1,
                'is_super'=>true
            ]
        );
    }
}
