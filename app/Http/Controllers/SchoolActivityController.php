<?php

namespace App\Http\Controllers;

use MaddHatter\LaravelFullcalendar\Facades\Calendar;

use Illuminate\Http\Request;
use App\SchoolActivity;


class SchoolActivityController extends Controller
{
    public function index()
            {
                $events = [];
                $data = SchoolActivity::all();
                if($data->count())
                 {
                    foreach ($data as $key => $value) 
                    {
                        $events[] = Calendar::event(
                            $value->title,
                            true,
                            new \DateTime($value->start_date),
                            new \DateTime($value->end_date.'+1 day'),
                            null,
                            // Add color
                         [
                             'color' => 'dodgerblue',
                             'textColor' => 'black',
                             'url' => 'activities/'. $value->id
                         ]                             
                        );
                    }
                }
                $calendar = Calendar::addEvents($events);
                return view('activities.index', compact('calendar'));
            }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $school_act= new SchoolActivity();
        $school_act->title=$request->get('title');
        $school_act->details=$request->get('details');
        $school_act->start_date=$request->get('startdate');
        $school_act->end_date=$request->get('enddate');
        $school_act->save();
    
        $m = 'Activity ' . $request->get('title'). ' created successfully!';
        return redirect('activities')->with('success', $m);
    }
}
