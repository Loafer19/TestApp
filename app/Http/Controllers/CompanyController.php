<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use App\Bill;
use Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        try {
            $id = Auth::user()->id;
        
            $company = User::find($id)->company->first();

            if ($id == $company->master_id) {
                $users = Company::find($company->id)->users;
                
                $users->map(function ($user) {
                    $bills = User::find($user->id)->bills;
                        
                    $USD_bills = $bills->where('currency', 'usd')->sum('value');
                    $EUR_bills = $bills->where('currency', 'eur')->sum('value');
                    $UAH_bills = $bills->where('currency', 'uah')->sum('value');

                    $bills = $bills->count();

                    $user['sum_usd'] = $USD_bills;
                    $user['sum_eur'] = $EUR_bills;
                    $user['sum_uah'] = $UAH_bills;
                    $user['sum_bills'] = $bills;

                    return $user;
                });

                return view('home')->with([
                    'company' => $company,
                    'users' => $users,
                ]);

            } else {
                $bills = User::find($id)->bills;

                return view('home')->with([
                    'company' => $company,
                    'bills' => $bills,
                ]);
            }

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['fatal' => $exception->getMessage()]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        $id = Auth::user()->id;

        $company = $company->where('id', $id)->first();
        
        return view('pages/createUser')->with([
            'company' => $company,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id, Company $company, Request $request)
    {
        try {

            $bills = User::find($id)->bills;
            $user = User::find($id);
            
            $id = Auth::user()->id;
            $company = $company->where('id', $id)->first();

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['fatal' => $exception->getMessage()]);
        }

        return view('pages/userBills')->with([
            'company' => $company,
            'bills' => $bills,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
