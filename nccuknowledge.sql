-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2015 at 06:47 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nccuknowledge`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE IF NOT EXISTS `achievement` (
`achID` int(11) NOT NULL,
  `achName` varchar(10) NOT NULL,
  `achDesc` varchar(50) NOT NULL,
  `achRes1` int(11) DEFAULT NULL,
  `achRes2` int(11) DEFAULT NULL,
  `achRes3` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`achID`, `achName`, `achDesc`, `achRes1`, `achRes2`, `achRes3`) VALUES
(1, '初心者', '回答題目總數達到5題', 1, 1, 1),
(2, '初心者二', '回答題目總數達到30題', 1, 1, 1),
(3, '初心者三', '回答題目總數達到50題', 1, 1, 1),
(4, '見習生', '答對5題以上', 1, 1, 1),
(5, '見習生二', '答對30題以上', 1, 1, 1),
(6, '見習生三', '答對50題以上', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `memberID` int(11) NOT NULL,
  `formalID` int(11) NOT NULL,
  `answerCorrect` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `formalquestion`
--

CREATE TABLE IF NOT EXISTS `formalquestion` (
`formalID` int(11) NOT NULL,
  `formalQues` varchar(80) NOT NULL,
  `formalAns` char(4) NOT NULL,
  `formalCat` char(5) NOT NULL,
  `formalAns1` varchar(20) NOT NULL,
  `formalAns2` varchar(20) NOT NULL,
  `formalAns3` varchar(20) NOT NULL,
  `formalAns4` varchar(20) NOT NULL,
  `formalAnsch1` int(11) NOT NULL DEFAULT '0',
  `formalAnsch2` int(11) NOT NULL DEFAULT '0',
  `formalAnsch3` int(11) NOT NULL DEFAULT '0',
  `formalAnsch4` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formalquestion`
--

