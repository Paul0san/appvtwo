@extends('panel.admin.layouts.app')
@section('title','Detalle de orden')

@section('content')
@include('panel.admin.components.top-bar')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Perfil de operador
    </h2>
</div>
<!-- BEGIN: Profile Info -->
<div class="intro-y box px-5 pt-5 mt-5">
    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="https://cdn.dribbble.com/users/679372/screenshots/3820445/driver_2.gif">
                {{-- <div class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2"> <i class="w-4 h-4 text-white" data-feather="camera"></i> </div> --}}
            </div>
            <div class="ml-5">
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$driver->name}} {{$driver->last_name}}</div>
                <div class="text-gray-600">Chofér de unidad</div>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-5">Datos de contacto</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="mail" class="w-4 h-4 mr-2"></i> {{$driver->email}}</div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-feather="phone" class="w-4 h-4 mr-2"></i> {{$driver->phone}}</div>
                {{-- <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-feather="twitter" class="w-4 h-4 mr-2"></i> Twitter Kevin Spacey </div> --}}
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-5">Balance del mes</div>
            <div class="flex items-center justify-center lg:justify-start mt-2">
                <div class="mr-2 w-20 flex"> USP: <span class="ml-3 font-medium text-theme-9">+23%</span> </div>
                <div class="w-3/4 overflow-auto">
                    <canvas class="simple-line-chart-1" height="50"></canvas>
                </div>
            </div>
            <div class="flex items-center justify-center lg:justify-start">
                <div class="mr-2 w-20 flex"> STP: <span class="ml-3 font-medium text-theme-6">-2%</span> </div>
                <div class="w-3/4 overflow-auto">
                    <canvas class="simple-line-chart-2" height="50"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start"> <a data-toggle="tab" data-target="#dashboard" href="javascript:;" class="py-4 sm:mr-8 active">Tablero</a>  </div>
