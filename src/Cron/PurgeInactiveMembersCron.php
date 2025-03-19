<?php
namespace Lukasbableck\ContaoPurgeInactiveMembersBundle\Cron;

use Contao\Config;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCronJob;
use Contao\MemberModel;
use Terminal42\NotificationCenterBundle\NotificationCenter;

#[AsCronJob('daily')]
class PurgeInactiveMembersCron {
	public function __construct(private readonly NotificationCenter $notificationCenter) {
	}

	public function __invoke(): void {
		$inactiveMembersPeriod = Config::get('inactiveMembersPeriod');
		$inactiveMembersDeleteNotification = Config::get('inactiveMembersDeleteNotification');
		if (!$inactiveMembersPeriod) {
			return;
		}
		$inactiveMembers = MemberModel::findBy(['lastLogin<?', 'lastLogin>?'], [time() - $inactiveMembersPeriod, 0]);
		foreach ($inactiveMembers as $inactiveMember) {
			if ($inactiveMembersDeleteNotification) {
				$this->notificationCenter->sendNotification($inactiveMembersDeleteNotification, ['member' => $inactiveMember], $inactiveMember->language);
			}
			$inactiveMember->delete();
		}
	}
}
