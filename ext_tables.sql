#
# Table structure for table 'tx_timtabbadbehavior_log'
#
CREATE TABLE tx_timtabbadbehavior_log (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	ip tinytext NOT NULL,
	date tinytext NOT NULL,
	request_method tinytext NOT NULL,
	request_uri tinytext NOT NULL,
	server_protocol tinytext NOT NULL,
	http_headers text NOT NULL,
	user_agent tinytext NOT NULL,
	request_entity text NOT NULL,
	bbkey tinytext NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);