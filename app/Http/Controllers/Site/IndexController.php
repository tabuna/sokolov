<?php

namespace App\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Review;
use App\Models\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reviews = Review::where('lang', App::getLocale())
            ->where('publish', true)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        $news = News::where('lang', App::getLocale())
            ->orderBy('id', 'desc')
            ->limit(2)
            ->get();

        $blogs = Blog::where('lang', App::getLocale())
            ->orderBy('id', 'desc')
            ->limit(2)
            ->get();

        return view('site.index', [
            'NewsList' => $news,
            'ReviewsList' => $reviews,
            'BlogsList' => $blogs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
