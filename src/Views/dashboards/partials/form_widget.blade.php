<div class="modal fade" id="add_widget" tabindex="-1" role="dialog" aria-labelledby="addWidgetLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addWidgetLabel">Widgets desse dashboard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
            {{ Form::select('attach[widgets][]', $widgets, isset($dashboard->widgets()->count)? $dashboard->widgets->pluck('id') : null, ['class' => 'form-control', 'multiple' => true]) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
