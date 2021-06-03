<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repartidor;
use App\Models\User;

class RepartidoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repartidores = Repartidor::all();
        return view('repartidores.index', compact('repartidores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repartidores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|unique:users|max:255',
            'nombre' => 'required|max:255',
            'apellido_pa' => 'required|max:255',
            'apellido_ma' => 'required|max:255',
            'edad' => 'required|numeric',
            'vehiculo' => 'max:255',
            'foto_repartidor' => 'image|mimes:jpeg,png|max:3000',
        ]);



        $user = User::create(
            $request->only(
                'email',
            )
                + ['password' =>  bcrypt($request->input('password'))]
                + ['tipo_usu' => '2']
        );

        Repartidor::create(
            $request->only(
                'nombre',
                'apellido_pa',
                'apellido_ma',
                'edad',
                'vehiculo',
            )
                + ['user_id' => $user->id]
                + ['pago' => '15']
                + ['foto_repartidor' => $request->file('foto_repartidor')->store('fotos')]
        );
        return redirect()->route('repartidores.index')->with('succses', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Repartidor $repartidor)
    {
        return view('repartidores.show', compact('repartidor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Repartidor $repartidor)
    {
        return view('repartidores.edit', compact('repartidor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repartidor $repartidor)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido_pa' => 'required|max:255',
            'apellido_ma' => 'required|max:255',
            'edad' => 'required|numeric',
            'vehiculo' => 'max:255',
            //'foto_repartidor' => 'image|mimes:jpeg,png|max:3000',
        ]);


        $data = $request->only(
            'nombre',
            'apellido_pa',
            'apellido_ma',
            'edad',
            'vehiculo',
            'pago',
        );

        $repartidor->update($data);

        return redirect()->route('repartidores.index')->with('succses', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repartidor $repartidor)
    {
        $repartidor->delete();
        return redirect()->route('repartidores.index')->with('succses', 'Usuario eliminado correctamente');
    }
}
