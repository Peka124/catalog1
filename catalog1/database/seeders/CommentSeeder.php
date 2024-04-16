<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments=[
            ["name"=>"Djorjde", "email", "djordje@gmail.com", "text"=>"All Your products are very good"],
            ["name"=>"Lazar", "email", "lazar@gmail.com", "text"=>"All Your products are very nice"],
            ["name"=>"Milan", "email", "milan@gmail.com", "text"=>"All Your products are cheap"],
        ];

        foreach($comments as $comment)
        {
            Comment::create($comment);
        }
    }
}
