<?php

namespace App\Http\Controllers;

use App\Orderproduct;
use Illuminate\Http\Request;

/**
 * Class OrderproductController
 * @package App\Http\Controllers
 */
class OrderproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderproducts = Orderproduct::paginate();

        return view('orderproduct.index', compact('orderproducts'))
            ->with('i', (request()->input('page', 1) - 1) * $orderproducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderproduct = new Orderproduct();
        return view('orderproduct.create', compact('orderproduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Orderproduct::$rules);

        $orderproduct = Orderproduct::create($request->all());

        return redirect()->route('orderproducts.index')
            ->with('success', 'Orderproduct created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderproduct = Orderproduct::find($id);

        return view('orderproduct.show', compact('orderproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderproduct = Orderproduct::find($id);

        return view('orderproduct.edit', compact('orderproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Orderproduct $orderproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orderproduct $orderproduct)
    {
        request()->validate(Orderproduct::$rules);

        $orderproduct->update($request->all());

        return redirect()->route('orderproducts.index')
            ->with('success', 'Orderproduct updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $orderproduct = Orderproduct::find($id)->delete();

        return redirect()->route('orderproducts.index')
            ->with('success', 'Orderproduct deleted successfully');
    }
}
