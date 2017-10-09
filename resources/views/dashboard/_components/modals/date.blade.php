@component(component_path('modal'))
    {{-- @slot('modalSize', 'modal-lg or modal-sm or not send this variable to default value') --}}
    @slot('bgColor', 'bg-warning')
    @slot('modalID', 'modal-search-date')
    @slot('modalTitle', icon('search', trans('dates.search')))
    @slot('modalBody', [
        trans('dates.search:text')
    ])
    @slot('modalForm')
        <form>
            <div class="row p-3">
                <div class="form-group col-md-6">
                    <label>{{ trans('dates.date:start') }}</label>
                    {!! Form::imputGroup($value = null, $fieldName = 'modal_start_date', $icon = icon('calendar'), $class = 'date', $status = '') !!}
                </div>
                <div class="form-group col-md-6">
                    <label>{{ trans('dates.date:end') }}</label>
                    {!! Form::imputGroup($value = null, $fieldName = 'modal_end_date', $icon = icon('calendar'), $class = 'date', $status = '') !!}
                </div>  
            </div>
        </form>
    @endslot
    @slot('modalButtons')
        {!! Form::button(icon('search', trans('buttons.search')), [
            'id'    => 'button-date-search',
            'type'  => 'button',
            'class' => 'btn btn-success',
        ]) !!}
    @endslot
@endcomponent
