@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md text-center">
    <h2 class="text-2xl font-bold mb-4">Tiket Antrian Anda</h2>
    <p class="text-lg mb-2">Nomor Antrian:</p>
    <p class="text-4xl font-bold mb-4">{{ $dataQueue->nomor_antrian }}</p>
    <p class="mb-2"><strong>Jenis Antrian:</strong> {{ $dataQueue->jenis_antrian }}</p>
    <p class="mb-2"><strong>Waktu Ambil:</strong> {{ $dataQueue->waktu_ambil }}</p>
</div>
@endsection
