<?php

namespace App\Filter;

use App\Model\RestUser;
use Request;
use Response;

/**
 * Created by PhpStorm.
 * User: daikihirakata
 * Date: 10/13/15
 * Time: 00:56
 */
class ApiAuthFilter
{
    /**
     * @var string
     */
    const APPLICATION_TOKEN = 'x-application-token';
    /**
     * @var string
     */
    const AUTHORIZED_USER = 'authorized_user';

    /**
     * filter
     */
    public function filter()
    {
        $user = RestUser::where('api_token', Request::header(static::APPLICATION_TOKEN))->first();
        if (is_null($user)) {
            return Response::json(['message' => '401 Unauthorized'], 401);
        }
        app()[static::AUTHORIZED_USER] = $user;
        return null;
    }

}