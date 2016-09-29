@extends('admin.index')

@section('content')
    <div class="container">
        <div class="btn-group">
            <a href="{{route('products.create')}}">
                <button>Criar um produto</button>
            </a>
        </div>

        <hr>

        <table class="table table-striped">

            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Decrição</td>
                <td>Valor</td>
                <td colspan="2">Ação</td>
            </tr>

            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>R$ {{ $product->price }}</td>
                    <td><a href="{{ route("products.edit", ['id' => $product->id]) }}"> Editar</a></td>
                    <td><a href="{{ route("products.images", ['id' => $product->id]) }}"> Images</a></td>
                    <td><a href="{{route('products.destroy', ['id' => $product->id])}}"> Excluir</a></td>
                </tr>
            @endforeach

        </table>
        {!! $products->render()  !!}
    </div>
@endsection