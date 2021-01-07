@extends('layouts.base')

@section('body')

    <div class="text-center py-2 mb-2 border-b">
        <h1>Marketing.blade.php</h1>
        <div class="flex items-center space-x-2 justify-center">

            @if (auth()->check())
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endif
            
        </div>
    </div>
        
    <div class="max-w-3xl mx-auto">
        @yield('content')
    </div>
    
@endsection