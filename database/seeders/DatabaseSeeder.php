<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

Use App\Models\Profile;
Use App\Models\Phone;
Use App\Models\User;
Use App\Models\Post;
Use App\Models\Location;
Use App\Models\Category;
Use App\Models\City;
Use App\Models\Comment;
Use App\Models\Country;
Use App\Models\Github_accounts;
Use App\Models\Image;
Use App\Models\Level;
Use App\Models\State;
Use App\Models\Tag;
Use App\Models\Video;
Use App\Models\Group;
Use App\Models\Gender;


class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         */
    public function run(): void
        {
        //     \App\Models\User::factory(10)->create();

            // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);

            Group::factory(3)->create();

            Level::factory()->create(['name'=>'Oro']);
            Level::factory()->create(['name'=>'Plata']);
            Level::factory()->create(['name'=>'Bronce']);

            Gender::factory()->create(['name'=>'Male']);
            Gender::factory()->create(['name'=>'Female']);

            Country::factory()->create(['name'=>'Mexico']);
            Country::factory()->create(['name'=>'USA']);
            Country::factory()->create(['name'=>'Canada']);

            $states = [
            'Hidalgo',
            'CDMX',
            'Nuevo Leon',
            'Jalisco',
            'Puebla',
            'Baja California',
            'Guanajuato',
            'Queretaro',
            'Chihuahua',
            'Guerrero',
            'Estado de Mexico',
            'Coahuila',
            'Tamaulipas',
            'Veracruz',
            'Morelos',
            'Aguascalientes',
            'Baja California Sur',
            'Campeche',
            'Chiapas',
            'Colima',
            'Durango',
            'Michoacán',
            'Nayarit',
            'Oaxaca',
            'Quintana Roo',
            'San Luis Potosí',
            'Sinaloa',
            'Sonora',
            'Tabasco',
            'Tlaxcala',
            'Yucatán',
            'Zacatecas'
        ];

        $cities = [
            'Hidalgo' =>'Pachuca',
            'CDMX'=>'Ciudad de Mexico',
            'Nuevo Leon' =>'Monterrey',
            'Jalisco'=>'Guadalajara',
            'Puebla'=>'Puebla',
            'Baja California'=>'Tijuana',
            'Guanajuato'=>'León', 
            'Queretaro'=>'Querétaro',
            'Chihuahua'=>'Chihuahua',
            'Guerrero'=>'Chilpancingo',
            'Estado de Mexico'=>'Toluca',
            'Coahuila'=>'Saltillo',
            'Tamaulipas'=>'Ciudad Victoria',
            'Veracruz'=>'Xalapa',
            'Morelos'=>'Cuernavaca',
            'Aguascalientes'=>'Aguascalientes',
            'Baja California Sur'=>'La Paz', 
            'Campeche'=>'Campeche', 
            'Chiapas'=>'Tuxtla Gutiérrez', 
            'Colima'=>'Colima', 
            'Durango'=>'Durango', 
            'Michoacán'=>'Morelia', 
            'Nayarit'=>'Tepic',
            'Oaxaca'=>'Oaxaca', 
            'Quintana Roo'=>'Chetumal', 
            'San Luis Potosí'=>'San Luis Potosí', 
            'Sinaloa'=>'Culiacán', 
            'Sonora'=>'Hermosillo', 
            'Tabasco'=>'Villahermosa', 
            'Tlaxcala'=>'Tlaxcala',
            'Yucatán'=>'Mérida', 
            'Zacatecas'=>'Zacatecas'
        ];
        
        // foreach($cities as $cityName)
        // {
        //     City::factory()->create(['name'=>$cityName]);
        // }

        foreach($states as $stateName)
        {
            $state= State::create(['name'=>$stateName, 'country_id' => '1']);

            if(isset($cities[$stateName])){
                $cityName=$cities[$stateName];
                City::create(['name'=>$cityName, 'state_id'=>$state->id]);
            }
        }

        // foreach($states as $stateName)
        // {
        //     State::factory()->create(['name'=>$stateName]);

        //     if(isset($cities[$stateName])){
        //         $cityName=$cities[$stateName];
        //         Citty::create(['name'=>$cityName, 'state_id'=>$state->id]);
        //     }
        // }

        

        User::factory(50)->create()->each(function ($user)
        {

            $profile = $user->profile()->save(Profile::factory()->make());

            $user->phone()->save(Phone::factory()->make());

            $user->groups()->attach($this->array(rand(1,3)));

            $user->images()->save(Image::factory()->make(['url'=>'https://lorempixel.com/90/90 ']));

            //$user->;

        });

        Category::factory(4)->create();
        Tag::factory(12)->create();
        Location::factory(50)->create();

        Post::factory(40)->create()->each(function($post)
        {
            $post->image()->save(Image::factory()->make());
            $post->tags()->attach($this->array(rand(1,12)));

            $number_comments = rand(1,6);

            for ($i=0; $i < $number_comments; $i++) { 

                $post->comments()->save(Comment::factory()->make());
            }

        });


        Video::factory(40)->create()->each(function($video)
        {
            $video->image()->save(Image::factory()->make());
            $video->tags()->attach($this->array(rand(1,12)));

            $number_comments = rand(1,6);

            for ($i=0; $i < $number_comments; $i++) { 

                $video->comments()->save(Comment::factory()->make());
            }

        });

        // Profile::factory(50)->create()->each(function($profile)
        // {
        //     $profile->location()->save(Location::factory()->make());
        // });
    }

    //Función grupos aleatorios
    public function array($max)
    {
        $values=[];

        for ($i=1; $i < $max; $i++) { 
            $values[] = $i;
        }
        return $values;
    }
}



    
