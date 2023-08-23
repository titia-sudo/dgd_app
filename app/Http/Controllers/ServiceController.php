<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::latest()->paginate(5);
        
        return view('service.index',compact('services'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        //
        $directions = Direction::with('Direction')->orderBy('nomDirection')->get();
        return view('service.create', compact('directions'));
        
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
            'nomService' => 'required',
            'idDirection' => 'required',
        ]);
        
        Product::create($request->all());
         
        return redirect()->route('service.index')
                        ->with('success','service créé avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        return view('service.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        $request->validate([
            'nomService' => 'required',
            'idDirection' => 'required',
        ]);
        
        $service->update($request->all());
        
        return redirect()->route('services.index')
                        ->with('success','service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        $service->delete();
         
        return redirect()->route('services.index')
                        ->with('success','service deleted successfully');
    }
}
