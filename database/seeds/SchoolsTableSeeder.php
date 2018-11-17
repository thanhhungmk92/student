<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('schools')->insert(
    		[
    			['id'=>1,'name'=>'Lập trình C'],
    			['id'=>2,'name'=>'Lập trình web PHP'],
    			['id'=>3,'name'=>'Tin học văn phòng'],
    			['id'=>4,'name'=>'Java 1'],
    		]);


         
    }
}

