<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Info;
use App\Models\Header;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $headers = Header::orderBy('id', 'DESC')->get();
        return view('frontend.info.index', compact('headers'));
    }

    public function InfoSubmit(Request $request)
    {
    // Validate the input
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255|unique:infos,phoneNumber',
            'zipCode' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'province' => 'required|not_in:default|string|max:255',
            'city' => 'required|string|max:255',
            'secondaryPhone' => 'nullable|string|max:255',
            'secondaryPhoneTwo' => 'nullable|string|max:255',
            'socialDate' => 'required|string|max:255',
            'business' => 'required|string|max:255',
            'dob' => 'required|date|max:255',
        ]);


        $info = new Info();
        $info->fill([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'phoneNumber' => $request->input('phoneNumber'),
            'zipCode' => $request->input('zipCode'),
            'address' => $request->input('address'),
            'province' => $request->input('province'),
            'city' => $request->input('city'),
            'secondaryPhone' => $request->input('secondaryPhone'),
            'secondaryPhoneTwo' => $request->input('secondaryPhoneTwo'),
            'socialDate' => $request->input('socialDate'),
            'dob' => $request->input('dob'),
            'business' => $request->input('business'),
        ]);
        $info->save();
        return redirect()->route('success')->with('success', 'Data submitted successfully!');
    }

}
