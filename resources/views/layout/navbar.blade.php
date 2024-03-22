<div class="container text-bg-dark">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-between py-2 mb-4">
        <div class="col-md-3 mb-2 mb-md-0">
            <button type="button" class="btn btn-primary me-1">{{ Auth::user()->name }}</button>
        </div>
        <h2 class="justify-content-center">{{ config('app.name') }}</h2>
        <div class="col-md-3 text-end">
            <a href="/auth/logout" class="btn btn-outline-warning me-2">Logout</a>
        </div>
    </header>
</div>