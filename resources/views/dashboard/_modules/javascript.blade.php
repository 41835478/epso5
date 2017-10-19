@if(Request::ajax())
    {{-- When load pages with ajax, we need to keep the code in the loaded page. --}}
    <script>
        {!! Minify::folder('vineyard')->js() !!}
    </script>
@else
    {{-- In the other cases... just add the code to the javascript container --}}
    @section('javascript')
        <script>
            {!! Minify::folder('vineyard')->js() !!}
        </script>
    @endsection
@endif