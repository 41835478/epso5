<ul>
    @Role('admin')
        <li><span class="btn btn-warning">{!! icon('edit') !!}</span> {!! trans('legends.edit') !!}</li>
        <li></li>
    @endRole
    <li class="alternate"><div class="info">{!! trans('base.reference:min') !!}</div> {!! trans('base.reference') !!}</li>
    <li class="alternate"><div class="info">{!! trans('geolocations.lat:min') !!}</div> {!! trans('geolocations.lat') !!}</li>
    <li class="alternate"><div class="info">{!! trans('geolocations.lng:min') !!}</div> {!! trans('geolocations.lng') !!}</li>
    <li class="alternate"><div class="info">{!! trans('base.description:min') !!}</div> {!! trans('base.description') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.aggregate:min') !!}</div> {!! sections('edaphologies.sample.aggregate') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.carbonate:min') !!}</div> {!! sections('edaphologies.sample.carbonate') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.lime:min') !!}</div> {!! sections('edaphologies.sample.lime') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.cation_exchange:min') !!}</div> {!! sections('edaphologies.sample.cation_exchange') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.coarse:min') !!}</div> {!! sections('edaphologies.sample.coarse') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.electric:min') !!}</div> {!! sections('edaphologies.sample.electric') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.texture:min') !!}</div> {!! sections('edaphologies.sample.texture') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.organic_matter:min') !!}</div> {!! sections('edaphologies.sample.organic_matter') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.organic_carbon:min') !!}</div> {!! sections('edaphologies.sample.organic_carbon') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.sand:min') !!}</div> {!! sections('edaphologies.sample.sand') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.clay:min') !!}</div> {!! sections('edaphologies.sample.clay') !!}</li>
    <li class="alternate"><div class="info">{!! sections('edaphologies.sample.silt:min') !!}</div> {!! sections('edaphologies.sample.silt') !!}</li>
</ul>