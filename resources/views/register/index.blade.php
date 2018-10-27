@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                Registrar
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" name="first_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Sobrenome</label>
                        <input type="text" name="last_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Registrar" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
