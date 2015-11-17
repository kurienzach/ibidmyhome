<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('projects')->delete();
        Project::create([ 
        	"name" => "Purva Goldcrest",
        	"location" => "Kanakapura Road",
        	"city" => "Bangalore",
        	"description" => "<ul><li>Unit Type : 3 BHK Comfort (approx. 1665 sqft) & 3 BHK Grand (approx. 1840 sqft)</li> <li>Perched on a hillock ensuring vantage views of the city from every floor</li> <li>Spacious sky verandas</li> <li>12000 sft culture club with distinctive recreational amenities</li> <li>Mivan construction technology</li></ul>",
        	"image_url" => "Harmony.jpg",
        	"brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/64/Gold_Crest%20e-Brochure.pdf",
        	"video_url" => "https://www.youtube.com/watch?v=DknF7HT6kW4",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 5100 - 6350 per sqft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 5220  per sqft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 4250 per sqft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        // Project::create([ 
        // 	"name" => "Purva Skywood",
        // 	"location" => "Off Sarjapur Road",
        // 	"city" => "Bangalore",
        // 	"description" => "<ul><li>Large 3&4 BHK apartments</li> <li>Located off Sarjapur Rd, 3 Kms from HSR layout.</li> <li>15 mins to Koramangala</li> <li>4 Km from Sarjapur-ORR junction</li> <li>5 Km from Electonic city.</li> <li>Plethora of innovative amenities</li></ul>",
        // 	"image_url" => "Skywood.jpg",
        // 	"brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/3/E-brochure%20Skywood.pdf",
        // 	"video_url" => "",
        // 	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        // 	"market_base" => "Rs 5000 - 6400 per sqft",
        // 	"market_total" => "Rs 81.8 - 91.1 lacs",
        // 	"dev_base" => "Rs 6400 per sqft",
        // 	"dev_total" => "Rs 75.8 - 78.1 lacs",
        // 	"hdfc_base" => "Rs 5500 per sqft",
        // 	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        // ]);

        Project::create([ 
        	"name" => "Provident Freedom by Provident",
        	"location" => "Yelahanka, Doddaballapur Road",
        	"city" => "Bangalore",
        	"description" => "<ul><li>Unit Type: 3 BHK Comfort (approx. 1075 sqft)</li> <li>Located near Bangalore International Airport.</li> <li>Just minutes away from Corporate hubs like ITIR, Apparel Park, Aerospace SEZ etc.</li> <li>Direct connectivity to one of the busiest upcoming commercial hubs, Hebbal.</li> <li>Equipped with all modern lifestyle amenities including a 9000 sft swimming pool.</li></ul>",
        	"image_url" => "Welworth.jpg",
        	"brochure_url" => "http://www.providenthousing.com/wp-content/uploads/2013/02/Provident_Welworthcity_ebrochure.pdf?379a83",
        	"video_url" => "https://www.youtube.com/watch?v=4xl4zRSA0Zk",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 3600 - 4400 per sqft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 3654 per sqft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 3150 per sqft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Purva Swanlake",
        	"location" => "OMR",
        	"city" => "Chennai",
        	"description" => "<ul><li>Unit Type: 3 BHK Comfort (approx. 1740 sqft)</li><li>3 BHK Homes on OMR overlooking the Muttukadu Lake.</li> <li>World class lifestyle amenities like swimming pool, gymnasium, multi-purpose hall, squash court, Basketball, table tennis, jogging track, steam & sauna, etc.</li></ul>",
        	"image_url" => "Swanlake.jpg",
        	"brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/10/Swanlake.pdf",
        	"video_url" => "",
        	"banner_text" => "",
        	"market_base" => "Rs 3675 - 4500 per sqft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 4199 per sqft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 3250 per sqft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Purva Eternity",
        	"location" => "Kakkanad",
        	"city" => "Kochi",
        	"description" => "<ul><li>Unit Type: 3 BHK Comfort (approx. 1600 sqft) &  3 BHK Grand (approx. 1650 sqft)</li> <li>Ready to move in luxurious 3BHK Homes.</li> <li>Just 2 kms away from the Infopark and the Collectorate junction.</li> <li>World class amenities like Gymnasium, Multi-purpose hall, Swimming pool, Club theatre, Basketball, Super market, etc.</li> <li>Spread over lush open spaces and surrounded with ample green cover.</li></ul>",
        	"image_url" => "Eternity.jpg",
        	"brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/59/Purva%20Eternity%20Brochure%20new.pdf",
        	"video_url" => "https://www.youtube.com/watch?v=gfsIDwD0RGE",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 3750 - 4200 per sqft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 4000 per sqft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 3300 per sqft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        // Project::create([ 
        // 	"name" => "Purva Oceana",
        // 	"location" => "Marine Drive",
        // 	"city" => "Kochi",
        // 	"description" => "<ul><li>Unit Type: 3 BHK Apartments.</li> <li>Size: 2466 sft - 3417 sft.</li> <li>Located on the picturesque Marine Drive in Kochi.</li> <li>Housing 3 bedroom apartments with a view of the Bolgatty Palace.</li> <li>Luxurious amenities including an infinity swimming pool on the terrace.</li> <li>Other amenities include a Gymnasium, Steam & Sauna, Children Play Area, Jogging Track, etc.</li></ul>",
        // 	"image_url" => "Oceana.jpg",
        // 	"brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/12/Purva%20GrandBay%20&%20Oceana%20brochure.pdf",
        // 	"video_url" => "https://www.youtube.com/watch?v=ao9Tfd478sw",
        // 	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        // 	"market_base" => "Rs 8500 - 12000 per sqft",
        // 	"market_total" => "Rs 81.8 - 91.1 lacs",
        // 	"dev_base" => "Rs 10000 per sqft",
        // 	"dev_total" => "Rs 75.8 - 78.1 lacs",
        // 	"hdfc_base" => "Rs 8500 per sqft",
        // 	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        // ]);

        Project::create([ 
                "name" => "Purva Grandbay - Bird Sanctuary Facing",
                "location" => "Marine Drive ",
                "city" => "Kochi",
                "description" => "<ul><li>Unit Type: 3 BHK Grand (approx. 1925 sqft)</li></ul>",
                "image_url" => "Purva Grandbay.jpg",
                "brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/12/Purva%20GrandBay%20&%20Oceana%20brochure.pdf",
                "video_url" => "https://www.youtube.com/watch?v=dK9vnaXisJU",
                "banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
                "market_base" => "Rs 5200 - 6800 per sqft",
                "market_total" => "Rs 81.8 - 91.1 lacs",
                "dev_base" => "Rs 6440 per sqft",
                "dev_total" => "Rs 75.8 - 78.1 lacs",
                "hdfc_base" => "Rs 5250 per sqft",
                "hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
                "name" => "Purva Sky Condos",
                "location" => "OMR",
                "city" => "Chennai",
                "description" => "<ul><li>Unit Type: 3 BHK Grand (approx.1800 sqft)</li> <li>3 BHK Homes on OMR overlooking the Muttukadu Lake.</li> <li>World class lifestyle amenities like swimming pool, gymnasium, multi-purpose hall, squash court, Basketball, table tennis, jogging track, steam & sauna, etc.</li></ul>",
                "image_url" => "skycondos.jpg",
                "brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/10/Swanlake.pdf",
                "video_url" => "",
                "banner_text" => "",
                "market_base" => "Rs 3675 - 4500 per sqft",
                "market_total" => "Rs 81.8 - 91.1 lacs",
                "dev_base" => "Rs 4399 per sqft",
                "dev_total" => "Rs 75.8 - 78.1 lacs",
                "hdfc_base" => "Rs 3490 per sqft",
                "hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);
	}
}

