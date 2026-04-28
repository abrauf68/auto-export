<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Providers\DashboardServiceProvider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $dashboardProvider;

    public function __construct()
    {
        $this->dashboardProvider = new DashboardServiceProvider(app());
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function refreshData(Request $request)
    {
        $type = $request->get('type');
        $data = $this->dashboardProvider->getRefreshData($type);

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
