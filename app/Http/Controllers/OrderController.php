<?php

namespace App\Http\Controllers;

use App\Repositories\OrderInterface;
use Illuminate\Http\Request;
use  App\Order;

class OrderController extends Controller
{

    protected $Order;

    public function __construct(OrderInterface $Order)
    {
        $this->Order = $Order;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  $Order = $this->Order->getAllOrder();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $Order = $this->Order->insertOrder($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trash = $this->Order->trashOrder($id);
        return $this->sendResponse($trash,'success delete order');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myOrders()
    {
        return  $Order = $this->Order->myOrders();
    }


}
