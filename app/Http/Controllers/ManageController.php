<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ManageController extends Controller
{
    public function index()
    {
        return View('manage.index');
    }

    public function profile()
    {
        $data = Auth::User();
        return View('manage.profile', compact('data'));
    }

    public function add()
    {
        $category = CategoryModel::all();
        return View('manage.add',compact('category'));
    }

    public function updateprofile(Request $request)
    {
        $data = User::find(Auth::User()->id);
        $data->page_name = $request->page_name;
        $data->username = $request->username;
        $data->bio = $request->bio;
        $data->border_c_1 = $request->border_c_1;
        $data->border_c_2 = $request->border_c_2;
        $data->border_c_3 = $request->border_c_3;
        $image = $request->file('image');
        if ($image) {
            $name_gen = "logo_profile_" . $data->username;
            // $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . 'webp';
            $upload_location = 'images/profile/';
            $full_path = $upload_location . $img_name;
            $data->image = $full_path;
            $old_image = $request->old_image;
            if (file_exists($old_image)) {
                unlink($old_image);
            }
            $img = Image::make($image->path());
            $img->encode('webp', 90)->resize(500, 500)->save($full_path);
        }
        $image_cover = $request->file('image_cover');
        if ($image_cover) {
            $name_gen = "cover_image_" . $data->username;
            // $img_ext = strtolower($image_cover->getClientOriginalExtension());
            $img_name = $name_gen . '.' . 'webp';
            $upload_location = 'images/banner/';
            $full_path = $upload_location . $img_name;
            $data->image_cover = $full_path;
            $old_image_cover = $request->old_image_cover;
            if (file_exists($old_image_cover)) {
                if($request->old_image_cover !== 'images/banner/default.webp'){
                    unlink($old_image_cover);
                }
            }
            $img = Image::make($image_cover->path());
            $img->encode('webp', 90)->resize(1500, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($full_path);
        }
        $data->save();
        return redirect()->back();
    }
}
