DROP TABLE IF EXISTS login_a;
CREATE TABLE IF NOT EXISTS login_a (
  a_id int unsigned not null auto_increment,
  login varchar(10) NOT NULL DEFAULT '',
  passwd varchar(40) NOT NULL DEFAULT '',
  status enum('Yes','No') DEFAULT 'Yes',
  created datetime DEFAULT NULL,
  PRIMARY KEY (a_id),
  UNIQUE KEY login (login)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS login_a_ip;
CREATE TABLE IF NOT EXISTS login_a_ip (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  ip int(10) unsigned NOT NULL,
  login VARCHAR(255) NOT NULL,
  updated timestamp,
  ret enum('fail','success') NOT NULL DEFAULT 'fail',
  PRIMARY KEY (id),
  KEY updated (updated),
  KEY ip (ip)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
