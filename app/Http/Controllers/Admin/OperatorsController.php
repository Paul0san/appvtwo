<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateOperatorRequest;
use App\Http\Requests\UpdateOperatorRequest;

class OperatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = User::whereHas("roles", function($q){ $q->where("name", "Driver"); })->paginate(10);
        return view('panel.admin.operadores.index',compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.admin.operadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOperatorRequest $request)
    {
        try {

        $input = $request->all();

        User::create([
            'name' => $input['name'],
            'last_name' => $input['last_name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make('admin1234'),
        ])->assignRole('Driver');

        return redirect()->route('operadores.index')->with('success','Operador creado correctamente');

        } catch (\Throwable $th) {
            return redirect()->route('operadores.index')->with('error','No se pudo crear el operador');
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
        $driver = User::find($id);
        $orders = Order::all()->where('user_id','=',$id);
        // dd($orders);
        return view('panel.admin.operadores.show',compact('driver','orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = User::find($id);
        return view('panel.admin.operadores.edit',compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperatorRequest $request, $id)
    {
        try {
            $input = $request->all();
            $driver = User::find($id);
            $driver->update([
                'name' => $input['name'],
                'last_name' => $input['last_name'],
                'phone' => $input['phone'],
                'email' => $input['email'],
            ]);

            return redirect()->route('operadores.index')->with('info','Operador actualizado correctamente');

        } catch (\Throwable $th) {

            return redirect()->route('operadores.index')->with('error','Ocurrió algo, revisa tus datos');
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
        $driver = User::find($id);

        $driver->delete();

        return redirect()->route('operadores.index')->with('success','Operador eliminado correctamente');
    }
}
