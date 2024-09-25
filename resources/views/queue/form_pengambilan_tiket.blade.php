@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-4">Form Pengambilan Tiket</h2>
    <form action="{{ route('ambil-tiket.submit') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="no_polisi" class="block text-gray-700 font-bold mb-2">No Polisi</label>
            <input type="number" name="no_polisi" id="no_polisi" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label for="jenis_antrian" class="block text-gray-700 font-bold mb-2">Jenis Antrian</label>
            <select name="jenis_antrian" id="jenis_antrian" class="w-full p-2 border rounded" required>
                <option value="">-- Pilih Jenis Antrian --</option>
                <option value="GR">GR</option>
                <option value="BP">BP</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Ambil Tiket</button>
    </form>
</div>
@endsection
