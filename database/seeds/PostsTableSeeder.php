<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i = 0; $i < 10; $i++){
        $newpost = new Post();
        $newpost->user_id = 1;
        $newpost->title = $faker->sentence();
        $newpost->content = $faker->text(700);
        $newpost->image = $faker->imageUrl();
        $newpost->save();
      }
    }
}
