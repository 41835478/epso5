<div class="row">
    {{-- Field: pH --}}
    {!! BootForm::text(sections('edaphologies.sample.ph'), 'edaphology_ph')
        ->addGroupClass('col-md-2')
        ->addClass('number')
    !!}

    {{-- Field: Aggregate stability --}}
    {!! BootForm::InputGroup(sections('edaphologies.sample.aggregate'), 'edaphology_aggregate_stability')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon(icon('percent'))
    !!}

    {{-- Field: Calcium carbonate equivalent --}}
    {!! BootForm::InputGroup(sections('edaphologies.sample.carbonate'), 'edaphology_calcium_carbonate_equivalent')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon(icon('percent'))
    !!}

    {{-- Field: Active lime --}}
    {!! BootForm::InputGroup(sections('edaphologies.sample.lime'), 'edaphology_active_lime')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon(icon('percent'))
    !!}

    {{-- Field: Cation exchange --}}
    {!! BootForm::InputGroup(sections('edaphologies.sample.cation_exchange:min'), 'edaphology_cation_exchange')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon('meq/100g')
    !!}

    {{-- Field: Coarse elements --}}
    {!! BootForm::InputGroup(sections('edaphologies.sample.coarse'), 'edaphology_coarse_elements')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon(icon('percent'))
    !!}
</div>

<div class="row">
    {{-- Field: Electric conductivity --}}
    {!! BootForm::InputGroup(sections('edaphologies.sample.electric'), 'edaphology_electric_conductivity')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon('dS/m')
    !!}

    {{-- Field: texture --}}
    {!! BootForm::text(sections('edaphologies.sample.texture'), 'edaphology_texture')
        ->addGroupClass('col-md-2')
    !!}

    {{-- Field: Total organic matter --}}
    {!! BootForm::InputGroup(sections('edaphologies.sample.organic_matter'), 'edaphology_total_organic_matter')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon(icon('percent'))
    !!}

    {{-- Field: Total organic carbon --}}
    {!! BootForm::InputGroup(sections('edaphologies.sample.organic_carbon'), 'edaphology_organic_carbon')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon(icon('percent'))
    !!}

    {{-- Field: Sand --}}
    {!! BootForm::InputGroup(sections('edaphologies.sample.sand'), 'edaphology_sand')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon(icon('percent'))
    !!}

    {{-- Field: Clay --}}
    {!! BootForm::InputGroup(sections('edaphologies.sample.clay'), 'edaphology_clay')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon(icon('percent'))
    !!}

    {{-- Field: Silt --}}
    {!! BootForm::InputGroup(sections('edaphologies.sample.silt'), 'edaphology_silt')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon(icon('percent'))
    !!}
</div>