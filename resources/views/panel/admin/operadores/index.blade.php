@extends('panel.admin.layouts.app')
@section('title','Ordenes Asignadas')

@section('content')
@include('panel.admin.components.top-bar')
@include('panel.admin.components.flash-message')
    {{-- Título --}}
    <h2 class="intro-y text-lg font-medium mt-10">
        Operadores
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{route('operadores.create')}}">
                <button class="button text-white bg-theme-1 shadow-md mr-2">Agregar nuevo</button>
            </a>
            {{-- <button class="ml-2 dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                <span class="tooltip w-5 h-5 flex items-center justify-center" title="Descargar plantilla"> <i class="w-4 h-4" data-feather="download"></i> </span>
            </button> --}}

            <div class="hidden md:block mx-auto text-gray-600"></div>

            <form action="{{route('operadores.index')}}"  method="GET">
            <div class="w-full flex sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-50 mr-4 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" name="unit_number" placeholder="Nombre...">
                    {{-- <button type="submit" ><i class="w-4 h-4 absolute inset-y-0 mr-3 mt-3 right-0" data-feather="search"></i></button> --}}
                </div>
                <div class="w-10 flex relative text-gray-700 dark:text-gray-300">
                    {{-- <input type="text" class="input w-56 box pr-10 placeholder-theme-13" name="unit_number" placeholder="Chassis..."> --}}
                    <button type="submit" ><i class="w-4 h-5 absolute inset-y-0 mr-3 mt-2 right-0" data-feather="search"></i></button>
                </div>
            </div>
            </form>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-auto">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Nombre</th>
                        <th class="text-center whitespace-nowrap">Teléfono</th>
                        <th class="text-center whitespace-nowrap">Email</th>
                        <th class="text-center whitespace-nowrap">Compañía</th>
                        <th class="text-center whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drivers as $driver)
                    <tr class="intro-x">
                        <td>
                            <div class="font-medium">{{$driver->name}} {{$driver->last_name}}</div>
                            <a href="{{route('operadores.show',$driver->id)}}" class="text-gray-600 text-xs whitespace-nowrap mt-0.5">Ver perfil</a>
                        </td>
                        <td class="text-center">{{$driver->phone}}</td>
                        <td class="text-center">{{$driver->email}}</td>
                        <td class="text-center">{{$driver->company}}</td>
                        <td class="table-report__action w-40">
                            <div class="flex justify-center items-center">
                                <a class="items-center mr-3 tooltip" href="{{route('operadores.edit',$driver->id)}}" title="Editar"> <i data-feather="pen-tool" class="w-4 h-4 mr-1"></i></a>
                                {{-- <a class="items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i></a> --}}
                                <form action="{{route('operadores.destroy',$driver->id)}}" class="delete-form" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="items-center text-theme-6" type="submit" title="Eliminar"> <i data-feather="trash-2" class="w-4 h-4 mr-1 inline"></i></button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $drivers->links() }}
            {{-- <ul class="pagination">
                <li>
                    <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
                </li>
                <li>
                    <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                </li>
                <li> <a class="pagination__link" href="">...</a> </li>
                <li> <a class="pagination__link" href="">1</a> </li>
                <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
                <li> <a class="pagination__link" href="">3</a> </li>
                <li> <a class="pagination__link" href="">...</a> </li>
                <li>
                    <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                </li>
                <li>
                    <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
                </li>
            </ul>
            <select class="w-20 input box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select> --}}
        </div>
        <!-- END: Pagination -->
    </div>


@endsection
@section('extra-scripts')
<script>

    $('.delete-form').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: '¿Estás seguro?',
        text: "El registro se eliminará definitivamente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1E40AF',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, estoy seguro',
        cancelButtonText: 'No, cancela'
        }).then((result) => {
        if (result.isConfirmed) {
            // Swal.fire(
            // 'Deleted!',
            // 'Your file has been deleted.',
            // 'success'
            // )
            this.submit();
        }
        })
    });
</script>
<script>
    $('div.alert').delay(3000).slideUp(300);
</script>
@endsection