</div>
<!-- END: Profile Info -->
<div class="intro-y tab-content mt-5">
    <div class="tab-content__pane active" id="dashboard">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Top Categories -->
            <div class="intro-y box col-span-12">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Ordenes
                    </h2>
                    <div class="dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                        <div class="dropdown-box w-40">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="plus" class="w-4 h-4 mr-2"></i> Add Category </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex pt-5 pr-5 pb-5">

                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="text-left whitespace-nowrap">Status</th>
                                <th class="text-left whitespace-nowrap">Booking Number</th>
                                <th class="text-left whitespace-nowrap">Equipment</th>
                                <th class="text-left whitespace-nowrap">Unit Number</th>
                                <th class="text-left whitespace-nowrap">Origin Ramp</th>
                                <th class="text-left whitespace-nowrap">Destination Ramp</th>
                                <th class="text-left whitespace-nowrap">Chassis</th>
                                <th class="text-left whitespace-nowrap">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $orders as $currentOrder )
                            <tr class="intro-x">
                                <td class="w-40">
                                    @switch($currentOrder->status)
                                        @case($currentOrder->status == "En espera")
                                        <div class="flex items-center justify-left text-theme-11"> <i data-feather="clock" class="w-4 h-4 mr-2"></i> {{$currentOrder->status}} </div>
                                            @break
                                        @case($currentOrder->status == "En camino")
                                            <div class="flex items-center justify-left text-theme-10"> <i data-feather="truck" class="w-4 h-4 mr-2"></i> {{$currentOrder->status}} </div>
                                            @break
                                        @case($currentOrder->status == "Entregado")
                                            <div class="flex items-center justify-left text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{$currentOrder->status}} </div>
                                            @break

                                        @default

                                    @endswitch

                                </td>
                                <td class="text-left">{{$currentOrder->booking_number}}</td>
                                <td class="text-left">{{$currentOrder->equipment}}</td>
                                <td class="text-left">{{$currentOrder->unit_number}}</td>
                                <td class="text-left">{{$currentOrder->origin_ramp}}</td>
                                <td class="text-left">{{$currentOrder->destination_ramp}}</td>
                                <td class="text-left">{{$currentOrder->chassis}}</td>

                                <td class="table-report__action w-20">
                                    <div class="flex justify-left items-center">
                                        <a class="items-center mr-3 tooltip" href="{{route('ordenesA.edit',$currentOrder->id)}}" title="Editar"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i></a>
                                        {{-- <a class="items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i></a> --}}
                                        <form action="{{route('ordenesA.destroy',$currentOrder->id)}}" class="delete-form" method="POST">
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
            </div>
            <!-- END: Top Categories -->
            <!-- BEGIN: Work In Progress -->
            {{-- <div class="intro-y box col-span-12 lg:col-span-6">
                <div class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Work In Progress
                    </h2>
                    <div class="dropdown ml-auto sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                        <div class="nav-tabs dropdown-box w-40">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2"> <a href="javascript:;" data-toggle="tab" data-target="#new" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">New</a> <a href="javascript:;" data-toggle="tab" data-target="#last-week" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">Last Week</a> </div>
                        </div>
                    </div>
                    <div class="nav-tabs ml-auto hidden sm:flex"> <a data-toggle="tab" data-target="#work-in-progress-new" href="javascript:;" class="py-5 ml-6 active">New</a> <a data-toggle="tab" data-target="#work-in-progress-last-week" href="javascript:;" class="py-5 ml-6">Last Week</a> </div>
                </div>
                <div class="p-5">
                    <div class="tab-content">
                        <div class="tab-content__pane active" id="work-in-progress-new">
                            <div>
                                <div class="flex">
                                    <div class="mr-auto">Pending Tasks</div>
                                    <div>20%</div>
                                </div>
                                <div class="w-full h-1 mt-2 bg-gray-400 dark:bg-dark-1 rounded-full">
                                    <div class="w-1/2 h-full bg-theme-1 rounded-full"></div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="flex">
                                    <div class="mr-auto">Completed Tasks</div>
                                    <div>2 / 20</div>
                                </div>
                                <div class="w-full h-1 mt-2 bg-gray-400 dark:bg-dark-1 rounded-full">
                                    <div class="w-1/4 h-full bg-theme-1 rounded-full"></div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="flex">
                                    <div class="mr-auto">Tasks In Progress</div>
                                    <div>42</div>
                                </div>
                                <div class="w-full h-1 mt-2 bg-gray-400 dark:bg-dark-1 rounded-full">
                                    <div class="w-3/4 h-full bg-theme-1 rounded-full"></div>
                                </div>
                            </div>
                            <a href="" class="button w-40 mx-auto justify-center block bg-gray-200 dark:bg-dark-5 dark:text-gray-300 text-gray-600 mt-5">View More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Work In Progress -->
            <!-- BEGIN: Daily Sales -->
            <div class="intro-y box col-span-12 lg:col-span-6">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Daily Sales
                    </h2>
                    <div class="dropdown ml-auto sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                        <div class="dropdown-box w-40">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Excel </a>
                            </div>
                        </div>
                    </div>
                    <button class="button border relative flex items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Excel </button>
                </div>
                <div class="p-5">
                    <div class="relative flex items-center">
                        <div class="w-12 h-12 flex-none image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="{{asset('dist/images/profile-10.jpg')}}">
                        </div>
                        <div class="ml-4 mr-auto">
                            <a href="" class="font-medium">Kevin Spacey</a>
                            <div class="text-gray-600 mr-5 sm:mr-5">Bootstrap 4 HTML Admin Template</div>
                        </div>
                        <div class="font-medium text-gray-700 dark:text-gray-600">+$19</div>
                    </div>
                    <div class="relative flex items-center mt-5">
                        <div class="w-12 h-12 flex-none image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="{{asset('dist/images/profile-11.jpg')}}">
                        </div>
                        <div class="ml-4 mr-auto">
                            <a href="" class="font-medium">Brad Pitt</a>
                            <div class="text-gray-600 mr-5 sm:mr-5">Tailwind HTML Admin Template</div>
                        </div>
                        <div class="font-medium text-gray-700 dark:text-gray-600">+$25</div>
                    </div>
                    <div class="relative flex items-center mt-5">
                        <div class="w-12 h-12 flex-none image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="{{asset('dist/images/profile-1.jpg')}}">
                        </div>
                        <div class="ml-4 mr-auto">
                            <a href="" class="font-medium">Kate Winslet</a>
                            <div class="text-gray-600 mr-5 sm:mr-5">Vuejs HTML Admin Template</div>
                        </div>
                        <div class="font-medium text-gray-700 dark:text-gray-600">+$21</div>
                    </div>
                </div>
            </div>
            <!-- END: Daily Sales -->
            <!-- BEGIN: Latest Tasks -->
            <div class="intro-y box col-span-12 lg:col-span-6">
                <div class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Latest Tasks
                    </h2>
                    <div class="dropdown ml-auto sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                        <div class="nav-tabs dropdown-box w-40">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2"> <a href="javascript:;" data-toggle="tab" data-target="#new" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">New</a> <a href="javascript:;" data-toggle="tab" data-target="#last-week" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">Last Week</a> </div>
                        </div>
                    </div>
                    <div class="nav-tabs ml-auto hidden sm:flex"> <a data-toggle="tab" data-target="#latest-tasks-new" href="javascript:;" class="py-5 ml-6 active">New</a> <a data-toggle="tab" data-target="#latest-tasks-last-week" href="javascript:;" class="py-5 ml-6">Last Week</a> </div>
                </div>
                <div class="p-5">
                    <div class="tab-content">
                        <div class="tab-content__pane active" id="latest-tasks-new">
                            <div class="flex items-center">
                                <div class="border-l-2 border-theme-1 dark:border-theme-1 pl-4">
                                    <a href="" class="font-medium">Create New Campaign</a>
                                    <div class="text-gray-600">10:00 AM</div>
                                </div>
                                <input class="input input--switch ml-auto border" type="checkbox">
                            </div>
                            <div class="flex items-center mt-5">
                                <div class="border-l-2 border-theme-1 dark:border-theme-1 pl-4">
                                    <a href="" class="font-medium">Meeting With Client</a>
                                    <div class="text-gray-600">02:00 PM</div>
                                </div>
                                <input class="input input--switch ml-auto border" type="checkbox">
                            </div>
                            <div class="flex items-center mt-5">
                                <div class="border-l-2 border-theme-1 dark:border-theme-1 pl-4">
                                    <a href="" class="font-medium">Create New Repository</a>
                                    <div class="text-gray-600">04:00 PM</div>
                                </div>
                                <input class="input input--switch ml-auto border" type="checkbox">
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- END: Latest Tasks -->
            <!-- BEGIN: General Statistic -->
            <div class="intro-y box col-span-12">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        General Statistics
                    </h2>
                    <div class="dropdown ml-auto sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                        <div class="dropdown-box w-40">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download XML </a>
                            </div>
                        </div>
                    </div>
                    <button class="button border relative flex items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download XML </button>
                </div>
                <div class="grid grid-cols-1  gap-6 p-5">
                    {{-- <div class="xxl:col-span-2">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-2 sm:col-span-1 xxl:col-span-2 box dark:bg-dark-6 p-5">
                                <div class="font-medium">Net Worth</div>
                                <div class="flex items-center mt-1 sm:mt-0">
                                    <div class="mr-4 w-20 flex"> USP: <span class="ml-3 font-medium text-theme-9">+23%</span> </div>
                                    <div class="w-5/6 overflow-auto">
                                        <canvas class="simple-line-chart-1" data-random="true" height="60"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1 xxl:col-span-2 box dark:bg-dark-6 p-5">
                                <div class="font-medium">Sales</div>
                                <div class="flex items-center mt-1 sm:mt-0">
                                    <div class="mr-4 w-20 flex"> USP: <span class="ml-3 font-medium text-theme-6">-5%</span> </div>
                                    <div class="w-5/6 overflow-auto">
                                        <canvas class="simple-line-chart-1" data-random="true" height="60"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1 xxl:col-span-2 box dark:bg-dark-6 p-5">
                                <div class="font-medium">Profit</div>
                                <div class="flex items-center mt-1 sm:mt-0">
                                    <div class="mr-4 w-20 flex"> USP: <span class="ml-3 font-medium text-theme-6">-10%</span> </div>
                                    <div class="w-5/6 overflow-auto">
                                        <canvas class="simple-line-chart-1" data-random="true" height="60"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1 xxl:col-span-2 box dark:bg-dark-6 p-5">
                                <div class="font-medium">Products</div>
                                <div class="flex items-center mt-1 sm:mt-0">
                                    <div class="mr-4 w-20 flex"> USP: <span class="ml-3 font-medium text-theme-9">+55%</span> </div>
                                    <div class="w-5/6 overflow-auto">
                                        <canvas class="simple-line-chart-1" data-random="true" height="60"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="xxl:col-span-5 w-full">
                        <div class="flex justify-center mt-8">
                            <div class="flex items-center mr-5">
                                <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div>
                                <span>Product Profit</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-gray-400 rounded-full mr-3"></div>
                                <span>Author Sales</span>
                            </div>
                        </div>
                        <div class="report-chart mt-8">
                            <canvas id="vertical-bar-chart-widget" height="100"></canvas>
                         </div>
                    </div>
                </div>
            </div>
            <!-- END: General Statistic -->
        </div>
    </div>
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
@endsection
