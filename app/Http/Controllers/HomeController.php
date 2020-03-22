<?php

namespace App\Http\Controllers;

use App\BangladeshCovid;
use App\Covid;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $today = Carbon::today()->format('m-d-Y');
        $yesterday = Carbon::yesterday()->format('m-d-Y');
        $lastupdate = Covid::select('batch', 'updated_at')->orderBy('updated_at', 'DESC')->first();
//        return $lastupdate->batch;

        $countries = Covid::distinct()->where('batch', $lastupdate->batch)->pluck('country');
//        return $countries;

        $data = Covid::selectRaw('country, sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->groupBy('country')->orderBy('confirmed', 'DESC')->where('batch', '=', $lastupdate->batch)->get();


        $databydates = Covid::selectRaw('batch, sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->groupBy('batch')->orderBy('updated_at', 'ASC')->get();

//        return $databydates;

        $othersdata = Covid::selectRaw('sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->whereNotIn('country', ['China', 'Italy', 'Iran', 'Spain', 'Germany', 'US', 'France', 'Korea, South', 'Switzerland'])->where('batch', $lastupdate->batch)->get();

        $summary = Covid::selectRaw('sum(confirmed) as confirmed, sum(deaths) as deaths, sum(recovered) as recovered')->where('batch', $lastupdate->batch)->get();

        $bymaps = Covid::where('batch', $lastupdate->batch)->select('latitude', 'longitude', 'confirmed')->get();
        $lastupdate = Covid::select('batch', 'updated_at')->orderBy('updated_at', 'DESC')->first();

        return view('home.global', compact('data', 'summary', 'countries', 'othersdata', 'bymaps', 'databydates', 'lastupdate'));

    }

    public function bd(){
        $lastupdate = Covid::select('batch', 'updated_at')->orderBy('updated_at', 'DESC')->first();

        $summary = Covid::select('confirmed', 'deaths', 'recovered')->where('country', 'Bangladesh')->where('batch', '=', $lastupdate->batch)->get();

        $current = BangladeshCovid::orderBy('id', 'DESC')->first();
        $past = BangladeshCovid::whereDate('updated_at', '<', Carbon::now()->subHour(24))->orderBy('id', 'DESC')->first();


        $bd = Covid::where('country', 'Bangladesh')->get();



//        return view('layouts.master');
        return view('home.bangladesh', compact( 'summary','bd', 'lastupdate', 'current', 'past'));
    }


    public function info(){
        return view('home.info');
    }
    public function map(){
        return view('home.map');
    }
}
