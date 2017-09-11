<div class="row">
    @Role('admin')
        Admin
    @elseIfRole('editor')
        Editor 
    @endRole
</div>