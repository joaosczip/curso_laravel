@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Lista de produtos</h3>

        @if(session('sucesso'))
        <div class="alert alert-success">
            <p>{{ session('sucesso') }}</p>
        </div>
        @endif

        <a class="btn btn-primary" href="{{ route('produtos.create') }}">Cadastrar produto</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Marca</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->name }}</td>
                <td>{{ $produto->description }}</td>
                <td>{{ $produto->amount }}</td>
                <td>{{ $produto->price }}</td>
                <td>{{ $produto->brand->name }}</td>
                <td>
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <a class="btn btn-success" href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                        <input type="submit" value="Excluir" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
