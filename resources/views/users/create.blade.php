@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <h4 class="center">Cadastro de usuário</h4>

            <form id="form-cadastro">
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

    <script src="{{ asset('/js/jquery/jquery.js') }}"></script>
    <script>
        $(document).ready(function() {
            cadastrar()
        })

        function cadastrar() {
            $('#form-cadastro').submit(function() {
                let first_name = $('input[name=first_name]').val()
                let last_name = $('input[name=last_name').val()
                let email = $('input[name=email]').val()
                let password = $('input[name=password').val()

                $.ajax({
                    url: "{{ route('user.store') }}",
                    method: "POST",
                    data: {
                        first_name: first_name,
                        last_name: last_name,
                        email: email,
                        password: password
                    },
                    success(data) {
                        console.log(data)
                    },
                    error(xhr) {
                        console.log(xhr.responseText)
                    }
                })

                return false;
            })
        }
    </script>

@endsection
