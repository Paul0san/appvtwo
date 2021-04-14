@extends('auth.layouts.app')
@section('title', "Login" )

@section('content')
<div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left py-4">
            Accede
        </h2>
        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">En unos cuantos clicks entra a tu cuenta.</div>
        {{-- @include('gerente.components.flash-message') --}}
        <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="intro-x">
            <input id="email" type="email" name="email" required autofocus class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Correo electrónico">
            <input id="password" type="password" name="password" required class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Contraseña" >
        </div>
        {{-- <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
            <div class="flex items-center mr-auto">
                <input type="checkbox" class="input border mr-2" name="remember" id="remember">
                <label class="cursor-pointer select-none" for="remember-me">Recuerdame</label>
            </div>
        </div> --}}
        <div class="intro-x mt-5 text-center xl:text-left">
            <button type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top">Entrar</button>
            {{-- <a href="/"><button class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300 mt-3 xl:mt-0 align-top">Registrarte</button></a> --}}
        </div>
    </form>
        <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
            Para unirte a la familia, debes estar de acuerdo con nuestros
            <br>
            <a class="text-theme-1 dark:text-theme-10" href="">Terminos y condiciones</a> & <a class="text-theme-1 dark:text-theme-10" href="">politica de privacidad</a>
        </div>
    </div>
</div>
@endsection
