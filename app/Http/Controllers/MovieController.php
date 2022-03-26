<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('movie.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category'=>'required',
            'rank' => 'required|numeric'
        ]);

        Movie::create([
            'title'=>$request->title,
            'category_id'=>$request->category,
            'rank'=>$request->rank,
        ]);
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movie.edit')->with('movie',$movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'rank' => 'required|numeric'
        ]);

        $movie->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'rank'=>$request->rank,
        ]);
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect('/admin');
    }

    public function reorder() {
        $categories = Category::with(['movies'=>function ($query){
            $query->orderBy('rank');
        }])->get();
        foreach ($categories as $category) {
            $rank = 1;
            foreach ($category->movies as $movie){
                $movie->rank = $rank++;
                $movie->save();
            }
        }
        return redirect('/admin');
    }
    public function moveUp(Movie $movie) {
        $m2 = Movie::where('rank', $movie->rank-1)->first();
        $m2->rank++;
        $m2->save();
        $movie->rank--;
        $movie->save();
        return redirect('/admin');
    }

    public function moveDown(Movie $movie) {
        $m2 = Movie::where('rank', $movie->rank+1)->first();
        $m2->rank--;
        $m2->save();
        $movie->rank++;
        $movie->save();
        return redirect('/admin');
    }
}
