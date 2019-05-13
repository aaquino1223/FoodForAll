<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $searchTerm = $request->query('searchTerm');
        $searchType = $request->query('searchType');

        $people = [];

        if (isset($searchTerm)) {
            $people = User::where('UserName', 'LIKE',  '%' . $searchTerm . '%')->get();
        }

        if ($searchType == 'people') {

            return view('search.people', compact("people", "searchTerm"));
        }
        else {
            $posts = [];
            $people = $people->map(function ($person) { return $person->UserId; });
            if (isset($searchTerm)) {
                //Get all posts that match that string
                $rawPosts = Post::where(function ($query) use ($searchTerm, $people) {
                    return $query->where('Title', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('Message', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhereIn('UserId', $people);
                })->orderBy('PostDate', 'DESC')->get();

                foreach ($rawPosts as $rawPost) {
                    if (auth()->user()->canViewPost($rawPost)) {
                        $posts[] = $rawPost;
                    }
                }
            }

            return view('search.index', compact("posts", "searchTerm"));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if (isset($request->search)) {
            return redirect(url('/search?searchTerm=' . $request->search));
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
