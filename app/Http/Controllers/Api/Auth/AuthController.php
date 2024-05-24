<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponseTrait;
    public function register(UserRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'phone'=>$request->phone,
                'gender'=>$request->gender,
                'email'=>$request->email,
                'password' => Hash::make($request->password)
                
            ]);

            $token = $user->createToken('Register API Token')->plainTextToken;
            $data = [
                'token' => $token,
                new UserResource($user),
             
            ];
      

            return $this->storeResponse($data);
        } catch (\Exception $e) {
            return $this->errorResponse("ERROR. " . $e->getMessage(), 500);
        }
    }
    public function login(LoginRequest $request)
    { if(!Auth::attempt($request->only('email','password')))
        {
            return $this->errorResponse("password or email does not match",401);
        }

        $user = User::where('email', $request->email)->first();
       
        $token = $user->createToken("Login Token")->plainTextToken;
        $data = [
            'token' => $token,
            new UserResource($user),
         
        ];
      
        return $this->successResponse($data, "User Loged Successfully", 200);
    }
     public function logout()
    {
        Auth::user()->tokens()->delete();

        Auth::guard('web')->logout();

        return $this->successResponse("logout Seccessfuly",auth()->user()->name  );
    
      }
      public function userProfile() {
            
        return response()->json(new UserResource(auth()->user()));
    }
  
}
