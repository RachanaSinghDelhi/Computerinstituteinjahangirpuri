-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 05:31 PM
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
-- Database: `computerinstituteindelhi`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) NOT NULL,
  `title` varchar(300) NOT NULL,
  `des` varchar(300) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `des`, `content`) VALUES
(1, 'About Us', 'Nice Computer Institute since 2001 is one of the best &courses offered are graphic design, Marg, Tally,Adv.Exl,Web Design & development,Basic,busy and many more.​Nice Computer Instituteis One Of the Best Computer Institute In Jahangirpuri, Delhi. Nice Web Technologies is an independent education ins', '            <p>\r\n                <b>Nice Computer Institute is one of the best since 2001.</b>Some of the computer courses offered are graphic design, Marg Tally,Adv.Exl,Web Design & development,Basic,busy and many more.​\r\n            </p>\r\n            \r\n            <p>\r\n            Nice Computer Institute is One Of the Best Computer Institute In Jahangirpuri, Delhi. Nice Web Technologies is an independent education institute established in 2001. Not only institute focuses on creating a friendly environment and providing quality teaching and learning but also with 100% practical, the Institute provides most with its theory classes as well .\r\n            \r\n            </p>\r\n            <h1 class=\"display-5\">Nice Computer Institute Welcomes You..</h1>\r\n            \r\n            <p>\r\n            Nice Computer Institute is ​​ a computer institute in jahangirpuri welcomes you to explore the unlimited boundaries of I.T. education.Moreover, Welcoming you at Nice Computer Institute we always call our students dreamers who aspire to dream and achieve big.​​​​​​​​\r\n            \r\n            </p>\r\n        <h1 class=\"display-5\">Aims To Provide The Best</h1> \r\n<p>Although there are several organizations who teach computer or who deal in computer education but what makes us different in the folk is the technique, technology and methodology which we adopt at our computer institute.</p>\r\n            \r\n            <h1 class=\"display-5\">Adapts The Best Teaching Methodologies</h1> \r\n<p>We bring you the best in I.T. training methodology. Besides this, The faculties always train themselves so that you can get the latest information and knowledge in the field.</p>\r\n            \r\n            <h1 class=\"display-5\">Authorized Training Partners</h1> \r\n<p>Nice Computer is authorized as well as the largest partner of MARG ERP System, BUSY and Webtel-E-Accountancy and we can bring to you the Latest Software Updates and providing you with the latest technical details and functions in the field of computer education.\r\n\r\nFirst of all, at Nice, we not only provide you Offline Lab and Theoretical classes but also we have the facility of providing online classes at your convenient places. These facilities make us the leading institute for Working Class, Housewives and especially able persons.</p>   \r\n            \r\n            <h1 class=\"display-5\">Placed more than 1000 students</h1> \r\n<p>With the help of our HR-Managers and our In-House Placement services, we not only help you in searching for jobs but also provide training for Interviews and Group Discussions.</p>  \r\n            \r\n            <h1 class=\"display-5\">Also Update you Regularly</h1> \r\n<p>We provide you with regular updates and notifications on your exclusive social media platform so that you are always aware of New Development in I.T. Field and our services to you.\r\n\r\nThanks once again for selecting us to serve you and I, on behalf of Nice Web Technologies assure you for the best teaching practices and services to all our entrants.</p>\r\n            \r\n            <h1 class=\"display-6\">What are some of the top courses provided by computer training institutes in Delhi?</h1> \r\n\r\n    <ol class=\"list-group py-4\">\r\n        <ul>AutoCAD (Computer Aided Design)</ul>\r\n        <ul>Marg accountancy course (ERP-9)</ul>\r\n        <ul>Tally accountancy course (ERP-9)</ul>\r\n        <ul>Advance Excel Course</ul>\r\n        <ul>Graphic Designing Course</ul>\r\n        <ul>Web Designing Course</ul>\r\n        <ul>Busy accountancy course</ul>\r\n        <ul>Java Programming Language</ul>\r\n        <ul>C++ Programming Language</ul>\r\n        <ul>C Programming Language</ul>\r\n            \r\n            </ol>\r\n            \r\n            \r\n       <h1 class=\"display-6\">Are there online computer training institutes in Delhi?</h1> \r\n\r\n    <p>Nice Computer Insitute Provides Online Classes as Online for students who are not able to come for offline classes. The classes are conducted through our online education department duly monitored and conducted by senior faculties. These are interactive classes where students can interact and ask questions.</p>      \r\n   \r\n                   <h1 class=\"display-6\">What are the various mode of payment accepted here ?</h1> \r\n<p>Payments that are accepted at Nice Computer Institute\r\nare:</p>\r\n    <ol class=\"list-group py-4\">\r\n        <ul>PAYTM</ul>\r\n        <ul>GOOGLE PAY</ul>\r\n        <ul>AMAZON PAY</ul>\r\n        <ul>PHONE PAY</ul>\r\n        <ul>CASH</ul>\r\n        <ul>UPI</ul>\r\n        <ul>CREDIT CARD</ul>\r\n        <ul>DEBIT CARD</ul>\r\n        <ul>CHEQUE</ul>\r\n    </ol>\r\n            \r\n            \r\n            <h1 class=\"display-6\">Which is the nearest landmark ?</h1> \r\n\r\n    <p>Besides being nearby pizza palace, behind SBI bank on Jahangirpuri main road in A-Block.</p>  \r\n            \r\n            \r\n            <h1 class=\"display-6\">What are its hours of operation ?</h1> \r\n\r\n    <p>7AM-8PM EVERYDAY, MONDAY to SATURDAY, SUNDAY OFF.</p>\r\n            \r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_image` varchar(300) NOT NULL,
  `course_title` varchar(300) NOT NULL,
  `course_desc` varchar(300) NOT NULL,
  `course_content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_image`, `course_title`, `course_desc`, `course_content`) VALUES
