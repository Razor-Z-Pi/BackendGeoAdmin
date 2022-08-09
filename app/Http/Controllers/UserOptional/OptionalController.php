<?php

namespace App\Http\Controllers\UserOptional;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\UserOptional\OptionalResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class OptionalController extends Controller
{
    public function __invoke()
    {
      $optional = User::all();
      return OptionalResource::collection($optional);
    }
}
