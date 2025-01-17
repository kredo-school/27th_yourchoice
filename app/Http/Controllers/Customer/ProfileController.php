<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Models\Category;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    // update() - save changes of the Auth user
    public function update(Request $request)
    {
        // 更新するデータのみバリデーション
        $validatedData = $request->validate([
            'first_name'         => 'min:1|max:100',
            'last_name'          => 'min:1|max:100',
            'username'           => 'min:1|max:100',
            'email'              => 'email|max:100|unique:users,email,',
            'phone_number'       => 'numeric|min:1|max:20',
            'categories'         => 'nullable|array', // カテゴリが配列であることを確認
            'categories.*'       => 'exists:categories,id', // 各カテゴリIDが有効かを確認
        ]);
        
        $user = Auth::user(); // ログインユーザーを取得

        // user情報を更新
        $user                  = $this->user->findOrFail(Auth::id());
        $user->first_name      = $request->first_name;
        $user->last_name       = $request->last_name;
        $user->username        = $request->username;
        $user->email           = $request->email;
        $user->phone_number    = $request->phone_number; 

        \DB::table('user_category')->where('user_id', $user->id)->delete();
      
        
        foreach ($validatedData as $key => $value) {
            if (!is_null($value) && $key !== 'categories') { // categories以外を更新
                $user->$key = $value;
            }
        }

          # Save
          $user->save(); 
          
          $categories = $request->input('categories', []); // カテゴリが送信されない場合は空配列を使用
          // 中間テーブルにデータを挿入
          foreach ($categories as $category_id) {
            UserCategory::create([
              'user_id' => $user->id,
              'category_id' => $category_id,
            ]);
          }

        return redirect()->route('customer.profile.show')->with('success', 'Profile updated successfully!');
        
      
    }

    public function editpass()
    {
        return view('customers.mypage.profile.editpass');
    }

    public function updatepass(Request $request)
  {
    // バリデーション: パスワードが4文字以上で確認用パスワードと一致しているかをチェック/'password'= formの'password'フィールドのこと
    $request->validate([
      'password' => 'required|string|min:4|confirmed',
    ]);

    // 現在のログインユーザーを取得
    $user = Auth::user(); // Auth::user()を直接使用して現在のユーザーを取得

    // パスワードをハッシュ化して保存
    $user->password_hash = Hash::make($request->password);  // 'password' フィールドをハッシュ化して 'password_hash' カラムに保存

    // ユーザー情報を保存
    $user->save();

    // パスワード更新完了後、プロフィールページにリダイレクト
    return redirect()->route('customer.profile.show');
  }


}