(1, 'images/autocad_nice_computer_institute_jahangirpri.jpg', 'AutoCAD Training', 'AutoCad training at Nice Computer Institute in Jahangirpuri. AutoCAD is computer-aided design (CAD) software that architects, engineers and construction professionals rely on to create precise 2D and 3D drawings.', 'What is AutoCAD?\r\nAutoCad training at Nice Computer Institute in Jahangirpuri. AutoCAD is computer-aided design (CAD) software that architects, engineers and construction professionals rely on to create precise 2D and 3D drawings.\r\n\r\nDraft, annotate and design 2D geometry and 3D models with solids, '),
(2, '', 'Basic ', 'Nice Computer Institute Provides with the best job oriented basic computer course in Jahangirpuri. This course comprises of :', 'Course Outlines\r\nIntroduction to Computer System \r\nBasic Computer Concept\r\nComputer Organisation\r\nWindows OS\r\nMicrosoft Office\r\nMS Word\r\nMS Excel\r\nMS PowerPoint\r\nInternet & its usage '),
(3, '', 'Advance Excel', '', ''),
(4, '', 'Web Designing & Developement', '', ''),
(5, '', 'Tally(Prime)', '', ''),
(6, '', 'Marg', '', ''),
(7, 'Busy', '', '', ''),
(8, '', 'Python', '', ''),
(9, '', 'Web dgn & Digital Mkt.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` bigint(20) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `content`) VALUES
(1, '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">\r\n    <title>Nice Computer Institute &#8211; Be a Part Of I.T</title>\r\n    <link rel=\"icon\" href=\"images/logo_new_icon_nice_computer_institute_jahangirpuri.png\"   type=\"image/x-icon\">\r\n    <link rel=\"stylesheet\" href=\"bootstrap5/bootstrap-5.0.2-dist/css/bootstrap.min.css\" type=\"text/css\">\r\n    <link rel=\"stylesheet\" href=\"css/style.css\">\r\n    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css\" />\r\n</head>\r\n\r\n<body>\r\n    <script>\r\n\r\n\r\n    </script>\r\n    <!---topbar-->\r\n\r\n\r\n    <div class=\"main-top\">\r\n\r\n        <nav class=\" navbar topbar navbar-expand-lg\">\r\n\r\n            <div class=\"container container-fluid\">\r\n                <button class=\"navbar-toggler flex top-button\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#topbar\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">\r\n                    <span class=\"fa fa-arrow-down fa-2x \" style=\"color:#002147;\"></span></button>\r\n                <div class=\"collapse navbar-collapse\" id=\"topbar\">\r\n                    <ul class=\"navbar-nav me-auto mb-2 mb-lg-0  menu_list\">\r\n                        <li class=\"nav-item\">\r\n                            <a class=\"nav-link\" aria-current=\"page\" href=\"#\"> <i class=\"fa fa-clock-o \" style=\"color:#fff;\"></i>Mon - Fri 7AM-8PM</a>\r\n                        </li>\r\n                        <li class=\"nav-item\">\r\n                            <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-phone\" style=\"color:#fff;\">9312945741 </i></a>\r\n                        </li>\r\n                        <li class=\"nav-item\">\r\n                            <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-paper-plane\" style=\"color:#fff;\"></i> A1- 9/10, A Block Rd, near Da Pizza Palace,Jahangirpuri, Delhi, 110033</a>\r\n                        </li>\r\n                        <li class=\"nav-item\">\r\n                            <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-envelope\" style=\"color:#fff;\"></i> nicewebtechnologies@gmail.com</a>\r\n                        </li>\r\n                    </ul>\r\n                    <!-- <p class=\"collapse navbar-collapse py-2\" id=\"topbar\">\r\n                            <i class=\"fa fa-paper-plane\" style=\"color:#fff;\"></i><a aria-current=\"page\" href=\"#\">Mon - Fri 7AM-8PM &nbsp;&nbsp;</a>\r\n                            <i class=\"fa fa-phone\" style=\"color:#fff;\"> </i><a aria-current=\"page\" href=\"#\">9312945741 &nbsp;&nbsp;</a>\r\n                        </p>-->\r\n                </div>\r\n            </div>\r\n        </nav>\r\n    </div>\r\n\r\n    <!-- topbar--->\r\n    <!---Navabr --->\r\n\r\n    <header1>\r\n        <nav class=\"navbar navbar-expand-lg navbar-light bg-light nav_nice\">\r\n            <div class=\"container container-fluid\">\r\n                <img src=\"images/logo1_3D_half.png\" width=\"150\" height=\"100\">\r\n                <p class=\"logo\"><a class=\"navbar-brand brand_nice \" href=\"#\">Nice Computer Institute</a><br>\r\n                    <a class=\"tagline_nice\" href=\"#\">Be a Part Of I.T.</a>\r\n                </p>\r\n                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">\r\n                    <span class=\"navbar-toggler-icon nice_toggler\"></span>\r\n                </button>\r\n                <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">\r\n                    <ul class=\"navbar-nav ms-auto mb-2 mb-lg-0  menu_list\">\r\n                        <li class=\"nav-item\">\r\n                            <a class=\"nav-link\" aria-current=\"page\" href=\"index.php\">Home</a>\r\n                        </li>\r\n                        <li class=\"nav-item\">\r\n                            <a class=\"nav-link\" href=\"about.php\">About Us</a>\r\n                        </li>\r\n                        <li class=\"nav-item dropdown\">\r\n                            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" id=\"course\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\" id=\"get_course\">\r\n                                Courses\r\n                            </a>\r\n                       <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\" id=\"get_course\">\r\n                                 <!--  <li><a class=\"dropdown-item \" href=\"#\">Baic</a></li>-->\r\n                            </ul>\r\n                        </li>\r\n                        <li class=\"nav-item\">\r\n                            <a class=\"nav-link \" href=\"#\">News</a>\r\n                        </li>\r\n                        <li class=\"nav-item\">\r\n                            <a class=\"nav-link\" href=\"contact.php\">Contact</a>\r\n                        </li>\r\n                        <li class=\"nav-item\">\r\n                            <button class=\"btn btn-light\"> <span class=\"whatsapp\"><a href=\"https://wa.me/9312945741\"><i class=\"fa fa-whatsapp\" style=\"font-size:48px;color:green;\"></i></a></span></button>\r\n                        </li>\r\n                    </ul>\r\n\r\n\r\n                </div>\r\n            </div>\r\n        </nav>\r\n\r\n        <!--- navabr ends -->\r\n\r\n        <!---crousel starts ---->\r\n        \r\n</header1>');

-- --------------------------------------------------------

--
-- Table structure for table `intro`
--

CREATE TABLE `intro` (
  `id` int(11) NOT NULL,
  `intro_title` varchar(300) NOT NULL,
  `desc` varchar(300) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intro`
--

INSERT INTO `intro` (`id`, `intro_title`, `desc`, `content`) VALUES
(0, '\r\nComputer Institute In Jahangirpuri', 'Nice Computer Institute since 2001 is one of the best &courses offered are graphic design, Marg, Tally,Adv.Exl,Web Design & development,Basic,busy and many more.​Nice Computer Instituteis One Of the Best Computer Institute In Jahangirpuri, Delhi. Nice Web Technologies is an independent education ins', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `des` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sidebar`
--

CREATE TABLE `sidebar` (
  `id` bigint(20) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sidebar`
--

INSERT INTO `sidebar` (`id`, `content`) VALUES
(1, '\r\n            <h1 class=\"display-3\">\r\n               Join Now\r\n            </h1>\r\n            \r\n            <p><img src=\"images/support_nice_computer_institute_jahangirpuri.jpg\" class=\"img-fluid\"></p>\r\n            <h1 class=\"display-3\">\r\n                Recent Posts\r\n            </h1>\r\n            <p>Autocad Course at Nice Computer Institute, Jahangirpuri</p>\r\n            <p>Top 10 Trending Computer Courses : Nice Computer Institute</p>\r\n            <p>Elevate Your Accounting Skills with Busy Software Training!</p>\r\n            <p>Computer Institute In Jahangirpuri</p>\r\n            <p>Basic Computer Institute In Jahangirpuri</p>\r\n\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidebar`
--
ALTER TABLE `sidebar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sidebar`
--
ALTER TABLE `sidebar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
