/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50634
Source Host           : localhost:3306
Source Database       : yii2advanced

Target Server Type    : MYSQL
Target Server Version : 50634
File Encoding         : 65001

Date: 2018-10-24 15:09:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admin', '1', '1540364417');
INSERT INTO `auth_assignment` VALUES ('admin', '2', '1540364443');
INSERT INTO `auth_assignment` VALUES ('环评部', '3', '1540364468');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '10',
  `display` int(11) NOT NULL DEFAULT '1',
  `is_show` int(11) NOT NULL DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('admin', '1', '超级管理员', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('backend/project', '2', '项目管理', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('backend/roleactive', '2', '权限模块', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('group/alldelete', '2', '批量删除部门', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('group/create', '2', '新增部门', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('group/delete', '2', '删除部门', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('group/index', '2', '部门管理列表', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('group/start', '2', '启用部门', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('group/stop', '2', '停用部门', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('group/update', '2', '修改部门', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('group/view', '2', '查看部门', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('role/alldelete', '2', '批量删除角色', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('role/create', '2', '新增角色', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('role/delete', '2', '删除角色', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('role/index', '2', '角色管理列表', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('role/start', '2', '启用角色', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('role/stop', '2', '停用角色', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('role/update', '2', '修改角色', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('role/view', '2', '查看角色', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('users/alldelete', '2', '批量删除用户', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('users/create', '2', '新增用户', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('users/delete', '2', '删除用户', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('users/index', '2', '用户管理列表', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('users/start', '2', '启用用户', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('users/stop', '2', '停用用户', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('users/update', '2', '修改用户', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('users/view', '2', '查看用户', null, null, '10', '1', '1', '1540364417', '1540364417');
INSERT INTO `auth_item` VALUES ('环评部', '1', 'index', null, null, '10', '1', '1', '1540364460', '1540364460');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('admin', 'backend/project');
INSERT INTO `auth_item_child` VALUES ('环评部', 'backend/project');
INSERT INTO `auth_item_child` VALUES ('admin', 'backend/roleactive');
INSERT INTO `auth_item_child` VALUES ('admin', 'group/alldelete');
INSERT INTO `auth_item_child` VALUES ('admin', 'group/create');
INSERT INTO `auth_item_child` VALUES ('admin', 'group/delete');
INSERT INTO `auth_item_child` VALUES ('admin', 'group/index');
INSERT INTO `auth_item_child` VALUES ('admin', 'group/start');
INSERT INTO `auth_item_child` VALUES ('admin', 'group/stop');
INSERT INTO `auth_item_child` VALUES ('admin', 'group/update');
INSERT INTO `auth_item_child` VALUES ('admin', 'group/view');
INSERT INTO `auth_item_child` VALUES ('admin', 'role/alldelete');
INSERT INTO `auth_item_child` VALUES ('admin', 'role/create');
INSERT INTO `auth_item_child` VALUES ('admin', 'role/delete');
INSERT INTO `auth_item_child` VALUES ('admin', 'role/index');
INSERT INTO `auth_item_child` VALUES ('admin', 'role/start');
INSERT INTO `auth_item_child` VALUES ('admin', 'role/stop');
INSERT INTO `auth_item_child` VALUES ('admin', 'role/update');
INSERT INTO `auth_item_child` VALUES ('admin', 'role/view');
INSERT INTO `auth_item_child` VALUES ('admin', 'users/alldelete');
INSERT INTO `auth_item_child` VALUES ('admin', 'users/create');
INSERT INTO `auth_item_child` VALUES ('admin', 'users/delete');
INSERT INTO `auth_item_child` VALUES ('admin', 'users/index');
INSERT INTO `auth_item_child` VALUES ('admin', 'users/start');
INSERT INTO `auth_item_child` VALUES ('admin', 'users/stop');
INSERT INTO `auth_item_child` VALUES ('admin', 'users/update');
INSERT INTO `auth_item_child` VALUES ('admin', 'users/view');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for filemanage
-- ----------------------------
DROP TABLE IF EXISTS `filemanage`;
CREATE TABLE `filemanage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `filedate` int(11) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `piwen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `writename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of filemanage
-- ----------------------------
INSERT INTO `filemanage` VALUES ('1', '111', '111', '111', '111', '111', '111', '111', '111');
INSERT INTO `filemanage` VALUES ('2', null, '', null, 'admin', '', 'admin', '1539920622', '1539920622');
INSERT INTO `filemanage` VALUES ('3', null, '', '', 'admin', '', 'admin', '1539938617', '1539938617');
INSERT INTO `filemanage` VALUES ('4', '1540483200', '{\"newname\":\"5bcfcb7e2e7c5.png\",\"oldname\":\"TIM\\u622a\\u56fe20180130085055.png\"}', '{\"newname\":\"5bcfd514470b9.png\",\"oldname\":\"100_\\u7248\\u672c\\u9009\\u62e9.png\"}', 'admin', '11111', 'admin', '1540344702', '1540347311');
INSERT INTO `filemanage` VALUES ('5', '1539878400', null, null, 'admin', '111', 'admin', '1540347579', '1540347579');

-- ----------------------------
-- Table structure for finance
-- ----------------------------
DROP TABLE IF EXISTS `finance`;
CREATE TABLE `finance` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `qddate` int(11) DEFAULT NULL COMMENT '合同签订日期',
  `htmoney` decimal(10,2) DEFAULT NULL COMMENT '合同金额（万元）',
  `sdkdate` int(11) DEFAULT NULL COMMENT '首付款打款时间',
  `sfmoney` decimal(10,2) DEFAULT NULL COMMENT '首付款金额（万元）',
  `wkdate` int(11) DEFAULT NULL COMMENT '尾款打款日期',
  `wkmoney` decimal(10,2) DEFAULT NULL COMMENT '尾款金额（万元）',
  `jcunit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '检测单位',
  `jcmoney` decimal(10,2) DEFAULT NULL COMMENT '检测费用（万元）',
  `hezuofang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '地下水评价合作方',
  `dixiasmoney` decimal(10,2) DEFAULT NULL COMMENT '地下水评价费用（万元）',
  `premoney` decimal(10,2) DEFAULT NULL COMMENT '专家费用（元）',
  `ticheng` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '是否提成',
  `remark` text COLLATE utf8_unicode_ci COMMENT '备注',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of finance
-- ----------------------------
INSERT INTO `finance` VALUES ('1', '1539273600', '111.00', '1539964800', '111.00', '1539878400', '111.00', '111', '111.00', '111', '111.00', '222.00', '是', '1111', 'admin', '1540353847', '1540359614');

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `context` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `display` smallint(6) NOT NULL DEFAULT '1',
  `is_show` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `indexname` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES ('1', '环评编写部', '环评编写部', '1', '1', '1', '1540363560', '1540363560');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1539788732');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1539788735');
INSERT INTO `migration` VALUES ('m160714_032337_create_new_table', '1539788736');
INSERT INTO `migration` VALUES ('m160714_080807_create_group_table', '1539788736');

-- ----------------------------
-- Table structure for projectmanage
-- ----------------------------
DROP TABLE IF EXISTS `projectmanage`;
CREATE TABLE `projectmanage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `buildname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '建设单位',
  `contactname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '联系人',
  `contactphone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '联系电话',
  `projectarea` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '项目所在地',
  `projectname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '项目名称',
  `projecttype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '报告类型',
  `approval` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '审批部门',
  `projectuser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '项目负责人',
  `projectin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '项目参与人',
  `approvalname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '审核人',
  `tkandate` int(11) DEFAULT NULL COMMENT '踏勘现场日期',
  `bsdate` int(11) DEFAULT NULL COMMENT '报审版提交日期',
  `psdate` int(11) DEFAULT NULL COMMENT '评审会日期',
  `bpjfdate` int(11) DEFAULT NULL COMMENT '报批版交付日期',
  `remark` text COLLATE utf8_unicode_ci COMMENT '备注',
  `jindu` text COLLATE utf8_unicode_ci,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of projectmanage
-- ----------------------------
INSERT INTO `projectmanage` VALUES ('1', '11', '111', '111', '满城区', '111', '111', '', '111', '111', '111', '1562860800', '-28800', '-28800', '-28800', '222', '222', 'admin', '1540362189', '1540362772');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `groupid` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'g-eT0PODgNTLZo5iTjsPhCoM2W0VThLU', '$2y$13$PSaa0HFnL85VuRcNO391wurc0rVa/REEr6RK0.IjTPizIISXm.Xba', '', 'admin@demo.com', 'admin', null, '10', '1539788734', '1539788734');
INSERT INTO `user` VALUES ('2', '李娅', 'jV7LCuWthqV5A6_k1_c3LCBVymvXk6On', '$2y$13$yOHv6A2Wy7j.HaDbhPZOsuySQk9lqMsKpUG5TBRQWRSLBk497IaYy', '29_67kzlkepw1noE4rjFfCLbnQWP359S_1540364442', 'liya@admin.com', 'user', '1', '10', '1540363659', '1540364442');
INSERT INTO `user` VALUES ('3', '伍文瀚', 'lQjVXZBWKfupDKhMXvCtSHw-nJRxHaM1', '$2y$13$9kIfVxo8o54zfh0Vf/bs8OCEDd9NYbdwicwH8X1TPWrJh26NQApWK', 'ae0ye6TlbmG4vu2GPdeXSD3e5FvZpxeq_1540363910', 'wuwenhan@live.cn', 'user', '1', '10', '1540363909', '1540364468');

-- ----------------------------
-- Procedure structure for test1
-- ----------------------------
DROP PROCEDURE IF EXISTS `test1`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `test1`()
begin
declare v_cnt decimal (10)  default 0 ;
dd:loop 
          insert  into usertb values
        (null,'用户1','2010-01-01 00:00:00',20),
        (null,'用户2','2010-01-01 00:00:00',20),
        (null,'用户3','2010-01-01 00:00:00',20),
        (null,'用户4','2010-01-01 00:00:00',20),
        (null,'用户5','2011-01-01 00:00:00',20),
        (null,'用户6','2011-01-01 00:00:00',20),
        (null,'用户7','2011-01-01 00:00:00',20),
        (null,'用户8','2012-01-01 00:00:00',20),
        (null,'用户9','2012-01-01 00:00:00',20),
        (null,'用户0','2012-01-01 00:00:00',20)
            ;
                  commit;
                    set v_cnt = v_cnt+10 ;
                           if  v_cnt = 10000000 then leave dd;
                          end if;
         end loop dd ;
end
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for test2
-- ----------------------------
DROP PROCEDURE IF EXISTS `test2`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `test2`()
begin
declare v_cnt decimal (10)  default 0 ;
dd:loop 
          insert  into usertb values
        (null,'用户1','2010-01-01 00:00:00',20),
        (null,'用户2','2010-01-01 00:00:00',20),
        (null,'用户3','2010-01-01 00:00:00',20),
        (null,'用户4','2010-01-01 00:00:00',20),
        (null,'用户5','2011-01-01 00:00:00',20),
        (null,'用户6','2011-01-01 00:00:00',20),
        (null,'用户7','2011-01-01 00:00:00',20),
        (null,'用户8','2012-01-01 00:00:00',20),
        (null,'用户9','2012-01-01 00:00:00',20),
        (null,'用户0','2012-01-01 00:00:00',20)
            ;
                  commit;
                    set v_cnt = v_cnt+10 ;
                           if  v_cnt = 10 then leave dd;
                          end if;
         end loop dd ;
end
;;
DELIMITER ;
