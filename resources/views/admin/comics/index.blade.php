<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>

<body>
    <button>
        <a href="{{ route('comics.create')}}"> Crea nuovo Comic </a>
    </button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Quantita'</th>
                <th scope="col">Azioni'</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
                <tr>
                    <th scope="row">{{ $comic->id }}</th>

                    <td>{{ $comic->name }}</td>
                    <td>{{ $comic->description }}</td>
                    <td>{{ $comic->price }} $</td>
                    <td>{{ $comic->quantity }}</td>
                
                    <td>
                        <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-wrench"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->id) }}"
                            method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
