<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\JobType;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
        DB::table('job_types')->delete();

        $JobType = [
            ['id' =>1,'title'=>'Type1'],
            ['id' => 2, 'title' => 'Type2'],
            ['id' => 3, 'title' => 'Type3'],

        ];
    
        JobType::insert($JobType);
    }
}
