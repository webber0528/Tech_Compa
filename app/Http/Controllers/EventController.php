<?php

namespace App\Http\Controllers;

use App\Models\Event;

use App\Http\Requests\EventRequest;



class EventController extends Controller
{
    public function index(Event $event)
    {
        return view('events/index')->with(['events'=> $event->getPaginateByLimit()]);
    }
    
    public function show(Event $event)
    {
        return view('events/show')->with(['event'=> $event]);
        
    }
    
    public function create()
    {
        return view('events/create');
    }
    
    public function store(Event $event, EventRequest $request)
    {
        $input = $request['event'];
        $event->fill($input)->save();
        return redirect('/events/'. $event->id);
    }
    
    public function edit(Event $event)
    {
        return view('events/edit')->with(['event'=> $event]);
    }
    
    public function update(EventRequest $request, Event $event)
    {
        $input = $request['event'];
        $event->fill($input)->save();
        return redirect('/events/'. $event->id);
    }
    
    public function delete(Event $event)
    {
        $event->delete();
        return redirect('/');
    }
    
     
    //
}
