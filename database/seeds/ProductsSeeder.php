<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
            'name' => 'Samsung Galaxy S9',
            'photo' => 'https://i.ebayimg.com/00/s/ODY0WDgwMA==/z/9S4AAOSwMZRanqb7/$_35.JPG?set_id=89040003C1',
            'price' => 698.88,
            'unit'=>'piece',
            'provider_id'=>1
        ]);

        DB::table('products')->insert([
            'name' => 'Apple iPhone X',
            'photo' => 'https://i.ebayimg.com/00/s/MTYwMFg5OTU=/z/9UAAAOSwFyhaFXZJ/$_35.JPG?set_id=89040003C1',
            'price' => 983.00,
            'unit'=>'piece',
            'provider_id'=>1
        ]);

        DB::table('products')->insert([
            'name' => 'Google Pixel 2 XL',
            'photo' => 'https://i.ebayimg.com/00/s/MTYwMFg4MzA=/z/G2YAAOSwUJlZ4yQd/$_35.JPG?set_id=89040003C1',
            'price' => 675.00,
            'unit'=>'piece',
            'provider_id'=>1
        ]);

        DB::table('products')->insert([
            'name' => 'LG V10 H900',
            'photo' => 'https://i.ebayimg.com/00/s/NjQxWDQyNA==/z/VDoAAOSwgk1XF2oo/$_35.JPG?set_id=89040003C1',
            'price' => 159.99,
            'unit'=>'piece',
            'provider_id'=>1
        ]);

        DB::table('products')->insert([
            'name' => 'Huawei Elate',
            'photo' => 'https://ssli.ebayimg.com/images/g/aJ0AAOSw7zlaldY2/s-l640.jpg',
            'price' => 68.00,
            'unit'=>'piece',
            'provider_id'=>1
        ]);

        DB::table('products')->insert([
            'name' => 'HTC One M10',
            'photo' => 'https://i.ebayimg.com/images/g/u-kAAOSw9p9aXNyf/s-l500.jpg',
            'price' => 129.99,
            'unit'=>'piece',
            'provider_id'=>1
        ]);
    }
}
