/*
 Navicat Premium Data Transfer

 Source Server         : 自己的数据库
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : 127.0.0.1:3306
 Source Schema         : loan_market

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 08/10/2018 15:45:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dc_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `dc_admin_menu`;
CREATE TABLE `dc_admin_menu`  (
  `menu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上级菜单的menu_id,一级菜单默认为0',
  `is_show` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否作为菜单显示',
  `menu_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '菜单名',
  `iconfont` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '菜单图标,只用parent_id为0时才是必须的',
  `menu_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '菜单链接,一级菜单默认为空',
  `createTime` datetime(0) NOT NULL COMMENT '创建时间',
  `updateTime` datetime(0) NOT NULL COMMENT '更新时间',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除 0未删除,1删除了',
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '左边菜单列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dc_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `dc_admin_role`;
CREATE TABLE `dc_admin_role`  (
  `roleId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除',
  `roleName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '角色名',
  `preList` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '角色所拥有的权限',
  `roleDesc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '角色权限描述',
  `createTime` datetime(0) NOT NULL COMMENT '创建时间',
  `updateTime` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  PRIMARY KEY (`roleId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '角色表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dc_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `dc_admin_user`;
CREATE TABLE `dc_admin_user`  (
  `userId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `userName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `realName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '真实姓名',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '密码',
  `pwdSalt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '密码盐',
  `mobile` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `roleId` tinyint(1) UNSIGNED NOT NULL DEFAULT 99 COMMENT '所属用户组',
  `loginIp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '登入ip',
  `createTime` datetime(0) NOT NULL COMMENT '创建时间',
  `updateTime` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  `isDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否删除',
  PRIMARY KEY (`userId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '后台用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dc_banner
-- ----------------------------
DROP TABLE IF EXISTS `dc_banner`;
CREATE TABLE `dc_banner`  (
  `bannerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `cid` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>轮播图;2=>开屏页',
  `title` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '标题,描述',
  `imageUrl` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '图片地址',
  `redirectUrl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '跳转地址',
  `listorder` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序 数字越小排在越前面',
  `createTime` datetime(0) NOT NULL COMMENT '添加时间',
  `updateTime` datetime(0) NOT NULL COMMENT '修改时间',
  `isDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=>未删除,1=>删除',
  PRIMARY KEY (`bannerId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '轮播图和开屏页表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dc_book
-- ----------------------------
DROP TABLE IF EXISTS `dc_book`;
CREATE TABLE `dc_book`  (
  `bookId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `userId` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '所属用户id',
  `borrowTerm` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '借款天数',
  `isDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否删除',
  `bookStatus` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '账单状态 0=>未还 1=>已还',
  `money` decimal(20, 2) NOT NULL DEFAULT 0.00 COMMENT '借款金额',
  `interest` decimal(20, 2) NOT NULL DEFAULT 0.00 COMMENT '借款利息',
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '借款平台名称',
  `repayDate` date NOT NULL COMMENT '还款时间',
  `borrowDate` date NOT NULL COMMENT '借款时间',
  `createTime` datetime(0) NOT NULL COMMENT '添加时间',
  `updateTime` datetime(0) NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`bookId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '账单列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dc_channel
-- ----------------------------
DROP TABLE IF EXISTS `dc_channel`;
CREATE TABLE `dc_channel`  (
  `channelId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `channelName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '渠道名称',
  `account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '渠道账号',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '渠道密码',
  `keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '渠道关键字',
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '渠道类型',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '渠道状态 1合作中 0合作终止',
  `isDelete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除',
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '渠道描述',
  `createTime` datetime(0) NOT NULL,
  `updateTime` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`channelId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dc_codelist
-- ----------------------------
DROP TABLE IF EXISTS `dc_codelist`;
CREATE TABLE `dc_codelist`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `userId` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '所属用户id',
  `codeType` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1注册，2密码找回',
  `isEffect` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态',
  `verifyCode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '验证码内容',
  `mobile` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '手机号码',
  `createTime` datetime(0) NOT NULL COMMENT '创建时间',
  `updateTime` datetime(0) NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '手机号验证码记录表（用于找回密码和注册' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dc_market
-- ----------------------------
DROP TABLE IF EXISTS `dc_market`;
CREATE TABLE `dc_market`  (
  `appId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `listorder` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `isVIP` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否为推荐,一共只有八个,不够时取普通贷超列表数据',
  `isDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=>未删除,1=>删除',
  `successNum` int(10) UNSIGNED NOT NULL DEFAULT 1256 COMMENT '成功贷款人数',
  `title` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '标题',
  `imageUrl` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '图片地址',
  `content` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '描述内容',
  `redirectUrl` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '跳转链接',
  `moneyRange` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '贷款金额限制,0=>不限制金额,1=>500-2000 ......',
  `termRange` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '贷款期限限制,0=>不限制时间,1=>15天内 ......',
  `createTime` datetime(0) NOT NULL COMMENT '添加时间',
  `updateTime` datetime(0) NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`appId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '贷超列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dc_user
-- ----------------------------
DROP TABLE IF EXISTS `dc_user`;
CREATE TABLE `dc_user`  (
  `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `isDelete` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否删除  0表示正常  1表示删除',
  `userGroup` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=>普通用户;1=>vip用户',
  `gender` tinyint(1) UNSIGNED NOT NULL DEFAULT 2 COMMENT '性别,0=>女,1=>男,2=>未知',
  `userPwd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户密码',
  `pwdCode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '密码盐',
  `workType` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '无' COMMENT '职业身份：无，个体户，上班族',
  `creditCardFlag` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否有信用卡 0无 1有',
  `deviceId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'app端登录设备id',
  `realName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户真实姓名',
  `mobile` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '手机号码',
  `idCardNo` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '身份证',
  `birthDay` date NOT NULL COMMENT '生日',
  `successNum` int(11) NOT NULL DEFAULT 0 COMMENT '成功借款次数',
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户来源',
  `createTime` datetime(0) NOT NULL COMMENT '创建时间',
  `updateTime` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  PRIMARY KEY (`userId`) USING BTREE,
  UNIQUE INDEX `mobile`(`mobile`) USING BTREE COMMENT '手机号码唯一'
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
