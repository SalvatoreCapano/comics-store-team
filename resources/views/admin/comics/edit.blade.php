@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>Modifica Fumetto</h1>
            </div>
        </div>
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>            
            @endif
            <form action="{{ route('comics.update', $comic->id) }}" method="POST">
                @csrf

                @method('PUT')

                <div class="mb-3 mt-3">
                    <label for="title" class="form-label text-light">Titolo *</label>
                    <input type="text" class="form-control" name="title" id="title" 
                    placeholder="inserisci il titolo" 
                    required maxlength="64"
                    value="{{ old('title', $comic->title) }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label text-light">Descrizione *</label>
                    <textarea class="form-control" id="description" name="description" rows="3" 
                    placeholder="inserisci descrizione" 
                    maxlength="1024">
                    {{ old('description', $comic->description) }}
                    </textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="thumb" id="thumb">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label text-light">Prezzo *</label>
                    <input type="number" class="form-control" name="price" id="price" 
                    placeholder="inserisci il prezzo" step="0.1" required
                    value="{{ old('price', $comic->price) }}">
                </div>
                <div class="mb-3">
                    <label for="series" class="form-label text-light">Serie *</label>
                    <input type="text" class="form-control" name="series" id="series" required maxlength="32"
                    value="{{ old('series', $comic->series) }}">
                </div>
                <div class="mb-3">
                    <label for="sale_date" class="form-label text-light">Data di Vendita *</label>
                    <input type="date" class="form-control" name="sale_date" id="sale_date" required
                    value="{{ old('sale_date', $comic->sale_date) }}">
                </div>
                <button type="submit" class="btn btn-primary">
                    Modifica
                </button>
            </form>
        </div>
    </div>
@endsection