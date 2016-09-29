@extends('admin.index')

@section('content')

    <div class="container">
        <div class="btn-group">
            <a href="{{route('create-categories')}}">
                <button>Criar uma categoria</button>
            </a>
        </div>

        <hr>

        <table class="table table-striped">

            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Decrição</td>
                <td colspan="2">Ação</td>
            </tr>
            @foreach($categories as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->name }}</td>
                    <td>{{ $categoria->description }}</td>
                    <td><a href="{{ route("edit-products", ['id' => $categoria->id]) }}"> Editar</a></td>
                    <td><a href="{{route('destroy-products', ['id' => $categoria->id])}}"> Excluir</a></td>
                </tr>
            @endforeach
        </table>
        {!! $categories->render() !!}
    </div>

@endsection




