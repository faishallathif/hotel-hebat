<?php

namespace App\Http\Responses;

class ResponseUtils
{

    public static function simpleResponse($status, $message)
    {
        if ($status) {
            $httpCode = 200;
        } else {
            $httpCode = 400;
        }

        $data = [
            'status'    => $status,
            'message'   => $message,
        ];

        return response()->json($data, $httpCode);
    }
    public static function login($status, $user = null, $token = null)
    {
        if ($status) {
            $httpCode = 200;
            $message = ConstantString::$LOGIN_SUCCESS;
        } else {
            $httpCode = 400;
            $message = ConstantString::$LOGIN_FAILED;
        }
        $data = [
            'status'    => $status,
            'message' => $message,
            'user' => $user,
            "token" => $token
        ];
        return response()->json($data, $httpCode);
    }

    public static function getValResponse($status, $data)
    {
        if ($status) {
            $httpCode = 200;
        } else {
            $httpCode = 400;
        }

        $data = [
            'status'    => $status,
            'data'   => $data,
            'message'   => ConstantString::$FOUND_RESPONSE,
        ];

        return response()->json($data, $httpCode);
    }
    public static function notFound()
    {

        $data = [
            'status'    => true,
            'message'   => ConstantString::$NOT_FOUND_RESPONSE,
        ];

        return response()->json($data);
    }
    public static function noDataAvailable()
    {

        $data = [
            'status'    => true,
            'message'   => ConstantString::$NO_DATA_AVAILABLE,
        ];

        return response()->json($data);
    }

    public static function defaultResponse($status, $message, $data)
    {
        if ($status) {
            $httpCode = 200;
        } else {
            $httpCode = 400;
        }

        $data = [
            'status'    => $status,
            'message'   => $message,
            'data'      => $data
        ];

        return response()->json($data, $httpCode);
    }

    public static function defaultFoundResponse($status)
    {
        if ($status) {
            $httpCode = 200;
            $message = ConstantString::$FOUND_RESPONSE;
        } else {
            $httpCode = 400;
            $message = ConstantString::$NOT_FOUND_RESPONSE;
        }

        $data = [
            'status'    => $status,
            'message'   => $message,
        ];

        return response()->json($data, $httpCode);
    }

    public static function defaultFoundResponseWithData($status, $data)
    {
        if ($status) {
            $httpCode = 200;
            $message = ConstantString::$FOUND_RESPONSE;
        } else {
            $httpCode = 400;
            $message = ConstantString::$NOT_FOUND_RESPONSE;
        }


        $data = [
            'status'    => $status,
            'message'   => $message,
            'data'   => $data,
        ];

        return response()->json($data, $httpCode);
    }

    public static function conditionalFoundResponse($data)
    {
        if (!$data) {
            $data = [
                'status'    => false,
                'message'   => ConstantString::$NOT_FOUND_RESPONSE,
            ];

            return response()->json($data, 400);
        } else {
            return true;
        }
    }

    public static function showResponse($data, $another = null)
    {
        if ($data) {
            $httpCode = 200;
            $status = true;
            $message = ConstantString::$FOUND_RESPONSE;
            $datas = $data;
        } else {
            $httpCode = 400;
            $status = false;
            $message = ConstantString::$NOT_FOUND_RESPONSE;
            $datas = null;
        }
        $data = [
            'status'    => $status,
            'message'   => $message,
            'data'   => $datas,
            'another'   => $another,
        ];

        return response()->json($data, $httpCode);
    }

    public static function defaultListResponse($status, $data, $another = null)
    {
        if ($status) {
            $httpCode = 200;
            $message = ConstantString::$FOUND_RESPONSE;
        } else {
            $httpCode = 400;
            $message = ConstantString::$NOT_FOUND_RESPONSE;
        }

        $data = [
            'status'    => $status,
            'message'   => $message,
            'data'   => $data,
            'another'   => $another,
        ];

        return response()->json($data, $httpCode);
    }



    public static function defaultInsert($status, $data)
    {
        if ($status) {
            $httpCode = 200;
            $message = ConstantString::$INSERT_RESPONSE;
        } else {
            $httpCode = 400;
            $message = ConstantString::$FAIL_INSERT_RESPONSE;
        }

        $data = [
            'status'    => $status,
            'data'   => $data,
            'message'   => $message
        ];

        return response()->json($data, $httpCode);
    }
    public static function insertKoperasi($status, $data, $user)
    {
        if ($status) {
            $httpCode = 200;
            $message = ConstantString::$INSERT_RESPONSE;
        } else {
            $httpCode = 400;
            $message = ConstantString::$FAIL_INSERT_RESPONSE;
        }

        $data = [
            'status'    => $status,
            'data'   => $data,
            'user' => $user,
            'message'   => $message
        ];

        return response()->json($data, $httpCode);
    }

    public static function defaultUpdate($status, $data)
    {
        if ($status) {
            $httpCode = 200;
            $message = ConstantString::$UPDATE_RESPONSE;
        } else {
            $httpCode = 400;
            $message = ConstantString::$FAIL_UPDATE_RESPONSE;
        }

        $data = [
            'status'    => $status,
            'data'    => $data,
            'message'   => $message
        ];

        return response()->json($data, $httpCode);
    }

    public static function defaultDelete($status, $data)
    {
        if ($status) {
            $httpCode = 200;
            $message = ConstantString::$DELETE_RESPONSE;
        } else {
            $httpCode = 400;
            $message = ConstantString::$FAIL_DELETE_RESPONSE;
        }

        $data = [
            'status'    => $status,
            'data'    => $data,
            'message'   => $message
        ];

        return response()->json($data, $httpCode);
    }
}
