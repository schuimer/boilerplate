<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.country.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'country_code' => ['required', 'string', 'max:255','unique:countries'],
        ]);
        $data = $request->all();
        $country = Country::create($data);
        return redirect()->route('admin.country.show', $country->id)->withFlashSuccess(__('The country was successfully added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $country = Country::findOrFail($id);
       return view('backend.country.show')->with(compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('backend.country.edit')->with(compact('country'));
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
        $c = Country::findorfail($id);
        $this->validate($request,[
            'country_code' => ['required','unique:countries,country_code,'.$c->id],
        ]);
    
        Country::where('id','=', $id)->update([
            'name' => $request->name,
            'country_code' => $request->country_code
        ]);
        return redirect()->route('admin.country.show', $id)->withFlashSuccess(__('The country was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->back()->withFlashSuccess(__('The country was successfully deleted.'));
    }
}
