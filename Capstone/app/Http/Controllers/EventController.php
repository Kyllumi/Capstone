<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('create-event', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
    // Validazione dei dati del modulo
    $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif,avif,webp|max:2048',
        'title' => 'required',
        'description' => 'required',
        'date' => 'required',
        'time' => 'required',
        'location' => 'required',
        'category' => 'required',
    ]);

    // Caricamento dell'immagine sul server
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    } else {
        $imageName = null; // Nome predefinito dell'immagine
    }
    
    // Salvataggio dei dati del modulo nel database
    $event = new Event();
    $event->image = $imageName; // Imposta il nome dell'immagine nel database
    $event->title = $request->title;
    $event->description = $request->description;
    $event->date = $request->date;
    $event->time = $request->time;
    $event->location = $request->location;
    $event->category = $request->category;
    $event->creator_id = Auth::user()->id;
    $event->save();

    return redirect()->route('events.index')->with('success', 'Evento aggiunto con successo!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event = Event::find($event->id);
        return view('event-detail', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    public function confirm(Event $event) {
        $event->status = "Confermato";
        $event->save();
        return redirect()->route('events.index')->with('success', 'Evento confermato con successo!');
    }
}
