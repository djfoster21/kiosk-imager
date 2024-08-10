@if (session('error'))
    <div class="alert alert-danger bg-red-400 text-white">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success bg-green-400">
        {{ session('success') }}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info bg-blue-400">
        {{ session('info') }}
    </div>
@endif
