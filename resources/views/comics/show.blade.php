@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Dettagli Fumetto : {{$comic->title}}</h1>
        <div class="d-flex align-items-center">
            <img class="w-25 mt-2 mb-3"   src="{{($comic->thumb)}}" alt="Immagine non disponibile">
            <div class="mx-2">
                <h6>{{ $comic->description}}</h6>
                <p>{{ $comic->series }} uscito il : {{ $comic->sale_date }}</p>
                <p><i><b>{{ $comic->price }}</b></i></p>
            </div>
        </div>
    </div>

@endsection