

@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')
<div class="fixed inset-0 w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-900 via-purple-900 to-gray-900">
    <div class="w-full max-w-md bg-white/10 backdrop-blur rounded-xl shadow-lg p-8 border border-white/20">
        <h2 class="text-3xl font-bold text-center text-white mb-6">Forgot Password</h2>
        <div class="mb-5 text-indigo-100 text-sm text-center">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        @if (session('status'))
            <div class="mb-4 text-green-300 text-center font-medium">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-white mb-1">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2 rounded-lg bg-white/80 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                @if ($errors->has('email'))
                    <div class="text-red-400 text-xs mt-1">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <button type="submit" class="w-full py-2 px-4 rounded-lg bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition">Email Password Reset Link</button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-indigo-300 hover:underline">Back to login</a>
        </div>
    </div>
</div>
@endsection
