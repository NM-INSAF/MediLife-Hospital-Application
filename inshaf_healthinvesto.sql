-- Adminer 4.8.1 MySQL 8.3.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tb_appointment`;
CREATE TABLE `tb_appointment` (
  `A_id` int NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `r_name` text NOT NULL,
  `r_phone` varchar(10) NOT NULL,
  `r_address` text NOT NULL,
  `r_date` date NOT NULL,
  `r_time` time NOT NULL,
  `bill` float NOT NULL,
  PRIMARY KEY (`A_id`),
  KEY `doc_id` (`doc_id`),
  CONSTRAINT `tb_appointment_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `tb_doc` (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `tb_available`;
CREATE TABLE `tb_available` (
  `id` int NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `available_date` date NOT NULL,
  `available_time_start` time NOT NULL,
  `available_time_end` time NOT NULL,
  `patient_count` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `doc_id` (`doc_id`),
  CONSTRAINT `tb_available_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `tb_doc` (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_available` (`id`, `doc_id`, `available_date`, `available_time_start`, `available_time_end`, `patient_count`) VALUES
(1,	'd_001',	'2024-03-27',	'10:00:00',	'00:00:00',	0),
(2,	'd_002',	'2024-03-28',	'11:00:00',	'00:00:00',	0),
(3,	'd_002',	'2024-03-29',	'10:00:00',	'00:00:00',	0),
(4,	'd_004',	'2024-03-30',	'13:00:00',	'00:00:00',	0),
(5,	'd_003',	'2024-03-31',	'14:00:00',	'00:00:00',	0),
(7,	'd_001',	'2024-03-29',	'16:17:54',	'16:17:54',	0);

DROP TABLE IF EXISTS `tb_doc`;
CREATE TABLE `tb_doc` (
  `doc_id` varchar(10) NOT NULL,
  `doc_name` text NOT NULL,
  `doc_phone` varchar(10) NOT NULL,
  `doc_address` text NOT NULL,
  `doc_special` varchar(10) NOT NULL,
  `fee` float NOT NULL,
  PRIMARY KEY (`doc_id`),
  UNIQUE KEY `doc_phone` (`doc_phone`),
  KEY `doc_special` (`doc_special`),
  CONSTRAINT `tb_doc_ibfk_1` FOREIGN KEY (`doc_special`) REFERENCES `tb_special` (`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_doc` (`doc_id`, `doc_name`, `doc_phone`, `doc_address`, `doc_special`, `fee`) VALUES
('d_001',	'Emily Johnson',	'0771234567',	'123 Oak Street, Colombo, Sri Lanka',	'sp_38',	1400),
('d_002',	'Michael Smith',	'0779876543',	'456 Maple Avenue, Kandy, Sri Lanka',	'sp_13',	0),
('d_003',	'Sarah Lee',	'0775555555',	'789 Elm Street, Galle, Sri Lanka',	'sp_13',	3000),
('d_004',	'Dr. David Brown',	'0773217890',	'987 Pine Road, Negombo, Sri Lanka',	'sp_35',	0),
('d_005',	'Dr. Jennifer Patel',	'0778765432',	'654 Birch Lane, Jaffna, Sri Lanka',	'sp_32',	0),
('d_006',	'shaheelshah',	'123456',	'argda',	'sp_25',	1200);

DROP TABLE IF EXISTS `tb_session`;
CREATE TABLE `tb_session` (
  `SID` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `token` varchar(32) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `userAgent` text NOT NULL,
  `active` int NOT NULL,
  PRIMARY KEY (`SID`),
  KEY `uid` (`uid`),
  CONSTRAINT `tb_session_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tb_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_session` (`SID`, `uid`, `token`, `ip`, `userAgent`, `active`) VALUES
(1,	1,	'9305ea416595fb9cbc3be86a09183369',	'10.11.8.218',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',	1),
(6,	1,	'17e3ae27856f4bcf05ee3c96e82cbe65',	'10.11.8.218',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',	1),
(7,	3,	'77ebe1039396bdfda5cc951b572d83a0',	'10.11.8.218',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',	1),
(8,	1,	'e767450ce600b5d52ab3d415840bd25b',	'10.11.8.218',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',	1),
(9,	1,	'efd2b30fef5863333e29c196cd5e93b7',	'10.11.8.218',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',	1),
(10,	1,	'09a4c122e154a073eb596f08a243258b',	'10.11.8.218',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',	1);

DROP TABLE IF EXISTS `tb_special`;
CREATE TABLE `tb_special` (
  `sp_id` varchar(10) NOT NULL,
  `sp_name` text NOT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_special` (`sp_id`, `sp_name`) VALUES
('sp_1',	'Accident and emergency medicine'),
('sp_10',	'Clinical radiology'),
('sp_11',	'Dental, oral and maxillo-facial surgery'),
('sp_12',	'Dermato-venerology'),
('sp_13',	'Dermatology'),
('sp_14',	'Endocrinology'),
('sp_15',	'Gastro-enterologic surgery'),
('sp_16',	'Gastroenterology'),
('sp_17',	'General hematology'),
('sp_18',	'General Practice'),
('sp_19',	'General surgery'),
('sp_2',	'Allergology'),
('sp_20',	'Geriatrics'),
('sp_21',	'Immunology'),
('sp_22',	'Infectious diseases'),
('sp_23',	'Internal medicine'),
('sp_24',	'Laboratory medicine'),
('sp_25',	'Maxillo-facial surgery'),
('sp_26',	'Microbiology'),
('sp_27',	'Nephrology'),
('sp_28',	'Neuro-psychiatry'),
('sp_29',	'Neurology'),
('sp_3',	'Anaesthetics'),
('sp_30',	'Neurosurgery'),
('sp_31',	'Nuclear medicine'),
('sp_32',	'Obstetrics and gynecology'),
('sp_33',	'Occupational medicine'),
('sp_34',	'Ophthalmology'),
('sp_35',	'Orthopaedics'),
('sp_36',	'Otorhinolaryngology'),
('sp_37',	'Paediatric surgery'),
('sp_38',	'Paediatrics'),
('sp_39',	'Pathology'),
('sp_4',	'Biological hematology'),
('sp_40',	'Pharmacology'),
('sp_41',	'Physical medicine and rehabilitation'),
('sp_42',	'Plastic surgery'),
('sp_43',	'Podiatric Medicine'),
('sp_44',	'Podiatric Surgery'),
('sp_45',	'Psychiatry'),
('sp_46',	'Public health and Preventive Medicine'),
('sp_47',	'Radiology'),
('sp_48',	'Radiotherapy'),
('sp_49',	'Respiratory medicine'),
('sp_5',	'Cardiology'),
('sp_50',	'Rheumatology'),
('sp_51',	'Stomatology'),
('sp_52',	'Thoracic surgery'),
('sp_53',	'Tropical medicine'),
('sp_54',	'Urology'),
('sp_55',	'Vascular surgery'),
('sp_56',	'Venereology'),
('sp_6',	'Child psychiatry'),
('sp_7',	'Clinical biology'),
('sp_8',	'Clinical chemistry'),
('sp_9',	'Clinical neurophysiology');

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `Fullname` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` enum('Male','female') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tb_user` (`user_id`, `Fullname`, `Address`, `phone`, `gender`, `email`, `password`) VALUES
(1,	'',	'142/1,main street, Oluvil',	'0750492778',	'Male',	'shaheelshah@gmail.com',	'$2y$09$Nn7TxQrB4oFIVqwKmQ6mDOBI6OkHGACepcMxtbXLYXTRumthvIvZW'),
(2,	'',	'142/1,main',	'',	'Male',	'asdf@gami.com',	'$2y$09$su8wFbVl2bzKd1CPOwikzeIXXQqubL/y45EaDZ9ceI5YM9OjSz.MC'),
(3,	'',	'adsfasf',	'24',	'Male',	'sadf@gsad.om',	'$2y$09$twgHm8i36AOt70tItYiqn.ZKuaVcQIqihclnxLcwXgskSCSaSt5zm');

-- 2024-03-31 17:45:49
