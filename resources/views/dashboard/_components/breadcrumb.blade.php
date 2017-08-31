<ol id="breadcrumb" class="breadcrumb">
    @foreach($breadcrumbItems as $item)
        @if(count($item) == 2)
            <li class="breadcrumb-item">
                {!! Html::link($item) !!}
            </li>
        @else
            <li class="breadcrumb-item active">{{ $item[0] }}</li>
        @endif
    @endforeach

    @component(component_path('dropdown'))
        @slot('dropdownName', $dropdownName ?? icon('config', trans('buttons.operations')))
        @slot('dropdownItems', $dropdownItems ?? null)
    @endcomponent
</ol>