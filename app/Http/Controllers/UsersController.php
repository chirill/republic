<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Location;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $locations = Location::pluck('name','id')->all();

        if( count($locations)==0){
            Session::flash('info','Nu exista nici o locatie creata, va rugam creati mai intai o locatie ');
            return redirect()->back();
        }
        return view('admin.users.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //

        if ($request->has('password')){
            $password = bcrypt($request->password);
        }else{
            $password = bcrypt('Lotus!234');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'status' => $request->status,
        ]);
        if ($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatars/',$avatar_new_name);
            $avatar_user = '/uploads/avatars/'.$avatar_new_name;
        }else{
            $avatar_user = '/uploads/avatars/1.png';
        }

        Profile::create([
            'user_id' => $user->id,
            'avatar'=>$avatar_user,
            'about'=>$request->about,
            'hobby'=>$request->hobby,
        ]);
        Session::flash('success','Utilizatorul a fost creat cu succes');
        return redirect()->route('users.index');
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
        $user = User::findOrFail($id);

        return view('admin.users.show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.users.edit')->with('user',User::findOrFail($id))->with('locations',\App\Location::pluck('name','id')->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
//        dd($request->all());
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatars/',$avatar_new_name);
            $user->profile->avatar = '/uploads/avatars/'.$avatar_new_name;
            $user->profile->save();
        }
        //dd($request->name);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->profile->about = $request->about;
        $user->profile->hobby = $request->hobby;
        $user->profile->save();
        if ($request->password != null){
            $user->password = bcrypt($request->password);
        }
        $user->location_id = $request->location_id;
        $user->save();
        Session::flash('success','Utilizatorul a fost updatat cu succes');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::findOrFail($id)->delete();
        Session::flash('success','Utilizator dus in cos');
        return redirect()->route('users.index');
    }
    public function kill($id)
    {
        //
        $user = User::withTrashed()->whereId($id)->get()->first();
        File::delete(public_path($user->profile->avatar));
        $user->forceDelete();
        Session::flash('success','Utilizator sters definitiv');
        return redirect()->back();
    }
    public function restore($id){
        $user = User::onlyTrashed()->whereId($id)->restore();
        Session::flash('success','User restored successfully');
        return redirect()->back();
    }

    public function trash(){
        return view('admin.users.trash')->with('users',User::onlyTrashed()->get());
    }
//    activare utilizator
    public function activ($id){
        $user = User::findOrFail($id);
        $user->status=1;
        $user->save();
        return redirect()->back();
    }
//    dezactivare user
    public function disabled($id){
        $user = User::findOrFail($id);
        $user->status=0;
        $user->save();
        return redirect()->back();
    }
}
