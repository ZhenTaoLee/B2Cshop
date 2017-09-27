
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

@if (session('errorTip'))
    <div class="alert alert-danger">
        {{ session('errorTip') }}
    </div>
@endif
