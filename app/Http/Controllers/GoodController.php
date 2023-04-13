<?php

namespace App\Http\Controllers;

use App\Category;
use App\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
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

    public function good(int $id)
    {
        /** @var Good $good */
        $good = Good::query()->with('category')->find($id);
        return view('good', ['good' => $good]);
    }

    public function category(int $id)
    {
        /** @var Category $category */
        $goods = Good::query()->where('category_id', '=', $id)->paginate(6);
        return view('home', [
            'goods' => $goods,
            'categories' => Category::all(),
            'currentCategory' => Category::find($id)
        ]);
    }
    public function index()
    {
        $good = Good::all();
        return view('admin.goods', compact('good'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.goods', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Good $good)
    {
        $good = new Good;
        /** @var Good $good */
        $good->title = $request->input('title');
        /** @var Good $good */
        $good->description = $request->input('description');
        /** @var Good $good */
        $good->price = $request->input('price');
        $good->category_id = $request->input('category_id');
        $good->save();
        return redirect()->route('admin.goods')->with('Успех', 'Товар добавлен.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $good = Good::find($id);
        $categories = Category::all();
        return view('admin.goods', compact('good', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $product = Good::find($id);
        $product->name = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->save();
        return redirect()->route('admin.goods')->with('Успех', 'Товар изменён');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product = Good::find($id);
        $product->delete();
        return redirect()->route('admin.goods')->with('Успех', 'Товар удалён.');
    }
}
