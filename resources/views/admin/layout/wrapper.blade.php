@php
    if (!session()->has('id_user')) {
        header('Location: ' . url('login'));
        exit;
    }

    if (request()->segment(1) === 'user' && session('unit_id') != 18) {
        header('Location: ' . url('dasbor'));
        exit;
    }
@endphp

@include('admin/layout/head')
@include('admin/layout/header')
@include('admin/layout/menu')
@include($content)
@include('admin/layout/footer')