<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'isbn' => '978-1-4088-5561-1',
                'title' => 'Greek Myths',
                'stock' => 10,
                'author_id' => 1,
                'publisher_id' => 1,
                'description' => 'The Greek myths are the greatest stories ever told, passed down through millennia and inspiring writers and artists as varied as Shakespeare, Michelangelo, James Joyce and Walt Disney.',
                'image' => 'greekmyths.png'
            ],
            [
                'isbn' => '978-1-4088-5561-2',
                'title' => 'Harry Potter and the Half Blood Prince',
                'stock' => 12,
                'author_id' => 1,
                'publisher_id' => 1,
                'description' => 'When Dumbledore arrives at Privet Drive one summer night to collect Harry Potter, his wand hand is blackened and shrivelled, but he does not reveal why. Secrets and suspicion are spreading through the wizarding world, and Hogwarts itself is not safe.',
                'image' => 'halfblood.png'
            ]
        ]);
    }
}
