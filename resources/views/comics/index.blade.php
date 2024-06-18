@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">
            Lista dei fumetti :
        </h1>

        <table class="table">
            <thead class="text-center">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody class="text-center align-baseline">
                @foreach ($comicsList as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->type }}</td>
                        <td class="d-flex gap-2 justify-content-evenly">
                            {{-- Bottone per dettagli --}}
                            <button class="btn btn-success">
                                <a href="{{ route('comics.show', ['comic' => $item->id]) }}">Dettagli</a>
                            </button>
                            {{-- Bottone per modifica --}}
                            <button class="btn btn-warning">
                                <a href="{{ route('comics.edit', ['comic' => $item->id]) }}">Modifica</a>
                            </button>
                            {{-- 
                            <form action="{{ route('comics.destroy', ['comic' => $item->id]) }}" method="POST">                           
                                @csrf                         
                                @method('DELETE')                            
                            </form> 
                            --}}
                            {{-- 
                            Bottone che triggera il modale
                            data-action salva l'URL
                            --}}

                            {{-- PER USARE JS Questo deve tornare nel form --}}
                            <button class="btn btn-danger" type="submit" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                Cancella
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- MODALE id -> deleteModal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        {{-- FINESTRA DI DIALOGO Modale --}}
        <div class="modal-dialog">
            {{-- Contenuto Modale --}}
            <div class="modal-content">
                {{-- Head --}}
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Conferma azione</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- Body --}}
                <div class="modal-body">
                    Sei sicuro di voler cancellare il fumetto : ?
                </div>
                {{-- Footer con i bottoni --}}
                <div class="modal-footer">
                    {{-- Caso : aperto per errore --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Annulla
                    </button>
                    {{-- Caso : conferma eliminazione, l'azione del form si attiverà al click sul btn di conferma --}}
                    <form action="{{ route('comics.destroy', ['comic' => $item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary" type="submit">Conferma eliminazione</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
