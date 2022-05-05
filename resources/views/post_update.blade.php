@extends('layouts.app')

@section('content')
<div class="container">
    <h4><b>Título: </b>{{ $post->title }}</h4>
    <p><b>Descrição: </b>{{ $post->description }}</p>
    <p><b>Autor: {{ $post->user->name }}</b></p>
</div>
@endsection
