@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                Name: {{ $comic->name }}
            </h1>

            <h4>
                description: {{ $comic->description }}
            </h4>

            <h4>
                Price: {{ $comic->price }}
            </h4>

            <h4>
                Quantity: {{ $comic->quantity }}
            </h4>
            
            @if ($comic->image)
            <div>
                <img src="{{ asset('storage/'.$comic->image) }}" alt="">
            </div>
            @endif

            <a href="route('admin.comics.create')" class="btn btn-success">
                Aggiungi progetto
            </a>
        </div>
    </div>
</div>
@endsection