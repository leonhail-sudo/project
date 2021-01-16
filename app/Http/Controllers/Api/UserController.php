<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transformers\UserTransformer;
use App\Helpers\TFHelper;

class UserController extends Controller
{
     /**
     * Get Authorized User Data.
     *
     * @return Illuminate\Http\Response
     */
    public function auth()
    {
        $user = resolve('User')->ff(Auth::user()->id);
        return TFHelper::item(Auth::user(), new UserTransformer());
    }
}
