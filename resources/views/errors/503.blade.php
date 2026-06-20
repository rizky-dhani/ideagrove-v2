@php
    $code = 503;
    $title = app()->getLocale() === 'id' ? 'Sementara tidak tersedia' : 'Service unavailable';
    $description = app()->getLocale() === 'id'
        ? 'Situs sedang dalam pemeliharaan. Kami akan segera kembali.'
        : 'We are currently performing maintenance. We will be back shortly.';
@endphp
@include('errors.layout')
