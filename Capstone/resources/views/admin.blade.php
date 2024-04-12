<x-app-layout>
    <x-slot name="header" class="myHeader">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestisci gli eventi') }}
        </h2>
    </x-slot>

    <div class="latest-content d-flex flex-wrap justify-content-center mb-4">
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
                        <p>{{ $event->status}}</p>
                    </div>

                    <div>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-details">Dettagli</a>
                        <div class="d-flex flex-column flex-md-row justify-content-md-between gap-2 mt-4">
                            <form class="mb-2 mb-md-0 mr-md-2 md-w-50 md-me-2 w-100" method="POST" action="{{ route('events.update', $event->id) }}"
                                onsubmit="return confirm('{{ $event->status == 'In attesa' ? 'Confermare questo evento?' : 'Annullare questo evento?' }}');">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="{{ $event->status == 'In attesa' ? 'Confermato' : 'In attesa' }}">
                                <button type="submit" class="btn w-100">
                                    {{ $event->status == 'In attesa' ? 'Conferma' : 'Annulla' }}
                                </button>
                            </form>

                            <form method="POST" class="md-w-50 md-ms-2 w-100" action="{{ route('events.destroy', $event->id) }}"
                                onsubmit="return confirm('Sei sicuro di voler eliminare questo evento?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn w-100">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('components.footer')
</x-app-layout>
