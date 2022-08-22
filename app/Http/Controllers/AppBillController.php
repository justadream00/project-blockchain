<?php

namespace App\Http\Controllers;

use App\Http\Requests\appBill as RequestsAppBill;
use App\Models\AppBill;
use Illuminate\Http\Request;

class AppBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appbill');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RequestsAppBill $request)
    {


        $bill = $request->all();
        $data = AppBill::create($bill);

        return response()->json(['status' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $data = AppBill::all();
        return response()->json(['dataBill' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppBill  $appBill
     * @return \Illuminate\Http\Response
     */
    public function show(AppBill $appBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppBill  $appBill
     * @return \Illuminate\Http\Response
     */
    public function edit(AppBill $appBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AppBill  $appBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppBill $appBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppBill  $appBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppBill $appBill)
    {
        //
    }
}
