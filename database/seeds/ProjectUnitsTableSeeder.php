<?php

use App\ProjectUnit;
use Illuminate\Database\Seeder;

class ProjectUnitsTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('project_units')->delete();
        ProjectUnit::create([ 
        	"project_id" => "2",
        	"unit_type" => "2B+2T",
        	"area" => "1600",
        	"other_charges" => "100000",
        	"govt_charges" => "200000",
        	"min_bid_value" => "1000",
        	"highest_bid" => "Rs. 2000",
        ]);

        ProjectUnit::create([ 
                "project_id" => "2",
                "unit_type" => "2B+2T",
                "area" => "1800",
                "other_charges" => "100000",
                "govt_charges" => "200000",
                "min_bid_value" => "1200",
                "highest_bid" => "Rs. 2200",
        ]);

        ProjectUnit::create([ 
                "project_id" => "2",
                "unit_type" => "3B+2T",
                "area" => "2000",
                "other_charges" => "100000",
                "govt_charges" => "200000",
                "min_bid_value" => "1000",
                "highest_bid" => "Rs. 2000",
        ]);
	}
}

