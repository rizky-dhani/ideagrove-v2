@php
    $code = 500;
    $title = app()->getLocale() === 'id' ? 'Kesalahan server' : 'Server error';
    $description = app()->getLocale() === 'id'
        ? 'Terjadi kesalahan yang tidak terduga. Tim kami telah diberi tahu dan sedang memperbaikinya.'
        : 'Something went wrong on our end. Our team has been notified and is working on it.';
@endphp
@include('errors.layout')
