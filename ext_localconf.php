<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

require_once(t3lib_extMgm::extPath('timtab_badbehavior').'class.tx_timtabbadbehavior_bb.php');

//registering for the end of front end hook
#$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['hook_eofe'][] = 'tx_timtabbadbehavior_bb->bbStart'; 
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['tslib_fe-PostProc'][] = 'tx_timtabbadbehavior_bb->bbStart';
?>