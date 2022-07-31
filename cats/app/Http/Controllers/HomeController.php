<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Cats, Files};
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['cats' => Cats::all()]);
    }

    public function create(Request $request) {

        if ($request->isMethod('post')) {
            $cat = new Cats;
            $cat->email = $request->input('email');
            $cat->name = $request->input('name');
            $cat->save();

             if ($request->hasFile('image')) {
                $images = $request->file('image');
                foreach($images as $image) {
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $name);
                    $file = new Files;
                    $file->name = $name;
                    $file->path = "/images/$name";
                    $file->save();
                    DB::insert('insert into cats_has_file (cat_id, file_id) values (?, ?)', [$cat->id, $file->id]);
                    //save();
                    return back()->with('success','Image Upload successfully');
                }
                
            }
        }

        return view('cat.create');
    }

    public function update(Request $request, $id) {

        $cat = Cats::find($id);

        if ($request->isMethod('post')) {
            
            $cat->email = $request->input('email');
            $cat->name = $request->input('name');
            $cat->save();

             if ($request->hasFile('image')) {

                $cat->removeFiles();
                $images = $request->file('image');

                foreach($images as $image) {
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $name);
                    $file = new Files;
                    $file->name = $name;
                    $file->path = "/images/$name";
                    $file->save();
                    DB::insert('insert into cats_has_file (cat_id, file_id) values (?, ?)', [$id, $file->id]);
                    //save();
                    return back()->with('success','Image Upload successfully');
                }
                
            }
        }

        return view('cat.update', ['cat' => $cat]);
    }
}
