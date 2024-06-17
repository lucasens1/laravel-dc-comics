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
                        <button class="btn btn-success">
                            <a href="{{route('comics.show',['comic'=>$item->id])}}">Dettagli</a>
                        </button>
                        <button class="btn btn-warning">
                            <a href="{{route('comics.edit',['comic'=>$item->id])}}">Modifica</a>
                        </button>
                        <form action="{{ route('comics.destroy', ['comic' => $item->id]) }}" method="POST">                           
                            @csrf                         
                            @method('DELETE')                            
                            <button class="btn btn-danger" type="submit"> Cancella </button> 
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection