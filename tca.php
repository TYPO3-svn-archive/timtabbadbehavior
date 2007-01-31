<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA["tx_timtabbadbehavior_log"] = array (
	"ctrl" => $TCA["tx_timtabbadbehavior_log"]["ctrl"],
	"interface" => array (
		"showRecordFieldList" => "ip,date,request_method,request_uri,server_protocol,http_headers,user_agent,request_entity"
	),
	"feInterface" => $TCA["tx_timtabbadbehavior_log"]["feInterface"],
	"columns" => array (
		"ip" => array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:timtab_badbehavior/locallang_db.xml:tx_timtabbadbehavior_log.ip",		
			"config" => array (
				"type" => "input",	
				"size" => "20",	
				"max" => "20",
			)
		),
		"date" => array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:timtab_badbehavior/locallang_db.xml:tx_timtabbadbehavior_log.date",		
			"config" => array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"request_method" => array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:timtab_badbehavior/locallang_db.xml:tx_timtabbadbehavior_log.request_method",		
			"config" => array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"request_uri" => array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:timtab_badbehavior/locallang_db.xml:tx_timtabbadbehavior_log.request_uri",		
			"config" => array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"server_protocol" => array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:timtab_badbehavior/locallang_db.xml:tx_timtabbadbehavior_log.server_protocol",		
			"config" => array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"http_headers" => array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:timtab_badbehavior/locallang_db.xml:tx_timtabbadbehavior_log.http_headers",		
			"config" => array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",
			)
		),
		"user_agent" => array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:timtab_badbehavior/locallang_db.xml:tx_timtabbadbehavior_log.user_agent",		
			"config" => array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"request_entity" => array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:timtab_badbehavior/locallang_db.xml:tx_timtabbadbehavior_log.request_entity",		
			"config" => array (
				"type" => "text",
				"cols" => "30",	
				"rows" => "5",
			)
		),
		"bbkey" => array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:timtab_badbehavior/locallang_db.xml:tx_timtabbadbehavior_log.key",		
			"config" => array (
				"type" => "input",	
				"size" => "30",
			)
		),
	),
	"types" => array (
		"0" => array("showitem" => "ip;;;;1-1-1, date, request_method, request_uri, server_protocol, http_headers, user_agent, request_entity, bbkey")
	),
	"palettes" => array (
		"1" => array("showitem" => "")
	)
);
?>