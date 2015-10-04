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
        	"description" => "<ul> <li>Unit type – 2 BHK , 3BHK Apartments.</li> <li>Size: 1340 sft , 1665 sft  and 1843 sft</li></ul>",
        	"image_url" => "Harmony.jpg",
        	"brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/64/Gold_Crest%20e-Brochure.pdf",
        	"video_url" => "https://www.youtube.com/watch?v=DknF7HT6kW4",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 5100 - 6350 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 5220  psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 4250 psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Purva Skywood",
        	"location" => "OFF SARJAPUR ROAD",
        	"city" => "Bangalore",
        	"description" => "<ul><li>Large 3&4 BHK apartments</li> <li>Located off Sarjapur Rd, 3 Kms from HSR layout.</li> <li>15 mins to Koramangala</li> <li>4 Km from Sarjapur-ORR junction</li> <li>5 Km from Electonic city.</li> <li>Plethora of innovative amenities</li></ul>",
        	"image_url" => "Skywood.jpg",
        	"brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/3/E-brochure%20Skywood.pdf",
        	"video_url" => "",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 5000 - 6400 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 6400 psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 5500 psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Provident Welworth City",
        	"location" => "YELAHANKA, DODDABALLAPUR ROAD",
        	"city" => "Bangalore",
        	"description" => "<ul><li>Unit Type: 3 BHK Apartments.</li> <li>Size: 1075 sft.</li> <li>Located near Bangalore International Airport.</li> <li>Just minutes away from Corporate hubs like ITIR, Apparel Park, Aerospace SEZ etc.</li> <li>Direct connectivity to one of the busiest upcoming commercial hubs, Hebbal.</li> <li>Equipped with all modern lifestyle amenities including a 9000 sft swimming pool.</li></ul>",
        	"image_url" => "Welworth.jpg",
        	"brochure_url" => "http://www.providenthousing.com/wp-content/uploads/2013/02/Provident_Welworthcity_ebrochure.pdf?379a83",
        	"video_url" => "https://www.youtube.com/watch?v=4xl4zRSA0Zk",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 3600 - 4400 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 3654 psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 3150 psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Purva Swanlake",
        	"location" => "OMR",
        	"city" => "Chennai",
        	"description" => "<ul><li>Unit Type: 3 BHK Apartments.</li> <li>Size: 1699 sft - 1805 sft.</li> <li>3 BHK Homes on OMR overlooking the Muttukadu Lake.</li> <li>World class lifestyle amenities like swimming pool, gymnasium, multi-purpose hall, squash court, Basketball, table tennis, jogging track, steam & sauna, etc.</li></ul>",
        	"image_url" => "Swanlake.jpg",
        	"brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/10/Swanlake.pdf",
        	"video_url" => "",
        	"banner_text" => "",
        	"market_base" => "Rs 3675 - 4500 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "RS 4199 psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 3250 psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Purva Eternity",
        	"location" => "KAKKANAD",
        	"city" => "Kochi",
        	"description" => "<ul><li>Unit Type: 3 BHK Apartments.</li> <li>Size: 1595 sft - 1742 sft.</li> <li>Ready to move in luxurious 3BHK Homes.</li> <li>Just 2 kms away from the Infopark and the Collectorate junction.</li> <li>World class amenities like Gymnasium, Multi-purpose hall, Swimming pool, Club theatre, Basketball, Super market, etc.</li> <li>Spread over lush open spaces and surrounded with ample green cover.</li></ul>",
        	"image_url" => "Eternity.jpg",
        	"brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/59/Purva%20Eternity%20Brochure%20new.pdf",
        	"video_url" => "https://www.youtube.com/watch?v=gfsIDwD0RGE",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 3750 - 4200 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 4000 psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 3300 psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
        	"name" => "Purva Oceana",
        	"location" => "MARINE DRIVE",
        	"city" => "Kochi",
        	"description" => "<ul><li>Unit Type: 3 BHK Apartments.</li> <li>Size: 2466 sft - 3417 sft.</li> <li>Located on the picturesque Marine Drive in Kochi.</li> <li>Housing 3 bedroom apartments with a view of the Bolgatty Palace.</li> <li>Luxurious amenities including an infinity swimming pool on the terrace.</li> <li>Other amenities include a Gymnasium, Steam & Sauna, Children Play Area, Jogging Track, etc.</li></ul>",
        	"image_url" => "Oceana.jpg",
        	"brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/12/Purva%20GrandBay%20&%20Oceana%20brochure.pdf",
        	"video_url" => "https://www.youtube.com/watch?v=ao9Tfd478sw",
        	"banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
        	"market_base" => "Rs 8500 - 12000 psft",
        	"market_total" => "Rs 81.8 - 91.1 lacs",
        	"dev_base" => "Rs 10000 psft",
        	"dev_total" => "Rs 75.8 - 78.1 lacs",
        	"hdfc_base" => "Rs 8500 psft",
        	"hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);

        Project::create([ 
                "name" => "Purva Grandbay - Bird Sanctuary Facing",
                "location" => "MARINE DRIVE ",
                "city" => "Kochi",
                "description" => "<ul><li>Unit Type: 3 BHK Apartments</li> <li>Size: 1885 sft - 1933 sft</li></ul>",
                "image_url" => "Purva Grandbay.jpg",
                "brochure_url" => "http://www.puravankara.com/Areas/Microsite/Content/Documents/Broucher/12/Purva%20GrandBay%20&%20Oceana%20brochure.pdf",
                "video_url" => "https://www.youtube.com/watch?v=dK9vnaXisJU",
                "banner_text" => "SAVE RS. 4.6 LAKHS (Approx)",
                "market_base" => "Rs 5200 - 6800 psft",
                "market_total" => "Rs 81.8 - 91.1 lacs",
                "dev_base" => "Rs 6440 psft",
                "dev_total" => "Rs 75.8 - 78.1 lacs",
                "hdfc_base" => "Rs 5250 psft",
                "hdfc_total" => "Rs 74.7- 77.7 lacs",
        ]);
	}
}

