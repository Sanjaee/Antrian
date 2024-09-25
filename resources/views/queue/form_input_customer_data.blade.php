@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-center">Data Customer Baru</h2>
    <form action="{{ route('customer.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="no_polisi" value="{{ $no_polisi }}">
        <input type="hidden" name="jenis_antrian" value="{{ $jenis_antrian }}">

        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-bold mb-2">Nama</label>
            <input type="text" name="nama" id="nama" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="alamat" class="block text-gray-700 font-bold mb-2">Alamat</label>
            <textarea name="alamat" id="alamat" class="w-full p-2 border rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label for="no_hp" class="block text-gray-700 font-bold mb-2">No HP</label>
            <input type="number" name="no_hp" id="no_hp" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700 transition duration-300">Simpan Data dan Ambil Tiket</button>
    </form>
</div>
@endsection
