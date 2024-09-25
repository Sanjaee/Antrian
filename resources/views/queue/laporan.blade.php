@extends('layouts.app')

@section('content')
<div class="bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-4">Laporan Rekap Pemanggilan Antrian</h2>
    <table class="min-w-full bg-white mb-6">
        <thead>
            <tr>
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Nomor Antrian</th>
                <th class="px-4 py-2 border">Jenis Antrian</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Waktu Ambil</th>
                <th class="px-4 py-2 border">Waktu Panggil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($queues as $index => $queue)
            <tr>
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $queue->nomor_antrian }}</td>
                <td class="border px-4 py-2">{{ $queue->jenis_antrian }}</td>
                <td class="border px-4 py-2">{{ ucfirst($queue->status) }}</td>
                <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($queue->waktu_ambil)->format('Y-m-d H:i:s') }}</td>
                <td class="border px-4 py-2">{{ isset($queue->waktu_panggil) ? \Carbon\Carbon::parse($queue->waktu_panggil)->diffForHumans() : 'Belum dipanggil' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-2xl font-bold mb-4">Seluruh Data Antrian</h2>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Nomor Antrian</th>
                <th class="px-4 py-2 border">Jenis Antrian</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Waktu Ambil</th>
                <th class="px-4 py-2 border">Waktu Panggil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allQueues as $index => $queue)
            <tr>
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $queue->nomor_antrian }}</td>
                <td class="border px-4 py-2">{{ $queue->jenis_antrian }}</td>
                <td class="border px-4 py-2">{{ ucfirst($queue->status) }}</td>
                <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($queue->waktu_ambil)->format('Y-m-d H:i:s') }}</td>
                <td class="border px-4 py-2">{{ isset($queue->waktu_panggil) ? \Carbon\Carbon::parse($queue->waktu_panggil)->diffForHumans() : 'Belum dipanggil' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
