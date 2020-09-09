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

        $orders = DB::table('orders')
            ->where('user_id', '=', $this->user_id->id)
            ->join('menus', 'orders.menu_id', '=', 'menus.id')
            ->join('meals', 'menus.meal_id', '=', 'meals.id')
            ->where('menus.year_week', '=', $this->year_week)
            ->select('orders.*', 'menus.*', 'meals.name')
            ->get();

        $menus = Menu::all()
            ->where('year_week', '=', $this->year_week);

        $this->makeDates();

        return view('home', ['menus'=>$menus, 'orders' => $orders,'dates'=> $this->dates]);
    }

    public function createOrder(Request $request){
        dd($request);
        $this->user_id = User::find(\auth()->id());
        if ($request->get('menu_id') == null ){
            return redirect()->route('home');

        }elseif($this->validateDuplicity($request, $this->user_id)) {
            $this->ordersStore($request, $this->user_id);
        }else return redirect()->route('home');


    }

    public function ordersStore(Request $request, $user_id){
        if ($this->findDuplicityOrder($request, $user_id)){
            $order = new Order;
            $order->user_id = $user_id->id;
            $order->menu_id = $request->get('menu_id');
            $order->save();
        }else{
            echo '<script type="text/javascript">alert("Již máte objednáno! \n Pro objednání jídla je nutno odebrat stávající.")</script>';
        }
        return redirect()->route('home');
    }

    private function makeDates(){

        for ($i = 1; $i<=7; $i++){
            $gendate = new \DateTime();
            $gendate->setISODate($this->year, $this->year_week, $this->dates[$i-1][0]);
            $this->dates[$i-1][2] = $gendate->format('d. m.');
        }
    }

    private function validateDuplicity(Request $request, $user_id){
        $this->user_id = User::find(\auth()->id());
        $validator = Order::all()
            ->where('user_id', '=', $user_id)
            ->where('menu_id', '=', $request->get('menu_id'));
        if ($validator==""){
            return false;
        }else return true;

    }

    //Najdi objednávku na stávající den, oběd/večeře
    private function findDuplicityOrder(Request $request, $user_id){
        $newOrder = DB::table('orders')
            ->where('user_id', '=', $user_id)
            ->join('menus', 'orders.menu_id', '=', 'menus.id')
            ->where('menus.id', '=', $request->get('menu_id'))
            ->select('menus.menu_date','menus.meal_type')
            ->get();

        $existingOrder = DB::table('orders')
            ->where('user_id', '=', $user_id)
            ->join('menus', 'orders.menu_id', '=', 'menus.id')
            ->where('menus.menu_date', '=', $newOrder->get('menu_date'))
            ->where('menus.meal_type', '=', $newOrder->get('meal_type'))
            ->get();


        if ($existingOrder=="") return false;
        else return true;
    }

//    private function validate(Request $request, $user_id){
//        if ($request->get('menu_id') == null ){
//            return false;
//
//        }elseif($this->validateDuplicity($request)) {
//            if ($this->findDuplicityOrder($request, $user_id)){
//
//            }
//        }else return redirect()->route('home');
//    }








}