INSERT INTO `formalquestion` (`formalID`, `formalQues`, `formalAns`, `formalCat`, `formalAns1`, `formalAns2`, `formalAns3`, `formalAns4`, `formalAnsch1`, `formalAnsch2`, `formalAnsch3`, `formalAnsch4`) VALUES
(1, '莊皓鈞老師和周彥君老師不愧是夫妻，連口頭禪都一樣，請問他們共同的口頭禪是什麼呢？ ', 'D', '政大', '還有沒有什麼其他的想', '不要聽學長姐亂說', 'Exactly', 'Make sense', 13, 9, 2, 11),
(2, '富者越富，貧者越貧是產業競合策略中老師提到的重要現象，根據此現象，班上哪位同學累積財富的速度最快？', 'A', '政大', '李立晟', '林子洋', '張良碩', '蕭博修', 6, 0, 0, 0),
(3, '在電子設備、機房中放置一包乖乖能夠使設備運作正常是著名的都市傳說，在跟資管所103級一起上課時，哪一位同學也有相同的效果？', 'B', '政大', '黃泓銘', '莊迪凱', '呂奕勳', '賴柏帆', 1, 2, 0, 0),
(4, '我們都知道台灣的總統是馬英九，請問政大現在的校長是？\r\n', 'C', '政大', '吳思樺', '周景陽', '周行一 ', '蔣公銅像', 1, 0, 1, 0),
(5, '忘東忘西在所難免，但誰曾因為把學生證弄丟，而登上政大交流版？', 'A', '政大', 'H輝', '麥兜', '亦安', '耀賢', 3, 2, 0, 0),
(6, '請問四五的叉燒煎蛋飯，售價是多少元？', 'D', '政大', '65', '70', '75', '80', 0, 0, 1, 0),
(7, '在政治大學資管所的碩一中，請問誰最常受到有錢人的霸凌？', 'D', '政大', '瑞克', '良碩', '水牛伯', '以上皆是', 0, 0, 0, 2),
(8, '請問以下哪一間店，位在波波恰恰的隔壁？\r\n', 'C', '政大', '美味香', '巧味香', '美香味', '美佳香', 2, 1, 0, 0),
(9, 'PTT棒球版上看到lo33必噓，但lo33除了發廢文以外，尚有投球的功能，請問其投球姿勢為何？', 'A', '政大', '側投', '左投', '大投', '右投', 1, 3, 0, 0),
(10, '請問哪一位同學樂於助人，自願擔任下一屆共識營的總召？', 'D', '政大', '余柱', '碩鼠', '水牛伯', '麥兜', 0, 1, 0, 0),
(11, '交換禮物最重要的是心意，誰曾經因為以3M掛勾當作禮物，而遭到大家的譴責？', 'C', '政大', '欣穎', '子洋', '修維', '博修', 1, 0, 1, 0),
(12, '政大學生常以公車為主要交通工具，請問哪一條路線沒有經過政大？', 'A', '政大', '236', '251', '282', '530', 0, 0, 1, 0),
(13, '政大資管好處多多，請問哪一家店沒有提供相關優惠？ ', 'C', '政大', '四川', '樂山食堂', '港味食堂', '金鰭日式料理', 1, 0, 0, 1),
(14, '誰常以服務創新電子報記者的身分，胡亂捏造同學的不實消息？', 'A', '政大', '水牛伯', 'lo33', '迪凱', '祖韵', 2, 0, 0, 0),
(15, '天有比翼鳥，地有連理枝，玉輝有？', 'D', '政大', '正妹', '仁柏', '瑞克', 'Dell', 1, 0, 0, 1),
(16, '政大資管FB的聊天群組全名為何？', 'C', '政大', '恩西西油恩哀欸死一靈山普類萬艾瑞亞', '恩西西優恩哀欸屎一靈山普類萬艾瑞亞', '恩西西優恩哀欸死一靈山普類萬艾瑞亞', '恩西西優恩哀欸屎一靈山普雷萬艾瑞亞', 2, 0, 0, 0),
(17, '請問Lo33最常在哪一個版出沒?', 'D', '政大', 'Stupid', 'sex', 'Gossiping', 'Baseball', 2, 0, 0, 2),
(18, '政大是一個社團多元發展的環境，學生在課業之餘能夠嘗試豐富的課後活動，請問周彥君老師是哪一個社團的指導老師?', 'B', '政大', '咕嚕咕嚕美食社', '彩妝社', '熱音社', '烏克麗麗社', 1, 1, 0, 0),
(19, '請問常見的I❤TP 的logo是甚麼的縮寫?', 'C', '政大', '我愛國產豬', '我愛梁定澎老師', '我愛臺北', '我愛台電', 1, 0, 1, 0),
(20, '根據於ptt興起的黃金公式「地名+人名」，請問將張修為帶入此公式後的解為?', 'D', '政大', '彰化水牛伯', '政大張修維', '萬華劉德華', '桃園金城武', 0, 0, 0, 2),
(21, '蔡耀賢在烏克麗麗社叱吒風雲，負責烏克麗麗的採購，報帳時需要統編，請問下列何者是正確的政大統一編號?', 'A', '政大', '03807654', '45002931', '03734301', '46804804', 5, 0, 0, 0),
(22, '何者不是人生勝利組的同義詞?', 'B', '政大', '紅毛晟', 'pollo', 'pavone', '溫拿', 2, 0, 1, 0),
(23, '請問資管所103級中，哪一位同學對中央資管全體仇深似海?', 'A', '政大', '黃書韋', '陳俊維', '萬恩福', '衛瀟', 1, 1, 0, 0),
(24, '政大資管所碩一麥兜有資料庫小神豬之稱，請問麥兜幾公斤？', 'B', '政大', '70kg', '80kg', '90kg', '100kg', 0, 1, 0, 0),
(25, '政大人文社會及商學院為台灣頂尖的殿堂，請問政大校訓為何？', 'A', '政大', '親愛精誠', '自強不息', '敦品 厲學 愛國', '質樸堅強', 2, 0, 0, 0),
(26, '政大性別比例與其他學校比較一直都有懸殊差別，請問103級碩一男女比例是多少(只算目前在學有註冊)？', 'B', '政大', '10%', '12%', '15%', '18%', 0, 1, 0, 0),
(27, '修維是資管碩一的人生勝利組，請問在哪裡認識未成年的另一半？', 'D', '政大', '西華飯店', 'W Taipei', 'Taipei MUSE', '華國飯店', 1, 0, 0, 4),
(28, '林王鵝肉為政大必嘗美食之一，每個月一號有免費的活動，請問他鵝肉飯一碗多少錢(正常大小的鵝肉飯)？', 'C', '政大', '70元', '80元', '95元', '110元', 0, 1, 0, 0),
(29, '苑守慈老師是政大資管教書非常認真，學生也非常愛戴的老師，請問他最不喜歡學生做什麼事？', 'D', '政大', '運動', '遲到', '不回信', '偷找實習', 1, 0, 0, 0),
(30, '請問研方老師最愛唱哪首歌？', 'A', '政大', '天父的花園', '天母的花園', '中華民國頌', '政大校歌', 1, 0, 0, 0),
(31, '103級政大資管所資管組考試正取第一名是？', 'D', '政大', '曾玉輝', '林子洋', '廖廷毅', '王祖韵', 1, 0, 0, 0),
(32, '政大IP是哪一個網域？', 'C', '政大', '118', '112', '119', '116', 0, 1, 0, 0),
(33, '請問下列何建設不位於文山區？', 'C', '政大', '政治大學松香步道', '政治大學蔣公銅像', '政治大學公企中心', '政治大學水岸電梯', 0, 0, 1, 0),
(34, '請問政大不包含？', 'D', '政大', '政治大學資訊管理學系碩士班', '政治大學科技管理與智慧財產研究所', '政治大學國際經營管理碩士學程', '政治大學行政管理碩士學程', 1, 0, 1, 1),
(35, '請問政大不具有下列何中心？', 'C', '政大', '附設公務人員教育中心', '華語文教學中心', '推廣教育中心', '創新育成中心', 0, 0, 1, 0),
(36, '請問下列何者與其他三個選項最不相關？', 'C', '政大', '李有仁教授', '政大資管系主任', '政大商學院院長', '中興大學校長候選人', 0, 0, 1, 0),
(37, '請問下列何者非憩賢樓餐廳？', 'A', '政大', '林王鵝肉', '四海遊龍', '多益自助餐', '金盃美而美', 2, 1, 0, 0),
(38, '依據政大資管修克規章，請問下列何課程與其他三者分屬不同學門？', 'A', '政大', '企業模式創新', '資訊管理理論', '服務科學與服務創新', '產業競合策略與社會網絡資本', 1, 1, 1, 1),
(39, '請問下列何者與「李立晟」最不相關？', 'D', '政大', '溫拿', '權貴', '學霸', '魯蛇', 0, 0, 0, 1),
(40, '請問下列何者與「王祖韵」最不相關？ ', 'B', '政大', '苑守慈', '蔡英文', '黃麗玲', '周彥君', 0, 1, 0, 0),
(41, '對「彭仁柏」而言，請問下列何者與其他三者最不相關？', 'A', '政大', '絲瓜', '金鰭', '芭樂', '重訓', 0, 0, 0, 0),
(42, '鋼之煉金術之中，鍊成賢者之石的材料是？', 'B', '娛樂', '金瓜石', '人類', '面膜', '鑽石', 2, 1, 1, 1),
(43, ' 知名手機遊戲廣告台詞「一拉一放」，下句為何？', 'B', '娛樂', '通體舒暢', '爽感爆表', '改變成真', '謝謝指教', 2, 4, 0, 0),
(44, '立晟是鄧紫棋的小迷弟，卻發現忘了《泡沫》的歌詞，請大家幫幫他，請問：「美麗的泡沫 雖然一剎花火。你所有承諾 雖然都太脆弱。愛本是泡沫 XXXXXX。」應填入？', 'A', '娛樂', '如果能夠看破', '如果能夠看透', '如果能夠看跛', '如果能夠看夠', 1, 0, 0, 0),
(45, '下列哪個代表稱讚的意思？', 'A', '娛樂', 'pavone', 'pollo', '魯蛇', 'ㄈㄓ ', 3, 0, 0, 0),
(46, '玩命關頭是近代飆車系列電影的先鋒，請問七集的故事時間軸先後順序為何?', 'C', '娛樂', '1234567', '1574236 ', '1245637 ', '1342567', 0, 0, 1, 0),
(47, '中華一番是最近突然又爆紅的動畫，請問及第師傅在原著漫畫中的原名是?', 'D', '娛樂', '及第', '義美', '三傑', '丁油', 3, 0, 0, 1),
(48, '第四季中國好聲音即將開播，請問下列何者是全新的台灣歌手導師?', 'A', '娛樂', '周杰倫', '蔡依林', '林俊傑', '蕭敬騰', 2, 0, 0, 0),
(49, '台灣職業英雄聯盟電競隊伍TPA拿下S2冠軍後，外界爭相報導是台灣的電競元年，請問是哪一年發生的事?', 'C', '娛樂', '2010', '2011', '2012', '2013', 1, 1, 0, 0),
(50, '小當家在中華一番中炒出許多好料理，請問哪一道是他所煮過的菜餚?', 'B', '娛樂', '黃金開口笑', '宇宙大燒賣', '龍鬚麵', '火焰餃子', 0, 1, 1, 0),
(51, '火影完結篇使眾多粉絲都哭了，請問最後鳴人跟誰在一起生了小孩? ', 'C', '娛樂', '佐助', '小櫻', '雛田', '綱手', 0, 0, 4, 0),
(52, '小朋友齊打交是大家小時後電玩的回憶，請問下列何者不是十隻鬥士的名字?', 'D', '娛樂', 'Davis', 'Henry', 'Louis', 'Jojo', 1, 0, 0, 0),
(53, '神奇寶貝是Game Boy中很熱門的一款遊戲，請問哪一款是最早的版本? ', 'A', '娛樂', '皮卡丘版', '紅版', '銀版', '綠寶石', 1, 2, 0, 0),
(54, '海賊王是JUMP周刊最暢銷的連載漫畫，海賊王迷都知道他開始連載的年份，請問是從幾年開始連載的?', 'D', '娛樂', '1990', '1993', '1995', '1997', 1, 0, 0, 0),
(55, '禁果，是指亞當和夏娃受到惡魔誘惑偷吃了蘋果，請問是在以下哪一個果園？', 'B', '科普', '圓明園', '伊甸園', '動物園', '明華園', 1, 1, 0, 0),
(56, '請問下列何者非調酒中常用的基酒？', 'C', '科普', '琴酒', '伏特加', '奶酒', '龍舌蘭', 0, 0, 3, 0),
(57, '漫畫《獵人》裡面，庫拉皮卡的眼睛變成紅色的時候，會變成什麼類型的念能力者？', 'D', '娛樂', '操作系', '變化系', '萌系', '特質系', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`memberID` int(11) NOT NULL,
  `memberAccount` varchar(30) NOT NULL,
  `memberPwd` varchar(10) NOT NULL,
  `memberPic` varchar(50) DEFAULT NULL,
  `memberName` varchar(10) NOT NULL,
  `memberRes1` int(11) NOT NULL DEFAULT '0',
  `memberRes2` int(11) NOT NULL DEFAULT '0',
  `memberRes3` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `memberAccount`, `memberPwd`, `memberPic`, `memberName`, `memberRes1`, `memberRes2`, `memberRes3`) VALUES
