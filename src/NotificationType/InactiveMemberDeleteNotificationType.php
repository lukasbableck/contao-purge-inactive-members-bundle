<?php
namespace Lukasbableck\ContaoPurgeInactiveMembersBundle\NotificationType;

use Terminal42\NotificationCenterBundle\NotificationType\NotificationTypeInterface;
use Terminal42\NotificationCenterBundle\Token\Definition\AnythingTokenDefinition;
use Terminal42\NotificationCenterBundle\Token\Definition\Factory\TokenDefinitionFactoryInterface;

class InactiveMemberDeleteNotificationType implements NotificationTypeInterface {
	public const NAME = 'inactive_member_delete';

	public function __construct(private readonly TokenDefinitionFactoryInterface $factory) {
	}

	public function getName(): string {
		return self::NAME;
	}

	public function getTokenDefinitions(): array {
		return [
			$this->factory->create(AnythingTokenDefinition::class, 'member_*', 'member_personal_data.member_*'),
		];
	}
}
