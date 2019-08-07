<?php

use Illuminate\Database\Seeder;
use App\Officer;
class OfficersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
		    [
		    	"id"=>1,
		    	"name"=>"KONIRI",
        		"image"=>"officer/KONIRI.jpg",
        		"no_wa"=>"087727584323",
        		"address"=>"",
        		"description"=>""
        	],

        	[
		    	"id"=>2,
		    	"name"=>"QODIR",
        		"image"=>"officer/QODIR.jpg",
        		"no_wa"=>"087718863820",
        		"address"=>"",
        		"description"=>""
        	],
            [
                "id"=>3,
                "name"=>"RIGWAN",
                "image"=>"officer/RIGWAN.jpg",
                "no_wa"=>"081807953082",
                "address"=>"",
                "description"=>""
            ],

            [
                "id"=>4,
                "name"=>"SAKUDIN",
                "image"=>"officer/SAKUDIN.jpg",
                "no_wa"=>"081947257240",
                "address"=>"",
                "description"=>""
            ],
            [
                "id"=>5,
                "name"=>"YANA",
                "image"=>"officer/YANA.jpg",
                "no_wa"=>"087760711755",
                "address"=>"",
                "description"=>""
            ],
            [
                "id"=>6,
                "name"=>"KASMIDI",
                "image"=>"KASMIDI.jpg",
                "no_wa"=>"087760732799",
                "address"=>"",
                "description"=>""
            ],

		];

        Officer::insert($data);		
    }
}
