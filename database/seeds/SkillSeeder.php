<?php

use Illuminate\Database\Seeder;
use App\Models\JobSkill;
use Illuminate\Support\Facades\DB;
class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_skills')->delete();

        $skills = [
            ['id' =>1,'skill'=>'WireFraming'],
            ['id' => 2, 'skill' => 'SiteMap'],
            ['id' => 3, 'skill' => 'User Research'],
            ['id' => 4, 'skill' => 'Prototyping'],

        ];
    
        JobSkill::insert($skills);
    }
}
