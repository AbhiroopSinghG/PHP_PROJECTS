-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 03:09 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `email` varchar(45) NOT NULL,
  `code` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`email`, `code`) VALUES
('abhi.gondara@gmail.com', 1296316001),
('abhi.gondara@gmail.com', 2147483647),
('abhi.gondara@gmail.com', 2147483647),
('abhi.gondara@gmail.com', 2147483647),
('abhi.gondara@gmail.com', 7560550080),
('abhi.gondara@gmail.com', 1665366005),
('abhi.gondara@gmail.com', 8275822823),
('abhi.gondara@gmail.com', 8584292945),
('abhi.gondara@gmail.com', 5940763328),
('abhi.gondara@gmail.com', 5333143744),
('abhi.gondara@gmail.com', 3523513058);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `province` varchar(25) NOT NULL,
  `reason` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `fname`, `lname`, `email`, `contact_no`, `province`, `reason`) VALUES
(4, 'Minal', 'PATEL', 'minal26patel@gmail.com', 2147483647, 'Ontario', 'Someone else is using my account credentials'),
(5, 'Rajal', 'Patel', 'rajal@gmail.com', 647897892, 'Ontario', 'Didnt get my receipt'),
(6, 'rajal', 'patel', 'rajal@gmail.com', 647789754, 'Ontario', 'Didnt get my receipt'),
(7, 'MINAL', 'PATEL', 'ptlminal9800@gmail.com', 2147483647, 'ON', 'Hello World'),
(8, 'MINAL', 'PATEL', 'ptlminal9800@gmail.com', 2147483647, 'ON', 'Didnt get my data'),
(9, 'Minal', 'Patel', 'minal26patel@gmail.com', 2147483647, 'ON', 'no problem');

-- --------------------------------------------------------

--
-- Table structure for table `create_event`
--

CREATE TABLE `create_event` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `type` varchar(45) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `organiser_name` varchar(25) NOT NULL,
  `location` varchar(100) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_time` varchar(50) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_event`
--

