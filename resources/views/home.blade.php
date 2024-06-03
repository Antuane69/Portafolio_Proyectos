@extends('layouts.app')

@section('Titulo')
    Muro de venta de vehiculos
@endsection

@section('contenido')

    <x-listar-post :posts="$posts" :filtrado="$filtrado"/>

@endsection