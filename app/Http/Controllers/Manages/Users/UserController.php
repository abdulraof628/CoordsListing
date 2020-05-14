<?php

namespace App\Http\Controllers\Manages\Users;

use Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::where('type', 'u')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
                'email'      => 'required|email|unique:users',
                'password'      => 'required|string|min:6|confirmed',
            ];

            $message = [];
            
            $this->validate($request, $rules, $message);

            $user = User::create([
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'password'  => bcrypt($request->input('password')),
            ]);


        } catch (ValidationException $e) {
            return redirect(route('user.create'))
                ->withErrors($e->getErrors())
                ->withInput();
        }
        return redirect(route('user.index'))
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
        if(!$user = User::where('id', $id)->where('type', 'u')->first()){
            return back()->withErrors('Record not found');
        }

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$user = User::where('id', $id)->where('type', 'u')->first()){
            return back()->withErrors('Record not found');
        }

        return view('users.edit', compact('user'));
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
            ];

            $message = [];
            
            $this->validate($request, $rules, $message);
       
            if(!$user = User::where('id', $id)->where('type', 'u')->first()){
                return back()->withErrors('Record not found');
            }            

            $user->update([
                'name'      => $request->input('name'),
            ]);


        } catch (ValidationException $e) {
            return redirect(route('user.edit', [$id]))
                ->withErrors($e->getErrors())
                ->withInput();
        }
        return redirect(route('user.index'))
            ->withSuccess('Record successfulyy updated.');
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
           if($user = User::where('id', $id)->where('type', 'u')->first()){
                $user->delete();
                return response()->json(['status' => 'ok']);
                
            }
        }
        return Response::json(['status' => 'fail']);

    }
}
