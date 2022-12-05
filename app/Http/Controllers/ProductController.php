<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Product::$rules);

        $product = new Product;

        $product->name = $request->name;
        $product->price = $request->price;
        $product->cantidad = $request->cantidad;
        $product->category_id = $request->category_id;
        $product->info = $request->info;

        $image = $request->file('image');
        $image->move('img',$image->getClientOriginalName());
        $product->image = "img/" . $image->getClientOriginalName();

        $image_dos = $request->file('image_dos');
        $image_dos->move('img',$image_dos->getClientOriginalName());
        $product->image_dos = "img/" . $image_dos->getClientOriginalName();

        $image_tres = $request->file('image_tres');
        $image_tres->move('img',$image_tres->getClientOriginalName());
        $product->image_tres = "img/" . $image_tres->getClientOriginalName();

        $image_cuatro = $request->file('image_cuatro');
        $image_cuatro->move('img',$image_cuatro->getClientOriginalName());
        $product->image_cuatro = "img/" . $image_cuatro->getClientOriginalName();

        $product->save();
        
        //$product = Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            # code...
            return view('product.show', compact('product'));
        }else{
            return view('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //request()->validate(Product::$rules);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
