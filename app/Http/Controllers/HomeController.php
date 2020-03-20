<?php

namespace App\Http\Controllers;

use App\Covid;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $countries = Covid::distinct()->pluck('country');
        $data = Covid::selectRaw('country, sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->groupBy('country')->orderBy('confirmed', 'DESC')->get();

        $dates = Covid::groupBy('batch')->pluck('batch');

        $bd = Covid::where('country', 'Bangladesh')->get();

        foreach ($dates as $date){
            $newDate = Carbon::createFromFormat('m-d-Y',$date);
//            return $newDate->monthName;
        }




//        return $bd;

        return view('home.index', compact('data', 'bd'));

    }
}
