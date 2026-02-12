@extends('layouts.admin')

@section('content')
    <h1 class="font-display mb-6 text-3xl font-bold text-white">Tambah Produk</h1>

    <div class="rounded-2xl border border-white/10 bg-slate-900/80 p-6 shadow-2xl backdrop-blur">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.products._form')
        </form>
    </div>
@endsection
