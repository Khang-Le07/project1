<?php
declare(strict_types=1);
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title'=>'Test Post',
                'img_path' =>'empty',
                'body'=>'This is a test post body',
                'is_published'=>false,
            ],
            [
                'title'=>'Test Post 2',
                'img_path' =>'empty',
                'body'=>'This is a test post body 2',
                'is_published'=>false,
            ],
        ];
        foreach ($posts as $post =>$value){
            Post::create($value);
        }
    }
}