(1, 'maido@maido', '0000', NULL, '麥兜', 0, 0, 0),
(2, 'question8142@gmail.com', '123', NULL, '123', 0, 0, 0),
(3, 'admin@admin', 'admin', NULL, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `memberach`
--

CREATE TABLE IF NOT EXISTS `memberach` (
  `memberID` int(11) NOT NULL,
  `achID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tempquestion`
--

CREATE TABLE IF NOT EXISTS `tempquestion` (
`tempID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `tempQues` varchar(80) NOT NULL,
  `tempAns` char(4) NOT NULL,
  `tempCat` char(5) NOT NULL,
  `tempAns1` varchar(20) NOT NULL,
  `tempAns2` varchar(20) NOT NULL,
  `tempAns3` varchar(20) NOT NULL,
  `tempAns4` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tempquestion`
--

INSERT INTO `tempquestion` (`tempID`, `memberID`, `tempQues`, `tempAns`, `tempCat`, `tempAns1`, `tempAns2`, `tempAns3`, `tempAns4`) VALUES
(1, 1, '哈哈哈', '1', 'XD', '哈', '嘿', '呵', '吼');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
 ADD PRIMARY KEY (`achID`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`memberID`,`formalID`), ADD KEY `memberID` (`memberID`), ADD KEY `formalID` (`formalID`), ADD KEY `memberID_2` (`memberID`), ADD KEY `formalID_2` (`formalID`), ADD KEY `memberID_3` (`memberID`), ADD KEY `formalID_3` (`formalID`), ADD KEY `memberID_4` (`memberID`), ADD KEY `formalID_4` (`formalID`), ADD KEY `memberID_5` (`memberID`), ADD KEY `formalID_5` (`formalID`), ADD KEY `memberID_6` (`memberID`), ADD KEY `memberID_7` (`memberID`), ADD KEY `formalID_6` (`formalID`), ADD KEY `formalID_7` (`formalID`), ADD KEY `memberID_8` (`memberID`), ADD KEY `formalID_8` (`formalID`), ADD KEY `formalID_9` (`formalID`), ADD KEY `formalID_10` (`formalID`), ADD KEY `memberID_9` (`memberID`), ADD KEY `formalID_11` (`formalID`), ADD KEY `memberID_10` (`memberID`);

--
-- Indexes for table `formalquestion`
--
ALTER TABLE `formalquestion`
 ADD PRIMARY KEY (`formalID`), ADD UNIQUE KEY `formalID_3` (`formalID`), ADD KEY `formalID` (`formalID`), ADD KEY `formalID_2` (`formalID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`memberID`), ADD UNIQUE KEY `memberID` (`memberID`), ADD KEY `memberID_2` (`memberID`);

--
-- Indexes for table `memberach`
--
ALTER TABLE `memberach`
 ADD PRIMARY KEY (`memberID`,`achID`), ADD KEY `memberID` (`memberID`), ADD KEY `achID` (`achID`), ADD KEY `achID_2` (`achID`);

--
-- Indexes for table `tempquestion`
--
ALTER TABLE `tempquestion`
 ADD PRIMARY KEY (`tempID`), ADD UNIQUE KEY `tempID` (`tempID`), ADD KEY `tempID_2` (`tempID`), ADD KEY `Temp_Member_FK` (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
MODIFY `achID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `formalquestion`
--
ALTER TABLE `formalquestion`
MODIFY `formalID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tempquestion`
--
ALTER TABLE `tempquestion`
MODIFY `tempID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
ADD CONSTRAINT `answer_formalquestion_FK` FOREIGN KEY (`formalID`) REFERENCES `formalquestion` (`formalID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `answer_member_FK` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `memberach`
--
ALTER TABLE `memberach`
ADD CONSTRAINT `memberach_member_FK` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `memverach_achievement_FK` FOREIGN KEY (`achID`) REFERENCES `achievement` (`achID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempquestion`
--
ALTER TABLE `tempquestion`
ADD CONSTRAINT `Temp_Member_FK` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
