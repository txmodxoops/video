# SQL Dump for video module
# PhpMyAdmin Version: 4.0.4
# http://www.phpmyadmin.net
#
# Host: localhost
# Generated on: Sat May 07, 2016 to 14:44
# Server version: 5.6.17
# PHP Version: 5.5.12

#
# Structure table for `video_categories` 6
#

CREATE TABLE `video_categories` (
  `cat_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_pid` INT(5) UNSIGNED NOT NULL DEFAULT '0',
  `cat_title` VARCHAR(255) NOT NULL DEFAULT '',
  `cat_description` TEXT  ,
  `cat_image` VARCHAR(100) NOT NULL DEFAULT '',
  `cat_weight` MEDIUMINT(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`),
  KEY `cat_pid` (`cat_pid`)
) ENGINE=InnoDB;

#
# Structure table for `video_videos` 10
#

CREATE TABLE `video_videos` (
  `video_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `video_cid` MEDIUMINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `video_title` VARCHAR(255) NOT NULL DEFAULT '',
  `video_file` VARCHAR(255) NOT NULL DEFAULT '',
  `video_description` TEXT  ,
  `video_url` VARCHAR(255) NOT NULL DEFAULT '',
  `video_created` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `video_published` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `video_weight` MEDIUMINT(10) UNSIGNED NOT NULL DEFAULT '0',
  `video_display` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`video_id`),
  KEY `video_cid` (`video_cid`),
  KEY `video_title` (`video_title`),
  KEY `video_file` (`video_file`)
) ENGINE=InnoDB;

