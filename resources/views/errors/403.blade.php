@php
    $code = 403;
    $title = app()->getLocale() === 'id' ? 'Akses ditolak' : 'Access denied';
    $description = app()->getLocale() === 'id'
        ? 'Kamu tidak memiliki izin untuk mengakses halaman ini.'
        : 'You do not have permission to access this page.';
@endphp
@include('errors.layout')
