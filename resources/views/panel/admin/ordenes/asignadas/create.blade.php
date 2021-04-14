@extends('panel.admin.layouts.app')
@section('title','Ordenes Asignadas')

@section('content')
@include('panel.admin.components.top-bar')
    {{-- Título --}}
    <h2 class="intro-y text-lg font-medium mt-10">
        Formulario de creación
    </h2>
    {{--Formulario--}}
    <div class="grid grid-cols-12 box mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('ordenesA.store')}}" method="POST">
                @csrf
            <div class="intro-y p-5">
                @include('panel.admin.components.validation-errors')
                <div class="mt-3" id="basic-select">
                <div class="preview">
                    <div>
                        <label>Driver</label>
                        <div class="mt-2">
                            <select data-search="true" data-placeholder="Escribe un nombre" class="tail-select w-full" name="driver" required>
                                @foreach ($drivers as $driver)
                                <option value="{{$driver->id}}" {{old('driver') == $driver->id ? 'selected' : '' }}>{{$driver->name}} {{$driver->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <label for="origin_ramp">Origin ramp</label>
                <div class="relative mt-2">
                    <input type="text" pattern="[A-Za-z, ]+" title="Solo se permiten letras, comas y espacios" name="origin_ramp" id="origin_ramp" class="input pr-12 w-full border col-span-4" placeholder="e.j LOS ANGELES, CA" onkeyup="mayus(this);" value="{{old('origin_ramp')}}" required>
                </div>
            </div>
            <div class="mt-3">
                <label for="destination_ramp">Destination ramp</label>
                <div class="relative mt-2">
                    <input type="text" name="destination_ramp" pattern="[A-Za-z, ]+" title="Solo se permiten letras, comas y espacios" id="destination_ramp" class="input pr-12 w-full border col-span-4" placeholder="e.j MIAMI, FL" onkeyup="mayus(this);" value="{{old('destination_ramp')}}" required>
                </div>
            </div>
            <div class="mt-3">
                <label for="ramp">Ramp</label>
                <div class="relative mt-2">
                    <input type="text" name="ramp" pattern="[A-Za-z/-_, ]+" title="Solo se permiten letras, comas y espacios" id="ramp" class="input pr-12 w-full border col-span-4" placeholder="e.j COMMERCE" onkeyup="mayus(this);" value="{{old('ramp')}}" required>
                </div>
            </div>
            <div class="mt-3">
                <label for="rail_route">Rail Route</label>
                <div class="relative mt-2">
                    <input type="text" name="rail_route" pattern="[A-Za-z, ]+" title="Solo se permiten letras, comas y espacios" id="rail_route" class="input pr-12 w-full border col-span-4" placeholder="e.j LOSAN BNSF KANCY" onkeyup="mayus(this);" value="{{old('rail_route')}}" required>
                </div>
            </div>
            <div class="mt-3">
                <label for="mil_reference">MIL reference</label>
                <div class="relative mt-2">
                    <input type="text" pattern="^[0-9]+" title="Solo se permiten numeros positivos" name="mil_reference" id="mil_reference" class="input pr-12 w-full border col-span-4" placeholder="e.j 3466445" value="{{old('mil_reference')}}" required>
                </div>
            </div>

            <div class="mt-3">
                <label>Details</label>
                <div class="sm:grid grid-cols-3 gap-2">
                    <div class="relative mt-2">
                        <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Vessel</div>
                        <div class="pl-8">
                            <input type="text" class="input pl-20 w-full border col-span-4" name="vessel" pattern="[A-Za-z ]+" title="Solo se permiten letras y espacios" id="vessel" placeholder="DKI" onkeyup="mayus(this);" min="3" value="{{old('vessel')}}" required>
                        </div>
                    </div>
                    <div class="relative mt-2">
                        <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Voyage</div>
                        <div class="pl-8">
                            <input type="text" class="input pl-20 w-full border col-span-4" placeholder="044" pattern="^[0-9]+" title="Solo se permiten numeros positivos" name="voyage" id="voyage" value="{{old('voyage')}}" required>
                        </div>
                    </div>
                    <div class="relative mt-2">
                        <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Equipment</div>
                        <div class="pl-8">
                            <input type="text" pattern="[A-Za-z0-9]+" title="Solo se permiten letras y numeros" name="equipment" id="equipment" class="input pl-20 w-full border col-span-4" placeholder="e.j 40CN" onkeyup="mayus(this);" value="{{old('equipment')}}" required>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- END: Form Layout -->
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-5">
                <div class="mt-3">
                    <label>Unit number</label>
                    <div class="relative mt-2">
                        <input type="text" pattern="[A-Za-z0-9-]+" title="Solo se permiten letras,numeros y guiones medios" name="unit_number" id="unit_number" class="input pr-12 w-full border col-span-4" placeholder="e.j MATU453955-2" onkeyup="mayus(this);" value="{{old('unit_number')}}" required>
                    </div>
                </div>
            <div class="mt-3">
                <label>Chassis</label>
                <div class="relative mt-2">
                    <input type="text" pattern="[A-Za-z0-9]+" title="Solo se permiten letras y numeros" name="chassis" id="chassis" class="input pr-12 w-full border col-span-4" placeholder="e.j MATZ946731" onkeyup="mayus(this);" value="{{old('chassis')}}" required>
                </div>
            </div>
            <div class="mt-3">
                <label for="booking_number">Booking number</label>
                <div class="relative mt-2">
                    <input type="text" pattern="^[0-9]+" title="Solo se permiten numeros positivos" name="booking_number" id="booking_number" class="input pr-12 w-full border col-span-4" placeholder="e.j 5390967" value="{{old('booking_number')}}" required>
                </div>
            </div>
            <div class="mt-3">
                <label for="consignee_city">Consignee city</label>
                <div class="relative mt-2">
                    <input type="text" name="consignee_city" pattern="[A-Za-z, ]+" title="Solo se permiten letras, comas y espacios" id="consignee_city" class="input pr-12 w-full border col-span-4" placeholder="e.j MIAMI" onkeyup="mayus(this);" value="{{old('consignee_city')}}" required>
                </div>
            </div>
            <div class="mt-3">
                <label for="consignee_state">Consignee state</label>
                <div class="relative mt-2">
                    <input type="text" type="text" name="consignee_state" pattern="[A-Za-z, ]+" title="Solo se permiten letras, comas y espacios" id="consignee_state" class="input pr-12 w-full border col-span-4" placeholder="e.j FLORIDA" onkeyup="mayus(this);" value="{{old('consignee_state')}}" required>
                </div>
            </div>
            <div class="mt-3">
                <label for="status">Status</label>
                <div class="relative mt-2">
                    <input type="text" class="input pr-12 w-full border col-span-4" name="status" title="Este valor no puede ser cambiado, cuando el chofér confirme la orden pasará a 'En camino' "id="status" lass="input pr-12 w-full border col-span-4" placeholder="En espera de confirmación" value="En espera" readonly required>
                </div>
            </div>

            <div class="mt-3">
                <label>Costs</label>
                <div class="sm:grid grid-cols-3 gap-2">
                    <div class="relative mt-2">
                        <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Freight</div>
                        <div class="pl-8">
                            <input type="text" class="input pl-20 w-full border col-span-4" placeholder="300" pattern="^[0-9]+" title="Solo se permiten numeros positivos" name="work_price" id="work_price" value="{{old('work_price')}}" required>
                        </div>
                    </div>
                    <div class="relative mt-2">
                        <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Pay</div>
                        <div class="pl-8">
                            <input type="text" class="input pl-20 w-full border col-span-4" placeholder="100" pattern="^[0-9]+" title="Solo se permiten numeros positivos" name="driver_paid" id="driver_paid" value="{{old('driver_paid')}}" required>
                        </div>
                    </div>
                    <div class="relative mt-2">
                        <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Fuel</div>
                        <div class="pl-8">
                            <input type="text" class="input pl-20 w-full border col-span-4" placeholder="40" pattern="^[0-9]+" title="Solo se permiten numeros positivos" name="fuel" id="fuel" value="{{old('fuel')}}" required>
                        </div>
                    </div>
                </div>
            </div>

            <input type="text" name="type" id="type" value="Asignado" hidden>

                <div class="text-right mt-5">
                    <a href="{{ URL::previous() }}" type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancelar</a>
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Crear</button>
                </div>
            </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>



@endsection
