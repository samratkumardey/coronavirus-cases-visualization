<?php

namespace App\Http\Controllers;

use App\Covid;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $today = Carbon::today()->format('m-d-Y');
        $yesterday = Carbon::yesterday()->format('m-d-Y');

        $countries = Covid::distinct()->where('batch', $yesterday)->pluck('country');
//        return $countries;

        $data = Covid::selectRaw('country, sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->groupBy('country')->orderBy('confirmed', 'DESC')->where('batch', $yesterday)->get();


        $databydates = Covid::selectRaw('batch, sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->groupBy('batch')->orderBy('updated_at', 'ASC')->get();

//        return $databydates;

        $othersdata = Covid::selectRaw('sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->whereNotIn('country', ['China', 'Italy', 'Iran', 'Spain', 'Germany', 'US', 'France', 'Korea, South', 'Switzerland'])->where('batch', $yesterday)->get();

        $summary = Covid::selectRaw('sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->where('batch', $yesterday)->get();

        $bymaps = Covid::where('batch', $yesterday)->select('latitude', 'longitude', 'confirmed')->get();
        $lastupdate = Covid::select('batch', 'updated_at')->orderBy('updated_at', 'DESC')->first();

        return view('home.global', compact('data', 'summary', 'countries', 'othersdata', 'bymaps', 'databydates', 'lastupdate'));

    }

    public function bd(){
        $today = Carbon::today()->format('m-d-Y');
        $yesterday = Carbon::yesterday()->format('m-d-Y');

        $summary = Covid::selectRaw('sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->where('country', 'Bangladesh')->whereIn('batch', [$yesterday, $today])->get();

        $bd = Covid::where('country', 'Bangladesh')->get();
        $lastupdate = Covid::select('batch', 'updated_at')->orderBy('updated_at', 'DESC')->first();


//        return view('layouts.master');
        return view('home.bangladesh', compact( 'summary','bd', 'lastupdate'));
    }
}
