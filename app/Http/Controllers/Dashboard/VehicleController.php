<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view vehicle');
        try {
            $vehicles = Vehicle::all();
            return view('dashboard.vehicles.index', compact('vehicles'));
        } catch (\Throwable $th) {
            // throw $th;
            Log::error("Vehicle Index Failed:" . $th->getMessage());
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create vehicle');
        try {
            return view('dashboard.vehicles.create');
        } catch (\Throwable $th) {
            // throw $th;
            Log::error("Vehicle Create Failed:" . $th->getMessage());
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create vehicle');
        $validator = Validator::make($request->all(), [
            'vehicle_name' => 'required|string|max:255',
            'reg_no' => 'required|string|max:255|unique:vehicles,reg_no',
            'make' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'chesis_number' => 'nullable|string|max:255',
            'engine_number' => 'nullable|string|max:255',
            'wheel' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'tax_history' => 'nullable|string',
            'penalties' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }

        try {
            DB::beginTransaction();
            $vehicle = new Vehicle();
            $vehicle->vehicle_name = $request->vehicle_name;
            $vehicle->reg_no = $request->reg_no;
            $vehicle->make = $request->make;
            $vehicle->model = $request->model;
            $vehicle->year = $request->year;
            $vehicle->color = $request->color;
            $vehicle->chesis_number = $request->chesis_number;
            $vehicle->engine_number = $request->engine_number;
            $vehicle->wheel = $request->wheel;
            $vehicle->weight = $request->weight;
            $vehicle->tax_history = $request->tax_history;
            $vehicle->penalties = $request->penalties;
            $vehicle->save();

            DB::commit();
            return redirect()->route('dashboard.vehicles.index')->with('success', 'Vehicle Created Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Vehicle Store Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update vehicle');
        try {
            $vehicle = Vehicle::findOrFail($id);
            return view('dashboard.vehicles.edit', compact('vehicle'));
        } catch (\Throwable $th) {
            // throw $th;
            Log::error("Vehicle Edit Failed:" . $th->getMessage());
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update vehicle');
        $validator = Validator::make($request->all(), [
            'vehicle_name' => 'required|string|max:255',
            'reg_no' => 'required|string|max:255|unique:vehicles,reg_no,' . $id,
            'make' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'chesis_number' => 'nullable|string|max:255',
            'engine_number' => 'nullable|string|max:255',
            'wheel' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'tax_history' => 'nullable|string',
            'penalties' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('error', 'Validation Error!');
        }

        try {
            DB::beginTransaction();
            $vehicle = Vehicle::findOrFail($id);
            $vehicle->vehicle_name = $request->vehicle_name;
            $vehicle->reg_no = $request->reg_no;
            $vehicle->make = $request->make;
            $vehicle->model = $request->model;
            $vehicle->year = $request->year;
            $vehicle->color = $request->color;
            $vehicle->chesis_number = $request->chesis_number;
            $vehicle->engine_number = $request->engine_number;
            $vehicle->weight = $request->weight;
            $vehicle->wheel = $request->wheel;
            $vehicle->tax_history = $request->tax_history;
            $vehicle->penalties = $request->penalties;
            $vehicle->save();

            DB::commit();
            return redirect()->route('dashboard.vehicles.index')->with('success', 'Vehicle Updated Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Vehicle Update Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete vehicle');
        try {
            $vehicle = Vehicle::findOrFail($id);
            $vehicle->delete();
            return redirect()->route('dashboard.vehicles.index')->with('success', 'Vehicle Deleted Successfully');
        } catch (\Throwable $th) {
            // throw $th;
            Log::error("Vehicle Delete Failed:" . $th->getMessage());
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    public function updateStatus(string $id)
    {
        $this->authorize('update vehicle');
        try {
            $vehicle = Vehicle::findOrFail($id);
            $message = $vehicle->is_active == 'active' ? 'Vehicle Deactivated Successfully' : 'Vehicle Activated Successfully';
            if ($vehicle->is_active == 'active') {
                $vehicle->is_active = 'inactive';
                $vehicle       ->save();
            } else {
                $vehicle->is_active = 'active';
                $vehicle->save();
            }
            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
            Log::error('Vehicle Status Updation Failed', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
            throw $th;
        }
    }
}
