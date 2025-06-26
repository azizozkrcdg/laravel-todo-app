@if (session('error'))
    <div class="alert alert-custom alert-danger alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            <div>{{ session('error') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-custom alert-success alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2"></i>
            <div>{{ session('success') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-custom alert-danger alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="bi bi-trash-fill me-2"></i>
            <div>{{ session('delete') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<style>
    .alert-custom {
        border: none;
        border-left: 4px solid;
        border-radius: 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        padding: 1rem 1.5rem;
    }

    .alert-danger {
        background-color: #fff5f5;
        border-left-color: #ff5252;
        color: #ff5252;
    }

    .alert-success {
        background-color: #f6fff6;
        border-left-color: #4caf50;
        color: #2e7d32;
    }

    .btn-close {
        padding: 0.5rem;
        opacity: 0.7;
    }

    .btn-close:hover {
        opacity: 1;
    }
</style>
