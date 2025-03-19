<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_settings']['palettes']['__selector__'][] = 'purgeInactiveMembers';
$GLOBALS['TL_DCA']['tl_settings']['subpalettes']['purgeInactiveMembers'] = 'inactiveMembersPeriod,inactiveMembersDeleteNotification';

$GLOBALS['TL_DCA']['tl_settings']['fields']['purgeInactiveMembers'] = [
	'inputType' => 'checkbox',
	'eval' => ['tl_class' => 'w50 m12'],
];
$GLOBALS['TL_DCA']['tl_settings']['fields']['inactiveMembersPeriod'] = [
	'inputType' => 'text',
	'eval' => ['mandatory' => true, 'rgxp' => 'natural', 'nospace' => true, 'tl_class' => 'clr w50'],
];
$GLOBALS['TL_DCA']['tl_settings']['fields']['inactiveMembersDeleteNotification'] = [
	'inputType' => 'select',
	'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
];

PaletteManipulator::create()
	->addField('purgeInactiveMembers', 'logPeriod', PaletteManipulator::POSITION_AFTER)
	->applyToPalette('default', 'tl_settings')
;
