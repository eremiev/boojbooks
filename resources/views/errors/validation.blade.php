@foreach($errors->all() as $error)
    <div class="alert-danger" role="alert">
        <span  aria-hidden="true"></span>
        {{ $error }}
    </div>
@endforeach