<?php

use Illuminate\Database\Seeder;
use App\Post;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::insert([
            [
                'user_id' => 1,
                'title' => 'Ini Adalah Postingan Admin Ketiga',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque nihil aut expedita, ipsa et ipsum asperiores totam obcaecati quod vero aperiam, nisi ab ipsam? Facere et architecto eveniet iusto? Cupiditate rerum ducimus repellat quis. Repellat reiciendis dolor tempora fugiat ullam ducimus cum voluptates rem sed perspiciatis. Libero eveniet tenetur praesentium magni esse sit natus. Fugit nisi corrupti dolorem commodi hic doloremque reprehenderit. Asperiores assumenda ab, ea quisquam molestiae iure eligendi, corrupti eaque beatae possimus delectus eius minus! Beatae laboriosam ratione modi tempore delectus dolore vel libero rem ad maxime eveniet fuga saepe cum, provident assumenda aliquid. Illo laborum labore excepturi.',
                'slug' => 'ini-adalah-postingan-admin-ketiga',
                'created_at' => Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
