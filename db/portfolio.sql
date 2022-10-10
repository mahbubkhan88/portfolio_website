-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 07:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `username`, `email`) VALUES
(1, 'Md. Mahbubur Rahman', '123', 'admin', 'mahbubkhan88@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `mobile`, `email`, `message`, `created_at`) VALUES
(1, 'Mahbubur Rahman', '01938432432', 'mahbubkhan88@gmail.com', 'Hi. As salam\nIm Mahbub from Malaysia, Please can you develop e website for my business.\n\nThanks,\n\nMahbub\nChairman\nTG Group', '2022-09-21 21:09:28'),
(2, 'Mahbubur Rahman', '01938432432', 'mahbubkhan88@gmail.com', 'Hi. As salam\nIm Mahbub from Malaysia, Please can you develop e website for my business.\n\nThanks,\n\nMahbub\nChairman\nTG Group', '2022-09-21 21:53:54'),
(3, 'Mahbubur Rahman', '01938432432', 'mahbubkhan88@gmail.com', 'Hi. As salam\nIm Mahbub from Malaysia, Please can you develop e website for my business.\n\nThanks,\n\nMahbub\nChairman\nTG Group', '2022-09-21 21:53:55'),
(4, 'Mahbubur Rahman', '01938432432', 'mahbubkhan88@gmail.com', 'Hi. As salam\nIm Mahbub from Malaysia, Please can you develop e website for my business.\n\nThanks,\n\nMahbub\nChairman\nTG Group', '2022-09-21 21:53:56'),
(5, 'Mahbubur Rahman', '01938432432', 'mahbubkhan88@gmail.com', 'Hi. As salam\nIm Mahbub from Malaysia, Please can you develop e website for my business.\n\nThanks,\n\nMahbub\nChairman\nTG Group', '2022-09-21 21:53:56'),
(6, 'Mahbubur Rahman', '01938432432', 'mahbubkhan88@gmail.com', 'Hi. As salam\nIm Mahbub from Malaysia, Please can you develop e website for my business.\n\nThanks,\n\nMahbub\nChairman\nTG Group', '2022-09-21 21:53:56'),
(7, 'Mahbubur Rahman', '01938432432', 'mahbubkhan88@gmail.com', 'Hi. As salam\nIm Mahbub from Malaysia, Please can you develop e website for my business.\n\nThanks,\n\nMahbub\nChairman\nTG Group', '2022-09-21 21:53:56'),
(8, 'Mahbubur Rahman', '01938432432', 'mahbubkhan88@gmail.com', 'Hi. As salam\nIm Mahbub from Malaysia, Please can you develop e website for my business.\n\nThanks,\n\nMahbub\nChairman\nTG Group', '2022-09-21 21:54:15'),
(9, 'Mahbubur Rahman', '01938432432', 'mahbubkhan88@gmail.com', 'Hi. As salam\nIm Mahbub from Malaysia, Please can you develop e website for my business.\n\nThanks,\n\nMahbub\nChairman\nTG Group', '2022-09-21 21:54:15'),
(14, 'Razib Hossain', '01914722197', 'mahbubkhan88@hotmail.com', 'Hi,\nI am Razib Hossain form Dhaka, Mirpur\n\nThanks\nMahbub', '2022-09-23 16:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enroll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseclass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `fee`, `enroll`, `courseclass`, `link`, `image`) VALUES
(1, 'Android Course', 'lorem ipsum doller met waten', '10000', '240', '100', 'htts://laravel.rabbil.com', 'http://localhost/images/android.jpg'),
(2, 'React Course', 'lorem ipsum doller met waten', '10000', '500', '120', 'htts://react.rabbil.com', 'http://localhost/images/react.jpg'),
(4, 'JavaScript Coursr', 'Lorem ipsum doller dinte parental', '7000', '400', '125', 'https://javascript.rabbil.com', 'http://localhost/images/javascript.jpg'),
(5, 'Python Course', 'Python course is a best course', '12000', '330', '200', 'https://python.rabbil.com', 'http://localhost/images/python.jpg'),
(7, 'Laravel Course', 'CSS stands for Cascading Style Sheet', '12000', '120', '20', 'https://css.rabbil.com', 'http://localhost/images/css.png'),
(11, 'Java Course', 'Java Course Java CourseJava CourseJava Course', '15000', '400', '400', 'https://java.rabbil.com', 'http://localhost/images/java.png');

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
(1, '2022_09_07_121140_visitor_table', 1),
(2, '2022_09_08_070124_services_table', 2),
(4, '2022_09_20_113146_courses_table', 3),
(5, '2022_09_20_195649_projects_table', 4),
(7, '2022_09_21_191403_contacts_table', 5),
(8, '2022_09_22_170535_reviews_table', 6),
(9, '2022_09_24_160121_admins_table', 7),
(10, '2022_09_24_184648_photos_table', 8),
(11, '2022_10_09_145106_sliders_table', 9),
(12, '2022_10_09_173535_privacy__policy__table', 10),
(13, '2022_10_10_143543_return_policy_table', 11),
(14, '2022_10_10_145624_tearms_and_condition_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `location`) VALUES
(7, 'http://127.0.0.1:8000/storage/NmvBDte0qUG7CXrSpvFiPALGDV0tJFm95XuzZeI2.jpg'),
(8, 'http://127.0.0.1:8000/storage/cC0BLa66aviOwhzBHTuxxLMBYbKMQ1cHW8P9ka5b.jpg'),
(9, 'http://127.0.0.1:8000/storage/SuI11RL9uLvipE0zldy9bUfg9SiUPEzrGeL1Ypxu.jpg'),
(10, 'http://127.0.0.1:8000/storage/APaw1lyoKXDVJkpRGcuuCTY9ZzTgPoYgbuQCAGke.jpg'),
(11, 'http://127.0.0.1:8000/storage/fIk3wQsREzydUPy0Zck3223aToA4zoH3GzPyI0gP.jpg'),
(12, 'http://127.0.0.1:8000/storage/8MHA0Ki4qNf2h2FLc8LCEuNB66sVHFfjdxjh9zmc.jpg'),
(13, 'http://127.0.0.1:8000/storage/B9qBGR4g8ENYXThXaLPEJIRjazIhM1EUbIbzUr73.jpg'),
(14, 'http://127.0.0.1:8000/storage/T2oPLKSL6mRLWz8MxC7u5SbM7SgSpQsdZaFsYY3H.jpg'),
(15, 'http://127.0.0.1:8000/storage/bfwRnM7TRqBgGc0fKmasPScRiqUdIFoVbiXnnkEr.jpg'),
(16, 'http://127.0.0.1:8000/storage/FtgSoaBSxTZGGw9fxWqLmJc2moh5YR5LySFRhY5H.jpg'),
(17, 'http://127.0.0.1:8000/storage/6Z6QfyhptO1isK7pmDzi8vcY2eJWO0FORNgZdIC2.jpg'),
(18, 'http://127.0.0.1:8000/storage/XiZ9NosxniYGgvF16pOdjE7izoNEX1izmlFrExcx.jpg'),
(19, 'http://127.0.0.1:8000/storage/tfzLMK6py3xXAtOvHwVpI7RlOQhrmg751xhpO9Bc.png'),
(20, 'http://127.0.0.1:8000/storage/9jXZ9yk2E3TotFdn8fH3QKovtdiqFYtRBgoV3M0v.jpg'),
(21, 'http://127.0.0.1:8000/storage/PzPqgcu50LT9QPfLRhImseYJ4NAnhq1NuXeAcbFc.jpg'),
(22, 'http://127.0.0.1:8000/storage/5kYbc6hcaeNrfG08QtxE5FIoRg1R4unTM1q7mk9v.jpg'),
(23, 'http://127.0.0.1:8000/storage/nfdgewgp2v0CaPea8yhQxXBlEx7hlOskWmbYYtuy.jpg'),
(24, 'http://127.0.0.1:8000/storage/luIp4pKE2zxQMmKdXTng4s07Ios8jhnVN8ndE5Nd.jpg'),
(25, 'http://127.0.0.1:8000/storage/lL0zZys9AgWPYVX8Q2qzdrFr68eqF9alRghsvl3I.jpg'),
(26, 'http://127.0.0.1:8000/storage/d3Nm3JdIqNrcu2nyUrAkdGJDZaJ0y6UuuyxIyJgH.jpg'),
(27, 'http://127.0.0.1:8000/storage/6y1V5neVUjqAvmxxU2YIt2LNmPuHbFip3ic2oJ3R.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `title`, `description`) VALUES
(1, 'This is Privacy Policy', 'At a Glance\nWe believe in privacy. Your privacy is extremely important to us. We won\'t ask you for personal information unless we truly need it.\n\nWebsite Visitors\nAs like most website operators portfolio website collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request.\n\nGathering of Personally-Identifying Information\nMany of visitors to our websites choose to interact with us in ways that require portfolio website to gather personally-identifying information.\n\nAggregated Statistics\nportfolio website may collect statistics about the behavior of visitors to its website. For instance, portfolio website may monitor the most popular products on the website.\n\nProtection of Certain Personally-Identifying Information\nportfolio website discloses potentially personally-identifying and personally-identifying information only to those of its employees, contractors, and affiliated organizations.\n\nData Deletion Policy\nA user of portfolio website product or service can request account data Deletion anytime by sending an email to With the request of user data or account relation all previous orders.\n\nCookies\nA cookie is a string of information that a website stores on a visitor\'s computer, and that the visitor’s browser provides to the website each time the visitor returns.');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `link`, `image`) VALUES
(1, 'Bangladesh Cricket Board Website', 'Bangladesh Cricket Board Website', 'http://bcb.gov.bd', 'http://localhost/images/jwt.png'),
(2, 'Fifa website create', 'Fifa website create', 'http://fifa.com', 'http://localhost/images/css.png'),
(3, 'Cricbuzz Website Development', 'Cricbuzz Website Development', 'http://cricbuzz.com', 'http://localhost/images/java.png'),
(4, 'HR Software Development', 'Software Development', 'http://softwaresoruce.com', 'http://localhost/images/photoshop.jpg'),
(5, 'Accounting Software Develop', 'Software Development', 'http://accounting.com', 'http://localhost/images/react.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `return_policy`
--

CREATE TABLE `return_policy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_policy`
--

INSERT INTO `return_policy` (`id`, `title`, `description`) VALUES
(1, 'This is Return Policy', '1: The product must be unused, unworn, unwashed and without any flaws. Fashion products can be tried on to see if they fit and will still be considered unworn. If a product is returned to us in an inadequate condition, we reserve the right to send it back to you.\n\n2: The product must include the original tags, user manual, warranty cards, freebies and accessories.\n\n3: The product must be returned in the original and undamaged manufacturer packaging / box. If the product was delivered in a second layer of Daraz packaging, it must be returned in the same condition with return shipping label attached. Do not put tape or stickers on the manufacturers box.\n\n4: While you return the item at our hub, please collect the Daraz Return Acknowlegement Form from the Hub and fill it in by yourself. Keep one copy to yourself and we will keep another copy of it for the record.\n\n5: Note: It is important to indicate the order number and return tracking number on your return package to avoid any inconvenience/delay in process of your return.\n\nThanking you for order our products');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `description`, `image`) VALUES
(1, 'Bill Gates', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে। হার্ভার্ড বিশ্ববিদ্যালয়ে লেখাপড়া শেষ না করেই মাইক্রোসফট প্রতিষ্ঠা করা', 'http://localhost/images/Bill%20Gates.jpg'),
(2, 'Elon Mask', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে। হার্ভার্ড বিশ্ববিদ্যালয়ে লেখাপড়া শেষ না করেই মাইক্রোসফট প্রতিষ্ঠা করা', 'http://localhost/images/Elon%20Mask.jpg'),
(3, 'Jeff Bezos', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে। হার্ভার্ড বিশ্ববিদ্যালয়ে লেখাপড়া শেষ না করেই মাইক্রোসফট প্রতিষ্ঠা করা', 'http://localhost/images/Jeff%20Bezos.jpg'),
(4, 'Mark Zuckerberg', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে। হার্ভার্ড বিশ্ববিদ্যালয়ে লেখাপড়া শেষ না করেই মাইক্রোসফট প্রতিষ্ঠা করা', 'http://localhost/images/Mark%20Zuckerberg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`) VALUES
(1, 'লারাভেল Course', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'http://localhost/images/code.svg'),
(5, 'রিএ্যাক্ট Course', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'http://localhost/images/custom.svg'),
(6, 'Photoshop Course', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'http://localhost/images/graphic.svg'),
(23, 'Laravel Course', 'Laravel course Laravel course Laravel course Laravel course Laravel course Laravel course Laravel course', 'http://localhost/images/custom.svg');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`) VALUES
(1, 'First Slider', 'This is first slider', 'http://localhost/images/slider-1.jpg'),
(2, 'Second Slider', 'This is second slider', 'http://localhost/images/slider-2.jpg'),
(4, 'Third Slider', 'This is third slider', 'http://localhost/images/slider-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `terms_condition`
--

CREATE TABLE `terms_condition` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_condition`
--

INSERT INTO `terms_condition` (`id`, `title`, `description`) VALUES
(1, 'Introduction Terms and Conditions', '1. INTRODUCTION\nWelcome to portfolio website also hereby known portfolio. We are an online marketplace and these are the terms and conditions governing your access and use of portfolio along with its related sub-domains, sites, mobile app, services and tools.\n\n2. CONDITIONS OF USE\nTo access certain services offered by the platform, we may require that you create an account with us or provide personal information to complete the creation of an account.\n\n3. PRIVACY\nFor fraudulent purposes, or in connection with a criminal offense or other unlawful activity to send, use or reuse any material that does not belong to you; or is illegal, offensive (including but not limited to material that is sexually explicit content or which promotes racism.\n\n4. PLATFORM FOR COMMUNICATION\nYou agree, understand and acknowledge that the Site is an online platform that enables you to purchase products listed at the price indicated therein at any time from any location using a payment method of your choice.\n\n5. CONTINUED AVAILABILITY OF THE SITE\nWe will do our utmost to ensure that access to the Site is consistently available and is uninterrupted and error-free.\n\nPlease note that we sell products only in quantities which correspond to the typical needs of an average household.\n\nThanking you for order our products.');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip_address`, `visit_time`) VALUES
(1, '127.0.0.1', '2022-09-23 07:58:37pm'),
(2, '127.0.0.1', '2022-09-23 08:00:07pm'),
(3, '127.0.0.1', '2022-09-23 08:44:28pm'),
(4, '127.0.0.1', '2022-09-23 08:44:42pm'),
(5, '127.0.0.1', '2022-09-23 08:45:28pm'),
(6, '127.0.0.1', '2022-09-23 08:48:17pm'),
(7, '127.0.0.1', '2022-09-23 08:50:52pm'),
(8, '127.0.0.1', '2022-09-23 08:51:16pm'),
(9, '127.0.0.1', '2022-09-23 08:51:57pm'),
(10, '127.0.0.1', '2022-09-23 09:11:30pm'),
(11, '127.0.0.1', '2022-09-23 09:16:07pm'),
(12, '127.0.0.1', '2022-09-23 09:17:27pm'),
(13, '127.0.0.1', '2022-09-23 10:24:24pm'),
(14, '127.0.0.1', '2022-09-23 10:24:53pm'),
(15, '127.0.0.1', '2022-09-23 10:26:46pm'),
(16, '127.0.0.1', '2022-09-23 10:27:11pm'),
(17, '127.0.0.1', '2022-09-24 12:09:12am'),
(18, '127.0.0.1', '2022-09-24 12:11:03am'),
(19, '127.0.0.1', '2022-09-24 12:12:09am'),
(20, '127.0.0.1', '2022-09-24 12:28:51am'),
(21, '127.0.0.1', '2022-09-24 12:29:28am'),
(22, '127.0.0.1', '2022-09-24 09:05:25pm'),
(23, '127.0.0.1', '2022-09-24 09:05:29pm'),
(24, '127.0.0.1', '2022-09-24 11:11:06pm'),
(25, '127.0.0.1', '2022-09-24 11:11:42pm'),
(26, '127.0.0.1', '2022-09-24 11:12:43pm'),
(27, '127.0.0.1', '2022-09-25 01:08:52am'),
(28, '127.0.0.1', '2022-09-26 01:12:07am'),
(29, '127.0.0.1', '2022-09-26 01:12:16am'),
(30, '127.0.0.1', '2022-09-26 01:12:35am'),
(31, '127.0.0.1', '2022-09-27 01:45:02am'),
(32, '127.0.0.1', '2022-09-27 01:45:05am'),
(33, '127.0.0.1', '2022-10-06 09:18:22pm'),
(34, '127.0.0.1', '2022-10-06 09:18:29pm'),
(35, '127.0.0.1', '2022-10-06 09:21:16pm'),
(36, '127.0.0.1', '2022-10-06 09:23:15pm'),
(37, '127.0.0.1', '2022-10-06 09:23:19pm'),
(38, '127.0.0.1', '2022-10-06 09:23:30pm'),
(39, '127.0.0.1', '2022-10-06 09:26:26pm'),
(40, '127.0.0.1', '2022-10-06 09:26:59pm'),
(41, '127.0.0.1', '2022-10-06 09:28:42pm'),
(42, '127.0.0.1', '2022-10-06 09:30:39pm'),
(43, '127.0.0.1', '2022-10-06 09:31:36pm'),
(44, '127.0.0.1', '2022-10-06 09:32:16pm'),
(45, '127.0.0.1', '2022-10-06 09:32:28pm'),
(46, '127.0.0.1', '2022-10-06 09:32:49pm'),
(47, '127.0.0.1', '2022-10-06 09:33:07pm'),
(48, '127.0.0.1', '2022-10-06 09:35:23pm'),
(49, '127.0.0.1', '2022-10-06 09:36:29pm'),
(50, '127.0.0.1', '2022-10-06 09:36:49pm'),
(51, '127.0.0.1', '2022-10-06 09:37:10pm'),
(52, '127.0.0.1', '2022-10-06 09:38:23pm'),
(53, '127.0.0.1', '2022-10-06 09:51:30pm'),
(54, '127.0.0.1', '2022-10-06 09:52:34pm'),
(55, '127.0.0.1', '2022-10-06 09:52:49pm'),
(56, '127.0.0.1', '2022-10-06 09:53:08pm'),
(57, '127.0.0.1', '2022-10-06 09:53:30pm'),
(58, '127.0.0.1', '2022-10-06 09:54:31pm'),
(59, '127.0.0.1', '2022-10-06 09:55:03pm'),
(60, '127.0.0.1', '2022-10-06 09:55:41pm'),
(61, '127.0.0.1', '2022-10-06 09:56:13pm'),
(62, '127.0.0.1', '2022-10-06 09:56:59pm'),
(63, '127.0.0.1', '2022-10-06 09:57:48pm'),
(64, '127.0.0.1', '2022-10-06 09:58:16pm'),
(65, '127.0.0.1', '2022-10-06 09:59:10pm'),
(66, '127.0.0.1', '2022-10-06 10:01:03pm'),
(67, '127.0.0.1', '2022-10-06 10:02:13pm'),
(68, '127.0.0.1', '2022-10-06 10:03:59pm'),
(69, '127.0.0.1', '2022-10-06 10:04:42pm'),
(70, '127.0.0.1', '2022-10-06 10:05:43pm'),
(71, '127.0.0.1', '2022-10-06 10:06:06pm'),
(72, '127.0.0.1', '2022-10-06 10:07:12pm'),
(73, '127.0.0.1', '2022-10-06 10:07:46pm'),
(74, '127.0.0.1', '2022-10-06 10:08:06pm'),
(75, '127.0.0.1', '2022-10-06 10:08:25pm'),
(76, '127.0.0.1', '2022-10-09 08:33:35pm'),
(77, '127.0.0.1', '2022-10-09 08:33:40pm'),
(78, '127.0.0.1', '2022-10-09 08:35:20pm'),
(79, '127.0.0.1', '2022-10-09 08:39:14pm'),
(80, '127.0.0.1', '2022-10-09 08:39:46pm'),
(81, '127.0.0.1', '2022-10-09 08:41:24pm'),
(82, '127.0.0.1', '2022-10-09 08:41:57pm'),
(83, '127.0.0.1', '2022-10-09 08:44:36pm'),
(84, '127.0.0.1', '2022-10-09 08:46:27pm'),
(85, '127.0.0.1', '2022-10-09 08:48:55pm'),
(86, '127.0.0.1', '2022-10-09 08:56:51pm'),
(87, '127.0.0.1', '2022-10-09 08:57:14pm'),
(88, '127.0.0.1', '2022-10-09 09:47:31pm'),
(89, '127.0.0.1', '2022-10-09 09:48:37pm'),
(90, '127.0.0.1', '2022-10-09 09:51:38pm'),
(91, '127.0.0.1', '2022-10-09 09:51:41pm'),
(92, '127.0.0.1', '2022-10-09 09:52:49pm'),
(93, '127.0.0.1', '2022-10-09 09:53:44pm'),
(94, '127.0.0.1', '2022-10-09 09:53:53pm'),
(95, '127.0.0.1', '2022-10-09 09:54:03pm'),
(96, '127.0.0.1', '2022-10-09 09:54:24pm'),
(97, '127.0.0.1', '2022-10-09 09:54:52pm'),
(98, '127.0.0.1', '2022-10-09 09:55:07pm'),
(99, '127.0.0.1', '2022-10-09 09:56:38pm'),
(100, '127.0.0.1', '2022-10-09 09:57:44pm'),
(101, '127.0.0.1', '2022-10-09 09:58:21pm'),
(102, '127.0.0.1', '2022-10-09 09:58:35pm'),
(103, '127.0.0.1', '2022-10-09 09:58:46pm'),
(104, '127.0.0.1', '2022-10-09 09:59:12pm'),
(105, '127.0.0.1', '2022-10-09 10:09:56pm'),
(106, '127.0.0.1', '2022-10-09 10:10:28pm'),
(107, '127.0.0.1', '2022-10-09 10:11:48pm'),
(108, '127.0.0.1', '2022-10-09 11:32:01pm'),
(109, '127.0.0.1', '2022-10-09 11:32:32pm'),
(110, '127.0.0.1', '2022-10-10 07:40:01pm'),
(111, '127.0.0.1', '2022-10-10 07:40:25pm'),
(112, '127.0.0.1', '2022-10-10 07:41:12pm'),
(113, '127.0.0.1', '2022-10-10 08:32:29pm'),
(114, '127.0.0.1', '2022-10-10 10:12:11pm'),
(115, '127.0.0.1', '2022-10-10 11:01:42pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_policy`
--
ALTER TABLE `return_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_condition`
--
ALTER TABLE `terms_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `return_policy`
--
ALTER TABLE `return_policy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms_condition`
--
ALTER TABLE `terms_condition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
