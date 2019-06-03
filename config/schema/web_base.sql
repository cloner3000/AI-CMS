-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 03, 2019 at 06:21 PM
-- Server version: 5.7.25
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl_phinxlog`
--

CREATE TABLE `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acl_phinxlog`
--

INSERT INTO `acl_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20141229162641, 'CakePhpDbAcl', '2019-03-26 04:50:51', '2019-03-26 04:50:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `status`, `name`, `sort`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 0, NULL, 0, 1, 170),
(2, 1, NULL, NULL, 'Error', 1, NULL, 0, 2, 3),
(3, 1, NULL, NULL, 'Pages', 1, NULL, 0, 4, 7),
(4, 3, NULL, NULL, 'display', 1, NULL, 0, 5, 6),
(5, 1, NULL, NULL, 'Webadmin', 0, NULL, 0, 8, 127),
(6, 5, NULL, NULL, 'Default', 1, NULL, 0, 9, 22),
(7, 6, NULL, NULL, 'index', 1, NULL, 0, 10, 11),
(8, 5, NULL, NULL, 'Users', 0, 'User', 71, 23, 34),
(9, 8, NULL, NULL, 'index', 0, NULL, 0, 24, 25),
(10, 8, NULL, NULL, 'view', 0, NULL, 1, 26, 27),
(11, 8, NULL, NULL, 'add', 0, NULL, 2, 28, 29),
(12, 8, NULL, NULL, 'edit', 0, NULL, 3, 30, 31),
(13, 8, NULL, NULL, 'delete', 0, NULL, 4, 32, 33),
(14, 5, NULL, NULL, 'UserGroups', 0, 'User Grup', 70, 35, 48),
(15, 14, NULL, NULL, 'index', 0, NULL, 0, 36, 37),
(16, 14, NULL, NULL, 'view', 0, NULL, 1, 38, 39),
(17, 14, NULL, NULL, 'add', 0, NULL, 2, 40, 41),
(18, 14, NULL, NULL, 'edit', 0, NULL, 3, 42, 43),
(19, 14, NULL, NULL, 'delete', 0, NULL, 4, 44, 45),
(20, 1, NULL, NULL, 'Acl', 1, NULL, 0, 128, 129),
(21, 1, NULL, NULL, 'AuditStash', 1, NULL, 0, 130, 131),
(22, 1, NULL, NULL, 'Bake', 1, NULL, 0, 132, 133),
(23, 1, NULL, NULL, 'CakePdf', 1, NULL, 0, 134, 135),
(24, 1, NULL, NULL, 'DebugKit', 1, NULL, 0, 136, 163),
(25, 24, NULL, NULL, 'MailPreview', 1, NULL, 0, 137, 144),
(26, 25, NULL, NULL, 'index', 1, NULL, 0, 138, 139),
(27, 25, NULL, NULL, 'sent', 1, NULL, 0, 140, 141),
(28, 25, NULL, NULL, 'email', 1, NULL, 0, 142, 143),
(29, 24, NULL, NULL, 'Composer', 1, NULL, 0, 145, 148),
(30, 29, NULL, NULL, 'checkDependencies', 1, NULL, 0, 146, 147),
(31, 24, NULL, NULL, 'Toolbar', 1, NULL, 0, 149, 152),
(32, 31, NULL, NULL, 'clearCache', 1, NULL, 0, 150, 151),
(33, 24, NULL, NULL, 'Requests', 1, NULL, 0, 153, 156),
(34, 33, NULL, NULL, 'view', 1, NULL, 0, 154, 155),
(35, 24, NULL, NULL, 'Panels', 1, NULL, 0, 157, 162),
(36, 35, NULL, NULL, 'index', 1, NULL, 0, 158, 159),
(37, 35, NULL, NULL, 'view', 1, NULL, 0, 160, 161),
(38, 1, NULL, NULL, 'Josegonzalez\\Upload', 1, NULL, 0, 164, 165),
(39, 1, NULL, NULL, 'Migrations', 1, NULL, 0, 166, 167),
(40, 1, NULL, NULL, 'WyriHaximus\\TwigView', 1, NULL, 0, 168, 169),
(41, 14, NULL, NULL, 'configure', 0, NULL, 5, 46, 47),
(43, 6, NULL, NULL, 'logout', 1, NULL, 0, 12, 13),
(44, 6, NULL, NULL, 'editProfile', 1, NULL, 0, 14, 15),
(45, 6, NULL, NULL, 'activitiesLog', 1, NULL, 0, 16, 17),
(46, 6, NULL, NULL, 'uploadMedia', 1, NULL, 0, 18, 19),
(47, 5, NULL, NULL, 'AppSettings', 0, NULL, 1000, 49, 52),
(48, 47, NULL, NULL, 'index', 0, NULL, 0, 50, 51),
(49, 5, NULL, NULL, 'Dashboard', 0, NULL, 0, 53, 56),
(50, 49, NULL, NULL, 'index', 0, NULL, 0, 54, 55),
(51, 5, NULL, NULL, 'WebSettings', 0, NULL, 1001, 57, 60),
(52, 51, NULL, NULL, 'index', 0, NULL, 1, 58, 59),
(53, 6, NULL, NULL, 'getTokenMedia', 1, NULL, 0, 20, 21),
(54, 5, NULL, NULL, 'ContentsCategories', 0, 'Kategori Konten', 11, 61, 72),
(55, 54, NULL, NULL, 'index', 0, NULL, 0, 62, 63),
(56, 54, NULL, NULL, 'view', 0, NULL, 1, 64, 65),
(57, 54, NULL, NULL, 'add', 0, NULL, 2, 66, 67),
(58, 54, NULL, NULL, 'edit', 0, NULL, 3, 68, 69),
(59, 54, NULL, NULL, 'delete', 0, NULL, 4, 70, 71),
(60, 5, NULL, NULL, 'Contents', 0, 'Konten', 12, 73, 84),
(61, 60, NULL, NULL, 'index', 0, NULL, 0, 74, 75),
(62, 60, NULL, NULL, 'view', 0, NULL, 1, 76, 77),
(63, 60, NULL, NULL, 'add', 0, NULL, 2, 78, 79),
(64, 60, NULL, NULL, 'edit', 0, NULL, 3, 80, 81),
(65, 60, NULL, NULL, 'delete', 0, NULL, 4, 82, 83),
(66, 5, NULL, NULL, 'LinksMaps', 0, 'Sitemap', 13, 85, 96),
(67, 66, NULL, NULL, 'index', 0, NULL, 0, 86, 87),
(68, 66, NULL, NULL, 'view', 0, NULL, 1, 88, 89),
(69, 66, NULL, NULL, 'add', 0, NULL, 2, 90, 91),
(70, 66, NULL, NULL, 'edit', 0, NULL, 3, 92, 93),
(71, 66, NULL, NULL, 'delete', 0, NULL, 4, 94, 95),
(72, 5, NULL, NULL, 'Apis', 1, NULL, 0, 97, 102),
(73, 72, NULL, NULL, 'getToken', 1, NULL, 0, 98, 99),
(74, 72, NULL, NULL, 'uploadMedia', 1, NULL, 0, 100, 101),
(75, 5, NULL, NULL, 'Links', 0, NULL, 0, 103, 114),
(76, 75, NULL, NULL, 'index', 0, NULL, 14, 104, 105),
(77, 75, NULL, NULL, 'view', 0, NULL, 0, 106, 107),
(78, 75, NULL, NULL, 'add', 0, NULL, 1, 108, 109),
(79, 75, NULL, NULL, 'edit', 0, NULL, 2, 110, 111),
(80, 75, NULL, NULL, 'delete', 0, NULL, 3, 112, 113),
(81, 5, 'Cover', NULL, 'Covers', 0, NULL, 15, 115, 126),
(82, 81, NULL, NULL, 'index', 0, NULL, 0, 116, 117),
(83, 81, NULL, NULL, 'view', 0, NULL, 1, 118, 119),
(84, 81, NULL, NULL, 'add', 0, NULL, 2, 120, 121),
(85, 81, NULL, NULL, 'edit', 0, NULL, 3, 122, 123),
(86, 81, NULL, NULL, 'delete', 0, NULL, 4, 124, 125);

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(11) NOT NULL,
  `keyField` varchar(225) CHARACTER SET latin1 NOT NULL,
  `valueField` varchar(225) CHARACTER SET latin1 NOT NULL,
  `type` enum('text','long text','image','select') CHARACTER SET latin1 NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `keyField`, `valueField`, `type`, `status`) VALUES
