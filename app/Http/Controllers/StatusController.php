<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        return view('status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customMessage = [
            'StatusCode.required' => 'Status Code field is required',
            'StatusName.required' => 'Status Name field is required'
        ];
        $validData = $request->validate([
            'StatusCode' => 'required',
            'StatusName' => 'required'
        ], $customMessage);

        Status::create($validData);
        return redirect()->route('status.index')->with('success', 'Member Status created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit($statusCode)
    {
        $status = Status::findOrFail($statusCode);
        return view('status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $statusCode)
    {
        $customMessage = [
            'StatusCode.required' => 'Status Code field is required',
            'StatusName.required' => 'Status Name field is required'
        ];
        $validData = $request->validate([
            'StatusCode' => 'required',
            'StatusName' => 'required'
        ], $customMessage);
        $status = Status::findOrFail($statusCode);
        $status->update($validData);
        return redirect()->route('status.index')->with('success', 'Member Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy($statusCode)
    {
        $status = Status::findOrFail($statusCode);
        $status->delete();
        return redirect()->route('status.index')->with('success', 'Member status deleted successfully');
    }
}
