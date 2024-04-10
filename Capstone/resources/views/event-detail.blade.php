<x-app-layout>

<div class="card m-3" style="width: 18rem;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title fw-bold">{{ $event->title }}</h5>
    <p class="card-text">{{ $event->description }}</p>
    <p class="card-text">{{ $event->date }}</p>
    <p class="card-text">{{ $event->location }}</p>
    <p class="card-text">{{ $event->time }}</p>
    
    <p class="card-text">{{ $event->creator->name }}</p>
  </div>
</div>
</x-app-layout>