(1, 'App.Name', 'AI-CMS', 'text', 0),
(2, 'App.Logo', '/webroot/img/admin/logo.png', 'image', 0),
(3, 'App.Logo.Login', '/webroot/img/admin/logo_login.png', 'image', 0),
(4, 'App.Logo.Width', '160', 'text', 0),
(5, 'App.Logo.Height', '28', 'text', 0),
(6, 'App.Logo.Login.Width', '400', 'text', 0),
(7, 'App.Logo.Login.Height', '71', 'text', 0),
(8, 'App.Login.Cover', '/webroot/assets/img/cover_login.jpg', 'image', 0),
(9, 'App.Description', 'AI-CMS WEBADMIN FOR WEB MANAGEMENT CONTENT', 'long text', 0),
(10, 'App.Favico', '/webroot/img/admin/favico.png', 'long text', 0),
(11, 'Thumbnail.SM', '150X150', 'text', 0),
(12, 'Thumbnail.MD', '350X350', 'text', 0),
(13, 'Thumbnail.LG', '600X600', 'text', 0),
(14, 'Thumbnail.RM', '920X920', 'text', 0),
(15, 'Cover.SM', '512X384', 'text', 0),
(16, 'Cover.MD', '1360X768', 'text', 0),
(17, 'Cover.LG', '1680X1050', 'text', 0),
(18, 'Cover.RM', '1920X1080', 'text', 0);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'UserGroups', 1, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(11) NOT NULL,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(11, 1, 49, '1', '1', '1', '1'),
(12, 1, 50, '1', '1', '1', '1'),
(13, 1, 14, '1', '1', '1', '1'),
(14, 1, 15, '1', '1', '1', '1'),
(15, 1, 16, '1', '1', '1', '1'),
(16, 1, 17, '1', '1', '1', '1'),
(17, 1, 18, '1', '1', '1', '1'),
(18, 1, 19, '1', '1', '1', '1'),
(19, 1, 41, '1', '1', '1', '1'),
(20, 1, 8, '1', '1', '1', '1'),
(21, 1, 9, '1', '1', '1', '1'),
(22, 1, 10, '1', '1', '1', '1'),
(23, 1, 11, '1', '1', '1', '1'),
(24, 1, 12, '1', '1', '1', '1'),
(25, 1, 13, '1', '1', '1', '1'),
(26, 1, 47, '1', '1', '1', '1'),
(27, 1, 48, '1', '1', '1', '1'),
(28, 1, 51, '1', '1', '1', '1'),
(29, 1, 52, '1', '1', '1', '1'),
(30, 1, 54, '1', '1', '1', '1'),
(31, 1, 55, '1', '1', '1', '1'),
(32, 1, 56, '1', '1', '1', '1'),
(33, 1, 57, '1', '1', '1', '1'),
(34, 1, 58, '1', '1', '1', '1'),
(35, 1, 59, '1', '1', '1', '1'),
(36, 1, 60, '1', '1', '1', '1'),
(37, 1, 61, '1', '1', '1', '1'),
(38, 1, 62, '1', '1', '1', '1'),
(39, 1, 63, '1', '1', '1', '1'),
(40, 1, 64, '1', '1', '1', '1'),
(41, 1, 65, '1', '1', '1', '1'),
(42, 1, 66, '1', '1', '1', '1'),
(43, 1, 67, '1', '1', '1', '1'),
(44, 1, 68, '1', '1', '1', '1'),
(45, 1, 69, '1', '1', '1', '1'),
(46, 1, 70, '1', '1', '1', '1'),
(47, 1, 71, '1', '1', '1', '1'),
(48, 1, 75, '1', '1', '1', '1'),
(49, 1, 77, '1', '1', '1', '1'),
(50, 1, 78, '1', '1', '1', '1'),
(51, 1, 79, '1', '1', '1', '1'),
(52, 1, 80, '1', '1', '1', '1'),
(53, 1, 76, '1', '1', '1', '1'),
(54, 1, 81, '1', '1', '1', '1'),
(55, 1, 82, '1', '1', '1', '1'),
(56, 1, 83, '1', '1', '1', '1'),
(57, 1, 84, '1', '1', '1', '1'),
(58, 1, 85, '1', '1', '1', '1'),
(59, 1, 86, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `controller` varchar(225) DEFAULT NULL,
  `_action` varchar(225) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `primary_key` int(11) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `parent_source` varchar(250) DEFAULT NULL,
  `original` text,
  `changed` text,
  `meta` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `timestamp`, `user_id`, `controller`, `_action`, `type`, `primary_key`, `source`, `parent_source`, `original`, `changed`, `meta`) VALUES
