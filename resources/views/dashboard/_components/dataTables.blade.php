{!! BootForm::open() !!}
    {!! $dataTable->table(['class' => 'table table-striped'], $tableFooter ?? false) !!}
{!! BootForm::close() !!}

@section('dataTables')
    {!! $dataTable->scripts() !!}
@endsection