<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enggineer;


class EnggineerController extends Controller
{
    public function index()
    {
        //get enggineers
        $enggineers = Enggineer::latest()->paginate(10);

        //render view with users
        return view('enggineer', compact('enggineers'));
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
            'latitude'     => 'required',
            'longitude'   => 'required',
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create user
        Enggineer::create([
            // 'image'     => $image->hashName(),
            'latitude'     => $request->latitude,
            'longitude'   => $request->longitude
        ]);

        //redirect to index
        return redirect()->route('enggineer.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

     /**
     * edit
     *
     * @param  mixed $user
     * @return void
     */
    public function edit(Enggineer $enggineer)
    {
        return view('enggineer.index', compact('enggineer'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */

    public function update(Request $request, Enggineer $enggineer)
    {
        //validate form
        $this->validate($request, [
            'latitude'     => 'required',
            'longitude'   => 'required'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/users', $image->hashName());

            //delete old image
            Storage::delete('public/users/'.$user->image);

            //update user with new image
            $enggineer->update([
                // 'image'     => $image->hashName(),
                'latitude'     => $request->latitude,
                'longitude'   => $request->longitude
            ]);

        } else {

            //update user without image
            $enggineer->update([
                'latitude'     => $request->latitude,
                'longitude'   => $request->longitude
            ]);
        }

        //redirect to index
        return redirect()->route('enggineer.index');
    }

    public function destroy(Enggineer $enggineer)
    {
        //delete image
        // Storage::delete('public/users/'. $user->image);

        //delete post
        $enggineer->delete();

        //redirect to index
        return redirect()->route('enggineer.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

