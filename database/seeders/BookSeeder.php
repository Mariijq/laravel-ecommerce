<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'ISBN' => 9780061122415,
                'title' => 'The Alchemist',
                'description' => 'A novel by Paulo Coelho that explores the journey of a young shepherd named Santiago.',
                'publishing_year' => 1988,
                'author_id' => 1,
                'category_id' => 1,
                'quantity' => 10,
                'init_price' => 9.99,
                'discount_rate' => 0.10,
                'price' => 8.99,
               
            ],
            [
                'ISBN' => 9780743273565,
                'title' => 'The Great Gatsby',
                'description' => 'A novel by F. Scott Fitzgerald about wealth and society in the Jazz Age.',
                'publishing_year' => 1925,
                'author_id' => 2,
                'category_id' => 2,
                'quantity' => 8,
                'init_price' => 12.99,
                'discount_rate' => 0.15,
                'price' => 11.04,
           
            ],
            [
                'ISBN' => 9780147514011,
                'title' => 'Little Women',
                'description' => 'A novel by Louisa May Alcott that follows the lives of four sisters growing up during the Civil War.',
                'publishing_year' => 1868,
                'author_id' => 3,
                'category_id' => 3,
                'quantity' => 5,
                'init_price' => 14.99,
                'discount_rate' => 0.20,
                'price' => 11.99,
            ],
            [
                'ISBN' => 9780545582889,
                'title' => 'Harry Potter',
                'description' => 'A fantasy series by J.K. Rowling featuring the adventures of a young wizard, Harry Potter.',
                'publishing_year' => 1997,
                'author_id' => 4,
                'category_id' => 4,
                'quantity' => 20,
                'init_price' => 29.99,
                'discount_rate' => 0.25,
                'price' => 22.49,
                
            ],
            [
                'ISBN' => 9780679745655,
                'title' => 'Breakfast at Tiffanys',
                'description' => 'A novella by Truman Capote about the free-spirited Holly Golightly.',
                'publishing_year' => 1958,
                'author_id' => 5,
                'category_id' => 5,
                'quantity' => 7,
                'init_price' => 10.99,
                'discount_rate' => 0.10,
                'price' => 9.89,
                
            ],
        ]);
    }
}
