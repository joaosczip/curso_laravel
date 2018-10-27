@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Entrar" class="btn btn-success">
                        <a class="btn btn-primary" href="{{ route('register.form') }}">Registrar</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
