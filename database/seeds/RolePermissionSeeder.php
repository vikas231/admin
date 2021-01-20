<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
class RoleSeeder extends Seeder
{
    private $roles = [
        'user'=>'web',
        'admin'=>'admin',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $key=>$value) {
            Role::firstOrCreate([
                'name' => $key,
                'status' => 1,
                'guard'=>$value,
            ]);
        }
    }
}
