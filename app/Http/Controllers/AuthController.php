<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\DB;
use App\User;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => "Email or Password doesn't exist"], 401);
        }

        return $this->respondWithToken($token);
    }


    public function signup(SignUpRequest $request)
    {
        User::create($request->all());
        return $this->login($request);
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()->name
        ]);
    }

    public function getFavList()
    {
        $userId = Auth::user()->id;
        if (empty($userId) || !$userId) { return response("User not founded!",Response::HTTP_NOT_FOUND);}        
        $userRecipeList = DB::table('users')->where('id', $userId)->first()->favRecipes;
        if (!$userRecipeList) { return response("Favorite list is empty!",Response::HTTP_NOT_FOUND);}
        $arr1 = explode(" ", $userRecipeList);
        return response()->json($arr1);
    }

    public function addToList(Request $request)
    {
$userId = Auth::user()->id;
        $userRecipeList = DB::table('users')->where('id', $userId)->first()->favRecipes;
        if(empty($userRecipeList)) {$data = $request->recipeId;} 
        if(!empty($userRecipeList)) {$data = $userRecipeList .' '. $request->recipeId;} 
        $arr1 = explode(" ", $userRecipeList);
        $sel = array_search($request->recipeId, $arr1);
        if (!empty($sel) || $sel === 0) { return response('You added this id before, ID: '. $request->recipeId,Response::HTTP_NOT_FOUND);}
        DB::update('update users set favRecipes = ? where id = ?', 
        [$data, $userId]);

$responseList = DB::table('users')->where('id', $userId)->first()->favRecipes;
$arr2 = explode(" ", $responseList);
        return response()->json($arr2);
    }
    public function removeFromList(Request $request)
    {
$userId = Auth::user()->id;
        $userRecipeList = DB::table('users')->where('id', $userId)->first()->favRecipes;
        $arr1 = explode(" ", $userRecipeList);
        $sel = array_search($request->recipeId, $arr1);
        if ($sel === false) { return response("Item Not Founded",Response::HTTP_NOT_FOUND);}
        unset($arr1[$sel]);
        // Convert to String again
        $array = implode(" ",$arr1);
        
        DB::update('update users set favRecipes = ? where id = ?', 
        [$array, $userId]);

$responseList = DB::table('users')->where('id', $userId)->first()->favRecipes;
$arr2 = explode(" ", $responseList);
        return response()->json($arr2);
    }
}
