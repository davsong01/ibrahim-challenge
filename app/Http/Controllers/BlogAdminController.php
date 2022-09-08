<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAdminFormRequest;
use App\Services\BlogAdminService;
use App\Models\BlogAdmin;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;


class BlogAdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:blogadmin')->except('logout');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.user.view')->with('users', (new BlogAdminService())->allAdmin());
    }

    public function dashboard()
    {
        info(Auth::guard('blogadmin')->user());
        return view('Admin.user.dashboard');
        // return $this->showAll((new BlogAdminService())->allAdmin());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminFormRequest $request)
    {
        if($request->validated()){
            // $admin = (new BlogAdminService())->createAdmin($request);
            $admin =  BlogAdmin::create([
                'email' => $request['email'],
                'phone' => $request['phone'],
                'name' => $request['name'],
                'password' => bcrypt($request['password'])
            ]);

            return redirect()->route('alladmin');
        }
        
    }

    public function login()
    {
        return view('Admin.user.login');        
    }

    public function authenticateuser(Request $request)
    {
        
         $data = $request->validate([
            'userid' => ['required'],
            'password' => ['required'],
        ]);

        if(is_numeric($data['userid'])){
            $credentials['phone'] = $data['userid'];
            $credentials['password'] = $data['password'];
        }else{
            $credentials['email'] = $data['userid'];
            $credentials['password'] = $data['password'];
        }
        

        if (Auth::guard('blogadmin')->attempt($credentials)) {

            $request->session()->regenerate();
 
            return redirect()->route('home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');        
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
}
