@if ($errors->any())
@if (Auth::check())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@else
<div class="mx-auto" style="width: 550px">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

@endif

@if (Session::get('info'))
@if (Auth::check())
<div class="alert alert-info">{{ Session::get('info') }}</div>
@else
<div class="mx-auto" style="width: 550px">
    <div class="alert alert-info">{{ Session::get('info') }}</div>
</div>
@endif

@endif