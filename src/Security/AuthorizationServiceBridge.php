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
     * @param mixed $subject The scope this right applies on. $subject is typically an object or a FQCN. Set $subject to "null" if the right is global.
     */
    public function isAllowed(string $right, $subject = null): bool
    {
        return $this->rightsService->isAllowed($right, $subject);
    }
}