INSERT INTO `create_event` (`id`, `user_id`, `event_title`, `type`, `description`, `event_type`, `keywords`, `organiser_name`, `location`, `event_date`, `event_time`, `published`) VALUES
(2, 1, 'In Flames', '', 'In Flames are a Swedish heavy metal band, which was formed by guitarist Jesper Strömblad in 1990 in Gothenburg, Sweden. At the Gates, Dark Tranquillity, Soilwork and In Flames are the only remaining bands responsible for developing the genres known as Swedish death metal and melodic death metal.', 'Concert', 'images/BandaMS_EventImage.png', 'Phoenix Concert Theatre', 'Toronto', '2019-11-27 00:00:00', '10.30 Pm', 1),
(3, 1, 'Toronto Vegan Christmas Market', '', 'Includes\r\n\r\n- Antipasto Bar With Pasta Station\r\n\r\n- Main Course\r\n\r\n- Desert\r\n\r\n- Open Bar\r\n\r\n- Pizza Station\r\n\r\nEntertainment during Antipasto Bar & Dinner by\r\n\r\nBruno Monardo\r\n\r\nFrankie Cimino\r\n\r\nClaudio Santaluce\r\n\r\nCarlo Copoola', 'Market', 'images/Food.jpg', 'Toronto Events', '8 Adelaide St E, Toronto,', '2019-11-02 00:00:00', '7.30pm', 1),
(4, 3, 'Cannibal Corpse', '', 'KRAMPUS is coming to TORONTO once again!\r\n\r\nHalloween will live on thru the Christmas season with this 8th ANNUAL costume party bringing all the Alternative night life of the season together.\r\n\r\nGroup deal for 3 or more purchased at once!\r\n\r\nScavenger Hunts around Toronto for FREE TIX!\r\n\r\n?KRAMPUS KAVE PHOTO BOOTH\r\n\r\n?Original KRAMPUS ART SALE courtesy of @zirco.fish\r\n\r\n?COSTUME CONTEST post party online vote!!\r\n\r\n...\r\n\r\n? Costumes are encouraged, not mandatory.\r\n\r\nGhosts, goblins, halloween costumes, club kids, candy ravers, dinner party wear, street urchins, zebra onzies, hello kitty pyjamas, bring it!', 'Halloween', 'images/CannibalCorpse.jpg', 'Krampus', 'The Opera House', '2019-11-15 00:00:00', '11.00pm', 1),
(5, 2, 'Intel Experience Day', '', 'Intel® presents Gamer\'s Night at Intel Experience Day. Demo custom gaming rigs, next-gen systems, and sign up to play the pros.\r\n\r\nThink you got what it takes? Test your Call of Duty skills against CODxTO players in a Joes vs Pros gaming battle. Any Joe that beats a CODxTO Pro will walk away with signed merch from their competitor! Guests will also have the chance to win exciting giveaways in a lucky draw:\r\n\r\n- Arozzi Gaming Chair\r\n\r\n- Acer Gaming Laptops\r\n\r\n- MSI Headsets\r\n\r\nGet a first chance look at the Intel i9 9900KS Processor.\r\n\r\nRegister now for a night of gaming, giveaways and share tips and tricks with other gamers.', 'Intel Day', 'images/Home%20Display.jpg', 'Intel', 'The Westin Harbour Castle', '2019-10-30 00:00:00', '6.00pm', 1),
(6, 5, '4th Annual CGLCC Black & White Goa', '', 'Your mission, should you choose to accept, involves attending the 4th Annual\r\nCGLCC Black + White Gala on Friday, Nov 8th, 2019.\r\nJourney into an evening of intrigue where mystery and action awaits,\r\nsupporting CGLCC’s ongoing MISSION to connect, support and grow\r\nCanada’s UNSTOPPABLE LGBT+ business community.', 'Awards Ceremony', 'images/Networking%20Event%20(md-duran-unsplash).jpg', 'CGLCC', 'The Carlu, Toronto', '2019-11-08 00:00:00', '1.00Pm', 1),
(7, 3, 'Tech Talent Toronto', '', 'We nuture confidence and creativty in all of our programs:\r\nSilly Skits and Singalongs\r\nPJ DAY and Crazy Fairy Tales\r\nArt with Heart\r\nDancemania\r\nKaraoke\r\nTickle Trunk Dressup\r\nSuperhero Power\r\nAND MORE!\r\n\r\nOur leaders have VSS clearance and First Aid Certification. The safety and enjoyment of each child is our main priority. Our staff:camper ratio ensures excellent supervision and care.\r\nProceeds from our camps support our monthly programs at Sick Kids Hospital and Ronald McDonald House.', 'Tech Talent', 'images/seminar%20event%20(MD%20Duran%20Unspalsh.com).jpg', 'Free Software Foundation', 'Steam Whistle Brewing,London ON', '2019-11-05 00:00:00', '10.00Am', 1),
(8, 1, 'Trade Show Event', '', 'Hosted by the Ontario Craft Wineries, the Ontario Craft Wine Conference & Trade Show is the third annual one-day industry event featuring presentations from wine professionals and experts. To learn more, visit www.ontariocraftwineconference.ca.\r\n\r\n•Breakout sessions: keynotes, educational sessions, breakouts and training in sales/marketing, technical, regulatory, business, operations, finance and more.\r\n\r\n•A 9,000 square foot trade show featuring 60+ industry suppliers in 8’x 8’ spaces to display products, equipment and services available to the craft beverage alcohol sector.\r\n\r\n•Business, government and stakeholder networking opportunities.\r\n\r\n•Social activities, continental breakfast, lunch, snacks and Ontario VQA wine.', 'Trading Show', 'images/Trade%20show%20Event%20(product-school-unsplash).jpg', 'United Way Worldwide', 'Hilton Toronto', '2020-01-25 00:00:00', '4.00pm', 1),
(9, 5, 'Women In Innovation Conference', '', 'We are a community of women who are active innovation practitioners.\r\nWIN is a registered 501(c)(3) non-profit organization that brings together a community of 1,500+ members in New York, San Francisco, and London, representing women (and anyone identifying as a woman) at:', 'Conference', 'images/Conference%20event.jpg', 'World Vision', 'George Vari Computer Center, Toronto', '2019-12-08 00:00:00', '4.00pm', 1),
(10, 2, 'The Nutcracker 2019', '', '**Disco, Classic Rock, Retro 80s & Latin Parties**\r\n\r\nA great new group for those that want to mix, mingle and Rock On with others who also love listening, talking about and dancing to their favorite Retro 50s, 60s, 70s, 80s, 90s, 00s, Classic Rock, Disco, Pop, Latin, New Wave, R & B, Top 40 & Rock n Roll.\r\n\r\nNights will be well organized, with a great sound system, big dance floor, cool people and free of charge!\r\n\r\nYou\'ll be amazed just how much amazing songs there are (See Below)\r\n\r\n*We also can anticipate monthly Costume Parties, and Monthly Name That Tune events!', 'Dance Show', 'images/musical%20events.jpg', 'Philadelphia Art of Dance', 'Centennial Hall,London', '2019-12-19 00:00:00', '8.00pm', 1),
(11, 8, 'TORONTO HALLOWEEN FEST 2019', '', 'Experience a TASTE of Thermomix® at our cooking event showcasing the features and functions of the TM5.', 'Halloween Fest', 'images/zombie-party-dark-halloween-sign-abstract.jpg', 'Experience Thermomix', '1653 Eglinton Ave W, York', '2019-10-31 00:00:00', '10.00pm', 1),
(12, 8, 'Christmas Gleaming Stamp a Stack', '', 'Tons of Cash and Carry. Plus still time to order so it all arrives in time for Christmas! Trust me, I have you covered. What can you do for me? Well tell your friends..and bring one along, most of all grab the tickets you need so I know you are coming and your name will go into the door prize draw. Also, go to the facebook event and click I\'m attending, tag a friend you are bringing and when you both show up, you both will be tickets in the draw.\r\n\r\nDoor prizes will be shown on the facebook event', 'Christmas Pop Shop', 'images/merry_christmas.jpg', 'Non Profit Organisation', '110 Church St, Markham, ON', '2019-12-25 00:00:00', '7.30 Pm', 1),
(13, 6, 'Stars - New Years Eve All Inclusive Toronto', '', 'Celebrate the New Year 2020 with us at El Convento Rico! Dance until 4:00 AM, enjoy the fantastic show and music.\r\nWe\'ll also be hosting our famous New Years show@\r\n\r\nIn 1992 El Convento Rico nightclub opened its doors as a safe haven for the LGBT community, and we have been breaking down barriers ever since. Welcoming people from all walks of life to enjoy our amazing drag shows and unique mix of Latin and Top 40 music, we give customers an experience like no other and make their special events memorable.', 'New Year Party', 'images/NYE-2019-20-Web.jpg', 'Stars', 'Mirage Banquet & Convention Centre Toronto', '2019-12-31 00:00:00', '10.00pm', 1),
(14, 1, 'Conference', 'seminar', '', 'free', '', 'Toronto Police', 'Downtown', '2019-12-18 00:00:00', '05:30', 0),
(15, 1, 'Musical Event', 'Free', 'Hi here we are', 'Appearance or Signing', 'hello world', 'MINAL PATEL', 'Toronto', '2019-12-17 00:00:00', '08:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `organise_name` varchar(25) NOT NULL,
  `location` varchar(100) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `event_title`, `description`, `event_type`, `keywords`, `organise_name`, `location`, `event_date`, `event_time`) VALUES
