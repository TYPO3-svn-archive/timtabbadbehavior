<?php
/*
Bad Behavior - detects and blocks unwanted Web accesses
Copyright (C) 2005-2006 Michael Hampton

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

As a special exemption, you may link this program with any of the
programs listed below, regardless of the license terms of those
programs, and distribute the resulting program, without including the
source code for such programs: ExpressionEngine

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.

Please report any problems to badbots AT ioerror DOT us
*/

###############################################################################
###############################################################################

define('BB2_CWD', dirname(__FILE__));

// Settings you can adjust for Bad Behavior.
// Most of these are unused in non-database mode.
$bb2_settings_defaults = array(
	'log_table' => 'tx_timtabbadbehavior_log',
	'display_stats' => 0,
	'strict' => 0,
	'verbose' => 0
);

// Bad Behavior callback functions.

// Return current time in the format preferred by your database.
function bb2_db_date() {
	return gmdate('Y-m-d H:i:s');	// Example is MySQL format
}

// Return affected rows from most recent query.
function bb2_db_affected_rows() {
	return $GLOBALS['TYPO3_DB']->sql_affected_rows();
}

// Escape a string for database usage
function bb2_db_escape($string) {
	return $string;
}

// Return the number of rows in a particular query.
function bb2_db_num_rows($result) {
	
	return $GLOBALS['TYPO3_DB']->sql_num_rows($result);
}

// Run a query and return the results, if any.
// Should return FALSE if an error occurred.
// Bad Behavior will use the return value here in other callbacks.
function bb2_db_query($query) {
	
	$res = $GLOBALS['TYPO3_DB']->sql_query($query);

	$isSelect = ( strstr($query,'SELECT') == $query );

	$count = 0;
	if($isSelect) {
		$count = $GLOBALS['TYPO3_DB']->sql_num_rows($res);
	} else {
		$count = $GLOBALS['TYPO3_DB']->sql_affected_rows($res);
	}
	
	$result = false;
	if(!$GLOBALS['TYPO3_DB']->sql_error() && $count && $isSelect) {
		$result = array();
		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
			$result[] = $row;
		}
	}	
	
	return $result;
}

// Return all rows in a particular query.
// Should contain an array of all rows generated by calling mysql_fetch_assoc()
// or equivalent and appending the result of each call to an array.
function bb2_db_rows($result) {
	
	$rows = array();
	while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) {
		$rows[] = $row;
	}
	
	return $rows;
}

// Return emergency contact email address.
function bb2_email() {
	return $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_timtabbadbehavior.']['emergencyEmail'];
}

// retrieve settings from database
// Settings are hard-coded for non-database use
function bb2_read_settings() {
	global $bb2_settings_defaults;
	
	$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['timtab_badbehavior']);
	$settings = array_merge($bb2_settings_defaults, $extConf);
	
	return $settings;
}

// write settings to database
function bb2_write_settings($settings) {
	return false;
}

// installation
function bb2_install() {
	return false;
}

// Screener
// Insert this into the <head> section of your HTML through a template call
// or whatever is appropriate. This is optional we'll fall back to cookies
// if you don't use it.
function bb2_insert_head() {
	global $bb2_javascript;
	
	$GLOBALS['TSFE']->additionalHeaderData['tx_timtabbadbehavior'] = $bb2_javascript;
}

// Display stats? This is optional.
function bb2_insert_stats($force = false) {
	$settings = bb2_read_settings();

	if ($force || $settings['display_stats']) {
		$blocked = bb2_db_query("SELECT COUNT(*) FROM " . $settings['log_table'] . " WHERE `key` NOT LIKE '00000000'");
		if ($blocked !== FALSE) {
			echo sprintf('<p><a href="http://www.homelandstupidity.us/software/bad-behavior/">%1$s</a> %2$s <strong>%3$s</strong> %4$s</p>', __('Bad Behavior'), __('has blocked'), $blocked[0]["COUNT(*)"], __('access attempts in the last 7 days.'));
		}
	}
}

// Return the top-level relative path of wherever we are (for cookies)
// You should provide in $url the top-level URL for your site.
function bb2_relative_path() {
	return t3lib_div::getIndpEnv('TYPO3_SITE_URL');
}

// Calls inward to Bad Behavor itself.
require_once(BB2_CWD . "/bad-behavior/version.inc.php");
require_once(BB2_CWD . "/bad-behavior/core.inc.php");



?>
