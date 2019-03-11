<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ip = $request -> ip();

        $user = \Auth::user();

        $users = User::orderBy('created_at', 'desc')
            ->paginate(10) ;


        return view('home',
        [
            'ip' => $ip,
            'name' => $user->name,
            'users' =>$users
        ]);
    }

    public function userEdit($id){
    $user = User::find($id);

    return view('users.edit',
            [
                'user' =>$user
            ]);
    }

    public function userSave(Request $request, $id)
    {
        $user = User::find($id);
        $name = $request->get('name');
        $email = $request->get('email');
        $user->name = $name;
        $user->email = $email;
        $user->save();
//redirect  на home
        return redirect(route('home'));
//Редирект назат
//       return redirect()->back();

    }
    public function ajax(Request $request)
    {
        $users = User::query();
        $name = $request->get('name');
        if($name){
            $users->where('name','like','%'.$name.'%');
        }
        return response()->json($users->get()->toArray());
    }
}
