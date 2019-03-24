<?php
 
namespace App\Http\Middleware;
 
use Closure;
 
class CORS {
   public function handle($request, Closure $next)
   {
       header("Access-Control-Allow-Origin: *");
      //  header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
      //  header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Auth-Token');
       header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Auth-Token, X-Request-With');
      //  header('Access-Control-Allow-Credentials: true');
 
      //  if (!$request->isMethod('options')) {
           return $next($request);
      //  }
   }
}