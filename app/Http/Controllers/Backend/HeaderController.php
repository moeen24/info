<?php

namespace App\Http\Controllers\Backend;

use App\Models\Header;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeaderController extends Controller
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
        $headers = Header::orderBy('id', 'DESC')->get();
        return view('backend.header.index', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.header.create');
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
            'header' => 'required|string|min:3|max:255',
            'subheader' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
        ]);

        $header = new Header();
        $header->header = $request->header;
        $header->subheader = $request->subheader;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-image-'.$extension;
            $file->move('upload/images/', $filename);
            $header->image = $filename;
        }

        $header->save();

        return redirect()->route('header.index')->with('success', 'New header has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = Header::findOrFail(intval($id));

        return view('backend.header.edit', compact('header'));
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
        $header = Header::findOrFail(intval($id));

        if ($header->slug == $request->slug) {
            $request->validate([
                'header' => 'required|string|min:3|max:255',
                'subheader' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            ]);
        }else{
            $request->validate([
                'header' => 'required|string|min:3|max:255',
                'subheader' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            ]);
        }
        
        $header->header = $request->header;
        $header->subheader = $request->subheader;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-image-'.$extension;
            $file->move('upload/images/', $filename);
            $header->image = $filename;
        }

        $header->save();

        return redirect()->route('header.index')->with('success', 'Category has been Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
