@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Dettagli Fumetto : {{$comic->title}}</h1>
        <div class="card d-flex align-items-center">
            <img class="w-25 mt-2 mb-3"   src="{{($comic->thumb)}}" alt="Immagine non disponibile">
            <div class="card-body my-2">
                <h4>{{ $comic->description}}</h4>
                <h5>{{ $comic->series }} uscito il : {{ $comic->sale_date }}</h5>
                <p>{{ $comic->price }}</p>
            </div>
        </div>
    </div>

@endsection