<x-app-layout>
    
<div class="container mt-5 d-flex justify-content-center flex-wrap">
@foreach ($events as $event)
<div class="card m-3" style="width: 18rem;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">{{ $event->title }}</h5>
    <p class="card-text">{{ $event->description }}</p>
    <p class="card-text">{{ $event->date }}</p>
    <p class="card-text">{{ $event->location }}</p>
    <p class="card-text">{{ $event->time }}</p>
    
    <p class="card-text">{{ $event->creator->name }}</p>
    <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Dettagli</a>
  </div>
</div>
        @endforeach
        </div>
</x-app-layout>