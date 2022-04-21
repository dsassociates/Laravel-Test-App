<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.company.index', \compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create_edit');
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
            'name' => ['required', 'string', 'max:255'],
            // 'website' => ['required', 'string', 'max:255'],
            'logo' => ['dimensions:max_width=100,max_height=100', 'mimes:jpeg,jpg,png,gif'],
        ]);
        if($request->email)
        {
            $request->validate([
                'email' => ['sometimes', 'email', 'max:255'],
            ]);
        }
        $file = $request->file('logo');
        if ($file) {
            $path = $file->store('/uploads', ['disk' => 'public']);
        }
        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => ($file) ? $path : '',
        ]);
        return redirect()->route('company.index');
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
        $company = Company::findOrFail($id);
        return view('admin.company.create_edit', \compact('company'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'website' => ['string', 'max:255'],
            // 'logo' => ['required', 'mimes:jpeg,jpg,png,gif'],
        ]);
        $file = $request->file('logo');
        if ($file) {
            $path = $file->store('/uploads', ['disk' => 'public']);
        }
        $company = Company::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
                'logo' => ($file) ? $path : $request->temp_image,
            ]
        );
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect()->route('company.index');

    }
}
