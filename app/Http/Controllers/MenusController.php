<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();

        return view('admin.menus.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meals = Meal::all();

        return view('admin.menus.create', ['meals'=>$meals]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;

        $menu->meal_id = $request->get('meals');
        $menu->meal_type = $request->get('meal_type');
        $menu->menu_date = $request->get('date');
        $menu->year_week = $this->getYearWeek($request->get('date'));
        $menu->week_day = $this->getDayOfWeek($request->get('date'));


        $menu->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    private function getYearWeek($date){
        $ddate = new \DateTime($date);
        $week = $ddate->format('W');

        return $week;


    }

    private function getDayOfWeek($date){
        $dayofweek = date('w', strtotime($date));
        return $dayofweek;
    }
}
