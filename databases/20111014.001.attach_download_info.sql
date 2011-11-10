CREATE TABLE `attach_download_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '下载人的uid',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '下载人的用户名',
  `attach_id` bigint(20) NOT NULL COMMENT '附件id',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='附件下载记录' AUTO_INCREMENT=1 ;