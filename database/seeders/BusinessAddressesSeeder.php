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
                'address' => '3 Matlock Road, Chaddesden, Derby, UK',
                'contacts_id' => 1,
                'billing' => 0,
                'shipping' => 0
            ]);

            DB::table('business_addresses')->insert([
                'address' => '5 Oakenclough Road, Preston, UK',
                'contacts_id' => 2,
                'billing' => 0,
                'shipping' => 0
            ]);

            DB::table('business_addresses')->insert([
                'address' => '66 York Road, Haxby, York, UK',
                'contacts_id' => 3,
                'billing' => 0,
                'shipping' => 0
            ]);

            DB::table('business_addresses')->insert([
                'address' => '1 Vicarage Road, Bude, UK',
                'contacts_id' => 4,
                'billing' => 0,
                'shipping' => 0
            ]);

            DB::table('business_addresses')->insert([
                'address' => '40 North Rd, Durham, UK',
                'contacts_id' => 5,
                'billing' => 0,
                'shipping' => 0
            ]);
        }

    }
}
