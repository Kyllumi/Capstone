<x-app-layout>
    <x-slot name="header" class="myHeader">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestisci gli eventi') }}
        </h2>
    </x-slot>

        <div class="latest-content d-flex flex-wrap justify-content-center mb-4">

            <!-- Ciclo tutti gli eventi -->
            @foreach ($events as $event)
            <div class="card m-3">
                        @if(!empty($event->image))
                <img src="{{ asset('images/' . $event->image) }}" alt="Immagine dell'evento">
            @else
                <img src="{{ asset('img/8.jpeg') }}" alt="Immagine predefinita">
            @endif

                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ substr($event->description, 0, 50) }}..</p>
                    </div>
                    <div>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-details">Dettagli</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @include ('components.footer')
</x-app-layout>