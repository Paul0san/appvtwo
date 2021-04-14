<?php

namespace App\Http\Controllers\Order;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Imports\OrdersNAImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreateOrderNAsignedRequest;
use App\Http\Requests\UpdateOrderNAsignedRequest;

class OrderNAsignedController extends Controller
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
        ->where('type','=','No asignado')
        ->unit_number($unit_number)
        ->chassis($chassis)
        ->orderBy('id','DESC')
        ->paginate(10);
        // dd($AllAsigned);
        return view('panel.admin.ordenes.no-asignadas.index',compact('AllAsigned'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.admin.ordenes.no-asignadas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderNAsignedRequest $request)
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
                'user_id' => null
            ]
        );

        return redirect()->route('ordenesNA.index')->with('success','Orden creada correctamente');

        } catch (\Throwable $th) {
            return redirect()->route('ordenesNA.index')->with('error','No se pudo crear la orden');
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
        return view('panel.admin.ordenes.no-asignadas.show',compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $orden = Order::find($id);
        return view('panel.admin.ordenes.no-asignadas.edit',compact('orden'));
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
            'updated_at' => now()
        ]);

        return redirect()->route('ordenesNA.index')->with('info','Orden actualizada correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('ordenesNA.index')->with('error','Ocurrió algo, revisa tus datos');
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

        return redirect()->route('ordenesNA.index')->with('success','Orden eliminada correctamente');
    }

    public function importExcel(Request $request)
    {
        try {
            $file = $request->file('exceldoc');
            Excel::import(new OrdersNAImport, $file);

            return redirect()->route('ordenesNA.index')->with('success','Ordenes creadas correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('ordenesNA.index')->with('error','Ocurrió algo, revisa tu archivo');
        }
    }
}
