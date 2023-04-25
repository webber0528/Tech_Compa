<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Auth;
use Cloudinary;


class EventController extends Controller
{
    public function index(Event $event)
    {
        return view('events/index')->with(['events'=> $event->get()]);
    }
    
    public function show(Event $event)
    {
        return view('events/show')->with(['event'=> $event]);
        
    }
    
    public function create()
    {
        return view('events/create');
    }
    
    public function store(Event $event, EventRequest $request )
    {
       
        $input = $request['event'];
        $event->user_id = Auth::user()->id;
        $img = $request->file('image');
        
       
        if($img != null)
        {
            $event['image'] = Cloudinary::upload($img->getRealPath())->getSecurePath();
            
        }
        $event->fill($input)->save();
        
        return redirect('/events/'. $event->id);
        
    }
    
    public function edit(Event $event)
    {
        
        return view('events/edit')->with(['event'=> $event],['event'=>$event->image]);
    }
    
    public function update(EventRequest $request, Event $event)
    {
        $input = $request['event'];

        $updateimg = $request->file('updateimg');
        if($updateimg != null)
        {
            $event['image'] = Cloudinary::upload($updateimg->getRealPath())->getSecurePath();
        }
        
        
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
