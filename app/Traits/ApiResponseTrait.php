<?php

namespace App\Traits;

use GuzzleHttp\Psr7\Message;

trait ApiResponseTrait
{
    protected function indexResponse($data)
    {
        return response()->json([
            'status' => true,
            'message' => 'index all',
            'data' => $data,
            'code' => 200

        ]);
    }
    protected function notFoundResponse()
    {
        return response()->json([
            'status' => false,
            'message' => 'There are not data',
            'code' => 404
        ]);
    }
    protected function errorResponse($message,$code)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'code' => $code
        ]);
    }
    protected function successResponse($message,$data)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            'code' => 200
        ]);
    }
    protected function storeResponse($data)
    {
        return response()->json([
            'status' => true,
            'message' => 'Create Successfully',
            'data' => $data,
            'code' => 201
        ]);
    }
    protected function dontSaveResponse()
    {
        return response()->json([
            'status' => false,
            'message' => 'The data cannot be saved',
            'code' => 409
        ]);
    }
    protected function showResponse($data)
    {
        return response()->json([
            'status' => true,
            'message' => 'See specific data',
            'data' => $data,
            'code' => 200
        ]);
    }
    protected function updateResponse($data)
    {
        return response()->json([
            'status' => true,
            'message' => 'Modified successfully',
            'data' => $data,
            'code' => 201
        ]);
    }
    public function destroyResponse()
    {
        return response()->json([
            'status' => true,
            'message' => 'Delete  successfully',
            'code' => 204

        ]);
    }
    public function restoreDeleteResponse($data)
    {
        return response()->json([
            'status' => true,
            'message' => 'restore data successfully',
            'data' => $data,
            'code' => 200
        ]);
    }
    protected function recycleBinResponse($data)
    {
        return response()->json([
            'status' => true,
            'message' => 'recycleBin Data all',
            'data' => $data,
            'code' => 200

        ]);
    }
    protected function alreadyExistsResponse(){
        return response()->json([
            'status' => false,
            'message' => 'The data already exists and is not in the trash',
            'code' => 400

        ]);
    }
    protected function finaldeleteResponse(){
        return response()->json([
            'status' => true,
            'message' => 'The data has been permanently deleted',
            'code' => 204

        ]);
    }
}
