@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <a href="{{ route('dashboards.create') }}" class="btn btn-bold btn-label-brand btn-sm float-right"> Criar </a>
        </div>
    </div>

    @widgets(['widgets' => $widgets])

    @if(isset($dashboard))
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <a href="{{ route('dashboards.edit', $dashboard->id) }}" class="btn btn-bold btn-label-brand btn-sm float-right"> Editar </a>
            </div>
        </div>
    @endif
@endsection