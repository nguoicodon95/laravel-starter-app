/*Table structure for table `streamfile` */

DROP TABLE IF EXISTS `streamfile`;

CREATE TABLE `streamfile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_thmb_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `streampost` */

DROP TABLE IF EXISTS `streampost`;

CREATE TABLE `streampost` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `streamuser` */

DROP TABLE IF EXISTS `streamuser`;

CREATE TABLE `streamuser` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert  into `streamuser`(`id`,`username`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'youremail@youremail.com','$2y$10$eHmSft2jdQH38yQwXXoOhOgOvaew6KXXNrnKrniLQA66K61aim5n2','vwAwVejH87zm9pPyXjTz2FxhsN62zcFUtbbmvVcFSNzaV1jhpPPEBdsx7Z09','2014-11-28 19:20:15','2015-05-09 01:18:26');
