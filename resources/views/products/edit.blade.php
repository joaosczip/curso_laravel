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
                Alterar produto
            </div>
            <div class="card-body">
                <form action="{{ route('produtos.update', $produto->id) }}" method="post">

                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" name="name" id="" value="{{ $produto->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Descrição</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $produto->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Quantidade</label>
                        <input type="number" name="amount" value="{{ $produto->amount }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Preço</label>
                        <input type="number" name="price" id="" value="{{ $produto->price }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="brand_id" id="" class="form-control">
                            @php
                                $selected = ''
                            @endphp
                            @foreach($marcas as $marca)
                            @if($marca->id == $produto->brand->id)
                                $selected = 'selected'
                                <option {{$selected}} value="{{ $marca->id }}">{{ $marca->name }}</option>
                            @php $selected = '' @endphp
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Alterar" class="btn btn-success btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
