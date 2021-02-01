<?php

namespace Modules\Website\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Website\Entities\Website;
use Illuminate\Foundation\Validation\ValidatesRequests;

class WebsiteController extends Controller
{

    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('website::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('website::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255','unique:websites'],
        ]);
        $data = $request->all();
        $website = Website::create($data);
        return redirect()->route('Website.show', $website->id)->withFlashSuccess(__('The website was successfully added.'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $website = Website::findOrFail($id);
        return view('website::show')->with(compact('website'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $website = Website::findOrFail($id);
        return view('website::edit')->with(compact('website'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $website = Website::findorfail($id);
        $this->validate($request,[
            'name' => ['required','unique:websites,name,'.$website->id],
        ]);

       Website::where('id','=', $id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('Website.show', $id)->withFlashSuccess(__('The website was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $website = Website::findOrFail($id);
        $website->delete();
        return redirect()->back()->withFlashSuccess(__('The website was successfully deleted.'));
    }
}
