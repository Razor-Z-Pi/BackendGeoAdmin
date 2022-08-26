<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource\RoleOptionalResources;
use App\Models\Role;


class RoleController extends Controller
{
    public function __invoke(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
      $optional = Role::all();
      return RoleOptionalResources::collection($optional);
    }
}
