@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        Lista dei fumetti :
    </h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comicsList as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->type }}</td>
                    <td><button class="btn btn-success"><a href="{{route('comics.show',['comic'=>$item->id])}}">Dettagli</a></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection