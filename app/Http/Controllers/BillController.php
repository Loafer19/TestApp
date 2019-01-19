<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bill;
use App\Company;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        $company = Company::where('id', $id)->first();
        
        return view('pages/createBill')->with([
            'company' => $company,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Bill $bill)
    {
        \DB::beginTransaction();
        try {
            $bill->create([
                'user_id' => Auth::user()->id,
                'type' => $request->type,
                'value' => $request->value,
                'currency' => $request->currency,
                'description' => $request->description,
            ]);

            \Session::flash('success', 'Bill was created successfully!');
            \DB::commit();
        } catch (\Exception $exception) {
            \DB::rollback();
            return redirect()->back()->withErrors(['fatal' => $exception->getMessage()]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
