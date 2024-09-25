<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Tambahkan viewport meta tag -->
    <title>Antrian Ticket</title>
 
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex flex-wrap items-center justify-between">
            <div class="text-white font-bold text-xl">
                Antrian Ticket
            </div>
            <div class="flex items-center mt-2 md:mt-0">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('laporan') }}" class="text-white mr-4 hover:bg-blue-700 px-3 py-2 rounded transition duration-200">Laporan</a>
                        <a href="{{ route('panggil-antrian.form') }}" class="text-white mr-4 hover:bg-blue-700 px-3 py-2 rounded transition duration-200">Panggil Antrian</a>
                        <a href="{{ route('data.customers') }}" class="text-white mr-4 hover:bg-blue-700 px-3 py-2 rounded transition duration-200">Data Customer</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="flex items-center">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600 transition duration-200">Logout</button>
                    </form>
                @else
                    <!-- Bagian ini dikosongkan karena login dihapus -->
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mx-auto mt-8 px-4">
        @yield('content')
    </div>

</body>
</html>
