<?php

namespace App\Http\Controllers;

use App\Models\Post_tags;
use App\Models\UsersCar;
use Illuminate\Http\Request;
use App\Models\UsersList;
use App\Models\Post;
use App\Models\Tags;

class HomeController extends Controller
{
    public function index()
    {
        $users = UsersList::get();
        $cars = UsersCar::get();
        $posts = Post::with("categories", 'tagsRelation')->get();

        return view("home", compact("users", "cars", "posts"));
    }

    public function postsList(Request $request)
    {
        $posts = Post::with("categories", 'tagsRelation')->get();

        if ($request->tag){
            $tags = Tags::where('tag',$request->tag)->first();
            $post_tags = Post_tags::where('tag_id',$tags->id)->get();
            $post_ids = [];
            foreach ($post_tags as $post_id){
                $post_ids[] = $post_id->post_id;
            }
            $posts = Post::with("categories", 'tagsRelation')->whereIn('id',$post_ids)->get();

        }
        return view('posts', compact('posts'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|alpha',
            'age' => 'required|integer',
            'phone' => 'required|integer',
        ]);

        $user = new UsersList();
        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->age = $req->age;
        $user->save();
        return redirect()->back()->with('success', 'Comment stored successfully!');
    }

    public function showUser($id)
    {
        $user = UsersList::where('id', $id)->with('CarsList')->first();
        return view("singleUser", compact("user"));
    }

    public function deleteUser(Request $req, $id)
    {
        $user = UsersList::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Comment stored successfully!');
    }

    public function editUser($id)
    {
        $user = UsersList::find($id);
        return view('editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = UsersList::find($id);

        $request->validate([
            'name' => 'required|alpha',
            'age' => 'required|integer',
            'phone' => 'required|integer',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'age' => $request->age,
        ]);

        return redirect()->route('user.show', $id)->with('success', 'User updated successfully.');
    }

    public function carStore(Request $request)
    {
        $car = new UsersCar();
        $car->car_model = $request->car_model;
        $car->plate = $request->plate;
        $car->user_id = $request->user_id;
        $car->save();
        return redirect()->back()->with('success', 'Comment stored successfully!');

}
}



