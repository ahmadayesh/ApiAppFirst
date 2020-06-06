<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ProductInterface
{
    /**
     * @return mixed
     */
    public function getAllProduct();

    /**
     * @param $id
     */
    public function ShowProductWithId($id);

    /**
     * @param Request $request
     */
    public function addProduct(Request $request);


    /**
     * @param Request $request
     * @param $id
     */
    public function productEdit(Request $request, $id);

    /**
     * @param $id
     */
    public function productDelete($id);
}
