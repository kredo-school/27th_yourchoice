<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Models\Category;
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
        try {
            $user = $this->user->findOrFail(Auth::id());
            $categories = $this->category->all();
    
            return view('customers.mypage.profile.edit')
                ->with('user', $user)
                ->with('categories', $categories);
        } catch (\Exception $e) {
            return redirect()->route('customer.profile.show')->with('error', 'Unable to load edit page.');
        }
    }

    public function editpass()
    {
        return view('customers.mypage.profile.editpass');
    }


    // update() - save changes of the Auth user
    public function update(Request $request)
    {
        $user = Auth::user(); // ログインユーザーを取得

        // 更新するデータのみバリデーション
        $validatedData = $request->validate([
            'first_name'         => 'min:1|max:100',
            'last_name'          => 'min:1|max:100',
            'username'           => 'min:1|max:100',
            'email'              => 'email|max:100|unique:users,email,' . $user->id,
            'phone_number'       => 'numeric|min:1|max:20',
            'categories'         => 'nullable|array', // カテゴリが配列であることを確認
            'categories.*'       => 'exists:categories,id', // 各カテゴリIDが有効かを確認
        ]);

        // プロフィール情報の更新
        foreach ($validatedData as $key => $value) {
            if (!is_null($value) && $key !== 'categories') { // categories以外を更新
                $user->$key = $value;
        }
    }

          # Save
          $user->save(); 
          
        // カテゴリの関連付けを更新 (中間テーブルに保存)
         if ($request->has('categories')) {
            $user->categories()->sync($request->input('categories', [])); // カテゴリを更新
        } else {
            $user->categories()->detach(); // 全カテゴリーを解除
        }


        // $user                  = $this->user->findOrFail(Auth::id());
        // $user->first_name      = $request->first_name;
        // $user->last_name       = $request->last_name;
        // $user->username        = $request->username;
        // $user->email           = $request->email;
        // $user->phone_number    = $request->phone_number;      

        return redirect()->route('customer.profile.show')->with('success', 'Profile updated successfully!');
        
      
    }

}
