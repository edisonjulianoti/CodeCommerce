@extends('admin.index')

@section('content')
    <div class="container">
        <div class="btn-group">
            <a href="{{route('products')}}">
                <button class="btn btn-default">Voltar</button>
            </a>
        </div>
        <hr>

        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach

        <form action="{{ route('products.images.store', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Image:</label>
                <input type="file" name="image" class="form-control" />
            </div>


            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Upload Image</button>
            </div>

        </form>

    </div>

@endsection