<div class="row">
    @Role('admin')
        {{-- Field: Client --}}
        {!! BootForm::select(sections('clients.title'), 'client_id')
            ->addGroupClass('col-md-4')
            ->options($clients)
            ->select(0)
            ->required()
        !!}
        {{-- Field: User --}}
        {!! BootForm::select(sections('users.title'), 'user_id')
            ->addGroupClass('col-md-4')
            ->options([])
        !!}
    @elseIfRole('editor')
        {{-- Field: User --}}
        {!! BootForm::select(sections('users.title'), 'user_id')
            ->addGroupClass('col-md-4')
            ->options($users)
            ->select(0)
        !!}
    @endRole
</div>