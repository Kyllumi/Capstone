<x-app-layout>

    <x-slot name="header" class="myHeader">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dettagli evento') }}
        </h2>
    </x-slot>

    <div class="container d-flex justify-content-center">
        <div class="left">
            <div class="event-info">
                <div class="date d-flex align-items-end">
                    <div class="detailDate d-flex flex-column align-items-center justify-content-center">
                        <span class="month">
                            {{ ucfirst(\Carbon\Carbon::parse($event->date)->locale('it')->isoFormat('MMM')) }}
                        </span>
                        <span class="day">
                            {{ ucfirst(\Carbon\Carbon::parse($event->date)->locale('it')->isoFormat('D')) }}
                        </span>
                    </div>
                    <p class="day-of-week">
                        {{ ucfirst(\Carbon\Carbon::parse($event->date)->locale('it')->isoFormat('dddd')) }}
                    </p>
                    <p class="time">
                        {{ substr($event->time, 0, 5) }}
                    </p>
                    <p class="category">
                        {{ ucfirst($event->category) }}
                    </p>
                </div>
                <h2>{{ $event->title }}</h2>
                <p class="detailDescription">{{ $event->description }}</p>
                <a href="" class="register-btn">Partecipa all'evento</a>
            </div>
        </div>
        <div class="right">
            <img src="{{ !empty($event->image) ? asset('images/' . $event->image) : asset('img/8.jpeg') }}" alt="{{ !empty($event->image) ? 'Immagine dell\'evento' : 'Immagine predefinita' }}">
        </div>
    </div>

</x-app-layout>
