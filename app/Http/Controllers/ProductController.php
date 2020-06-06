<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\User;

use App\Repositories\ProductInterface;

use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected $Product;

    public function __construct(ProductInterface $Product)
    {
        $this->Product = $Product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return $this->Product->getAllProduct();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        return $add = $this->Product->addProduct($request);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $show = $this->Product->ShowProductWithId($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $update = $this->Product->productEdit($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $trash = $this->Product->productDelete($id);
        return $this->sendResponse($trash, "Delete product name ");
    }
}
