<x-app-layout>
    <x-slot name="header" class="myHeader">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crea il tuo Evento') }}
        </h2>
    </x-slot>

    <div class="container">
    <form method="post" action="{{ route('events.store') }}" enctype="multipart/form-data" id="eventForm">
    @csrf

    <input type="hidden" class="form-control" id="creator_id" name="creator_id" value="{{ Auth::user()->id }}">


    <div class="mb-3">
        <label for="image" class="form-label">Immagine (facoltativa)</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" aria-describedby="titolo" name="title">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" id="description" aria-describedby="description" name="description"></textarea>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Data</label>
        <input type="date" class="form-control" id="date" name="date">
    </div>

    <div class="mb-3">
        <label for="time" class="form-label">Ora</label>
        <input type="time" class="form-control" id="time" name="time">
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Posizione</label>
        <input type="text" class="form-control" id="location" name="location" placeholder="Cerca una posizione...">
    </div>
    
    <div class="mb-3">
        <label for="category" class="form-label">Categoria</label>
        <select class="form-select" id="category" name="category">
            <option value="categoria1">Categoria 1</option>
            <option value="categoria2">Categoria 2</option>
            <option value="categoria3">Categoria 3</option>
            <!-- Aggiungi altre opzioni a seconda delle tue esigenze -->
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

</x-app-layout>