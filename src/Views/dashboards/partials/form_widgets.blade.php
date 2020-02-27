<div class="row">
    @if(isset($dashboard->widgets))
        @foreach($dashboard->widgets as $widget)
            <div class="{{ $widget->pivot->options['col']?? 'col-6' }}">
                <div class="card {{ $widget->pivot->options['background']?? 'bg-light' }}" style="">
                    {!! Form::model($dashboard, ['route' => ['dashboards.widget.update', $dashboard->id, $widget->pivot->id], 'method' => 'put', 'class' => 'horizontal-form']) !!}
                    <div class="card-header bg-primary text-white">
                        {{ $widget->name }}
                    </div>
                    <div class="card-body">
                    <!--h5 class="card-title">{{ $widget->name }}</h5-->
                        <p class="card-text">
                            {{ $widget->description }}
                        </p>
                        <div class="form-group">
                            <label>Titulo</label>
                            {!! Form::text('options[title]', $widget->pivot->options['title']?? '', ['class' => 'form-control', 'placeholder' => 'Titulo desse widget', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Tamanho do widget</label>
                            {{ Form::select('options[col]', ['col-md-3' => '1/4', 'col-md-6' => '2/4', 'col-md-9' => '3/4', 'col-md-12' => '4/4'], $widget->pivot->options['col']?? 'col-md-6', ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group">
                            <label>Cor do widget</label>
                            {{ Form::select('options[background]', ['not' => 'Escolha uma cor', 'bg-brand' => 'Default', 'bg-secondary' => 'Secundaria', 'bg-primary' => 'Azul', 'bg-warning' => 'Amarelo', 'bg-success' => 'Verde', 'bg-danger' => 'Vermelho'], $widget->pivot->options['background']?? 'not', ['class' => 'form-control', 'required']) }}
                        </div>
                        @if(isset($widget) && isset($widget->options) && !empty($widget->options))
                            @foreach($widget->options as $option)
                                <div class="form-group">
                                    <label>{{ $option->label }}</label>
                                    {!! form_option($option, $widget->pivot, NULL, ['class' => 'form-control']) !!}
                                </div>
                            @endforeach
                        @endif
                        <div class="text-right">
                            <button type="submit" class="btn btn-link btn-small card-link">
                                {{ __('dashboard::save') }}
                            </button>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Widgets ainda na versão beta</small>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
    @endif
</div>

@isset($dashboard)

    <div class="row">
        <div class="col-12">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    {!! Form::open(['route' => ['dashboards.widget.store', $dashboard->id], 'class' => 'horizontal-form']) !!}
                    <button type="button" class="nav-link btn btn-info" data-toggle="modal" data-target="#add_widget">
                        Add Widgets
                    </button>
                    @include('dashboard::dashboards.partials.form_widget')
                    {!! Form::close() !!}
                </li>
            </ul>

        </div>
    </div>
@endisset