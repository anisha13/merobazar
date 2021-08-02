-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 08:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olx`
--

-- --------------------------------------------------------

--
-- Table structure for table `admanagements`
--

CREATE TABLE `admanagements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setlocation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admanagements`
--

INSERT INTO `admanagements` (`id`, `image`, `url`, `setlocation`, `status`, `created_at`, `updated_at`) VALUES
(2, '1608790475Ambe_1230x100Dark-Shade_psd-2.gif', NULL, 'Featured', '1', '2020-12-24 06:14:35', '2021-08-01 03:19:57'),
(3, '160879128911014421229564212257.gif', NULL, 'below slider', '0', '2020-12-24 06:28:09', '2020-12-24 06:30:48'),
(4, '160879131711014421229564212257.gif', NULL, 'below slider', '1', '2020-12-24 06:28:37', '2021-08-02 14:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `contact`, `address`, `image`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anisha', 'admin@email.com', NULL, '$2y$12$yUuFf189CvO25wwf0xGvXu1cfAfoBmm3/97sJjWWOnnUYILSPsavm', '9803889117', 'kuleshwor', '1627921142IMG_20210223_071321.jpg', 'admin', NULL, '2020-12-18 04:47:45', '2021-08-02 16:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `slug`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Featured', NULL, NULL, '2020-12-23 15:36:07', '2021-08-01 02:15:15', '1'),
(3, 'New Arrival', NULL, NULL, '2020-12-25 23:09:03', '2020-12-25 23:09:07', '1'),
(5, 'Trending', NULL, NULL, '2021-08-02 16:03:26', '2021-08-02 16:16:41', '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `url`, `status`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(4, 0, 'Vechicle', NULL, 'vehicle', 1, NULL, '2020-12-23 09:31:59', '2020-12-29 18:23:54', 'vehicle.jpg'),
(5, 0, 'Electronics', NULL, 'electronics', 1, NULL, '2020-12-23 09:32:17', '2020-12-29 18:24:25', '16092239655ecea02a55d1d.image.jpg'),
(6, 0, 'Furniture', NULL, 'furniture', 1, NULL, '2020-12-23 09:32:29', '2020-12-29 18:24:57', '1609223996FurnitureGateway_04_modular.jpg'),
(7, 0, 'watches', NULL, 'watches', 1, NULL, '2020-12-23 09:32:42', '2020-12-29 18:25:20', 'watches.jpg'),
(8, 0, 'Jewellery', NULL, 'jewellery', 1, NULL, '2020-12-23 09:32:55', '2021-08-01 02:56:17', '1609224043earing.jpg'),
(9, 0, 'Shoes', NULL, 'shoes', 1, NULL, '2020-12-23 09:33:08', '2020-12-29 18:26:15', 'shoes.jpg'),
(11, 0, 'Vegetables', NULL, 'vegetables', 1, NULL, '2020-12-23 09:33:35', '2021-08-01 02:51:52', 'vegetables.jpg\r\n'),
(12, 0, 'Sports', NULL, 'sport', 1, NULL, '2020-12-23 09:33:48', '2021-08-02 16:19:36', 'sports.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `companydetails`
--

CREATE TABLE `companydetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy` text COLLATE utf8mb4_unicode_ci,
  `termsofsale` text COLLATE utf8mb4_unicode_ci,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companydetails`
--

