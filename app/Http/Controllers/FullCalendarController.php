<?php

namespace App\Http\Controllers;

use App\Models\FullCalendar;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    public function index(){
        return view('full-calendar.calendar');
    }
    public function store(){
        $fullcalendar = FullCalendar::get();
        dd($fullcalendar);
    }
}
