@extends('download')

@section('content')
    <style>
        table {
            width: 100%;
            margin: 10px 0;
            padding: 5px;
        }
        table.plot {
            background-color: #EFEFEF !important;
        }
        table.plot td {
            width: 50% !important;
        }
        table.sample td {
            width: 33% !important;
        }
        table.sample span.reference {
            background-color: red;
            color: white;
            padding: 4px;
        }
    </style>
    <table class="plot">
        <tr>
            <td><b>{!! trans_title('plots', 'singular') !!}</b>: {!! $plot->plot_name ?? no_result() !!}</td>
            <td><b>{!! trans_title('cities', 'singular') !!}</b>: {!! $plot->city->city_name ?? no_result() !!}</td>
        </tr>
        <tr>
            <td><b>{!! trans_title('crops', 'singular') !!}</b>: {!! $plot->crop->crop_name ?? no_result() !!}</td>
            <td><b>{!! trans_title('crop_varieties', 'singular') !!}</b>: {!! $plot->crop_variety->crop_variety_name ?? no_result() !!}</td>
        </tr>
    </table>
    @foreach($edaphologies as $coordenate)
        <table class="sample">
            <tr>
                <td colspan="3"><b>{{ sections('edaphologies.sample.title') }}</b>: <span class="reference">{{ $coordenate->edaphology_reference ?? no_result() }}</span></td>
            </tr>
            <tr>
                <td><b>{{ trans('base.type') }}</b>: {!! sections('edaphologies.sample.type.' . $coordenate->edaphology_level) ?? no_result() !!}</td>
                <td><b>{{ trans('geolocations.lat') }}</b>: {!! $coordenate->edaphology_lat ?? no_result() !!}</td>
                <td><b>{{ trans('geolocations.lng') }}</b>: {!! $coordenate->edaphology_lng ?? no_result() !!}</td>
            </tr>
            <tr>
                <td><b>{{ sections('edaphologies.sample.ph') }}</b>: {!! $coordenate->edaphology_ph ?? no_result() !!}</td>
                <td><b>{{ sections('edaphologies.sample.aggregate') }}</b>: {!! $coordenate->edaphology_aggregate_stability ?? no_result() !!}</td>
                <td><b>{{ sections('edaphologies.sample.carbonate') }}</b>: {!! $coordenate->edaphology_calcium_carbonate_equivalent ?? no_result() !!}</td>
            </tr>
            <tr>
                <td><b>{{ sections('edaphologies.sample.lime') }}</b>: {!! $coordenate->edaphology_active_lime ?? no_result() !!}</td>
                <td><b>{{ sections('edaphologies.sample.organic_carbon') }}</b>: {!! $coordenate->edaphology_organic_carbon ?? no_result() !!}</td>
                <td><b>{{ sections('edaphologies.sample.coarse') }}</b>: {!! $coordenate->edaphology_coarse_elements ?? no_result() !!}</td>
            </tr>
            <tr>
                <td><b>{{ sections('edaphologies.sample.electric') }}</b>: {!! $coordenate->edaphology_electric_conductivity ?? no_result() !!}</td>
                <td><b>{{ sections('edaphologies.sample.texture') }}</b>: {!! $coordenate->edaphology_texture ?? no_result() !!}</td>
                <td><b>{{ sections('edaphologies.sample.organic_matter') }}</b>: {!! $coordenate->edaphology_total_organic_matter ?? no_result() !!}</td>
            </tr>
            <tr>
                <td><b>{{ sections('edaphologies.sample.sand') }}</b>: {!! $coordenate->edaphology_sand ?? no_result() !!}</td>
                <td><b>{{ sections('edaphologies.sample.clay') }}</b>: {!! $coordenate->edaphology_clay ?? no_result() !!}</td>
                <td><b>{{ sections('edaphologies.sample.silt') }}</b>: {!! $coordenate->edaphology_silt ?? no_result() !!}</td>
            </tr>
            <tr>
                <td colspan="3"><b>{{ sections('edaphologies.sample.cation_exchange') }}</b>: {!! $coordenate->edaphology_cation_exchange ?? no_result() !!}</td>
            </tr>
        </table>
        <hr>
        @if($loop->iteration / 4 === 1)
            <div style="page-break-after: always;"></div>
        @endif
    @endforeach
@endsection