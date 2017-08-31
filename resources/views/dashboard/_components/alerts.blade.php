{{--  Errors --}}
 @if($errors->any())
    <div class="alert-container col-lg-6 col-md-8 mx-auto">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>

            <h2 class="text-center">{!! icon('alert', __('Error message...')) !!}</h2>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>

        </div>
    </div>
@endif 

{{--  Status messages --}}
@if(session('status')) 
    <div class="alert-container col-lg-6 col-md-8 mx-auto">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>

            <h2 class="text-center">{!! icon('success', __('Success message!!!')) !!}</h2>

            <ul>
                <li>{{ session('status') }}</li>
            </ul>

        </div>
    </div>  
@endif 
