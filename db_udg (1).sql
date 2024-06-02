-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 09:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_udg`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_contact`
--

CREATE TABLE `t_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(120) NOT NULL,
  `subject` varchar(85) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_contact`
--

INSERT INTO `t_contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Adibbarri Rulyanto', 'adibbarrirulyanto@gmail.com', 'FISH', 'FISH TECH REQUEST'),
(2, 'Adibbarri Rulyanto', 'adibbarrirulyanto@gmail.com', 'FISH', 'FISH TECH REQUEST'),
(3, 'Ruly Rizki Perdana', 'rulyrizky23@gmail.com', 'Web Develop Shop', 'UDG NEW SHOP'),
(4, 'Ruly Rizki Perdana', 'rulyrizky23@gmail.com', 'Web Develop Shop', 'UDG NEW SHOP'),
(5, 'Kuda', 'kliar6969@gmail.com', 'KUDA', 'HORSE'),
(6, 'Kuda', 'kliar6969@gmail.com', 'KUDA', 'HORSE'),
(7, 'Adibbarri Rulyanto', 'adibbarrirulyanto@gmail.com', 'FISH', 'FISHY');

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis`
--

CREATE TABLE `t_jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(155) NOT NULL,
  `images` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jenis`
--

INSERT INTO `t_jenis` (`id`, `nama`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Controller', 'controller.webp', '2024-06-02 07:54:54', '2024-06-02 08:37:29'),
(2, 'Vinyl', 'vinyl.webp', '2024-06-02 07:54:54', '2024-06-02 08:37:34'),
(3, 'UDG Headphone', 'headphone.webp', '2024-06-02 07:54:54', '2024-06-02 08:37:41'),
(4, 'Keyboard', 'keyboard.webp', '2024-06-02 07:54:54', '2024-06-02 08:37:47'),
(5, 'Laptop', 'laptop.webp', '2024-06-02 07:54:54', '2024-06-02 08:37:53'),
(6, 'Backpack & Travel Bags', 'backpack.webp', '2024-06-02 07:54:54', '2024-06-02 08:41:18'),
(7, 'Tone Control', 'tonecontrol.webp', '2024-06-02 07:54:54', '2024-06-02 08:39:12'),
(8, 'Mixer Player', 'mixer.webp', '2024-06-02 07:54:54', '2024-06-02 08:39:52'),
(9, 'Phone/Tablet', 'phonetab.webp', '2024-06-02 07:54:54', '2024-06-02 08:39:59'),
(10, 'Turntable', 'turntable.webp', '2024-06-02 07:54:54', '2024-06-02 08:40:05'),
(11, 'Digital Storage', 'digitalstorage.webp', '2024-06-02 07:54:54', '2024-06-02 08:42:04'),
(12, 'USB', 'usb.webp', '2024-06-02 07:54:54', '2024-06-02 08:40:18'),
(16, 'cartridge', 'cartridge.webp', '2024-06-02 12:30:31', '2024-06-02 12:30:31'),
(17, 'portable fader', 'portablefader.webp', '2024-06-02 12:30:31', '2024-06-02 12:30:31'),
(18, 'Player', 'player.webp', '2024-06-02 15:30:14', '2024-06-02 15:30:14'),
(19, 'Multi Format', 'multiformat.webp', '2024-06-02 15:30:14', '2024-06-02 15:30:14'),
(20, 'DJ Set', 'djset.webp', '2024-06-02 15:30:14', '2024-06-02 15:30:14'),
(22, 'Adame', 'adamde.jpg', '2024-06-02 19:47:56', '2024-06-02 19:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE `t_product` (
  `id` int(11) NOT NULL,
  `nama` varchar(155) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `no_sku` varchar(35) NOT NULL,
  `images` text NOT NULL,
  `description` text NOT NULL,
  `spec` text NOT NULL,
  `is_featured` enum('yes','no') NOT NULL,
  `is_new` enum('yes','no') NOT NULL,
  `is_available` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_product`
--

INSERT INTO `t_product` (`id`, `nama`, `id_jenis`, `harga`, `no_sku`, `images`, `description`, `spec`, `is_featured`, `is_new`, `is_available`) VALUES
(1, 'UCG PCSK9/9418', 1, 7500000, 'UKS09315', 'dj_table.webp', 're', 're', 'yes', 'no', 'yes'),
(4, 'UDG Creator CDJ/ DJM/ Battle Mixer', 8, 1635000, 'U8443BL', 'mixer_product.webp', 'A Digital DJ looking for a professional, durable case solution for your CDJ/ DJM/ Battle Mixers? Then look no further, UDG have developed a super light EVA Hardcase designed for life on the road. Constructed from durable lightweight compression molded EVA material with a laminated nylon exterior these cases provides protection against drops, scratches & liquids. Skillfully designed & molded to fit the CDJ/ DJM/ Battle Mixers, these cases are perfect for the travelling DJ that needs to protect their equipment.', 'EAN 8718969210621 Color Black Weight 2.0 kg / 4.41 lb Outer Dimensions (W x H x D) 48.5 x 41.5 x 14.5 cm | 19.1 x 16.3 x 5.7 inch Inner Dimensions (W x H x D) 42.0 x 35.0 x 13.5 cm | 16.5 x 13.8 x 5.3 inch Material Durashock molded EVA foam Protection Adjustable EVA padding to customize main compartment to your gear Extra\'s Heavy-duty handle Convenient shoulder strap Easy grip zipper puller Fits Pioneer DJM-S5, DJM-S7, CDJ-2000NXS2, DJM-900NX2, XDJ-1000MK2, CDJ-900NXS, CDJ-1000MK3, DJM-750 K/S, DJM-800, DJM-850 K/S/W, DJM-900SRT, DJM-T1, DJM-S9, DJM-S3, DJS-1000, DVJ-1000 NI Traktor Z2 Numark Scratch, M6 SUB, V7, X7 Akai MPC2000XL Rane Sixty Eight, Sixty Four, MP2015, MP2014, Empath, Sixty One, Sixty Two/Two Z, TTM 56S, TTM 57 MKII, TTM 57SL Denon SC5000, SC5000M, S3700, SC2900, SC3900, X1100, X1600, X1700 Reloop Elite, KUT, RMX-90 DVS, RMX-60, RMX-80, RMP-4 Allen & Heath Xone 96, Xone PX5, Xone 43C, Xone 42, Xone 62, Xone 92, Xone DB2, Xone DB4, Xone 22, Xone 23C Behringer DDM4000 Gemini CDJ-700, MDJ-1000 Mixars Duo/ MKII, Quattro, PlayDifferently MODEL1 Technics SH-EX1200 Vestax TR-1 or similar size mixers and cd players', 'yes', 'yes', 'yes'),
(5, 'UDG Creator Pioneer DJM-A9', 8, 1932000, 'U8495BL', 'mixer_product2.webp', 'A Digital Producer looking for a professional, durable case solution for your Pioneer DJM-A9? Then look no further, UDG developed a super light Eva Hardcase designed for life on the road. Constructed from durable lightweight compression moulded Eva material with a laminated nylon exterior this case provides protection against drops, scratches & liquids. Skillfully designed & moulded to fit the Pioneer DJM-A9, this case is perfect for the travelling Producer that needs to protect their equipment.', 'EAN 8720908560254 Color Black Weight 1.85 kg / 4.08 lb Outer Dimensions (W x H x D) 48.3 x 45.2 x 14.0 cm | 19.0 x 17.8 x 5.5 inch Inner Dimensions (W x H x D) 41.2 x 46.3 x 13.0 cm | 16.2 x 18.2 x 5.1 inch Material Durashock molded EVA foam Protection Cover main material 600D polyester with 5 mm Eva durashock molded body Water repellent laminated nylon exterior Black soft fleece interior Protective egg-crate foam prevent damage from vibrations & shocks Extra\'s Convenient carry handles Convenient shoulder strap Easy grip zipper pulls Fits Pioneer DJM-A9', 'yes', 'yes', 'yes'),
(6, 'Ultimate Audio USB 2.0 C-B 1,5m', 12, 323000, 'U96001RD', 'USB_UDG.webp', 'Connect your USB compatible gear with Audio Optimized UDG Ultimate Audio cables.\r\n\r\nThis USB 2.0 cable with a streamlined design helps DJ’s and Producers maximize their performance and is ideal for home and professional use where impeccable audio is a must.\r\n\r\nUDG Ultimate Audio Cables are designed to interconnect devices with USB interfaces. It is ideal for connecting an audio interface, USB microphone, instrument or most computer peripherals to a PC.\r\n\r\nThe UDG Ultimate Audio Cables deliver professional performance made with superior flexible PVC cable construction, UDG branding on cable ends and Velcro cable strap validates they\'re official. For devices with an older USB version, this cable is backward compatible so you can still make the connection.', 'Color\r\nRed , Orange , Yellow , Green , Blue , White , Black\r\nLength\r\n1.5 m / 4.92 ft\r\nWeight\r\n0.09 kg / 0.2 lb\r\nMaterial\r\nPVC + Metal\r\nProtection\r\nConstructed with corrosion-resistant, gold-plated connectors for optimal signal\r\nTwo ferrite chokes: help eliminate noise in both directions\r\nHigh-quality multi-shielded PVC USB cable\r\nExtra\'s\r\nIncludes UDG Velcro strap for easy storage\r\nHigh-speed Audio Optimized USB 2.0 C-Male to B-Male cable\r\nErgonomic UDG Design\r\nVarious colors makes them easy to identify\r\nFits\r\nConnects mic, keyboards, and speed-critical devices, such as audio interfaces and external hard drives to your computer', 'yes', 'yes', 'yes'),
(7, 'DIGI Trolley To Go Black Orange Inside', 5, 3417000, 'U9880BL/OR', 'Laptop_UDG_TROLLEY.webp', 'The UDG Ultimate DIGI Trolley To Go constucted with a solid body structure trolley bag with in-line wheels and a two stage-trolley handle makes it the ideal bag for those long airport walkways. Built for the frequent flying DJ, with room for your valuable digital DJ gear, it has a large central compartment, a removable divider with an organiser section for your audio interface and headphones. A padded laptop sleeve to fit a 15\" MacBook Pro is provided to protect your computer with two external pockets and a single internal mesh pocket providing storage for cables and documents. The Digi Trolley To Go is the perfect long distance travelling partner.', 'EAN\r\n8717228276651\r\nColor\r\nBlack Orange\r\nWeight\r\n4.2 kg / 9.26 lb\r\nOuter Dimensions (W x H x D)\r\n35.5 x 52.0 x 28.0 cm | 14.0 x 20.5 x 11.0 inch\r\nInner Dimensions (W x H x D)\r\n31.0 x 39.0 x 19.0 cm | 12.2 x 15.4 x 7.5 inch\r\nMaterial\r\nWater Resistant Nylon 420D\r\nProtection\r\nPadded main compartment\r\nIntegrated combination lock\r\nExtra\'s\r\nAdjustable divider with organizer panel for audio interface & headphone\r\nTwo external accessory pockets+single internal mesh pocket\r\nRetractable handle with 2-stage trolley system\r\nErgonomic detachable shoulder strap\r\nFits\r\nUp to 15\" laptop, headphone,\r\nUp to 50 LP\'s,\r\nPioneer DJM-S5, DDJ-XP2, DDJ-200, CDJ-800 MK2, CDJ 900, DJM-750 K/S, DJM-800, DJM 850 K/S/W, XDJ-1000, DDJ-WeGO 3/ 4,\r\nNI Traktor Z2,\r\nNumark Scratch\r\nReloop Digital Jockey-2, RMP-4, RMX-60, RMX-80,\r\nDenon DN-S3700, DN-X1100, DN-X1600, DN-X1700,\r\nAkai MPD32,\r\nAbleton Push,\r\nAllen & Heath Xone 42, Xone 43C, Xone 62, Xone 92, Xone DB2, Xone DB4,\r\nBehringer DDM4000,\r\nHercules DJ Control Wave,\r\nNovation Twitch,\r\nRane Sixty Two/Two Z, Sixty Eight, Sixty Four,\r\nRoland Aira MX-1,\r\nVestax VCI 100 MK2,', 'yes', 'yes', 'yes'),
(8, 'UDG Ultimate DIGI Headphone Bag', 3, 743000, 'U9950BL', 'UDG_headphone.webp', 'The UDG DIGI Headphone Bag is a premium headphone carrying bag made from Ballistic Nylon that is designed to protect headphone, USB drives, SD cards, Ext. hard-drive, mobile phone, cables, business cards, credit cards and accessories in one padded carry bag that includes a handgrip, detachable and adjustable shoulder strap. The UDG DIGI Headphone Bag the one bag a DJ need to carry around today\'s digital media', 'EAN Variant\r\n8717228277504\r\nColor\r\nBlack , Black Camo Orange\r\nWeight\r\n0.36 kg / 0.79 lb\r\nOuter Dimensions (W x H x D)\r\n22.0 x 22.0 x 9.0 cm | 8.7 x 8.7 x 3.5 inch\r\nInner Dimensions (W x H x D)\r\n21.0 x 21.0 x 8.0 cm | 8.3 x 8.3 x 3.1 inch\r\nMaterial\r\nWater resistant Ballistic Nylon 1680D\r\nProtection\r\nFoam padded interior\r\nExtra\'s\r\nDetachable and adjustable shoulder strap. Holds USB drives, SD cards, hard drive, mobile phone, cables, business cards, credit cards and accessories\r\nFits\r\nMost foldable DJ Headphones.', 'no', 'yes', 'yes'),
(9, 'UDG Ultimate 7\" Record Case 200', 2, 1412000, 'U93018BL', 'UDG_vinyl.jpg', 'We, at UDG have further fined-tuned already a great design concept of our flight case into one specially for the most discerning DJ/ producer. Constructed from aluminum thus providing an extremely stable structure with lighter weight compared to traditional flight cases.\r\n\r\nThe UDG Ultimate Record Cases are designed to keep your vinyl protected from accidental damage when you transport it to and from gigs. Theyâ€™re compact and lightweight yet tough enough to keep your valuable records safe.', 'EAN\r\n8718969210218\r\nColor\r\nBlack , Silver\r\nWeight\r\n3.13 kg / 6.9 lb\r\nOuter Dimensions (W x H x D)\r\n44.0 x 27.0 x 23.0 cm | 17.3 x 10.6 x 9.1 inch\r\nInner Dimensions (W x H x D)\r\n41.8 x 20.6 x 25.2 cm | 16.4 x 8.1 x 9.9 inch\r\nMaterial\r\nAluminum\r\nProtection\r\nCorrosion resistant aluminum profiles with strong rounded corners\r\nFully-lined with high density foam protective padding\r\nStrong butterfly lock and solid metal hinges\r\nRubber feet at the bottom for support in standing position\r\nExtra\'s\r\nLighter weight than traditional flight cases\r\nBlack Diamond finishing surface\r\nErgonomic & sturdy carry handle\r\nFits\r\nApproximately up to 200 7-inch LP/ vinyl records. Capacity will depend on the thickness of the records & their packaging.', 'yes', 'yes', 'yes'),
(10, 'UDG Ultimate DIGI Headphone Bag', 9, 743000, 'U9950BL', 'UDG_headphone.webp', 'The UDG DIGI Headphone Bag is a premium headphone carrying bag made from Ballistic Nylon that is designed to protect headphone, USB drives, SD cards, Ext. hard-drive, mobile phone, cables, business cards, credit cards and accessories in one padded carry bag that includes a handgrip, detachable and adjustable shoulder strap. The UDG DIGI Headphone Bag the one bag a DJ need to carry around today\'s digital media', 'EAN Variant\r\n8717228277504\r\nColor\r\nBlack , Black Camo Orange\r\nWeight\r\n0.36 kg / 0.79 lb\r\nOuter Dimensions (W x H x D)\r\n22.0 x 22.0 x 9.0 cm | 8.7 x 8.7 x 3.5 inch\r\nInner Dimensions (W x H x D)\r\n21.0 x 21.0 x 8.0 cm | 8.3 x 8.3 x 3.1 inch\r\nMaterial\r\nWater resistant Ballistic Nylon 1680D\r\nProtection\r\nFoam padded interior\r\nExtra\'s\r\nDetachable and adjustable shoulder strap. Holds USB drives, SD cards, hard drive, mobile phone, cables, business cards, credit cards and accessories\r\nFits\r\nMost foldable DJ Headphones.', 'yes', 'yes', 'yes'),
(11, 'UDG Creator DIGI Hardcase Small Black', 11, 327000, ' U8418BL', 'UDG_digitalstore.jpg', 'A Digital DJ looking for a professional, durable case solution for your digital storage devices? Then don\'t look further as UDG has developed a super light Eva Hardcase designed for life on the road. The UDG Creator DIGI Hardcase is constructed from durable lightweight compression moulded Eva material with a laminated Nylon exterior. The Case provides protection against drops, scratches & liquids. Skillfully designed & moulded to fit 4 USB sticks, SD and Business cards, this Case is perfect for the travelling DJ\'s that needs to protect their valuable music collection.', 'EAN\r\n8717228277979\r\nColor\r\nBlack\r\nWeight\r\n0.18 kg / 0.4 lb\r\nOuter Dimensions (W x H x D)\r\n13.0 x 10.0 x 3.5 cm | 5.1 x 3.9 x 1.4 inch\r\nInner Dimensions (W x H x D)\r\nNot Applicable\r\nMaterial\r\nDurashock molded EVA foam\r\nProtection\r\nSoft fleece interior\r\nExtra\'s\r\nEasy grip zipper puller\r\nFits\r\nSD cards, Business cards, Small accessories.', 'yes', 'yes', 'yes'),
(12, 'UDG Creator Cartridge Hardcase Black', 16, 490000, 'U8420BL', 'UDG_cartridge.jpg', 'A Digital DJ looking for a professional, durable case solution for your turntable cartridges? Then don\'t look further as UDG has developed a super light Eva Hardcase designed for life on the road. The UDG Creator Cartridge Hardcase is constructed from durable lightweight compression moulded Eva material with a laminated Nylon exterior. The Case provides protection against drops, scratches & liquids. Skillfully designed & moulded to fit several cartridges, this Case is perfect for the travelling DJ\'s that needs to protect their cartridges.', 'EAN\r\n8717228278013\r\nColor\r\nBlack\r\nWeight\r\n0.43 kg / 0.95 lb\r\nOuter Dimensions (W x H x D)\r\n26.0 x 13.6 x 5.8 cm | 10.2 x 5.4 x 2.3 inch\r\nMaterial\r\nDurashock molded EVA foam\r\nProtection\r\nSoft fleece interior\r\nExtra\'s\r\nEasy grip zipper puller\r\nFits\r\nTurntable Cartridges', 'no', 'yes', 'no'),
(13, 'UDG Creator Portable Fader Hardcase Small Black', 17, 148000, 'U8471BL', 'UDG_portable.jpg', 'A Digital DJ/ Producer looking for a professional, durable case solution for your portable fader? Then look no further, UDG developed a super light Eva Hardcase designed for life on the road. Constructed from durable lightweight compression moulded Eva material with a laminated nylon exterior this case provides protection against drops, scratches & liquids. Skillfully designed & moulded to fit the portable fader?, this case is perfect for the travelling DJ/ Producer that needs to protect their equipment.', 'EAN\r\n8718969213059\r\nColor\r\nBlack\r\nWeight\r\n0.05 kg / 0.11 lb\r\nOuter Dimensions (W x H x D)\r\n10.6 x 5.5 x 5.2 cm | 4.2 x 2.2 x 2.0 inch\r\nInner Dimensions (W x H x D)\r\n10.0 x 4.9 x 4.6 cm | 3.9 x 1.9 x 1.8 inch\r\nMaterial\r\nDurashock molded EVA foam\r\nProtection\r\nSoft fleece interior\r\nExtra\'s\r\nStrong rubber bands to prevent the fader from slipping in\r\nMesh compartment to safely your extra cables or small accessories\r\nEasy grip zipper puller\r\nFits\r\n1x portable fader: Kutter, Raiden VVT-MK1/ RXI-F1, JDDX2R, Frisk, Mixfader', 'yes', 'no', 'yes'),
(14, 'Flight Case Single Turntable Battle/ PLX-CRSS12 & 10\"/12\"Mixer Black Plus (Laptop Shelf, Trolley & Wheels)', 20, 6241000, 'U91100BL', 'dj_set1.webp', 'We, at UDG have further fined-tuned already a great design concept of our flight case into one specially for the most discerning DJ/producer. Constructed from solid 9mm thick plywood, the outside is laminated in a black finished honeycomb/hexagonal \"Stage Grip\" pattern. The inner sides are protected with high density diamond embossed EVA foam protective padding. This extremely robust padding protects the equipment against scratches, dust or other damages, creating a unique stylish & practical finish.\r\n\r\nExtra wide black finished aluminum profile & massive UDG logo embossed ball corners are incorporated to ensures longevity & maintaining a permanently attractive, professional design. This flight case also feature built-in corner wheels on one side for convenient transport and heavy duty spring loaded handles for a secured lift & load.\r\n\r\nUDG Ultimate Flight Case Single Turntable Battle/ PLX-CRSS12 & 10\"/12\" Mixer Black Plus (Laptop Shelf, Trolley & Wheels) not only transport your complete set up easily & securely, but also facilitates devices to be setup within minutes. With these premium features incorporated, the UDG Ultimate Flight cases provide premium professional quality in a very stylish modern black colored combination.', 'EAN\r\n8720908561114\r\nColor\r\nBlack\r\nWeight\r\n18.0 kg / 39.68 lb\r\nOuter Dimensions (W x H x D)\r\n91.2 x 51.4 x 28.3 cm | 35.9 x 20.2 x 11.1 inch\r\nInner Dimensions (W x H x D)\r\nTurntable compartment: 37.7 x 45.4 x 8.3 cm | 14.8 x 17.9 x 3.3 inch\r\nMixer compartment: 40.9 x 47.4 x 8.3 cm | 16.1 x 18.6 x 3.3 inch\r\nMaterial\r\nHeavy duty construction of 9 mm thick plywood\r\nProtection\r\nExtra-wide black solid aluminum profiles\r\nSecure stacking due to stackable ball corners\r\nSturdy construction\r\nFull padded interior keeps controller well-protected\r\nHigh density diamond embossed EVA foam protective padding\r\nExtra\'s\r\nLaminated in a black finish with a honeycomb/hexagonal \"Stage Grip\" pattern\r\nConvenient 80 mm space at rear for connections & PSU storage\r\nRemovable front & rear access panel\r\nAdjustable laptop shelf\r\nHigh quality retractable trolley handle\r\nBuilt-in corner wheels with high quality in-line skate bearings for convenient transport\r\nIncludes adjustable foam pads to fit various mixers\r\nFits\r\n1x x PLX-CRSS12 / any turntable:\r\nTechnics SL-1200MK7, SL-1210 MK2\r\nReloop RP-8000MK2, RP-7000, RP-6000 RP-2000\r\nDenon VL12 Prime\r\nPioneer PLX-1000\r\nStanton ST-150\r\nVestax PDX 3000\r\nNumark TTX\r\nAudio Technica LP120-USB/ LP1240-USB\r\nAmerican Audio Power Drive 2.2 etc.\r\nor similar size turntables\r\n\r\n+ 1x any 10\" & 12\" mixer:\r\nReloop Elite\r\nDenon DJ X1800 Prime\r\nPioneer DJM-S5, DJM-S9, DJM-909, DJM-707\r\nRane Seventy Two, Sixty Two, Sixty One, MP-2014, TTM57 MK2, TTM57 SL\r\nNI Kontrol Z2\r\nThud Ruble TRX\r\nMixars Quattro, Duo\r\nVestax PMC 05 Pro4, PMC 07\r\nor similar size mixers', 'no', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `t_subscribe`
--

CREATE TABLE `t_subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(155) NOT NULL,
  `message` enum('You Successfully Subscribed!') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_subscribe`
--

INSERT INTO `t_subscribe` (`id`, `email`, `message`) VALUES
(1, 'rulyce23@gmail.com', 'You Successfully Subscribed!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Ruperzki23', '$2y$10$yTUIeQIBz2409tH14x.NCe26UdsIG1Z0SM.3.BHqmP6SYEdKqjfJO', '2024-06-03 01:21:59'),
(2, 'rizki133', '$2y$10$jNyerrWhyfCgvmfxCHXuyeSeMNFwJ62eNji7F9K94j8CF3q2xPgxS', '2024-06-03 01:28:53'),
(3, 'nida12', '$2y$10$Q0dOVLW.zSxKhGUhJ6nEZ.ST4DYkz9RVdDlr4XPomxw6Peutrm7rq', '2024-06-03 02:34:57'),
(6, 'rizki23', '$2y$10$samaNCXB/ZLuBbexZyMrruZFPz6GCpGBYZsiB9K/JxOhFRI26/lsW', '2024-06-03 02:40:18'),
(7, 'rizki231', '$2y$10$EN6sDkggYsN39pUtzyAE3OAbG5vnV9DoSwjD2a8s1MBV7u0ryB3EG', '2024-06-03 02:40:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_contact`
--
ALTER TABLE `t_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jenis`
--
ALTER TABLE `t_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_subscribe`
--
ALTER TABLE `t_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_contact`
--
ALTER TABLE `t_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_jenis`
--
ALTER TABLE `t_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `t_product`
--
ALTER TABLE `t_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_subscribe`
--
ALTER TABLE `t_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
