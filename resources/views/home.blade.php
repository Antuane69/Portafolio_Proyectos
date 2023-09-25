@extends('layouts.app')

@section('Titulo')
    Muro de publicaciones
@endsection

@section('contenido')

    <x-listar-post :posts="$posts" />

@endsection