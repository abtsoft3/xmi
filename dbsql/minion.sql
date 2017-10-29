/*
MySQL Backup
Source Server Version: 5.5.5
Source Database: minion_coin
Date: 28/10/2017 04:00:22
*/


-- ----------------------------
--  Table structure for `tbl_deposit`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_deposit`;
CREATE TABLE `tbl_deposit` (
  `id_transaction_deposit` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '0.0',
  `tx_id` varchar(100) DEFAULT NULL,
  `eth_address` varchar(100) DEFAULT NULL,
  `amount_spend` decimal(10,8) NOT NULL DEFAULT '0.00000000',
  `date_time_spend` datetime NOT NULL,
  `spend_status` int(11) DEFAULT NULL,
  `operator_status` int(11) DEFAULT NULL,
  `date_time_operator_read` datetime DEFAULT NULL,
  `owner_read_status` int(11) DEFAULT NULL,
  `date_time_owner_read` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaction_deposit`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tbl_earning`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_earning`;
CREATE TABLE `tbl_earning` (
  `id_earnings_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaction_deposit` int(11) NOT NULL,
  `earning_amount` decimal(10,8) NOT NULL,
  `earning_date` datetime NOT NULL,
  `percentage_earning` int(11) NOT NULL,
  `earning_type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_earnings_transaction`)
) ENGINE=InnoDB AUTO_INCREMENT=1141 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tbl_operator`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_operator`;
CREATE TABLE `tbl_operator` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tbl_register`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_register`;
CREATE TABLE `tbl_register` (
  `username` varchar(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `userEmail` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ethereum_address` varchar(100) NOT NULL,
  `question` varchar(50) NOT NULL,
  `answer_question` varchar(50) NOT NULL,
  `upline` varchar(40) NOT NULL DEFAULT 'NONE',
  `last_login` datetime DEFAULT NULL,
  `register_time` datetime DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tbl_temp_earnings`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_temp_earnings`;
CREATE TABLE `tbl_temp_earnings` (
  `id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `date_until_ico` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tbl_with_draw`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_with_draw`;
CREATE TABLE `tbl_with_draw` (
  `id_withdraw` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `amount_withdraw` float NOT NULL,
  `eth_addr` varchar(100) DEFAULT NULL,
  `date_time_req_wdw` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_acc_wdw` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `owner_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_withdraw`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `tbl_operator` VALUES ('operator','21232f297a57a5a743894a0e4a801fc3','2017-10-27 18:48:34');
