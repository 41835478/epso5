@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('breadcrumb'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.' . $role . '.' . $section . '.index')],
            [trans('base.list')], 
        ])

        @slot('dropdownItems', [
            [Html::createLink($section, $role)], 
            [Html::newLink(
                [
                    'title' => icon('form', trans('buttons.tools')),
                    'route' => route('dashboard.admin.biocides.tools'), 
                    'class' => 'dropdown-item',
                ]
            )],
        ])
    @endcomponent

    {{-- Download --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card card-form">
                <div class="card-header bg-warning">{!! icon('form', trans('base.tools')) !!}: {!! trans_title($section) !!}</div>
                <div class="card-block">

                    <ol id="tools">
                        <li>
                            {!! trans('sections/biocides.tools:download') !!} <a href="{!! $server !!}" class="btn btn-info btn-lg">{!! icon('download', trans('buttons.download')) !!}</a>
                        </li>
                        <li>
                            {!! trans('sections/biocides.tools:rename', [
                                'xls'   => '<b>.xls</b>',
                                'csv'   => '<b>.csv</b>',
                                'file'  => '<b>biocides.csv</b>',
                            ]) !!}
                        </li>
                        <li>
                            {!! trans('sections/biocides.tools:storage', [
                                'folder' => '<b>storage/app/download</b>',
                            ]) !!}
                        </li>
                        <li>
                            {!! trans('sections/biocides.tools:upload', ['arrow' => icon('arrow-right')]) !!}
                            <div class="break-line col-md-12"></div>
                            {{-- Update form --}}
                            {!! BootForm::open()->action(route('dashboard.admin.biocides.tools.store'))->post()->enctype('multipart/form-data') !!}
                                <div class="break-line col-md-12"></div>
                                {!! BootForm::button(icon('reset', trans('buttons.update')))->name('button-edit-submit')->id('button-edit-submit')->addClass('btn-success btn-lg')->type('submit') !!}

                            {!! BootForm::close() !!}
                            {{-- Update form --}}
                        </li>
                    </ol>
                    
                </div>
            </div>
        </div>
    </div>
@endsection