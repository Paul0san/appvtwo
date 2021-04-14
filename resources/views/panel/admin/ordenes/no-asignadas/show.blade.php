@extends('panel.admin.layouts.app')
@section('title','Detalle de orden')

@section('content')
@include('panel.admin.components.top-bar')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detalles de orden
    </h2>
</div>
<!-- BEGIN: Profile Info -->
<div class="intro-y box px-5 mt-5">
    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
        {{-- <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                <div class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2"> <i class="w-4 h-4 text-white" data-feather="camera"></i> </div>
            </div>
            <div class="ml-5">
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">Kevin Spacey</div>
                <div class="text-gray-600">Software Engineer</div>
            </div>
        </div> --}}
        <div class="mt-6 lg:mt-0 flex-1 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-base text-center lg:text-left lg:mt-5">Embarque</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-4">

                <div class="truncate sm:whitespace-normal flex items-center text-base"> <i data-feather="user" class="w-5 h-5 mr-2"></i>Chófer: No asignado </div>

                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-base"> <i data-feather="truck" class="w-5 h-5 mr-2"></i>Ruta: {{$orden->origin_ramp}} - {{$orden->destination_ramp}} </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-base"> <img src="{{asset('dist/images/menu-icon/stairway.svg')}}" class="w-5 h-5 mr-2">Rampa: {{$orden->ramp}} </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-base"> <img src="{{asset('dist/images/menu-icon/usa.svg')}}" class="w-5 h-5 mr-2">Zona de consignación: {{$orden->consignee_city}}, {{$orden->consignee_state}} </div>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-base text-center lg:text-left lg:mt-5">Datos</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                @if($orden->unit_number == null)
                <div class="truncate sm:whitespace-normal flex items-center text-base"> <img src="{{asset('dist/images/menu-icon/container.svg')}}" class="w-5 h-5 mr-2">Contenedor: No asignado </div>
                @else
                <div class="truncate sm:whitespace-normal flex items-center text-base"> <img src="{{asset('dist/images/menu-icon/container.svg')}}" class="w-5 h-5 mr-2">Contenedor: {{$orden->unit_number}} </div>
                @endif

                @if($orden->chassis == null)
                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-base"> <img src="{{asset('dist/images/menu-icon/truck.svg')}}" class="w-5 h-5 mr-2">Chassis: No asignado </div>
                @else
                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-base"> <img src="{{asset('dist/images/menu-icon/truck.svg')}}" class="w-5 h-5 mr-2">Chassis: {{$orden->chassis}} </div>
                @endif

                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-base"> <img src="{{asset('dist/images/menu-icon/online-booking.svg')}}" class="w-5 h-5 mr-2">Booking number: {{$orden->booking_number}} </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-base"> <i data-feather="file-text" class="w-5 h-5 mr-2"></i>MIL referencia: {{$orden->mil_reference}}</div>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-base text-center lg:text-left lg:mt-5">Servicio</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-base"> <i data-feather="dollar-sign" class="w-5 h-5 mr-2"></i>Costo de flete: {{$orden->work_price}} </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-base"> <img src="{{asset('dist/images/menu-icon/pay.svg')}}" class="w-5 h-5 mr-2">Pago a chófer: {{$orden->driver_paid}} </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-base"> <img src="{{asset('dist/images/menu-icon/barrel.svg')}}" class="w-5 h-5 mr-2">Costo de diesel: {{$orden->fuel_cost}} </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Profile Info -->
{{-- <div class="intro-y tab-content mt-5">
    <div class="tab-content__pane active" id="dashboard">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Top Categories -->
            <div class="intro-y box col-span-12 lg:col-span-6">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Top Categories
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
                <div class="p-5">
                    <div class="flex flex-col sm:flex-row">
                        <div class="mr-auto">
                            <a href="" class="font-medium">Wordpress Template</a>
                            <div class="text-gray-600 mt-1">HTML, PHP, Mysql</div>
                        </div>
                        <div class="flex">
                            <div class="w-32 -ml-2 sm:ml-0 mt-5 mr-auto sm:mr-5">
                                <canvas class="simple-line-chart-1" data-random="true" height="20"></canvas>
                            </div>
                            <div class="text-center">
                                <div class="font-medium">6.5k</div>
                                <div class="bg-theme-18 text-theme-9 rounded px-2 mt-1.5">+150</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row mt-5">
                        <div class="mr-auto">
                            <a href="" class="font-medium">Bootstrap HTML Template</a>
                            <div class="text-gray-600 mt-1">HTML, PHP, Mysql</div>
                        </div>
                        <div class="flex">
                            <div class="w-32 -ml-2 sm:ml-0 mt-5 mr-auto sm:mr-5">
                                <canvas class="simple-line-chart-1" data-random="true" height="20"></canvas>
                            </div>
                            <div class="text-center">
                                <div class="font-medium">2.5k</div>
                                <div class="bg-theme-17 text-theme-11 rounded px-2 mt-1.5">+150</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row mt-5">
                        <div class="mr-auto">
                            <a href="" class="font-medium">Tailwind HTML Template</a>
                            <div class="text-gray-600 mt-1">HTML, PHP, Mysql</div>
                        </div>
                        <div class="flex">
                            <div class="w-32 -ml-2 sm:ml-0 mt-5 mr-auto sm:mr-5">
                                <canvas class="simple-line-chart-1" data-random="true" height="20"></canvas>
                            </div>
                            <div class="text-center">
                                <div class="font-medium">3.4k</div>
                                <div class="bg-theme-14 text-theme-10 rounded px-2 mt-1.5">+150</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Top Categories -->
            <!-- BEGIN: Work In Progress -->
            <div class="intro-y box col-span-12 lg:col-span-6">
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
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                        </div>
                        <div class="ml-4 mr-auto">
                            <a href="" class="font-medium">Kevin Spacey</a>
                            <div class="text-gray-600 mr-5 sm:mr-5">Bootstrap 4 HTML Admin Template</div>
                        </div>
                        <div class="font-medium text-gray-700 dark:text-gray-600">+$19</div>
                    </div>
                    <div class="relative flex items-center mt-5">
                        <div class="w-12 h-12 flex-none image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-11.jpg">
                        </div>
                        <div class="ml-4 mr-auto">
                            <a href="" class="font-medium">Brad Pitt</a>
                            <div class="text-gray-600 mr-5 sm:mr-5">Tailwind HTML Admin Template</div>
                        </div>
                        <div class="font-medium text-gray-700 dark:text-gray-600">+$25</div>
                    </div>
                    <div class="relative flex items-center mt-5">
                        <div class="w-12 h-12 flex-none image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
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
            </div>
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
                <div class="grid grid-cols-1 xxl:grid-cols-7 gap-6 p-5">
                    <div class="xxl:col-span-2">
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
                    </div>
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
                            <canvas id="stacked-bar-chart-1" height="130"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Statistic -->
        </div>
    </div>
</div> --}}


@endsection
