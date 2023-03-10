<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\activities_responses;
use App\Models\User;
use Illuminate\Http\Request;

class ResponseAlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $users = User::with('student')->get()->where('activities_id', $id);
        // dd($users);
        $buscarAlunos = activities_responses::with('user')->get()->where('activities_id', $id);
        return view('response.alunos', compact('buscarAlunos'));
    }

    public function image($id){
        $activitiesImage = activities_responses::find($id);
        return $activitiesImage;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $checkoutActivities = activities_responses::find($id);
        return view('response.create', compact('checkoutActivities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $checkoutActivities = activities_responses::find($id);
        $checkoutActivities->update([
            'check' => 1,
            'note' => $request->note
        ]);
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
