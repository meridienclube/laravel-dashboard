@extends(config('cw_dashboard.layout'))
@section('title', 'Edit Dashboard')
@section('content')
    {!! Form::model($dashboard, ['route' => ['dashboards.update', $dashboard->id], 'method' => 'PUT', 'class' => 'horizontal-form']) !!}
        @include('dashboard::dashboards.partials.form')
    {!! Form::close() !!}
    <hr>
    @include('dashboard::dashboards.partials.form_widgets', ['dashboard' => $dashboard])
@endsection