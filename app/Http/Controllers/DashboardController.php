<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class DashboardController extends Controller
{
    public function index()
    {
        $faker = Faker::create();

        for($i = 0; $i < 7; $i++) {
            $datas[$i]['desc'] = $faker->sentence(3);
            $datas[$i]['price'] = $faker->randomNumber(3);
            $datas[$i]['date'] = $faker->date();
            $datas[$i]['paid'] = $faker->boolean();
        }
        return view('dashboard', ['datas' => $datas]);
    }
}
