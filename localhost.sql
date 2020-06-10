-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `cms` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci */;
USE `cms`;

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(77) COLLATE utf8_turkish_ci DEFAULT NULL,
  `code` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `href` varchar(77) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(77) COLLATE utf8_turkish_ci DEFAULT NULL,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `user_id_fk` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fk` (`user_id_fk`),
  CONSTRAINT `category_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `category` (`id`, `name`, `code`, `href`, `title`, `parent_id`, `user_id_fk`) VALUES
(1,	'Anasayfa',	NULL,	'./',	NULL,	0,	2),
(2,	'Hakkimizda',	NULL,	'#',	'All About Us',	0,	2),
(3,	'Dersler',	NULL,	'#',	'Lessons',	0,	NULL),
(4,	'Birinci Donem Dersleri',	NULL,	'#',	'Semester-1',	3,	NULL),
(5,	'Ikinci Donem Dersleri',	NULL,	'#',	'Semester-2',	3,	NULL),
(6,	'Ucuncu Donem Dersleri',	NULL,	'#',	'Semester-3',	3,	NULL),
(7,	'Dorduncu Donem Dersleri',	NULL,	'#',	'Semester-4',	3,	NULL),
(8,	'Algoritma',	'YBİL1011',	'#',	'Algorithm',	4,	NULL),
(9,	'Teknolojinin Bilimsel Ilkeleri',	'YFİZ1009',	'#',	'Scientific Principles of Technology',	4,	NULL),
(10,	'Matematik  I',	'YMAT1053',	'#',	'Math I',	4,	NULL),
(11,	'Istatistik',	'YMAT1021',	'#',	'Stats',	4,	NULL),
(12,	'Davranış Bilimleri',	'YSOS1001',	'#',	'Behaviour Sciences',	4,	NULL),
(13,	'Temel Elektronik',	'YELT1001',	'#',	'Basic Electronics',	4,	NULL),
(14,	'Programlama Analizi ve Tasarımı',	'YBİL1107',	'#',	'Programming Analysis and Design',	4,	NULL),
(15,	'Bilgisayar Donanımı',	'YBİL1018',	'#',	'Computer Hardware',	5,	NULL),
(16,	'Matematik II',	'YMAT1054',	'#',	'Math II',	5,	NULL),
(17,	'Nümerik Analiz',	'YBİL1036',	'#',	'Numerical Analysis',	5,	NULL),
(18,	'Veri Tabanı Yönetim Sistemleri I',	'YBİL1016',	'#',	'Database Management Systems I',	5,	NULL),
(19,	'Veri Yapıları Ve Programlama',	'YBİL1012',	'#',	'Data Structures and Programming',	5,	NULL),
(20,	'Bilgisayar Ağ Sistemleri',	'YBİL2019',	'#',	'Computer Network Systems',	6,	NULL),
(21,	'Bilgisayar Yardımıyla Tasarım ve Modelleme',	'YBİL2145',	'#',	'Computer Aided Design and Modeling',	6,	NULL),
(22,	'Bilişimde Proje Yönetimi',	'YBİL2043',	'#',	'Project Management in Informatics',	6,	NULL),
(23,	'Görsel Programlama I',	'YBİL2011',	'#',	'Visual Programming',	6,	NULL),
(24,	'İnternet Programcılığı I',	'YBİL2013',	'#',	'Internet Programming I',	6,	NULL),
(25,	'İşletim Sistemleri',	'YBİL2035',	'#',	'Operating Systems',	6,	NULL),
(26,	'Veri Tabanı Yönetim Sistemleri II',	'YBİL2015',	'#',	'Database Management Systems II',	6,	NULL),
(27,	'Görüntü İşleme',	'YBİL2038',	'#',	'Image Processing',	7,	NULL),
(28,	'İnternet Programcılığı II',	'YBİL2014',	'#',	'Internet Programming II',	7,	NULL),
(29,	'Matematik Programlama',	'YBİL2084',	'#',	'Programming Mathematics',	7,	NULL),
(30,	'Mikrobilgisayar Sistemleri Ve Assembler',	'YBİL2018',	'#',	'Microcomputer Systems And Assembler',	7,	NULL),
(31,	'Sistem Analizi Ve Tasarımı',	'YBİL2078',	'#',	'System Analysis and Design',	7,	NULL),
(32,	'Staj (30 İş Günü)',	'SMYO2040',	'#',	'Internship (30 Working Days)',	7,	NULL),
(33,	'Bilgisayar Teknolojileri Bolumu',	NULL,	'#',	'Computer Technologies Department',	2,	NULL),
(34,	'Bolum Baskani',	NULL,	'#',	'Head of Department',	2,	NULL),
(35,	'Akademik Personel',	NULL,	'#',	'Academical Staff',	2,	NULL),
(36,	'Hasan Hüseyin Baş',	NULL,	'#',	NULL,	35,	NULL),
(37,	'Volkan Görege',	NULL,	'#',	NULL,	35,	NULL),
(38,	'Serap Özen',	NULL,	'#',	NULL,	35,	NULL);

DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `starting` date NOT NULL,
  `deadline` date DEFAULT NULL,
  `head` varchar(77) COLLATE utf8_turkish_ci NOT NULL,
  `body` text COLLATE utf8_turkish_ci NOT NULL,
  `status` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `typ_id_fk` int(11) unsigned NOT NULL,
  `category_id_fk` int(11) unsigned NOT NULL,
  `user_id_fk` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id_fk` (`category_id_fk`),
  KEY `user_id_fk` (`user_id_fk`),
  KEY `type_id_fk` (`typ_id_fk`),
  CONSTRAINT `content_ibfk_1` FOREIGN KEY (`category_id_fk`) REFERENCES `category` (`id`),
  CONSTRAINT `content_ibfk_2` FOREIGN KEY (`user_id_fk`) REFERENCES `user` (`id`),
  CONSTRAINT `content_ibfk_3` FOREIGN KEY (`typ_id_fk`) REFERENCES `typ` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `content` (`id`, `starting`, `deadline`, `head`, `body`, `status`, `parent_id`, `typ_id_fk`, `category_id_fk`, `user_id_fk`) VALUES
(1,	'2020-05-27',	'2020-05-30',	'ARE SEARCH RESULTS BIASED ALONG PARTISAN LINES?',	'In molestie, dolor rhoncus malesuada lobortis, nibh ex ultrices neque, sed bibendum purus elit eu augue. Donec ac dignissim velit, vitae lacinia lacus. Pellentesque mollis risus et tellus rhoncus blandit. Vestibulum vestibulum pellentesque massa non tempus. Pellentesque tristique dui nec lectus interdum, quis dapibus eros consectetur. In pharetra bibendum luctus. Maecenas in efficitur nisl, id efficitur metus. Cras gravida risus sit amet turpis cursus, ac rutrum arcu feugiat. Suspendisse sit amet eros auctor, finibus augue sit amet, varius ipsum. Maecenas et eros nec nisi fermentum auctor. Vivamus sed imperdiet eros. Aenean et placerat metus, ac sodales risus. Pellentesque lorem ante, placerat sit amet rutrum eget, pretium ut sem. Proin et est ac lacus mollis rhoncus non et mi. ',	'published',	0,	1,	1,	1),
(2,	'2020-05-27',	NULL,	'A NEW ALGORITHM TRAINS AI TO AVOID BAD BEHAVIORS',	' Etiam imperdiet et magna ut dictum. Vestibulum volutpat, eros a congue sagittis, ipsum erat vulputate justo, sed malesuada eros dolor in ex. Praesent et enim placerat, rhoncus dolor sit amet, congue leo. Sed quis libero erat. Etiam malesuada magna eget diam volutpat, quis semper quam posuere. Ut consequat dolor id tellus ultricies, ornare ultrices est hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce et pharetra elit, eu tincidunt nulla. Phasellus eu ipsum ut nisi sollicitudin venenatis in quis massa. Nullam sapien massa, euismod interdum bibendum eget, placerat quis quam.\r\n\r\nUt vitae tortor vitae nisl posuere euismod id a turpis. Etiam at lorem sed ipsum maximus maximus. Phasellus nunc libero, placerat quis risus id, finibus volutpat lectus. Aliquam vitae lectus vel erat luctus rhoncus at ut enim. Etiam aliquet turpis id mauris vulputate, at efficitur lacus lobortis. Quisque commodo libero lobortis vehicula elementum. Pellentesque ullamcorper a sapien ac maximus. Aliquam fermentum lorem ut augue condimentum, vel lobortis sapien tristique. Sed maximus, est sed efficitur sodales, lorem mi ullamcorper enim, ac accumsan neque nunc non mauris. Ut sodales ligula ipsum, ac semper nisl faucibus at. Fusce ornare in risus aliquet laoreet. ',	'unpublished',	0,	2,	2,	2),
(3,	'2020-05-28',	NULL,	'WHAT IS THE MOST EFFECTIVE WAY TO BRING AI INTO THE CLASSROOM?',	' Ut vitae tortor vitae nisl posuere euismod id a turpis. Etiam at lorem sed ipsum maximus maximus. Phasellus nunc libero, placerat quis risus id, finibus volutpat lectus. Aliquam vitae lectus vel erat luctus rhoncus at ut enim. Etiam aliquet turpis id mauris vulputate, at efficitur lacus lobortis. Quisque commodo libero lobortis vehicula elementum. Pellentesque ullamcorper a sapien ac maximus. Aliquam fermentum lorem ut augue condimentum, vel lobortis sapien tristique. Sed maximus, est sed efficitur sodales, lorem mi ullamcorper enim, ac accumsan neque nunc non mauris. Ut sodales ligula ipsum, ac semper nisl faucibus at. Fusce ornare in risus aliquet laoreet.\r\n\r\nNunc euismod fermentum quam, non egestas elit lobortis non. Donec laoreet aliquam libero nec imperdiet. Sed eu ex eget sapien efficitur ultrices. In sodales, est et tempor finibus, ligula lacus ullamcorper ligula, sit amet mattis quam elit ac dolor. Pellentesque consectetur maximus risus. Curabitur risus arcu, pellentesque id mattis a, hendrerit in mi. Vivamus id lacinia neque. Ut elit massa, egestas a faucibus vitae, maximus in ipsum. ',	'published',	0,	3,	3,	3),
(4,	'2020-05-28',	NULL,	'AN ARTIFICIAL RETINA THAT COULD HELP RESTORE SIGHT TO THE BLIND',	' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget massa sit amet sem tempor viverra vitae nec eros. Praesent at maximus quam. Fusce dignissim magna arcu, et interdum velit blandit sed. Etiam vestibulum orci tristique, laoreet orci sed, varius velit. Duis egestas placerat dolor non volutpat. Sed sit amet lectus facilisis, eleifend neque in, consectetur orci. Aenean tristique velit ligula, eu varius nulla feugiat vitae. Vestibulum tortor dui, consequat in lacinia ac, molestie non dolor. Nam id ornare sem, non auctor odio.\r\n\r\nCurabitur ac imperdiet augue. Phasellus vehicula enim vitae nibh aliquet, quis bibendum ipsum tempus. In sit amet enim lectus. Nullam in malesuada tellus, et efficitur diam. Aliquam gravida facilisis aliquet. Nam in mauris nunc. Etiam vel neque ut tortor sagittis porttitor et sit amet velit. Duis id egestas est. In finibus velit metus, eget aliquet tellus varius eget. Aenean cursus fermentum dignissim. Nunc eget elit vitae magna suscipit bibendum in a tortor. Nam in tortor in libero interdum tristique. Praesent rutrum vestibulum risus eget dignissim. Proin sit amet consequat libero, id tincidunt turpis.\r\n\r\nEtiam imperdiet et magna ut dictum. Vestibulum volutpat, eros a congue sagittis, ipsum erat vulputate justo, sed malesuada eros dolor in ex. Praesent et enim placerat, rhoncus dolor sit amet, congue leo. Sed quis libero erat. Etiam malesuada magna eget diam volutpat, quis semper quam posuere. Ut consequat dolor id tellus ultricies, ornare ultrices est hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce et pharetra elit, eu tincidunt nulla. Phasellus eu ipsum ut nisi sollicitudin venenatis in quis massa. Nullam sapien massa, euismod interdum bibendum eget, placerat quis quam. ',	'published',	0,	1,	1,	1),
(5,	'2020-05-28',	NULL,	'CAN WE MAKE IT EASIER FOR HUMANS TO COMMUNICATE CLEARLY WITH ROBOTS?',	' Curabitur ac imperdiet augue. Phasellus vehicula enim vitae nibh aliquet, quis bibendum ipsum tempus. In sit amet enim lectus. Nullam in malesuada tellus, et efficitur diam. Aliquam gravida facilisis aliquet. Nam in mauris nunc. Etiam vel neque ut tortor sagittis porttitor et sit amet velit. Duis id egestas est. In finibus velit metus, eget aliquet tellus varius eget. Aenean cursus fermentum dignissim. Nunc eget elit vitae magna suscipit bibendum in a tortor. Nam in tortor in libero interdum tristique. Praesent rutrum vestibulum risus eget dignissim. Proin sit amet consequat libero, id tincidunt turpis.\r\n\r\nEtiam imperdiet et magna ut dictum. Vestibulum volutpat, eros a congue sagittis, ipsum erat vulputate justo, sed malesuada eros dolor in ex. Praesent et enim placerat, rhoncus dolor sit amet, congue leo. Sed quis libero erat. Etiam malesuada magna eget diam volutpat, quis semper quam posuere. Ut consequat dolor id tellus ultricies, ornare ultrices est hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce et pharetra elit, eu tincidunt nulla. Phasellus eu ipsum ut nisi sollicitudin venenatis in quis massa. Nullam sapien massa, euismod interdum bibendum eget, placerat quis quam.\r\n\r\nUt vitae tortor vitae nisl posuere euismod id a turpis. Etiam at lorem sed ipsum maximus maximus. Phasellus nunc libero, placerat quis risus id, finibus volutpat lectus. Aliquam vitae lectus vel erat luctus rhoncus at ut enim. Etiam aliquet turpis id mauris vulputate, at efficitur lacus lobortis. Quisque commodo libero lobortis vehicula elementum. Pellentesque ullamcorper a sapien ac maximus. Aliquam fermentum lorem ut augue condimentum, vel lobortis sapien tristique. Sed maximus, est sed efficitur sodales, lorem mi ullamcorper enim, ac accumsan neque nunc non mauris. Ut sodales ligula ipsum, ac semper nisl faucibus at. Fusce ornare in risus aliquet laoreet.\r\n\r\nNunc euismod fermentum quam, non egestas elit lobortis non. Donec laoreet aliquam libero nec imperdiet. Sed eu ex eget sapien efficitur ultrices. In sodales, est et tempor finibus, ligula lacus ullamcorper ligula, sit amet mattis quam elit ac dolor. Pellentesque consectetur maximus risus. Curabitur risus arcu, pellentesque id mattis a, hendrerit in mi. Vivamus id lacinia neque. Ut elit massa, egestas a faucibus vitae, maximus in ipsum. ',	'published',	0,	2,	2,	2),
(6,	'2020-05-28',	NULL,	'LATE APP DEADLINE TO GRADUATE SPRING',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget massa sit amet sem tempor viverra vitae nec eros. Praesent at maximus quam. Fusce dignissim magna arcu, et interdum velit blandit sed. Etiam vestibulum orci tristique, laoreet orci sed, varius velit. Duis egestas placerat dolor non volutpat. Sed sit amet lectus facilisis, eleifend neque in, consectetur orci. Aenean tristique velit ligula, eu varius nulla feugiat vitae. Vestibulum tortor dui, consequat in lacinia ac, molestie non dolor. Nam id ornare sem, non auctor odio.\r\n\r\nCurabitur ac imperdiet augue. Phasellus vehicula enim vitae nibh aliquet, quis bibendum ipsum tempus. In sit amet enim lectus. Nullam in malesuada tellus, et efficitur diam. Aliquam gravida facilisis aliquet. Nam in mauris nunc. Etiam vel neque ut tortor sagittis porttitor et sit amet velit. Duis id egestas est. In finibus velit metus, eget aliquet tellus varius eget. Aenean cursus fermentum dignissim. Nunc eget elit vitae magna suscipit bibendum in a tortor. Nam in tortor in libero interdum tristique. Praesent rutrum vestibulum risus eget dignissim. Proin sit amet consequat libero, id tincidunt turpis.\r\n\r\nEtiam imperdiet et magna ut dictum. Vestibulum volutpat, eros a congue sagittis, ipsum erat vulputate justo, sed malesuada eros dolor in ex. Praesent et enim placerat, rhoncus dolor sit amet, congue leo. Sed quis libero erat. Etiam malesuada magna eget diam volutpat, quis semper quam posuere. Ut consequat dolor id tellus ultricies, ornare ultrices est hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce et pharetra elit, eu tincidunt nulla. Phasellus eu ipsum ut nisi sollicitudin venenatis in quis massa. Nullam sapien massa, euismod interdum bibendum eget, placerat quis quam.\r\n\r\nUt vitae tortor vitae nisl posuere euismod id a turpis. Etiam at lorem sed ipsum maximus maximus. Phasellus nunc libero, placerat quis risus id, finibus volutpat lectus. Aliquam vitae lectus vel erat luctus rhoncus at ut enim. Etiam aliquet turpis id mauris vulputate, at efficitur lacus lobortis. Quisque commodo libero lobortis vehicula elementum. Pellentesque ullamcorper a sapien ac maximus. Aliquam fermentum lorem ut augue condimentum, vel lobortis sapien tristique. Sed maximus, est sed efficitur sodales, lorem mi ullamcorper enim, ac accumsan neque nunc non mauris. Ut sodales ligula ipsum, ac semper nisl faucibus at. Fusce ornare in risus aliquet laoreet.\r\n\r\nNunc euismod fermentum quam, non egestas elit lobortis non. Donec laoreet aliquam libero nec imperdiet. Sed eu ex eget sapien efficitur ultrices. In sodales, est et tempor finibus, ligula lacus ullamcorper ligula, sit amet mattis quam elit ac dolor. Pellentesque consectetur maximus risus. Curabitur risus arcu, pellentesque id mattis a, hendrerit in mi. Vivamus id lacinia neque. Ut elit massa, egestas a faucibus vitae, maximus in ipsum. ',	'published',	0,	3,	3,	3),
(7,	'2020-05-28',	NULL,	'DISSERTATION/THESIS DEADLINE| SPRING',	'Maecenas pulvinar rhoncus lacus, quis lobortis ipsum vestibulum ut. Morbi et eros sed metus varius maximus sed pulvinar metus. Quisque ac risus quis nisl consectetur cursus dapibus sit amet turpis. Maecenas nec lacinia sapien. Aliquam sed laoreet lorem. In non sapien in ante iaculis efficitur nec vitae nunc. Sed risus massa, rhoncus vel ex consectetur, tincidunt aliquam magna. Quisque at sem eu enim aliquam finibus. Ut posuere ultrices libero, et rutrum ligula pretium a. Sed pulvinar magna vel neque tempor aliquet. Nulla accumsan congue congue. Maecenas ultricies pharetra nisl, non suscipit nisi consequat at. Maecenas nec est ligula. Quisque laoreet sollicitudin elit suscipit aliquet. Ut id ornare nisi, eget lacinia diam.\r\n\r\nProin pretium sodales nunc et aliquam. Integer molestie malesuada tristique. In eu vulputate augue, non tincidunt sem. Praesent efficitur turpis id nisi congue, eget posuere libero suscipit. Nam aliquet tellus non volutpat finibus. Nulla blandit felis sed orci aliquet dapibus. Nullam vestibulum tempor metus ut faucibus. Integer ut rhoncus metus, ac pretium neque. Fusce eu metus fringilla, pulvinar velit vitae, aliquet tellus. Maecenas ipsum justo, imperdiet at dolor tincidunt, placerat elementum nulla. Sed tristique lorem at venenatis scelerisque. ',	'published',	0,	1,	1,	1),
(8,	'2020-05-28',	NULL,	'ROBOTICS TODAY - A SERIES OF TECHNICAL TALKS',	'Proin tristique, justo vitae tristique consequat, nunc ex suscipit sapien, ac sodales erat erat sed dui. Vivamus aliquam luctus lorem, quis iaculis nisl convallis et. Suspendisse eu leo dictum, aliquam diam eu, pharetra odio. Quisque est ante, aliquet vel metus et, egestas dignissim nulla. Donec et sollicitudin nulla. Duis dolor quam, pharetra vitae molestie ut, vulputate a tortor. Vestibulum efficitur dapibus fringilla. Donec mattis eleifend nisl. Nulla euismod imperdiet ex, eu facilisis erat porta ac. Praesent aliquam nulla aliquet cursus pretium. Morbi enim justo, vulputate sed tempus nec, malesuada ut est. Nulla at pretium ligula. Ut vulputate, velit at posuere iaculis, sem purus tristique urna, et rhoncus quam magna a tortor. Suspendisse neque augue, luctus nec odio ac, fermentum efficitur ex. Maecenas ac arcu quis mi auctor facilisis non eget leo. Aliquam vitae eros consectetur, bibendum turpis in, feugiat sapien. ',	'published',	0,	2,	2,	2),
(9,	'2020-05-31',	NULL,	'HEAD',	'Vestibulum consectetur pellentesque elit, eu scelerisque dolor euismod ac. Cras non lacus quam. Duis finibus nulla ac luctus dignissim. Phasellus efficitur lacinia viverra. Phasellus nec tellus condimentum lacus imperdiet efficitur. Integer blandit augue eget velit volutpat imperdiet. Fusce sed efficitur odio. Vestibulum sagittis suscipit est id porta. Nulla tincidunt porttitor mollis. Vivamus tincidunt consequat metus, maximus dictum magna lacinia in. Nunc sit amet finibus nulla.\r\n\r\nDonec quam lorem, fringilla ut urna suscipit, faucibus congue augue. Mauris felis enim, viverra sit amet purus quis, sagittis ullamcorper diam. Aenean elementum felis nibh, vel feugiat purus tincidunt in. Sed placerat laoreet vulputate. Integer mi eros, fermentum sed sem quis, porta facilisis nulla. Etiam ut pulvinar mauris, ut tempor lorem. Phasellus porta erat sollicitudin, sagittis mauris ac, interdum massa. Quisque aliquet tincidunt lorem at interdum. Aliquam dapibus sit amet purus sit amet hendrerit. Maecenas dignissim hendrerit justo, at rutrum lorem accumsan et. In consectetur orci vitae cursus aliquet. Cras tincidunt eleifend orci sit amet mollis. Ut lacinia ipsum lacus. Fusce id libero malesuada velit aliquet fringilla id ac quam. Donec ultrices justo sed nisl mollis volutpat. ',	'published',	1,	1,	1,	2),
(10,	'2020-05-31',	NULL,	'HEAD',	'Donec porta tristique placerat. Suspendisse gravida ex eget massa commodo tincidunt. Phasellus scelerisque ac nisl maximus volutpat. Quisque hendrerit vel lectus vel luctus. Cras a nunc vitae quam dictum euismod id in dui. Ut interdum lectus ac nibh bibendum, nec laoreet nisl finibus. Proin laoreet mi ut cursus finibus. Donec ullamcorper consequat justo sit amet mattis. Aliquam eu orci ac nulla tempus lobortis. Suspendisse potenti. Morbi non tortor pharetra, lobortis nisl quis, molestie quam. ',	'published',	9,	1,	1,	2);

DROP TABLE IF EXISTS `content_tag`;
CREATE TABLE `content_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content_id_fk` int(11) unsigned NOT NULL,
  `tag_id_fk` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id_fk` (`content_id_fk`),
  KEY `tag_id_fk` (`tag_id_fk`),
  CONSTRAINT `content_tag_ibfk_1` FOREIGN KEY (`content_id_fk`) REFERENCES `content` (`id`),
  CONSTRAINT `content_tag_ibfk_2` FOREIGN KEY (`tag_id_fk`) REFERENCES `tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(33) COLLATE utf8_turkish_ci NOT NULL,
  `href` varchar(77) COLLATE utf8_turkish_ci NOT NULL,
  `content_id_fk` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id_fk` (`content_id_fk`),
  CONSTRAINT `file_ibfk_1` FOREIGN KEY (`content_id_fk`) REFERENCES `content` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(33) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `typ`;
