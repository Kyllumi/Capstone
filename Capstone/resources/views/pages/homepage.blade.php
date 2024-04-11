<x-app-layout>

<!-- Sezione hero -->
    <div class="hero">
        <div class="hero-box d-flex">
            <div class="hero-box-content">
                <h3>Incontra, Condividi, Vivi</h3>
                <p>Scopri il luogo dove ogni attività diventa un’esperienza da condividere. Che sia un picnic all’aperto, una partita emozionante o un aperitivo con amici, qui trovi la tua comunità per rendere ogni momento indimenticabile.</p>
                <a href="{{ route('events.index') }}" class="btn">Cerca Eventi</a>
            </div>
        </div>
    </div>


    <!-- Sezione ultimi eventi   -->
    <div class="latest m-5">
    <h4 class="text-center mb-3">Ultimi Eventi</h4>

    <div class="latest-content d-flex flex-wrap justify-content-center">
    <!-- Filtro tutti gli eventi e prendo solo gli ultimi 3 eventi confermati -->
    @php
        $confirmedEvents = $events->filter(function ($event) {
            return $event->status == "Confermato";
        })->sortByDesc('created_at')->take(3);
    @endphp

    @foreach ($confirmedEvents as $event)
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

</div>

@include('components.footer')

</x-app-layout>
