<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use App\Http\Requests\User\DeleteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Integer;

class CreateController extends Controller
{
  public function create(StoreRequest $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
  {
    $data = $request -> validated();
    $data["password"] = Hash::make($data["password"]);
    $user = User::where("email", $data["email"]) -> first();
    if ($user) {
      return response(["error"]);
    } else {
      $user = User::create($data);
    }
    return response([$user]);
  }
}
