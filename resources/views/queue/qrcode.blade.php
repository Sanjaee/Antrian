@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2 class="text-2xl font-bold mb-4">Scan QR Code untuk Pengambilan Tiket</h2>
    <div class="inline-block p-4 bg-white rounded shadow-md">
        {!! $qrCode !!}
    </div>
</div>
@endsection
