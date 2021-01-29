<?php

namespace Modules\Channel\Http\Controllers;
use Modules\Channel\Entities\Channel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
//use Nwidart\Modules\Facades\Module;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('channel::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
  
        return view('channel::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $channel = Channel::create($data);
        return redirect()->route('Channel.show', $channel->id)->withFlashSuccess(__('The channel was successfully added.'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $channel = Channel::findOrFail($id);
        return view('channel::show')->with(compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $channel = Channel::findOrFail($id);
        return view('channel::edit')->with(compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
       Channel::where('id','=', $id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('Channel.show', $id)->withFlashSuccess(__('The country was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $channel = Channel::findOrFail($id);
        $channel->delete();
        return redirect()->back()->withFlashSuccess(__('The country was successfully deleted.'));
    }
}
