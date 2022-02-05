<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class AbstractController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected function buildSuccessResult($object = null)
    {
        return [
            "process" => true, 
            "status" => true, 
            "message" => 'success', 
            "errors" => null
        ];
    }
    
    protected function buildErrorResult(string $message)
    {
        return [
            "process" => true, 
            "status" => false, 
            "message" => 'failed', 
            "errors" => $message
        ];
    }
    
    /**
     * Returns a JsonResponse that uses the serializer component if enabled, or json_encode.
     */
    protected function json($data, int $status = 200, array $headers = []): JsonResponse
    {
        
        return new JsonResponse($data, $status, $headers);
    }
}
