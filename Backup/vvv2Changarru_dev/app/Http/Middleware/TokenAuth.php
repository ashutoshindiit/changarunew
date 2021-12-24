<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Exception;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

use Closure;  

class TokenAuth extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     * 's
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $header = $request->header('x-authorisation');
     
        if($header = $request->header('x-authorisation')){
            if(strpos(strtolower($header), 'bearer') !== false){
                $request->headers->set('Authorization', $header);
            }else{
                $request->headers->set('Authorization', 'Bearer ' . $header);
            }
        }

        try {
            $user = Auth::guard('api')->user();
            if (!empty($user)) {
                if($user['verified_status'] != 'verified'){
                    $type ='not_verified';
                    JWTAuth::parseToken()->invalidate( JWTAuth::getToken() );
                    return response()->json(['code' => 301, 'message' => 'Your account is '.$type.'. Please contact the admin']);
               }
            }
            return $next($request);
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['code' => 301, 'status'=>false, 'message' => 'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['code' => 301, 'status'=>false, 'message' => 'Token is Expired']);
            }else if ($e instanceof Exception) {
                return response()->json(['code' => 301, 'status'=>false, 'message' => $e->getMessage()]);
            }else {
                return response()->json(['code' => 301, 'status'=>false, 'message' => 'Something is wrong']);
            }
        }
    }
}
