<div class="row">
    @if(isset($dashboard->widgets))
        @foreach($dashboard->widgets as $widget)
            <div class="{{ $widget->pivot->options['col']?? 'col-6' }}">
                <div class="card {{ $widget->pivot->options['background']?? 'bg-light' }}" style="">
                    {!! Form::model($dashboard, ['route' => ['dashboards.widget.update', $dashboard->id, $widget->pivot->id], 'method' => 'put', 'class' => 'horizontal-form']) !!}
                    <div class="card-header">{{ $widget->name }}</div>
                    <div class="card-body">
                        <!--h5 class="card-title">{{ $widget->name }}</h5-->
                        <p class="card-text">
                            {{ $widget->description }}
                        </p>
                        <p class="card-text">
                            <div class="form-group">
                                <label>Titulo</label>
                                {!! Form::text('widget[options][title]', $widget->pivot->options['title']?? '', ['class' => 'form-control', 'placeholder' => 'Titulo desse widget', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label>Tamanho do widget</label>
                                {{ Form::select('widget[options][col]', ['col-md-3' => '1/4', 'col-md-6' => '2/4', 'col-md-9' => '3/4', 'col-md-12' => '4/4'], $widget->pivot->options['col']?? 'col-md-6', ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label>Cor do widget</label>
                                {{ Form::select('widget[options][background]', ['not' => 'Escolha uma cor', 'bg-brand' => 'Default', 'bg-secondary' => 'Secundaria', 'bg-primary' => 'Azul', 'bg-warning' => 'Amarelo', 'bg-success' => 'Verde', 'bg-danger' => 'Vermelho'], $widget->pivot->options['background']?? 'not', ['class' => 'form-control', 'required']) }}
                            </div>
                            @if(isset($widget) && isset($widget->options) && !empty($widget->options))
                                @foreach($widget->options as $option)
                                    {!! option_input($widget, $option, false, ['name' => 'widget[options]']) !!}
                                @endforeach
                            @endif
                        </p>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-small float-right">
                            {{ __('dashboard::save') }}
                        </button>
                        <small class="text-muted">Widgets ainda na versão beta</small>
                    </div>
                    {!! Form::close() !!}
                </div>









                <div class="kt-portlet {{ $widget->pivot->options['background']?? '' }}">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ $widget->name }} <small>{{ $widget->description }}</small>
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flaticon-more-1"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon-delete"></i>
                                                <span class="kt-nav__link-text">{{ __('widgets::form.remove') }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="row align-items-center">
                            <div class="col-lg-6 m--valign-middle">

                            </div>
                            <div class="col-lg-6 kt-align-right">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

@isset($dashboard)
    <div class="row">
        <div class="col-12">
            {!! Form::open(['route' => ['dashboards.widget.store', $dashboard->id], 'class' => 'horizontal-form']) !!}   
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_widget">
                Add Widgets
                </button>
                @include('dashboard::dashboards.partials.form_widget')
            {!! Form::close() !!}
        </div>
    </div>
@endisset