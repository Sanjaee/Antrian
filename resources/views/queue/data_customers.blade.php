@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Data Customer</h1>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">No Polisi</th>
                <th class="py-2 px-4 border-b">Nama</th>
                <th class="py-2 px-4 border-b">Alamat</th>
                <th class="py-2 px-4 border-b">No HP</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td class="py-2 px-4 border-b">{{ $customer->no_polisi }}</td>
                <td class="py-2 px-4 border-b">{{ $customer->nama }}</td>
                <td class="py-2 px-4 border-b">{{ $customer->alamat }}</td>
                <td class="py-2 px-4 border-b">{{ $customer->no_hp }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
