<?php

namespace App\Http\Controllers;

use App\Covid;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $countries = Covid::distinct()->pluck('country');
//        return $countries;
        $today = Carbon::today()->format('m-d-Y');
        $yesterday = Carbon::yesterday()->format('m-d-Y');

        $data = Covid::selectRaw('country, sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->groupBy('country')->orderBy('confirmed', 'DESC')->whereIn('batch', [$yesterday, $today])->get();


        $databydates = Covid::selectRaw('batch, sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->groupBy('batch')->orderBy('updated_at', 'ASC')->get();

//        return $databydates;

        $othersdata = Covid::selectRaw('sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->whereNotIn('country', ['China', 'Italy', 'Iran', 'Spain', 'Germany', 'US', 'France', 'Korea, South', 'Switzerland'])->whereIn('batch', [$yesterday, $today])->get();

        $summary = Covid::selectRaw('sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->whereIn('batch', [$yesterday, $today])->get();

        $bymaps = Covid::whereIn('batch', [$yesterday, $today])->select('latitude', 'longitude', 'confirmed')->get();
//        return $bymaps;


//        return $othersdata;

//        return view('layouts.master');
        return view('home.global', compact('data', 'summary', 'countries', 'othersdata', 'bymaps', 'databydates'));

    }

    public function bd(){
        $today = Carbon::today()->format('m-d-Y');
        $yesterday = Carbon::yesterday()->format('m-d-Y');

        $summary = Covid::selectRaw('sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->where('country', 'Bangladesh')->whereIn('batch', [$yesterday, $today])->get();

        $bd = Covid::where('country', 'Bangladesh')->get();


//        return view('layouts.master');
        return view('home.bangladesh', compact( 'summary','bd'));
    }
}
