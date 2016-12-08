<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;

    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function respondNotFound ($message = 'Not found.'){
        $this->setStatusCode(404);
        return $this->respondWithError($message);
    }

    public function respond ($data, $headers = []){
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message){
        return $this->respond([
            'error' => [
                'message' =>$message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

}
