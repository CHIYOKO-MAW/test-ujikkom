@extends('layouts.admin')

@section('content')
    <h1 class="font-display mb-6 text-3xl font-bold text-slate-800">Tambah Produk</h1>

    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.products._form')
        </form>
    </div>
@endsection
