<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function download($id)
    {
        // Fetch the data for the specified user
        $user = DB::table('users')->where('id', $id)->first();

        // Generate the PDF content using the "dompdf" library
        $pdf = PDF::loadView('pdf', compact('user'));

        // Return the PDF file as a download
        return $pdf->download('user-' . $user->id . '.pdf');
    } 
    public function index()
    {
        $users = User::all();

        $usersByCountry = DB::table('users')
            ->select('country', DB::raw('count(*) as total'))
            ->groupBy('country')
            ->get();

        // Prepare the data for the chart
        $labels = $usersByCountry->pluck('country');
        $data = $usersByCountry->pluck('total');

        // Render the chart using a JavaScript library (e.g. Chart.js)
        return view('index', compact('users','labels', 'data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = request('name');
        $user->country = request('country');
        $user->phone = request('phone');
        $user->email = request('email');
        $user->address = request('address');

        $user->save();

        return redirect('/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


}