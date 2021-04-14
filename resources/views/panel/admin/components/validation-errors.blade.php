@if (count($errors) > 0)
<div class="rounded-md px-5 py-4 mb-2 bg-theme-6 text-white">
    <div class="flex items-center">
        <div class="font-medium text-lg">Corrige los siguientes errores:</div>
        <div class="text-xs bg-white px-1 rounded-md text-gray-800 ml-auto">New</div>
    </div>
    @foreach ($errors->all() as $message)

        <li class="mt-3">{{$message}}</li>

    @endforeach
</div>
@endif



