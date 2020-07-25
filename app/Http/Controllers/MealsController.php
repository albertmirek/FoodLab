<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::all();
        return view('admin.meals.index', ['meals'=>$meals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $meal = new Meal;
        $meal->name = $request->get('name');
        $meal->save();

        session()->flash('meal-created-message', 'Byl vytvořen nový záznam s názvem: "' .$request->get('name') . '"');
        return redirect()->route('meal.index');
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
    public function edit(Meal $meal)
    {
        return view('admin.meals.edit',['meal' => $meal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Meal $meal, Request $request)
    {
        $meal->name = $request->get('name');
        $meal->save();

        session()->flash('meal-updated-message','Jídlo s názvem: "'. $request->get('name'). '" bylo upraveno');
        return redirect()->route('meal.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal, Request $request)
    {
        $meal->delete();

        $request->session()->flash('message','Záznam byl smazán');
        //Session::flash('message','Post was deleted');

        return back();
    }
}
