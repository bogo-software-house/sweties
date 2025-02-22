<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vochercode;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResource\VocherResource;


class VochercodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ambilcodevoucher = Vochercode::select('code','point','status')->paginate(10);
        return VocherResource::collection($ambilcodevoucher);
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
    public function show(Vochercode $vochercode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vochercode $vochercode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vochercode $vochercode)
    {
        //
    }
}
