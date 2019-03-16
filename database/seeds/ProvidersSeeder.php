<?php

use Illuminate\Database\Seeder;

class ProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            'name'=>'Provider',
            'email'=>'provider@tibah.co',
            'password'=>bcrypt('123456'),
        ]);
    }
}
