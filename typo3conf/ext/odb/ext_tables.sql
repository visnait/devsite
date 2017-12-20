#
# Table structure for table 'tx_odb_domain_model_odb'
#
CREATE TABLE tx_odb_domain_model_odb (
	uid int(11) NOT NULL auto_increment,
	pid int(11) NOT NULL DEFAULT '0',
	tstamp int(11) unsigned NOT NULL DEFAULT '0',
	crdate int(11) unsigned NOT NULL DEFAULT '0',
	cruser_id int(11) NOT NULL DEFAULT '0',
	sorting int(11) NOT NULL DEFAULT '0',
	deleted tinyint(1) NOT NULL DEFAULT '0',
	hidden tinyint(1) NOT NULL DEFAULT '0',

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumblob NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	code varchar(5) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	note varchar(255) NOT NULL DEFAULT '',

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;


#
# Table structure for table 'tx_odb_domain_model_terms'
#
CREATE TABLE tx_odb_domain_model_terms (
	uid int(11) NOT NULL auto_increment,
	pid int(11) NOT NULL DEFAULT '0',
	tstamp int(11) unsigned NOT NULL DEFAULT '0',
	crdate int(11) unsigned NOT NULL DEFAULT '0',
	cruser_id int(11) NOT NULL DEFAULT '0',
	sorting int(11) NOT NULL DEFAULT '0',
	deleted tinyint(1) NOT NULL DEFAULT '0',
	hidden tinyint(1) NOT NULL DEFAULT '0',

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumblob NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,

	term varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	note varchar(255) NOT NULL DEFAULT '',

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;