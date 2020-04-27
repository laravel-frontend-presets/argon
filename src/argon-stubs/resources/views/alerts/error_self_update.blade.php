@if ($errors->has($key))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $errors->first($key) }} <br>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif