@if(session('success'))
    toastr.success('{{ session('success') }}');
@endif

@if(session('error'))
    toastr.error('{{ session('error') }}');
@endif

@if(session('warning'))
    toastr.warning('{{ session('warning') }}');
@endif
