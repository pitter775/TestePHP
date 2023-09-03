@if (session('success'))
    <div class="alert alert-success alertposition">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alertposition">
        {{ session('error') }}
    </div>
@endif