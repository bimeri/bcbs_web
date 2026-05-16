-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 04:17 AM
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
-- Database: `bcbs_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'image/profiles/2.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `contact`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Bimeri Noel', '678657959', 'bimerinoel@gmail.com', 'hello my name is noel', '2022-09-18 09:57:14', '2022-09-18 09:57:14'),
(2, 'Bimeri Noel', '678657959', 'bimerinoel@gmail.com', 'thank God', '2022-09-18 09:58:09', '2022-09-18 09:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `directordetails`
--

CREATE TABLE `directordetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `director_id` int(10) UNSIGNED NOT NULL,
  `spouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `children` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `describtion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'director_bcbs.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directordetails`
--

INSERT INTO `directordetails` (`id`, `director_id`, `spouse`, `children`, `job_title`, `Sub_title`, `describtion`, `email`, `alt_email`, `contact`, `fax`, `address`, `profile`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mrs. Elisabeth', '4', 'Civil Engineer', 'Director of BCBS', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae expedita provident reiciendis libero consequatur molestiae impedit, hic in, quos consectetur unde repellendus vitae ipsum explicabo nulla, excepturi facilis atque qui!', 'otia.arron@gmail.com', 'otia.arron@yahoo.fr', NULL, NULL, 'Street one Great-Soppo Buea', 'director_bcbs.jpg', '2022-07-30 11:20:33', '2022-07-30 11:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speech` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `name`, `duration`, `occupation`, `intro`, `speech`, `created_at`, `updated_at`) VALUES
(1, 'ESOH ARRON OTIA', '2015 - current', 'Civil Engineer/Pastor', 'If you have just discovered Buea College of Biblical Studies, I’d like to take this opportunity to extend a warm welcome and tell you a bit about the institution', 'Our university located in the historic town of Buea on the eastern flank of Mount Cameroon, it is a bilingual institution of its kind in predominantly English and French. It can easily be reached by an all-season, asphalted highway from the port city of Limbe, and some 33 km to the West, or from the Douala International airport that lies 70 km to the East. We offer a rich portfolio of about degree programmes at the Bachelor’s, Master’s and PhD levels, all of them designed to comply with the Sunset International institute standard. Our degree programmes continue to attract many of applications from within and abroad.<br>\r\nAdmissions will soon be open for another full four years undergraduate students. Please endeavor to have the admission form on time, fill and submit before deadline. All admission requirements will be mentioned in the Admission form which will be given to you once and its un-renewable. There are a lot of benefit if you be one of our students, benefits which will not be listed here, only when on campus. God bless you all as you put your interest in the Word of God. Amen.', '2022-07-30 11:20:16', '2022-09-20 22:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isExpired` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `message`, `profile`, `event_date`, `creator`, `isExpired`, `created_at`, `updated_at`) VALUES
(1, 'Graduating student 2015', 'The school here by denounces that the following Student graduated for the academic year 2015. In partial fulfillment of the award of Bachelor Degree', 'https://student.bcbs.net.co/image/event/graduation_student_2015.jpg', '2022-09-30', 'Otia Arron', 1, '2022-07-30 11:19:22', '2022-09-18 16:47:21'),
(2, 'Matriculating student 2015', 'The school here by denounces that the following Student are matriculating for the academic year 2015. In partial fulfillment of the award of Bachelor Degree', 'image/event/matriculating_student_2015.jpg', 'Otia Arron', 'Otia Arron', 0, '2022-07-30 11:19:22', '2022-07-30 11:19:22'),
(3, 'Mass Evangelism', 'The school is well pleased with the effective work of God that it students are envolve in. Bringing Souls to the Author and finisher of Faith. Massive evangelism was carried out at Bokwango-Buea (South west region of Cameroon)', 'https://student.bcbs.net.co/image/event/evan.jpg', '2022-09-21', 'Otia Arron', 1, '2022-07-30 11:19:22', '2022-09-18 16:48:01'),
(4, 'Establishement of a new congregation', 'The Student of Buea College of Biblical Studies, with the power and authority of Our Lord Jesus Christ (<em class=\"blue-text\">Mathew18:19-20</em>) has established a new congregation in Bokwango', 'image/event/new_cong.jpg', 'Otia Arron', 'Otia Arron', 0, '2022-07-30 11:19:22', '2022-07-30 11:19:22'),
(5, 'New Event', 'no valid description', 'https://student.bcbs.net.co/image/event/omam.jpg', '2022-09-22', 'Noel', 0, '2022-09-18 16:51:41', '2022-09-18 16:52:06');

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
(4, '2021_04_16_211700_create_admins_table', 1),
(5, '2021_04_16_225852_create_settings_table', 1),
(6, '2021_07_24_003225_create_questions_table', 1),
(7, '2021_07_24_102900_create_contacts_table', 1),
(8, '2021_10_08_153149_create_welcomes_table', 1),
(9, '2021_10_30_201205_create_directors_table', 1),
(10, '2021_10_30_201717_create_directordetails_table', 1),
(11, '2021_11_06_082652_create_testimonials_table', 1),
(12, '2021_11_07_135133_create_events_table', 1),
(13, '2022_07_10_235659_create_website_abouts_table', 1),
(19, '2022_08_06_212404_create_staff_table', 2);

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `email`, `question`, `reply`, `created_at`, `updated_at`) VALUES
(1, 'bimerinoel@gmail.com', 'thank you sir', NULL, '2022-09-18 13:33:59', '2022-09-18 13:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_session` tinyint(1) NOT NULL DEFAULT 0,
  `exam_session` tinyint(1) NOT NULL DEFAULT 0,
  `lecture_hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_registration` tinyint(1) NOT NULL DEFAULT 0,
  `course_registration_deadline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_access` tinyint(1) NOT NULL DEFAULT 0,
  `dean` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `school_name`, `school_code`, `motto`, `logo`, `test_session`, `exam_session`, `lecture_hour`, `course_registration`, `course_registration_deadline`, `teacher_access`, `dean`, `created_at`, `updated_at`) VALUES
(1, 'Buea College of Biblical Studies', 'BC', 'Train Faithful men to train others for the sevice of the Lord', 'image/logo/logo.png', 0, 0, '2hr', 0, NULL, 0, NULL, '2022-07-30 11:19:05', '2022-07-30 11:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wife` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_baptise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `description`, `dob`, `marital`, `gender`, `occupation`, `kids`, `wife`, `contact`, `email`, `country`, `region`, `date_baptise`, `profile`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ukah David', 'Mr. Ukah David, baptize in May 1995 in Tiko Cameroon, appointed as preacher of Church of Christ Ekona Town in 2004 obtain GCE and went to school of Biblical Studies Jos Nigeria to study CRS affiliated to University of Jos Nigeria and obtain BA, in Biblical studies, Presently now with MA from Bear Valley USA, and Dean of Studies with BCBS', 'Sep 13, 1990', 'Married', 'Female', 'Teacher', NULL, NULL, 678678947, 'david.ukah@bcbs.net.co', 'Cameroon', NULL, '1995', 'https://student.bcbs.net.co/image/teachers/david.jpg', 1, '2022-09-18 10:54:32', '2022-09-18 12:34:09'),
(2, 'Nkimbeng Desmond Akumtoh', 'I was enrolled at BCBS in 2015, the beta batch and graduated 2019. Currently serving as instructor in BCBS.', NULL, 'Sigle', 'Female', 'PHD. Students', NULL, NULL, NULL, 'desmond.nkimbeng@bcbs.net.co', 'Cameroon', 'South West region', NULL, 'https://student.bcbs.net.co/image/teachers/desmod.jpg', 1, '2022-09-18 12:46:05', '2022-09-18 12:46:05'),
(3, 'Ngah William', 'Teacher of Buea college of Biblical studies. Preacher at the Kumba town Church of Christ', NULL, 'Married', 'Female', NULL, NULL, NULL, 675925180, 'william.ngah@bcbs.net.co', 'Cameroon', 'South West region', NULL, 'https://student.bcbs.net.co/image/teachers/william.jpg', 1, '2022-09-18 13:06:37', '2022-09-18 13:06:37'),
(4, 'Oman Christopher Ndumbe', 'Teacher of Buea college of Biblical studies. Preacher at the Bokoko Church of Christ. Current Elder of Bokoko Church of Christ. Civil Engineer', NULL, 'Married', 'Female', 'Civil Engineer', '3', 'Esther Omam', 677605293, 'omam.christopher@bcbs.net.co', 'Cameroon', 'West', NULL, 'https://student.bcbs.net.co/image/teachers/omam.jpg', 1, '2022-09-18 13:08:57', '2022-09-18 13:08:57'),
(5, 'Tanjeck Paul', 'Teacher of Buea college of Biblical studies. Preacher at the Bokoko congregation. Civil Engineer', NULL, 'Married', 'Female', NULL, NULL, NULL, 677973504, 'tanject.paul@bcbs.net.co', 'Cameroon', 'South West region', NULL, 'https://student.bcbs.net.co/image/teachers/tanjeck.jpg', 1, '2022-09-18 13:10:49', '2022-09-18 13:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `conclusion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `dislike` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `profile`, `message`, `conclusion`, `likes`, `dislike`, `created_at`, `updated_at`) VALUES
(1, 'Bimeri Noel', 'image/testimonial/noel.jpg', 'Hi there, If you are still thinking or Dreaming of a Bible Institute, then i tell you that there is no more time to get started with BCBS. Here, I was being trained with Biblical raw fact and evidence, and can now judge the bible perfectly through the written Word. Many things i have learn that i can\'t even put them down, just to testify that BCBS is the best Bible Institute 4 years program in partnership with Sunset Internation Institute USA.', 'Joint BCBS an end a Bachelor degree, Knowing the word of God in Your life', 1050, 0, '2022-07-30 11:20:00', '2022-07-30 11:20:00'),
(2, 'Bill John', 'https://bcbs.net.co/image/testimonial/IMG-20220906-WA0076.jpg', 'Hi there, If you are still thinking or Dreaming of a Bible Institute, then i tell you that there is no more time to get started with BCBS. Here, I was being trained with Biblical raw fact and evidence, and can now judge the bible perfectly through the written Word. Many things i have learn that i can\'t even put them down, just to testify that BCBS is the best Bible Institute 4 years program in partnership with Sunset Internation Institute USA.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio vitae eligendi', 201, 0, '2022-07-30 11:20:00', '2022-09-07 14:58:31'),
(3, 'Anold Rex', 'image/testimonial/next.jpg', 'Hi there, If you are still thinking or Dreaming of a Bible Institute, then i tell you that there is no more time to get started with BCBS. Here, I was being trained with Biblical raw fact and evidence, and can now judge the bible perfectly through the written Word. Many things i have learn that i can\'t even put them down, just to testify that BCBS is the best Bible Institute 4 years program in partnership with Sunset Internation Institute USA.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio vitae eligendi', 2003, 0, '2022-07-30 11:20:00', '2022-07-30 11:20:00'),
(4, 'Anold Rex', 'image/testimonial/next.jpg', 'Hi there, If you are still thinking or Dreaming of a Bible Institute, then i tell you that there is no more time to get started with BCBS. Here, I was being trained with Biblical raw fact and evidence, and can now judge the bible perfectly through the written Word. Many things i have learn that i can\'t even put them down, just to testify that BCBS is the best Bible Institute 4 years program in partnership with Sunset Internation Institute USA.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio vitae eligendi', 2003, 0, '2022-07-30 11:20:00', '2022-07-30 11:20:00'),
(5, 'Bill John', 'https://student.bcbs.net.co/image/testimonial/2.png', '<p>Hi there, If you are still thinking or Dreaming of a Bible Institute, then i tell you that there is no more time to get started with BCBS. Here, I was being trained with Biblical raw fact and evidence, and can now judge the bible perfectly through the written Word. Many things i have learn that i can\'t even put them down, just to testify that BCBS is the best Bible Institute 4 years program in partnership with Sunset Internation Institute USA.</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio vitae eligendi</p>', NULL, NULL, '2022-09-07 14:20:43', '2022-09-17 21:44:36'),
(6, 'Noel Magaza', 'https://bcbs.net.co/image/testimonial/IMG-20220906-WA0003.jpg', '<p>no much to say ok</p>', '<p><strong>bcbs is great well</strong></p>', NULL, NULL, '2022-09-07 17:57:11', '2022-09-08 00:02:12');

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

-- --------------------------------------------------------

--
-- Table structure for table `website_abouts`
--

CREATE TABLE `website_abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `welcome_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduction_video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goal` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curriculum` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objective` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_abouts`
--

INSERT INTO `website_abouts` (`id`, `welcome_text`, `introduction_video`, `goal`, `curriculum`, `objective`, `mission`, `created_at`, `updated_at`) VALUES
(1, 'The <b>Buea College of Biblical Studies (BCBS)</b> affiliated to <b>Sunset Institutional Bible Institute (SIBI) Lubbock Texas</b>, opened it doors in 2011, is a bible training institute, that aims to train men and women well guided to the word through systematic instruction in all of the scriptures, to be partionately, committed in evangelism along with the discovery of each man\'s ministry giftedness, to be found in morals, family, fraternal relationship and in doctrine. To be graced by God, Christ led and Spirit fed <b>(1 Timothy 2:2)</b>. BCBS, aim at multiplying the number of able men and women in Cameroon and beyond, to preach, plan and grow strong churches. BCBS believes that, the shortest distance to evangelism is in an aggressive multiplication of indigenous preachers <b>(Romans 10 13:15)</b>. BCBS has tasted a tested a combination of Bible and ministry courses, set in sequence, measured in hours of institution and blended with practicum and mentoring in teach and graduating well rounded preachers and student of the bible. BCBS is careful to avoid making students or churches dependent or comfortable with class study resources, but we train to make the student understand that training a promise of foreign support and that the local churches need to select and sustain men to be trained or employed in ministry. BCBS is comfortable in encouraging local churches to support an able and trustworthy brother with the desire to serve accountable in church ministry, church planting, nurturing and growth. BCBS envision to see every person from every nation taught the gospel in their own language and culture by preachers, teachers and church leaders equipped in a local setting who will teach the  lost, plan strong and healthy congregations and train the next generation of preachers and leaders.', NULL, NULL, NULL, NULL, 'The BCBS was established for the purpose of educating men and women in the work of God. the school seeks to maintain itself as an institute that trains men and women to preach the gospel, be responsible citizens and affective leaders in the church of the Lord, in order to spread the Gospel to the entire world. this inline with the mission statement <b>\"And the things which you have heard me say in the presence of many witness, entrust to faithful men who will also be qualified to teach others.\" 2 Timothy 2:2</b>', '2022-08-15 16:43:59', '2022-08-15 16:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `welcomes`
--

CREATE TABLE `welcomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directordetails`
--
ALTER TABLE `directordetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `director_email` (`email`),
  ADD KEY `directordetails_director_id_foreign` (`director_id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `website_abouts`
--
ALTER TABLE `website_abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `welcomes`
--
ALTER TABLE `welcomes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `directordetails`
--
ALTER TABLE `directordetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_abouts`
--
ALTER TABLE `website_abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `welcomes`
--
ALTER TABLE `welcomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `directordetails`
--
ALTER TABLE `directordetails`
  ADD CONSTRAINT `directordetails_director_id_foreign` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
