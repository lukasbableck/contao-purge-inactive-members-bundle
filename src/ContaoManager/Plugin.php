<?php
namespace Lukasbableck\ContaoPurgeInactiveMembersBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Lukasbableck\ContaoPurgeInactiveMembersBundle\ContaoPurgeInactiveMembersBundle;

class Plugin implements BundlePluginInterface {
	public function getBundles(ParserInterface $parser): array {
		return [BundleConfig::create(ContaoPurgeInactiveMembersBundle::class)->setLoadAfter([ContaoCoreBundle::class])];
	}
}
