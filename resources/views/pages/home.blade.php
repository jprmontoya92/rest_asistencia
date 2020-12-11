@extends('layout.app')

@section('content')

<form method="POST" action="{{route('homescan')}}">
    @csrf
    <div class="container shadow p-3 mb-5 border rounded">
        <div id="app">
            <select-component></select-component>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Iniciar</button>
        </div>
    </div>    
</form>

@endsection

<div class="text-center">
</div>