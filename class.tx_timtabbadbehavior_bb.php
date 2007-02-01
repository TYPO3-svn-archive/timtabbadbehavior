<?php
/***************************************************************
*  Copyright notice
*
*  (c)  2007 Ingo Renner (typo3@ingo-renner.com)  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


require_once(t3lib_extMgm::extPath('timtab_badbehavior').'bad-behavior-typo3.php');

/**
 * class.tx_timtabbadbehavior_bb.php
 *
 * Implements bad behavior for TYPO3 / TIMTAB
 *
 * $Id$
 *
 * @author Ingo Renner <typo3@ingo-renner.com>
 */
class tx_timtabbadbehavior_bb {
	
	function bbStart($params, $pObj) {
		
		// init DB connection in case it isn't astablished yet
		if(!$GLOBALS['TYPO3_DB']->link) {
			$pObj->connectToDB();
		}
		
		// start Bad Behavior 2
		bb2_start(bb2_read_settings());

	}
	
	
	function renderTceFormRequestEntity($PA, $fObj) {
		return $PA['itemFormElValue'];
	}
	
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/timtab_badbehavior/class.tx_timtabbadbehavior_bb.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/timtab_badbehavior/class.tx_timtabbadbehavior_bb.php']);
}
?>
