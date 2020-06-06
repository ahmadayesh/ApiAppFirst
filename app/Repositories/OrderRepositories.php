<?php


namespace App\Repositories;


use App\Helpers\Librarys;
use App\Models\order;

use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderRepositories implements OrderInterface
{
    public function sendResponse($result, $message)
    {
        $response = [
            'code' => 200,
            'success' => true,
            'data' => $result,
            'message' => $message
        ];
        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'code' => 404,
            'success' => false,
            'message' => $error
        ];
        if (!empty($errorMessages)) {

            $response['date'] = $errorMessages;
        }
        return response()->json($response, $code);
    }


    /**
     * @param Request $request
     */
    public function insertOrder(Request $request)
    {

        $insert = new order();
        $insert->product_id = $request->get('product_id');
        $insert->state_id = $request->get('state_id');
        $insert->user_id = Auth::user()->id;
        $insert->save();
        return $this->sendResponse($insert, 'add  Success ');

    }

    /**
     * @return mixed
     */
    public function getAllOrder()
    {
        $order = order::get();
        return $this->sendResponse($order, 'Found  All  Order successfully ');
    }

    /**
     * @param $id
     */

    public function trashOrder($id)
    {
        $order = order::find($id);
        $order->delete();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function myOrders()
    {
        $Lg = auth('api')->user()->id;

        $userOrders = DB::table('order')
            ->join('product', 'order.product_id', '=', 'product.id')
            ->where('user_id', $Lg)
            ->select('product_id','user_id','state_id')
            ->get();

        return $this->sendResponse($userOrders, ' All My Order');

    }


}
