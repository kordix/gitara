<?php


namespace App\Http\Controllers;

use App\Gitara;
use App\Category;
use App\Master;
use App\Age;
use App\Source;
use App\Kolekcja;
use Illuminate\Http\Request;

class GitaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $utwory = Gitara::orderBy('age_id', 'description')->where('magiel', '=', 0)->get();
        // dd($utwory);

        return view('layouts.index', compact('utwory'));
    }

    public function nowe()
    {
        $utwory = Gitara::where('magiel', '=', 0)->where('age_id', '=', 1)->get();
        return view('layouts.index', compact('utwory'));
    }

    public function stare()
    {
        $utwory = Gitara::where('magiel', '=', 0)->whereIn('age_id', array('2','3'))->orderBy('age_id')->get();
        return view('layouts.index', compact('utwory'));
    }

    public function magiel()
    {
        $utwory = Gitara::where('magiel', '=', 1)->orderBy('age_id')->get();
        return view('layouts.index', compact('utwory'));
    }

    public function kasa()
    {
        $utwory = Gitara::where('kasa', '=', 1)->orderBy('age_id')->get();
        return view('layouts.index', compact('utwory'));
    }

    public function akord()
    {
        $utwory = Gitara::where('magiel', '=', 0)->whereIn('category_id', array('1'))->orderBy('age_id')->get();
        return view('layouts.index', compact('utwory'));
    }

    public function akord2()
    {
        $utwory = Gitara::where('magiel', '=', 0)->whereIn('category_id', array('1'))->orderBy('master_id')->get();
        return view('layouts.index2', compact('utwory'));
    }

    public function fingerstyle()
    {
        $utwory = Gitara::where('magiel', '=', 0)->whereIn('category_id', array('2','3'))->orderBy('age_id')->orderBy('updated_at', 'desc')->get();
        return view('layouts.index', compact('utwory'));
    }

    public function fingerstyle2()
    {
        $utwory = Gitara::where('magiel', '=', 0)->whereIn('category_id', array('2','3'))->orderBy('master_id')->get();
        return view('layouts2.index', compact('utwory'));
    }

    public function krotkie()
    {
        $utwory = Gitara::where('magiel', '=', 0)->whereIn('category_id', array('4'))->orderBy('age_id')->orderBy('updated_at', 'desc')->get();
        return view('layouts.index', compact('utwory'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $masters=Master::all();
        $ages=Age::all();
        $sources=Source::all();
        $collections=Kolekcja::all();
        return view('layouts.create', compact('categories', 'masters', 'ages', 'sources', 'collections'));
    }

    public function createsource()
    {
        return view('layouts.createsource');
    }

    public function createkolekcja()
    {
        return view('layouts.createkolekcja');
    }

    public function edit($id)
    {
        $position=Gitara::find($id);
        $categories=Category::all();
        $masters=Master::all();
        $ages=Age::all();
        $sources=Source::all();
        $collections=Kolekcja::all();
        return view('layouts.edit', compact('position', 'categories', 'masters', 'ages', 'sources', 'collections'));
    }

    public function indexsource($id)
    {
        $utwory = Gitara::where('magiel', '=', 0)->where('kolekcja_id', '=', $id)->get();
        return view('layouts.index', compact('utwory'));
    }

    public function indexcollection($id)
    {
        $utwory = Gitara::where('magiel', '=', 0)->where('kolekcja_id', '=', $id)->orderBy('age_id')->get();
        return view('layouts.index', compact('utwory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gitara::create([
            'title' =>request('title'),
            'description' =>request('description'),
            'age_id'=>request('age'),
            'category_id'=>request('category'),
            'master_id'=>request('master'),
            'magiel'=>request('magiel'),
            'kasa'=>request('kasa'),
            'source_id'=>request('source'),
            'kolekcja_id'=>request('collection')
        ]);
        session()->flash('message', 'Dodano utwór');
        return redirect()->back();
    }

    public function storesource(Request $request)
    {
        Source::create([
            'title' =>request('title')
        ]);
        session()->flash('message', 'Dodano source');
        return redirect()->back();
    }

    public function storekolekcja(Request $request)
    {
        Kolekcja::create([
            'title' =>request('title')
        ]);
        session()->flash('message', 'Dodano składankę');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gitara  $gitara
     * @return \Illuminate\Http\Response
     */
    public function show(Gitara $gitara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gitara  $gitara
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gitara  $gitara
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        Gitara::find($id)->update([
                'title' =>request('title'),
                'description' =>request('description'),
                'age_id'=>request('age'),
                'category_id'=>request('category'),
                'master_id'=>request('master'),
                'magiel'=>request('magiel'),
                'kasa'=>request('kasa'),
                'source_id'=>request('source'),
                'kolekcja_id'=>request('collection')
        ]);
        session()->flash('message', 'zapisano zmiany');
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gitara  $gitara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gitara $gitara)
    {
        //
    }
}
