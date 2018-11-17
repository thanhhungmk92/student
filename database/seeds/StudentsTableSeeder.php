<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert(
        	[
        		['name'=>'Nguyễn Minh Trang','date_of_birth'=>'1990/1/1','school_id'=>1,'address'=>'Đà Nẵng'],
        		['name'=>'Phan Thanh Hùng','date_of_birth'=>'1992/2/9','school_id'=>3,'address'=>'Đà Nẵng'],
        		['name'=>'Hồ Mỹ Kim','date_of_birth'=>'1992/5/10','school_id'=>3,'address'=>'Quảng Nam'],
        		

        	]);
    }
}
