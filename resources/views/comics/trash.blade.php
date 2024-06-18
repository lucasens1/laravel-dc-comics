@extends('layouts.app')

@section('content')
    <h1 class="text-center">Cestino</h1>

    @if ($trashedComics->isEmpty())
        <p>Il cestino è vuoto</p>
    @else
    <div class="container d-flex justify-content-center">
        <table class="w-75">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>Prezzo</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($trashedComics as $comic)
                    <tr>
                        <td>{{ $comic->id }}</td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->price }}</td>
                        <td class="d-flex gap-3 justify-content-center">
                            {{-- Con route comics.restore, nell'url Laravel apre la funzione restore e utilizza l'id per compiere l'operazione di ripristino --}}
                            <form action="{{ route('comics.restore', $comic->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-warning" type="submit">Ripristina</button>
                            </form>
                            {{-- Con route comics.force-delete, nell'url Laravel apre la funzione force-delete e utilizza l'id per compiere l'operazione di eliminazione definitiva --}}
                            <form action="{{ route('comics.force-delete', $comic->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Elimina definitivamente</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
@endsection