@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica il fumetto : </h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $comic->title) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3">
            {{ old('description', $comic->description) }}
        </textarea>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <select class="form-select" id="type" name="type">
                    <option>Seleziona</option>
                    <option @selected(old('type', $comic->type) === 'comic book') value="comic book">comic book</option>
                    <option @selected(old('type', $comic->type) === 'graphic novel')value="graphic novel">graphic novel</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series :</label>
                <input type="text" class="form-control" id="series" name="series" value="{{ old('series',$comic->series) }}">
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Data : YYYY-MM-DD</label>
                <input type="text" class="form-control" id="sale_date" name="sale_date" value="{{ old('sale_date',$comic->sale_date) }}">
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">thumb</label>
                <input type="text" class="form-control" id="thumb" name="thumb" value="{{ old('thumb',$comic->thumb) }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo </label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price',$comic->price) }}">
            </div>


            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection
