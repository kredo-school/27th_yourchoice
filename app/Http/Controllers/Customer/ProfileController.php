<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Models\Category;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    private $user;
    private $category;

    public function __construct(User $user, Category $category)
    {
        $this->user = $user;
        $this->category = $category;
    }

     // show() - view the profile page of a user
    public function show()
    {
        $user = $this->user->findOrFail(Auth::id());
        $categories = $user->categories;

        return view('customers.mypage.profile.show')
                ->with('user', $user)
                ->with('categories', $categories);
    }


    public function edit()
    {
        $user = $this->user->findOrFail(Auth::id());

        $all_categories =$this->category->where('type', 'category')->get();
        $selected_categories=[];
        foreach($user->categories as $usercategory)
        {
            $selected_categories[]=$usercategory->id;
        }

        return view('customers.mypage.profile.edit')
                ->with('user', $user)
                ->with('all_categories',$all_categories)
                ->with('selected_categories',$selected_categories);





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
            'email'              => 'required|email|max:100|unique:users,email,' . Auth::id(),
            'phone_number'       => 'digits_between:1,20',
            'category'           => 'array',
            'category.*'         => 'integer|exists:categories,id',
        ]);
    
        $user = $this->user->findOrFail(Auth::id());
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
    
        # Save user
        $user->save();
    
        # Remove existing categories
        $user->usercategory()->delete();
    
        # Add new categories
        $categories = $request->input('category', []); // デフォルト値を空配列に設定
    
        foreach ($categories as $category_id) {
            UserCategory::create([
                'user_id' => $user->id,
                'category_id' => $category_id,
            ]);
        }
    
        return redirect()->route('customer.profile.show')->with('success', 'Profile updated successfully!');
    }
    
        

}
