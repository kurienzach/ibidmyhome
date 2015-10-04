<?php

use App\ProjectUnit;
use Illuminate\Database\Seeder;

class ProjectUnitsTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('project_units')->delete();

                // Goldcrest
                ProjectUnit::create([ 
                	"project_id" => "1",
                	"unit_type" => "2 BHK",
                	"area" => "1340",
                	"other_charges" => "769000",
                	"govt_charges" => "681427",
                	"min_bid_value" => "1000",
                	"highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                ProjectUnit::create([ 
                        "project_id" => "1",
                        "unit_type" => "3 BHK - Comfort",
                        "area" => "1665",
                        "other_charges" => "1132750",
                        "govt_charges" => "855691",
                        "min_bid_value" => "1200",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                ProjectUnit::create([ 
                        "project_id" => "1",
                        "unit_type" => "3 BHK- Grande",
                        "area" => "1843",
                        "other_charges" => "1195050",
                        "govt_charges" => "940254",
                        "min_bid_value" => "1000",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                // Skywood
                ProjectUnit::create([ 
                        "project_id" => "2",
                        "unit_type" => "3 BHK - Comfort",
                        "area" => "1625",
                        "other_charges" => "1528125",
                        "govt_charges" => "1163457",
                        "min_bid_value" => "1000",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                ProjectUnit::create([ 
                        "project_id" => "2",
                        "unit_type" => "3 BHK - Grande",
                        "area" => "1950",
                        "other_charges" => "1698750",
                        "govt_charges" => "1097648",
                        "min_bid_value" => "1200",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                ProjectUnit::create([ 
                        "project_id" => "2",
                        "unit_type" => "4 BHK",
                        "area" => "2330",
                        "other_charges" => "1898250",
                        "govt_charges" => "1778194",
                        "min_bid_value" => "1000",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                // Welworth
                ProjectUnit::create([ 
                        "project_id" => "3",
                        "unit_type" => "3 BHK",
                        "area" => "1075",
                        "other_charges" => "179750",
                        "govt_charges" => "295675",
                        "min_bid_value" => "1000",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                // Swanlake
                ProjectUnit::create([ 
                        "project_id" => "4",
                        "unit_type" => "3 BHK",
                        "area" => "1750",
                        "other_charges" => "935000",
                        "govt_charges" => "392760",
                        "min_bid_value" => "1000",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                // Eternity
                ProjectUnit::create([ 
                        "project_id" => "5",
                        "unit_type" => "3 BHK - Comfort",
                        "area" => "1450",
                        "other_charges" => "885000",
                        "govt_charges" => "350000",
                        "min_bid_value" => "1200",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                ProjectUnit::create([ 
                        "project_id" => "5",
                        "unit_type" => "3 BHK - Grande",
                        "area" => "1600",
                        "other_charges" => "930000",
                        "govt_charges" => "350000",
                        "min_bid_value" => "1000",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                // Oceania
                ProjectUnit::create([ 
                        "project_id" => "6",
                        "unit_type" => "3 BHK - Grande",
                        "area" => "3100",
                        "other_charges" => "12780000",
                        "govt_charges" => "500000",
                        "min_bid_value" => "1200",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                ProjectUnit::create([ 
                        "project_id" => "6",
                        "unit_type" => "3 BHK -Luxe",
                        "area" => "3425",
                        "other_charges" => "14015000",
                        "govt_charges" => "500000",
                        "min_bid_value" => "1000",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);

                // Grandbay
                ProjectUnit::create([ 
                        "project_id" => "7",
                        "unit_type" => "3 BHK",
                        "area" => "1925",
                        "other_charges" => "7641250",
                        "govt_charges" => "300000",
                        "min_bid_value" => "1200",
                        "highest_bid" => "Current Highest Bid<br>as on Sept 15 2015 <p>Rs 4000 psqft</p>",
                ]);
	}
}

