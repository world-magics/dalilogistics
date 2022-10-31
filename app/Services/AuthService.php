<?php


namespace App\Services;


use App\TransferObjects\Auth\LoginByChannelResult;
use App\TransferObjects\ResultBase;
use App\Utils\RabbitClient;

/**
 * Date: 2021-09-24
 * Class AuthService
 * @author Azizbek Eshonaliyev <1996azizbekeshonaliyev@gmail.com>
 */
class AuthService
{
    protected $rabbit_client;

    protected $user_service;

    public function __construct()
    {
        $this->rabbit_client = new RabbitClient();
        $this->user_service = new UserService();
    }

    public function login(array $credentials): ResultBase
    {
        $result =  $this->rabbit_client->__callChannel($credentials, 'login');

        if (is_null($result))
            return (new ResultBase())->setError(__("exception.something_went_wrong_try_again_later"));

        if (!$result['success']){
            return (new ResultBase())->setError($result['error']);
        }

        $user = $this->user_service->findUserByUsername($result['username']);

        if (is_null($user)){
            $user = $this->user_service->createUser($result);
        }

        return new LoginByChannelResult([
            'user_id' => $user->id
        ]);
    }
}
