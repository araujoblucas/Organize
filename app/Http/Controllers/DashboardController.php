<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

/*        for($i = 0; $i < 7; $i++) {
            $tasks[$i]['desc'] = $faker->sentence(3);
            $tasks[$i]['date'] = $faker->date();
            $tasks[$i]['paid'] = $faker->boolean();
        }*/


        $tasks = DB::table('tasks')->where('owner_id', '=', Auth::user()->id)
                    ->where('isActive', '=', true)
                    ->where('updated_at', '<=', Carbon::now())
                    ->orderBy('completed', 'asc')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(7);
        return view('dashboard', ['datas' => $datas, 'tasks' => $tasks]);
    }
}
