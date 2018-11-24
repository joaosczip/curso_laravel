@extends('layouts.app')

@section('content')

    <div class="container">

        <form action="{{ route('product.categories.relaciona', $produto->id) }}" method="POST">
        @csrf

        @foreach($categorias as $categoria)
            <p>
                <label for="">
                    <input type="checkbox" value="{{ $categoria->id }}" name="category_id[]" id="category_id">
                    {{ $categoria->name }}
                </label>
            </p>
        @endforeach

        {{ $categorias->links() }}

        <div class="form-group">
            <input type="submit" value="Confirmar" class="btn btn-primary">
        </div>

    </form>

    </div>

@endsection