(1, '2019-05-30 10:27:06', 1, 'contents-categories', 'edit', 'update', 3, 'contents_categories', NULL, '{\"title\":\"news\",\"slug\":\"news\",\"modified_by\":1}', '{\"title\":\"berita\",\"slug\":\"berita\",\"modified_by\":1}', '[]'),
(2, '2019-05-30 10:45:39', 1, 'links', 'add', 'create', 2, 'links', NULL, '{\"id\":2,\"title\":\"Tentang Kami\",\"links_map_id\":1,\"_type\":\"HEADER\",\"target\":\"_SELF\",\"url\":\"\",\"lft\":3,\"rght\":4,\"sort\":1,\"status\":true,\"created_by\":1}', '{\"id\":2,\"title\":\"Tentang Kami\",\"links_map_id\":1,\"_type\":\"HEADER\",\"target\":\"_SELF\",\"url\":\"\",\"lft\":3,\"rght\":4,\"sort\":1,\"status\":true,\"created_by\":1}', '[]'),
(3, '2019-05-30 10:46:12', 1, 'links', 'add', 'create', 3, 'links', NULL, '{\"id\":3,\"title\":\"Sejarah\",\"links_map_id\":1,\"_type\":\"CONTENT\",\"target\":\"_SELF\",\"url\":\"\",\"content_id\":2,\"parent_id\":2,\"lft\":4,\"rght\":5,\"sort\":0,\"status\":true,\"created_by\":1}', '{\"id\":3,\"title\":\"Sejarah\",\"links_map_id\":1,\"_type\":\"CONTENT\",\"target\":\"_SELF\",\"url\":\"\",\"content_id\":2,\"parent_id\":2,\"lft\":4,\"rght\":5,\"sort\":0,\"status\":true,\"created_by\":1}', '[]'),
(4, '2019-05-30 10:47:00', 1, 'contents', 'add', 'create', 5, 'contents', NULL, '{\"id\":5,\"contents_category_id\":1,\"title\":\"Team\",\"node\":\"\",\"slug\":\"team\",\"body\":\"<p>Our Team<\\/p>\",\"status\":true,\"meta_description\":\"\",\"meta_keyword\":\"\",\"created_by\":1}', '{\"id\":5,\"contents_category_id\":1,\"title\":\"Team\",\"node\":\"\",\"slug\":\"team\",\"body\":\"<p>Our Team<\\/p>\",\"status\":true,\"meta_description\":\"\",\"meta_keyword\":\"\",\"created_by\":1}', '[]'),
(5, '2019-05-30 10:47:29', 1, 'links', 'add', 'create', 4, 'links', NULL, '{\"id\":4,\"title\":\"Team\",\"links_map_id\":1,\"_type\":\"CONTENT\",\"target\":\"_SELF\",\"url\":\"\",\"content_id\":5,\"parent_id\":2,\"lft\":6,\"rght\":7,\"sort\":1,\"status\":true,\"created_by\":1}', '{\"id\":4,\"title\":\"Team\",\"links_map_id\":1,\"_type\":\"CONTENT\",\"target\":\"_SELF\",\"url\":\"\",\"content_id\":5,\"parent_id\":2,\"lft\":6,\"rght\":7,\"sort\":1,\"status\":true,\"created_by\":1}', '[]'),
(6, '2019-05-30 11:19:55', 1, 'covers', 'add', 'create', 1, 'covers', NULL, '{\"id\":1,\"name\":\"HOME BANNER 1\",\"slug\":\"home\",\"file\":{\"tmp_name\":\"\\/Applications\\/MAMP\\/tmp\\/php\\/php2DUzbe\",\"error\":0,\"name\":\"thumb-1920-390255.jpg\",\"type\":\"image\\/jpeg\",\"size\":251262},\"file_dir\":\"webroot\\/assets\\/img\\/covers\\/2019\\/05\",\"sort\":0,\"status\":true,\"created_by\":1}', '{\"id\":1,\"name\":\"HOME BANNER 1\",\"slug\":\"home\",\"file\":\"home_banner_1.jpg\",\"file_dir\":\"webroot\\/assets\\/img\\/covers\\/2019\\/05\",\"sort\":0,\"status\":true,\"created_by\":1}', '[]'),
(7, '2019-05-30 13:36:50', 1, 'covers', 'add', 'create', 2, 'covers', NULL, '{\"id\":2,\"name\":\"HOME BANNER 2\",\"slug\":\"home\",\"file\":{\"tmp_name\":\"\\/Applications\\/MAMP\\/tmp\\/php\\/phpqSLAkk\",\"error\":0,\"name\":\"961153.jpg\",\"type\":\"image\\/jpeg\",\"size\":630441},\"file_dir\":\"webroot\\/assets\\/img\\/covers\\/2019\\/05\",\"sort\":1,\"status\":true,\"created_by\":1}', '{\"id\":2,\"name\":\"HOME BANNER 2\",\"slug\":\"home\",\"file\":\"home_banner_2.jpg\",\"file_dir\":\"webroot\\/assets\\/img\\/covers\\/2019\\/05\",\"sort\":1,\"status\":true,\"created_by\":1}', '[]'),
(8, '2019-06-02 16:13:15', 1, 'links-maps', 'delete', 'delete', 3, 'links_maps', NULL, NULL, NULL, '[]'),
(9, '2019-06-02 16:13:20', 1, 'links-maps', 'delete', 'delete', 4, 'links_maps', NULL, NULL, NULL, '[]'),
(10, '2019-06-03 10:54:44', 1, 'links', 'add', 'create', 5, 'links', NULL, '{\"id\":5,\"title\":\"WEBADMIN\",\"links_map_id\":1,\"_type\":\"EXTERNAL\",\"target\":\"_SELF\",\"url\":\"\\/webadmin\",\"lft\":9,\"rght\":10,\"sort\":3,\"status\":true,\"created_by\":1}', '{\"id\":5,\"title\":\"WEBADMIN\",\"links_map_id\":1,\"_type\":\"EXTERNAL\",\"target\":\"_SELF\",\"url\":\"\\/webadmin\",\"lft\":9,\"rght\":10,\"sort\":3,\"status\":true,\"created_by\":1}', '[]'),
(11, '2019-06-03 10:55:57', 1, 'links', 'edit', 'update', 5, 'links', NULL, '{\"url\":\"\\/webadmin\",\"content_id\":0,\"parent_id\":0,\"lft\":9,\"rght\":10,\"modified_by\":null}', '{\"url\":\"webadmin\",\"content_id\":null,\"parent_id\":null,\"lft\":9,\"rght\":10,\"modified_by\":1}', '[]'),
(12, '2019-06-03 10:57:02', 1, 'links', 'edit', 'update', 5, 'links', NULL, '{\"sort\":3,\"modified_by\":1}', '{\"sort\":10,\"modified_by\":1}', '[]'),
(13, '2019-06-03 10:57:34', 1, 'links', 'add', 'create', 6, 'links', NULL, '{\"id\":6,\"title\":\"BERITA\",\"links_map_id\":1,\"_type\":\"CONTENT\",\"target\":\"_SELF\",\"url\":\"\",\"content_id\":4,\"lft\":11,\"rght\":12,\"sort\":3,\"status\":true,\"created_by\":1}', '{\"id\":6,\"title\":\"BERITA\",\"links_map_id\":1,\"_type\":\"CONTENT\",\"target\":\"_SELF\",\"url\":\"\",\"content_id\":4,\"lft\":11,\"rght\":12,\"sort\":3,\"status\":true,\"created_by\":1}', '[]'),
(14, '2019-06-03 11:17:47', 1, 'contents', 'edit', 'update', 5, 'contents', NULL, '{\"slug\":\"team\",\"body\":\"<p>Our Team<\\/p>\",\"modified_by\":null}', '{\"slug\":\"team\",\"body\":\"<p>Our Team<\\/p><p>Apakah Lorem Ipsum itu? Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum. Mengapa kita menggunakannya? Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \\\"Bagian isi disini, bagian isi disini\\\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \\\"Lorem Ipsum\\\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya) Dari mana asalnya? Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \\\"de Finibus Bonorum et Malorum\\\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", berasal dari sebuah baris di bagian 1.10.32. Bagian standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di bawah ini untuk mereka yang tertarik. Bagian 1.10.32 dan 1.10.33 dari \\\"de Finibus Bonorum et Malorum\\\" karya Cicero juga di reproduksi persis seperti bentuk aslinya, diikuti oleh versi bahasa Inggris yang berasal dari terjemahan tahun 1914 oleh H. Rackham.<\\/p>\",\"modified_by\":1}', '[]'),
(15, '2019-06-03 11:17:58', 1, 'contents', 'edit', 'update', 3, 'contents', NULL, '{\"slug\":\"berita-1\",\"body\":\"<p>BERITA 1<\\/p>\",\"modified_by\":1}', '{\"slug\":\"berita-1\",\"body\":\"<p>BERITA 1<\\/p><p>Apakah Lorem Ipsum itu? Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum. Mengapa kita menggunakannya? Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \\\"Bagian isi disini, bagian isi disini\\\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \\\"Lorem Ipsum\\\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya) Dari mana asalnya? Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \\\"de Finibus Bonorum et Malorum\\\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", berasal dari sebuah baris di bagian 1.10.32. Bagian standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di bawah ini untuk mereka yang tertarik. Bagian 1.10.32 dan 1.10.33 dari \\\"de Finibus Bonorum et Malorum\\\" karya Cicero juga di reproduksi persis seperti bentuk aslinya, diikuti oleh versi bahasa Inggris yang berasal dari terjemahan tahun 1914 oleh H. Rackham.<\\/p>\",\"modified_by\":1}', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `contents_category_id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `node` varchar(225) DEFAULT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `picture` varchar(225) DEFAULT NULL,
  `picture_dir` varchar(225) DEFAULT NULL,
  `body` text,
  `status` tinyint(1) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `meta_description` text,
  `meta_keyword` text,
  `created_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `contents_category_id`, `title`, `node`, `slug`, `picture`, `picture_dir`, `body`, `status`, `sort`, `meta_description`, `meta_keyword`, `created_by`, `created`, `modified_by`, `modified`) VALUES
