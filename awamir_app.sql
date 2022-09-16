-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 01:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awamir_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `content`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ad 1', 'ads qf sqf\r\nsf\r\n\r\nfssqf\r\n\r\n\r\nsqfsqf', '2', '2022-09-08 22:41:46', '2022-09-08 22:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'وظائف حكومية', '2022-08-23 05:48:24', '2022-08-23 05:48:24'),
(2, 'وظائف شركات', '2022-09-13 16:50:10', '2022-09-13 16:50:10'),
(3, 'وظائف عسكرية', '2022-09-13 16:50:10', '2022-09-13 16:50:10'),
(5, 'وظائف القطاع الخاص', '2022-09-13 16:50:10', '2022-09-13 16:50:10'),
(6, 'وظائف مدنية', '2022-09-13 16:50:10', '2022-09-13 16:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'أكادير', '2022-08-18 10:13:10', '2022-08-18 10:13:10'),
(2, 2, 'الرياض', '2022-09-13 16:50:10', '2022-09-13 16:50:10'),
(3, 2, 'جدة', '2022-09-13 16:50:10', '2022-09-13 16:50:10'),
(4, 2, 'مكة', '2022-09-13 16:50:11', '2022-09-13 16:50:11'),
(5, 2, 'الدمام', '2022-09-13 16:50:11', '2022-09-13 16:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2022-08-18 10:12:48', '2022-08-18 10:19:09', 'المغرب الكبير'),
(2, '2022-09-13 16:45:31', '2022-09-13 16:45:31', 'السعودية');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'دوام جزئي', '2022-08-30 21:19:09', '2022-08-30 21:19:09'),
(3, 'دوام كلي', '2022-09-13 16:48:48', '2022-09-13 16:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_09_190730_laratrust_setup_tables', 2),
(12, '2022_08_15_023753_create_countries_table', 3),
(13, '2022_08_16_164203_create_cities_table', 3),
(14, '2022_08_16_164323_create_categories_table', 3),
(15, '2022_08_17_224939_create_job_types_table', 3),
(17, '2022_08_18_031222_add_name_column_to_countries_table', 4),
(19, '2022_08_23_005749_create_subscribers_table', 5),
(20, '2022_08_23_005551_create_settings_table', 6),
(21, '2022_09_06_204107_create_ads_table', 7),
(23, '2022_08_19_222203_create_posts_table', 8),
(25, '2022_09_13_170305_create_viewers_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `jobtype_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `submission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_through_awamir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tls` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `country_id`, `city_id`, `jobtype_id`, `name`, `slug`, `description`, `image`, `company`, `views`, `submission`, `source`, `cv`, `register_through_awamir`, `whatsapp`, `url`, `status`, `keywords`, `tls`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 2, 'احمد اشفكاي', 'احمد-اشفكاي', '<p style=\"text-align: center;\"><strong>qfqfqf</strong></p>', '3-166283099567haTiBrCK.webp', 'ahmedach', 12, 'sqfqsfsfqfcqf', 'qfqfqf sfqsfqsfqs', 'sfqsfsdqfsqf', 'http://127.0.0.1:8000/', 'on', NULL, 2, NULL, NULL, '2022-09-11 00:31:23', '2022-09-13 16:59:22'),
(3, 1, 1, 1, 2, 'احمد اشفكاي', 'احمد-اشفكاي', '<p style=\"text-align: center;\"><strong>qfqfqf</strong></p>', '3-166283099567haTiBrCK.webp', 'ahmedach', 0, 'sqfqsfsfqfcqf', 'qfqfqf sfqsfqsfqs', 'sfqsfsdqfsqf', 'http://127.0.0.1:8000/', 'on', NULL, 2, NULL, NULL, '2022-09-11 00:33:31', '2022-09-11 00:33:31'),
(5, 1, 1, 1, 2, 'Brandon Bruce', 'brandon-bruce', '<p>sfqfqsfqsf</p>', '3-1662831880QM8Umxc6h9.png', 'fqfqsfqsfsahmedach', 1, NULL, NULL, NULL, 'http://127.0.0.1:8000/admin/settings', 'on', NULL, 2, NULL, NULL, '2022-09-11 00:44:53', '2022-09-11 23:52:17'),
(6, 1, 1, 1, 2, 'title tet', 'title', '<p style=\"text-align: center;\"><span style=\"background-color: rgb(230, 126, 35);\"><strong>sfsfqfsqf sfqsfq</strong></span></p>', '3-1662913120Ir5eIxO7qy.jpeg', 'development', 6, NULL, NULL, NULL, 'http://127.0.0.1:8000/admin/settings', 'on', NULL, 2, 'وظائف في مدينة أكادير, وظائف في دولة المغرب الكبير, وظائف أكادير, وظائف حكومية,', NULL, '2022-09-11 08:45:05', '2022-09-11 23:19:04'),
(7, 1, 1, 1, 2, 'Brandon Bruce sfs tetss', 'brandon-bruce', '<p style=\"text-align: center;\"><strong>qfqsfsqfqsf</strong></p>', '3-1662912139Hjuf9iOjED.jpeg', 'Company', 2, 'sfsfsf', 'sfsf', 'sfsfsf', 'http://127.0.0.1:8000/admin/settings', 'on', NULL, 2, 'وظائف في مدينة أكادير, وظائف في دولة المغرب الكبير, وظائف أكادير, وظائف حكومية,', NULL, '2022-09-11 08:55:18', '2022-09-11 23:16:45'),
(8, 3, 1, 1, 2, 'مطلوب سائقين', 'mtlob-saykyn', '<div style=\"text-align: right;\">مطلوب سائقين توصيل للمطاعم والمتاجر</div><div style=\"text-align: right;\">يجب أن يتوفر لديهم سيارة أو سكوتر ولا يشترط \" النوع أو الموديل \" للعمل في (محافظة اربد )</div><div style=\"text-align: right;\">العمل على تطبيق توصيل مُرخص من هيئة تنظيم قطاع الاتصالات</div><div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">*شروط ميسرة</div><div style=\"text-align: right;\">*العمل فوري</div><div style=\"text-align: right;\">على الراغبين بالعمل الرجاء زيارتنا في موقع شركتنا الواقع اربد دوار اليوسفي بناية فرح الطابق الثالث مكتب رقم ٣١٢</div><div style=\"text-align: right;\">المقابلات يوميا ما عدا الجمعة من الساعة ١٠ ص ولغاية ٤ بعد الظهر</div><div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">للاستفسار : 0778105517</div><div style=\"text-align: right;\">026620678</div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=مطلوب سائقين&background=606f49', 'NOV', 2, NULL, NULL, NULL, NULL, NULL, '/jobs/1-title', 2, NULL, '1653989999_47aP4', '2022-09-13 16:51:44', '2022-09-13 16:51:44'),
(9, 2, 1, 4, 2, 'رئيس قسم شؤون عاملين', 'ryys-ksm-shoon-aaamlyn', '<div style=\"text-align: right;\">- الوظيفة للنساء والرجال</div><div style=\"text-align: right;\">- خبرة +٣ سنوات عملية بالمجال</div><div style=\"text-align: right;\">- يتقن العمل على البرامج التالية:</div><div style=\"text-align: right;\">Adobe photoshop - Adobe illustrator - Adobe indesign</div><div style=\"text-align: right;\">- يجيد تجهيز الملفات للمطبعة</div>\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">مهارات تفضيلية:</div><div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">- معرفة باستخدام الكاميرات الاحترافية photographer</div><div style=\"text-align: right;\">- يعمل على برامج after effect and Premier</div><div style=\"text-align: right;\">- يجيد ادارة مواقع التواصل الاجتماعي وحملاتها</div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=رئيس قسم شؤون عاملين&background=9d4edd', 'Confidential company', 4, NULL, NULL, NULL, NULL, NULL, '/jobs/2-title', 2, NULL, '1653989999_Oks5', '2022-09-13 16:51:44', '2022-09-13 23:41:25'),
(10, 2, 1, 4, 2, 'خدمة العملاء', 'khdm-alaamlaaa', '<div style=\"text-align: right;\">خدمة عملاء customer service</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">للعمل في الشركة بدوام كامل :-</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">على ان تنطبق عليه /ـا الشروط التالية :</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">1- أن يكون حاصلآ على شهادة جامعية</div><div style=\"text-align: right;\">2- أن يكون لدية خبرة لاتقل عن سنة</div><div style=\"text-align: right;\">3- اجادة الحاسب الالي</div><div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">علمآ بأن تقديم الطلبات سيكون الكترونيآ من خلال ارسال السيرة الذاتية ( ( CV على البريد الالكتروني الخاص بالشركة Hr@Elevatorsworld.com.sa سيتم اشعاركم موعد للمقابلة</div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=خدمة العملاء&background=6b705c', 'شركة عالم المصاعد المحدودة', 2, NULL, NULL, NULL, NULL, NULL, '/jobs/3-title', 2, NULL, '1653989999_chek', '2022-09-13 16:51:44', '2022-09-13 16:51:44'),
(11, 2, 1, 4, 2, 'سكرتارية ', 'skrtary', '<div style=\"text-align: right;\">: تطلب شركه القاهره للتسويق لمعدات الكافيتريا</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">سكرتاريه تجيد الكتابه علي الكمبيوتر والارشيف</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">FACE BOOK واعمال السوشيال ميديا</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">حسنه المظهر ولديها خبره في تجهيزات المعارض</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">التواصل علي 01114555305</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">مواعيد العمل 9:30 ل 4</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">العنوان 60 الخليفه المامون برج كوين سنتر مصر الجديده</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">send your CV to the e-mail : info@cairo-marketing.com</div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=سكرتارية &background=9d4edd', 'cairo marketing co', 1, NULL, NULL, NULL, NULL, NULL, '/jobs/4-title', 2, NULL, '1653989999_opop99', '2022-09-02 16:51:44', '2022-09-13 16:51:44'),
(12, 2, 1, 4, 2, 'فني بصريات', 'fny-bsryat', '<div style=\"text-align: right;\">لاحدى المجموعات الكبرى التي تعمل بمجال البصريات</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">مطلوب نقل كفالة فنيين بصريات</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">للعمل بعدد من فروعها داخل المملكة العربية السعودية</div><div style=\"text-align: right;\">عدد (4) فنى</div><div style=\"text-align: right;\">خبرة لاتقل عن سنتين</div><div style=\"text-align: right;\">يفضل حاملى مؤهل بصريات</div><div style=\"text-align: right;\">يجيد العمل بالتركيبات</div><div style=\"text-align: right;\">جاد وجاهز للعمل</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">المميزات:</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">راتب مناسب</div><div style=\"text-align: right;\">بدل سكن</div><div style=\"text-align: right;\">بدل مواصلات</div><div style=\"text-align: right;\">عمولات مجزية على المبيعات</div><div style=\"text-align: right;\">تامين طبى</div>\n\n<div style=\"text-align: right;\"><br></div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=فني بصريات&background=5a189a', 'Lamhat Ein Optical Group', 2, NULL, NULL, NULL, NULL, NULL, '/jobs/5-title', 2, NULL, '1653989999_amm001', '2022-09-13 16:51:44', '2022-09-13 16:51:44'),
(13, 6, 1, 1, 2, 'مطلوب مصممة جرافيك بالرياض', 'mtlob-msmm-grafyk-balryad', '<div style=\"text-align: right;\">- الوظيفة للنساء والرجال</div><div style=\"text-align: right;\">- خبرة +٣ سنوات عملية بالمجال</div><div style=\"text-align: right;\">- يتقن العمل على البرامج التالية:</div><div style=\"text-align: right;\">Adobe photoshop - Adobe illustrator - Adobe indesign</div><div style=\"text-align: right;\">- يجيد تجهيز الملفات للمطبعة</div>\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">مهارات تفضيلية:</div><div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">- معرفة باستخدام الكاميرات الاحترافية photographer</div><div style=\"text-align: right;\">- يعمل على برامج after effect and Premier</div><div style=\"text-align: right;\">- يجيد ادارة مواقع التواصل الاجتماعي وحملاتها</div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=مطلوب مصممة جرافيك بالرياض&background=9d4edd', 'VMCOGULF', 3, NULL, NULL, NULL, NULL, NULL, '/jobs/6-title', 2, NULL, '1653989999_777q', '2022-09-13 16:51:44', '2022-09-15 20:17:14'),
(14, 5, 1, 4, 2, 'موظفة استقبال', 'mothf-astkbal', '<div style=\"text-align: right;\"><ul><li>اناث فقط</li><li>اللباقة في التحدث</li><li>حسنة المظهر</li><li>التعامل مع مايكروسوفت اوفيس</li><li>مؤهل عالي</li></ul></div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">العنوان ٦ اكتوبر ميدان فودافون مول اجياد انفنتي ( رنين ) بجوار مستشفي ٦ اكتوبر المركز</div><div style=\"text-align: right;\">للتواصل والإستعلام مدير إدارة الموارد البشرية احمد منسي</div><div style=\"text-align: right;\">الاتصال علي ٠١١٥٠٦٢٩٢٤٢</div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=موظفة استقبال&background=6b705c', 'مستشفي درة ', 6, NULL, NULL, NULL, NULL, NULL, '/jobs/7-title', 2, NULL, '1653989999_slqs', '2022-09-13 16:51:44', '2022-09-13 16:51:44'),
(15, 5, 1, 1, 3, 'مندوب مبيعات', 'mndob-mbyaaat', '<div style=\"text-align: right;\"></div><div style=\"text-align: right;\">مطلوب مندوب مبيعات لمصنع للعوازل المائية</div><div style=\"text-align: right;\">مطلوب فورا مندوب مبيعات للعمل في مصنع للعوازل المائيه بجدة يرجي ارسال السيرة الذاتية على ‏الايميل.‏</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">الشروط : ‏</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\"><ol><li>‏لديه اقامة قابلة للتحويل.‏</li><li>‏لديه رخصة قيادة سارية.‏</li><li>‏خبرة لا تقل عن سنة. ‏</li></ol></div><div style=\"text-align: right;\">الميزات :‏</div>\n\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">الراتب : 3500-4000 ريال + عمولة المبيعات‏</div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=مندوب مبيعات&background=6b705c', 'جامعة حفر \n', 9, NULL, NULL, NULL, NULL, NULL, '/jobs/8-title', 2, NULL, '1653989999_AAop', '2022-09-13 16:51:44', '2022-09-13 16:51:44'),
(16, 2, 1, 3, 3, 'مطلوب مصممة جرافيك بالرياض', 'mtlob-msmm-grafyk-balryad', '<div style=\"text-align: right;\">- الوظيفة للنساء والرجال</div><div style=\"text-align: right;\">- خبرة +٣ سنوات عملية بالمجال</div><div style=\"text-align: right;\">- يتقن العمل على البرامج التالية:</div><div style=\"text-align: right;\">Adobe photoshop - Adobe illustrator - Adobe indesign</div><div style=\"text-align: right;\">- يجيد تجهيز الملفات للمطبعة</div>\r\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">مهارات تفضيلية:</div><div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">- معرفة باستخدام الكاميرات الاحترافية photographer</div><div style=\"text-align: right;\">- يعمل على برامج after effect and Premier</div><div style=\"text-align: right;\">- يجيد ادارة مواقع التواصل الاجتماعي وحملاتها</div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=مطلوب مصممة جرافيك بالرياض&background=5a189a', 'VMCOGULF2', 4, NULL, NULL, NULL, NULL, NULL, '/jobs/6-title', 2, NULL, '1653989999_87aa', '2022-09-13 16:51:45', '2022-09-14 00:29:35'),
(17, 2, 1, 4, 3, 'موظفة استقبال', 'mothf-astkbal', '<div style=\"text-align: right;\"><ul><li>اناث فقط</li><li>اللباقة في التحدث</li><li>حسنة المظهر</li><li>التعامل مع مايكروسوفت اوفيس</li><li>مؤهل عالي</li></ul></div>\r\n\r\n<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">العنوان ٦ اكتوبر ميدان فودافون مول اجياد انفنتي ( رنين ) بجوار مستشفي ٦ اكتوبر المركز</div><div style=\"text-align: right;\">للتواصل والإستعلام مدير إدارة الموارد البشرية احمد منسي</div><div style=\"text-align: right;\">الاتصال علي ٠١١٥٠٦٢٩٢٤٢</div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=موظفة استقبال&background=6f4e37', 'مستشفي درة 2', 0, NULL, NULL, NULL, NULL, NULL, '/jobs/7-title', 2, NULL, '16555489999_s7a', '2022-09-13 16:51:45', '2022-09-13 16:51:45'),
(18, 3, 1, 3, 3, 'وظيفة تقني', 'othyf-tkny', '<div style=\"text-align: right;\"><div>تبحث شركة Orange عن مدير مشاكل الشبكات للانضمام إلى الفريق والعمل في القاهرة في مصر لعام 2021.</div><div>المسؤوليات:</div><div><ul><li>تحديد الاتجاهات ومصادر المشاكل المحتملة (من خلال مراجعة تحليل الحوادث والمشكلات).</li><li>العمل مع جميع الفرق الفنية الداخلية وإدارة الخدمة وأصحاب المصلحة الخارجيين مثل العملاء والأطراف الثالثة.</li><li>منع تكرار المشاكل عبر أنظمة متعددة.</li><li>قد يُطلب أيضًا من مدير مشاكل الشبكات مناقشة الجزء الفني الذي يدعم SM، عند الحاجة.</li><li>مسؤول عن إنشاء RFC أو اقتراحه للحصول على حل دائم للأخطاء المعروفة.</li><li>متابعة القضايا والتقدم مع أصحاب المشكلة عند الضرورة.</li><li>دفع جميع المشكلات نحو تحديد السبب الجذري والإصلاح الدائم.</li><li>مراقبة فعالية التحكم في الأخطاء وتقديم توصيات للتحسينات.</li><li>استعراض كفاءة وفعالية عملية التحكم في المشكلة.</li><li>المحافظة على جرد المشاكل قيد التحليل وتقدمها الحالي وحالتها.</li><li>تحديث KEDB.</li><li>إنتاج تقارير إدارة المشكلات ومعلومات الإدارة.</li><li>تنسيق الاجتماعات لحل المشاكل.</li><li>منع تكرار المشكلات عن طريق تحديد السبب الجذري وتنفيذ الإصلاح.</li><li>العثور على نهج مبتكر لأن المشكلات فريدة وتحتاج إلى استخدام تقنيات تحليل السبب الجذري المختلفة.</li></ul></div><div>متطلبات التقديم على الوظيفة:</div><div><ol><li>خبرة لا تقل عن 3 سنوات في إدارة الحوادث والمشكلات.</li><li>مهارات تحليلية.</li><li>فهم جيد للشبكة مع شهادة CCNA ومعرفة توجيه CCNP.</li><li>فهم جيد في ITIL.</li><li>معرفة قوية ببرنامج Excel.</li><li>مهارات جيدة في التعامل مع العملاء الدوليين.</li><li>مهارات جيدة في التعامل مع الآخرين.</li><li>مهارات تنظيمية جيدة.</li></ol></div><h3>التفاصيل :</h3><div><a href=\"http://www.ibhate.com\">اضغط هنا&nbsp;</a></div></div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=وظيفة تقني&background=6b705c', 'orange', 30, 'https:ww.w.w', 'https://www.ibhate.com', '#', 'https://www.ibhate.com', '1', '/jobs/12-custom-link', 2, NULL, '1653517626_Fv6H', '2022-09-13 16:51:45', '2022-09-13 16:51:45'),
(19, 2, 1, 5, 2, 'الخطوط السعودية للتموين توفر وظائف إدارية وتقنية (للدبلوم فأعلى) بالرياض وجدة', 'alkhtot-alsaaody-lltmoyn-tofr-othayf-adary-otkny-lldblom-faaal-balryad-ogd', '<div style=\"text-align: right;\"><p style=\"\"><b>الوظائف:</b></p><p style=\"\"><b><br></b>1- مسؤول تقنية المعلومات (الرياض، جدة):<br>- درجة الدبلوم في التخصصات التقنية.<br>- إجادة استخدام برامج شركة مايكروسوفت (أوفيس).<br>- معرفة مجموعة واسعة من برامج أنظمة الحاسب والتطبيقات والأجهزة والشبكات والاتصالات.</p><p style=\"\">2- مدير مخزون المعدات (جدة):<br>- درجة البكالوريوس في تخصص (إدارة الأعمال، إدارة سلاسل الإمداد، الهندسة الصناعية) أو ما يعادلها.<br>- خبرة تتناسب مع المهام والوصف الوظيفي الموضح برابط التقديم.</p><p style=\"\">3- أخصائي المعمل المركزي (جدة):<br>- درجة البكالوريوس في تخصص مناسب.<br>- معرفة عملية بتطبيقات الحاسب الآلي.<br>- مهارات التواصل والتحليل والحكم واتخاذ القرار.</p><p style=\"\"><b>نبذة عن الشركة:</b></p><p style=\"\"><b><br></b>- تأسست شركة الخطوط السعودية للتموين في عام 1981م، وشهدت على مدار السنوات الماضية منذ تأسيسها توسعاً سريعاً لتمتد عملياتها إلى الأسواق المحلية والدولية، كما قامت على مدار الأعوام الماضية على تكثيف جهودها لتعزيز برنامج التحسين المستمر والابتكار وتبسيط العمليات بهدف تلبية الطلب المتنامي وتحقيق الكفاءة التشغيلية.</p><p style=\"\"><b>موعد التقديم:</b></p><p style=\"\"><b><br></b>- التقديم مُتاح الآن بدأ اليوم الأحد بتاريخ 1443/10/28هـ الموافق 2022/05/29م.</p><p style=\"\"><b>طريقة التقديم:</b><br>- لمعرفة بقية الشروط والمهارات والوصف الوظيفي وللتقديم من خلال الرابط التالي:</p><p style=\"\"><br>1- مسؤول تقنية المعلومات (الرياض):<br><a href=\"#\">اضغط هنا</a></p><p style=\"\">2- مسؤول تقنية المعلومات (جدة):<br><a href=\"#\">اضغط هنا</a></p><p style=\"\">3- مدير مخزون المعدات (جدة):<br><a href=\"#\">اضغط هنا</a></p><p style=\"\">4- أخصائي المعمل المركزي (جدة):<br><a href=\"#\">اضغط هنا</a></p></div>', 'https://ui-avatars.com/api/?color=fff&bold=true&name=الخطوط السعودية للتموين توفر وظائف إدارية وتقنية (للدبلوم فأعلى) بالرياض وجدة&background=6f4e37', 'الخطوط السعودية للتموين', 19, NULL, NULL, '#', NULL, '1', '/jobs/13-saudi-airlines-jobs', 2, 'وظائف في مدينة  جدة, وظائف في  السعودية , وظائف شركة  الخطوط السعودية للتموين  , الخطوط السعودية للتموين     ,    وظائف مدنية  , الخطوط السعودية للتموين توفر وظائف إدارية وتقنية (للدبلوم فأعلى) بالرياض وجدة', '1653989999_Zb7g', '2022-09-14 16:51:45', '2022-09-15 21:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'مدير', '', '2022-08-10 02:10:24', '2022-08-10 02:10:24'),
(2, 'writer', 'مدخل البيانات', '', '2022-08-10 02:10:24', '2022-08-10 02:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 1, 'App\\Models\\User'),
(1, 3, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `content`, `type`, `created_at`, `updated_at`) VALUES
(1, 'logo', 'storage/images/logo/3-1662392641lhDbCRCvis.svg', 'color', '2022-09-04 18:38:46', '2022-09-05 22:44:01'),
(2, 'color_1', 'rgba(94, 194, 144, 0.7)', 'color', '2022-09-04 18:38:46', '2022-09-05 23:58:13'),
(3, 'color_2', 'rgb(26, 188, 156)', 'color', '2022-09-04 18:38:46', '2022-09-07 03:37:12'),
(4, 'color_3', 'rgb(42, 172, 128)', 'color', '2022-09-04 18:38:46', '2022-09-04 18:38:46'),
(5, 'color_4', 'rgba(94, 194, 144, 0.3)', 'color', '2022-09-04 18:38:46', '2022-09-05 23:57:56'),
(6, 'color_5', 'rgba(94, 194, 144, 0.7)', 'color', '2022-09-04 18:38:46', '2022-09-05 23:58:05'),
(7, 'color_6', 'rgb(60, 63, 78)', 'color', '2022-09-04 18:38:46', '2022-09-05 23:58:17'),
(8, 'ico', 'storage/images/logo/icon/3-16623962496pHL0MILAi.ico', 'string', '2022-09-04 18:38:46', '2022-09-05 23:44:09'),
(9, 'facebook', NULL, 'social media', '2022-09-04 18:38:46', '2022-09-07 01:41:16'),
(10, 'twitter', 'https://twitter.com/awamir_1', 'social media', '2022-09-04 18:38:46', '2022-09-07 01:42:45'),
(11, 'instagram', 'https://www.instagram.com/awamir_tawzif/', 'social media', '2022-09-04 18:38:46', '2022-09-07 01:42:45'),
(12, 'snapchat', 'https://www.snapchat.com/add/awamirtawzif?share_id=fSvNhGyjsUA&locale=ar-AE', 'social media', '2022-09-04 18:38:46', '2022-09-07 01:42:45'),
(13, 'telegram', 'https://t.me/awamir_11', 'social media', '2022-09-04 18:38:46', '2022-09-07 01:42:45'),
(14, 'whatsapp', 'https://reachnetwork.co/awamir_4', 'social media', '2022-09-04 18:38:46', '2022-09-07 01:42:45'),
(15, 'site_name', 'أوامر للتوظيف', 'seo', '2022-09-04 18:38:46', '2022-09-07 01:12:24'),
(16, 'tagline', 'Slogan', 'seo', '2022-09-04 18:38:46', '2022-09-07 01:14:11'),
(17, 'site_description', NULL, 'seo', '2022-09-04 18:38:46', '2022-09-07 01:39:31'),
(18, 'google_scripts', '<!-- Global site tag (gtag.js) - Google Analytics -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-116GVPZEZ9\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'G-116GVPZEZ9\');\r\n</script>', 'code', '2022-09-04 18:38:46', '2022-09-07 01:29:08'),
(19, 'linkedin', NULL, 'social media', '2022-09-04 18:38:46', '2022-09-07 01:41:16'),
(20, 'whatsapp_group', 'https://chat.whatsapp.com/JTow7Lmlqva4kjv6fd5kRG', 'social media', '2022-09-04 18:38:46', '2022-09-07 01:42:45'),
(21, 'twitter_bg', '#1b96e3', 'social media bg', '2022-09-04 18:38:46', '2022-09-07 02:43:09'),
(22, 'instagram_bg', '#ca4e67', 'social media bg', '2022-09-04 18:38:46', '2022-09-07 02:43:08'),
(23, 'snapchat_bg', '#fef900', 'social media bg', '2022-09-04 18:38:46', '2022-09-07 02:43:07'),
(24, 'telegram_bg', '#236194', 'social media bg', '2022-09-04 18:38:46', '2022-09-07 02:43:08'),
(25, 'whatsapp_group_bg', '', 'social media bg', '2022-09-04 18:38:46', '2022-09-07 01:42:45'),
(26, 'whatsapp_bg', '#27cc37', 'social media bg', '2022-09-04 18:38:46', '2022-09-07 01:42:45'),
(27, 'register_through_awamir_bg', '#48a148', 'job button bg', '2022-09-04 18:38:46', '2022-09-07 03:17:23'),
(28, 'whatsapp_share_bg', '#27cc37', 'job button bg', '2022-09-04 18:38:46', '2022-09-07 03:17:23'),
(29, 'source_bg', '#ff0000', 'job button bg', '2022-09-04 18:38:46', '2022-09-07 03:17:23'),
(30, 'cv_bg', '#434f43', 'job button bg', '2022-09-04 18:38:46', '2022-09-07 03:17:23'),
(31, 'apply_bg', '#000000', 'job button bg', '2022-09-04 18:38:46', '2022-09-07 03:17:23'),
(32, 'register_through_awamir', '[\"http:\\/\\/127.0.0.1:8000\\/admin\\/settings\",\"http:\\/\\/127.0.0.1:8000\\/\",\"http:\\/\\/127.0.0.1:8000\\/admin\"]', 'job link', '2022-09-04 18:38:46', '2022-09-09 22:01:34'),
(33, 'email', 'awamirtawzif@gmail.com', 'contact', '2022-09-04 18:38:46', '2022-09-09 22:13:00'),
(34, 'cv_phone_number', 'https://api.whatsapp.com/send/?phone=966506719679&text&app_absent=0', 'contact', '2022-09-04 18:38:46', '2022-09-09 22:13:00'),
(35, 'about', '<h3>من نحن</h3>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h2>&nbsp;</h2>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h2>إذا كنت ترغب في تقديم طلب للحصول على وظيفة أحلامك, فيمكنك الآن الاعتماد على موقع (أوامر توظيف) بحيث ستتمكن بكل حرية من تصفح إعلانات الوظائف المتاحة بموقعنا حتى تختار من بين والظائف المرموقة والمثالية المناسبة لك والمتاحة بموقعنا, فنحن نتميز بأننا نقوم بطرح الأعلانات الوظيفية وبتنفيذ الخدمات الإلكترونية من تسجيل في الوظائف وانشاء السير الذاتية كما أننا نمتلك فريق مختص في تنفيذ الخدمات الألكترونية لمساعدتك بأي وقت على مدار اليوم كما أننا نقوم بعرض الوظائف المتاحة بالقطاعين الحكومي والخاص &nbsp;فيمكنك بكل سهولة إبلاغنا بالوظيفة التي تتناسب مع مؤهلاتك وتزويدنا بالبيانات الخاصة بك حتى نتمكن من تسجيلك في هذي الوظيفة</h2>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3>About us:-</h3>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h2>If you want to apply for your dream job, you can now rely on the Employment Orders website so that you will be able to freely browse the job advertisements available on our site in order to choose among the prestigious and ideal jobs that are suitable for you and available on our site. From registering for jobs and creating CVs. We also have a team specialized in implementing electronic services to help you at any time throughout the day. We also offer jobs available in the government and private sectors. You can easily inform us of the job that matches your qualifications and provide us with your data so that we can register you in this Function</h2>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<p dir=\"rtl\">&nbsp;</p>', 'pages', '2022-09-04 18:38:46', '2022-09-12 13:11:13'),
(36, 'privacy', '<h3>سياسة الخصوصية</h3>\r\n<div>&nbsp;</div>\r\n<div>في موقعنا ، نولي أهمية كبيرة لخصوصية زوارنا، وإن هذه الوثيقة الخاصة بساسية الخصوصية تحدد الخطوط العريضة لأنواع المعلومات الشخصية التي يتلقاها ويجمعها موقعنا وكيفية استخدامها.</div>\r\n<div>&nbsp;</div>\r\n<h3>ما هي المعلومات التي يتم جمعها عنك ؟</h3>\r\n<div>&nbsp;</div>\r\n<div>بخلاف المعلومات التي تقوم بادخالها عنذ التسجيل كالبريد الالكتروني و الاسم ، فاننا نقوم بجمع معلوات اضافية عنك و التي لا تخص خصوصيتك الشخصية بشكل مباشر فاننا نقوم بالحصول على معلومات عنوانك الالكتروني IP ، و نوع المتصفح و مزود الخدمة و اوقات الاستخدام و بلد الاقامة ...</div>\r\n<div>&nbsp;</div>\r\n<h3>كيف نستخدم معلوماتك ؟</h3>\r\n<div>&nbsp;</div>\r\n<div>معضم استخدمات هذه المعلومات هو من اجل تحليل سلوك المستخدم ، و فهم انطباعاته حول الموقع و ذلك من اجل تحسين كيفية عمل الموقع تطلعا لتقديم خدمات افضل و تصفح مميز و حسب الاهتمامات .</div>\r\n<div>&nbsp;</div>\r\n<h3>الاطراف الثالثة</h3>\r\n<div>&nbsp;</div>\r\n<div>مكن لبعض الأطراف الثالثة مثل غوغل وفيسبوك وتويتر استخدام الكوكيز لتحديد المستخدم وتخصيص تجربة الإستخدام (كالإعلانات) استناداً إلى تفضيلاته على مواقع تلك الأطراف. يمكنك الإنسحاب من إستخدام الكوكيز لتحديد هويتك وتخصيص الإعلانات المقدمة من قبل غوغل حسب تفضيلاتك عن طريق زيارة الموقع التالي الخاص بإعلانات غوغل http://www.google.com/privacy_ads.html الأطراف الثالثة تأخذ تلقائياً عنوان الإنترنت (IP) الخاص بك عند زيارة موقعنا. يمكن أيضاً إستخدام التقنيات الأخرى مثل الكوكيز من قبل الأطراف الثالثة لمعرفة ق استخدامك للموقع وتفضيلاتك، وقياس مدى فاعلية إعلاناتهم أو تخصيص تلك الإعلانات لتناسب اهتماماتك. موقعنا ليس لديه أي وصول أو تحكم في الكوكيز التي تستخدمها هذه الأطراف الثالثة. لمزيد من المعلومات عن ممارسات الأطراف الثالثة والتعليمات عن كيفية تعطيل استخدام البيانات من قبلهم عليك إستشارة سياسة الخصوصية الخاصة بالطرف المعني. سياسة خصوصية الموقع لا تنطبق على أي من الأطراف الثالثة، ونحن لا نستطيع مراقبة أو التحكم بأنشطة تلك الأطراف بالمعلومات التي تجمعها عنك. إذا كنت ترغب في تعطيل الكوكيز، يمكنك فعل ذلك من خلال خيارات المتصفح الخاص بك. لمعلومات أكثر تفصيلاً حول إدارة الكوكيز في متصفحك يمكنك الإطلاع على الموقع الإلكتروني الخاص بمتصفحك .</div>\r\n<div>&nbsp;</div>\r\n<h3>من المعنيون بمعلوماتي الشخصية ؟</h3>\r\n<div>&nbsp;</div>\r\n<div>يشرف على المعلومات الشخصية التي تقوم بادخالها عبر الموقع شخص واحد و هو المشرف يقوم باستخدامها لاغراض خاصة باستخدامك للموقع ، كاستخدام بريدك الالكتروني من اجل التوصل بالاشعارات او بالنشراة البريدية التي تكون انت من حددتها ، و لا احد اخر يمكنه الوصول الى معلوماتك او استخدامها في اي نشاطات خارج الموقع .</div>\r\n<div>&nbsp;</div>\r\n<h3>ادارة معلوماتك الشخصية</h3>\r\n<div>&nbsp;</div>\r\n<div>بالرغم من اننا لا نقوم بالتقاط عدد كبير من معلوماتك الشخصية ، فانك تمتلك كامل الحق في طلب حذف جميع بياناتك من على قواعد بيانات موقعنا ، و باستثناء ذلك فبمجرد القيام بحذفك للحساب فان جميع معلوماتك الشخصية تحذف بشكل تلقائي .</div>\r\n<div>&nbsp;</div>\r\n<h3>سياسة الخصوصية الخاصة بموقع أوامر توظيف:-</h3>\r\n<div>&nbsp;</div>\r\n<div>نهتم كثيرًا بخصوصية بياناتك الشخصية التي تزودنا بها لذلك نتبع كافة الإجراءات المناسبة من أجل المحافظة على بياناتك الشخصية لكي تظل بأمان معنا, لذلك نرجو منك الموافقة على هذه السياسة بما تحتويه من بنود من أجل أن تتمكن من استخدام موقعنا والتمتع بخدماته,&nbsp;سياسة الخصوصية الخاصة بموقع أوامر توظيف تحتوي على البنود التالية:-</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h3>البيانات التي يطلبها موقع أوامر توظيف من عملاء الموقع:-</h3>\r\n<div>&nbsp;</div>\r\n<div>1- يحتاج موقعنا بعض البيانات الهامة للغاية وذلك من أجل أن يتمكن العميل من التسجيل بالوظيفة التي يرغب بالعمل فيها, ويلتزم العميل بتزويدنا بكافة البيانات التي نحتاجها منه في هذه الحالة.</div>\r\n<div>&nbsp;</div>\r\n<div>2- يطلب موظفي الدعم الفني بعض البيانات الشخصية من العملاء وذلك حين يقوموا بالتواصل معهم من خلال خدمة الواتساب وذلك من أجل أن ننفذ لهم سير ذاتية خاصة بهم ويلتزم العملاء بشكل كامل بتزويدنا بكافة البيانات التي نحتاجها منهم في هذه الحالة.</div>\r\n<div>&nbsp;</div>\r\n<div>3- نطلب بعض البيانات الشخصية حين يعلن العميل رغبته في أن ننفذ له سيرة ذاتية كما نطلب بعض البيانات الشخصية حين نقوم بالاتفاق مع العميل على ثمن تنفيذ خدمة سيرة ذاتية له ويلتزم العميل بتزويدنا بالبيانات التي تثبت قيامه بعمل تحويل بنكي لرقم حسابنا بالمبالغ التي تم الاتفاق عليها مع العميل.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h3>البيانات التي نجمعها عنك:-</h3>\r\n<div>&nbsp;</div>\r\n<div>نجمع بعض البيانات الهامة عنك بشكل تلقائي بحيث أننا نقوم بجمع بعض البيانات حول المتصفح والجهاز الذي تستخدمة عند زيارتك لموقعنا الإلكتروني كما نجمع بعض البيانات حول عنوان IP الخاص بك.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h3>استخدمات موقع أوامر توظيف لبيانات العملاء الشخصية:-</h3>\r\n<div>&nbsp;</div>\r\n<div>تستخدم إدارة موقعنا بيانات العملاء في عدة أمور ضرورية متعلقة بنا وبالعملاء, وهذه الأمور متمثلة في الآتي:-</div>\r\n<div>&nbsp;</div>\r\n<div>1- من أجل أن يكون موقع أوامر توظيف قادر على تسليم تلك البيانات إلى الجهات الحكومية أو إلى الجهات القضائية وذلك في حال طلب تلك الجهات من إدارة الموقع ذلك.</div>\r\n<div>&nbsp;</div>\r\n<div>2- من أجل إن نرسل إعلانات الوظائف المتاحة بموقعنا للعملاء.</div>\r\n<div>&nbsp;</div>\r\n<div>3- من أجل أن نجيب على كافة استفسارات العملاء الذين يرغبون بالحصول على إجابات على تلك الاستفسارات.</div>\r\n<div>&nbsp;</div>\r\n<div>4- حتى نكون قادرين على تحسين موقعنا بشكل كبير.</div>\r\n<div>&nbsp;</div>\r\n<div>5- لأي أمور أخرى ترى إدارة موقع أوامر توظيف أنه من الضروري لها أن تستخدم بيانات العملاء الشخصية فيها.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h3>التعامل مع أطراف ثالثة:-</h3>\r\n<div>&nbsp;</div>\r\n<div>يحق لموقع أوامر توظيف التعامل والتعاون مع أطراف ثالثة وذلك بغرض أن يقوموا بعرض خدماتهم على عملاء الموقع أو من أجل أن يقوموا بتنفيذ خدمات نوكلها لهم ليقوموا بتنفيذها, لذلك يحق لنا تزويد هذه الأطراف ببيانات العملاء الشخصية ليقوموا باستخدامها أثناء تنفيذهم لخدماتهم للعملاء.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h3>حقوق العملاء بموقع أوامر توظيف:-</h3>\r\n<div>&nbsp;</div>\r\n<div>1- يمكن لأي عميل تعديل بياناته الشخصية التي قمنا بتسجيلها بالوظيفة التي يرغب بالالتحاق بها وذلك عبر التواصل مع الدعم الفني الخاص بنا.</div>\r\n<div>&nbsp;</div>\r\n<div>2- نحافظ على سرية كافة التعاملاء المالية وغيرها من التعاملات الأخرى التي نقوم بإجرائها مع العملاء كما أننا لا نقوم ببيع أو تأجير أو بمشاركة بيانات ومعلومات المستخدمين الشخصية مع أي طرف خارجي غير متعاون معها من قبلنا ونقوم باستخدام بيانات العملاء في الأمور المكلفين بتنفيذها من قبل العملاء.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h3>حماية بيانات العملاء الشخصية بموقع أوامر توظيف:-</h3>\r\n<div>&nbsp;</div>\r\n<div>يتخذ موقعنا كافة الإجراءات اللأزمة وذلك حتى يتم الحفاظ على بيانات العملاء آمنة بالموقع, ولكن للأسف لا يمكن ضمان الحفاظ على بيانات العملاء بنسبة 100% وذلك بسبب تواجدنا على شبكة الإنترنت مع احتمالية تعرضنا لبعض التهديدات والمخاطر التي من الممكن أن تؤدي إلى الكشف عن بيانات العملاء, لذلك تنصح إدارة موقع أوامر توظيف العملاء بضرورة إبلاغهم والتواصل معهم على الفور في حال مواجهتهم لأي مشكلة أو لشعورهم بوجود تهديدات أو مخاطر تهدد بياناتهم الموجودة بداخل موقعنا حتى تتخذ إدارة الموقع الإجراءات اللأزمة لوقف ومنع تلك التهديدات والعمل على منعها من الحدوث مستقبلًا.</div>\r\n<div>&nbsp;</div>\r\n<h3>حقوق موقع أوامر توظيف:-</h3>\r\n<div>&nbsp;</div>\r\n<div>1- نعمل كل ما يلزم من أمور حتى يظهر موقعنا بشكل مثالي أمام العملاء لذلك نقوم بتنفيذ كافة التعديلات والإضافات والتغييرات والتحسينات والتحديثات التي يحتاجها موقعنا في أي وقت رأت إدارة موقعنا ضرورة القيام بذلك, ولهذه الأسباب ننصح كافة العملاء بضرورة رؤية هذه السياسة باستمرار للتعرف على أي شيء قمنا بتنفيذه لها, لأن في حالة تنفيذنا لأي شيء خاص بهذه السياسة سيصبح ساري المفعول ومطبق على كافة العملاء.</div>\r\n<div>&nbsp;</div>\r\n<div>2- تمتلك إدارة موقعنا الحق بشكل كامل في توظيف أو توكيل أشخاص أو جهات أو شركات حتى يقوموا بآداء خدمات بالنيابة عنا.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h3>الإتصال بنا:-</h3>\r\n<div>&nbsp;</div>\r\n<div>نسعد عندما يتواصل العملاء مع الدعم الفني الخاص بنا في أي وقت وذلك حتى نجيب لهم على أي استفسارات أو تساؤلات يحتاجون توضيح لها من قبلنا.</div>\r\n<div>&nbsp;</div>\r\n<h3>من يحق له استخدام المنصة ؟</h3>\r\n<div>&nbsp;</div>\r\n<div>يمكن تحديد الفئة الاكثر من 18 سنة هم اللذين يتوفرون على حق الولوج لجميع خدمات الموقع او على حسب كل منطقة و تخويلها للولوج لمثل هذه الخدمات .&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h3>تاريخ الاتفاقية:-</h3>\r\n<div>&nbsp;</div>\r\n<div>قمنا بإجراء أخر تحديث لهذه الاتفاقية بتاريخ 22/6/2022م.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h3>Privacy policy of Awamir Tawzif site:-</h3>\r\n<div>We give a lot of care about the privacy of your personal data that you provide us with it so that we follow the suitable procedures in order to keep your personal data in a safe place. For these reasons, we ask you to agree to our policy with its items in order to be able to use our site and enjoy its services. The privacy policy for Awamir Tawzif site contains the following items:-</div>\r\n<div>&nbsp;</div>\r\n<h3>The data that Awamir Tawzif site requests from the clients of the site:-</h3>\r\n<div>&nbsp;</div>\r\n<div>1- Our site needs some very important data in order for the client to be able to register for the job that he wants to join. The client is obligated to provide us with all the data that we need from him in this case.</div>\r\n<div>2- Our technical support requests some personal data of the clients when they communicate with them through whatsapp in order to carry out their own CV and the clients are fully committed to providing us with all the data that we need from them in this case.</div>\r\n<div>3- We request some important data when the client announces his desire to carry out a CV for him and we also request some personal data when we agree with him about the price of carrying out a CV service for him and the client is obligated to provide us with the data that prove that he has made a bank transfer of our account number with the amounts that agreed with the client.</div>\r\n<div>&nbsp;</div>\r\n<h3>The data that collects from you:-</h3>\r\n<div>&nbsp;</div>\r\n<div>We collect automatically some data from you so that we collect some data about the browser and the device that you use when you visit our site and we also collect some data about your IP address.</div>\r\n<div>&nbsp;</div>\r\n<h3>The uses of Awamir Tawzif site for the personal data of the clients:-</h3>\r\n<div>&nbsp;</div>\r\n<div>The administration of our site uses the data of the clients in many necessary matters related to us and the clients and these matters are represented in the following:-</div>\r\n<div>1- In order for Awamir Tawzif site to be able to deliver these data to the judicial or governmental entities if these entities request that from the administration of our site.</div>\r\n<div>2- In order for us to send the Jobs ads available on our site to the clients.</div>\r\n<div>3- In order for us to answer all client inquiries who want from us to get answers to those inquiries.</div>\r\n<div>4- In order for us to be able to largely improve our site.</div>\r\n<div>5- For any other matters that the administration of Awamir Tawzif site sees it is necessary for it to use the data of the clients in these matters.</div>\r\n<h3>Dealing with third parties:-</h3>\r\n<div>Awamir Tawzif site has the right to deal and cooperate with third parties in order for them to offer their services to the clients of our site or in order for carrying out the services that we assign it to them to do it. We have the right to provide these third parties with the personal data of the clients to use them while they are carrying out&nbsp;their services to the clients.</div>\r\n<div>&nbsp;</div>\r\n<h3>The rights of the clients of Awamir Tawzif site:-</h3>\r\n<div>&nbsp;</div>\r\n<div>1- The client can modify his personal data that we have registered with the job that he wants to join and he can do it by contacting our technical support.</div>\r\n<div>2- We are keeping the secrecy of all financial and other transactions which we did with the clients and we do not buy or rent or share the personal data and information of the clients with any outside party that we do not cooperate with them. We use the data of the clients in matters which we are responsible for carrying out by the clients.</div>\r\n<div>&nbsp;</div>\r\n<h3>Protecting the personal data of the clients on Awamir Tawzif site:-</h3>\r\n<div>&nbsp;</div>\r\n<div>Our site follows the necessary procedures so that client data is kept secure on our site but we are sorry that we cannot guarantee to maintain 100% of the data of the client due to our presence on the internet and it is probable that we may face some threats and risks which may lead to disclosure of client data so that the administration of Awamir Tawzif site advise the clients that it is necessary to inform them and immediately contact with them if they face any problem or they feel that there are threats or risks threaten their data inside our site so that our site administration takes the necessary procedures to stop and prevent these threats and work to prevent them from happening in the future.</div>\r\n<div>&nbsp;</div>\r\n<h3>The rights of Awamir Tawzif site:-</h3>\r\n<div>&nbsp;</div>\r\n<div>1- We do all necessary things in order to our site appear in a perfect way in front of our clients so that we carry out all modifications, additions, changes, improvements and updates needed by our site at any time that our site administration sees it necessary to do that and for those reasons we advise all clients that it is necessary to continually see this policy to know for anything that we have carried for it, because if we carry out anything specific to this policy, it will in force and apply to all clients.</div>\r\n<div>2- The administration of our site completely has the right to employ or assigns individual or entities or companies to perform services on our behalf.</div>\r\n<div>&nbsp;</div>\r\n<h3>Contact us:-</h3>\r\n<div>&nbsp;</div>\r\n<div>We are happy when the clients contact our technical support at any time of the day in order to answer any inquiry or question that they&nbsp;want clarification to it from us.</div>\r\n<div>&nbsp;</div>\r\n<h3>Date of the Agreement:-</h3>\r\n<div>&nbsp;</div>\r\n<div>We have done the last update for this agreement in the date of 22/6/2022.</div>\r\n<div>&nbsp;</div>', 'pages', '2022-09-04 18:38:46', '2022-09-12 13:11:13'),
(37, 'terms', '<h3><strong><u>الشروط والأحكام شروط الأستخدام</u></strong></h3>\r\n<div><strong><u>&nbsp;</u></strong></div>\r\n<p dir=\"rtl\">ان إستخدامكم لموقع أوامر توظيف وتطبيقاته يعتبر قبولا منكم بهذه الشروط والأحكام والسياسات التي تسري منذ تاريخ أول إستخدام منكم للموقع، ويحتفظ موقع (أوامر توظيف) بالحق في تغيير هذه الشروط و الأحكام في أي وقت يراه مناسب ويجب عليكم مراجعة المعلومات المنشورة بإنتظام على موقعنا بشكل مستمر للحصول على التعديلات و التغييرات في الوقت المناسب لذلك، والإستمرار في إستخدام الموقع يعتبر موافقة منك على هذه الإتفاقية بصيغتها المعدلة والحديثة بموجب التغييرات التي تم نشرها، إذا لم يتم قبول هذه الشروط والأحكام كاملة، يجب العدول والتوقف الفوري عن استخدام هذا الموقع وتطبيقاته وملحقاته.&nbsp;</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3><strong>الشعارات :</strong></h3>\r\n<p dir=\"rtl\">- جميع شعارات وصور الجهات الحكومية والشركات الخاصة حقوق ملكية خاص لهم، ولايملك موقع (أوامر توظيف) أي مسؤولية لإستخدام هذه الشعارات أو الصور (Logo)، فقط لتسهيل وإيصال صورة سريعة للقارئ، وفي حالة إعتراض إحدى الجهات أو الشركات لإستخدام الشعار الخاص بهم فلهم الحق بمخاطبتنا من خلال بريدهم الإلكتروني الرسمي إلى بريدنا الإلكتروني&nbsp; لإزالة الشعار أو الصور أو عدم كتابة أي خبر مستقبلاً عنهم مع توضيح السبب إذا أمكن.</p>\r\n<h3><strong>الوظائف المبوبة:</strong></h3>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<div>- تم إستحداث قسم جديد بتاريخ 2022/04/21م بمسمى (وظائف مبوبة)، يتم من خلالها جمع قصاصات الصحف الوظيفية وأيضاً من مواقع التواصل الإجتماعي، ونحن (أوامر توظيف) بدورنا ننبه المستخدمين والزوار لموقعنا من التواصل مع أي جهة من خلال هذا القسم أو الأقسام الآخرى السابقة، نحن (أوامر توظيف) نخلي أي مسؤولية عن صحة هذه الإعلانات أو أي ضرر سواء مادي أو معنوي أو غير ذلك يلحق بالمستخدم تجاه تقديمه الملفات ومعلوماته أو إرساله أو حضوره أو التواصل بأي شكلاً كان، وينبغى على المستخدم التأكد من الجهة المراد التقدم إليها قبل أي عملية تواصل أو إرسال لسيرته الذاتية لأي جهة كانت، فنحن (أوامر توظيف) مجرد وسيط بين تلك الإعلانات والمستخدمين.</div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3><u><strong>الشروط والأحكام الخاصة بموقع أوامر توظيف</strong></u>:-</h3>\r\n<div>&nbsp;</div>\r\n<p dir=\"rtl\">قامت إدارة موقع أوامر توظيف بوضع الشروط والأحكام والبنود الموجودة في هذه الاتفاقية وذلك من أجل أن يلتزم كافة المستخدمين بتلك الشروط والأحكام والبنود وألا يقوموا بمخالفتها لأن مخالفة الشروط أوالأحكام أوالبنود الخاصة بنا أو أحدًا منا فمن الممكن أن يؤدي ذلك إلى إيقاف أو حظر أو تعليق حساب المستخدم المخالف.</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3><u><strong>المقدمة:-</strong></u></h3>\r\n<p dir=\"rtl\">أنه من الضروري أن يلتزم كافة المستخدمين بهذه الاتفاقية ويوافقوا على كافة الشروط والأحكام والبنود الموجودة فيها لأن في حال عدم موافقة أي مستخدم على أي من شروطنا أو أحكامنا أو بنودنا ففي هذه الحالة نرجو من هذا المستخدم الخروج على الفور من موقعنا وألا يقوم باستخدامه ألا بعد موافقته على كافة الشروط والأحكام والبنود الخاصة بموقعنا,&nbsp;<u><strong>الشروط والأحكام الخاصة بموقع أوامر توظيف تحتوي على البنود التالية:-</strong></u></p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3><u><strong>شروط التسجيل بموقع أوامر توظيف:-</strong></u></h3>\r\n<p dir=\"rtl\">1- يلتزم العميل بإبلاغنا بأنه لا يوجد أي شيء قانوني أو شرعي يمنعه من استخدام موقعنا.</p>\r\n<p dir=\"rtl\">2- يجب أن يكون سن العميل الراغب بالتسجيل بموقعنا هو 18 عام على الأقل حتى يتمكن من التسجيل بالوظيفة أو لنتمكن من تنفيذ سير ذاتية له وحتى يتمكن من التعامل معنا لأن موقعنا غير موجهه للأطفال.</p>\r\n<p dir=\"rtl\">3- يلتزم العميل بتزويد موقعنا بكافة البيانات التي نحتاجها منه كما يلتزم العميل بأن تكون هذه البيانات صحيحة بنسبة 100% ويلتزم العميل بمراجعة تلك البيانات قبل تزويدنا بتلك البيانات.</p>\r\n<p dir=\"rtl\">4- يتعهد العميل بالموافقة على كافة شروطنا وأحكامنا الحالية, كما يتعهد العميل بالموافقة أيضًا على شروطنا وأحكامنا التي يمكن لنا إضافتها إلى هذه الاتفاقية بالمستقبل.</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3><u><strong>الاستفسارات والنزاعات:-</strong></u></h3>\r\n<p dir=\"rtl\">1- الدعم الفني الخاص بنا متواجد بشكل دائم للرد على كافة استفساراتكم فلا تتردوا وتواصلوا معنا على الفور في حال وجود أي استفسارات لديكم وتحتاجون إجابة لها.</p>\r\n<p dir=\"rtl\">2- الدعم الفني الخاص بنا أيضًا موجود لحل أي مشكلة تواجهكم بأي وقت لذلك يلتزم كافة العملاء بالحلول التي يقدمها لهم الدعم الفني الخاص بنا, وفي حال صعوبة حل تلك المشكلة بالطرق الودية عبر الدعم الفني فأن أحد أفراد إدارة موقعنا سيقوم بالتواصل مع العميل للعمل على حل مشكلته.</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3><u><strong>التعديلات والتغييرات والإضافات والتحسينات والتحديثات التي يتم إجرائها إلى موقع أوامر توظيف:-</strong></u></h3>\r\n<p dir=\"rtl\">1- تطور إدارة موقع أوامر توظيف موقعها الإلكتروني بشكل متواصل لذلك تلجأ إدارة موقعنا إلى تنفيذ أي تعديلات أو تغييرات أو إضافات أو تحسينات أوتحديثات إلى موقعنا الإلكتروني حتى يصبح بالشكل الذي يتمناه العملاء, لذلك تنصح إدارة موقعنا العملاء بضرورة رؤية هذه الاتفاقية باستمرار للتعرف على أي جديد قمنا بتنفيذه لها.</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3><u><strong>حدود مسؤوليتنا:-</strong></u></h3>\r\n<p dir=\"rtl\">نرجو العلم بأن حدود مسؤوليتنا متمثلة في &nbsp;البحث عن الوظائف وأن الوظائف المتاحة بموقعنا هي وظائف صحيحة وقد يصدر منا الأخطأ في بعض الروابط والشروط والصور بصورة غير مقصودة وان لاحظنا هذا سنقوم بتغييره على الفور كما أننا نقوم بإضافة رابط من مصدر الوظيفة الأصلي في الخانة المخصصة لذلك, كما أننا نقوم بالتسجيل في الوظيفة التي يريدها العميل ونقوم بتنفيذ وتصميم سيرة ذاتية للعميل من بعد اتفاقنا مع العميل على ثمن هذه السيرة الذاتية ويكون الدفع بعد إتمام عملية التسجيل أو عمل السيرة الذاتية وتنتهي مسؤوليتنا عند تنفيذنا لهذه الأمور فقط ولن نكون مسؤولين عن قبول العميل في الوظيفة التي قمنا بتسجيله فيها كما أننا غير مسؤولين عن قبول أو رفض العميل بهذه الوظيفة كما أننا غير مسؤولين عن متابعة حالة طلب تسجيل العميل للوظيفة التي يرغب بالالتحاق بها.</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3><u><strong>إخلاء المسؤولية:-</strong></u></h3>\r\n<p dir=\"rtl\">1- تخلي إدارة موقع أوامر توظيف مسؤوليتها الكاملة في حال تزويد العميل للموقع ببيانات خاطئة وتسبب ذلك بضرر للعميل ففي هذه الحالة يتحمل العميل بمفرده مسؤولية هذا الخطأ وتوابعه.</p>\r\n<p dir=\"rtl\">2- تخلي إدارة موقع أوامر توظيف مسؤوليتها الكاملة في حال استخدام أو إساءة استخدام العميل لموقعنا الإلكتروني وتسبب ذلك بضرر مباشر أو بضرر غير مباشر للعميل.</p>\r\n<p dir=\"rtl\">3- نخلي مسؤوليتنا الكاملة عن متابعة طلب التسجيل الخاص بالعميل والعميل يكون مسؤول عن متابعة طلبه بمفرده, كما أننا غير مسؤولين في حالة قبول أو رفض طلب العميل للحصول على وظيفة, كما أننا غير مسؤولين عن مواعيد إعلان نتائج الوظائف أو الترشح لهذه الوظائف.</p>\r\n<p dir=\"rtl\">4- نخلي مسؤوليتنا الكاملة عن أية أضرار مادية أو معنوية أو أي نوع آخر من الأضرار تلحق بأي مستخدم نتيجة تزويد العميل لنا ببياناته الشخصية أو بملفات أو عند تزويده ببياناته عند طلبه لأحد خدماتنا أو عند تواصله معنا أو لأي سبب آخر.</p>\r\n<p dir=\"rtl\">5- نخلي مسؤوليتنا الكاملة بما يسمح به القانون عن تقديم أي ضمانات للعملاء عند استخدامهم لموقعنا.</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3><u><strong>المحظور فعله عند التعامل مع موقع أوامر توظيف:-</strong></u></h3>\r\n<p dir=\"rtl\">1- يمنع أن يتقمص أحد العملاء شخصية شخص آخر أو مؤسسة أخرى وذلك من أجل أن نسجل له في وظيفة أو حتى نقوم له بعمل سيرة ذاتية ويتحمل العميل المسؤولية القانونية بمفرده عن هذا التزوير إذا قام بفعله مع إمتلاكنا الحق بشكل كامل في معاقبة هذا العميل بالطريقة التي تناسبنا.</p>\r\n<p dir=\"rtl\">2- يمنع أن يتم مطالبتنا بنشر أي مواد إعلانية تسبب أية أضرار لموقعنا الإلكتروني.</p>\r\n<p dir=\"rtl\">3- يمنع أن يقوم أي مستخدم بإنتهاك حقوق أطراف ثالثة عند تعامله معنا.</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3><u><strong>الإجراءات المتبعة في حالة حدوث انقطاع في الخدمة بموقع أوامر توظيف:-</strong></u></h3>\r\n<p dir=\"rtl\">نفعل كل ما في وسعنا حتى يعمل موقعنا بشكل منتظم وطبيعي دون وقوع أي انقطاع في الخدمة به, ولكن على الرغم من الإجراءات التي نتبعها لكي يعمل موقعنا بشكل طبيعي ولكن للأسف لا يمكن ضمان عمله بشكل طبيعي بنسبة 100% بسبب تواجدنا على شبكة الإنترنت مع إحتمالية تعرضنا للكثير من المشاكل والتهديدات على هذه الشبكة كما من الممكن أن يحدث انقطاع في الخدمة عند قيامنا بعمل أي تحسينات أو تحديثات بموقعنا, لذلك لن نتحمل أي مسؤولية عن أية أضرار تلحق بأي عميل نتيجة حدوث هذا الأعطال لأنها حدثت لأسباب خارجة عن إرادتنا لذلك في حال ملاحظتنا لوجود أي مشاكل أو إعطال بموقعنا فأننا سنتخذ إجراءات عاجلة للوقوف على سبب العطل والعمل على إصلاحه بأقرب وقت ممكن عبر تكليف الموظف المختص ليقوم بإصلاح هذا العطل.</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3><u><strong>شروط التعامل مع موقع أوامر توظيف:-</strong></u></h3>\r\n<p dir=\"rtl\">1- يلتزم العميل بشكل كامل باستخدام موقعنا بشكل قانوني لا يسبب لنا أية أضرار, كما يلتزم العميل باستخدام موقعنا بشكل يتوافق مع شريعتنا الإسلامية.</p>\r\n<p dir=\"rtl\">2- يمنع بشكل كامل أن يقوم أي طرف بإنتهاك حقوقنا أو أن يقوم أي مستخدم بتوجيه أي إساءة لأي مستخدم آخر موجود بموقعنا أو أن يقوم أي مستخدم بتوجيه أي إساءة لموقعنا سواء تمت هذه الإساءة بداخل أو خارج موقعنا ومن يفعل أي شيء من تلك الأمور فأننا سنقوم بإتخاذ إجراءات عقابية عاجلة لمعاقبة من قام بفعل ذلك.</p>\r\n<p dir=\"rtl\">3- يلتزم العميل بتزويدنا ببيانات شخصية حقيقية ودقيقة وصحيحة بنسبة 100% حتى نتمكن من تسجيله بالوظيفة التي يرغب فيها.</p>\r\n<p dir=\"rtl\">4- يمكن للعميل متابعة آخر أخبارنا ومتابعة أيضًا الوظائف المتاحة بموقعنا عبر متابعتنا على منصات التواصل الاجتماعي المتواجدين فيها وهم تيلجرام, إنستغرام وتويتر.</p>\r\n<p dir=\"rtl\">5- يقوم العميل برؤية إعلانات الوظائف المتاحة بموقعنا ثم يقوم العميل بطلب تسجيل في الوظيفة التي يرغب بالالتحاق بها , كما يمكن للعميل طلب منا تنفيذ وتصميم سيرة ذاتية خاصة به بناء على البيانات الشخصية التي يزودنا بها.</p>\r\n<p dir=\"rtl\">6- يلتزم العميل بدفع المبالغ المتفق عليها معنا وذلك من بعد تنفيذنا لعملية التسجيل الخاصة به أو بعد تنفيذنا للسيرة الذاتية الخاصة به.</p>\r\n<p dir=\"rtl\">7- يلتزم كافة المستخدمين باستخدام موقعنا بشكل يتوافق مع اللوائح والقوانين والأنظمة الخاصة بالمملكة العربية السعودية.</p>\r\n<p dir=\"rtl\">8- نرجو العلم بأننا ليس لدينا أي علاقة أو تواصل مع الجهات التي نقوم بالإعلان عن الوظائف المتاحة لديهم.</p>\r\n<p dir=\"rtl\">9- نرجو العلم بأننا نقوم بارسال أهم الوظائف المتاحة بموقعنا للعملاء وذلك من خلال خدمة رسائل البريد الإلكتروني التي نوفرها للعملاء.</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3><u><strong>الحقوق الفكرية وحقوق النشر الخاصة بموقع أوامر توظيف:-</strong></u></h3>\r\n<p dir=\"rtl\">1- يلتزم كافة المستخدمين بألا يقوموا بنشر أو تحميل أي فيروسات أو برامج ضارة بموقعنا لأن أي شخص سيقوم بفعل ذلك فأننا سنتخذ على الفور إجراءات عقابية عاجلة ضد من قام بفعل ذلك.</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<div>2- نرجو العلم بأن كافة أنواع المحتوى الموجودة بموقع أوامر توظيف من محتوى ووظائف وإعلانات وصور وغيرها من أنواع المحتوى الأخرى هي مملوكة بشكل كامل لإدارة الموقع ويمنع بشكل كامل أن يقوم أي شخص أو جهة باستخدام أو إعادة استخدام أو نسخ أو لصق أي محتوى خاص بنا كما يمنع بشكل كامل أن يقوم أي شخص أو جهة بإنتهاك أو محاول إنتهاك حقوقنا أو أحدًا منها لأن من يقوم بفعل أي شيء من تلك الأمور فأننا سنتخذ إجراءات قانونية عقابية عاجلة ضد من قام بفعل ذلك</div>\r\n<div>&nbsp;</div>\r\n<h3>alshuruta w al\'ahkam</h3>\r\n<p>shurut aliaistikhdam</p>\r\n<div>an \'iistikhdamikum limawqie \'awamir tawzif watatbiqatih yuetabar qubulan minkum bihadhih alshurut wal\'ahkam walsiyasat alati tasri mundh tarikh \'awal \'iistikhdam minkum lilmuaqae, wayahtafiz mawqie (\'awamir tawzifin) bialhaqi fi taghyir hadhih alshurut w al\'ahkam fi \'ayi waqt yarah munasib wayajib ealaykum murajaeat almaelumat almanshurat bi\'iintizam ealaa mawqieina bishakl mustamirin lilhusul ealaa altaedilat w altaghyirat fi alwaqt almunasib lidhalika, wal\'iistimrar fi \'iistikhdam almawqie yuetabar muafaqatan mink ealaa hadhih al\'iitfaqiat bisighatiha almueadalat walhadithat bimujib altaghyirat alati tama nashruha, \'iidha lam yatima qubul hadhih alshurut wal\'ahkam kamilatan, yajib aleudul waltawaquf alfawriu ean aistikhdam hadha almawqie watatbiqatih wamulhaqatihi.</div>\r\n<h3>alshiearat :</h3>\r\n<div>- jamie shiearat wasuar aljihat alhukumiat walsharikat alkhasat huquq milkiat khasun lahum, walayumlik mawqie (\'awamir tawzifi) \'ayi maswuwliat li\'iistikhdam hadhih alshiearat \'aw alsuwar (Logo), faqat litashil wa\'iisal surat sarieat lilqarii, wafi halat \'iietirad \'iihdaa aljihat \'aw alsharikat li\'iistikhdam alshiear alkhasi bihim falahum alhaqu bimukhatabatina min khilal baridihim al\'iiliktrunii alrasmii \'iilaa biridina al\'iiliktruni&nbsp; li\'iizalat alshiear \'aw alsuwar \'aw eadam kitabat \'ayi khabar mstqblaan eanhum mae tawdih alsabab \'iidha \'amkana.</div>\r\n<h3>alwazayif almububatu:</h3>\r\n<div>- tama \'iistihdath qism jadid bitarikh 2022/04/21m bimusamaa (wazayif mububati), yatimu min khilaliha jame qusasat alsuhuf alwazifiat waydaan min mawaqie altawasul al\'iijtimaeii, wanahn (\'awamir tawzifin) bidawrina nanabih almustakhdamin walzuwaar limawqieina min altawasul mae \'ayi jihat min khilal hadha alqisam \'aw al\'aqsam alakhraa alsaabiqati, nahn (\'awamir tawzifi) nakhli \'aya maswuwliat ean sihat hadhih al\'iielanat \'aw \'ayi darar sawa\' madiyun \'aw maenawiun \'aw ghayr dhalik yulhaq bialmustakhdam tujah taqdimih almilafaat wamaelumatih \'aw \'iirsalah \'aw hudurah \'aw altawasul bi\'ayi shklaan kan, wayanbaghaa ealaa almustakhdam alta\'akud min aljihat almurad altaqadum \'iilayha qabl \'ayi eamaliat tawasul \'aw \'iirsal lisiratih aldhaatiat li\'ayi jihat kanti, fanahn (\'awamir tawzifi) mujarad wasit bayn tilk al\'iielanat walmustakhdimina</div>\r\n<p>&nbsp;</p>\r\n<p dir=\"rtl\">&nbsp;</p>\r\n<h3>The terms and conditions of Awamir Tawzif site:-</h3>\r\n<div>&nbsp;</div>\r\n<div>The administration of Awamir Tawzif site has put the terms, conditions and items that exist in this agreement in order for all users to obligate on these terms, conditions and items and they do not violate it because if any user violate our terms, conditions and items or one of them, this will lead to stopping or blocking or suspending the offending user account.</div>\r\n<p>&nbsp;</p>\r\n<h3>The introduction:-</h3>\r\n<div>It is necessary that all users obligate to this agreement and agree upon all terms, conditions and items which exists on it because if any user does not agree upon any of our terms, conditions and items in this case, we ask this user to immediately exit our site and not use it unless he agrees to all the terms, conditions and items exist on our site, the terms, conditions and items of Awamir Tawzif site contains the following items:-</div>\r\n<p>&nbsp;</p>\r\n<h3>The conditions of registering on Awamir Tawzif site:-</h3>\r\n<div>1- The client obligates to inform us that there is not any legal or legitimate matter that prevents him from using our site.</div>\r\n<div>2- The age of the user who wants to register on our site must be at least 18 years old in order to be able to register for the job or in order for us to carry out a CV for him and in order for him to deal with us because our site does not direct to children.&nbsp;</div>\r\n<div>3- The client obligates to provide our site with all the data that we need from him, the client is obligated to that data is being100% correct and the client is obliged to review that data before providing us with that data.</div>\r\n<div>4- The client admits that he agrees upon all our current terms and conditions and the client admits that he agrees upon all our current terms and conditions that we can add to this agreement in the future.</div>\r\n<p>&nbsp;</p>\r\n<h3>Inquiries and disputes:-</h3>\r\n<div>1- Our technical support always exists to answer all your inquiries so, do not hesitate and immediately contact us if you have any inquiries that you need an answer to them.</div>\r\n<div>2- Our technical support also exists to solve any problem face you at any time so the clients obligate to these solutions which our technical support provided to them and if it is difficult to solve this problem in friendly ways through our technical support, in this case, one member of our administration will contact the client to work on solving his problem.</div>\r\n<p>&nbsp;</p>\r\n<h2><br>Modifications, changes, additions, improvements and</h2>\r\n<h2>&nbsp;updates are carried out Awamir Tawzif site:-</h2>\r\n<div>&nbsp;</div>\r\n<div>1- The administration of Awamir Tawzif site continually develops his site so that the administration of our site resort to carrying out any modifications, changes, additions, improvements or updates to our site in order to become as the shape that the clients want. So that the administration of our site advises the clients that it is necessary to continually see this agreement to know about anything new that we have carried out for it.</div>\r\n<div>2- When the administration of Awamir Tawzif site carry out any modifications, changes, additions, improvements or updates to our site so they will try to send notifications to the clients to make them know what we have done.</div>\r\n<p>&nbsp;</p>\r\n<h3>The limits of our responsibility:-</h3>\r\n<div>We want all users to know that the limits of our responsibility are represented in searching for jobs and the jobs available on our site are correct and we also add a link from the original job source in the field designated for that we are also registering for the job which the client wants and we are also carrying out and designing a CV for the client after dealing with the client upon the price of the CV and the payment process will be done after completing the registration process or after accomplishing the CV and our responsibility ends only when we did these things, we will not be responsible for the acceptance of the client in this job or not which we registered him in it. We will not also be responsible for accepting or rejecting the client for this job and we will not also be responsible for following up on the status of the client\'s registration request for the job who wishes to join.</div>\r\n<p>&nbsp;</p>\r\n<h3>Disclaimer:-</h3>\r\n<div>1- The administration of Awamir Tawzif site disclaims its full responsibility if the client provides our site with wrong data and this caused damage to the client, in this case, the client will bear the responsibility for this fault and its consequences.&nbsp;&nbsp;</div>\r\n<div>2- The administration of Awamir Tawzif site disclaims its full responsibility if the client uses or misuses our website and this caused direct harm or indirect harm to the client.</div>\r\n<div>3- We disclaim our full responsibility for following up the registration process of the client and the client is only responsible for following up his request alone and we are not responsible if the client\'s request is accepted or rejected to get the job and we also are not responsible for announcing the results of jobs or running for these jobs.</div>\r\n<div>4- We disclaim our full responsibility for any financial and moral damage or other damages that happen to any user as a result of providing the client with personal data or files to us, when we are providing him with his data when he is requesting one of our services or when he contact us or for any other reason.</div>\r\n<div>5- We disclaim our full responsibility as permitted by the law to provide any guarantees to the clients when they use our site.</div>\r\n<p>&nbsp;</p>\r\n<h3>What is forbidden when you deal with Awamir Tawzif site:-</h3>\r\n<div>1- It is forbidden for a client to impersonate someone else or another organization in order for us to register for him in a job or in order for us to accomplish a CV and the client is only responsible for this forgery if he does that we have the complete right to punish this client in the manner that suits us.</div>\r\n<div>2- It is forbidden for anyone to demand from us to publish any advertising materials that cause any damage to our site.</div>\r\n<div>3- It is forbidden for any user violates the rights of third parties when they are dealing with us.</div>\r\n<p>&nbsp;</p>\r\n<h3>The procedures that we follow if it happens service disruptions on Awamir Tawzif site:-</h3>\r\n<div>We do all we can in order to make our site works regularly and normally without occurring service disruptions to it. Although the procedures that we follow in order to make our site works normally but we are sorry to tell you that we cannot guarantee working 100% in normal way Because of our presence on the Internet where it is possible that we face a lot of problems and risks on the internet and it is possible that occur service disruptions when we do updates or improvements to our site so that we will not bear any responsibility for any damage happen to any client as a result of malfunctions because they occurred for reasons beyond our control and if we notice that there is any problems or malfunctions so we will urgently take procedures to stop&nbsp; malfunction Work to repair it as soon as possible by assigning the competent staff member to repair the malfunction.</div>\r\n<p><br>Conditions of dealings with Awamir Tawzif site:-</p>\r\n<div>1- The client is full obligated to use our site in legal way does not cause any harm to us and the client is also obliged to use our site in accordance with our Islamic law.</div>\r\n<div>2- It is forbidden for any party to violate our rights or any user would direct any abuse to any other user on our site or any user directs any abuse to our site, whether this abuse is done inside or outside our site and anyone does any of these things, we will take urgent punitive procedures to punish those who have done that.</div>\r\n<div>3- The client is obligated to provide us with 100% correct and accurate personal data so we can register for him for the job that he wants.</div>\r\n<p>4- The client can follow up our latest news and follow up the jobs available on our site through following us on our social media platforms such as Telegram, Instagram and Twitter.<br>5- The client can see Job ads available on our site then, the client request from to register for him for the job which he wants to join. The client can also ask us to carry out and design his own CV based on the personal data that he provides us with it.<br>6- The client is obligated to pay the amounts agreed with us after we have carried out his registration process or after we have carried out his CV.<br>7- All users must obligate to use our site in accordance with the regulations, laws and regimes of Saudi Arabia.<br>8- We want all users to know that we do not have any relationship or communication with those who we advertise upon the jobs which are available with them.<br>9- We want all users to know that we send the most important jobs available on our site to the clients and we do that through our email service to the clients.<br><br>Intellectual rights and copyrights of Awamir Tawzif site:-<br>1- All clients obligate not to publish or download any viruses or malware on our site because anyone will do that; we will immediately take urgent punitive procedures against those who have done that.<br>2- We want all the clients to know that all types of content which exist on Awamir Tawzif site from content, jobs, ads, photos and other types of content are fully owned for the administration of our site so it is completely forbidden that Any person or entity use or reuse, or copy or paste any of our content and it is completely forbidden for any person or entity to violate or attempt to violate our rights or any one of our rights because anyone does any of these things we will take urgent punitive legal procedures against those who have done that.&nbsp;</p>', 'pages', '2022-09-04 18:38:46', '2022-09-12 13:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'ahmed@gmail.com', '2022-08-23 08:22:41', '2022-08-23 08:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '22 Galena Blake', 'ahmed@test.com', NULL, '$2y$10$pEmJvYxv40RUVrKO6Fxoq.7pyaFJfUGZdigcKhZR6djf11Y4Bk21m', NULL, '2022-07-22 13:35:03', '2022-09-08 22:12:30'),
(3, 'Brandon Bruce', 'ahmed@ahmed.com', NULL, '$2y$10$CNcntVzbF9d1yv34er0mXOWUj9HVHgxmL/hIHF7KTsTBVl5Q5pjja', NULL, '2022-08-30 20:39:03', '2022-08-30 20:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `viewers`
--

CREATE TABLE `viewers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `viewers`
--

INSERT INTO `viewers` (`id`, `date`, `views`, `created_at`, `updated_at`) VALUES
(1, '2022-09-13', 3, '2022-09-14 00:29:10', '2022-09-14 00:29:35'),
(2, '2022-05-10', 5, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(3, '2022-05-11', 7, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(4, '2022-05-12', 7, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(5, '2022-05-13', 20, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(6, '2022-05-14', 12, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(7, '2022-05-15', 19, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(8, '2022-05-16', 20, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(9, '2022-05-17', 28, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(10, '2022-05-18', 30, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(11, '2022-05-19', 17, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(12, '2022-05-20', 26, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(13, '2022-05-21', 26, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(14, '2022-05-22', 20, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(15, '2022-05-23', 18, '2022-09-14 00:33:21', '2022-09-14 00:33:21'),
(16, '2022-05-24', 33, '2022-09-14 00:33:22', '2022-09-14 00:33:22'),
(17, '2022-05-25', 2, '2022-09-14 00:33:22', '2022-09-14 00:33:22'),
(18, '2022-05-26', 4, '2022-09-14 00:33:22', '2022-09-14 00:33:22'),
(19, '2022-05-27', 19, '2022-09-14 00:33:22', '2022-09-14 00:33:22'),
(20, '2022-05-29', 1, '2022-09-14 00:33:22', '2022-09-14 00:33:22'),
(21, '2022-05-30', 7, '2022-09-14 00:33:23', '2022-09-14 00:33:23'),
(22, '2022-05-31', 26, '2022-09-14 00:33:23', '2022-09-14 00:33:23'),
(23, '2022-08-16', 5, '2022-09-14 00:33:23', '2022-09-14 00:33:23'),
(24, '2022-09-15', 3, '2022-09-15 20:17:12', '2022-09-15 21:42:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_country_id_foreign` (`country_id`),
  ADD KEY `posts_city_id_foreign` (`city_id`),
  ADD KEY `posts_jobtype_id_foreign` (`jobtype_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `viewers`
--
ALTER TABLE `viewers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `viewers`
--
ALTER TABLE `viewers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `posts_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `posts_jobtype_id_foreign` FOREIGN KEY (`jobtype_id`) REFERENCES `job_types` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
