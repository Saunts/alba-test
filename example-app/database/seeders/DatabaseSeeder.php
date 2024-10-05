<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Categories::insert(["category_name"=> "Fun"]);
        \App\Models\Categories::insert(["category_name"=> "News"]);
        \App\Models\Categories::insert(["category_name"=> "Uncategorized"]);

        \App\Models\User::insert(["name"=>"Admin","email"=> "admin@admin.com","password"=> bcrypt("admin"), "role" => 'Admin']);
        \App\Models\User::factory(10)->create();

        \App\Models\Posts::insert(["title"=> "Lorem Ipsum 1","post"=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', "user_id"=> "1", "categories_id"=> "2"]);
        \App\Models\Posts::insert(["title"=> "Access Denied","post"=> 'Access Denied', "user_id"=> "1", "categories_id"=> "2", "image"=>"images/1728053197.png"]);
    }
}