CREATE TABLE `typ` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(33) COLLATE utf8_turkish_ci NOT NULL,
  `child_status` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `typ` (`id`, `name`, `child_status`) VALUES
(1,	'Duyuru',	'close'),
(2,	'Odev',	'open'),
(3,	'Slayt',	'close');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(33) COLLATE utf8_turkish_ci NOT NULL,
  `role` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `gender` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `level` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `image` varchar(77) COLLATE utf8_turkish_ci DEFAULT NULL,
  `url` varchar(77) COLLATE utf8_turkish_ci DEFAULT NULL,
  `bio` text COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `user` (`id`, `no`, `name`, `password`, `role`, `gender`, `level`, `image`, `url`, `bio`) VALUES
(1,	'0000000000',	'admin',	'e10adc3949ba59abbe56e057f20f883e',	'advisor',	'Beyefendi',	'1',	'src/user/2018326000.jpg',	'https://www.instagram.com/gnu',	'Donec quam lorem, fringilla ut urna suscipit, faucibus congue augue. Mauris felis enim, viverra sit amet purus quis, sagittis ullamcorper diam. Aenean elementum felis nibh, vel feugiat purus tincidunt in. Sed placerat laoreet vulputate. Integer mi eros, fermentum sed sem quis, porta facilisis nulla. Etiam ut pulvinar mauris, ut tempor lorem. Phasellus porta erat sollicitudin, sagittis mauris ac, interdum massa. Quisque aliquet tincidunt lorem at interdum. Aliquam dapibus sit amet purus sit amet hendrerit. Maecenas dignissim hendrerit justo, at rutrum lorem accumsan et. In consectetur orci vitae cursus aliquet. Cras tincidunt eleifend orci sit amet mollis. Ut lacinia ipsum lacus. Fusce id libero malesuada velit aliquet fringilla id ac quam. Donec ultrices justo sed nisl mollis volutpat.\r\n\r\nDonec porta tristique placerat. Suspendisse gravida ex eget massa commodo tincidunt. Phasellus scelerisque ac nisl maximus volutpat. Quisque hendrerit vel lectus vel luctus. Cras a nunc vitae quam dictum euismod id in dui. Ut interdum lectus ac nibh bibendum, nec laoreet nisl finibus. Proin laoreet mi ut cursus finibus. Donec ullamcorper consequat justo sit amet mattis. Aliquam eu orci ac nulla tempus lobortis. Suspendisse potenti. Morbi non tortor pharetra, lobortis nisl quis, molestie quam.\r\n\r\nPraesent eget arcu eu quam feugiat fringilla id vitae quam. Aliquam bibendum pharetra enim tincidunt elementum. Quisque eget placerat metus. Curabitur diam lorem, blandit ut ex vitae, vulputate feugiat odio. Vivamus quis lectus vel dui pulvinar mattis. Mauris quis iaculis urna. Sed arcu ipsum, maximus ultricies ex ac, ultrices accumsan nulla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse suscipit dui id dapibus vehicula. Nulla eget tempus sapien. Pellentesque venenatis nunc ut odio iaculis, quis maximus diam viverra. Donec vulputate fermentum pretium. Cras efficitur, nulla ac faucibus tempus, enim purus mollis dolor, quis tempus mauris libero at ipsum. Cras efficitur lectus ut enim feugiat congue. Mauris a libero non orci volutpat finibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. '),
(2,	'2018326046',	'musa',	'e10adc3949ba59abbe56e057f20f883e',	'advisor',	'Beyefendi',	'1',	'src/user/2018326046.jpg',	'https://www.instagram.com/gn',	'Vestibulum consectetur pellentesque elit, eu scelerisque dolor euismod ac. Cras non lacus quam. Duis finibus nulla ac luctus dignissim. Phasellus efficitur lacinia viverra. Phasellus nec tellus condimentum lacus imperdiet efficitur. Integer blandit augue eget velit volutpat imperdiet. Fusce sed efficitur odio. Vestibulum sagittis suscipit est id porta. Nulla tincidunt porttitor mollis. Vivamus tincidunt consequat metus, maximus dictum magna lacinia in. Nunc sit amet finibus nulla. '),
(3,	'2018326020',	'serdar',	'e10adc3949ba59abbe56e057f20f883e',	'user',	'Beyefendi',	'1',	'src/user/male.jpg',	NULL,	NULL),
(4,	'2018326045',	'umut',	'e10adc3949ba59abbe56e057f20f883e',	'user',	'Beyefendi',	'1',	'src/user/female.jpg',	NULL,	NULL),
(5,	'2018326033',	'ibrahim',	'e10adc3949ba59abbe56e057f20f883e',	'user',	'Beyefendi',	'1',	'src/user/female.jpg',	NULL,	NULL),
(6,	'2018326044',	'halil',	'e10adc3949ba59abbe56e057f20f883e',	'user',	'Beyefendi',	'1',	'src/user/2018326043.jpg',	'https://www.instagram.com/gnusnotunix',	'Proin tristique, justo vitae tristique consequat, nunc ex suscipit sapien, ac sodales erat erat sed dui. Vivamus aliquam luctus lorem, quis iaculis nisl convallis et. Suspendisse eu leo dictum, aliquam diam eu, pharetra odio. Quisque est ante, aliquet vel metus et, egestas dignissim nulla. Donec et sollicitudin nulla. Duis dolor quam, pharetra vitae molestie ut, vulputate a tortor. Vestibulum efficitur dapibus fringilla. Donec mattis eleifend nisl. Nulla euismod imperdiet ex, eu facilisis erat porta ac. Praesent aliquam nulla aliquet cursus pretium. Morbi enim justo, vulputate sed tempus nec, malesuada ut est. Nulla at pretium ligula. Ut vulputate, velit at posuere iaculis, sem purus tristique urna, et rhoncus quam magna a tortor. Suspendisse neque augue, luctus nec odio ac, fermentum efficitur ex. Maecenas ac arcu quis mi auctor facilisis non eget leo. Aliquam vitae eros consectetur, bibendum turpis in, feugiat sapien. ');

-- 2020-05-31 20:11:24
