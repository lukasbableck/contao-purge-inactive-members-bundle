<?php
namespace Lukasbableck\ContaoPurgeInactiveMembersBundle\EventListener\DataContainer;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;
use Lukasbableck\ContaoPurgeInactiveMembersBundle\NotificationType\InactiveMemberDeleteNotificationType;
use Terminal42\NotificationCenterBundle\NotificationCenter;

#[AsCallback(table: 'tl_settings', field: 'inactiveMembersPredeleteNotification')]
#[AsCallback(table: 'tl_settings', field: 'inactiveMembersDeleteNotification')]
class NotificationOptionsCallbackListener {
	public function __construct(private readonly NotificationCenter $notificationCenter) {
	}

	public function __invoke(DataContainer $dc): array {
		return $this->notificationCenter->getNotificationsForNotificationType(InactiveMemberDeleteNotificationType::NAME);
	}
}
