<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $all_posts = $this->user->latest()->paginate(5);
    }


     // show() - view the profile page of a user
    public function show()
    {
        $user = $this->user->findOrFail(Auth::user()->id);

        return view('customers.mypage.profile.show')
                ->with('user', $user);

    }

    public function edit()
    {
        $user = $this->user->findOrFail(Auth::user()->id);

        return view('customers.mypage.profile.edit')
                ->with('user', $user);
    }

    public function editpass()
    {
        return view('customers.mypage.profile.editpass');
    }


    // update() - save changes of the Auth user
    public function update(Request $request)
    {
        $request->validate([
            'first_name'         => 'min:1|max:100',
            'last_name'          => 'min:1|max:100',
            'username'           => 'min:1|max:100',
            'email'              => 'email|max:100|unique:users,email,' . Auth::user()->id,
            'phone_number'       => 'numeric|min:1|max:20',
            'password_hash'      => 'min:4',
        ]);

        $user                  = $this->user->findOrFail(Auth::id());
        $user->first_name      = $request->first_name;
        $user->last_name       = $request->last_name;
        $user->username        = $request->username;
        $user->email           = $request->email;
        $user->phone_number    = $request->phone_number;
        $user->passwore_hash   = $request->password_hash;
      

        # Save
        $user->save();

        return redirect()->route('customers.mypage.profile.show', Auth::user()->id);
    }
    

}
