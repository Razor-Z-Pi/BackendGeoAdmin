<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
  public function update(Request $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
  {
    $context = User::find($request -> get("id"));
    if ($context) {
      $context -> name = $request -> get("name");
      $context -> email = $request -> get("email");
      $context -> save();
    } else {
      return response(["error"]);
    }
    return response([]);
  }
}
