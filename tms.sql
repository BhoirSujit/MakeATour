-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 06:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`, `name`, `email`, `mobile`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-11 11:18:49', 'admin alpha', 'adminalpha@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `ToDate` varchar(100) DEFAULT NULL,
  `Comment` mediumtext DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `membercount` int(11) DEFAULT NULL,
  `paymentstatus` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `ToDate`, `Comment`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`, `membercount`, `paymentstatus`) VALUES
(8, 16, 'sujitbhoir004@gamil.com', '2024-03-21', '2024-04-19', NULL, '2024-03-21 16:29:16', 1, NULL, '2024-05-02 04:02:30', NULL, 1),
(9, 15, 'sujitbhoir004@gamil.com', '2024-03-06', '2024-04-04', NULL, '2024-03-21 16:31:20', 1, NULL, '2024-05-02 04:18:04', NULL, 0),
(14, 14, 'apeksha@gmail.com', '2024-04-18', '2024-04-25', 'ok', '2024-03-29 09:02:02', 2, 'u', '2024-04-05 05:08:21', NULL, NULL),
(15, 7, 'apeksha@gmail.com', '2024-04-28', '2024-05-01', 'i want', '2024-04-07 09:26:32', 1, NULL, '2024-04-07 09:27:57', NULL, NULL),
(17, 16, 'sujitbhoir004@gamil.com', '2024-04-28', '2024-05-02', '', '2024-04-29 18:20:12', 2, 'a', '2024-05-01 18:59:16', NULL, NULL),
(18, 14, 'sujitbhoir004@gamil.com', '2024-04-28', '2024-05-05', '', '2024-04-29 18:22:09', 1, NULL, '2024-05-02 04:03:30', NULL, 1),
(19, 7, 'sujitbhoir004@gamil.com', '2024-05-17', '2024-05-20', 'guwahati', '2024-05-01 17:48:49', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblissues`
--

CREATE TABLE `tblissues` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `Issue` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminremarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblissues`
--

INSERT INTO `tblissues` (`id`, `UserEmail`, `Issue`, `Description`, `PostingDate`, `AdminRemark`, `AdminremarkDate`) VALUES
(15, 'seema@gmail.com', NULL, NULL, '2024-04-27 10:26:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT '',
  `detail` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `type`, `detail`) VALUES
(1, 'terms', '										<p align=\"justify\"><font size=\"2\"><strong><font color=\"#990000\">(1) ACCEPTANCE OF TERMS</font><br><br></strong>Welcome to Yahoo! India. 1Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <a href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</a>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </font></p>\r\n<p align=\"justify\"><font size=\"2\">Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </font><a href=\"http://in.docs.yahoo.com/info/terms/\"><font size=\"2\">http://in.docs.yahoo.com/info/terms/</font></a><font size=\"2\">. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </font></p>\r\n<p align=\"justify\"><font size=\"2\">Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </font><a href=\"http://in.docs.yahoo.com/info/terms/\"><font size=\"2\">http://in.docs.yahoo.com/info/terms/</font></a><font size=\"2\">. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </font></p>\r\n										'),
(2, 'privacy', '										<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>\r\n										'),
(3, 'aboutus', '<div><span style=\"color: rgb(0, 0, 0); font-family: Georgia; font-size: 15px; text-align: justify; font-weight: bold;\">Welcome to Tourism Management System!!!</span></div><span style=\"font-family: &quot;courier new&quot;;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px; text-align: justify;\">Since then, our courteous and committed team members have always ensured a pleasant and enjoyable tour for the clients. This arduous effort has enabled Shreya Tour &amp; Travels to be recognized as a dependable Travel Solutions provider with three offices Delhi.</span><span style=\"color: rgb(80, 80, 80); font-size: 13px;\">&nbsp;We have got packages to suit the discerning traveler\'s budget and savor. Book your dream vacation online. Supported quality and proposals of our travel consultants, we have a tendency to welcome you to decide on from holidays packages and customize them according to your plan.</span></span>'),
(11, 'contact', '                                                																				<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Address------choul alibag 402203</span>');

-- --------------------------------------------------------

--
-- Table structure for table `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `PackageType` varchar(150) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackagePrice` int(11) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `PackageDetails` mediumtext DEFAULT NULL,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `PackageOtherImages` varchar(100) DEFAULT NULL,
  `MapLocation` varchar(1000) DEFAULT NULL,
  `days` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`, `PackageOtherImages`, `MapLocation`, `days`) VALUES
(7, 'Guwahati and Shillong With Cherrapunji Excursion', 'Family', 'Guwahati(Sikkim)', 4500, 'Breakfast,  Accommodation » Pick-up » Drop » Sightseeing', 'After arrival at Guwahati airport meet our representative & proceed for Shillong. Shillong is the capital and hill station of Meghalaya, also known as Abode of Cloud, one of the smallest states in India. En route visit Barapani lake. By afternoon reach at Shillong. Check in to the hotel. Evening is leisure. Spent time as you want. Visit Police bazar. Overnight stay at Shillong.', 'yumthang-valley-tour.webp,guwhatisikkim1.jpg', '2020-07-08 05:54:42', '2024-05-01 17:57:39', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d229225.5954947414!2d91.53807473619781!3d26.142954845398013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5a287f9133ff%3A0x2bbd1332436bde32!2sGuwahati%2C%20Assam!5e0!3m2!1sen!2sin!4v1710695851258!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 3),
(14, 'Sweet Mist Of Manali', 'Group', 'Manali', 5999, 'pickup and drop facility, hotel and meal included', 'The enrapturing scenery fascinating weather conditions lofty peaks and magnificent places make Manali a year round attraction for the tourists. Enjoy a 3 day tour in this fantasy land and cherish it for a lifetime. The visit to Hadimba Devi Temple Vashisht Tibetan Monastery and Rohtang Pass is an indescribable experience to remember throughout your life. Explore the unique beauty of Solang Valley and hop down the malls in Manali. Enjoy shopping for some awesome shawls antiques and handicrafts.\r\n\r\nReferred to as the Queen of Himachal Pradesh, Manali is an ancient town that is located at an altitude of nearly 2050 meters in Kullu district. Manali is blessed with breathtaking natural beauty that comprises lofty snow-capped peaks of Dhauladhar and Pir Panjal, thick forests, fruit orchards, beautiful hamlets and meadows that are carpeted with lovely wild flowers. Being a high altitude resort town, Manali is an all-year-round destination that offers alluring vistas. An ideal destination for Honeymooners and adventure junkies alike, the town of Manali is a mix of old and new. Being a hub of adventure activities, Manali offers enthralling escapades of skiing, paragliding, trekking, mountaineering and rafting. Get enchanted by the surrealistic snowscape of Rohtang Pass or the Snow Point. Lose yourself in the spiritual realm by paying a visit to Hadimba Temple, Vashisth Bath and Van Vi', 'Manali_overview3.webp,manali_2__9WLpud.webp,manali_4__qv2ZAj.webp', '2024-03-17 16:32:17', '2024-03-29 07:42:11', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d53992.7852274141!2d77.1713086!3d32.2433059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39048708163fd03f%3A0x8129a80ebe5076cd!2sManali%2C%20Himachal%20Pradesh!5e0!3m2!1sen!2sin!4v1710693992541!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 7),
(15, 'Amazing Goa Trip', 'Group', 'Goa', 17500, 'pickup and drop facility, hotel and meal included.', 'Think Goa, think of exotic beaches, palm-fringed coastlines, a happening nightlife and some lip-smacking seafood! Goa has become one of the hot favourite destinations among Indian and foreign tourists alike.\r\nGoa is a favored tourist destination of people from around the world. With its vast stretches of silvery beaches caressed by the sparkling blue Arabian Sea, this city offers its visitors a medley of old-world charm and modern sophistication. The hidden coves of Goa offer an unexplored territory for the adventurer in you. Despite being the smallest state in India, Goa boasts a quality of life which is ranked No. 1 in the country. Goa is home to two World Heritage sights, namely the Bom Jesus Basilica and the churches and convents of Old Goa. The city has a very vibrant nightlife, ranked 6th in the world. Goa flaunts its Portuguese heritage in the many churches, temples, and mansions spread across the city. The Naval Aviation Museum, Fort Aguada, and the Wax Museum, showcasing the history, heritage and culture of India, are a few of the must-see attractions in Goa. The tantalizing G', 'goa1.jpeg,goa2.jpg,GOA2312_44.webp', '2024-03-17 17:10:35', '2024-03-29 07:42:23', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d492479.758781831!2d73.67704661776007!3d15.34948637924683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbfba106336b741%3A0xeaf887ff62f34092!2sGoa!5e0!3m2!1sen!2sin!4v1710695391418!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 7),
(16, 'Marvelous Mahabaleshwar', 'Family', 'Mahabaleshwar', 17690, 'pickup and drop facility, hotel and meal included', 'The erstwhile capital of Bombay Presidency, the hill town of Mahabaleshwar nestled in the Western Ghats is about 250 kilometre southeast of Mumbai, though it is closer from Pune at just 120 kilometre northeast. Mahabaleshwar is regarded the highest point in the Western Ghats, being at an elevation of 4501 foot and remains covered in thick mist come June. The month sees a sudden drop in temperature followed by heavy rains, the season when tourists stop visiting it, heralding the monsoon months. As monsoon gives way to a gentle winter, the place sees an inundation of tourists, trickling in October onwards and going on till the peak of the summer months in May. For plenty of visitors, Mahabaleshwar is a good midway point between Mumbai and Goa. Mahabaleshwar is filled with some very picturesque hiking trails aside from a fine boating lake and the historic Pratapgad Fort. Though the main activity in Mahabaleshwar remains strolling down the main pedestrian bazaar of Dr Sabne Road, apart from sampling the locally grown strawberries of the region. As you finalise one of the Mahabaleshwar tour packages, make sure it includes a visit to its famous fort and the various falls.', 'mahaballeswar1.png,mahaballeswar2.png,mahaballeswar3.png,mahaballeswar4.png', '2024-03-17 18:16:56', '2024-03-29 07:42:36', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30369.086043523323!2d73.62818211675437!3d17.925821015571472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2655313cba1bb%3A0xca8196c7aa20a0a8!2sMahabaleshwar%2C%20Maharashtra%20412806!5e0!3m2!1sen!2sin!4v1710699365884!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 4),
(17, 'Summer Beach Getaway to Thailand', 'Group', 'Thailand', 116799, 'pickup and drop facility, hotel and meal included.', 'Escape to the tropical paradise of Thailand with our Summer Beach Getaway group departure! Embark on an unforgettable journey to the stunning beaches and vibrant culture of this Southeast Asian gem. Here\'s what you can expect:\r\n\r\nDestination: Thailand, renowned for its pristine beaches, crystal-clear waters, and lush landscapes.\r\n\r\nHighlights:\r\n\r\nBeach Bliss: Lounge on the powdery sands of world-famous beaches like Phuket, Krabi, or Koh Samui. Swim, snorkel, or simply bask in the sun to your heart\'s content.\r\n\r\nIsland Hopping: Explore Thailand\'s picturesque islands on exhilarating boat excursions. Discover hidden coves, limestone cliffs, and vibrant marine life.\r\n\r\nCultural Immersion: Immerse yourself in Thai culture with visits to ancient temples, bustling markets, and authentic local villages. Experience traditional Thai cuisine and learn about the country\'s rich heritage.\r\n\r\nAdventure Activities: For the thrill-seekers, engage in adrenaline-pumping activities such as zip-lining through the jungle, kayaking in mangrove forests, or trekking to breathtaking viewpoints.\r\n\r\nRelaxation & Wellness: Indulge in rejuvenating spa treatments, yoga sessions on the beach, or tranquil sunset cruises. Unwind and recharge amidst the serene beauty of Thailand.\r\n\r\nNightlife: Experience the vibrant nightlife of Thailand with beachside parties, fire shows, and cultural performances. Dance the night away under the stars or enjoy a quiet drink by the ocean.', 'q6oq9vac.png,vok1ahif.png,klidh891.png', '2024-03-25 15:38:44', '2024-03-29 07:42:46', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3932.712208237769!2d100.00143547582113!3d9.705585390385336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3054fc32134eb39f%3A0x9da8c60f4007b05c!2sSummer%20Resort!5e0!3m2!1sen!2sin!4v1711380968824!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `EmailId` varchar(70) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(8, 'SUJIT J BHOIR', '654534235434', 'sujitbhoir004@gamil.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-10 18:49:29', '2024-03-11 17:41:40'),
(12, 'apeksha bhoir', '9284398403', 'apeksha@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-03-29 08:47:10', NULL),
(15, 'seema bhoir', '9284398429', 'seema@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-04-27 10:26:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissues`
--
ALTER TABLE `tblissues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblissues`
--
ALTER TABLE `tblissues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
