<x-app-layout>
    <div class="hero">
        <div class="hero-box d-flex">
            <div class="hero-box-content">
                <h3>Incontra, Condividi, Vivi</h3>
                <p>Scopri il luogo dove ogni attività diventa un’esperienza da condividere. Che sia un picnic all’aperto, una partita emozionante o un aperitivo con amici, qui trovi la tua comunità per rendere ogni momento indimenticabile.</p>
                <a href="{{ route('events.index') }}" class="btn">Cerca Eventi</a>
            </div>
        </div>
    </div>

    <div class="latest m-5">
    <h4 class="text-center mb-3">Ultimi Eventi</h4>

    <div class="latest-content d-flex flex-wrap justify-content-center">
        @foreach ($events->sortByDesc('created_at')->take(3) as $event)
        <div class="card m-3">
            <img src="{{ asset("img/8.jpeg") }}" class="card-img-top" alt="...">
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

<div class="footer d-flex flex-column">
    <div class="footer-box d-flex justify-content-center align-items-center">
        <div class="footer-box-content">
            <h3 class="text-center">Unisciti all’Avventura!</h3>
            <p>Iscriviti alla nostra newsletter e non perdere mai un’occasione! Entra a far parte della nostra comunità e inizia il tuo viaggio oggi stesso!</p>
            <form action="#" method="post" class="d-flex flex-column">
                <input type="email" placeholder="Inserisci la tua email" required>
                <a href="#" class="btn">Iscriviti</a>
            </form>
        </div>
    </div>

    <div class="footer-box-bottom">
        <div class="footer-box-imgs d-flex">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-twitter-x"></i></a>
        </div>
        <p class="text-center">© 2024 All rights reserved.</p>
    </div>
</div>

</x-app-layout>
