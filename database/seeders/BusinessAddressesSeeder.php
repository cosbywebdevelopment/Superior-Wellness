<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessAddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($x = 0; $x <= 2; $x++){
            DB::table('business_addresses')->insert([
                'address' => 'Matt\'s Hot Tubs',
                'contacts_id' => 1,
                'billing' => 0,
                'shipping' => 0
            ]);

            DB::table('business_addresses')->insert([
                'address' => 'Kieran\'s Pool Services',
                'contacts_id' => 2,
                'billing' => 0,
                'shipping' => 0
            ]);

            DB::table('business_addresses')->insert([
                'address' => 'Hot Tubs Yorkshire',
                'contacts_id' => 3,
                'billing' => 0,
                'shipping' => 0
            ]);

            DB::table('business_addresses')->insert([
                'address' => 'Devonshire Spas',
                'contacts_id' => 4,
                'billing' => 0,
                'shipping' => 0
            ]);

            DB::table('business_addresses')->insert([
                'address' => 'Durham Pool and Spas',
                'contacts_id' => 5,
                'billing' => 0,
                'shipping' => 0
            ]);
        }

    }
}
