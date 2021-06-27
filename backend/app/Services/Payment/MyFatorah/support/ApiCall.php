<?php


namespace App\Services\Payment\MyFatorah\support;


use Illuminate\Support\Facades\Http;

class ApiCall
{

    public static function post($endPoint, $data)
    {
        $response = Http::acceptJson()->withHeaders(["Authorization" => "Bearer ".self::getApiKey()])
            ->post($endPoint, $data);

        return self::checkResponse($response);
    }

    public static function get($endPoint)
    {
        $response = Http::acceptJson()->withHeaders(["Authorization" => "Bearer ".self::getApiKey()])
            ->get($endPoint);

        return self::checkResponse($response);
    }

    public static function checkResponse($response)
    {
        $error = self::handleError($response);
        if ($error) {
            die('Error:'. $error);
        }
        return json_decode($response);
    }

    public static function handleError($response)
    {
        $json = json_decode($response);

        if (isset($json->IsSuccess) && $json->IsSuccess == true) {
            return null;
        }

        //Check for the errors
        if (isset($json->ValidationErrors) || isset($json->FieldsErrors)) {
            $errorsObj = isset($json->ValidationErrors) ? $json->ValidationErrors : $json->FieldsErrors;
            $blogData = array_column($errorsObj, 'Error', 'Name');

            $error = implode(', ', array_map(function ($key, $value) {
                return "$key: $value";
            }, array_keys($blogData), array_values($blogData)));

        } else if (isset($json->Data->ErrorMessage)) {
            $error = $json->Data->ErrorMessage;
        }

        if (empty($error)) {
            $error = (isset($json->Message)) ? $json->Message : (!empty($response) ? $response : 'API key or API URL is not correct');
        }

        return $error;
    }

    private static function getApiKey()
    {
        return config('fatoorah.apiKey');
    }

}
