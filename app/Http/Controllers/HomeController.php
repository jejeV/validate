<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    // public function index()
    // {
    //     $role=Auth::user()->role;

    //     // if($role=='1')
    //     // {
    //     //     return view('enggineer');
    //     // }
    //     if($role=='2')
    //     {
    //         return view('documentation');
    //     }
    //     if($role=='3')
    //     {
    //         return view('vendor');
    //     }
    //     else
    //     {
    //         $users = User::all();
    //         return view('admin', compact('users'));
    //     }
    // }

    public function index()
    {
        //get users
        $users = User::latest()->paginate(5);

        //render view with users
        return view('user', compact('users'));
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:5',
            'email'   => 'required|min:10',
            'password'   => 'required|min:8'
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create user
        User::create([
            // 'image'     => $image->hashName(),
            'name'     => $request->name,
            'email'   => $request->email,
            'password'   => $request->password
        ]);

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */

    public function update(Request $request, User $user)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:5',
            'email'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/users', $image->hashName());

            //delete old image
            Storage::delete('public/users/'.$user->image);

            //update user with new image
            $user->update([
                'image'     => $image->hashName(),
                'name'     => $request->title,
                'email'   => $request->content
            ]);

        } else {

            //update user without image
            $user->update([
                'name'     => $request->title,
                'email'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        //delete image
        // Storage::delete('public/users/'. $user->image);

        //delete post
        $user->delete();

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
