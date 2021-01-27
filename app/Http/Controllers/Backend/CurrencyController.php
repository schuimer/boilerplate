<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.currency.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.currency.create');
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
            'code' => ['required', 'string', 'max:255','unique:currencies'],
        ]);
        $data = $request->all();
        $currency = Currency::create($data);
        return redirect()->route('admin.currency.show', $currency->id)->withFlashSuccess(__('The currency was successfully added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\backend\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = Currency::findOrFail($id);
        return view('backend.currency.show')->with(compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\backend\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = Currency::findOrFail($id);
        return view('backend.currency.edit')->with(compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\backend\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $c = Currency::findorfail($id);
        $this->validate($request,[
            'code' => ['required','unique:currencies,code,'.$c->id],
        ]);
       
        Currency::where('id','=', $id)->update([
            'name' => $request->name,
            'code' => $request->code
        ]);
         return redirect()->route('admin.currency.show', $id)->withFlashSuccess(__('The currency was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\backend\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();
        return redirect()->back()->withFlashSuccess(__('The currency was successfully deleted.'));
    }
}
