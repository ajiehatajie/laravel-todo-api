<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $follow = Follow::where('costumer_id', 'LIKE', "%$keyword%")
                ->orWhere('follow_up', 'LIKE', "%$keyword%")
                ->orWhere('date_follow', 'LIKE', "%$keyword%")
                ->orWhere('result', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $follow = Follow::latest()->paginate($perPage);
        }

        return view('follow.index', compact('follow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('follow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'follow_up' => 'required',
			'date_follow' => 'required'
		]);
        $requestData = $request->all();
        
        Follow::create($requestData);

        return redirect('admin/follow')->with('flash_message', 'Follow added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $follow = Follow::findOrFail($id);

        return view('follow.show', compact('follow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $follow = Follow::findOrFail($id);

        return view('follow.edit', compact('follow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'follow_up' => 'required',
			'date_follow' => 'required'
		]);
        $requestData = $request->all();
        
        $follow = Follow::findOrFail($id);
        $follow->update($requestData);

        return redirect('admin/follow')->with('flash_message', 'Follow updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Follow::destroy($id);

        return redirect('admin/follow')->with('flash_message', 'Follow deleted!');
    }
}
