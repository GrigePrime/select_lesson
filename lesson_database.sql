-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2023-11-01 13:27:43
-- 伺服器版本： 8.0.31
-- PHP 版本： 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `lesson_database`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ccm`
--

DROP TABLE IF EXISTS `ccm`;
CREATE TABLE IF NOT EXISTS `ccm` (
  `CCM_num` int NOT NULL AUTO_INCREMENT,
  `CCm_id` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '學號',
  `CCM_grade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '學生系級',
  `CCM_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CCM_credit` int DEFAULT NULL COMMENT '已選學分',
  `CMM_course` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '已選課程',
  PRIMARY KEY (`CCM_num`),
  KEY `CCm_id` (`CCm_id`),
  KEY `CCM_num` (`CCM_num`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ccm`
--

INSERT INTO `ccm` (`CCM_num`, `CCm_id`, `CCM_grade`, `CCM_name`, `CCM_credit`, `CMM_course`) VALUES
(1, 'D1090420', '資訊三甲', '林易威', 20, '1420,1421,1422,1423,1437,1440,1456,3093'),
(2, 'D1123345', '會計一丙', '錢坍', 14, '0097,0099,0100,0101,0102,0103,0104,0105,0106,3673'),
(3, 'D0946585', '航太二乙', '宋凝芳', 19, '1857,1858,1859,1861,1862,1863,1864,3781');

-- --------------------------------------------------------

--
-- 資料表結構 `course_data`
--

DROP TABLE IF EXISTS `course_data`;
CREATE TABLE IF NOT EXISTS `course_data` (
  `course_num` int NOT NULL AUTO_INCREMENT,
  `course_id` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '選課代號',
  `course_SN` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '課程編碼',
  `course_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '課程名',
  `course_teacher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '教授者',
  `course_credit` int NOT NULL DEFAULT '0' COMMENT '學分',
  `couse_RE` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '必修' COMMENT '必修/選修',
  `course_style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '課堂教學' COMMENT '上課方式',
  `course_quota` int NOT NULL COMMENT '開課名額',
  `course_quotaPick` int DEFAULT NULL COMMENT '實際選課人數',
  `course_garde` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '開課系級',
  `course_room1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `course_room2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `course_room3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `course_time01` int DEFAULT NULL,
  `course_time02` int DEFAULT NULL,
  `course_time03` int DEFAULT NULL,
  `course_note` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '備註',
  PRIMARY KEY (`course_num`),
  KEY `course_num` (`course_num`,`course_id`),
  KEY `course_SN` (`course_SN`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `course_data`
--

INSERT INTO `course_data` (`course_num`, `course_id`, `course_SN`, `course_name`, `course_teacher`, `course_credit`, `couse_RE`, `course_style`, `course_quota`, `course_quotaPick`, `course_garde`, `course_room1`, `course_room2`, `course_room3`, `course_time01`, `course_time02`, `course_time03`, `course_note`) VALUES
(1, '1437', 'IECS346', '軟體工程實務', '許懷中', 3, '選修', '課堂上課', 70, 65, '資訊三甲', '工319(電腦實習室)', NULL, NULL, 306, 307, 308, NULL),
(2, '1234', 'TEST001', '測試管理與實務', '泰斯婷', 100, '測試', '課堂上課', 100, 99, '測試四甲', '測102', NULL, NULL, 114, NULL, NULL, NULL),
(4, '4090', 'NVIDIA4090', '顯示卡設計概論', '黃仁勳', 5, '選修', '課堂上課', 70, 0, '電子四乙', '電通303', NULL, NULL, 205, 305, 405, NULL),
(5, '1421', 'IECS301', '作業系統(一)', '林志敏', 3, '必修', '課堂上課', 74, 74, '資訊三甲', '資電404', NULL, NULL, 107, 408, 409, NULL),
(6, '1422', 'IECS212', '微處理機系統', '張哲誠', 3, '必修', '課堂上課', 69, 69, '資訊三甲', '資電105', '資電248', NULL, 108, 503, 504, NULL),
(7, '1423', 'IECS213', '微處理機系統實習', '張哲誠', 1, '必修', '課堂上課', 69, 69, '資訊三甲', '資電248', NULL, NULL, 508, 509, 510, NULL),
(8, '1440', 'IECS349', '資料科學實務', '許懷中', 3, '選修', '課堂上課', 60, 50, '資訊三甲', '土302(電腦實習室)', NULL, NULL, 202, 203, 204, NULL),
(9, '1420', 'LC062', '實用職場英文', '李欣怡', 2, '必修', '課堂上課', 60, 59, '資訊三甲', '資電103 ', NULL, NULL, 406, 407, NULL, NULL),
(10, '1456', 'IECS478', '深度學習', '林峰正', 3, '選修', '課堂上課', 72, 48, '資訊四甲', '資電234(電腦實習室)', NULL, NULL, 102, 103, 104, NULL),
(11, '3093', 'GEG1006', '永續生態旅遊', '楊惠玲', 2, '選修', '課堂上課', 75, 75, '全球氣候變遷與永續發展', '語105', NULL, NULL, 506, 507, NULL, NULL),
(12, '0868', 'IINE1805', '人工智慧導論', '魏旻柔', 2, '選修', '課堂上課', 76, 76, '創能學院綜合班', '圖213_程式實作', NULL, NULL, 111, 112, NULL, NULL),
(13, '9481', 'BOYI8181', '青菜拒絕實務', '吳柏逸主席', 3, '選修', '躍遷通訊線上上課', 81, 18, '拉尼亞凱亞超星系團譴責青菜委員會', '室女超星系團本星系群銀河系左旋臂太陽系第三行星地球', NULL, NULL, 999, NULL, NULL, NULL),
(14, '3823', 'ECON1011', '經濟學導論', '吳紀瑩', 1, '選修', '線上教學', 60, 38, '商學院綜合班', '未排教室', NULL, NULL, NULL, NULL, NULL, '齊一課程'),
(15, '0103', 'ECON1001', '經濟學(一)', '何思賢', 3, '必修', '課堂上課', 70, 60, '會計一丙', '語405', NULL, NULL, 202, 203, 204, '須隨班修習「經濟學(一)實習」'),
(16, '0104', 'ECON1001P', '經濟學(一)實習', NULL, 0, '必修', '課堂上課', 70, 60, '會計一丙', '商203', NULL, NULL, 409, 410, NULL, '須隨班修習「經濟學(一)」'),
(17, '0097', 'GEID0010', '班級活動', '黃娟娟', 0, '必修', '課堂上課', 60, 54, '會計一丙', '商305', NULL, NULL, 108, 109, NULL, NULL),
(18, '0099', 'GEG2000', '現代公民與社會實踐', '蕭育和', 2, '必修', '課堂上課', 60, 60, '會計一丙', '語301', NULL, NULL, 306, 307, NULL, NULL),
(19, '0100', 'IINE1001', '程式邏輯與應用', '周澤捷', 1, '必修', '課堂教學', 60, 60, '會計一丙', '圖213_程式實作', NULL, NULL, 303, NULL, NULL, NULL),
(20, '0101', 'ACCT1011', '會計學(一)', '黃娟娟', 3, '必修', '課堂教學', 55, 55, '會計一丙', '商309', NULL, NULL, 206, 207, 208, '須隨班修習「會計學(一)實習」課'),
(21, '0102', 'ACCT1011P', '會計學(一)實習', '鄭雅君', 0, '必修', '課堂教學', 55, 55, '會計一丙', '商305', NULL, NULL, 106, 107, NULL, '須隨班修習「會計學(一)」正課'),
(22, '0105', 'MATH1005P', '微積分(一)實習', NULL, 0, '必修', '課堂教學', 70, 70, '會計一丙', '語405', NULL, NULL, 201, NULL, NULL, NULL),
(23, '0106', 'MATH1005', '微積分(一)', '方瓊菀', 3, '必修', '課堂教學', 70, 70, '會計一丙', '語301', NULL, NULL, 308, 309, 310, NULL),
(24, '3673', 'MILT1035', '國防科技', '袁翌祥,嚴明德', 1, '必修', '課堂教學', 138, 138, '會計一丙', '航B102', NULL, NULL, 503, 504, NULL, NULL),
(25, '1857', 'GEID0010', '班級活動', '楊瑞彬', 0, '必修', '課堂教學', 60, 56, '航太二乙', '人407', NULL, NULL, 208, NULL, NULL, NULL),
(26, '1858', 'ENGS2011', '工程數學(一)', '李育佐', 3, '必修', '課堂教學', 75, 75, '航太二乙', '科航204', NULL, NULL, 308, 403, 404, NULL),
(27, '1859', 'ENGS2001', '材料力學(一)', '郭文雄', 2, '必修', '課堂教學', 75, 74, '航太二乙', '科航204', NULL, NULL, 306, 307, NULL, NULL),
(28, '1861', 'AERO2003', '熱力學(一)', '葉俊良', 3, '必修', '課堂教學', 76, 76, '航太二乙', '科航204', NULL, NULL, 102, 103, 104, NULL),
(29, '1862', 'ENGS1009', '應用力學(二)', '楊瑞彬', 3, '必修', '課堂教學', 75, 67, '航太二乙', '人407', '科航205', NULL, 209, 210, 309, NULL),
(30, '1863', 'AERO2012', '飛機次系統', '曹家祥', 2, '選修', '課堂教學', 74, 74, '航太二乙', '科航204', NULL, NULL, 111, 112, NULL, NULL),
(31, '1864', 'AERO2027', '線性代數', '李育佐', 3, '選修', '課堂教學', 60, 54, '航太二乙', '科航202', NULL, NULL, 106, 107, 108, NULL),
(32, '3781', 'AERO2008', '電腦輔助工程-SolidWorks', '方俊', 3, '必修', '課堂教學', 60, 59, '航太二乙', '科航504', NULL, NULL, 411, 412, 413, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `rules`
--

DROP TABLE IF EXISTS `rules`;
CREATE TABLE IF NOT EXISTS `rules` (
  `rules_num` int NOT NULL AUTO_INCREMENT,
  `rules_depart` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '系所',
  `rules_grade` int NOT NULL DEFAULT '1' COMMENT '年級',
  `rules_class` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '必修課(選課代號)',
  `rules_MAX_credit` int NOT NULL DEFAULT '30' COMMENT '最高學分',
  `rules_min_credit` int NOT NULL DEFAULT '9' COMMENT '最低學分',
  PRIMARY KEY (`rules_num`),
  KEY `rules_num` (`rules_num`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `rules`
--

INSERT INTO `rules` (`rules_num`, `rules_depart`, `rules_grade`, `rules_class`, `rules_MAX_credit`, `rules_min_credit`) VALUES
(1, '資訊', 3, '1420,1421,1422,1423', 30, 9),
(2, '會計', 1, '0097,0099,0100,0101,0102,0103,0104,0105,0106,3673', 25, 14),
(3, '航太', 2, '1857,1858,1859,1861,1862,3781', 30, 14);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_num` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`user_num`),
  KEY `user_account` (`user_id`),
  KEY `user_num` (`user_num`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_num`, `user_id`, `user_pw`) VALUES
(0, 'D1051058', '$2y$10$mhFQn/KIrALQHDmiVYKYW.VcvE/uXl0b9q6KWY7X9uGNpoQAxgBtO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
