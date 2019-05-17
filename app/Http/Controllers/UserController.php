<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserAddRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('manage-users');
        if($request->ajax())
        {
            $users = User::orderBy('created_at', 'DESC');
            if($request->q)
            {
                $users = $users->where('name', 'like', '%%'.$request->q.'%%')->orWhere('email', $request->q);
            }
            $users = $users->paginate(config('rworks.perpage'));
            return response()->json($users);
        }
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->only(['name', 'email', 'password']));
        $role = Role::find($request->role);
        $user->assignRole($role);
        return response()->json($user);
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
    public function edit(User $user)
    {
        //
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
        //
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

    public function roles(Request $request)
    {
        $this->authorize('manage-users');
        $roles = Role::all();
        return response()->json($roles);
    }
}
