<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            'business_name' => 'Matt\'s Hot Tubs',
            'contact_name' => 'Matt'
        ]);

        DB::table('contacts')->insert([
            'business_name' => 'Kieran\'s Pool Services',
            'contact_name' => 'Kieran'
        ]);

        DB::table('contacts')->insert([
            'business_name' => 'Hot Tubs Yorkshire',
            'contact_name' => 'Yorky'
        ]);

        DB::table('contacts')->insert([
            'business_name' => 'Devonshire Spas',
            'contact_name' => 'Devon'
        ]);

        DB::table('contacts')->insert([
            'business_name' => 'Durham Pool and Spas',
            'contact_name' => 'Jane'
        ]);
    }
}
