@extends('layouts.main')

@section('content')
    <div class="container">
        @if($errors->all())
        <div class="alert alert-danger">
            @foreach($errors->all() as $erros)
                <p>{{$erros}}</p>
            @endforeach
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                Cadastrar produto
            </div>
            <div class="card-body">
                <form action="{{ route('produtos.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Descrição</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Quantidade</label>
                        <input type="number" name="amount" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Preço</label>
                        <input type="number" name="price" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Cadastrar" class="btn btn-success btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
