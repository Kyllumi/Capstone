<x-app-layout>
    
        @foreach ($events as $event)
        <ul class="list-group">
            <li class="list-group-item">{{ $event->title }}</li>
            <li class="list-group-item">{{ $event->description }}</li>
            <li class="list-group-item">{{ $event->date }}</li>
            <li class="list-group-item">{{ $event->time }}</li>
            <li class="list-group-item">{{ $event->location }}</li>
        </ul>
        @endforeach
        
</x-app-layout>