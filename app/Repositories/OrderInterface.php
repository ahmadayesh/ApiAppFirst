<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface OrderInterface
{
    /**
     * @param Request $request
     */
    public function insertOrder(Request $request);


    /**
     * @return mixed
     */

    public function getAllOrder();

    /**
     * @param $id
     */

    public function trashOrder($id);

    /**
     * @return \Illuminate\Support\Collection
     */
    public function myOrders();

}
