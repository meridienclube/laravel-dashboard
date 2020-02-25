@extends(config('cw_dashboard.layout'))
@section('title', 'Create Dashboard')
@section('content')
    {!! Form::open(['route' => 'dashboards.store', 'class' => 'horizontal-form']) !!}
        @include('dashboard::dashboards.partials.form')
    {!! Form::close() !!}
@endsection