<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Image;
use App\Models\Category;
use App\Models\Artcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $art = Art::all();

        $categories = Category::All();

        return view('art.index', ["art" => $art, "categories" => $categories]);
    }
    public function userIndex()

    {
        $UserArt = Art::where("user_id", Auth::user()->id)->get();

        // $art = Art::whereHas("categories", function ($filter) {
        //     $filter->where("categories.id", 5);
        // })->get();
        return view('art.user', ["userArt" => $UserArt]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::All();
        return view('art.create', ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Methods can be used on $request

        //guessExtension()
        //getMimeType()
        //store()
        //asStore()
        //storePublicly()
        //move()
        //getClientOriginalName
        //getClientMimeType()
        //guessClientExtension()
        //getSize()
        //getError()
        //isValid()

        $test = $request->file("image")->getSize();

        $request->validate([
            "title" => "required|string|min:1|max:25",
            "description" => "required|string|min:1|max:2000",
            "category_id" => "required",
            "image" => "mimes:jpg,png,jpeg|max:5048",
        ]);

        $newImageName = time() . "-" . $request->title . "." . $request->image->extension();
        $request->image->move(public_path("img"), $newImageName);


        $art = Art::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);

        for ($i = 0; $i < count($request->category_id); $i++) {
            ArtCategory::create([
                'art_id' => $art->id,
                'category_id' => $request->category_id[$i],
            ]);
        }

        $image = Image::create([
            "name" => $newImageName,
            "art_id" => $art->id,
        ]);


        return redirect()->route('art.user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function show(Art $art)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function edit(Art $artItem)
    {
        $categories = Category::All();
        return view('art.edit', ['artItem' => $artItem], ["categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Art $artItem)
    {
        $formateTitle = ucfirst(strtolower($request->title));
        $artItem->title = $formateTitle;
        $artItem->description = ucfirst(strtolower($request->description));
        $artItem->status = 0;
        $artItem->user_id = Auth::user()->id;
        $artItem->save();

        // delete all art categories
        for ($i = 0; $i < count($request->category_id); $i++) {
            ArtCategory::where("art_id", $artItem->id)->delete();
        }
        // create new categories from selected
        for ($i = 0; $i < count($request->category_id); $i++) {
            ArtCategory::create([
                'art_id' => $artItem->id,
                'category_id' => $request->category_id[$i],
            ]);
        }

        return redirect()->route('art.index')->with("msg", "Category \"$formateTitle\" was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Art  $art
     * @return \Illuminate\Http\Response
     */

    public function destroy(Art $artItem)
    {
        // delete all art categories belonging to artItem
        ArtCategory::where("art_id", $artItem->id)->delete();

        $artItem->delete();

        return redirect()->route('art.index')->with("msg", "\"$artItem->title\" was deleted successfully");
    }
}
