<?php

namespace App\Http\Controllers\Manages\Listings;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lists = Listing::get();


        return view('listings.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $rules = [
                'name'       => 'required|max:200',
                'address'    => 'required',
                'latitude'   => 'required|numeric',
                'longitude'  => 'required|numeric',
            ];

            $message = [];
            
            $this->validate($request, $rules, $message);

            $user = Listing::create([
                'submitter_id'  => \Auth::user()->id,
                'list_name'     => $request->input('name'),
                'address'       => $request->input('address'),
                'latitude'      => $request->input('latitude'),
                'longitude'     => $request->input('longitude'),
            ]);


        } catch (ValidationException $e) {
            return redirect(route('listing.create'))
                ->withErrors($e->getErrors())
                ->withInput();
        }
        return redirect(route('listing.index'))
            ->withSuccess('New record successfulyy add.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$list = Listing::find($id)){
            return back()->withErrors('Record not found');
        }

        return view('listings.show', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$list = Listing::find($id)){
            return back()->withErrors('Record not found');
        }

        return view('listings.edit', compact('list'));
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
        try {

            $rules = [
                'name'       => 'required|max:200',
                'address'    => 'required',
                'latitude'   => 'required|numeric',
                'longitude'  => 'required|numeric',
            ];

            $message = [];
            
            $this->validate($request, $rules, $message);
       
            if(!$list = Listing::find($id)){
                return back()->withErrors('Record not found');
            }

            $list->update([
                'list_name'     => $request->input('name'),
                'address'       => $request->input('address'),
                'latitude'      => $request->input('latitude'),
                'longitude'     => $request->input('longitude'),
            ]);


        } catch (ValidationException $e) {
            return redirect(route('listing.edit', [$id]))
                ->withErrors($e->getErrors())
                ->withInput();
        }
        return redirect(route('listing.index'))
            ->withSuccess('Record successfulyy update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        if ($request->ajax()) {
           if($list = Listing::find($id)){
                $list->delete();
                return response()->json(['status' => 'ok']);
            }
        }
        return Response::json(['status' => 'fail']);
   
    }
}