(2, 1, 'In Flames', 'In Flames are a Swedish heavy metal band, which was formed by guitarist Jesper Strömblad in 1990 in Gothenburg, Sweden. At the Gates, Dark Tranquillity, Soilwork and In Flames are the only remaining bands responsible for developing the genres known as Swedish death metal and melodic death metal.', 'Concert', 'images/BandaMS_EventImage.png', 'Phoenix Concert Theatre', 'Toronto', '2019-11-27 00:00:00', '10.30 Pm'),
(3, 1, 'Toronto Vegan Christmas Market', 'Includes\r\n\r\n- Antipasto Bar With Pasta Station\r\n\r\n- Main Course\r\n\r\n- Desert\r\n\r\n- Open Bar\r\n\r\n- Pizza Station\r\n\r\nEntertainment during Antipasto Bar & Dinner by\r\n\r\nBruno Monardo\r\n\r\nFrankie Cimino\r\n\r\nClaudio Santaluce\r\n\r\nCarlo Copoola', 'Market', 'images/Food.jpg', 'Toronto Events', '8 Adelaide St E, Toronto,', '2019-11-02 00:00:00', '7.30pm'),
(4, 3, 'Cannibal Corpse', 'KRAMPUS is coming to TORONTO once again!\r\n\r\nHalloween will live on thru the Christmas season with this 8th ANNUAL costume party bringing all the Alternative night life of the season together.\r\n\r\nGroup deal for 3 or more purchased at once!\r\n\r\nScavenger Hunts around Toronto for FREE TIX!\r\n\r\n?KRAMPUS KAVE PHOTO BOOTH\r\n\r\n?Original KRAMPUS ART SALE courtesy of @zirco.fish\r\n\r\n?COSTUME CONTEST post party online vote!!\r\n\r\n...\r\n\r\n? Costumes are encouraged, not mandatory.\r\n\r\nGhosts, goblins, halloween costumes, club kids, candy ravers, dinner party wear, street urchins, zebra onzies, hello kitty pyjamas, bring it!', 'Halloween', 'images/CannibalCorpse.jpg', 'Krampus', 'The Opera House', '2019-11-15 00:00:00', '11.00pm'),
(5, 2, 'Intel Experience Day', 'Intel® presents Gamer\'s Night at Intel Experience Day. Demo custom gaming rigs, next-gen systems, and sign up to play the pros.\r\n\r\nThink you got what it takes? Test your Call of Duty skills against CODxTO players in a Joes vs Pros gaming battle. Any Joe that beats a CODxTO Pro will walk away with signed merch from their competitor! Guests will also have the chance to win exciting giveaways in a lucky draw:\r\n\r\n- Arozzi Gaming Chair\r\n\r\n- Acer Gaming Laptops\r\n\r\n- MSI Headsets\r\n\r\nGet a first chance look at the Intel i9 9900KS Processor.\r\n\r\nRegister now for a night of gaming, giveaways and share tips and tricks with other gamers.', 'Intel Day', 'images/Home%20Display.jpg', 'Intel', 'The Westin Harbour Castle', '2019-10-30 00:00:00', '6.00pm'),
(6, 5, '4th Annual CGLCC Black & White Goa', 'Your mission, should you choose to accept, involves attending the 4th Annual\r\nCGLCC Black + White Gala on Friday, Nov 8th, 2019.\r\nJourney into an evening of intrigue where mystery and action awaits,\r\nsupporting CGLCC’s ongoing MISSION to connect, support and grow\r\nCanada’s UNSTOPPABLE LGBT+ business community.', 'Awards Ceremony', 'images/Networking%20Event%20(md-duran-unsplash).jpg', 'CGLCC', 'The Carlu, Toronto', '2019-11-08 00:00:00', '1.00Pm'),
(7, 3, 'Tech Talent Toronto', 'We nuture confidence and creativty in all of our programs:\r\nSilly Skits and Singalongs\r\nPJ DAY and Crazy Fairy Tales\r\nArt with Heart\r\nDancemania\r\nKaraoke\r\nTickle Trunk Dressup\r\nSuperhero Power\r\nAND MORE!\r\n\r\nOur leaders have VSS clearance and First Aid Certification. The safety and enjoyment of each child is our main priority. Our staff:camper ratio ensures excellent supervision and care.\r\nProceeds from our camps support our monthly programs at Sick Kids Hospital and Ronald McDonald House.', 'Tech Talent', 'images/seminar%20event%20(MD%20Duran%20Unspalsh.com).jpg', 'Free Software Foundation', 'Steam Whistle Brewing,London ON', '2019-11-05 00:00:00', '10.00Am'),
(8, 1, 'Trade Show Event', 'Hosted by the Ontario Craft Wineries, the Ontario Craft Wine Conference & Trade Show is the third annual one-day industry event featuring presentations from wine professionals and experts. To learn more, visit www.ontariocraftwineconference.ca.\r\n\r\n•Breakout sessions: keynotes, educational sessions, breakouts and training in sales/marketing, technical, regulatory, business, operations, finance and more.\r\n\r\n•A 9,000 square foot trade show featuring 60+ industry suppliers in 8’x 8’ spaces to display products, equipment and services available to the craft beverage alcohol sector.\r\n\r\n•Business, government and stakeholder networking opportunities.\r\n\r\n•Social activities, continental breakfast, lunch, snacks and Ontario VQA wine.', 'Trading Show', 'images/Trade%20show%20Event%20(product-school-unsplash).jpg', 'United Way Worldwide', 'Hilton Toronto', '2020-01-25 00:00:00', '4.00pm'),
(9, 5, 'Women In Innovation Conference', 'We are a community of women who are active innovation practitioners.\r\nWIN is a registered 501(c)(3) non-profit organization that brings together a community of 1,500+ members in New York, San Francisco, and London, representing women (and anyone identifying as a woman) at:', 'Conference', 'images/Conference%20event.jpg', 'World Vision', 'George Vari Computer Center, Toronto', '2019-12-08 00:00:00', '4.00pm'),
(10, 2, 'The Nutcracker 2019', '**Disco, Classic Rock, Retro 80s & Latin Parties**\r\n\r\nA great new group for those that want to mix, mingle and Rock On with others who also love listening, talking about and dancing to their favorite Retro 50s, 60s, 70s, 80s, 90s, 00s, Classic Rock, Disco, Pop, Latin, New Wave, R & B, Top 40 & Rock n Roll.\r\n\r\nNights will be well organized, with a great sound system, big dance floor, cool people and free of charge!\r\n\r\nYou\'ll be amazed just how much amazing songs there are (See Below)\r\n\r\n*We also can anticipate monthly Costume Parties, and Monthly Name That Tune events!', 'Dance Show', 'images/musical%20events.jpg', 'Philadelphia Art of Dance', 'Centennial Hall,London', '2019-12-19 00:00:00', '8.00pm'),
(11, 8, 'TORONTO HALLOWEEN FEST 2019', 'Experience a TASTE of Thermomix® at our cooking event showcasing the features and functions of the TM5.', 'Halloween Fest', 'images/zombie-party-dark-halloween-sign-abstract.jpg', 'Experience Thermomix', '1653 Eglinton Ave W, York', '2019-10-31 00:00:00', '10.00pm'),
(12, 8, 'Christmas Gleaming Stamp a Stack', 'Tons of Cash and Carry. Plus still time to order so it all arrives in time for Christmas! Trust me, I have you covered. What can you do for me? Well tell your friends..and bring one along, most of all grab the tickets you need so I know you are coming and your name will go into the door prize draw. Also, go to the facebook event and click I\'m attending, tag a friend you are bringing and when you both show up, you both will be tickets in the draw.\r\n\r\nDoor prizes will be shown on the facebook event', 'Christmas Pop Shop', 'images/merry_christmas.jpg', 'Non Profit Organisation', '110 Church St, Markham, ON', '2019-12-25 00:00:00', '7.30 Pm'),
(13, 6, 'Stars - New Years Eve All Inclusive Toronto', 'Celebrate the New Year 2020 with us at El Convento Rico! Dance until 4:00 AM, enjoy the fantastic show and music.\r\nWe\'ll also be hosting our famous New Years show@\r\n\r\nIn 1992 El Convento Rico nightclub opened its doors as a safe haven for the LGBT community, and we have been breaking down barriers ever since. Welcoming people from all walks of life to enjoy our amazing drag shows and unique mix of Latin and Top 40 music, we give customers an experience like no other and make their special events memorable.', 'New Year Party', 'images/NYE-2019-20-Web.jpg', 'Stars', 'Mirage Banquet & Convention Centre Toronto', '2019-12-31 00:00:00', '10.00pm');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `questions` varchar(1000) NOT NULL,
  `answers` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `questions`, `answers`) VALUES
