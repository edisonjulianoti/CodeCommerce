@extends('admin.index')

@section('content')

    <div class="container">

        <h1>Images of  {{ $product->name }}</h1>

        <div class="btn-group">
            <a href="{{ route('products.images.create', ['id' => $product->id]) }}">
                <button>New Image</button>
            </a>
        </div>

        <hr>

        <table class="table table-striped">

            <tr>
                <td>Id</td>
                <td>Imagem</td>
                <td>Extension</td>
                <td colspan="2">Ação</td>
            </tr>

            @foreach($product->images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td><img src="{{ asset('uploads/' . $image->id . '.' . $image->extension) }}" width="100" height="80"> </td>
                    <td>{{ $image->extension }}</td>
                    <td>
                        <a href="{{ route('products.images.destroy' , ['id' => $image->id]) }}">delete</a>
                    </td>
                </tr>
            @endforeach

        </table>

        <a href="{{ route('products', ['id' => $product->id]) }}">
            <button>Voltar</button>
        </a>



    </div>

@endsection