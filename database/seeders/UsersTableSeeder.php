<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insertGetId([
            'name' => 'admin',
            'email' => 'admin@blog.com',
            'password' => Hash::make('12345678'),
        ]);

        $response = Http::get('https://sq1-api-test.herokuapp.com/posts')->object()->data;

        foreach($response as $post) {
            DB::table('posts')->insert([
                'user_id' => $user,
                'title' => $post->title,
                'description' => $post->description,
                'created_at' => $post->publication_date,
            ]);
        }
    }
}
