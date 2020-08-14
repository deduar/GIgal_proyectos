<?php

namespace App\Http\Controllers;

use App\Subsidy;
use Illuminate\Http\Request;

class SubsidyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $subsidies = Subsidy::latest()->paginate(2);
        return view('subsidy.index',compact('subsidies'))->with('i',(request()->input('page',1)-1)*2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subsidy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'agency' => 'required',
        ]);
  
        Subsidy::create($request->all());
   
        return redirect()->route('subsidy.index')
                        ->with('success','Subsidy created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subsidy  $subsidy
     * @return \Illuminate\Http\Response
     */
    public function show(Subsidy $subsidy)
    {
        return view('subsidy.show',compact('subsidy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subsidy  $subsidy
     * @return \Illuminate\Http\Response
     */
    public function edit(Subsidy $subsidy)
    {
        return view('subsidy.edit',compact('subsidy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subsidy  $subsidy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subsidy $subsidy)
    {
        $request->validate([
            'name' => 'required',
            'agency' => 'required',
            'description' => 'required',
        ]);
  
        $subsidy->update($request->all());
  
        return redirect()->route('subsidy.index')
                        ->with('success','Subsidy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subsidy  $subsidy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subsidy $subsidy)
    {
        $subsidy->delete();
  
        return redirect()->route('subsidy.index')
                        ->with('success','Subsidy deleted successfully');
    }
}
