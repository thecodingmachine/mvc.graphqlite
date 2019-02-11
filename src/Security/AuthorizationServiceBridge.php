<?php


namespace Mouf\GraphQLite\Security;

use Mouf\Security\RightsService\RightsServiceInterface;
use TheCodingMachine\GraphQLite\Security\AuthorizationServiceInterface;

/**
 * A bridge between GraphQLite's AuthorizationServiceInterface and Mouf's right service
 */
class AuthorizationServiceBridge implements AuthorizationServiceInterface
{
    /**
     * @var RightsServiceInterface
     */
    private $rightsService;

    public function __construct(RightsServiceInterface $rightsService)
    {
        $this->rightsService = $rightsService;
    }

    /**
     * Returns true if the "current" user has access to the right "$right"
     *
     * @param string $right
     * @return bool
     */
    public function isAllowed(string $right): bool
    {
        return $this->rightsService->isAllowed($right);
    }
}
