<?php

namespace App\Http\Controllers;

use App\Models\VirtualLicenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VirtualLicensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['virtual_licenses'] = VirtualLicenses::paginate(5);

        return view('virtual_licenses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('virtual_licenses.create');
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
        $items = [
            'name' => 'required|string|max:150',
            'lastName' => 'required|string|max:150',
            'document' => 'required|integer',
            'program' => 'required|string|max:50',
            'photo' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $message = [
            'required' => ':attribute is required'
        ];
        $this->validate($request, $items, $message);
        $licensesData = request()->except('_token');

        if ($request->hasFile('photo')) {
            $licensesData['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        VirtualLicenses::insert($licensesData);

        return redirect('virtual_licenses')->with('message', 'Create virtual license success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VirtualLicenses  $virtualLicenses
     * @return \Illuminate\Http\Response
     */
    public function show(VirtualLicenses $virtualLicenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VirtualLicenses  $virtualLicenses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $virtual_license = VirtualLicenses::findOrFail($id);
        return view('virtual_licenses.update', compact('virtual_license'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VirtualLicenses  $virtualLicenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $items = [
            'name' => 'required|string|max:150',
            'lastName' => 'required|string|max:150',
            'document' => 'required|integer',
            'program' => 'required|string|max:50',
        ];
        if ($request->hasFile('photo')) {
            $items = ['photo' => 'required|max:10000|mimes:jpeg,png,jpg',];
        }
        $message = [
            'required' => ':attribute is required'
        ];
        $this->validate($request, $items, $message);
        $licensesData = request()->except(['_token', '_method']);

        if ($request->hasFile('photo')) {
            $virtual_license = VirtualLicenses::findOrFail($id);
            Storage::delete('public/' . $virtual_license->photo);
            $licensesData['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        VirtualLicenses::where('id', '=', $id)->update($licensesData);
        return view('virtual_licenses.update', compact('virtual_license'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VirtualLicenses  $virtualLicenses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $virtual_license = VirtualLicenses::findOrFail($id);
        if (Storage::delete('public/' . $virtual_license->photo)) {
            VirtualLicenses::destroy($id);
        };
        return redirect('virtual_licenses');
    }
}
