<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::all();

        return response()->json(['success' => 'true' , 'msg' => 'All pets showed succesfuly!', 'pets' => $pets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
{
  try {
    $validatedData = $request->validate([
      'title' => 'required',
      'animal' => 'required',
      'description' => 'required',
      'found' => 'required',
      'location' => 'required',
      'when' => 'required',
      'img' => 'required'
    ],
    [
      'title.required' => 'title is required',
      'animal.required' => 'animal is required',
      'description.required' => 'description is required',
      'found.required' => 'found is required',
      'location.required' => 'location is required',
      'when.required' => 'when is required'
    ]);


    $pet = Pet::create($validatedData);

    return response()->json(['success' => true, 'msg' => 'Pet created successfully', 'pet' => $pet]);
  } catch (\Exception $e) {
    return response()->json(['success' => false, 'msg' => $e->getMessage()], 400);
  }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    try {
        $pet = Pet::findOrFail($id);

        return response()->json(['success' => 'true' , 'msg' => 'pet showed succesfuly', 'pet' => $pet]);

    } catch (\Exception $e) {
        return response()->json(['success' => 'false' , 'msg' => $e],404);

    }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $pet = Pet::findOrFail($id);

                $pet->title = $request->title;
                $pet->animal = $request->animal;
                $pet->description = $request->description;
                $pet->found = $request->found;
                $pet->location = $request->location;
                $pet->when = $request->when;
                $pet->img = $request->img;

                $pet->save();

        } catch (\Exception $e) {
            return response()->json(['success' => 'false' , 'msg' => $e],404);
        }
        return response()->json(['success' => 'true' , 'msg' => 'pet updated succesfuly', 'pet' => $pet]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $pet = Pet::findOrFail($id);

            $pet->delete();

        } catch (\Exception $e) {
            return response()->json(['success' => 'false' , 'msg' => $e],404);
        }
        return response()->json(['success' => 'true' , 'msg' => 'pet deleted succesfuly']);
    }

}
