<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\User\DeleteRequest;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class DeleteController extends Controller
{
  public function destroy($id): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
  {
    $user = User::findOrFail($id);
    if ($user) {
      $user -> delete();
    }
    return response([]);
  }
}