(1, '<div class=\"panel-heading p-3 mb-3\" role=\"tab\" id=\"heading0\">\r\n                    <h3 class=\"panel-title\">\r\n                        <a class=\"collapsed\" role=\"button\" title=\"\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse0\" aria-expanded=\"true\" aria-controls=\"collapse0\">\r\n                            How much does it cost to use EventBoard?\r\n                        </a>\r\n                    </h3>\r\n                </div>', ' <div id=\"collapse0\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading0\">\r\n                    <div class=\"panel-body px-3 mb-4\">\r\n                       <ul>\r\n                            <li> EventBoard\'s pricing is 1.5% of the ticket price and $0.49 per paid ticket plus 1.5% payment processing per transaction for our essentials package.</li>\r\n                            <li>EventBoard\'s pricing is 2.5% of the ticket price and $1.09 per paid ticket plus a 2.0% payment processing fee per transaction for our professional package.</li>\r\n                            <li>EventBoard\'s premium package has custom pricing.</li>\r\n                            <li>Review our packages here.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>'),
(2, ' <div class=\"panel-heading p-3 mb-3\" role=\"tab\" id=\"heading1\">\r\n                    <h3 class=\"panel-title\">\r\n                        <a class=\"collapsed\" role=\"button\" title=\"\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse1\" aria-expanded=\"true\" aria-controls=\"collapse1\">\r\n                            Can I use EventBoard for free events?\r\n                        </a>\r\n                    </h3>\r\n                </div>', ' <div id=\"collapse1\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading1\">\r\n                    <div class=\"panel-body px-3 mb-4\">\r\n                        <p> It\'s free for organizers to use EventBoard if you\'re not charging for tickets! There are no monthly charges, enrollment costs, or setup fees. If you\'re charging for ticket sales, our fees vary by package.</p>\r\n                    </div>\r\n                </div>'),
(3, '<div class=\"panel-heading p-3 mb-3\" role=\"tab\" id=\"heading2\">\r\n                    <h3 class=\"panel-title\">\r\n                        <a class=\"collapsed\" role=\"button\" title=\"\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse2\" aria-expanded=\"true\" aria-controls=\"collapse2\">\r\n                            How do I sell tickets on EventBoard?\r\n                        </a>\r\n                    </h3>\r\n                </div>', '  <div id=\"collapse2\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading2\">\r\n                    <div class=\"panel-body px-3 mb-4\">\r\n                        <ul>\r\n                            <li>You can accept cash or credit card payments for your event with EventBoard Organizer. It\'s a great way to keep track of on-site sales, and you can even collect contact information for your attendees.</li>\r\n                            <li>Review our payment processing options here.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>'),
(4, '<div class=\"panel-heading p-3 mb-3\" role=\"tab\" id=\"heading3\">\r\n                    <h3 class=\"panel-title\">\r\n                        <a class=\"collapsed\" role=\"button\" title=\"\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse3\" aria-expanded=\"true\" aria-controls=\"collapse3\">\r\n                            How do I get money from EventBoard?\r\n                        </a>\r\n                    </h3>\r\n                </div>', '<div id=\"collapse3\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading3\">\r\n                    <div class=\"panel-body px-3 mb-4\">\r\n                        <ul>\r\n                            <li>To make sure you get paid for your ticket sales, it\'s crucial to enter your payout details. You can be paid by direct deposit, check (USD only), PayPal, or Authorize.Net. When using EventBoard Payment Processing to collect payments, your payout will start processing 4-5 days after the event ends.</li>\r\n                            <li> See your payout status here.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>'),
(5, ' <div class=\"panel-heading p-3 mb-3\" role=\"tab\" id=\"heading4\">\r\n                    <h3 class=\"panel-title\">\r\n                        <a class=\"collapsed\" role=\"button\" title=\"\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse4\" aria-expanded=\"true\" aria-controls=\"collapse4\">\r\n                            How do I get a refund on EventBoard?\r\n                        </a>\r\n                    </h3>\r\n                </div>', '<div id=\"collapse4\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading4\">\r\n                    <div class=\"panel-body px-3 mb-4\">\r\n                        <ul>\r\n                            <li>EventBoard organizers set their own refund policies. Before requesting a refund, first check the event listing to see if the event organizer set a refund policy.</li>\r\n                            <li> Review our refund policy here.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>'),
(6, ' <div class=\"panel-heading p-3 mb-3\" role=\"tab\" id=\"heading5\">\r\n                    <h3 class=\"panel-title\">\r\n                        <a class=\"collapsed\" role=\"button\" title=\"\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse5\" aria-expanded=\"true\" aria-controls=\"collapse5\">\r\n                            Can I cancel my free tickets on EventBoard?\r\n                        </a>\r\n                    </h3>\r\n                </div>', '<div id=\"collapse5\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading5\">\r\n                    <div class=\"panel-body px-3 mb-4\">\r\n                        <ul>\r\n                            <li>We appreciate attendees taking the time to update their order, and if you can\'t attend, it\'s easy to cancel your registration from your EventBoard account. Just log in to EventBoard, Go to the Tickets page, and locate your order. Click your order to view order details,\r\n                                and then select \"Cancel Order\" to cancel your registration. We\'ll send you and the event organizer an email confirming the cancellation.</li>\r\n                            <li> Learn more about canceling your free registration here.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>'),
(7, '<div class=\"panel-heading p-3 mb-3\" role=\"tab\" id=\"heading6\">\r\n                    <h3 class=\"panel-title\">\r\n                        <a class=\"collapsed\" role=\"button\" title=\"\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse6\" aria-expanded=\"true\" aria-controls=\"collapse6\">\r\n                            What is the privacy policy of EventBoard?\r\n                        </a>\r\n                    </h3>\r\n                </div>', ' <div id=\"collapse6\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading5\">\r\n                    <div class=\"panel-body px-3 mb-4\">\r\n                        <ul>\r\n                            <li> Please refer to our privacy policy page to check more information.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>'),
(8, '<div class=\"panel-heading p-3 mb-3\" role=\"tab\" id=\"heading7\">\r\n                    <h3 class=\"panel-title\">\r\n                        <a class=\"collapsed\" role=\"button\" title=\"\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse7\" aria-expanded=\"true\" aria-controls=\"collapse7\">\r\n                            I have multiple events. Is there any promotional offer?\r\n                        </a>\r\n                    </h3>\r\n                </div>', ' <div id=\"collapse7\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading7\">\r\n                    <div class=\"panel-body px-3 mb-4\">\r\n                        <ul>\r\n                            <li>Yes! If you would like to use our services for multiple events throughout the year or in the future, we can offer you a multi-event package deal. In order to secure this promotion, event organizers will have to commit their events all at the same time.\r\n                                We can provide an accurate price quote that is unique to your events’ organization.</li>\r\n                            <li> Please contact us for more details.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `comment_details` varchar(100) NOT NULL,
  `reply_to` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `phoneno` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `fname`, `lname`, `email`, `password`, `phoneno`) VALUES
