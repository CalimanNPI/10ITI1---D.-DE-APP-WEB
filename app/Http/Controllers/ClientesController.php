<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
            'telefono' => 'required|max:255',
            //'descuento' => 'required|max:255',
            'edad' => 'required|numeric',
        ]);



        $user = User::create(
            $request->only(
                'email',
            )
                + ['password' =>  bcrypt($request->input('password'))]
                + ['tipo_usu' => '3']
        );

        Cliente::create(
            $request->only(
                'nombre',
                'telefono',
                'edad',
            )
                + ['user_id' => $user->id]
                + ['descuento' => '0']
        );
        return redirect()->route('clientes.index')->with('succses', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'telefono' => 'required|max:255',
            'descuento' => 'required|max:255',
            'edad' => 'required|numeric',
        ]);

        $data = $request->only(
            'nombre',
            'telefono',
            'descuento',
            'edad',
        );

        $cliente->update($data);

        return redirect()->route('clientes.index')->with('succses', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('succses', 'Usuario eliminado correctamente');
    }
}
