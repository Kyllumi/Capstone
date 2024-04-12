<x-app-layout>
    <x-slot name="header" class="myHeader">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crea il tuo Evento') }}
        </h2>
    </x-slot>

    <div class="containerForm">
        <form method="post" action="{{ route('events.store') }}" enctype="multipart/form-data" id="eventForm">
            @csrf

            <input type="hidden" class="form-control" id="creator_id" name="creator_id" value="{{ Auth::user()->id }}">

            <div class="row mx-4 formRow">
                <div class="col-md-4 col-12 mb-3">
                    <label for="image" class="form-label">Immagine (facoltativa)</label>
                    <input type="file" class="form-control px-1" id="image" name="image" onchange="checkImageType(event)">
                    <div id="imagePreviewContainer" class="mt-3"  style="max-height: 100%; overflow: hidden;">
                        <img id="imagePreview" class="mx-auto rounded-3 img-fluid" src="#" alt="Image Preview" style="display: none; max-width: 100%;">
                    </div>
                </div>
                <div class="col-md-8 col-12 mb-3">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input required type="text" placeholder="Inserire il titolo dell'evento.." class="form-control" id="title" aria-describedby="titolo" name="title">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea required class="form-control" placeholder="Inserire una descrizione.." id="description" aria-describedby="description" name="description"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label">Data</label>
                            <!-- Data a partire da domani  -->
                            <input required type="date" class="form-control" id="date" name="date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="time" class="form-label">Ora di inizio</label>
                            <select required class="form-select" id="time" name="time">
                                <!-- Opzioni per le ore (00 - 23) con i minuti (00, 30) -->
                                                        <?php
                        for ($hour = 0; $hour <= 23; $hour++) {
                            for ($minute = 0; $minute <= 30; $minute += 30) {
                                printf('<option value="%02d:%02d">%02d:%02d</option>', $hour, $minute, $hour, $minute);
                            }
                        }
                                                        ?>
                            </select>
                        </div>

                        </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input required type="text" class="form-control" id="location" name="location" placeholder="Inserire la location..">
                    </div>
                    
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select required class="form-select" id="category" name="category">
                            <option value="" disabled selected>Seleziona un'opzione</option>
                            <option value="picnic">Picnic</option>
                            <option value="aperitivo">Aperitivo</option>
                            <option value="escursione">Escursione</option>
                            <option value="cinema">Cinema</option>
                            <option value="torneo">Torneo sportivo</option>
                            <option value="cena">Cena a tema</option>
                            <option value="altro">Altro</option>
                        </select>
                    </div>


                    
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary w-100">Crea l'evento</button>
                    </div>
                </div>
            </div>

            
        </form>
    </div>

    <script>

function checkImageType(event) {
        const file = event.target.files[0];
        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];

        if (!allowedTypes.includes(file.type)) {
            // Il tipo di file non è supportato
            alert('Il formato del file non è supportato. Si prega di caricare un\'immagine JPEG, PNG, JPG, GIF o WebP.');
            event.target.value = ''; // Cancella il valore dell'input file
        } else {
            // Il tipo di file è supportato, puoi procedere con l'anteprima o l'upload dell'immagine
            previewImage(event);
        }
    }

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
