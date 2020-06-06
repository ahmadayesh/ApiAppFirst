<?php


namespace App\Repositories;


use App\Models\Product;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MongoDB\Driver\Exception\AuthenticationException;


class ProductRepositories implements ProductInterface
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
     * @return mixed
     */
    public function getAllProduct()
    {
        $product = Product::get();
        return $this->sendResponse($product, 'Found  All  Product successfully ');
    }

    /**
     * @param $id
     */
    public function ShowProductWithId($id)
    {
        $product = Product::findOrFail($id);
        return $this->sendResponse($product, 'Find Product Success ');
    }


    /**
     * @param Request $request
     */
    public function addProduct(Request $request)
    {
        $creator = new Product();
        $creator->name = $request->get('name');
        $creator->salary = $request->get('salary');
        $creator->description = $request->get('description');
        $creator->save();
        return $this->sendResponse($creator, 'add creator Success ');
    }


    /**
     * @param Request $request
     * @param $id
     */
    public function productEdit(Request $request, $id)
    {
        $update = Product::select('id', 'name', 'description', 'salary')->findOrFail($id);
        $update->update([
            'name' => $request->get('name'),
            'salary' => $request->get('salary'),
            'description' => $request->get('description'),
        ]);
        return $this->sendResponse($update, 'success update Product');
    }


    /**
     * @param $id
     */

    public function productDelete($id)
    {
        $Product = Product::find($id);
        $Product->delete();
        return $Product;
    }


}
