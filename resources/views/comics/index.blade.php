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
                            {{-- Bottone che triggera il modale --}}
                            <button class="btn btn-danger" type="submit" data-bs-toggle="modal"
                                data-bs-target="#deleteModal"> Cancella </button>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5">Conferma azione</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicuro di voler cancellare il dato?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('comics.destroy', ['comic' => $item->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-primary" type="submit">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
