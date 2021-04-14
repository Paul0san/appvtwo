@extends('panel.admin.layouts.app')
@section('title','Ordenes Asignadas')

@section('content')
@include('panel.admin.components.top-bar')
    {{-- Título --}}
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            Formulario de operador
        </h2>
    </div>
    <!-- BEGIN: Form -->
    <form action="{{route('operadores.update',$driver->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="intro-y box py-6 sm:py-6 mt-5">

            <div class="px-5 sm:px-20 mt-10 border-gray-200 dark:border-dark-5">
                @include('panel.admin.components.validation-errors')

                <div class="grid grid-cols-12 gap-5 gap-y-5 mt-6">
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <label class="mb-2" for="name">Nombre</label>
                        <input type="text" pattern="^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+" name="name" title="Solo acepta letras con o sin acento y espacios" id="name" class="input w-full border flex-1" placeholder="e.j Taylor" value="{{old('name', $driver->name)}}" required>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <label class="mb-2" for="last_name">Apellido</label>
                        <input type="text" pattern="^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+" title="Solo acepta letras con o sin acento y espacios" name="last_name" id="last_name" class="input w-full border flex-1" placeholder="e.j Otwell" value="{{old('last_name', $driver->last_name)}}" required>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <label class="mb-2" for="phone">Phone</label>
                        <input type="text" pattern="^[0-9]+" max="20" title="Solo se permiten máximo 20 numeros sin espacios" name="phone" id="phone" class="input w-full border flex-1" placeholder="e.j 2783082230" value="{{old('phone', $driver->phone)}}" required>
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <label class="mb-2" for="email">Email</label>
                        <input type="email" title="Escribe un email válido" name="email" id="email" class="input w-full border flex-1" placeholder="q.j contacto@vtwo.com" value="{{old('email', $driver->email)}}" required>
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <a href="{{ URL::previous() }}" type="button" class="button w-24 justify-center block border text-gray-700 dark:border-dark-5 dark:text-gray-300">Cancelar</a>
                        <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



@endsection
