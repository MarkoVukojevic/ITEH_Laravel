<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Processor;
use Illuminate\Database\Seeder;
use App\Models\Smartphone;
use App\Models\Manufacturer;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::truncate();
        Manufacturer::truncate();
        Processor::truncate();
        Smartphone::truncate();

        User::factory(10)->create();

        Manufacturer::insert([
            [
                "name" => "Samsung",
                "city" => "Tokyo",
                "CEO" => "Jim Rosenberg"
            ],
            [
                "name" => "iPhone",
                "city" => "Miami",
                "CEO" => "Steve Jobs"
            ],
            [
                "name" => "Xiaomi",
                "city" => "Bejing",
                "CEO" => "Johny Sins"
            ]
        ]);

        Processor::insert([
            [
                "name" => "Intel i9",
                "number_of_cores" => 6,
                "is_overclockable" => true,
                "architecture" => "x86 architecture with multi GPU design on 5nm node.",
                "frequency" => 4.2
            ],
            [
                "name" => "AMD R5",
                "number_of_cores" => 6,
                "is_overclockable" => true,
                "architecture" => "AMD LGA with low latency cache memory inside.",
                "frequency" => 5.5
            ],
            [
                "name" => "Apple M1",
                "number_of_cores" => 4,
                "is_overclockable" => false,
                "architecture" => "New Apple ARM design with multiple chiplets inside.",
                "frequency" => 6.5
            ]
        ]);


        $smartphone_1 = new Smartphone;
        $smartphone_1->model_name = "Galaxy S23";
        $smartphone_1->color = "Midnight Ebony Black";
        $smartphone_1->description = "Best selling Android phone in 2023.";
        $smartphone_1->price = "86421";
        $smartphone_1->battery = "5100";
        $smartphone_1->manufacturer_id = 1;
        $smartphone_1->processor_id = 1;
        $smartphone_1->save();

        Smartphone::create([
            "model_name" => "11 Pro Max",
            "color" => "Black",
            "description" => "iPhone that introduced third camera.",
            "price" => "82084",
            "battery" => "3500",
            "manufacturer_id" => 2,
            "processor_id" => 2
        ]);
    }
}
