<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('projects')->delete();
        Project::create([ 
        	"name" => "Provident Harmony",
        	"location" => "Thanisandra Main Road",
        	"city" => "Bangalore",
        	"description" => "<ul> <li>Unit Type: 3 BHK Apartments.</li> <li>Size: 1241 sft.</li> <li>Just 15 min from Manyata Tech Park.</li> <li>Foray of amenities like club house, swimming pool, gym, sports area, convenience store etc.</li> <li>Conveniently close to reputed schools, colleges, health centres and work places.</li> </ul>",
        	"image_url" => "Harmony.jpg",
        	"brochure_url" => "",
        	"video_url" => "",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 7000 - Rs 7500 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 6030 - Rs 6400 psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 5030- Rs 5400 Psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Provident Sunworth",
        	"location" => "Yelahanka, Doddaballapur Road",
        	"city" => "Bangalore",
        	"description" => "<ul> <li>Unit Type: 3 BHK Apartments.</li> <li>Size: 1241 sft.</li> <li>Just 15 min from Manyata Tech Park.</li> <li>Foray of amenities like club house, swimming pool, gym, sports area, convenience store etc.</li> <li>Conveniently close to reputed schools, colleges, health centres and work places.</li> </ul>",
        	"image_url" => "Harmony.jpg",
        	"brochure_url" => "",
        	"video_url" => "",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 7000 - Rs 7500 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 6030 - Rs 6400 psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 5030- Rs 5400 Psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Provident Atria Platina",
        	"location" => "RMV II Stage",
        	"city" => "Bangalore",
        	"description" => "<ul> <li>Unit Type: 3 BHK Apartments.</li> <li>Size: 1241 sft.</li> <li>Just 15 min from Manyata Tech Park.</li> <li>Foray of amenities like club house, swimming pool, gym, sports area, convenience store etc.</li> <li>Conveniently close to reputed schools, colleges, health centres and work places.</li> </ul>",
        	"image_url" => "Harmony.jpg",
        	"brochure_url" => "",
        	"video_url" => "",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 7000 - Rs 7500 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 6030 - Rs 6400 psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 5030- Rs 5400 Psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Provident Harmony",
        	"location" => "Thanisandra Main Road",
        	"city" => "Chennai",
        	"description" => "<ul> <li>Unit Type: 3 BHK Apartments.</li> <li>Size: 1241 sft.</li> <li>Just 15 min from Manyata Tech Park.</li> <li>Foray of amenities like club house, swimming pool, gym, sports area, convenience store etc.</li> <li>Conveniently close to reputed schools, colleges, health centres and work places.</li> </ul>",
        	"image_url" => "Harmony.jpg",
        	"brochure_url" => "",
        	"video_url" => "",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 7000 - Rs 7500 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 6030 - Rs 6400 psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 5030- Rs 5400 Psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Provident Sunworth",
        	"location" => "Yelahanka, Doddaballapur Road",
        	"city" => "Chennai",
        	"description" => "<ul> <li>Unit Type: 3 BHK Apartments.</li> <li>Size: 1241 sft.</li> <li>Just 15 min from Manyata Tech Park.</li> <li>Foray of amenities like club house, swimming pool, gym, sports area, convenience store etc.</li> <li>Conveniently close to reputed schools, colleges, health centres and work places.</li> </ul>",
        	"image_url" => "Harmony.jpg",
        	"brochure_url" => "",
        	"video_url" => "",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 7000 - Rs 7500 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 6030 - Rs 6400 psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 5030- Rs 5400 Psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Provident Atria Platina",
        	"location" => "RMV II Stage",
        	"city" => "Chennai",
        	"description" => "<ul> <li>Unit Type: 3 BHK Apartments.</li> <li>Size: 1241 sft.</li> <li>Just 15 min from Manyata Tech Park.</li> <li>Foray of amenities like club house, swimming pool, gym, sports area, convenience store etc.</li> <li>Conveniently close to reputed schools, colleges, health centres and work places.</li> </ul>",
        	"image_url" => "Harmony.jpg",
        	"brochure_url" => "",
        	"video_url" => "",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 7000 - Rs 7500 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 6030 - Rs 6400 psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 5030- Rs 5400 Psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);
	}
}

