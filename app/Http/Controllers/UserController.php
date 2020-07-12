<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Resources\UserCollection;
use App\Traits\FormatResponse;


class UserController extends Controller
{

    use FormatResponse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    public function index()
    {
        return new UserCollection(User::paginate(1000));
    }

    public function playersgames()
    {
        return (new UserCollection(User::with('games')->paginate(5)))
            ->additional(['message' => 'Users and their games retrieved successfully']);
    }


}
