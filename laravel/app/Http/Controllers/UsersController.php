<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \DB::table('users')->get();

        \Log::error(
            print_r(dump($users),true)
        );
        return view('users.index',[
            'users' => $users,
            'header' => 'Users list',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create',[
            'header' => 'Create User',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $id = \DB::table('users')->insertGetId(
                array_merge(
                    request()->toArray(),
                    ['password' => bcrypt($request->password)]
                )
            );
            return redirect()->route('users.show', ['id' => $id]);
        }catch (\Exception $exception){
            dd(join(' ', $exception->errorInfo));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \DB::table('users')->find($id);
        return view('users.show',[
            'header' => 'User show',
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \DB::table('users')->find($id);
        return view('users.edit',[
            'header' => 'User edit',
            'user' => $user,
        ]);
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
        $arr = request()->only(['name','email']);
        if($request->password){
            $arr['password'] = bcrypt($request->password);
        }
        if(\DB::table('users')->where('id',$id)->update($arr)){
            return redirect()->route('users.show',['id' => $id])->with('status','Was updated');
        }
        return redirect()->route('users.show',['id' => $id])->with('error',"Wasn't updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\DB::table('users')->delete($id)){
            return redirect()->route('users.index')->with('status', 'Was deleted');
        }
        return redirect()->route('users.index')->with('error','Error');
    }
}
