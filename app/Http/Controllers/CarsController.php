<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;
use DB;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Cars::paginate(10);
        return view('cars.cars')->with('cars', $cars);
    }

    public function search(Request $request)
    {
        $brand = $request->brand;
        $model = $request->model;
        $year = $request->year;
        $avail = $request->available;

        $car = Cars::where([
            ['brand','LIKE','%'.$brand.'%'],
            ['model','LIKE','%'.$model.'%'],
            ['year','>=',$year],
            ['availability','=',$avail],
        ])->paginate(10);
        
        return view('cars.table')->with('cars',$car)->render(); // extra
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
        $car = Cars::find($id);
        return view('cars.show')->with('car', $car);
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
