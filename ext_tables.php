<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
$TCA["tx_timtabbadbehavior_log"] = array (
	"ctrl" => array (
		'title'     => 'LLL:EXT:timtab_badbehavior/locallang_db.xml:tx_timtabbadbehavior_log',		
		'label'     => 'user_agent',	
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'readOnly'  => true,
		'default_sortby' => "ORDER BY date DESC",	
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_timtabbadbehavior_log.gif',
	),
	"feInterface" => array (
		"fe_admin_fieldList" => "ip, date, request_method, request_uri, server_protocol, http_headers, user_agent, request_entity, bbkey",
	)
);


if (TYPO3_MODE=="BE")	{
	t3lib_extMgm::insertModuleFunction(
		"web_func",		
		"tx_timtabbadbehavior_modfunc1",
		t3lib_extMgm::extPath($_EXTKEY)."modfunc1/class.tx_timtabbadbehavior_modfunc1.php",
		"LLL:EXT:timtab_badbehavior/locallang_db.xml:moduleFunction.tx_timtabbadbehavior_modfunc1"
	);
}

?>