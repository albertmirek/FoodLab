<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');

        $this->date = new \DateTime('now');
        $this->year_week = $this->date->format('W');

        $this->user_id = User::find(\auth()->id());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
