@extends('panel.admin.layouts.app')
@section('title','Ordenes Asignadas')

@section('content')
@include('panel.admin.components.top-bar')
@include('panel.admin.components.flash-message')
    {{-- Título --}}
    <h2 class="intro-y text-lg font-medium mt-10">
        Ordenes asignadas
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{route('ordenesA.create')}}">
                <button class="button text-white bg-theme-1 shadow-md mr-2">Agregar nuevo</button>
            </a>
            <div class="dropdown">
                <button class="dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                    <span class="tooltip w-5 h-5 flex items-center justify-center" title="Agregar desde Excel"> <i class="w-4 h-4" data-feather="file-text"></i> </span>
                </button>
                <div class="dropdown-box w-auto">
                    <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                        {{-- <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a> --}}
                        <form action="{{route('ordersA.import.excel')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(Session::has('message'))
                            <p>{{Session::get('message')}}</p>
                            @endif

                        <input type="file" name="exceldoc" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">

                        <button type="submit" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md justify right"> <span class="w-5 h-5 flex items-center justify-center"> <i data-feather="send" class="w-4 h-4"></i> </span> Subir masivamente </button>
                        </form>
                        {{-- <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a> --}}
                    </div>
                </div>
            </div>
            {{-- <button class="ml-2 dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                <span class="tooltip w-5 h-5 flex items-center justify-center" title="Descargar plantilla"> <i class="w-4 h-4" data-feather="download"></i> </span>
            </button> --}}
            <button class="ml-2 dropdown-toggle button px-2 rounded-full text-gray-700 dark:text-gray-300">
                <span class="tooltip w-5 h-5 flex items-center justify-center" title="Para subir tus registros con excel debes utilizar nuestra plantilla"> <i  class="w-4 h-4" data-feather="help-circle"></i> </span>
            </button>
            <div class="hidden md:block mx-auto text-gray-600"></div>

            <form action="{{route('ordenesA.index')}}"  method="GET">
            <div class="w-full flex sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-50 mr-4 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" name="unit_number" placeholder="Contenedor...">
                    {{-- <button type="submit" ><i class="w-4 h-4 absolute inset-y-0 mr-3 mt-3 right-0" data-feather="search"></i></button> --}}
                </div>
                <div class="w-50 flex mr-8 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" name="chassis" placeholder="Chassis...">
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
                        <th></th>
                        <th class="whitespace-nowrap">No.</th>
                        <th class="whitespace-nowrap">Operador</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">Booking Number</th>
                        <th class="text-center whitespace-nowrap">Equipment</th>
                        <th class="text-center whitespace-nowrap">Unit Number</th>
                        <th class="text-center whitespace-nowrap">Origin Ramp</th>
                        <th class="text-center whitespace-nowrap">Destination Ramp</th>
                        <th class="text-center whitespace-nowrap">Chassis</th>
                        <th class="text-center whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($AllAsigned as $orden)
                    <tr class="intro-x">
                        <td>
                            <a class="items-center" href="{{route('ordenesA.show',$orden->id)}}" title="Ver detalle"> <i data-feather="package" class="w-4 h-4 mr-1"></i></a>
                        </td>
                        <td>
                            <div class="font-medium">{{$orden->id}}</div>
                            {{-- <a href="{{route('ordenesA.show',$orden->id)}}" class="text-gray-600 text-xs whitespace-nowrap mt-0.5">Ver detalles</a> --}}
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$orden->users->name}} {{$orden->users->last_name}}</div>
                        </td>
                        <td class="w-40">
                            @switch($orden->status)
                                @case($orden->status == "En espera")
                                <div class="flex items-center justify-center text-theme-11"> <i data-feather="clock" class="w-4 h-4 mr-2"></i> {{$orden->status}} </div>
                                    @break
                                @case($orden->status == "En camino")
                                    <div class="flex items-center justify-center text-theme-10"> <i data-feather="truck" class="w-4 h-4 mr-2"></i> {{$orden->status}} </div>
                                    @break
                                @case($orden->status == "Entregado")
                                    <div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{$orden->status}} </div>
                                    @break

                                @default

                            @endswitch

                        </td>
                        <td class="text-center">{{$orden->booking_number}}</td>
                        <td class="text-center">{{$orden->equipment}}</td>
                        <td class="text-center">{{$orden->unit_number}}</td>
                        <td class="text-center">{{$orden->origin_ramp}}</td>
                        <td class="text-center">{{$orden->destination_ramp}}</td>
                        <td class="text-center">{{$orden->chassis}}</td>
                        <td class="table-report__action w-40">
                            <div class="flex justify-center items-center">
                                <a class="items-center mr-3" href="{{route('ordenesA.edit',$orden->id)}}" title="Editar"> <i data-feather="pen-tool" class="w-4 h-4 mr-1"></i></a>
                                {{-- <a class="items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i></a> --}}
                                <form action="{{route('ordenesA.destroy',$orden->id)}}" class="delete-form" method="POST">
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
            {{ $AllAsigned->links() }}
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
