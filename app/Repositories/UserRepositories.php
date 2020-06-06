<?php


namespace App\Repositories;


use App\Models\Product;
use App\User;
use http\Env\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class UserRepositories implements UserInterface
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
     * @return \Illuminate\Support\Collection
     */
    public function getAllUsers()
    {
        return $alluser = DB::table('users')->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function ShowMyDetails()
    {
        $lg = auth('api')->user()->id;
        $detailsUser = DB::table('users')->where('id', $lg)->get();
        return $this->sendResponse($detailsUser, 'information user success');
    }


    /**
     * @return \Illuminate\Support\Collection
     */

    public function gitMyProduct()
    {
        $Lg = auth('api')->user()->id;
        $userOrder = DB::table('order')
            ->join('product', 'order.product_id', '=', 'product.id')
            ->where('user_id', $Lg)
            ->select('product_id', 'product.name','state_id', 'product.salary')
            ->get();
        return $this->sendResponse($userOrder, 'this your products');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id)
    {
            $User = User::findOrFail($id);
            return $this->sendResponse($User, 'get one user  ');
    }

    /**
     * @param $id
     */
    public function deleteUser($id)
    {

        $delete=User::where('id',$id)->delete();
        return $delete;

    }

}
