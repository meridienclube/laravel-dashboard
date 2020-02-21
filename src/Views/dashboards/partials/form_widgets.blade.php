<div class="row">
    {{ dd('laravel-dashboard/src/Views/dashboards/partials/form_widgets.blade.php') }}
    @if(isset($dashboard->widgets))

        @foreach($dashboard->widgets as $widget)



            <div class="{{ $widget->pivot->options['col']?? 'col-6' }}">
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
                        <div class="form-group">
                            <label>Titulo</label>

                            {!! Form::text('sync[widgets][' . $widget->pivot->id . '][options][title]', $widget->pivot->options['title']?? '', ['class' => 'form-control', 'placeholder' => 'Titulo desse widget', 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label>Tamanho do widget</label>
                            {{ Form::select('sync[widgets][' . $widget->pivot->id . '][options][col]', ['col-md-3' => '1/4', 'col-md-6' => '2/4', 'col-md-9' => '3/4', 'col-md-12' => '4/4'], $widget->pivot->options['col']?? 'col-md-6', ['class' => 'form-control', 'required']) }}
                        </div>

                        <div class="form-group">
                            <label>Cor do widget</label>
                            {{ Form::select('sync[widgets][' . $widget->pivot->id . '][options][background]', ['not' => 'Escolha uma cor', 'bg-brand' => 'Azul', 'bg-warning' => 'Amarelo', 'bg-success' => 'Verde', 'bg-danger' => 'Vermelho'], $widget->pivot->options['background']?? 'not', ['class' => 'form-control', 'required']) }}
                        </div>

                        @if(isset($widget) && isset($widget->options) && !empty($widget->options))
                            @foreach($widget->options as $option)
                                {!! option_input($widget, $option, false, ['name' => 'sync[widgets][' . $widget->pivot->id . '][options]']) !!}
                            @endforeach
                        @endif

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="row align-items-center">
                            <div class="col-lg-6 m--valign-middle">

                            </div>
                            <div class="col-lg-6 kt-align-right">
                                <button type="submit" class="btn btn-brand">{{ trans('meridien.save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    @endif
</div>