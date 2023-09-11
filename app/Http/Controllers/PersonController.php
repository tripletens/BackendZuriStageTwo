<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $person = Person::create($request->all());

        return response()->json(["data" => $person, "message" => "Person created successfully"], 201);
    }

    public function fetch_all()
    {
        $person = Person::get();

        if (!$person) {
            return response()->json(['data' => null,'error' => 'Error fetching data'], 404);
        }

        return response()->json(["data" => $person, "message" => "All Persons fetched successfully"],200);
    }

    public function show($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json(['data' => null,'error' => 'Person with id -'. $id .'- not found'], 404);
        }

        return response()->json(["data" => $person, "message" => "Person fetched successfully"],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $person = Person::find($id);

        if (!$person) {
            return response()->json(['data' => null,'error' => 'Person with id -'. $id .'- not found'], 404);
        }

        $person->update($request->all());

        return response()->json(["data" => $person, "message" => "Person updated successfully"]);
    }

    public function destroy($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json(['data' => null, 'error' => 'Person with id - '. $id .' - not found'], 404);
        }

        $person->delete();

        return response()->json(["data" => null, "message" => "Person with name - " . $person->name . " has been deleted."], 200);
    }
}