(1, 2, 'HOME', 'Home:index', 'home', 'home.png', 'webroot/assets/img/contents/2019/05', '<p>THIS IS HOME PAGE</p>', 1, 0, 'home-', 'home', 1, '2019-05-29 19:53:07', 1, '2019-05-30 06:56:34'),
(2, 1, 'Tentang Kami', '', 'tentang-kami', '.png', 'webroot/assets/img/contents/2019/05', '<p>INI ADALAH PAGE TENTANG KAMI</p>', 1, 0, 'tentang kami', 'tentang kami', 1, '2019-05-30 07:48:28', NULL, '2019-05-30 07:48:28'),
(3, 3, 'BERITA 1', '', 'berita-1', '.png', 'webroot/assets/img/contents/2019/05', '<p>BERITA 1</p><p>Apakah Lorem Ipsum itu? Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum. Mengapa kita menggunakannya? Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya) Dari mana asalnya? Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32. Bagian standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di bawah ini untuk mereka yang tertarik. Bagian 1.10.32 dan 1.10.33 dari \"de Finibus Bonorum et Malorum\" karya Cicero juga di reproduksi persis seperti bentuk aslinya, diikuti oleh versi bahasa Inggris yang berasal dari terjemahan tahun 1914 oleh H. Rackham.</p>', 1, 0, 'test', 'test', 1, '2019-05-30 07:49:02', 1, '2019-06-03 11:17:58'),
(4, 2, 'Berita', 'News:index', 'berita', NULL, NULL, '<p>HALAMAN INDEX BERITA</p>', 1, 0, 'HALAMAN INDEX BERITA', 'HALAMAN INDEX BERITA', 1, '2019-05-30 07:50:37', NULL, '2019-05-30 07:50:37'),
(5, 1, 'Team', '', 'team', NULL, NULL, '<p>Our Team</p><p>Apakah Lorem Ipsum itu? Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum. Mengapa kita menggunakannya? Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya) Dari mana asalnya? Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32. Bagian standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di bawah ini untuk mereka yang tertarik. Bagian 1.10.32 dan 1.10.33 dari \"de Finibus Bonorum et Malorum\" karya Cicero juga di reproduksi persis seperti bentuk aslinya, diikuti oleh versi bahasa Inggris yang berasal dari terjemahan tahun 1914 oleh H. Rackham.</p>', 1, 0, '', '', 1, '2019-05-30 10:47:00', 1, '2019-06-03 11:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `contents_categories`
--

CREATE TABLE `contents_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents_categories`
--

INSERT INTO `contents_categories` (`id`, `title`, `slug`, `status`, `created_by`, `created`, `modified_by`, `modified`) VALUES
(1, 'pages', 'pages', 1, 1, '2019-05-01 00:00:00', 1, '2019-05-01 00:00:00'),
(2, 'nodes', 'nodes', 1, 1, '2019-05-01 00:00:00', 1, '2019-05-01 00:00:00'),
(3, 'berita', 'berita', 1, 1, '2019-05-29 05:19:20', 1, '2019-05-30 10:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `covers`
--

CREATE TABLE `covers` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `file` varchar(225) NOT NULL,
  `file_dir` varchar(225) NOT NULL,
  `sort` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covers`
--

INSERT INTO `covers` (`id`, `name`, `slug`, `file`, `file_dir`, `sort`, `status`, `created_by`, `created`, `modified_by`, `modified`) VALUES
(1, 'HOME BANNER 1', 'home', 'home_banner_1.jpg', 'webroot/assets/img/covers/2019/05', 0, 1, 1, '2019-05-30 11:19:54', NULL, '2019-05-30 11:19:54'),
(2, 'HOME BANNER 2', 'home', 'home_banner_2.jpg', 'webroot/assets/img/covers/2019/05', 1, 1, 1, '2019-05-30 13:36:47', NULL, '2019-05-30 13:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `links_map_id` int(11) NOT NULL,
  `_type` varchar(225) NOT NULL,
  `target` varchar(255) NOT NULL,
  `url` varchar(225) DEFAULT NULL,
  `content_id` int(11) DEFAULT '0',
  `parent_id` int(11) DEFAULT '0',
  `picture` varchar(225) DEFAULT NULL,
  `picture_dir` varchar(225) DEFAULT NULL,
  `lft` int(11) DEFAULT '0',
  `rght` int(11) DEFAULT '0',
  `level` int(11) DEFAULT '0',
  `sort` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `links_map_id`, `_type`, `target`, `url`, `content_id`, `parent_id`, `picture`, `picture_dir`, `lft`, `rght`, `level`, `sort`, `status`, `created_by`, `created`, `modified_by`, `modified`) VALUES
(1, 'Home', 1, 'CONTENT', '_SELF', '', 1, 0, NULL, NULL, 1, 2, 0, 0, 1, 1, '2019-05-30 10:09:00', NULL, '2019-05-30 10:09:00'),
(2, 'Tentang Kami', 1, 'HEADER', '_SELF', '', 0, 0, NULL, NULL, 3, 8, 0, 1, 1, 1, '2019-05-30 10:45:39', NULL, '2019-05-30 10:45:39'),
(3, 'Sejarah', 1, 'CONTENT', '_SELF', '', 2, 2, NULL, NULL, 4, 5, 0, 0, 1, 1, '2019-05-30 10:46:12', NULL, '2019-05-30 10:46:12'),
(4, 'Team', 1, 'CONTENT', '_SELF', '', 5, 2, NULL, NULL, 6, 7, 0, 1, 1, 1, '2019-05-30 10:47:29', NULL, '2019-05-30 10:47:29'),
(5, 'WEBADMIN', 1, 'EXTERNAL', '_SELF', 'webadmin', NULL, NULL, NULL, NULL, 9, 10, 0, 10, 1, 1, '2019-06-03 10:54:44', 1, '2019-06-03 10:57:02'),
(6, 'BERITA', 1, 'CONTENT', '_SELF', '', 4, 0, NULL, NULL, 11, 12, 0, 3, 1, 1, '2019-06-03 10:57:34', NULL, '2019-06-03 10:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `links_maps`
--

CREATE TABLE `links_maps` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified` datetime NOT NULL,
  `lft` int(11) DEFAULT '0',
  `rght` int(11) DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links_maps`
--

INSERT INTO `links_maps` (`id`, `name`, `status`, `created_by`, `created`, `modified_by`, `modified`, `lft`, `rght`, `parent_id`) VALUES
(1, 'HEADER', 1, 1, '2019-05-30 07:35:21', NULL, '2019-05-30 07:35:21', 1, 2, NULL),
(2, 'FOOTER', 1, 1, '2019-05-30 07:35:51', NULL, '2019-05-30 07:35:51', 3, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `user_group_id`, `status`, `created_by`, `created`, `modified_by`, `modified`) VALUES
(1, 'administrator', '$2y$10$eZFD.eY6CfjVDcPtl6XBy.1Y/5726/ZQz9XKaWP7Jbw/8WXU440be', 'administrator', 'administrator@email.com', 1, 1, 1, '2019-03-26 12:54:54', 1, '2019-03-26 12:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `status`, `created_by`, `created`, `modified_by`, `modified`) VALUES
(1, 'ADMINISTRATOR', 1, 1, '2019-03-26 12:44:05', 1, '2019-03-26 12:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` int(11) NOT NULL,
  `keyField` varchar(225) NOT NULL,
  `valueField` text NOT NULL,
  `type` enum('text','long text','image','select') NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `keyField`, `valueField`, `type`, `status`) VALUES
(1, 'Web.Name', 'AI-CMS FRONT END', 'text', 0),
(2, 'Web.Logo', '/webroot/img/logo.png', 'image', 0),
(5, 'Web.Description', '<p>AI-CMS Adalah cms yang dibuild menggunakan cakephp. AI-CMS Open Source&nbsp;</p>', 'text', 0),
(6, 'Web.Theme', 'Doyle', 'text', 0),
(7, 'Web.Location.Address', 'Apartemen Menara Cawang', 'text', 0),
(8, 'Web.Location.Phone.Name', 'AI-CMS', 'text', 0),
(9, 'Web.Location.Phone.Number', '085888888', 'text', 0),
(11, 'Web.Location.Email', 'aiqbalsyah@gmail.com', 'text', 0),
(12, 'Web.Location.Longitude', '-7.2682939', 'text', 0),
(13, 'Web.Location.Latitude', '112.7582997', 'text', 0),
(15, 'Web.Favico', '/webroot/img/favico.png', 'text', 0),
(16, 'Web.FirstPage', 'home', 'text', 0),
(18, 'Web.Facebook', 'https://id-id.facebook.com', 'text', 0),
(19, 'Web.Instagram', 'https://www.instagram.com', 'text', 0),
(20, 'Web.Twitter', 'https://twitter.com/', 'text', 0),
(21, 'Web.Youtube', 'https://youtube.com', 'text', 0),
(22, 'Google.Secret.Key', '', 'text', 0),
(27, 'Google.Analytics.ProfileId', '', 'text', 0),
(28, 'Google.Robots', '/webroot/robots.txt', 'text', 0),
(29, 'Google.Secret.File', '', 'text', 0),
(30, 'Google.Analytics.GaCode', '', 'text', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_phinxlog`
--
ALTER TABLE `acl_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  ADD KEY `aco_id` (`aco_id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents_categories`
--
ALTER TABLE `contents_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `covers`
--
ALTER TABLE `covers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links_maps`
--
ALTER TABLE `links_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD KEY `user_group` (`user_group_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contents_categories`
--
ALTER TABLE `contents_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `covers`
--
ALTER TABLE `covers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `links_maps`
--
ALTER TABLE `links_maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
