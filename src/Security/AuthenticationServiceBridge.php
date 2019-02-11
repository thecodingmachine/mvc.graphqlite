<?php

namespace Mouf\GraphQLite\Security;

use Mouf\Security\UserService\UserServiceInterface;
use TheCodingMachine\GraphQLite\Security\AuthenticationServiceInterface;

/**
 * A bridge between GraphQLite's AuthenticationServiceInterface and Mouf security service
 */
class AuthenticationServiceBridge implements AuthenticationServiceInterface
{

    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Returns true if the "current" user is logged
     *
     * @return bool
     */
    public function isLogged(): bool
    {
        return $this->userService->isLogged();
    }
}
