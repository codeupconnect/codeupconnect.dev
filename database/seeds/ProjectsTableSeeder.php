<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    // Project::ungaurd();
        $data = [
    		[
	    		'organization_name' => 'United Way',
	            'point_person' => 'United Way',
	            'email' => 'united@way.com',
	            'project_details' => 'Add feature to existing website to take donations.',
    		],
    		[
    			'organization_name' => '80/20 Foundation',
	            'point_person' => 'Contact Person',
	            'email' => 'contact@person.com',
	            'project_details' => 'Need a website for a small charity helping kids learn to code.',
    		],
    		[
    			'organization_name' => 'Womens Shelter of San Antonio',
	            'point_person' => 'Womens Shelter',
	            'email' => 'women@shelter.com',
	            'project_details' => 'Need a landing page built for community page',
    		],
    		[
    			'organization_name' => 'Haven for Hope',
	            'point_person' => 'Hope Haven',
	            'email' => 'Hope@haven.com',
	            'project_details' => 'Want to update our website',
    		],
    		[
    			'organization_name' => 'San Antonio Area Foundation',
	            'point_person' => 'Antonio Area',
	            'email' => 'Antonio@area.com',
	            'project_details' => 'Need to make our site mobile responsive',
    		],
    		[
		    	'organization_name' => 'Humane Society of San Antonio',
		        'point_person' => 'Humane Society',
		        'email' => 'humane@society.com',
		        'project_details' => 'Need help integrating to a photo api',
    		],
    		[
    			'organization_name' => 'Grace House of San Antonio',
	            'point_person' => 'Grace House',
	            'email' => 'grace@house.com',
	            'project_details' => 'We would like to build a new website for our charity',
    		],
    		
    	];
		foreach($data as $project) {
			App\Project::create($project);
		}    
    }
}
