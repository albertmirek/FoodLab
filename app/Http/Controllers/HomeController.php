<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Meal;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;
use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    private $user_id;
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
    private $dates = array(
        array(1, "Pondělí"),
        array(2, "Úterý"),
        array(3, "Středa"),
        array(4, "Čtvrtek"),
        array(5, "Pátek"),
        array(6, "Sobota"),
        array(7, "Neděle")
    );
    private $year = 2020;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->date = new \DateTime('now');
        $this->year_week = $this->date->format('W');


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->user_id = User::find(\auth()->id());
        $orders = Order::all()
            ->where('user_id', '=', $this->user_id->id);

        $menus = Menu::all()
            ->where('year_week', '=', $this->year_week);

        $this->makeDates($this->dates, $this->year_week);

        return view('home', ['menus'=>$menus,'days'=>$this->days, 'orders' => $orders,'dates'=> $this->dates]);
    }

    public function createOrder(Request $request){

        if ($request->menu_id == null){
            return $this->index();
        }else{
            $order = new Order;
            $order->user_id = $this->user_id;
            $order->menu_id = $request->get('menu_id');
            $order->save();

            return $this->index();
        }

    }

    public function nextWeek($yearweek){

        $this->year_week++;

        return $this->index();
    }

    private function makeDates(Array $arg, $arg2){

        for ($i = 1; $i<=7; $i++){
            $gendate = new \DateTime();
            $gendate->setISODate($this->year, $this->year_week, $this->dates[$i-1][0]);
            $this->dates[$i-1][2] = $gendate->format('d. m.');
        }
    }









}
