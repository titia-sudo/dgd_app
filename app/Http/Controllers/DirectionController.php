<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $directions = Direction::latest()->paginate(5);
        
        return view('direction.index',compact('directions'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('direction.create');
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
        $request->validate([
            'nomDirection' => 'required',
            'sigleDirection' => 'required',
        ]);
        
        Direction::create($request->all());
         
        return redirect()->route('directions.index')
                        ->with('success','direction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function show(Direction $direction)
    {
        //
        return view('direction.show',compact('direction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function edit(Direction $direction)
    {
        //
        return view('direction.edit',compact('direction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direction $direction)
    {
        //
        $request->validate([
            'nomDirection' => 'required',
            'sigleDirection' => 'required',
        ]);
        
        $direction->update($request->all());
        
        return redirect()->route('directions.index')
                        ->with('success','direction mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction)
    {
        //
        $direction->delete();
         
        return redirect()->route('directions.index')
                        ->with('success','direction deleted successfully');
    }
}
