{!! BootForm::open() !!}

    <div id="search" class="card bg-warning">
        <div class="card-block">
            <div class="row">
            
                @include(form_path($section, 'search'))

            </div>
        </div>
    </div>
    
{!! BootForm::close() !!}