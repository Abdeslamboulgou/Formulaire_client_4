<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seller;


class CreateSellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seller= [
            [  'uid'=>'ref1',
               'email'=>'millim@gmail.com',
               'hasSite'=>1,
               'negoSite' =>1,
               'teamContact' =>1,
               'adressUrl' => 'http://www',
            ]
        ];
        foreach ($seller as $key => $sel) {
           Seller::create($sel);
        }
    }
}
