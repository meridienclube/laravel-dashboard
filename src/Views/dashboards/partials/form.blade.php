{!! Form::open(['route' => ['dashboards.update', $dashboard->id], 'method' => 'put', 'class' => 'horizontal-form']) !!}

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-md-9">
                    <div class="kt-form__group--inline">
                        <div class="kt-form__control">
                            {!! Form::text('title', isset($dashboard)? $dashboard->title : null, ['class' => 'form-control', 'placeholder' => 'Digite aqui o nome desta dashboard', 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-group" role="group" aria-label="...">
                        @isset($dashboard)
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_widget">
                                Widgets
                            </button>
                        @endisset
                        <button type="submit" class="btn btn-success">Salvar</button>
                        @isset($dashboard)
                            <a href="{{ route('dashboards.show', $dashboard->id) }}"
                               class="btn btn-secondary">Voltar</a>
                        @else
                            <a href="{{ route('dashboards.index') }}" class="btn btn-secondary">Voltar</a>
                        @endisset
                    </div>
                </div>
            </div>
            @include('dashboard::dashboards.partials.form_widget')
        </div>
    </div>
    @include('dashboard::dashboards.partials.form_widgets', ['dashboard' => $dashboard])
</div>

{!! Form::close() !!}
