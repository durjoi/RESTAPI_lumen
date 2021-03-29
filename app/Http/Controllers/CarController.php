<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request) {
        $car = Car::create($request->all());

        return response()->json($car);
    }

    public function update(Request $request, $id) {

        $car = Car::find($id);

        $car->update([
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
        ]);

        return response()->json($car);
    }

    public function destroy($id) {
        $car = Car::find($id)->delete();

        return response()->json('Removed successfully.');
    }

    public function index() {
        $cars = Car::all();

        return response()->json($cars);
    }

}
