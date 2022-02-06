-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 12:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcrealtors69_db`
--
CREATE DATABASE IF NOT EXISTS `dcrealtors69_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dcrealtors69_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `Admin_id` int(11) NOT NULL,
  `AdminName` varchar(25) NOT NULL,
  `AdminPassword` varchar(32) NOT NULL,
  `AdminEmail` varchar(25) NOT NULL,
  `AdminAvatar` varchar(255) NOT NULL,
  `IsAdmin_loggedIn` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`Admin_id`, `AdminName`, `AdminPassword`, `AdminEmail`, `AdminAvatar`, `IsAdmin_loggedIn`) VALUES
(1, 'Isabella Brown', '90a2c5abebfb978e725079be6505bf2a', 'Isabella@gmail.com', 'img/avatar/default-avatar2.png', 'FALSE'),
(2, 'William Johnson', 'b83d54741853354be04a23ef13a06b3e', 'William@gmail.com', 'img/avatar/default-avatar2.png', 'FALSE'),
(3, 'Gemma Lewell', '8b5d58a7c8cb699c6537445bd9f43e7b', 'Gemma@gmail.com', 'img/avatar/default-avatar2.png', 'FALSE'),
(4, 'Neil Archer', '4504f124260303b29ae3118ec390062c', 'Neil@gmail.com', 'img/avatar/default-avatar2.png', 'FALSE'),
(5, 'Oliver Walker', '77137d4916381817a2a25369e1934dfc', 'Oliver@gmail.com', 'img/avatar/default-avatar2.png', 'FALSE'),
(6, 'Michelle Pickering', '4f689290b5cac05e29b2851beef83284', 'Michelle@gmail.com', 'img/avatar/default-avatar2.png', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `agent_tb`
--

CREATE TABLE `agent_tb` (
  `Agent_id` int(11) NOT NULL,
  `AgentFullName` varchar(25) NOT NULL,
  `AgentPhone` varchar(10) DEFAULT NULL,
  `AgentEmail` varchar(255) DEFAULT NULL,
  `AgentAvatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent_tb`
--

INSERT INTO `agent_tb` (`Agent_id`, `AgentFullName`, `AgentPhone`, `AgentEmail`, `AgentAvatar`) VALUES
(1, 'Charlotte Smith', '215597193', 'Charlotte@gmail.com', 'img/avatar/agents/Charlotte.jpg'),
(2, 'Oliver Wilson', '214567894', 'Oliver@gmail.com', 'img/avatar/agents/Oliver.jpg'),
(3, 'Jack Brown', '234165847', 'Jack@gmail.com', 'img/avatar/agents/Jack.jpg'),
(4, 'Noah Taylor', '213167624', 'Noah@gmail.com', 'img/avatar/agents/Noah.jpg'),
(5, 'Emily Taylor', '274166884', 'Emily@gmail.com', 'img/avatar/agents/Emily.jpg'),
(6, 'Mason Patel', '263565834', 'Mason@gmail.com', 'img/avatar/agents/Mason.jpg'),
(7, 'Leo King', '244268191', 'Leo@gmail.com', 'img/avatar/agents/Leo.jpg'),
(8, 'Ava Reid', '234267799', 'Ava@gmail.com', 'img/avatar/agents/Ava.jpg'),
(9, 'George Clark', '211537397', 'George@gmail.com', 'img/avatar/agents/George.jpg'),
(10, 'Ella Harris', '224537695', 'Ella@gmail.com', 'img/avatar/agents/Ella.jpg'),
(11, 'Tash Wayne', '213265798', 'Tash@gmail.com', 'img/avatar/agents/Tash.jpg'),
(12, 'Emma Taylor-Warne', '213356878', 'Emma@gmail.com', 'img/avatar/agents/Emma.jpg'),
(13, 'Matt ORourke', '263547560', 'ORourke@gmail.com', 'img/avatar/agents/Matt.jpg'),
(14, 'Erin Rush', '294364814', 'Erin@gmail.com', 'img/avatar/agents/Erin.jpg'),
(15, 'Jeremy Burrows', '266537752', 'Jeremy@gmail.com', 'img/avatar/agents/Jeremy.jpg'),
(16, 'Julie Hurley', '213531862', 'Julie@gmail.com', 'img/avatar/agents/Julie.jpg'),
(17, 'Mark O\'Loughlin', '243527894', 'Mark@gmail.com', 'img/avatar/agents/Mark.jpg'),
(18, 'Stevie Golding', '291545943', 'Stevie@gmail.com', 'img/avatar/agents/Stevie.jpg'),
(19, 'Urszula Bedggood', '234876549', 'Urszula@gmail.com', 'img/avatar/agents/Urszula.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `officecity_tb`
--

CREATE TABLE `officecity_tb` (
  `OfficeCity_id` int(11) NOT NULL,
  `OfficeCity_City` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officecity_tb`
--

INSERT INTO `officecity_tb` (`OfficeCity_id`, `OfficeCity_City`) VALUES
(1, 'Hamilton'),
(2, 'Auckland'),
(3, 'Wellington'),
(4, 'Christchurch');

-- --------------------------------------------------------

--
-- Table structure for table `officepost_tb`
--

CREATE TABLE `officepost_tb` (
  `OfficePost_id` int(11) NOT NULL,
  `OfficePost` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officepost_tb`
--

INSERT INTO `officepost_tb` (`OfficePost_id`, `OfficePost`) VALUES
(1, '3210'),
(2, '3204'),
(3, '3216'),
(4, '1010'),
(5, '6011'),
(6, '8041');

-- --------------------------------------------------------

--
-- Table structure for table `officestreet_tb`
--

CREATE TABLE `officestreet_tb` (
  `OfficeStreet_id` int(11) NOT NULL,
  `OfficeStreet` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officestreet_tb`
--

INSERT INTO `officestreet_tb` (`OfficeStreet_id`, `OfficeStreet`) VALUES
(1, '123 Chartwell Crescent'),
(2, '26/391 victoria street'),
(3, '51 York St'),
(4, '430 Queen St'),
(5, '27 Buller St'),
(6, '228/234 Riccarton Rd');

-- --------------------------------------------------------

--
-- Table structure for table `officesuburb_tb`
--

CREATE TABLE `officesuburb_tb` (
  `OfficeSuburb_id` int(11) NOT NULL,
  `OfficeSuburb` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officesuburb_tb`
--

INSERT INTO `officesuburb_tb` (`OfficeSuburb_id`, `OfficeSuburb`) VALUES
(1, 'Chartwell'),
(2, 'Hamilton Central'),
(3, 'Hamilton East'),
(4, ' Auckland CBD'),
(5, 'Te Aro'),
(6, 'Upper Riccarton');

-- --------------------------------------------------------

--
-- Table structure for table `office_tb`
--

CREATE TABLE `office_tb` (
  `Office_id` int(11) NOT NULL,
  `Office_Phone` varchar(20) NOT NULL,
  `Office_Email` varchar(255) NOT NULL,
  `OfficeStreet_id` int(11) DEFAULT NULL,
  `OfficeSuburb_id` int(11) DEFAULT NULL,
  `OfficeCity_id` int(11) DEFAULT NULL,
  `OfficePost_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office_tb`
--

INSERT INTO `office_tb` (`Office_id`, `Office_Phone`, `Office_Email`, `OfficeStreet_id`, `OfficeSuburb_id`, `OfficeCity_id`, `OfficePost_id`) VALUES
(1, '07-563 8289', 'DuPlessisColeRealators.Hamilton@gmail.com', 1, 1, 1, 1),
(2, '07-412 8259', 'DuPlessisColeRealators.HamiltonCenter@gmail.com', 2, 2, 1, 2),
(3, '07-925 6140', 'DuPlessisColeRealators.HamiltonEast@gmail.com', 3, 3, 1, 3),
(4, '09-300 5001', 'DuPlessisColeRealators.Auckland@gmail.com', 4, 4, 2, 4),
(5, '04-566 2233', 'DuPlessisColeRealators.Wellington@gmail.com', 5, 5, 3, 5),
(6, '03-423 9472', 'DuPlessisColeRealators.Christchurch@gmail.com', 6, 6, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pricetype_tb`
--

CREATE TABLE `pricetype_tb` (
  `PriceType_id` int(11) NOT NULL,
  `PriceType` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricetype_tb`
--

INSERT INTO `pricetype_tb` (`PriceType_id`, `PriceType`) VALUES
(1, 'Auction'),
(2, 'Tender'),
(3, 'Open Home'),
(4, 'Deadline sale'),
(5, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `propertycity_tb`
--

CREATE TABLE `propertycity_tb` (
  `PropertyCity_id` int(11) NOT NULL,
  `PropertyCity` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertycity_tb`
--

INSERT INTO `propertycity_tb` (`PropertyCity_id`, `PropertyCity`) VALUES
(1, 'Hamilton'),
(2, 'Auckland'),
(3, 'Wellington'),
(4, 'Christchurch');

-- --------------------------------------------------------

--
-- Table structure for table `propertypost_tb`
--

CREATE TABLE `propertypost_tb` (
  `PropertyPost_id` int(11) NOT NULL,
  `PropertyPost` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertypost_tb`
--

INSERT INTO `propertypost_tb` (`PropertyPost_id`, `PropertyPost`) VALUES
(1, '3721'),
(2, '3204'),
(3, '3216'),
(4, '3206'),
(5, '3210'),
(6, '3200'),
(7, '0602'),
(8, '0630'),
(9, '1021'),
(10, '6022'),
(11, '6011'),
(12, '6035'),
(13, '8024'),
(14, '8025'),
(15, '8020');

-- --------------------------------------------------------

--
-- Table structure for table `propertyrecord_tb`
--

CREATE TABLE `propertyrecord_tb` (
  `PropertyRecord_id` int(11) NOT NULL,
  `Min_Price` int(11) NOT NULL,
  `SoldFor` int(11) NOT NULL,
  `IsSold` varchar(6) NOT NULL,
  `IsBid` varchar(6) NOT NULL,
  `currentBid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertyrecord_tb`
--

INSERT INTO `propertyrecord_tb` (`PropertyRecord_id`, `Min_Price`, `SoldFor`, `IsSold`, `IsBid`, `currentBid`) VALUES
(1, 399000, 0, 'FALSE', 'FALSE', 0),
(2, 698000, 0, 'FALSE', 'FALSE', 0),
(3, 549000, 549000, 'TRUE', 'FALSE', 0),
(4, 600000, 799000, 'TRUE', 'FALSE', 0),
(5, 900000, 0, 'FALSE', 'TRUE', 900000),
(6, 800000, 1000000, 'TRUE', 'TRUE', 1000000),
(7, 479000, 0, 'FALSE', 'FALSE', 0),
(8, 519000, 519000, 'TRUE', 'FALSE', 0),
(9, 345000, 0, 'FALSE', 'FALSE', 0),
(10, 475000, 500000, 'TRUE', 'FALSE', 0),
(11, 600000, 0, 'FALSE', 'FALSE', 0),
(12, 840000, 0, 'FALSE', 'FALSE', 0),
(13, 700, 0, 'FALSE', 'TRUE', 650000),
(14, 569000, 0, 'FALSE', 'FALSE', 0),
(15, 789000, 0, 'FALSE', 'FALSE', 0),
(16, 859000, 0, 'FALSE', 'FALSE', 0),
(17, 399000, 0, 'FALSE', 'FALSE', 0),
(18, 739000, 0, 'FALSE', 'FALSE', 0),
(19, 780000, 0, 'FALSE', 'FALSE', 0),
(27, 500000, 0, 'FALSE', 'FALSE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `propertystreet_tb`
--

CREATE TABLE `propertystreet_tb` (
  `PropertyStreet_id` int(11) NOT NULL,
  `PropertyStreet` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertystreet_tb`
--

INSERT INTO `propertystreet_tb` (`PropertyStreet_id`, `PropertyStreet`) VALUES
(1, '7 Watts Grove'),
(2, '26/391 Victoria Street'),
(3, '17 Pryce Place'),
(4, '20 Te Tiireke Drive'),
(5, '4 The Avenue'),
(6, '123B Avalon Drive'),
(7, '34 Bremworth Avenue'),
(8, 'Lot 8, 18 Rothwell Street'),
(9, '4/3 Inverness Avenue'),
(10, '35a Southsea Crescent'),
(11, '17 Temuri Place, Glendene'),
(12, '286 Glenvar Rd'),
(13, '9 Barrington Road'),
(14, '119 Park Rd'),
(15, '9/8b Chews Lane'),
(16, '48 Clark Street'),
(17, '34 Sugden Street'),
(18, '2 Romanee Lane'),
(19, '59 Charwell Lane');

-- --------------------------------------------------------

--
-- Table structure for table `propertysuburb_tb`
--

CREATE TABLE `propertysuburb_tb` (
  `PropertySuburb_id` int(11) NOT NULL,
  `PropertySuburb` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertysuburb_tb`
--

INSERT INTO `propertysuburb_tb` (`PropertySuburb_id`, `PropertySuburb`) VALUES
(1, 'Taupiri'),
(2, 'Silverdale'),
(3, 'Glenview'),
(4, 'Harrowfield'),
(5, 'Nawton'),
(6, 'Hamilton Central'),
(7, 'Hamilton East'),
(8, 'Dinsdale'),
(9, 'Glendene, Waitakere City'),
(10, 'Torbay'),
(11, 'Grey Lynn'),
(12, 'Miramar'),
(13, 'Wellington Central'),
(14, 'Khandallah'),
(15, 'Spreydon'),
(16, 'Halswell'),
(17, 'Prebbleton');

-- --------------------------------------------------------

--
-- Table structure for table `property_tb`
--

CREATE TABLE `property_tb` (
  `Property_id` int(11) NOT NULL,
  `Agent_id` int(11) DEFAULT NULL,
  `PropertyName` varchar(50) NOT NULL,
  `PropertyDescription` varchar(2000) NOT NULL,
  `Brief` varchar(255) NOT NULL,
  `bedRoom` int(1) NOT NULL,
  `Garage` int(1) NOT NULL,
  `livingRoom` int(1) NOT NULL,
  `bathRoom` int(1) NOT NULL,
  `Size` int(1) NOT NULL,
  `Property_image` varchar(255) NOT NULL,
  `PropertyStreet_id` int(11) DEFAULT NULL,
  `PropertySuburb_id` int(11) DEFAULT NULL,
  `PropertyCity_id` int(11) DEFAULT NULL,
  `PropertyPost_id` int(11) DEFAULT NULL,
  `Admin_id` int(11) DEFAULT NULL,
  `Office_id` int(11) DEFAULT NULL,
  `PropertyRecord_id` int(11) DEFAULT NULL,
  `PriceType_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_tb`
--

INSERT INTO `property_tb` (`Property_id`, `Agent_id`, `PropertyName`, `PropertyDescription`, `Brief`, `bedRoom`, `Garage`, `livingRoom`, `bathRoom`, `Size`, `Property_image`, `PropertyStreet_id`, `PropertySuburb_id`, `PropertyCity_id`, `PropertyPost_id`, `Admin_id`, `Office_id`, `PropertyRecord_id`, `PriceType_id`) VALUES
(1, 1, 'EXTENDED FAMILY OPTIONS OR SUPER SMART INVESTMENT', 'This is a location to get excited about and an opportunity too good to miss. A classic 1950s brick home a short walk from Dio School and the Waikato River, featuring an adjoining self contained unit, ideal for a family member or additional income to help with the mortgage.\r\nThe house and unit are both insulated to current standards and each features a heat pump. The main house is very comfortable with three good sized bedrooms, while the unit has a very sunny back terrace.\r\nThe large 805:sqm section has a wide frontage and ample parking plus a double car port and single garage. Both properties currently have very good tenants and the joint return is $645 per week. The rent increases to $670 per week in early October. This really is real estate gold so call Phil on 021 108 6529 and lets make it yours.', 'This is a location to get excited about and an opportunity too good to miss. A classic 1950s brick home a short walk from Dio School and the Waikato River, featuring an adjoining self contained unit, ideal for a family member or additional income.......', 3, 2, 1, 1, 428, 'img/property/EXTENDED-FAMILY-OPTIONS-OR-SUPER-SMART-INVESTMENT.jpg', 1, 1, 1, 1, 1, 1, 1, 5),
(2, 2, 'MAKE THE CITY YOUR PLAYGROUND', 'For those craving an urban, inner city existence this apartment ticks all the boxes. Nestled in the heart of Victoria Street just moments from the best bars, eateries and entertainment that Hamilton has to offer is this fabulous two bedroom home. \r\nThe entire apartment has neutral decor meaning you can add your own flair with ease. The open plan kitchen and living area opens out to the spacious balcony which has sweeping views over the CBD towards the river. On the upper level, the two bedrooms are both generous, with the master having its own walk through wardrobe. \r\nAn additional room creates space for a second living option or workspace for the home-based earner or creative soul. \r\nWith a secure car space, separate laundry and the cosy convenience of a heatpump, the space is the ideal lock up and leave. The entire building has been recently refurbished and has a chic new look. Step out your front door and stroll into this vibrant, bustling city to your hearts content! Call James on 0273139170 to view.', 'For those craving an urban, inner city existence this apartment ticks all the boxes. Nestled in the heart of Victoria Street just moments from the best bars, eateries and entertainment that Hamilton has to offer is this fabulous two bedroom home..........', 2, 2, 1, 1, 98, 'img/property/MAKE-THE-CITY-YOUR-PLAYGROUND.jpg', 2, 6, 1, 2, 2, 2, 2, 1),
(3, 3, 'A BRICK BEAUTY', 'This very tidy property has been well loved and maintained and in the same ownership since new. The home offers three double bedrooms, a large lounge with gas heating plus an open plan kitchen/dining that flows through to an all-weather conservatory. \r\nWhat a great sunny spot to use as a second living while overlooking the large rear section- plenty of space for the boat, caravan and more. \r\nPlus, theres single garaging with auto door- however if you want to leave the car at home its only a short walk to the local Silverdale Shopping Centre. \r\nIn zone for a range of sought-after schooling including Berkley Normal & Hillcrest High School and minutes to the Waikato University. \r\nThis is a great opportunity to step into the property market in this well-kept home. Simply move in, unpack and enjoy.', 'This very tidy property has been well loved and maintained and in the same ownership since new. The home offers three double bedrooms, a large lounge with gas heating plus an open plan kitchen/dining that flows through to an all-weather..........', 3, 1, 1, 1, 835, 'img/property/HARROWFIELD-ELEVATION-&-VIEWS.jpg', 3, 2, 1, 3, 3, 3, 3, 5),
(4, 4, 'DIXON HEIGHTS FITZROY - DON\'T MISS THIS BEAUTY!', 'Enjoy this elevated two level home. Whether the expansive view of the strategically located family room or the upstairs lounge - this home should not be missed!\r\nThis architecturally designed home, with its gourmet kitchen complimented with a spacious walk-in pantry and family room flowing out on to the sun drenched deck. \r\nThe master bedroom on the ground floor enjoys the access to the deck and the uninterrupted views. On the second level is three bedrooms, master bathroom and upstairs lounge. \r\nThis outstanding home with views to burn is awaiting its new family- call now don\'t miss out.', 'Enjoy this elevated two level home. Whether the expansive view of the strategically located family room or the upstairs lounge - this home should not be missed! This architecturally designed home.........', 4, 2, 2, 2, 437, 'img/property/DIXON-HEIGHTS-FITZROY-DON\'T-MISS-THIS-BEAUTY!.jpg', 4, 3, 1, 4, 4, 2, 4, 3),
(5, 5, 'HARROWFIELD ELEVATION & VIEWS', 'Just move in and enjoy this prime position in Harrowfield. Privately situated at the end of The Avenue with expansive views across the Waikato River to St Andrews and beyond. \r\nThis impressive single level 240m2 home has been designed to maximise privacy, space and views. Emphasis too on light and sunny living rooms adds to the very special feel of this Harrowfield home. Extensive paved off street parking is an excellent feature of the 840m2 site. The vendors currently park a large 9m camper vehicle with ease onsite without interruption to their views. \r\nNumerous other features apply to this beautiful home. Contact the property agent Mike Thomas now to view for yourself on 0274975933', 'Just move in and enjoy this prime position in Harrowfield. Privately situated at the end of The Avenue with expansive views across the Waikato River to St Andrews and beyond. \r\nThis impressive single level 240m2 home has been designed to maximise........', 3, 2, 2, 2, 241, 'img/property/HARROWFIELD-ELEVATION-&-VIEWS.jpg', 5, 4, 1, 5, 5, 1, 5, 1),
(6, 6, 'We Are B, But Road Fronted', 'A great opportunity here to purchase this freestanding two-bedroom home. This home could suit a range of buyers - an investor, a first home or sizing down. The home is insulated, heating is by heat pump in the large lounge/dining area. Separate bathroom, shower over bath, separate toilet and laundry. \r\nA short walk to local shops and bus stops. Situated in a cul-de-sac off Avalon Drive. Close to the Northern Motorway links, The Base Shopping Centre and business districts. Garaging is a standalone single garage and shed built by Skyline Garages. Currently rented at $310 per week with a property manager.\r\nOpen Homes will be only on a Saturday 12-1 or strictly by appointment.\r\nCall John today for more information.', 'A great opportunity here to purchase this freestanding two-bedroom home. This home could suit a range of buyers - an investor, a first home or sizing down. The home is insulated, heating is by heat pump in the large lounge/dining area..........', 2, 1, 1, 1, 73, 'img/property/We-Are-B,-But-Road-Fronted.jpg', 6, 5, 1, 6, 3, 2, 6, 1),
(7, 7, 'SUNNY WITH SPACE TO GROW', 'This sweet home has so much to offer that you will have to view it to understand the potential. This two bedroom home is tidy and low maintenance, brick with aluminium joinery and a concrete tile roof. \r\nIt is situated on a large section that has untapped potential as well as having a wonderful aspect looking out to Bremworth Park. \r\nIdeal at this price for first home buyers or investors, a great option for those down sizing or those that want some garden but also want the convenience of lock up and leave. Vendors say sell, phone Hamish to view today on 021 993250.', 'This sweet home has so much to offer that you will have to view it to understand the potential. This two bedroom home is tidy and low maintenance, brick with aluminium joinery and a concrete tile roof. \r\nIt is situated on a large section that has......', 2, 1, 1, 1, 100, 'img/property/SUNNY-WITH-SPACE-TO-GROW.jpg', 7, 8, 1, 2, 1, 2, 7, 3),
(8, 8, 'FIRST HOME BUYERS THIS IS FOR YOU!', 'Only 5% deposit required, be quick! Don\'t wait for this opportunity to go!!! You could be on the property ladder in no time, who doesn\'t want to own a home that is stylish, interior designed and constructed to a high quality by a certified kiwi builder?\r\nRothwell Rise is being offered exclusively to first home buyers, these brand new two-bedroom homes have been designed with the needs of young trendy professionals in mind. Thoughtfully designed with an open plan kitchen, dining and living to create the heart of the home, the living area with the benefit of a ranch slider door located at the rear of the home which will be a delight to unwind from the working day in the afternoon sun. Single car garaging coming complete with a separate laundry nook, this is the perfect package for any first home buyer.\r\nYour brand new home will be super appealing with a stylish colour palate that has been carefully selected by an interior designer. Adding to the homes appeal is the convenient location, within five minutes of the CBD and a short walk to the Dinsdale Shopping Centre.\r\nBy using your Kiwisaver and \'First Home Grant\' you could potentially secure your own home with a deposit of just 5%, it maybe easier than you realise, check with your Bank, Mortgage Broker or Financial Institution to see if you meet the criteria. Talk to us today to discuss how we can help you get on the property ladder. Please copy and paste the link to discover more www.rothwellrise.co.nz', 'Only 5% deposit required, be quick!\r\nDon\'t wait for this opportunity to go!!! You could be on the property ladder in no time, who doesn\'t want to own a home that is stylish, interior designed and constructed to a high quality by a certified............', 2, 1, 1, 1, 75, 'img/property/FIRST-HOME-BUYERS-THIS-IS-FOR-YOU!.jpg', 8, 8, 1, 2, 6, 2, 8, 5),
(9, 9, 'INVEST IN INVERNESS', 'This is an exceptional opportunity to secure a super spacious one bedroom townhouse in a fabulous Waikato University location. Upstairs and incredibly private, it is a great entry into the booming Hamilton property market where there is an accommodation shortage and rental properties are under such pressure. \r\nOpen plan living gives it a great feeling of space and it opens seamlessly onto a large balcony providing extra space for tenants. Off street parking and a shed are an added bonus. \r\nThe existing tenants are keen to stay so that makes purchasing this property easy. Close to all levels of schooling and walking distance to the University. This will create good interest so early inspection is recommended - No open homes will be run on this property so give Sue 021745365 or Donna 021764405 a call to view.', 'This is an exceptional opportunity to secure a super spacious one bedroom townhouse in a fabulous Waikato University location. Upstairs and incredibly private, it is a great entry into the booming Hamilton property market where there is an..............', 2, 0, 1, 1, 60, 'img/property/INVEST-IN-INVERNESS.jpg', 9, 7, 1, 3, 2, 3, 9, 5),
(10, 10, 'WAIKATO UNIVERSITY INVESTMENT', 'This property is a little cracker! Set back from the road down a right of way drive, it is one of two. Offering three bedrooms plus an outside room ensuring there is loads of space and it will attract good tenant demand. \r\nThe open plan living is also complemented with a conservatory that leads outside to a small fenced section. Properties like this are in huge demand and being located in a prime position close to all levels of schooling, the Waikato University, Innovation Park and the future Inland Port gives you the confidence of securing a property that will offer a high occupancy rate and return. Currently tenanted allowing for an easy buy with a return from day one! Pick up the phone, book a viewing time and make this property yours.', 'This property is a little cracker! Set back from the road down a right of way drive, it is one of two. Offering three bedrooms plus an outside room ensuring there is loads of space and it will attract good tenant demand. This property is a little........', 3, 1, 1, 1, 93, 'img/property/WAIKATO-UNIVERSITY-INVESTMENT.jpg', 10, 2, 1, 3, 5, 3, 10, 3),
(11, 11, 'Its Perfect', 'Elevated and proudly overlooking the neighbourhood, this beautifully renovated three-bedroom family home is definitely the one you\'ve been looking for! Tucked off the main road in a quiet cul-de-sac, our owners have outdone themselves here, turning a once tired but well-loved 1970\'s home into a bright, light-filled modern masterpiece with fabulous open plan living, dining and stunning kitchen that will inspire even the most reluctant cook to spend time whipping up gourmet meals. Three spacious bedrooms, a huge sleek bathroom and separate laundry complete the main floorplan whilst the garage and workshop below provide extra storage or the perfect place to tinker with your tools. The choice of two entertaining decks and rear garden which is neither too big or too small offers perfect spaces for all ages.', 'Elevated and proudly overlooking the neighbourhood, this beautifully renovated three-bedroom family home is definitely the one you\'ve been looking for! Tucked off the main road in a quiet cul-de-sac...', 1, 3, 1, 1, 744, 'img/property/WAIKATO-UNIVERSITY-INVESTMENT.jpg', 11, 9, 2, 11, 1, 4, 11, 4),
(12, 12, 'Neat as a pin, just move in!', 'This property is a rare little gem that is nestled away in an incredibly private and peaceful setting. It\'s super clean and tidy inside and out. It\'s such a delight to see a home that has been built correctly and maintained so beautifully. The garden and grounds offer a quiet sanctuary, with abundant native bird song.', 'This property is a rare little gem that is nestled away in an incredibly private and peaceful setting. It\'s super clean and tidy inside and out. It\'s such a delight to see a home that has been built correctly and maintained so beautifully... ', 2, 3, 1, 2, 810, 'img/property/DIXON-HEIGHTS-FITZROY-DON\'T-MISS-THIS-BEAUTY!.jpg', 12, 10, 2, 12, 1, 4, 12, 5),
(13, 13, 'Carpe Diem', 'Seize the day because the opportunity to enter the Grey Lynn property market owning a cute 1930s bungalow on a freehold 445m2 section at such an affordable price point may never present itself again. Street appeal is next level with a charming courtyard setting positioned perfectly to catch the north facing sun. Be it morning coffee or afternoon spritz, this is a lovely spot to catch up with neighbours and soak in the serenity that this family friendly cul-de-sac offers.', 'Seize the day because the opportunity to enter the Grey Lynn property market owning a cute 1930s bungalow on a freehold 445m2 section at such... ', 1, 3, 1, 1, 445, 'img/property/EXTENDED-FAMILY-OPTIONS-OR-SUPER-SMART-INVESTMENT.jpg', 13, 11, 2, 13, 2, 4, 13, 1),
(14, 14, 'The Gathering Place', ' Your family will thank you for this spacious character home, on the flat, in sunny, popular Miramar. With four generous double bedrooms there\'s room for all to spread out, with an adjoining separate dining room and large living room that faces west over the garden. While the kitchen has been modernised, with plenty of storage and the laundry neatly tucked away, the bathroom (and a second w/c) would respond to refurbishment giving plenty of scope for adding your stamp to this well-loved home.', 'Your family will thank you for this spacious character home, on the flat, in sunny, popular Miramar... ', 1, 4, 1, 2, 280, 'img/property/WAIKATO-UNIVERSITY-INVESTMENT.jpg', 14, 12, 3, 14, 4, 5, 14, 2),
(15, 15, 'This Is It - You Have Found It', ' One of the most exclusive buildings in Wellington has a 78 sqm apartment for sale. Designed by Athfield Architects, this two-bedroom apartment is sun-drenched, north to northwest facing, with a generous walk-in wardrobe. A carpark with a storage unit comes with this gem. The building is packed with features. There is a building manager, common facilities include a gym, communal terraces, and a theatrette. The building has an earthquake rating greatly exceeding the current code. Located in the CBD, close to supermarkets, and all that Wellington City has to offer. Convenient open homes for you to view. LIM is available.', 'One of the most exclusive buildings in Wellington has a 78 sqm apartment for sale. Designed by Athfield... ', 1, 2, 1, 1, 78, 'img/property/WAIKATO-UNIVERSITY-INVESTMENT.jpg', 15, 13, 3, 15, 5, 5, 15, 4),
(16, 16, 'An Exceptional Opportunity...', ' To purchase one of Khandallah\'s gracious residences. For the past 20 years my owners have treasured living in this private leafy location. Their elegant residence sits strategically to catch the sun from dawn to dusk, offering a rich combination of classic character, immaculately conserved and framed by 1442sqm of artistically landscaped grounds. The structured garden is a well-balanced combination of formal and informal areas with established trees, a camellia walk, espaliered fruit trees, herbaceous borders, citrus, vegetable garden, lawn, glasshouse and orchid house.', 'To purchase one of Khandallah\'s gracious residences. For the past 20 years my owners have treasured living in this private leafy location... ', 1, 4, 2, 2, 295, 'img/property/MAKE-THE-CITY-YOUR-PLAYGROUND.jpg', 16, 14, 3, 15, 6, 5, 16, 4),
(17, 17, 'Selling Selling... SOLD!', ' Take your first foray into the housing market or snap up a rental with this newly redecorated beauty in a superb family-friendly neighbourhood. Set on a good-sized family section, this three-bedroom home has a lot to offer, plus there\'s plenty of potential to enhance and add value. Beautifully presented with fresh paint and new carpet throughout, the home is ready for your final touches. The lovely living, dining and kitchen area catches the sun and opens out to a fantastic timber deck. A direct view from the kitchen to the lawn makes keeping an eye on the kids nice and easy. ', 'Take your first foray into the housing market or snap up a rental with this newly redecorated beauty in a superb...', 1, 3, 2, 2, 51, 'img/property/MAKE-THE-CITY-YOUR-PLAYGROUND.jpg', 17, 15, 4, 15, 4, 6, 17, 1),
(18, 18, 'Brand New, Just for You!', ' This property was built with no stone unturned feel the quality and comfort the minute you walk in! Please be aware that this information has been supplied by the vendor and/or sourced from: Property Guru, Property Smarts, Land Information NZ, Local Councils, ECAN, CERA and other organisations. Four Seasons Realty 2017 Ltd is merely passing over this information as supplied to us. We cannot guarantee its accuracy or reliability.', 'This property was built with no stone unturned feel the quality and comfort the minute you walk in... ', 1, 4, 2, 2, 239, 'img/property/SUNNY-WITH-SPACE-TO-GROW.jpg', 18, 16, 4, 15, 1, 6, 18, 5),
(19, 19, 'An exquisite lifestyle', ' Prepare to be enchanted by this unique property, privately positioned on the edge of Prebbleton this 4.16 hectare (approximately) estate offers you all the amenities you\'ll ever need within an easy commute to the city. Sprawled over approximately 295sqm (approximately), the home unfolds into spacious living areas featuring over-height ceilings and beautiful exposed engineered oak beams which all add to the feeling of space. You will adore the bespoke kitchen where everything has been thoughtfully considered - from the serving window, to the oak shelving, to the quality appliances, right through to the galley style walk-in pantry. The living areas flow effortlessly out to multiple outdoor living spaces overlooking the lush lawns and mature garden.', 'Prepare to be enchanted by this unique property, privately positioned on the edge of Prebbleton this 4.16 hectare (approximately) estate offers...', 1, 2, 3, 2, 295, 'img/property/WAIKATO-UNIVERSITY-INVESTMENT.jpg', 19, 17, 4, 15, 3, 6, 19, 5),
(24, 14, 'fdsdfgsdfgsdfgsdfgsdfgsdfgsdf', 'fdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsd', 'fdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgsdfgsdfgsdfgsdffdsdfgsdfgsdfgs........', 1, 2, 3, 4, 55, '', 1, 1, 1, 1, 1, 1, 27, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `User_id` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `UserPassword` varchar(32) NOT NULL,
  `UserEmail` varchar(255) NOT NULL,
  `UserAvatar` varchar(255) NOT NULL,
  `IsUser_loggedIn` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`User_id`, `UserName`, `UserPassword`, `UserEmail`, `UserAvatar`, `IsUser_loggedIn`) VALUES
(1, 'James Walsh', '0655a4ccece5bddebfba26ac3e184478', 'james@gmail.com', 'img/avatar/default-avatar2.png', 'TRUE'),
(2, 'Mike Thomas', '0f4225caf9a560c646d54d2bb817360e', 'mike@gmail.com', 'img/avatar/default-avatar2.png', 'FALSE'),
(3, 'Bev Missen', '629c2bd16cb171a33d08538a8ee36fb0', 'Bev@gmail.com', 'img/avatar/default-avatar2.png', 'FALSE'),
(4, 'Hunter Walsh', '3d52c00bed0acdc920ea1992423fb18d', 'hunter@gmail.com', 'img/avatar/default-avatar2.png', 'FALSE'),
(5, 'Brian Alcock', 'e84db003a0dbdee4e4387f69e3bbb672', 'Brian@gmail.com', 'img/avatar/default-avatar2.png', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_tb`
--

CREATE TABLE `wishlist_tb` (
  `Wishlist_id` int(11) NOT NULL,
  `Property_id` int(11) DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `agent_tb`
--
ALTER TABLE `agent_tb`
  ADD PRIMARY KEY (`Agent_id`);

--
-- Indexes for table `officecity_tb`
--
ALTER TABLE `officecity_tb`
  ADD PRIMARY KEY (`OfficeCity_id`);

--
-- Indexes for table `officepost_tb`
--
ALTER TABLE `officepost_tb`
  ADD PRIMARY KEY (`OfficePost_id`);

--
-- Indexes for table `officestreet_tb`
--
ALTER TABLE `officestreet_tb`
  ADD PRIMARY KEY (`OfficeStreet_id`);

--
-- Indexes for table `officesuburb_tb`
--
ALTER TABLE `officesuburb_tb`
  ADD PRIMARY KEY (`OfficeSuburb_id`);

--
-- Indexes for table `office_tb`
--
ALTER TABLE `office_tb`
  ADD PRIMARY KEY (`Office_id`),
  ADD KEY `OfficeStreet_id` (`OfficeStreet_id`),
  ADD KEY `OfficeSuburb_id` (`OfficeSuburb_id`),
  ADD KEY `OfficeCity_id` (`OfficeCity_id`),
  ADD KEY `OfficePost_id` (`OfficePost_id`);

--
-- Indexes for table `pricetype_tb`
--
ALTER TABLE `pricetype_tb`
  ADD PRIMARY KEY (`PriceType_id`);

--
-- Indexes for table `propertycity_tb`
--
ALTER TABLE `propertycity_tb`
  ADD PRIMARY KEY (`PropertyCity_id`);

--
-- Indexes for table `propertypost_tb`
--
ALTER TABLE `propertypost_tb`
  ADD PRIMARY KEY (`PropertyPost_id`);

--
-- Indexes for table `propertyrecord_tb`
--
ALTER TABLE `propertyrecord_tb`
  ADD PRIMARY KEY (`PropertyRecord_id`);

--
-- Indexes for table `propertystreet_tb`
--
ALTER TABLE `propertystreet_tb`
  ADD PRIMARY KEY (`PropertyStreet_id`);

--
-- Indexes for table `propertysuburb_tb`
--
ALTER TABLE `propertysuburb_tb`
  ADD PRIMARY KEY (`PropertySuburb_id`);

--
-- Indexes for table `property_tb`
--
ALTER TABLE `property_tb`
  ADD PRIMARY KEY (`Property_id`),
  ADD KEY `PropertyStreet_id` (`PropertyStreet_id`),
  ADD KEY `PropertySuburb_id` (`PropertySuburb_id`),
  ADD KEY `PropertyCity_id` (`PropertyCity_id`),
  ADD KEY `PropertyPost_id` (`PropertyPost_id`),
  ADD KEY `Admin_id` (`Admin_id`),
  ADD KEY `Office_id` (`Office_id`),
  ADD KEY `PropertyRecord_id` (`PropertyRecord_id`),
  ADD KEY `Agent_id` (`Agent_id`),
  ADD KEY `PriceType_id` (`PriceType_id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `wishlist_tb`
--
ALTER TABLE `wishlist_tb`
  ADD PRIMARY KEY (`Wishlist_id`),
  ADD KEY `Property_id` (`Property_id`),
  ADD KEY `User_id` (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `agent_tb`
--
ALTER TABLE `agent_tb`
  MODIFY `Agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `officecity_tb`
--
ALTER TABLE `officecity_tb`
  MODIFY `OfficeCity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `officepost_tb`
--
ALTER TABLE `officepost_tb`
  MODIFY `OfficePost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `officestreet_tb`
--
ALTER TABLE `officestreet_tb`
  MODIFY `OfficeStreet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `officesuburb_tb`
--
ALTER TABLE `officesuburb_tb`
  MODIFY `OfficeSuburb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `office_tb`
--
ALTER TABLE `office_tb`
  MODIFY `Office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pricetype_tb`
--
ALTER TABLE `pricetype_tb`
  MODIFY `PriceType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `propertycity_tb`
--
ALTER TABLE `propertycity_tb`
  MODIFY `PropertyCity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `propertypost_tb`
--
ALTER TABLE `propertypost_tb`
  MODIFY `PropertyPost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `propertyrecord_tb`
--
ALTER TABLE `propertyrecord_tb`
  MODIFY `PropertyRecord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `propertystreet_tb`
--
ALTER TABLE `propertystreet_tb`
  MODIFY `PropertyStreet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `propertysuburb_tb`
--
ALTER TABLE `propertysuburb_tb`
  MODIFY `PropertySuburb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_tb`
--
ALTER TABLE `property_tb`
  MODIFY `Property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist_tb`
--
ALTER TABLE `wishlist_tb`
  MODIFY `Wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `office_tb`
--
ALTER TABLE `office_tb`
  ADD CONSTRAINT `OfficeCity_id` FOREIGN KEY (`OfficeCity_id`) REFERENCES `officecity_tb` (`OfficeCity_id`),
  ADD CONSTRAINT `OfficePost_id` FOREIGN KEY (`OfficePost_id`) REFERENCES `officepost_tb` (`OfficePost_id`),
  ADD CONSTRAINT `OfficeStreet_id` FOREIGN KEY (`OfficeStreet_id`) REFERENCES `officestreet_tb` (`OfficeStreet_id`),
  ADD CONSTRAINT `OfficeSuburb_id` FOREIGN KEY (`OfficeSuburb_id`) REFERENCES `officesuburb_tb` (`OfficeSuburb_id`);

--
-- Constraints for table `property_tb`
--
ALTER TABLE `property_tb`
  ADD CONSTRAINT `Admin_id` FOREIGN KEY (`Admin_id`) REFERENCES `admin_tb` (`Admin_id`),
  ADD CONSTRAINT `Agent_id` FOREIGN KEY (`Agent_id`) REFERENCES `agent_tb` (`Agent_id`),
  ADD CONSTRAINT `Office_id` FOREIGN KEY (`Office_id`) REFERENCES `office_tb` (`Office_id`),
  ADD CONSTRAINT `PriceType_id` FOREIGN KEY (`PriceType_id`) REFERENCES `pricetype_tb` (`PriceType_id`),
  ADD CONSTRAINT `PropertyCity_id` FOREIGN KEY (`PropertyCity_id`) REFERENCES `propertycity_tb` (`PropertyCity_id`),
  ADD CONSTRAINT `PropertyPost_id` FOREIGN KEY (`PropertyPost_id`) REFERENCES `propertypost_tb` (`PropertyPost_id`),
  ADD CONSTRAINT `PropertyRecord_id` FOREIGN KEY (`PropertyRecord_id`) REFERENCES `propertyrecord_tb` (`PropertyRecord_id`),
  ADD CONSTRAINT `PropertyStreet_id` FOREIGN KEY (`PropertyStreet_id`) REFERENCES `propertystreet_tb` (`PropertyStreet_id`),
  ADD CONSTRAINT `PropertySuburb_id` FOREIGN KEY (`PropertySuburb_id`) REFERENCES `propertysuburb_tb` (`PropertySuburb_id`);

--
-- Constraints for table `wishlist_tb`
--
ALTER TABLE `wishlist_tb`
  ADD CONSTRAINT `Property_id` FOREIGN KEY (`Property_id`) REFERENCES `property_tb` (`Property_id`),
  ADD CONSTRAINT `User_id` FOREIGN KEY (`User_id`) REFERENCES `user_tb` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