(1, 'Minal', 'Patel', 'minal26patel@gmail.com', 'minalpatel', NULL),
(2, 'Rajal', 'Patel', 'rajal@gmail.com', 'rajalpatel', NULL),
(3, 'Zenil', 'Soni', 'zenil@gmail.com', 'zenilsoni', NULL),
(4, 'Sejal', 'Patel', 'sejal@gmail.com', 'sejalpatel', NULL),
(5, 'Aman', 'Patel', 'aman@gmail.com', 'amanpatel', NULL),
(6, 'Rushit', 'Patel', 'rushit@gmail.com', 'rushitpatel', NULL),
(8, 'Krishna', 'Patel', 'krishna@gmail.com', 'krishnapatel', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_registered`
--

CREATE TABLE `user_registered` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `seats_booked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registered`
--

INSERT INTO `user_registered` (`id`, `user_id`, `event_id`, `seats_booked`) VALUES
(1, 1, 3, 1),
(2, 1, 4, 1),
(3, 3, 3, 1),
(4, 1, 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_event`
--
ALTER TABLE `create_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreignkey` (`user_id`),
  ADD KEY `foreignkey_event_table` (`event_id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registered`
--
ALTER TABLE `user_registered`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk|usrReg` (`user_id`),
  ADD KEY `fk|eventReg` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `create_event`
--
ALTER TABLE `create_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_registered`
--
ALTER TABLE `user_registered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `create_event`
--
ALTER TABLE `create_event`
  ADD CONSTRAINT `FK` FOREIGN KEY (`user_id`) REFERENCES `sign_up` (`id`);

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `foreignkey` FOREIGN KEY (`user_id`) REFERENCES `sign_up` (`id`),
  ADD CONSTRAINT `foreignkey_event_table` FOREIGN KEY (`event_id`) REFERENCES `create_event` (`id`);

--
-- Constraints for table `user_registered`
--
ALTER TABLE `user_registered`
  ADD CONSTRAINT `fk|eventReg` FOREIGN KEY (`event_id`) REFERENCES `sign_up` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