INSERT INTO `companydetails` (`id`, `address`, `phone`, `email`, `about`, `created_at`, `updated_at`, `logo`, `privacy`, `termsofsale`, `longitude`, `latitude`) VALUES
(1, 'Kuleshwor, Kathmandu', '9863333374', 'merobazzar@gmail.com', 'sdjkfhksdf', NULL, '2021-08-02 15:17:19', '1627917401facebookxlogo.png', '<p dir=\"ltr\"><strong>PRIVACY STATEMENT</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>This Privacy Statement describes our practices with respect to Personal Data collected via the Website at <a href=\"http://www.olxgroup.com/\">www.merobazzargroup.com</a> (&ldquo;Website&rdquo;) and in the course of recruiting for the Merobazzar Group (please refer to section 1 below to find out more about who exactly the Merobazzar Group is). This Privacy Statement further provides information on your rights under applicable data protection and other laws, including the European Union&rsquo;s General Data Protection Regulation (&ldquo;GDPR&rdquo;). For the purposes of this Privacy Statement, &#39;Personal Data&#39; is any data under Art. 1 No. 1 GDPR, i.e. data which relates to an individual who may be identified from that data, or from a combination of a set of data.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>1. WHO IS THE DATA CONTROLLER?</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>Merobazzar Global B.V., Gustav Mahlerplein 5, 1082 MS Amsterdam, the Netherlands (&ldquo;Merobazzar&rdquo;) is the data controller responsible for the processing of your Personal Data on the Website. Merobazzar has subsidiaries and affiliated companies all over the world forming the global &ldquo;Merobazzar Group&rdquo; (Merobazzar Group is also meant when the words &ldquo;we&rdquo; or &rdquo;us&rdquo; are used below). When you not only use the Website as a visitor but also apply for a job with the Merobazzar Group, please be aware that Merobazzar and the respective Merobazzar Group company which you seek employment with will both be responsible for processing your data (the GDPR calls this joint controllership). This means you can assert your rights both against Merobazzar as well as against the recruiting company of the Merobazzar Group. To find out which Merobazzar Group company is recruiting in which country, you can check the &ldquo;<a href=\"https://www.olxgroup.com/brands\">Brands</a>&rdquo; section of the Website.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>You can reach Merobazzar Group&rsquo;s data protection officer for any questions or feedback by mailing to dpo@merobazzar.com. Please understand that any inquiries not related to privacy or data protection issues can neither be answered nor forwarded internally. We invite you to address all customer relation inquiries to the respective customer service responsible for the Merobazzar Services your inquiry relates to.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>2. WHAT TYPE OF PERSONAL DATA DO WE PROCESS AND HOW DO WE COLLECT IT?</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>Information you actively provide to us when you apply for a job (&ldquo;Application Data&rdquo;):</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>We primarily receive information when you use the contact form, subscribe to job alerts or apply for a job on the Website. When you use our contact form, apply for a job or subscribe to our job alerts (&ldquo;Services&rdquo;) on the Website we may require you to provide us with certain Personal Data such as name, email address, phone number in order to contact you or to answer your queries. While applying for a job you may also be required to provide your resume/CV and cover letter which may contain additional Personal Data to process your corresponding request.&nbsp;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>We need your Application Data for the solicitation, evaluation, and selection of applicants for employment with Merobazzar Group. Thus, your Application Data will be processed for the purposes of managing our recruitment related activities, which include setting up and conducting interviews, and as is otherwise needed in the recruitment and hiring processes or to maintain our talent pool and to contact you in the future with job offers. Please note that by submitting your application and acknowledging the privacy practices explained in this notice, you grant your consent to us to process your Application Data in the manner and for the duration explained in this notice. Accordingly, our legal basis is for processing your Application Data is Art. 6(1)(a) GDPR.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>Information collected during cognitive assessments in the course of the application process (&ldquo;Assessment Data&quot;):</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>Please be aware that we might conduct so-called behavioural and cognitive tests to assess your suitability for employment with Merobazzar Group. We also do tests to assess the coding skills of candidates we would like to hire as developers (which might include live-coding experiences). These tests will be conducted through an online assessment platform operated by one of our third-party providers. To invite you to do these online assessments, we will send you a direct link once you have applied for a position with Merobazzar Group. You will learn more about the identity of our service provider before you start the assessment. We will process Assessment Data for the sole purpose of assisting our recruiters in determining if you will be successful in the role for which you have applied and evaluating and assessing the results of your test. We will not use the assessment result for any automated decision-making. Our legal basis for processing Assessment Data are Artt. 6(1)(b), 88 GDPR and its respective EU Member State implementations.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>Information gathered from third parties (&ldquo;Third-Party Candidate Data&rdquo;):</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>To evaluate your application, we may process data collected not directly from yourself but also from third parties. If this is the case, we will send you a notification without undue delay after adding your data to our systems (unless you have already received such a notification from the third party who transmitted the data to us). Your Personal Data will either be obtained from publicly available sources (e.g. career networks such as LinkedIn, Glassdoor, Indeed or others; we do not collect data from social media) or provided to us by someone who referred you for potential employment, such as an Merobazzar Group employee, a recruitment agency or a headhunter. Your Personal Data will be processed solely for the purpose of managing our recruitment related activities, which include setting up and conducting interviews and tests for applicants, evaluating and assessing the results thereto, and as is otherwise needed in the recruitment and hiring processes. Such processing is legally permissible under Art. 6(1)(f) GDPR as well as EU Member State implementations of Art. 88(1) GDPR as it is necessary for the purposes of the legitimate interests pursued by Merobazzar Group which are the solicitation, evaluation, and selection of applicants for employment.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>Information gathered automatically on the Website (&ldquo;Website Access Data&rdquo;):&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>When you visit the Website, Merobazzar collects in log-files your information such as Internet Protocol (&quot;IP&quot;) address, demographics, details of your computer&rsquo;s operating system, browser type, and your Internet service provider in order to provide better usability, troubleshooting, site maintenance, and to understand which parts of the Website are visited and how frequently. The legal basis for this processing is Art. 6(1)(f) GDPR as Merobazzar needs to process this data to guarantee the functionality and security of the Website. Merobazzar also processes certain further Personal Data through cookies, web beacons and other technologies (&ldquo;Website Usage Data&rdquo;). To learn more about this, please refer to the Information on The Processing of Website Usage Data by Cookies and Tracking Tools at the very end of this Privacy Statement.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>3. HOW IS YOUR PERSONAL DATA SHARED?</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>3.1 The Website is powered by our database provider, the online recruiting service Greenhouse. Your Personal Data will be processed on behalf of Merobazzar Group by Greenhouse Software, Inc., a cloud services provider located in the USA and engaged by Merobazzar Group to help manage its recruitment and hiring process on our behalf. Nonetheless, you can rest assured that we store all candidate data on servers in the EU. Further, Greenhouse Software, Inc. will ensure an adequate level of protection for Personal Data at any point in time. Greenhouse Software, Inc. is <a href=\"https://www.privacyshield.gov/participant?id=a2zt00000004U1KAAU&amp;status=Active\">certified under the EU-U.S. Privacy Shield framework</a> and the transfer will further be subject to appropriate additional safeguards under the standard contractual clauses certified by the EU Commission to provide an adequate level of data protection for any transfers outside the EU. You can obtain a copy of the standard contractual clauses by referring to the <a href=\"https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex%3A32010D0087\">website of the EU Commission</a>.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>3.2 Merobazzar Group is an organization with a global footprint. Therefore, we share information between Merobazzar Group companies located in different countries. All Merobazzar Group companies use Application Data or Third-Party Candidate Data only for the sole purpose of assisting the respective hiring company with their recruiting. For example, this is the case when an Merobazzar Group company acts as an internal recruiting agency for another Merobazzar Group company. All Merobazzar Group companies must honour this Privacy Statement as well as strict intra-group data transfer agreements. We ensure an adequate level of protection for Personal Data within the scope of the GDPR even where Personal Data is shared with an Merobazzar Group company located outside the European Economic Area (EEA). As a rule, if you apply for a job in the EEA, we will not share your Personal Data with Merobazzar Group companies outside the EEA unless you have let us know you are also interested in a position outside the EEA.Our legal basis for the sharing of data within Merobazzar Group is Art. 6(1)(f) GDPR.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>3.3 We do not share Personal Data about our candidates with any other non-affiliated third parties unless we have our candidates&rsquo; specific permission to do so, or we share information with private or public authorities that will enable us to fight fraud and abuse on our network, to investigate suspected violations of law, or to fight any other suspected breach of our terms of service. We may share Personal Data with government authorities as required by applicable law.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>3.4 As a matter of policy, we do not rent or sell Personal Data about our users or candidates with non-affiliated third parties unless we have&nbsp; specific permission to do so. In the event that our business or a division of our business is reorganized or sold and we transfer all or substantially all of our assets to a new owner, your Personal Data may be transferred to the buyer to enable continuity of service.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>4. FOR HOW LONG DO WE RETAIN YOUR DATA?</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>Unless you are starting your employment with us after your application, with your consent, we will store your Application Data for future consideration in our talent pool for a duration of 12 months after you have completed the application process. Before the end of this retention period we will contact you via email to ask you if you want to remain in our talent pool and extend your consent or if you would rather be deleted upon expiration of the initial retention period.&nbsp;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>If you do not grant us your consent for a longer retention period, we will store your Application Data for a period of 6 months after you have completed the application process.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>We keep all other Personal Data no longer than necessary for the purpose for which we obtained them and for any other permitted compatible purposes, including compliance with legal obligations in the field of employment law. Group records management schedules document the applicable minimum retention periods required by local laws.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>5. WHAT LEGAL RIGHTS DO YOU HAVE?</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>As a data subject under the GDPR, you have the following rights:</strong></p>\r\n\r\n<ul>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\"><strong>SUBJECT ACCESS: You have the right to access your Personal Data in many circumstances, generally within 1 month of your request;</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\"><strong>RECTIFICATION: You can ask us to have inaccurate Personal Data amended;</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\"><strong>ERASURE: You can ask us to erase Personal Data in certain circumstances, recognising that Merobazzar Group must in any case respect its data retention legal obligations in the field of employment;</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\"><strong>WITHDRAWAL OF CONSENT: You can withdraw at any time any declaration of consent that you have given us and prevent further processing if there is no other legitimate ground upon which Merobazzar Group can process your Personal Data;&nbsp;</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\"><strong>RESTRICTION: You can require certain Personal Data to be marked as restricted for processing in certain circumstances as defined in Art. <a href=\"http://eur-lex.europa.eu/legal-content/EN/TXT/?uri=uriserv:OJ.L_.2016.119.01.0001.01.ENG\">18 of the GDPR</a>;</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\"><strong>PORTABILITY: You can ask us to provide you with a copy of your Personal Data in a such a form that you can send it to a third party;&nbsp;&nbsp;</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\"><strong>RAISE A COMPLAINT: You can raise a complaint about our processing with the data protection regulator in the EU Member State of your habitual residence, place of work or place of where you think a violation of the GDPR has occurred.,&nbsp;</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\"><strong>OBJECTION: You have the right, for reasons arising from your particular situation, to object at any time to the processing of your Personal Data, which is processed on the basis of Art. 6(1)(f) GDPR (data processing on the basis of a balance of interests); this also applies to any profiling for the purposes of Art. 4(4) GDPR based on this processing. If you object, we will no longer process your Personal Data in the future unless we can prove compelling grounds for the processing that outweigh your interests, rights and freedoms or the processing serves to assert, exercise, or defend legal claims.</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>6. HOW WILL WE NOTIFY YOU OF CHANGES TO THIS PRIVACY STATEMENT?</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>This Privacy Statement was last updated on May 12th 2020. We may update this Privacy Statement from time to time.&nbsp; If we make any substantial changes in the way we use your Personal Data we will notify you by posting a prominent announcement on the Website.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>INFORMATION ON THE PROCESSING OF WEBSITE USAGE DATA BY COOKIES AND TRACKING TOOLS:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>On the Website, Merobazzar uses cookies to manage our users&rsquo; sessions and to store preferences. Cookies are used whether you apply for a job with Merobazzar Group or not. &quot;Cookies&quot; are small text files transferred by a web server to your hard drive and thereafter stored on your computer. With the help of cookies, the web server can save, for instance, preferences and settings on the user&rsquo;s computer, mobile phone or other device which are then automatically restored on the next visit. Or to put it another way, the cookies are used, among other things, to make the use of the site more user-friendly so that, for instance, you do not have to repeat the log-in process when you visit again. We use both persistent cookies and session cookies. Whereas persistent cookies remain on your computer for a longer period of time, session cookies are automatically deleted when the browser window is closed. In some instances, third-party service providers may use cookies on the Website (see below). You have the option to either accept or decline the use of cookies on your device, whether you are registered with us or not. Typically, you can configure your browser to not accept cookies. However, declining the use of cookies may limit your access to certain features of the Website</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><strong>Google Analytics:</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>In relation to the cookies mentioned above, please note that Merobazzar is using Google Analytics cookies on the Website. Google Analytics is provided by Google Ireland Ltd. and data are also transmitted to Google LLC, 1600 Amphitheatre Parkway, Mountain View, CA 94043 (&quot;Google&quot;). Google will store your information (browser Type/-version, operating system used, referral URL, shortened IP-Address, time of the server request) in a cookie. The information generated by the cookie about your use of the Website is usually transferred to a Google server in the USA and stored there.&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>However, within the Member States of the European Union or in other signatory states to the Agreement on the European Economic Area, your IP address will first be shortened by Google on the Website. For this purpose we have implemented the code &quot;gat._anonymizeIp() ;&quot; to ensure anonymous collection of IP addresses (so-called IP masking). Only in exceptional cases is the complete IP address transmitted to a Google server in the USA and abbreviated there. If Personal Data is exceptionally transferred to the USA, a data protection level appropriate to the data protection level in the EU is ensured there by Google&#39;s certification according to the so-called &quot;Privacy Shield Agreement&quot; between the EU and the USA (<a href=\"https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active\">https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active</a>). Google will use the information about your use of the Website on behalf of Merobazzar Group within the framework of Google Analytics in order to evaluate your use of the Website, to compile pseudonymous reports on Website activities and to provide other services connected with the use of the Website and the Internet. The IP address transmitted by your browser as part of Google Analytics is not merged with other Google data. You can prevent the collection of data generated by the cookie about your use of the Website (including IP address) by Google and its processing by Google by downloading and installing the browser plug-in under the following link: <a href=\"http://tools.google.com/dlpage/gaoptout\">http://tools.google.com/dlpage/gaoptout</a>. Further information on the terms of use and data protection can be found at <a href=\"https://www.google.com/analytics/terms/\">https://www.google.com/analytics/terms/</a> and <a href=\"https://policies.google.com/privacy?hl=en-GB\">https://policies.google.com/privacy?hl=en-GB</a>. If you do not wish to receive interest-based advertising, you can also disable Google&#39;s use of cookies for advertising purposes by visiting <a href=\"https://www.google.de/settings/ads\">https://www.google.de/settings/ads</a>.&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>LinkedIn Plugin:</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>Within the Website, functions and contents of the LinkedIn service, offered by LinkedIn Corporation, 1000 W. Maude Ave., Sunnyvale, California 94085, USA (&ldquo;LinkedIn&rdquo;) are integrated. LinkedIn is certified under the Privacy Shield Agreement and thus offers a guarantee to comply with European data protection law and provide an adequate level of data protection (<a href=\"https://www.privacyshield.gov/participant?id=a2zt0000000L0UZAA0&amp;status=Active\">https://www.privacyshield.gov/participant?id=a2zt0000000L0UZAA0&amp;status=Active</a>). LinkedIn uses cookies and web-beacons to provide you with LinkedIn contents on the Website. These include, for example, content such as images, videos or texts and buttons with which users can express their appreciation of the content, subscribe to the authors of the content or our contributions. You can also use a LinkedIn button to pre-fill our application form with your LinkedIn profile data. If you are a member of the LinkedIn Website, LinkedIn can assign your access of contents and functions to your LinkedIn profile. This data processing is subject to the LinkedIn privacy statement which can be accessed at <a href=\"https://www.linkedin.com/legal/privacy-policy\">https://www.linkedin.com/legal/privacy-policy</a>). LinkedIn may use this information to provide you with personalized advertisements and offers tailored to your web-preference. If you would like to opt out of receiving personalized ads from LinkedIn in the future you can do so at <a href=\"https://www.linkedin.com/psettings/guest-controls/retargeting-opt-out\">https://www.linkedin.com/psettings/guest-controls/retargeting-opt-out</a>.&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>Merobazzar processes Website Usage Data through Google Analytics and the LinkedIn Plug-In to analyze trends, administer the Websites, track users&rsquo; movements around the Websites, serve targeted advertisements, and gather demographic information about our user base as a whole. The legal basis for the processing of Website Usage Data is your consent pursuant to Art. 6(1)(a) GDPR.</strong></p>\r\n\r\n<p><br />\r\n&nbsp;</p>', '<p dir=\"ltr\"><strong>TERMS OF USE</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>1 ACCEPTANCE TO THE TERMS OF USE</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>1.1 This website, is made available to you by Merobazzar Global B.V. (&quot;Merobazzar&quot;), registered with the Dutch Chamber of Commerce under company registration number 34301226 and is located at Gustav Mahlerplein 5, 1082 MS Amsterdam, The Netherlands.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>1.2 These terms of use (&quot;Terms&quot;) apply to the use of this website, <a href=\"https://www.olxgroup.com/\">https://www.merobazzargroup.com/</a>, (&ldquo;Website&rdquo;) and the information, content, images, video, audio, data, works of authorship, materials, software and technology which may be displayed on, incorporated into, underlying, or used to operate this Website (individually and collectively referred to as the &quot;Content&quot;), including but not limited to databases, text, information, graphics, trade-marks, icons, logos, hyperlinks, sounds, photographs and designs.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>1.3 By accessing or using the Website or any part thereof, you indicate your understanding and acceptance of these Terms. If you do not agree to these Terms, please do not use or further access this website.&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>1.4 Please note: we may change these Terms from time to time at Merobazzar&rsquo;s sole discretion and without giving you notice, other than publishing the updated Terms on this Website. You understand and agree that you are solely responsible for reviewing these Terms from time to time. By using or accessing this Website, the then-current version of these Terms as published on this Website will apply to that use and access of this Website by you; and there may be additional terms and conditions, disclaimers and disclosures that apply to the use of certain parts of this Website or content on this Website (&quot;Additional Terms&quot;). The Additional Terms form part of these Terms and will be accessible on those parts of the Website or content to which they apply. By using those parts of this Website or content, you will be deemed to have agreed to the Additional Terms. If there is any conflict or inconsistency between any part of these Terms or the Additional Terms, the Additional Terms will apply to the extent of the conflict or inconsistency.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>1.5 For the purpose of these Terms and wherever the context so requires, the terms &quot;you&quot;, and &quot;your&quot; and &quot;user&quot; shall mean any person who accesses or uses the Website.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>2 PERMITTED USE</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>2.1 This Website is only intended to provide you with information about Merobazzar Group and other members of its group of companies (individually and collectively referred to as the &ldquo;Merobazzar Group&quot;) and the job openings in Merobazzar Group (&ldquo;Services&rdquo;).</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>2.2 You may view, copy, download to a local drive, print and distribute the information displayed on this Website, or any part thereof, provided that:</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(i) such information is used for informational and non-commercial purposes only; and</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(ii) any reproduction of the information, or portions thereof, includes the following copyright notice: &copy; Merobazzar 2017. ALL RIGHTS RESERVED.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>2.3 Users that wish to use or link to this Website for any purpose, or in any way, not expressly permitted in these Terms, may only do so with the express prior written permission of Merobazzar.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>2.4 Merobazzar may revoke your rights to use this Website or the Content at any time and for any reason. Merobazzar can do this without giving you any notice or informing you of this.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>3 PROHIBITED USE</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>3.1 You must not, directly or indirectly, do any of the following things or allow anybody else to:</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(i) perform any action that violates any of these Terms;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(ii) perform any action which is illegal, fraudulent or violates or infringes any rights, title or interest (including, but not limited to, any intellectual property rights) in or to this Website or the Content;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(iii) use any Technology or other means to access, link to, index, frame, scrape, copy or reproduce the Website or the Content in a way that is not expressly authorized by us. In these Terms, &quot;Technology&quot; includes any hardware, software, programmes, networks, systems, applications, platforms, devices, technology and the like, of any kind and in whatever form;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(iv) use Technology or other means to remove, disable, bypass, or circumvent any protection mechanisms or access control mechanisms, including those intended to prevent the unauthorized download, capture, scraping, linking, framing, reproduction, access to, use or distribution of the Content or the Website;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(v) access or use the Website or the Content through automated means, including through the use of &quot;robots,&quot; &quot;spiders,&quot; or &quot;offline readers&quot; (other than by individually performed searches on publicly accessible search engines for the sole purpose of, and solely to the extent necessary for, creating publicly available search indices - but not caches or archives - of the Website or the Content and excluding those search engines or indices that host, promote, or link primarily to infringing or unauthorized content);</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(vi) introduce any &quot;viruses&quot;, &quot;trojan horses&quot;, computer code, malware, instructions, devices or other materials that are designed to disrupt, disable, harm or otherwise impede in any manner the operation of any access device, Technology, services, data, storage media, programs, equipment or communications, or otherwise interfere with operations thereof (&quot;Destructive Code&quot;) into the into the Website, the Content or the Technology used by Merobazzar or any other user of the Website;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(vii) damage, disable, overburden, impair, or gain unauthorized access to the Content or the Website;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(viii) remove, modify, disable, block, obscure or otherwise impair any advertising displayed on, or used in connection with, the Website;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(ix) use the Website or the Content to advertise or promote products or services that are not expressly approved in advance in writing by us;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(x) interfere with any other person&#39;s use and enjoyment of the Website;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(xi) attempt to discover or reverse engineer the source code and other materials forming part of the Technology used to provide the Website or forming part of the Content; and</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>(xii) receive or charge money, favours or other consideration for allowing any other person to use or access the Website or the Content, (all of the above are called &quot;Prohibited Acts&quot;).</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>3.2 These Terms and any restrictions on the use of the Website will also apply to any part of the Website and Content that is cached when using the Website.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>3.3 We reserve the right, and we are allowed, to use Technology and other means to monitor that you are complying with these Terms.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>4 NO WARRANTIES</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>This Website, the information and materials on the site, and any software made available on the Website, are provided &quot;as is&quot; without any representation or warranty, express or implied, of any kind, including, but not limited to, warranties of merchantability, non-infringement, or fitness for any particular purpose. There is no warranty of any kind, express or implied, regarding third party content. In spite of Merobazzar&rsquo; best endeavours, there is no warranty on behalf of Merobazzar that this Website will be free of any computer viruses. Some jurisdictions do not allow for the exclusion of implied warranties, so the above exclusions may not apply to you.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>5 LIMITATION OF DAMAGES</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>In no event shall Merobazzar or any of its group companies or affiliates be liable to any entity for any direct, indirect, special, consequential or other damages (including, without limitation, any lost profits, business interruption, loss of information or programs or other data on your information handling system) that are related to the use of, or the inability to use, the content, materials, and functions of this Website or any linked website.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>6 DISCLAIMER</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>The website may contain inaccuracies and typographical and clerical errors. Merobazzar expressly disclaims any obligation(s) to update this website or any of the materials on this website. Merobazzar does not warrant the accuracy or completeness of the materials or the reliability of any advice, opinion, statement or other information displayed or distributed through the Website. You acknowledge that any reliance on any such opinion, advice, statement, memorandum, or information shall be at your sole risk. Merobazzar reserves the right, in its sole discretion, to correct any errors or omissions in any portion of the Website. Merobazzar may make any other changes to the Website, the materials and the products, programs, services described in the Website at any time without notice. This Website is for informational purposes only and should not be construed as technical advice of any manner.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>7 INTELLECTUAL PROPERTY RIGHTS</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>This Website and the Content are the property of Merobazzar or are licensed to Merobazzar and are protected by various international copyright, trademark, patent, trade dress or other intellectual property laws and treaties. Your rights to use the Website and the Content are expressly limited to those given to you in these Terms. You may not modify, copy, distribute, display, perform, reproduce, publish or create derivative works from the Content or any part thereof, except as expressly permitted by this Website. You may not remove any copyright, trademark or other proprietary notices from the Content.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>Merobazzar and its group companies owns all rights in and to the logos and images that appear on this website. The logos and images are trademarks and copyrights of Merobazzar. Only those third parties who wish to use Merobazzar&#39; logos and images for editorial purposes, and those third parties who obtained Merobazzar&#39; prior, written consent to use its logos and images for non-editorial purposes, are authorized to use Merobazzar&#39; logos and images (&quot;Authorized Users&quot;).</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>8 APPLICABLE LAW AND GENERAL INFORMATION</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>These Terms and your use of the Website and the Content shall be governed by the laws of the Netherlands. In the context of this Website and the Content, you agree to the exclusive jurisdiction of the courts of Amsterdam, the Netherlands.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>These Terms&nbsp; constitutes the entire agreement between Merobazzar and you with respect to your use of the Website. Any claim you may have with respect to your use of the Website must be commenced within one (1) year of the cause of action. If any provision(s) of these Terms is held by a court of competent jurisdiction to be contrary to law then such provision(s) shall be severed from these Terms and the other remaining provisions of these Terms shall remain in full force and effect.</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>9 CONTACT INFORMATION</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>&nbsp;</strong></p>\r\n\r\n<p dir=\"ltr\"><strong>Do you have questions about our terms of use? Please feel free to contact us by submitting an enquiry form <a href=\"https://policies.olxgroup.com/hc/en-us/requests/new?ticket_form_id=360000581040\">here</a>. Please be aware that any enquiries outside the scope of this contact form will not be answered.</strong></p>\r\n\r\n<p>&nbsp;</p>', '85.2955242', '27.6899521');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `uid`, `created_at`, `updated_at`) VALUES
(1, '45061646453736870428088537363768136624', '2020-12-24 17:53:02', '2020-12-24 17:53:02'),
(2, '45061646453736870428088537363768136624', '2020-12-25 04:34:09', '2020-12-25 04:34:09'),
(3, '05050900215373687042808853736064036024', '2020-12-25 04:53:27', '2020-12-25 04:53:27'),
(4, '05060145373687042808853736064036024', '2020-12-25 04:56:29', '2020-12-25 04:56:29'),
(5, '05011060413411015534160410102476824', '2020-12-25 06:01:21', '2020-12-25 06:01:21'),
(6, '45061646453736870428088537363768136624', '2020-12-25 20:34:25', '2020-12-25 20:34:25'),
(7, '0505113753736870428010153736064036024', '2020-12-25 20:58:42', '2020-12-25 20:58:42'),
(8, '05011866453736870428010153736064036024', '2020-12-25 21:00:13', '2020-12-25 21:00:13'),
(9, '05013236051151303151486041066737524', '2020-12-25 22:01:47', '2020-12-25 22:01:47'),
(10, '450100646453736870428088537363768136624', '2020-12-25 22:25:25', '2020-12-25 22:25:25'),
(11, '050616464840201001018400768136624', '2020-12-25 22:55:03', '2020-12-25 22:55:03'),
(12, '0501020553736870428010153736089241224', '2020-12-26 02:08:28', '2020-12-26 02:08:28'),
(13, '05010853736860424019853736076036024', '2020-12-26 02:39:56', '2020-12-26 02:39:56'),
(14, '0501006464840201001018400768136624', '2020-12-26 02:46:33', '2020-12-26 02:46:33'),
(15, '05010853736870428010153736076036024', '2020-12-26 02:52:44', '2020-12-26 02:52:44'),
(16, '0501020041953736870428010153736085139324', '2020-12-26 04:12:14', '2020-12-26 04:12:14'),
(17, '05010212753736830410310653736080036024', '2020-12-26 09:50:22', '2020-12-26 09:50:22'),
(18, '05011866453736870428010153736064036024', '2020-12-26 15:10:41', '2020-12-26 15:10:41'),
(19, '0505113753736870428010153736064036024', '2020-12-26 15:11:33', '2020-12-26 15:11:33'),
(20, '0501020041953736870428010153736085139324', '2020-12-26 15:15:28', '2020-12-26 15:15:28'),
(21, '05010853736860424019853736076036024', '2020-12-26 17:55:08', '2020-12-26 17:55:08'),
(22, '45061646453736870428088537363768136624', '2020-12-26 21:32:04', '2020-12-26 21:32:04'),
(23, '0505113753736870428010153736064036024', '2020-12-27 15:13:07', '2020-12-27 15:13:07'),
(24, '05011866453736870428010153736064036024', '2020-12-27 15:13:14', '2020-12-27 15:13:14'),
(25, '45061646453736870428088537363768136624', '2020-12-27 16:19:32', '2020-12-27 16:19:32'),
(26, '05060145373687042808853736064036024', '2020-12-27 16:30:18', '2020-12-27 16:30:18'),
(27, '05050900215373687042808853736064036024', '2020-12-27 17:31:35', '2020-12-27 17:31:35'),
(28, '0501020041953736870428010153736085139324', '2020-12-27 19:07:18', '2020-12-27 19:07:18'),
(29, '05010853736870428010153736076036024', '2020-12-28 04:20:37', '2020-12-28 04:20:37'),
(30, '45061646453736870428088537363768136624', '2020-12-28 20:03:12', '2020-12-28 20:03:12'),
(31, '4501006464537368704280885373673038562843768136024', '2020-12-28 23:30:39', '2020-12-28 23:30:39'),
(32, '4501006464537368704280885373673038562843768136624', '2020-12-29 01:15:12', '2020-12-29 01:15:12'),
(33, '7501006464537368404147135537365768136624', '2020-12-29 12:14:29', '2020-12-29 12:14:29'),
(34, '4501006464537368704280885373673038562843768136624', '2020-12-29 16:33:43', '2020-12-29 16:33:43'),
(35, '05010853736870428010153736076036024', '2020-12-29 16:48:31', '2020-12-29 16:48:31'),
(36, '45061646453736870428088537363768136624', '2020-12-29 18:07:03', '2020-12-29 18:07:03'),
(37, '450100646453736870428088537363768136624', '2020-12-29 18:37:31', '2020-12-29 18:37:31'),
(38, '750616453736290154766537365768136624', '2020-12-29 18:54:04', '2020-12-29 18:54:04'),
(39, '05011866453736870428010153736064036024', '2020-12-29 18:55:33', '2020-12-29 18:55:33'),
(40, '450100646453736890438990537363864153624', '2021-04-01 12:53:30', '2021-04-01 12:53:30'),
(41, '4501006464537369204515107537363768136624', '2021-07-29 03:36:57', '2021-07-29 03:36:57'),
(42, '4501006464537369204515107537363768136624', '2021-07-31 15:30:34', '2021-07-31 15:30:34'),
(43, '4501006464537369204515107537363768136624', '2021-08-01 02:06:47', '2021-08-01 02:06:47'),
(44, '4501006464537369204515107537363768136624', '2021-08-02 12:54:50', '2021-08-02 12:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `image`, `created_at`, `updated_at`, `status`) VALUES
(11, 13, '1608717200babylotion.png', '2020-12-23 09:53:20', '2020-12-23 09:53:20', '0'),
(12, 13, '1608717200babywash.PNG', '2020-12-23 09:53:20', '2020-12-23 09:53:20', '0');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `name`, `email`, `status`, `created_at`, `updated_at`, `vendor_id`, `product_id`) VALUES
(9, 'k cha', 'anisha', 'anisha@gmail.com', '1', '2021-08-02 17:50:09', '2021-08-02 17:51:16', '8', '36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_17_163226_create_admins_table', 2),
(5, '2020_12_18_120938_create_categories_table', 3),
(6, '2020_12_18_123559_create_brands_table', 4),
(7, '2020_12_18_131527_create_products_table', 5),
(8, '2020_12_18_132338_create_galleries_table', 6),
(9, '2020_12_18_133005_add_seller_id_to_products', 7),
(10, '2020_12_18_171948_create_sliders_table', 8),
(11, '2020_12_20_104535_create_admanagements_table', 9),
(12, '2020_12_20_124920_create_companydetails_table', 10),
(13, '2020_12_20_125253_create_socialmedia_table', 11),
(14, '2020_12_21_124340_create_messages_table', 12),
(15, '2020_12_21_124647_create_wishlists_table', 13),
(16, '2020_12_21_165057_create_billings_table', 14),
(17, '2020_12_23_203345_create_roles_table', 15),
(18, '2020_12_23_203527_create_rolepermissions_table', 16),
(19, '2020_12_23_203640_create_permissions_table', 17),
(20, '2020_12_24_232754_create_counters_table', 18),
(21, '2021_08_01_142540_add_latlon_to_companydetails_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'http://localhost/news/admin/admins/index', '2020-12-24 07:27:48', '2020-12-24 07:27:48'),
(2, 'Menu', 'menu', '2020-12-24 07:28:03', '2020-12-24 07:28:03'),
(3, 'Products', 'products', '2020-12-24 07:28:17', '2020-12-24 07:28:17'),
(4, 'General Setting', 'general setting', '2020-12-24 07:28:35', '2020-12-24 07:28:35'),
(5, 'Message', 'message', '2020-12-24 07:28:46', '2020-12-24 07:28:46'),
(7, 'User', 'http://localhost/news/admin/user/customer', '2020-12-24 07:29:15', '2020-12-24 07:29:15'),
(8, 'Category', 'category', '2020-12-24 07:29:37', '2020-12-24 07:29:37'),
(9, 'Product Category', 'product category', '2020-12-24 07:30:13', '2020-12-24 07:30:13'),
(10, 'Product/view', 'product/view', '2020-12-24 07:30:32', '2020-12-24 07:30:32'),
(11, 'Slider', 'slider', '2020-12-24 07:30:52', '2020-12-24 07:30:52'),
(12, 'Adds', 'adds', '2020-12-24 07:31:05', '2020-12-24 07:31:05'),
(13, 'Company Details', 'company details', '2020-12-24 07:31:22', '2020-12-24 07:31:22'),
(14, 'Social Media', 'social media', '2020-12-24 07:31:43', '2020-12-24 07:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `maincat_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortdes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wash_care` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pattern` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sleev` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occasion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `tending` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `topselling` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `deals_of_day` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `section` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT '0',
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `maincat_id`, `brand`, `name`, `slug`, `product_code`, `color`, `description`, `price`, `discount`, `thumbnail`, `weight`, `product_video`, `shortdes`, `wash_care`, `fabric`, `pattern`, `sleev`, `fit`, `occasion`, `meta_title`, `meta_description`, `meta_keywords`, `featured`, `tending`, `topselling`, `deals_of_day`, `status`, `section`, `created_at`, `updated_at`, `seller_id`, `location`, `verification`) VALUES
(13, 12, '12', 'Featured', 'bat', '2026528430', NULL, 'white', 'sdfjksld dsfkljdf dsfkjdf dsfjdfsfsdfs dsfijdfsdf sdfkjf  cvxcjcxv  sdfkjdsf', 300.00, 0.00, '1608717175bat.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2020-12-23 09:52:56', '2020-12-23 16:07:11', 2, 'Janpatmarg,Biratnagar', '1'),
(16, 5, '5', 'Featured', 'Truck', '1787176693', NULL, 'black', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 5000.00, 20.00, '1608721908truck.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2020-12-23 11:11:48', '2020-12-25 23:08:33', 2, 'Bargachhi,Biratnagar,Nepal', '1'),
(17, 5, '5', 'Featured', 'Headphone', '741689832', NULL, 'blsck', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 500.00, 0.00, '160872208624ht.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2020-12-23 11:14:46', '2020-12-25 22:13:07', 2, 'Tinpaini,Biratnagar,Nepal', '1'),
(18, 5, '5', 'Featured', 'product1', '1383189743', NULL, 'black', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 600.00, 0.00, '16087221232b35a4763a31b6f5f40d9de9d7e05f88.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2020-12-23 11:15:23', '2020-12-25 22:13:19', 2, 'Tinpaini,Biratnagar', '1'),
(19, 8, '8', 'New Arrival', 'Ear ring', '1608886608', NULL, 'golden', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 500.00, 0.00, '1608895027earing.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2020-12-25 23:02:07', '2020-12-25 23:09:29', 2, 'Tinpaini,Biratnagar', '1'),
(21, 5, '5', 'New Arrival', 'Speaker', '1155467785Speaker', NULL, 'black', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 500.00, NULL, '1608896018speaker-old-style-vector-1107524.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2020-12-25 23:18:38', '2020-12-25 23:24:43', NULL, 'Tinpaini,Biratnagar', '1'),
(22, 5, '5', 'Trending', 'Fridge', '1330848119Fridge', NULL, 'sky blue', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 5000.00, 12.00, '16088960638f40f9a2de1cb1dc1ac8c98081707cc7.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2020-12-25 23:19:23', '2020-12-25 23:25:07', NULL, 'Kachuri Thera 08,Dhanusha,Nepal', '1'),
(23, 6, '6', 'New Arrival', 'Bead', '497225478Bead', NULL, 'wooden', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2000.00, NULL, '1608896172Flynn-1-Drawer-Nightstand-2-1440x1011.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2020-12-25 23:21:12', '2020-12-25 23:25:29', NULL, 'Tinpaini,Biratnagar', '1'),
(24, 6, '6', 'New Arrival', 'Chair set', '1675894271Chair set', NULL, 'Brown', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3000.00, NULL, '160889620871+xw4gRDDL._SX425_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2020-12-25 23:21:48', '2020-12-25 23:25:54', NULL, 'Tinpaini,Biratnagar', '1'),
(25, 5, '5', 'Trending', 'Bulb', '576043715Bulb', NULL, 'white', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 20.00, NULL, '16088962515ecea02a55d1d.image.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2020-12-25 23:22:31', '2020-12-25 23:26:59', NULL, 'Tinpaini,Biratnagar', '1'),
(26, 6, '6', 'New Arrival', 'Cupboard', '1705891816Cupboard', NULL, 'white', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1000.00, NULL, '1608896286cupboard.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2020-12-25 23:23:07', '2020-12-25 23:27:08', NULL, 'Janpatmarg,Biratnagar', '1'),
(36, 12, '12', NULL, 'ball', '569520763', NULL, 'asdasd', NULL, 1000.00, 10.00, '1627925278download.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', 'no', '1', NULL, '2021-08-02 17:27:58', '2021-08-02 17:43:49', 8, 'dsfsfds', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rolepermissions`
--

CREATE TABLE `rolepermissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissiontitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rolepermissions`
--

INSERT INTO `rolepermissions` (`id`, `role_id`, `permission`, `permissiontitle`, `created_at`, `updated_at`) VALUES
(10, 2, 'All', 'All', '2020-12-24 08:23:49', '2020-12-24 08:23:49'),
(12, 3, 'all', 'All', '2021-08-01 02:34:49', '2021-08-01 02:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Sneha', 'sneha', '2020-12-24 08:23:49', '2020-12-24 08:23:49'),
(3, 'Admin', 'admin', '2020-12-25 22:16:18', '2020-12-25 22:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '160829198816031739211602521118_Web_Home.jpg', '1', '2020-12-18 11:46:28', '2021-08-02 14:32:33'),
(2, '16082920341602858400_Heart_OTC_Home_Banner.jpg', '1', '2020-12-18 11:47:14', '2021-08-02 14:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `name`, `url`, `created_at`, `updated_at`, `image`, `status`) VALUES
(1, 'Facebook', '#', '2020-12-22 10:44:45', '2020-12-29 18:50:41', '1609225541facebook1.PNG', '1'),
(2, 'Twitter', '#', '2020-12-23 10:48:52', '2020-12-29 18:50:55', '1609225555twitter1.PNG', '1'),
(3, 'Youtube', '#', '2020-12-23 10:49:17', '2020-12-29 18:53:18', '1609225576youtube1.PNG', '1'),
(5, 'snapchat', 'https://snapchat.com', '2021-08-02 15:45:53', '2021-08-02 15:46:12', '1627919153download.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acc_type` enum('buyer','seller') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'seller',
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('online','offline') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'offline',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `acc_type`, `address`, `phone`, `status`, `image`, `verify`, `comment`) VALUES
(8, 'Anisha Rauniyar', 'osandy072@gmail.com', NULL, '$2y$10$9HrQLBXZ90dvHZASFzG1bu8iSzVCj7ZWb02EvU3VNC6ve.EoEb59i', NULL, '2021-08-01 03:29:51', '2021-08-02 17:51:02', 'seller', 'kuleshwor', '9863333374', 'online', '162792439520181018_144648.jpg', '1', NULL),
(10, 'sudeep', 'sudeepm0599@gmail.com', NULL, '$2y$10$WnskI.aMRBE8KKqQJXS1IuVIgnlavlqwMoSSnbc03FmqSXv.FBiwO', NULL, '2021-08-02 13:48:24', '2021-08-02 14:14:45', 'buyer', 'Malangwa sarlahi', '9808383500', 'offline', '1627912217199466622_1697679783773903_2796911571596731898_n.jpg', '1', NULL),
(11, 'Anisha Shrestha', 'anisha@gmail.com', NULL, '$2y$10$bann3SXdUl7qnIHgbRzKB.LafnWrWlaSnSz8qjV0IsOB129AovFlm', NULL, '2021-08-02 17:49:09', '2021-08-02 17:56:34', 'buyer', 'kuleshwor', '9818544723', 'offline', '1627926994download.png', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(12, '13', '2', '2020-12-23 09:56:16', '2020-12-23 09:56:16'),
(13, '18', '2', '2020-12-23 11:31:39', '2020-12-23 11:31:39'),
(14, '17', '2', '2020-12-25 20:48:11', '2020-12-25 20:48:11'),
(16, '28', '7', '2021-08-01 12:24:30', '2021-08-01 12:24:30'),
(19, '36', '11', '2021-08-02 17:49:43', '2021-08-02 17:49:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admanagements`
--
ALTER TABLE `admanagements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billings_user_id_index` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_url_unique` (`url`);

--
-- Indexes for table `companydetails`
--
ALTER TABLE `companydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_product_id_index` (`product_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_id_index` (`cat_id`),
  ADD KEY `products_brand_id_index` (`brand`),
  ADD KEY `products_seller_id_index` (`seller_id`);

--
-- Indexes for table `rolepermissions`
--
ALTER TABLE `rolepermissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rolepermissions_role_id_index` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admanagements`
--
ALTER TABLE `admanagements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `companydetails`
--
ALTER TABLE `companydetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `rolepermissions`
--
ALTER TABLE `rolepermissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billings`
--
ALTER TABLE `billings`
  ADD CONSTRAINT `billings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rolepermissions`
--
ALTER TABLE `rolepermissions`
  ADD CONSTRAINT `rolepermissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
