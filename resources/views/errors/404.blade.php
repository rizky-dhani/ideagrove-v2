@php
    $code = 404;
    $title = app()->getLocale() === 'id' ? 'Halaman tidak ditemukan' : 'Page not found';
    $description = app()->getLocale() === 'id'
        ? 'Halaman yang kamu cari mungkin sudah dihapus, namanya diganti, atau sedang tidak tersedia.'
        : 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.';
@endphp
@include('errors.layout')
