@php
    $code = 419;
    $title = app()->getLocale() === 'id' ? 'Sesi kedaluwarsa' : 'Page expired';
    $description = app()->getLocale() === 'id'
        ? 'Sesi kamu telah berakhir karena tidak aktif terlalu lama. Silakan muat ulang halaman dan coba lagi.'
        : 'Your session has expired because it was idle too long. Please reload the page and try again.';
@endphp
@include('errors.layout')
