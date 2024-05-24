<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = RoleResource::collection(Role::all());
        return $this->indexResponse($role);
    }
    public function store(RoleRequest $request)
    {
        
        $role = Role::create([
            'role_name' => $request->role_name,
        ]);

        if ($role) {
            return $this->storeResponse(new RoleResource($role));
        }
        return $this->dontSaveResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = role::find($id);

        if ($role) {
            return $this->showResponse(new RoleResource($role));
        }
        return $this->notFoundResponse();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        // if ($request->fails()) {
        //     return $this->apiResponse(null, $request->errors(), 400);
        // }
        $role = role::find($id);
        if (!$role) {
            return $this->notFoundResponse();
        }
        if ($role->user_id === Auth::id()) {

            $role->update([
                'role_name' => $request->role_name,

            ]);

            if ($role) {
                return $this->updateResponse(new roleResource($role), 'the role update');
            }
        }
        return $this->errorResponse('you con not update the role Because you are not authorized', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Role = Role::find($id);

        if ($Role->user_id === Auth::id()) {
            $Role->delete();
            if ($Role) {
                return $this->destroyResponse();
            }
            return $this->errorResponse('you con not delete the Role', 400);
        }
        return $this->errorResponse('you con not delete the Role Because you are not authorized', 401);
    }
    
}