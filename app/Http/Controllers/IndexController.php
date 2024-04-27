<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function mainPage()
    {
        $peoples = People::all();
        return view("crud.main", compact("peoples"));
    }

    public function addPeople(Request $request)
    {
        $image = $request->file('image');

        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/people/image/';    //Creating Sub directory in Public folder to put image
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        People::create([
            'fullname' => $request->fullname,
            'image' => $save_url_image,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'about' => $request->about,
        ]);

        $notification = array(
            'message' => 'People Added !',
            'alert-type' => 'success'
        );

        return redirect()->route('main.page')->with($notification);
    }

    public function viewPeople(Request $request, $id)
    {
        $peoples = People::get();

        return view('crud.view', compact('peoples'));
    }

    public function editPeople(Request $request, $id)
    {
        $peoples = People::get();

        return view('crud.edit', compact('peoples'));
    }

    public function updatePeople(Request $request, $id)
    {
        $peoples = People::find($id);
        $image = $request->file('image');
        if ($image) {
            unlink($peoples->image);
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload/people/image/';    //Creating Sub directory in Public folder to put image
            $save_url_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        } else {
            $save_url_image = $peoples->image;
        }

        $peoples->update([
            'fullname' => $request->fullname,
            'image' => $save_url_image,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'about' => $request->about,
        ]);

        $notification = array(
            'message' => 'People Updated !',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

    public function deletePeople($id)
    {
        $peoples = People::find($id);

        $peoples->delete();

        $notification = array(
            'message' => 'People Deleted !',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
