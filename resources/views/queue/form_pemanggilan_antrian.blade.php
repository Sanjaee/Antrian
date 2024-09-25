@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md text-center">
    <h2 class="text-2xl font-bold mb-4">Pemanggilan Antrian</h2>

    @if(session('success'))
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($nextQueue)
        <p class="text-lg mb-2">Antrian Selanjutnya:</p>
        <p class="text-4xl font-bold mb-4">{{ $nextQueue->nomor_antrian }}</p>
        <p class="mb-2"><strong>Jenis Antrian:</strong> {{ $nextQueue->jenis_antrian }}</p>

        <form action="{{ route('panggil-antrian.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="queue_id" value="{{ $nextQueue->id }}">
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Panggil Antrian</button>
        </form>
    @else
        <p class="text-lg">Tidak ada antrian saat ini.</p>
    @endif
</div>
@endsection
