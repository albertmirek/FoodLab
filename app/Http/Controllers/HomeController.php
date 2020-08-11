<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Meal;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $days = [
            '1' => 'Pondělí',
            '2' =>  'Úterý',
            '3' =>  'Středa',
            '4' =>  'Čtvrtek',
            '5' =>  'Pátek',
            '6' =>  'Sobota',
            '7' =>  'Neděle'
        ];

        $dates = [
            '1' => 'Pondělí',
            '2' =>  'Úterý',
            '3' =>  'Středa',
            '4' =>  'Čtvrtek',
            '5' =>  'Pátek',
            '6' =>  'Sobota',
            '7' =>  'Neděle'
        ];

        $date = new \DateTime('now');
        $week = $date->format('W');

        $menus = Menu::all()
            ->where('year_week', '=', $week);

        return view('home', ['menus'=>$menus,'days'=>$days]);
    }
}
