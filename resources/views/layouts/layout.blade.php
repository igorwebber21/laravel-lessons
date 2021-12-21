<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title> @section('title') My site:: @show </title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<header>
    @section('header')
        <div class="collapse bg-dark show" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                            <li><a href="{{ route('page.about') }}" class="text-white">About</a></li>
                            <li><a href="{{ route('send') }}" class="text-white">Send email</a></li>
                            @if (auth()->check())
                            <li style="color: #fff;">
                                <span>
                                    Hi, {{ auth()->user()->name  }}
                                    @if(auth()->user()->avatar)
                                        <img height="30" src="{{ asset('storage/'.auth()->user()->avatar) }}" alt="">
                                    @endif
                                </span>
                            </li>
                            <li><a href="{{ route('logout') }}" class="text-white">Logout</a></li>
                            @else
                            <li><a href="{{ route('register.create') }}" class="text-white">Registration</a></li>
                            <li><a href="{{ route('login.create') }}" class="text-white">Login</a></li>
                            @endif
                            <li><a href="{{ route('admin') }}" class="text-white">Admin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                    <strong>Album</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    @show
</header>

<main>
    <div class="mt-5">
        @include('layouts.errors')
    </div>
    @yield('content')
</main>

@include('layouts.footer')

<script src="{{ asset('js/scripts.js') }}" ></script>


</body>
</html>
