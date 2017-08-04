/*
SQLyog Ultimate v10.41 
MySQL - 5.5.5-10.1.21-MariaDB : Database - db_cismart_v3
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_cismart_v3` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_cismart_v3`;

/*Table structure for table `airport` */

DROP TABLE IF EXISTS `airport`;

CREATE TABLE `airport` (
  `airport_iata_cd` varchar(3) NOT NULL,
  `airport_nm` varchar(39) NOT NULL,
  `airport_region` varchar(24) NOT NULL,
  PRIMARY KEY (`airport_iata_cd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `airport` */

insert  into `airport`(`airport_iata_cd`,`airport_nm`,`airport_region`) values ('123','AIRPORT TEST','Test Location2'),('AAS','Apalapsili','Yalimo'),('ABU','Atambua','Haliwen'),('ADL','Adelaide','Adelaide'),('AEG','Aek Godang','Padang Sidempuan'),('AGD','Anggi','Manokwari'),('AHI','Amahai','Maluku Tengah'),('AKL','Auckland Internasional','Auckland'),('AKQ','Astra Ksetra','Menggala'),('AMI','Selaparang','Mataram'),('AMM','Queen Alia International','Amman'),('AMQ','Pattimura','Ambon'),('AMS','Schiphol International','Amsterdam'),('ARD','Mali','Alor'),('ARJ','Arso','Arso'),('AUH','Abu Dhabi Internasional','Abu Dhabi'),('AYW','Ayawasi','Maybrat'),('BDJ','Syamsuddin Noor','Banjarmasin'),('BDO','Husein Sastranegara','Bandung'),('BEJ','Kalimarau','Tanjung Redeb'),('BIK','Frans Kaisiepo','Biak'),('BJG','Mopait','Kota Mobagu'),('BJW','Padhameleda/Soa','Bajawa'),('BKI','Kota Kinabalu International','Kota Kinabalu'),('BKK','Suvarnabhumi','Bangkok'),('BKS','Fatmawati Soekarno','Kota Bengkulu'),('BMU','Muhammad Salahuddin','Bima'),('BNE','Brisbane International','Brisbane'),('BOM','Chhatrapati Shivaji Chhatrapati Shivaji','Bombay'),('BPN','Sepinggan','Balikpapan'),('BRT','BARITA','PARBABA'),('BTH','Hang Nadim','Batam'),('BTJ','Sultan Iskandar Muda','Banda Aceh'),('BTK','Sanggu','Buntok'),('BTW','Bersujud/Batulicin','Batulicin'),('BUI','Bokondini','Tolikara'),('BUW','Beto Ambari','Bau Bau'),('BWW','Blimbingsari','Banyuwangi'),('BWX','Belimbingsari','Banyuwangi'),('BXB','Babo','Teluk Bintoni'),('BXD','Bade','Mappi'),('BXM','Batom','Pegunungan Bintang'),('BXT','Bontang','Bontang'),('BYQ','Bunyu','P.Bunyu'),('CAI','Cairo Intl','Cairo'),('CAN','Guangzhou Baiyun International','Guangzhou'),('CBN','Chakrabuwana','Cirebon'),('CDG','Paris-Charles De Gaulle','Paris'),('CGK','Soekarno - Hatta','Jakarta'),('CMB','Bandaranaike International','Colombo'),('CNS','Cairns Airport','Australia'),('CPF','Ngloram','Cepu'),('CXD','Waikabubak','Waikabubak'),('CXP','Tunggul Wulung','Cilacap'),('DEL','Indira Gandhi','Delhi'),('DEX','Nop Goliath Dekai Yahukimo','Yahukimo'),('DJB','Sultan Thaha Syaifuddin','Jambi'),('DJJ','Sentani','Jayapura'),('DME','Domodedovo International','Domodedovo'),('DMK','Don Mueang International','Bangkok Dmk'),('DOB','Dobo/Raw Gwammar','Kepulauan Aru'),('DOH','Doha International','Doha'),('DPS','Ngurah Rai','Bali'),('DRH','Dabra','Mamberamo Hulu'),('DTB','Silangit','Siborong-borong'),('DTD','Datah Dawai','Long Pahangai'),('DUM','Pinang Kampai','Dumai'),('DXB','Dubai International','Dubai'),('ELR','Elelim','Yalimo'),('ENE','H.Hasan Aroeboesman','Ende'),('EWE','Ewer','Merauke'),('EWI','Enarotali','Paniai'),('FKQ','Torea','Fak-fak'),('FLW','Flores','Mbai'),('FLZ','Dr. Ferdinand Lumban Tobing/Pinangsori','Tapanuli Tengah'),('FOC','Fuzhou Changle International','Fuzhou'),('FOO','Numfoor/Kemiri','Numfoor'),('FRA','Frankfurt','Frankfurt'),('GEB','Gebe','Halmahera'),('GLX','Gamarmalamo','Galela'),('GNS','Binaka','Gunung Sitoli'),('GTO','Djalaluddin','Gorontalo'),('HAN','Hanoi International Airort','Hanoi'),('HGH','Xiaoshan','Hangzhou'),('HKG','Hongkong International','Hongkong'),('HKT','Phuket International','Phuket'),('HLP','Halim Perdanakusuma','Jakarta'),('HND','Tokyo Haneda International','Haneda'),('ICN','Incheon International','Incheon'),('ILA','Ilaga','Ilaga'),('INX','Inanwantan','Sorong Selatan'),('IPH','Ipoh Airport','Ipoh'),('IST','Ataturk International','Istanbul'),('IUL','Illu','Puncak Jaya'),('JBB','Noto Hadinegoro','Jember'),('JED','King Abdul Aziz International','Jeddah'),('JFK','John F. Kennedy New York','New York'),('JHB','Senai International','Johor Baru'),('JOG','Adi Sucipto','Yogyakarta'),('KAZ','Kuabang','Kao'),('KBF','Karubaga','Karubaga'),('KBU','Stagen','Kotabaru'),('KBX','Kambuaya','Ayamaru'),('KCD','Kamur','Kamur'),('KDI','Halu Oleo','Kendari'),('KEI','Kepi','Mappi'),('KEQ','Kebar','Tambrauw'),('KIX','Kansai International','Osaka'),('KMM','Kimam','Merauke'),('KNG','Utarom','Kaimana'),('KNO','Kuala Namu','Medan'),('KOD','Kota Bangun','Kutai Kertanegara'),('KOE','El Tari','Kupang'),('KOX','Kokonao','Mimika Barat'),('KRC','Depati Parbo','Kerinci'),('KTG','Rahadi Osman','Ketapang'),('KUL','Kuala Lumpur Internasional','Kuala Lumpur'),('KWB','Dewadaru','Karimun Jawa'),('KWI','Kuwait International','Kuwait City'),('LAH','Oesman Sadik','Labuha'),('LAX','Los Angeles','Los Angeles'),('LBJ','Komodo','Labuhan Bajo'),('LBW','Yuvai Semaring','Long Bawan'),('LHI','Lereh','Keerom'),('LHR','London Heathrow','London'),('LII','Mulia','Puncak Jaya'),('LKA','Gewayantana','Larantuka'),('LLG','Silampari','Lubuk Linggau'),('LLN','Kelila','Pegunungan Bintang'),('LOP','Lombok Internasional','Praya, Lombok'),('LPU','Long Apung','Kayan Selatan'),('LSW','Malikus Saleh','Lhokseumawe'),('LSX','Lhok Sukon','Lhok Sukon'),('LUV','Dumatubun','Langgur'),('LUW','Syukuran Aminudin Amir','Luwuk'),('LWE','Wunopito','Lewoleba'),('LYK','Lunyuk','Sumbawa'),('MAA','Chennai','Chennai'),('MAL','Falabisahaya','Mangole'),('MCT','Muscat International','Muscat'),('MDC','Sam Ratulangi','Manado'),('MED','Prince Mohammad Bin Abdulaziz','Medinah'),('MEL','Tullamarine Airport','Melbourne'),('MEM','Memphis International Airport','Memphis'),('MEQ','Cut Nyak Dhien','Nagan Raya'),('MES','Polonia','Medan'),('MJU','Mamuju','Tampa Padang'),('MKQ','Mopah','Merauke'),('MKW','Rendani','Manokwari'),('MKZ','Mallaca International','Malaka'),('MLG','Abdul Rachman Saleh','Malang'),('MLK','Melalan','Melak'),('MLN','Robert Atty Bessing','Malinau'),('MNA','Melangguane','Melangguane'),('MNL','Ninoy Aquino International','Manila'),('MOF','Wai Oti','Maumere'),('MPC','Muko-Muko','Muko Muko'),('MRB','Bandar Udara Muara Bungo','Bungo'),('MUF','Muting','Muting'),('MWK','Matak','Tarempa'),('MXB','Andi Jemma','Masamba'),('NAH','Naha','Tahuna'),('NAM','Namlea/Namniwel','Namlea'),('NBX','Nabire','Nabire'),('NDA','Bandaneira','Pulau Banda'),('NKD','Sinak','Puncak Jaya'),('NKM','Nagoya','Nagoya'),('NNG','Nanning Wuxu International','Nanning'),('NNX','Nunukan','Nunukan'),('NPO','Nanga Pinoh','Nanga Pinoh'),('NRE','Namrole','Namrole'),('NRT','Narita International','Narita'),('NTI','Bintuni','Bintuni'),('NTX','Ranai','Natuna'),('OBD','Obano','Nabire'),('OKL','Oksibil/Gunung Bintang','Oksibil'),('OKQ','Okaba','Puncak Jaya'),('ONI','Paniai','Moanamani'),('OTI','Pitu','Morotai'),('OYG','Moyo','Moyo'),('PCB','Pondok Cabe','Jakarta'),('PDG','Minangkabau','Padang Pariaman'),('PDO','Pendopo','Pendopo'),('PEK','Beijing Capital International','Beijing'),('PEN','Penang International','Penang'),('PER','Perth International','Perth'),('PGK','Depati Amir','Pangkal Pinang'),('PKN','Iskandar','Pangkalan Bun'),('PKU','Sultan Syarif Kasim II','Pekan Baru'),('PKY','Tjilik Riwut','Palangkaraya'),('PLM','Sultan Mahmud Badaruddin II','Palembang'),('PLW','Mutiara','Palu'),('PNK','Supadio','Pontianak'),('POM','Jacksons-Port Moresby','Papua Nugini'),('PPJ','Pulau Panjang','Kepulauan Seribu'),('PPR','Pasir Pangaraian','Pasir Pangaraian'),('PSJ','Kasiguncu','Poso'),('PSU','Pangsuma','Putu Sibau'),('PUM','Pomala/Sangia Ni Bandera','Kolaka'),('PVG','Shanghai Pudong International','Pudong'),('RAQ','Sugimanuru','Muna'),('RDE','Merdey','Merdey'),('RGT','Japura','Rengat'),('RKO','ROKOT','SIPORA'),('RNU','Banding Agung','Ranau'),('RSK','Abresso','Ransiki'),('RTG','Frans Sales Lega','Ruteng'),('RTI','Lekunik/David Constantijn Saudale','Rote'),('RUF','Yuruf','Keerom'),('RUH','Riyadh King Khaled International','Riyadh'),('SAH','Sana`A International','Sana\'A'),('SAU','Terdamu','Pulau Sawu'),('SBG','Maimun Saleh','Sabang'),('SEQ','Sei Salari/Sungai Pakning','Bengkalis'),('SGN','Tan Son Nhat International','Southeast Asia'),('SGQ','Sangkimah','Sangata'),('SHA','Shanghai Hongqiao International Airport','Shanghai'),('SIQ','Dabo','Singkep'),('SIW','Sibisa','Parapat'),('SKL','Singkil/Syekh Hamzah Fansury','Singkil'),('SLY','H. Aroeppala','Selayar'),('SMQ','H. Asan','Sampit'),('SNB','Lasikin','Sinabang'),('SOC','Adi Sumarmo','Solo'),('SOQ','Domine Eduard Osok','Kota Sorong'),('SQG','Susilo','Sintang'),('SQN','Emalamo','Sanana'),('SQR','Soroako','Soroako'),('SRG','Achmad Yani','Semarang'),('SRI','Temindung','Samarinda'),('SUB','Juanda','Surabaya'),('SUP','Trunojoyo','Sumenep'),('SWQ','Brangbiji/Sultan Muhammad Kaharuddin II','Sumbawa Besar'),('SXK','Olilit','Saumlaki'),('SYD','Sydney Kingsford Smith','Sydney'),('SZB','Sultan Abdul Aziz Shah','Subang'),('SZX','Baoan Intl','Shenzhen'),('TAX','Bobong','Taliabu'),('TBM','Tumbang Samba','Katingan'),('TIM','Moses Kilangin','Timika / Tembagapura'),('TJB','Seibati','Tanjung Balai Karimun'),('TJG','Tanjung Warukin','Tanjung Warukin'),('TJQ','H. A. S. Hanandjoeddin','Tanjung Pandan'),('TJS','Tanjung Selor','Tanjung Harapan'),('TKG','Radin Inten II','Bandar Lampung'),('TLI','Lalos','Toli-toli'),('TMC','Waikabubak','Tambolaka'),('TMH','Tanah Merah','Tanah Merah'),('TMY','Tiom','Jayawijaya'),('TNB','Tanah Grogot','Tanah Grogot'),('TNJ','Raja Haji Fisabilillah','Tanjung Pinang'),('TPE','Taiwan Taoyuan International','Taipei'),('TPK','Teuku Cut Ali','Tapak Tuan'),('TQQ','Maranggo','Tomia'),('TRK','Juwata','Tarakan'),('TSV','Townsville','Townsville'),('TSX','Tanjung Santan','Marang Kayu'),('TSY','Wiridinata','Tasikmalaya'),('TTE','Sultan Babullah','Ternate'),('TTR','Pongtiku','Tana Toraja'),('UBR','Ubrub','Keerom'),('UGU','Bilorai/Sugapa','Sugapa'),('UOL','Buol/Pogogul','Buol'),('UPG','Sultan Hasanuddin','Ujung Pandang / Makassar'),('WAR','Waris','Keerom'),('WET','Waghete','Deiyai'),('WGP','Umbu Mehang Kuda','Waingapu'),('WHI','Wahai','Pulau Seram'),('WMX','Wamena','Wamena'),('WNI','Matahora','Wangi-Wangi'),('WSR','Wasior','Wasior'),('WUB','Buli','Maba'),('XMN','Gaoqi Xiamen International','Xiamen'),('ZEG','Senggo','Mappi'),('ZRI','Sudjarwo Tjondronegoro','Serui'),('ZRM','Orai','Sarmi');

/*Table structure for table `artikel` */

DROP TABLE IF EXISTS `artikel`;

CREATE TABLE `artikel` (
  `artikel_id` int(11) NOT NULL AUTO_INCREMENT,
  `artikel_title` varchar(50) DEFAULT NULL,
  `content` text,
  `author` varchar(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `mdb` int(11) DEFAULT NULL,
  `mdd` date DEFAULT NULL,
  PRIMARY KEY (`artikel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `artikel` */

insert  into `artikel`(`artikel_id`,`artikel_title`,`content`,`author`,`category_id`,`mdb`,`mdd`) values (1,'Lorem Kdls','dskdjskd sdnsdnsm ','Djskds',1,2,'2017-02-20'),(3,'Sasjkas Ask','jskasjka ','Skasa',2,2,'2017-02-20');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_nm` varchar(50) DEFAULT NULL,
  `mdb` int(11) DEFAULT NULL,
  `mdd` date DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_nm`,`mdb`,`mdd`) values (1,'percobaan1',2,'2016-07-15'),(2,'percobaan2',2,'2016-07-15'),(3,'percobaan',2,'2016-07-15');

/*Table structure for table `com_menu` */

DROP TABLE IF EXISTS `com_menu`;

CREATE TABLE `com_menu` (
  `nav_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `portal_id` int(11) unsigned DEFAULT NULL,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `nav_title` varchar(50) DEFAULT NULL,
  `nav_desc` varchar(100) DEFAULT NULL,
  `nav_url` varchar(100) DEFAULT NULL,
  `nav_no` int(11) unsigned DEFAULT NULL,
  `active_st` enum('1','0') DEFAULT '1',
  `display_st` enum('1','0') DEFAULT '1',
  `nav_icon` varchar(50) DEFAULT NULL,
  `mdb` int(11) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`nav_id`),
  KEY `FK_com_menu_p` (`portal_id`),
  CONSTRAINT `FK_com_menu_p` FOREIGN KEY (`portal_id`) REFERENCES `com_portal` (`portal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `com_menu` */

insert  into `com_menu`(`nav_id`,`portal_id`,`parent_id`,`nav_title`,`nav_desc`,`nav_url`,`nav_no`,`active_st`,`display_st`,`nav_icon`,`mdb`,`mdd`) values (1,1,0,'Home','Selamat Datang','settings/adminwelcome',1,'1','1',NULL,1,'2011-11-28 11:39:00'),(2,1,0,'Settings','Pengaturan','settings/adminportal',2,'1','1',NULL,1,'2011-11-28 11:45:06'),(3,1,2,'Application','Pengaturan aplikasi','-',21,'1','1',NULL,1,'2011-11-28 13:16:54'),(4,1,3,'Web Portal','Pengelolaan web portal','settings/adminportal',211,'1','1',NULL,1,'2011-11-28 13:17:34'),(5,1,3,'Users','Pengelolaan pengguna','settings/adminuser',212,'1','1',NULL,1,'2011-11-28 13:21:10'),(6,1,3,'Roles','Pengelolaan hak akses','settings/adminrole',213,'1','1',NULL,1,'2011-11-28 13:21:36'),(7,1,3,'Navigation','Pengelolaan menu','settings/adminmenu',214,'1','1',NULL,1,'2011-11-28 13:22:03'),(8,1,3,'Permissions','Pengelolaan hak akses pengguna','settings/adminpermissions',215,'1','1',NULL,1,'2011-11-28 13:22:30'),(9,1,3,'Preferences','Pengelolaan preferences','settings/adminpreferences',216,'1','0',NULL,1,'2011-11-28 13:23:39'),(10,2,0,'Dashboard','Dashboard','operator/welcome',1,'1','1','fa-dashboard',1,'2016-05-02 13:43:45'),(11,2,0,'Master Data','Master Data','#',2,'1','1','fa-database',1,'2016-05-02 15:04:27'),(12,2,11,'Kategori','Kategori','master/category',1,'1','1',NULL,1,'2016-05-02 15:04:45'),(14,2,13,'Tiket.com','Tiket.com','api/tiketcom',1,'1','1',NULL,1,'2016-05-26 09:49:36'),(15,2,11,'Berita','Modul Publishing Berita','master/berita',22,'1','1','fa-commenting-o',1,'2017-02-20 10:26:11'),(16,2,0,'Sinkronisasi PD DIKTI','Sinkronisasi PD DIKTI','#',3,'1','1','fa-bank',1,'2017-03-29 10:08:54'),(17,2,16,'Data Mahasiswa','Data Mahasiswa','syncpddikti/mhs',31,'1','1','fa-user',1,'2017-03-29 10:10:21'),(18,2,0,'Security','Enkripsi File','#',5,'1','1','fa-lock',1,'2017-04-19 10:09:03'),(19,2,18,'Enkripsi File','Enkripsi File','security/encryption',41,'1','1','fa-file-archive-o',1,'2017-04-19 10:09:58'),(20,2,18,'Dekripsi File','Dekripsi File','security/decryption',42,'1','1','fa-expeditedssl',1,'2017-05-10 10:47:08'),(21,2,0,'Miscellaneous','miscellaneous feature','#',5,'1','1','fa-get-pocket',1,'2017-05-12 09:00:00'),(22,2,21,'Import data backup RKAKL','Import data backup RKAKL','misc/importrkakl',51,'1','1','fa-edit',1,'2017-05-12 09:01:07');

/*Table structure for table `com_portal` */

DROP TABLE IF EXISTS `com_portal`;

CREATE TABLE `com_portal` (
  `portal_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `portal_nm` varchar(50) DEFAULT NULL,
  `site_title` varchar(100) DEFAULT NULL,
  `site_desc` varchar(100) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `mdb` int(11) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`portal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `com_portal` */

insert  into `com_portal`(`portal_id`,`portal_nm`,`site_title`,`site_desc`,`meta_desc`,`meta_keyword`,`mdb`,`mdd`) values (1,'Administrator Portal','CiSmart 3.0 Administrator Site',NULL,NULL,NULL,1,'2013-07-11 10:57:05'),(2,'Application Portal','Portal Aplikasi','Application Description','Meta','Keyword',1,'2016-05-02 11:30:38');

/*Table structure for table `com_preferences` */

DROP TABLE IF EXISTS `com_preferences`;

CREATE TABLE `com_preferences` (
  `pref_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pref_group` varchar(50) DEFAULT NULL,
  `pref_nm` varchar(50) DEFAULT NULL,
  `pref_value` varchar(255) DEFAULT NULL,
  `mdb` int(11) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`pref_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `com_preferences` */

insert  into `com_preferences`(`pref_id`,`pref_group`,`pref_nm`,`pref_value`,`mdb`,`mdd`) values (1,'encryption','key','r4h4514d0nk',99,'2017-04-19 11:37:53'),(2,'encryption','file_ext','.ekopcrypt',99,'2017-04-19 11:39:26');

/*Table structure for table `com_role` */

DROP TABLE IF EXISTS `com_role`;

CREATE TABLE `com_role` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `portal_id` int(11) unsigned DEFAULT NULL,
  `role_nm` varchar(50) DEFAULT NULL,
  `role_desc` varchar(100) DEFAULT NULL,
  `default_page` varchar(50) DEFAULT NULL,
  `mdb` int(11) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  KEY `FK_com_role_p` (`portal_id`),
  CONSTRAINT `FK_com_role_p` FOREIGN KEY (`portal_id`) REFERENCES `com_portal` (`portal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `com_role` */

insert  into `com_role`(`role_id`,`portal_id`,`role_nm`,`role_desc`,`default_page`,`mdb`,`mdd`) values (1,1,'System Administrator','Hak akses administrator sistem (developer)','settings/adminwelcome',1,'2013-07-11 10:58:57'),(2,2,'Administrator Database','Hak akses untuk administrator database','operator/welcome',NULL,NULL);

/*Table structure for table `com_role_menu` */

DROP TABLE IF EXISTS `com_role_menu`;

CREATE TABLE `com_role_menu` (
  `role_id` int(11) unsigned NOT NULL,
  `nav_id` int(11) unsigned NOT NULL,
  `role_tp` varchar(4) NOT NULL DEFAULT '1111',
  PRIMARY KEY (`nav_id`,`role_id`),
  KEY `FK_com_role_menu_r` (`role_id`),
  CONSTRAINT `FK_com_role_menu_m` FOREIGN KEY (`nav_id`) REFERENCES `com_menu` (`nav_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_com_role_menu_r` FOREIGN KEY (`role_id`) REFERENCES `com_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_role_menu` */

insert  into `com_role_menu`(`role_id`,`nav_id`,`role_tp`) values (1,1,'1111'),(1,2,'1111'),(1,3,'1111'),(1,4,'1111'),(1,5,'1111'),(1,6,'1111'),(1,7,'1111'),(1,8,'1111'),(1,9,'1111'),(2,10,'1111'),(2,11,'1111'),(2,12,'1111'),(2,15,'1111'),(2,16,'1111'),(2,17,'1111'),(2,18,'1111'),(2,19,'1111'),(2,20,'1111'),(2,21,'1111'),(2,22,'1111');

/*Table structure for table `com_role_user` */

DROP TABLE IF EXISTS `com_role_user`;

CREATE TABLE `com_role_user` (
  `role_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `FK_com_role_user_r` (`role_id`),
  CONSTRAINT `FK_com_role_user_r` FOREIGN KEY (`role_id`) REFERENCES `com_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_com_role_user_u` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_role_user` */

insert  into `com_role_user`(`role_id`,`user_id`) values (1,1),(2,2);

/*Table structure for table `com_user` */

DROP TABLE IF EXISTS `com_user`;

CREATE TABLE `com_user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_key` varchar(50) DEFAULT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `lock_st` enum('1','0') DEFAULT '0',
  `mdb` int(11) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `com_user` */

insert  into `com_user`(`user_id`,`user_name`,`user_pass`,`user_key`,`user_mail`,`lock_st`,`mdb`,`mdd`) values (1,'userdemo','23kOfW3KlT9HtZDYA3MkizGPboppfWf0b0S/ogqf0jV2gGXqI4KfV56X2RJ01vNoU9fInOjH1N31/0QZohNVWA==','1883219921','welly.wsp@excelindo.co.id','0',1,'2013-07-11 13:02:40'),(2,'operator','t3eeIl1NnlBhXVp/6Gm54NUTKn2w/5wy6pdu5hsiikLUpRGlSIopBAdQuwisTikOx36GXQ6NFxQdaswkjNUOFg==','-676943999','lyan.p@excelindo.co.id','0',1,'2016-05-02 13:20:04');

/*Table structure for table `com_user_login` */

DROP TABLE IF EXISTS `com_user_login`;

CREATE TABLE `com_user_login` (
  `user_id` int(11) unsigned NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`login_date`),
  CONSTRAINT `FK_com_user_login` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_user_login` */

insert  into `com_user_login`(`user_id`,`login_date`,`logout_date`,`ip_address`) values (1,'2013-07-11 12:10:54','2013-07-11 14:12:17','127.0.0.1'),(1,'2016-05-02 11:28:40',NULL,'::1'),(1,'2016-05-26 09:48:41',NULL,'::1'),(1,'2016-06-03 09:41:06',NULL,'::1'),(1,'2016-06-24 08:02:30','2016-06-24 08:04:27','::1'),(1,'2017-02-20 10:13:07','2017-02-20 10:48:14','::1'),(1,'2017-04-19 10:06:46','2017-04-19 10:10:16','::1'),(1,'2017-05-04 08:53:14',NULL,'::1'),(1,'2017-05-10 10:45:39',NULL,'::1'),(1,'2017-05-12 08:57:59','2017-05-12 10:56:04','::1'),(1,'2017-05-15 08:11:14','2017-05-15 08:12:00','::1'),(2,'2016-05-02 13:49:20','2016-05-02 13:50:45','::1'),(2,'2016-05-03 08:06:57',NULL,'::1'),(2,'2016-05-26 09:56:26',NULL,'::1'),(2,'2016-06-03 08:59:58','2016-06-03 09:00:39','::1'),(2,'2016-06-06 10:03:07',NULL,'::1'),(2,'2016-06-24 08:01:12','2016-06-24 08:06:46','::1'),(2,'2016-07-14 16:10:00',NULL,'::1'),(2,'2016-07-15 08:21:54','2016-07-15 09:45:47','::1'),(2,'2017-02-20 10:16:24','2017-02-20 10:57:55','::1'),(2,'2017-02-21 08:20:30','2017-02-21 15:39:51','::1'),(2,'2017-03-29 10:07:20','2017-03-29 17:02:32','::1'),(2,'2017-03-30 07:44:56',NULL,'::1'),(2,'2017-03-31 10:30:12','2017-03-31 16:13:53','::1'),(2,'2017-04-19 10:06:04','2017-04-19 10:06:25','::1'),(2,'2017-04-28 16:39:29',NULL,'::1'),(2,'2017-05-03 09:33:49',NULL,'::1'),(2,'2017-05-10 10:44:45','2017-05-10 10:45:24','::1'),(2,'2017-05-12 08:57:08','2017-05-12 17:00:52','::1'),(2,'2017-05-15 08:25:05','2017-05-15 08:51:52','::1'),(2,'2017-05-16 08:00:36','2017-05-16 16:12:50','::1'),(2,'2017-05-22 10:37:09',NULL,'::1');

/*Table structure for table `com_user_super` */

DROP TABLE IF EXISTS `com_user_super`;

CREATE TABLE `com_user_super` (
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `FK_com_user_super` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `com_user_super` */

insert  into `com_user_super`(`user_id`) values (1);

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(5) NOT NULL,
  `siswa_nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tahun_masuk` varchar(4) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` enum('petani','pedagang','pns','swasta','wirausaha','lainnya') DEFAULT NULL,
  `pekerjaan_ibu` enum('petani','pedagang','pns','swasta','wirausaha','ibu rumah tangga') DEFAULT NULL,
  `mdb` int(10) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`siswa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `mdb` int(11) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `FK_users` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`nama_lengkap`,`alamat`,`no_telp`,`mdb`,`mdd`) values (1,'Welly Widodo Sindu Putra','JL. Mawar No 2 Jenggawah Jember','081358290279',1,'2013-07-11 13:02:40'),(2,'Lyan Dwi Pangestu','Jalan Pesanggrahan','10939395949',1,'2016-05-02 13:20:04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
