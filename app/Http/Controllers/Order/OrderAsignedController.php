<?php

namespace App\Http\Controllers\Order;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Imports\OrdersAImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreateOrderAsignedRequest;
use App\Http\Requests\UpdateOrderNAsignedRequest;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class OrderAsignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $unit_number = $request->get('unit_number');
        $chassis = $request->get('chassis');
        $booking_number = $request->get('booking_number');

        $AllAsigned = Order::with('users')
        ->where('type','=','Asignado')
        ->unit_number($unit_number)
        ->chassis($chassis)
        ->orderBy('id','DESC')
        ->paginate(10);
        // dd($AllAsigned);
        return view('panel.admin.ordenes.asignadas.index',compact('AllAsigned'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = User::whereHas("roles", function($q){ $q->where("name", "Driver"); })->get();
        return view('panel.admin.ordenes.asignadas.create',compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderAsignedRequest $request)
    {
        try {
            $input = $request->all();
        $order = Order::create(
            [
                'Vessel' => $input['vessel'],
                'Voyage' => $input['voyage'],
                'booking_number' => $input['booking_number'],
                'equipment' => $input['equipment'],
                'mil_reference' => $input['mil_reference'],
                'unit_number' => $input['unit_number'],
                'origin_ramp' => $input['origin_ramp'],
                'destination_ramp' => $input['destination_ramp'],
                'rail_route' => $input['rail_route'],
                'consignee_city' => $input['consignee_city'],
                'consignee_state' => $input['consignee_state'],
                'ramp' => $input['ramp'],
                'chassis' => $input['chassis'],
                'work_price' => $input['work_price'],
                'driver_paid' => $input['driver_paid'],
                'fuel_cost' => $input['fuel'],
                'status' => $input['status'],
                'type' => $input['type'],
                'user_id' => $input['driver']
            ]
        );

        return redirect()->route('ordenesA.index')->with('success','Orden creada correctamente');

        } catch (\Throwable $th) {
            return redirect()->route('ordenesA.index')->with('error','No se pudo crear la orden');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orden = Order::find($id);
        return view('panel.admin.ordenes.asignadas.show',compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drivers = User::whereHas("roles", function($q){ $q->where("name", "Driver"); })->get();
        $orden = Order::find($id);
        return view('panel.admin.ordenes.asignadas.edit',compact('orden','drivers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderNAsignedRequest $request, $id)
    {
        try {
            $input = $request->all();
            $order = Order::find($id);
            $order->update([
                'Vessel' => $input['vessel'],
                'Voyage' => $input['voyage'],
                'booking_number' => $input['booking_number'],
                'equipment' => $input['equipment'],
                'mil_reference' => $input['mil_reference'],
                'unit_number' => $input['unit_number'],
                'origin_ramp' => $input['origin_ramp'],
                'destination_ramp' => $input['destination_ramp'],
                'rail_route' => $input['rail_route'],
                'consignee_city' => $input['consignee_city'],
                'consignee_state' => $input['consignee_state'],
                'ramp' => $input['ramp'],
                'chassis' => $input['chassis'],
                'work_price' => $input['work_price'],
                'driver_paid' => $input['driver_paid'],
                'fuel_cost' => $input['fuel'],
                'status' => $input['status'],
                'type' => $input['type'],
                'user_id' => $input['driver'],
                'updated_at' => now()
            ]);

        return redirect()->route('ordenesA.index')->with('info','Orden actualizada correctamente');

        } catch (\Throwable $th) {
            return redirect()->route('ordenesA.index')->with('error','Ocurrió algo, revisa tus datos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orden = Order::find($id);

        $orden->delete();

        return redirect()->route('ordenesA.index')->with('success','Orden eliminada correctamente');
    }

    public function importExcel(Request $request)
    {
        try {
            $file = $request->file('exceldoc');
            Excel::import(new OrdersAImport, $file);

            return redirect()->route('ordenesA.index')->with('success','Ordenes creadas correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('ordenesA.index')->with('error','Ocurrió algo, revisa tu archivo');
        }
    }
}
