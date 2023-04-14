<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\activities_responses;
use App\Models\Disciplines;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Disciplines::query();
        if($request->has('name')){
            $query->where('name', $request->name);
        }
        return $query->paginate(1);
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
return response()->json(activities_responses::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $disciplines)
    {
        $disciplines = Disciplines::find($disciplines);
        if($disciplines === null){
            return response()->json(['message' => 'Series not found'], 404);
        }
        return $disciplines;
        // $series = Activities::whereId($id)->with('activity')->get();  
        // return $series;
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
    public function update(Disciplines $disciplines, Request $request, $id)
    {
        $disciplines->find($id)->update($request->all());
        return $disciplines;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $disciplines)
    {
        Disciplines::destroy($disciplines);
        return response()->noContent();
    }

    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn ($check) => (bool) $check, 
        );
    }
}
