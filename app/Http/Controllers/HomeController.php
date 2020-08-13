<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Meal;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    private $date;
    private $year_week;
    private $days = [
        '1' => 'Pondělí',
        '2' =>  'Úterý',
        '3' =>  'Středa',
        '4' =>  'Čtvrtek',
        '5' =>  'Pátek',
        '6' =>  'Sobota',
        '7' =>  'Neděle'
    ];

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
        $this->date = new \DateTime('now');
        $this->year_week = $this->date->format('W');


        $menus = Menu::all()
            ->where('year_week', '=', $this->year_week);



        return view('home', ['menus'=>$menus,'days'=>$this->days]);
    }

    public function createOrder(Request $request){

        $userId = User::find(\auth()->id());

//        dd($request);
        $order = new Order();
        $order->user_id = $userId;
        $order->menu_id = $request->get('menu_id');
        $order->save();

        return view('home');
    }











}
