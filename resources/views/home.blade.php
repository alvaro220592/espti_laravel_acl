@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div> --}}
    
    @forelse ($posts as $post)
        @can('view_post', $post)
            <h4><b>Título: </b>{{ $post->title }}</h4>
            <p><b>Descrição: </b>{{ $post->description }}</p>
            <p><b>Autor: {{ $post->user->name }}</b></p>
            <p><a href="{{ route('post_update', $post->id) }}">Editar</a></p>
        @endcan

        {{--
            A permissão abaixo nem existe no banco de dados. 
            É pra testar se fica visível caso o usuário seja admin, 
            graças ao $gate->before dentro da função boot bo authServiceProvider
            que garante acesso ao usuário cuja role seja admin
        --}}
        @can('teste_super_user', $post)
            <p>Teste super user</p>
        @endcan
        <hr>
    @empty
        <p>Nenhum post cadastrado</p>
    @endforelse
</div>
@endsection
