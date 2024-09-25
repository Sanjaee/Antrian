@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-4">Admin Login</h2>
    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="username" class="block text-gray-700 font-bold mb-2">Username</label>
            <input type="text" name="username" id="username" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
            <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
        </div>
        @if($errors->any())
            <div class="mb-4 p-2 bg-red-200 text-red-800 rounded">
                {{ $errors->first() }}
            </div>
        @endif
        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Login</button>
    </form>
</div>
@endsection
