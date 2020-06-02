<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $persons = Person::all();

        $res = [
            "status"    => "Ok",
            "code"      => 1000,
            "message"   => "Lista de Personas",
            "data"      => $persons
        ];

        return $res;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jsonPerson = $request->json()->all();

        $person = new Person($jsonPerson); // una manera mas optimizada de salvar sin asignar uno a uno los campos.

        $person->save();

        $res = [
            "status"    => "Ok",
            "code"      => 1003,
            "message"   => "Persona Creada",
            "data"      => $person
        ];

        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);

        if (isset($person)) {
            $res = [
                "status"    => "Ok",
                "code"      => 1001,
                "message"   => "Obteniendo Persona por id " . $id,
                "data"      => $person
            ];
        } else {
            $res = [
                "status"    => "Fail",
                "code"      => 1011,
                "message"   => "No se encontro Persona por id " . $id,
                "data"      => null
            ];
        }



        return $res;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        if (isset($person)) {

            $person->update($request->json()->all());

            $res = [
                "status"    => "Ok",
                "code"      => 1005,
                "message"   => "Persona Actualizada"
            ];

        }else{

            $res = [
                "status"    => "Fail",
                "code"      => 1015,
                "message"   => "No se encontro persona a actualizar"
            ];

        }

        return $res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);

        if (isset($person)) {

            $person->delete();

            $res = [
                "status"    => "Ok",
                "code"      => 1004,
                "message"   => "Persona Eliminada"
            ];

        }else{

            $res = [
                "status"    => "Fail",
                "code"      => 1014,
                "message"   => "No se encontro persona a eliminar"
            ];

        }

        return $res;

    }
}
