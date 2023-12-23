-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 11:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `log`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL,
  `name_article` varchar(80) DEFAULT NULL,
  `description_article` text DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `color1` int(11) DEFAULT NULL,
  `color2` int(11) DEFAULT NULL,
  `color3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id_article`, `name_article`, `description_article`, `category`, `price`, `color1`, `color2`, `color3`) VALUES
(1, 'Apple AirPods Pro (2nd Generation) Wireless Earbud', 'RICHER AUDIO EXPERIENCE â€“ The Apple-designed H2 chip pushes advanced audio performance even further, resulting in smarter noise cancellation and more immersive sound. The low-distortion, custom-built driver delivers crisp, clear high notes and deep, rich bass in stunning definition. So every sound is more vivid than ever..Note : If the size of the earbud tips does not match the size of your ear canals or the headset is not worn properly in your ears, you may not obtain the correct sound qualities or call performance. Change the earbud tips to ones that fit more snugly in your ear\r\n<br>NEXT-LEVEL ACTIVE NOISE CANCELLATION â€“ Up to 2x more Active Noise Cancellation than the previous AirPods Pro for dramatically less noise on your commute, or when you want to focus. Adaptive Transparency lets you comfortably hear the world around you, adjusting for intense noiseâ€”like sirens or constructionâ€”in real time.\r\n', 'Electronics', 224, NULL, NULL, NULL),
(2, 'SAMSUNG 980 PRO SSD 2TB PCIe NVMe Gen 4 Gaming M.2', 'Next-level SSD performance: Unleash the power of the Samsung 980 PRO PCIe 4.0 NVMe SSD for next-level computing. 980 PRO delivers 2x the data transfer rate of PCIe 3.0, while maintaining compatibility with PCIe 3.0.\r\n<br>Maximum Speed: Get read speeds up to 7,000 MB s with 980 PRO and push the limits of what SSDs can do. Powered by a new Elpsis controller designed to harmonize the flash memory components and the interface for superior speed â€“ with a PCIe 4.0 interface thatâ€™s 2x faster than PCIe 3.0 SSDs and 12x faster than Samsung SATA SSDs â€“ every component of this NVMe SSD is manufactured by Samsung for performance that lasts.\r\n', 'Electronics', 169.99, NULL, NULL, NULL),
(3, 'Logitech C920x HD Pro Webcam', 'Webcam comes with a 3-month XSplit VCam license and no privacy shutter. XSplit VCam lets you remove, replace and blur your background without a Green Screen.\r\n<br>Full HD 1080p video calling and recording at 30 fps - Youâ€™ll make a strong impression when it counts with crisp, clearly detailed and vibrantly colored video. Cable length: 1.5 m\r\n', 'Electronics', 89, NULL, NULL, NULL),
(4, 'HP Newest 15.6 FHD IPS Flagship Laptop', '15.6\" FHD Anti-glare micro-edge Display\r\n<br>11th Gen Intel Core i5-1135G7\r\n<br>Intel Iris Xe graphics\r\n<br>Upgraded to 16GB DDR4 RAM\r\n<br>256B PCIe NVME SSD\r\n', 'Electronics', 599, NULL, NULL, NULL),
(5, 'Apple iPhone 12', 'Includes a brand new, generic charging cable that is certified Mfi (Made for iPhone) and a brand new, generic wall plug that is UL certified for performance and safety. Also includes a SIM tray removal tool but does not come with headphones or a SIM card.\r\n<br>Backed by a one-year satisfaction guarantee.\r\n', 'Electronics', 409, 1, 2, 3),
(6, 'SAMSUNG 34-Inch SJ55W Ultrawide Gaming Monitor', '34-INCH ULTRAWIDE MONITOR with WQHD resolution (3440 x 1440p).Wall-Mount (Size mm) 100.0 x 100.0\r\n<br>AMD FREESYNC synchronizes the refresh rate of your graphics card and widescreen monitor to reduce image tear and stutter\r\n<br>CONNECT MULTIPLE INPUT SOURCES thru HDMI ports and display port. Power Supply Type - AC 100-240V. Power Consumption (Max)- 59 W. Power Consumption (Stand-by)- less then equal to 0.3 W. Max Stand By Power (DPMS)- less then equal to 0.5 W\r\n', 'Electronics', 262, NULL, NULL, NULL),
(7, 'GoPro HERO11 Black', 'Revolutionary New Image Sensor: expansive field of view ever on a HERO camera out of the box. This gives you an extra-large canvas for your creativity by capturing more of the sky and horizon in every shot. Zoom in, crop your shots, change digital lenses, adjust aspect ratios and more while keeping the rich textures and sharpness of your footage.\r\n<br>Unbelievable Image Quality: With 5.3K video that gives you 91% more resolution than 4K and an incredible 665% more than 1080p, HERO11 Black captures the action with crisp detail and cinematic image quality. A water- repelling lens cover even helps eliminate lens flare and other artifacts to make your photos and videos even more stunning.\r\n', 'Electronics', 449, NULL, NULL, NULL),
(8, 'Logitech G502 HERO High Performance Mouse', 'Hero 25K sensor through a software update from G HUB, this upgrade is free to all players: Our most advanced, with 1:1 tracking, 400-plus ips, and 100 - 25,600 max dpi sensitivity plus zero smoothing, filtering, or acceleration\r\n<br>11 customizable buttons and onboard memory: Assign custom commands to the buttons and save up to five ready to play profiles directly to the mouse\r\n', 'Electronics', 41.69, NULL, NULL, NULL),
(9, 'Razer Ornata V3 X Gaming Keyboard', 'Low-Profile Keys: With slimmer keycaps and shorter switches, enjoy natural hand positioning that allows for long hours of use with little strain\r\n<br>Silent Membrane Switches: Perfect for those who prefer a quieter, more comfortable experience when gaming or typing\r\n<br>Ergonomic Wrist Rest: Aligns to the keyboard and provides the perfect place to rest your wrists for support thatâ€™s vital during long periods of use\r\n', 'Electronics', 38.99, NULL, NULL, NULL),
(10, 'UGREEN USB C Hub, 6-in-1 USB C Hub Multiport Adapter', '6-in-1 USB C Hub: UGREEN 6-in-1 USB C hub features a 4K HDMI output port, SD, and TF card readers, and 3 USB 3.0 ports. All hub ports can work simultaneously and save you the trouble of plugging & unplugging repeatedly.\r\n<br>Wide Compatibility:The USB c to USB adapter is compatible with almost USB-C devices such as MacBook Pro, MacBook Air, MacBook M1, M2, iMac, iPad Pro, Samsung Galaxy S23 Ultra, Chromebook, Surface, Dell, HP, etc.\r\n', 'Electronics', 24.99, NULL, NULL, NULL),
(11, 'MSI Gaming GeForce RTX 4090 24GB GDRR6X', 'Chipset: GeForce RTX 4090\r\n<br>Video Memory: 24GB GDDR6X\r\n<br>Memory Interface: 384-bit\r\n<br>Output: DisplayPort x 3 (v1.4a) / HDMI 2.1 x 1\r\n<br>Digital maximum resolution: 7680 x 4320\r\n', 'Electronics', 2049.89, NULL, NULL, NULL),
(12, '2020 Apple iPad Pro (12.9-inch, Wi-Fi, 512GB)', '12.9-Inch Edge-to-Edge Liquid Retina Display with ProMotion, True Tone, and P3 Wide Color\r\n<br>A12Z Bionic Chip with Neural Engine - 802.11AX Wi-Fi 6 - Up to 10 Hours of Battery Life/Charge\r\n<br>12MP Wide Camera, 10MP Ultra Wide Camera, 7MP TrueDepth Front Camera, and LIDAR Scanner\r\n<br>Four Speaker Audio and Five Studio-Quality Microphones - Face ID for Secure Authentication and Apple Pay\r\n<br>USB-C Connector for Charging and Accessories - Support for Magic Keyboard, Smart Keyboard Folio, and Apple Pencil\r\n', 'Electronics', 793.95, NULL, NULL, NULL),
(13, 'Chefwave Powerful electric milk frother with stand', 'GET FROTHY IN JUST SECONDS! Chefwave\'s Mew milk frother handheld is perfect for you if you are a coffee enthusiast. Easily create a professional-grade froth for lattes, cappuccinos, macchiatos,matcha and hot chocolate. Experience rich and creamy foam every time with this powerful hand held frother\r\n<br>POWERFUL, PORTABLE, WIRELESS! The Chefwave Milk Frother boasts a powerful titanium motor that can whip milk at a staggering 14,000 RPM. Its compact and portable design makes it easy to use and take on the go, all while being mini and wireless.\r\n', 'Home Appliances', 10.99, NULL, NULL, NULL),
(14, 'Uutensil Stirr', 'Automatic stirrer with unique and innovative design - Saves time when you are cooking - There\'s no need to spend time manually stirring your soups, sauces, porridge, gravy, and more, the stirrer will do the job for you\r\n<br>Self-rotating with three-speed options - Simply place it in a pan or pot, push the button to turn it on, and the stirrer will automatically rotate by itself - Push the button again to turn if off\r\n', 'Home Appliances', 36.95, NULL, NULL, NULL),
(15, 'AHEIM Pots and Pans Set', 'Designed with even heating technology; Suitable for a wide range of heating sources; Induction bottom cooks food evenly, compatible with gas or electric griddle and modular stoves, or halogen cooktop; All pans and parts in this set are dishwasher safe\r\n<br>Enhanced durability; Made with high quality durable food grade aluminum alloy and with premium nonstick coating; Making it safe for frequent cooking and easy cleaning\r\n', 'Home Appliances', 64.95, 14, 5, NULL),
(16, 'LG B2 Series 65-Inch Class OLED Smart TV OLED65B2P', 'With LG\'s 8 million self-lit OLED pixels, you\'ll get a vivid viewing experience with infinite contrast, deep black, and over a billion colors that add depth and bring out the best in whatever you\'re watching\r\n<br>Engineered especially for LG, the advanced Î±7 Gen5 AI Processor 4K algorithmically adapts and adjusts picture and sound quality for a lifelike viewing experience with depth and rich color\r\n<br>Get in the action with an impressive 120Hz refresh rate that keeps up with the fast movement in sports, video games, and movies for a sharp picture with smooth motion from start to finish\r\n', 'Home Appliances', 1499.99, NULL, NULL, NULL),
(17, 'Cuisinart TOB-40N Custom Classic Toaster Oven Broi', 'ENDLESS FUNCTIONS: With 1800 watts of high-performance power you are able to toast, bagel, bake, broil, pizza and keep warm including other options\r\n<br>CAPACITY: Fits 11-inch pizza or 6 slices of toast. .5-cubic feet inside oven toaster\r\n', 'Home Appliances', 99.99, NULL, NULL, NULL),
(18, 'KEGOUU Oven Mitts and Pot Holders 6pcs Set', '6 PIECE KITCHEN ACCESSORY SETS: -Our oven mitts and pot holders set including 2pcs non-slip surface silicone kitchen oven gloves (7X13in), 2pcs pot holders (7X7in) and 2 kitchen towels (12x12in), fit for indoor cooking, baking,BBQ or outdoor grilling. Also the oven mitt set is a perfect ideal kitchen gift for women, men, baker, cooker\r\n<br>COMFORT & SOFT COTTON FABRIC - Both oven mitts and potholders are made of soft quilted cotton lining to bring you comfortable and breathable touch and protect your skin as well. The cooking mitts are quite easy to clean and reserve, suitable for machine washing and hand washing\r\n', 'Home Appliances', 18.69, 6, 7, 8),
(19, 'SHW Vista L-Shape Desk with Monitor Stand', 'L-shaped 3 piece corner computer desk saves space in home office, dorm room\r\n<br>Monitor Shelf is removable can be installed either on the left or right.\r\n<br>Foot rest bar allows for more comfort, Adjustable glides stabilizes / balances the desk on uneven floors, Space Saving Monitor Shelf\r\n<br>Dimension: 51\" W x 19\" D x 28.5\" H (51\" overall depth)\r\n<br>Patent No: US D891820S1\r\n', 'Home Appliances', 84.87, NULL, NULL, NULL),
(20, 'Office Computer Desk Chair with Armrest', 'Office desk chair upholstered in durable Puresoft PU; ideal for home office, work station or conference room use\r\n<br>Height-adjustable padded seat with adjustable seat angle, tilt control and padded armrests\r\n<br>KD metal base with durable caster wheels for smooth-rolling mobility\r\n<br>Supports up to 275 pounds; comply with BIFMA standard; assembly instructions included\r\n<br>Components including casters/base/arms/seat mechanism/hardware kit are packed in back cushion\r\n<br>Chair dimensions: 23.75 x 26 x 38.25-42 inches (WxDxH); seat width: 19.5 inches; seat depth: 17.75 inches; arm height: 26.25-30 inches\r\n', 'Home Appliances', 91.29, NULL, NULL, NULL),
(21, 'Metal Table Lamp with Fabric Shade', 'Gold metal base\r\n<br>White fabric drum shade\r\n<br>Easily accessible On/Off switch located on the cord\r\n<br>Uses 1 x 40W medium type A15 base bulb (not included)\r\n<br>Available in additional base and/or shade color options\r\n', 'Home Appliances', 15.99, NULL, NULL, NULL),
(22, 'ZINUS Josh Sofa Couch', 'Polyester Fabric With Foam and Fiber Cushions\r\n<br>Note : To ensure proper assembly, please follow all steps provided in the installation manual (provided in pdf below)\r\n<br>RIGHT AT HOME, WHERE EVER HOME MAY BE - Like the â€œlittle black dressâ€ of your living room, this timeless sofa features soft lines, a neutral toned fabric and a soft yet supportive feel that pairs effortlessly against any home interior\r\n', 'Home Appliances', 399, NULL, NULL, NULL),
(23, 'Ninja BL610 Professional Blender with Total Crushi', '1000 watts of professional performance power and sleek design\r\n<br>Makes drinks and smoothies in seconds with total crushing technology\r\n<br>Includes a safety feature that keeps the blades from spinning unless lid is secured\r\n<br>BFA free and contains dishwasher safe parts\r\n', 'Home Appliances', 85.95, NULL, NULL, NULL),
(24, 'Andecor Soft Fluffy Bedroom Rug', 'Oftness Bedroom Rugs : Surface velvet pile is not only gives a soft shaggy feeling, but also has a firm color and does not shedding fur - A comfortable sponge in the middle of the modern rug can soothe your tired feet - You can feel free to lie on the carpet areas\r\n<br>Perfect Family Decor : 4ft x 6ft of shaggy area rug is an ideal choice for home decoration - Suitable for bedroom, nursery, children room, living room, girl/boy/baby room, college dorm, etc - We also have other colors and sizes to choose from to suit your style and need\r\n', 'Home Appliances', 25.99, 9, 10, 11),
(25, 'KUYIGO Men\'s Polo Shirt and Shorts Set Summer Outf', '95% Polyester, 5% Spandex\r\n<br>Imported\r\n<br>Pull On closure\r\n<br>Machine Wash\r\n<br>Men\'s sports tracksuit 2 piece outfits outdoor wear running jogging athletic sweat suit set\r\n<br>This zipper polo suits for men set with a pair of tailored hats, loafers and finish with sunglasses for a athleisure vibe.No matter how to match up, it looks very attractive\r\n<br>Elegant design sports suit set suitable for walking, jogging, casual wear and sports in Spring, Fall and Winter.\r\n', 'Outfits', 37.99, 12, 14, 13),
(26, 'COOFANDY Linen Sets For Men 2 Pieces Button Down ', 'HIGH QUALITY FABRIC: 100% cotton. Linen texture. Lightweight, breathable and soft touch, do not fade, Moisture-wicking.\r\n<br>Imported\r\n<br>Button closure\r\n<br>Machine Wash\r\n<br>Button Shirt: Collarless design makes the linen shirt great for summer and keeping cool. Patch pocket at chest gives you a casual style and more elegant. Granddad collared shirt and drawstring shorts is also friendly for big and tall men.\r\n<br>Cotton Shorts: Casual soft shorts with expandable waist provides enough waist and leg room to move more freely. Two slant pockets perfect for storing phones, sunglasses or gadgets.\r\n', 'Outfits', 44.98, 4, 14, 15),
(27, 'COOFANDY Men\'s 2 Pieces Cotton Linen Set Henley Sh', '98% Cotton, 2% Polyester\r\n<br>Imported\r\n<br>Drawstring closure\r\n<br>Machine Wash\r\n<br>Men\'s cotton linen set is made of premium fabric,ultra-soft, lightweight and breathable, keep you cool all the time in summer.\r\n<br>Casual henley shirt feature solid color, v-neck, long sleeves, irregular hem with side split, making you feel comfortable and stress-free during any activities.\r\n<br>Men\'s Linen Pants design in a loose fit, solid color, two pockets, stretchy waist with adjustable drawstring providing the maximum comfort at the waist.\r\n', 'Outfits', 46.99, 16, 17, 18),
(28, 'Gildan mens Hooded', '50% cotton, 50% polyester preshrunk fleece knit\r\n<br>Imported\r\n<br>Pull On closure\r\n<br>preshrunk 50% cotton/50% dryblend polyester\r\n<br>moisture-wicking fabric\r\n<br>air-jet yarn for softer feel and no pilling\r\n<br>double-lined hood with matching drawstring\r\n<br>double-needle stitching\r\n', 'Outfits', 14.98, 14, 19, 20),
(29, 'Ohoo Mens Slim Fit Basic Pullover Hoodies', '80% Cotton, 20% Polyester\r\n<br>Made in Korea\r\n<br>Pull On closure\r\n<br>Machine Wash\r\n<br>ITEM MODEL NUMBER: DCF010\r\n<br>Features : Slim fit, Basic design pullover hoodie with a simple and clean look, Ribbed trims at cuffs and waistband, Front kangaroo pocket and adjustable drawstring with a drawcord length of 48 inches\r\n<br>Material : Made from 80% cotton and 20% polyester, Lightweight and thin fabric suitable for all seasons\r\n', 'Outfits', 28.99, 21, 22, 23),
(30, 'Match Men\'s Wild Cargo Pants', '100% Cotton\r\n<br>Imported\r\n<br>Featuring hardwearing fabric with side-seam cargo pockets\r\n<br>Zipper with button closure\r\n<br>Featuring hardwearing fabric with side-seam cargo pockets\r\n<br>Straight fit: Straight through the seat and thigh with straight leg opening\r\n<br>Ideal for outdoor work and recreation, casual wear\r\n', 'Outfits', 39.99, 24, 25, 14),
(31, 'Lacozy Women\'s Hoodies Long Sleeve Shirt', 'Material: 65% Polyester + 35%Cotton.Breathable,slightly elastic,soft and comfortable\r\n<br>Imported\r\n<br>Lace Up closure\r\n<br>Hand Wash Only\r\n<br>LACOZY Women\'s Hoodies Long Sleeve Shirt Casual Graphic Tee Shirt Fall Clothes for Women Tops Blouse\r\n<br>Features: Cute Rainbow Design, Hooded Sweatshirt, Long Sleeve Shirt, Casual Style Pullover Hoodie for Women, Drawstring Pullover with Side Pockets, Loose Daily Apparel.\r\n', 'Outfits', 28.99, 14, 24, NULL),
(32, 'Lucky Brand Women\'s Baselh2o Rain Boot', 'Rubber\r\n<br>Imported\r\n<br>Leather and Rubber sole\r\n<br>Shaft measures approximately 5.25\" from arch\r\n<br>Platform measures approximately 0.5 inches\r\n<br>Boot opening measures approximately 9.75\" around\r\n<br>Be stylish on rainy days too with the Basel H2O by Lucky Brand\r\n', 'Outfits', 48.87, 14, 26, NULL),
(33, 'Lucky Brand Men\'s Venice Burnout Notch Neck T-Shirt', '51% Polyester, 49% Cotton\r\n<br>Imported\r\n<br>No Closure closure\r\n<br>Machine Wash\r\n<br>Two button notch neck\r\n<br>Short sleeves\r\n<br>Burnout fabric\r\n<br>Tonal stitching\r\n', 'Outfits', 19.99, 27, 28, 29),
(34, 'Vostey Mens Boots Motorcycle Casual Boots for Men', '100% Synthetic\r\n<br>Imported\r\n<br>Rubber sole\r\n<br>Shaft measures approximately 7\" from arch\r\n<br>Platform measures approximately 1.50\"\r\n<br>High-quality synthetic leather:The soft PU leather of men boots are made of high-quality materials with good gloss and smooth touch.\r\n<br>Durable rubber sole: The sole with non-slip pattern can provide grip and traction, suitable for outdoor walking.\r\n', 'Outfits', 39.99, 14, 30, NULL),
(35, 'Hurley Men\'s Cap - Del Mar Snap Back Trucker Hat', '100% Polyester\r\n<br>Imported\r\n<br>Snap closure\r\n<br>Hand Wash Only\r\n<br>OFFICIALLY LICENSED HURLEY: Men\'s Corp Trucker Hat; Our unique blend of style and performance makes us a global benchmark for performance in and out of the water\r\n<br>HIGH QUALITY: Lightweight and breathable curved-brimmed cap for men; Perfect headwear for active men who enjoy jogging, skateboarding, surfing, and catching rays on the beach; A perfect match for your outfit; Nail your off-duty look and team this trucker hat with a tee and fresh kicks for instant style points\r\n', 'Outfits', 27.99, NULL, NULL, NULL),
(36, 'Carhartt Men\'s W.P. Waterproof Insulated Glove', '100% Polyester\r\n<br>Straps,Clip closure\r\n<br>Durable polytex shell\r\n<br>FastDry technology lining wicks away sweat for comfort\r\n<br>Waterproof insert\r\n<br>Reinforced polyurethane (PU) palm\r\n<br>Imported\r\n', 'Outfits', 29.99, 31, 32, 14),
(37, 'THE NORTH FACE Jester Sport Backpack', 'FLEX VENT TECHNOLOGY. The FlexVent suspension system features a flexible yoke built from custom injection-molded and flexible shoulder straps, a padded mesh back panel and a breathable lumbar panel for comfortable, ventilated support.\r\n<br>TOTAL ORGANIZATION. The front compartment has an extra padded tablet sleeve and zip pockets for additional protection. Two water bottle pockets double as multi-use pockets to quickly secure things when crossing the quad.\r\n', 'Sports Equipment', 40, 33, 34, 35),
(38, 'Under Armour Men\'s HeatGear Compression Sleeveless', '84% Polyester, 16% Elastane\r\n<br>Imported\r\n<br>Pull On closure\r\n<br>Machine Wash\r\n<br>Super-light HeatGear fabric delivers superior coverage without weighing you down\r\n<br>Mesh underarm & back panels for strategic ventilation\r\n<br>Material wicks sweat & dries really fast\r\n', 'Sports Equipment', 30, 36, 37, NULL),
(39, 'H2O Capsule 2.2L Half Gallon Water Bottle with Sto', 'BUILT FOR GYM LIFE: No more wrestling with your keys, or leaving your phone on the dirty gym floor. The H2O Capsule is the only sports water bottle with a protective sleeve that doubles as handy storage! Hold your phone, keys and cards while you work out and look good doing it.\r\n<br>HALF GALLON HYDRATION WITH COVERED STRAW LID: The extra large 2.2L / 74 oz plastic jug holds all the water you need to stay hydrated while you exercise. The reusable half gallon comes with a leak-proof & dust-proof covered straw lid, which helps protect the mouthpiece and flips open with a click of a button. The straw-lid is air-sealed: Run straw brush through mouth piece before initial use.', 'Sports Equipment', 29.99, 14, 4, NULL),
(40, 'Atercel Weight Lifting Gloves Full Palm Protection', 'Upgraded Protection: We had the new weight lifting gloves with upgraded palm protection based on thousands of consumersâ€™ voices. With new high density sponge (4 times higher than common sponge), the gloves can offer better wearing strength and cushion while still maintaining a soft comfort feel in workouts. Full palm design optimizes the grip functionality to efficiently protect your hands from calluses and reduce friction discomfort all.\r\n<br>Unrivaled Comfort: Atercel weight lifting gloves are made of lightweight, breathable and stretchy material, to increase flexibility, comfort and fit. The back design is breathable enough to allow for longer time wearing and more flexibility.\r\n', 'Sports Equipment', 13.99, 14, 38, NULL),
(41, 'Nike Men\'s Basketball Shoe', 'Rubber sole\r\n<br>Model Number: 319116011\r\n<br>Gender: mens\r\n<br>Color: Black / White\r\n<br>Made In: Vietnam\r\n', 'Sports Equipment', 158.89, 14, 39, 40),
(42, 'New Balance FuelCore Nergize Sport V1 Sneackers', '100% Textile\r\n<br>Imported\r\n<br>Rubber sole\r\n<br>These shoes have a performance fit. We recommend ordering a 1/2 size bigger than your typical NB size.\r\n<br>Designed to Move With You: A great fit for your active lifestyle, this everyday running shoe features a REVlite midsole for soft support and incredibly lightweight cushioning\r\n<br>Lightweight Strength: Designed for comfort and style, this everyday shoe features a lightweight and breathable upper crafted from synthetic and mesh materials atop a durable rubber outsole\r\n', 'Sports Equipment', 64.95, 41, 42, 14),
(43, 'Gymreapers Lifting Wrist Straps for Weightlifting', 'NEXT LEVEL GRIP SUPPORT TO LIFT MORE WEIGHT - Our Gymreapers weight lifting straps provide neoprene padding to support your wrists and hands as you shrug, deadlift, or complete a heavy back day. Order them now and try them risk free. Youâ€™ll represent a brand that stands for something and takes no excuses. These highly durable, long â€œno slipâ€ straps enhance any workout no matter the lift or routine.\r\n<br>GYMREAPERS LIFETIME REPLACEMENT GUARANTEE - Gymreapers stands behind our weightlifting equipment and accessories. Weâ€™re so confident youâ€™ll love our premium grade lifting straps that if you have any issues at all weâ€™ll send you a replacement at no cost to you. Just contact us and we will get you taken care of 100%. Join the Gymreapers movement today.\r\n', 'Sports Equipment', 14.99, 14, 43, NULL),
(44, 'JWJ Men\'s 2 in 1 Workout Running Shorts', 'Machine Wash.\r\n<br>SIZE: This running shorts dimensions are actually measured. Please check the size chart picture in the left column before purchase. Because of its elastic effect, 1 size up recommended if you prefer loose fit.\r\n<br>FUNCTIONS: With this athletic shorts, you can put any kinds of cellphones into the liner pocket and enjoy music through a unique headphone hole while doing sports; No need to find your towel everywhere, keep it in the towel loop and ready to use; Except 2 slash pockets, an extra small pocket with a zipper can protect your car key, cash, and other valuables.\r\n', 'Sports Equipment', 20.99, 44, 14, NULL),
(45, 'Barbell Pad Squat Pad for Lunges and Squats', 'ULTIMATE COMFORT: The Nuviqo Barbell hip thrust pad is made from soft, thick and protective foam which increases durability and allows you to train in a much easier and comfortable way\r\n<br>SAFE AND SECURE: Featuring two safety straps this Squat Pad provides extensive protection. Combine that to the anti-slip matte finish and you will end up with a bar pad demonstrating excellent stability and balance. Training has never been less worrisome\r\n', 'Sports Equipment', 12.47, 14, 45, NULL),
(46, 'NELEUS Men\'s Running Shirt Mesh Workout Athletic', 'NOTE: Pay attention to the SIZE chart in the third picture to select the appropriate size\r\n<br>Short sleeve gym hoodies great for all seasons, and can be worn for workout or leisure all day long. The material have benefits about breathable and moisture-wicking features\r\n<br>Mens hooded muscle gym shirt,reflective logo increase visibility in low-light conditions. Common style shirt for bodybuilders, gym fanatics, and men with muscular athletic physiques\r\n<br>Sportstyle, Lightweight and comfortable without sacrificing mobility, Safeguards your skin from harmful Ultraviolet Rays\r\n<br>Perfect for Gym, Physical Fitness, Weight-Training, Workout, Bodybuilding, Running, etc. The Deep Cutting Allows Your Arms to Move More Easily\r\n', 'Sports Equipment', 35.86, 46, 47, 48),
(47, '7mm Leather Weight Lifting Belt', 'HEAVY DUTY: The double roller steel buckle prongs are precision made with a black coating for a greater look and are unmatched in strength and durability. We even added double stitching all over the belt for extra durability. Our belts are also competition-approved for IPF, USAP, USPA, IPL, USAW & IWF Certifications.\r\n<br>SIZING CHART: Please use sizing chart in listing images to order the correct size. You need to measure your true waist size with a flexible tape and NOT order by pants size.\r\n', 'Sports Equipment', 59.99, 49, 50, NULL),
(48, 'Nike Brasilia Small Duffel-9.0, Black', '100% Polyester\r\n<br>100% Polyester lining\r\n<br>Zipper closure\r\n<br>25\" shoulder drop\r\n<br>Training bag\r\n<br>Double handles and detachable shoulder strap\r\n<br>Dimensions: 51 x 25 x 28 cm\r\n<br>Model number: BA5957\r\n', 'Sports Equipment', 52.36, NULL, NULL, NULL),
(49, 'PlayStation 5 Console', 'Stunning Games - Marvel at incredible graphics and experience new PS5 features.\r\n<br>Breathtaking Immersion - Discover a deeper gaming experience with support for haptic feedback, adaptive triggers, and 3D Audio technology.\r\n<br>Lightning Speed - Harness the power of a custom CPU, GPU, and SSD with Integrated I/O that rewrite the rules of what a PlayStation console can do.\r\n', 'Video Games', 559, NULL, NULL, NULL),
(50, 'Nintendo Switch with Neon Blue and Neon Red Joy-Cons', '3 Play Styles: TV Mode, Tabletop Mode, Handheld Mode\r\n<br>6.2-inch, multi-touch capacitive touch screen\r\n<br>4.5-9 plus Hours of Battery Life Will vary depending on software usage conditions\r\n<br>Connects over Wi-Fi for multiplayer gaming; Up to 8 consoles can be connected for local wireless multiplayer\r\n<br>Model number: HAC-001(-01)\r\n', 'Video Games', 298.75, NULL, NULL, NULL),
(51, 'Xbox Series X', 'Next wave of invites will be sent on Mondays and Fridays to qualifying customers. While supplies last.\r\n<br>XBOX SERIES X: The fastest, most powerful Xbox ever. Explore rich new worlds with 12 teraflops of raw graphic processing power, DirectX ray tracing, a custom SSD, and 4K gaming.*\r\n<br>FASTER LOAD TIMES: Make the most of every gaming minute with Quick Resume, lightning-fast load times, and gameplay of up to 120 FPS â€“ all powered by Xbox Velocity Architecture.\r\n', 'Video Games', 499, NULL, NULL, NULL),
(52, 'Forza Horizon 5: Standard Edition', 'Lead breathtaking expeditions across the vibrant and ever-evolving open world landscapes of Mexico with limitless, fun driving action in hundreds of the worldâ€™s greatest cars.\r\n<br>Explore a world of striking contrast and beauty. Discover living deserts, lush jungles, historic cities, hidden ruins, pristine beaches, vast canyons, and a towering snow-capped volcano.\r\n<br>Immerse yourself in a deep campaign with hundreds of challenges that reward you for engaging in the activities you love. Meet new characters and choose the outcomes of their Horizon Story missions.\r\n', 'Video Games', 69, NULL, NULL, NULL),
(53, 'God Of War Playstation Hits (PS4)', 'A new Beginning - his vengeance against the Gods of Olympus far behind him, Kratos now lives as a man in the lands of Norse Gods and monsters. It is in this harsh, unforgiving world that he must fight to survive... And teach his son to do the same\r\n<br>second chances - As mentor and protector to a son determined to earn his respect, Kratos is faced with an unexpected opportunity to master the Rage that has long defined him. Questioning the dark Lineage he\'s passed on to his son, he hopes to make amends for the shortcomings of his past Midgard and beyond - Set within the untamed forests, mountains, and realms of Norse lore, God of War features a distinctly new setting with its own pantheon of creatures, monsters, and Gods\r\n', 'Video Games', 24.25, NULL, NULL, NULL),
(54, 'Halo Infinite: Standard Edition', 'The legendary Halo series returns with a groundbreaking multiplayer experience and the most expansive Master Chief campaign yet.\r\n<br>Campaign: When all hope is lost and humanityâ€™s fate hangs in the balance, the Master Chief is ready to confront the most ruthless foe heâ€™s ever faced. Step inside the armor of humanityâ€™s greatest hero to experience an epic adventure and explore the massive scale of the Halo ring.\r\n', 'Video Games', 29.97, NULL, NULL, NULL),
(55, 'The Last Of Us Part II - PlayStation 4', 'Five years after their dangerous journey across the post-pandemic United States, Ellie and Joel have settled down in Jackson, Wyoming in The Last of Us Part 2 from Naughty Dog for the Sony PS4.\r\n<br>Discover an emotional story challenging your notions of right and wrong.\r\n<br>Adventure in a beautiful, dangerous world from peaceful mountains to overgrown ruins.\r\n<br>Experience action-survival gameplay of tense melee combat, fluid movement and dynamic stealth.\r\n<br>Brought to life by the latest iteration of the Naughty Dog engine, the deadly characters and world are more realistic and meticulously detailed than ever before!\r\n', 'Video Games', 26.9, NULL, NULL, NULL),
(56, 'Uncharted 4: A Thief\'s End', 'Several years after his last adventure, retired fortune hunter, Nathan Drake, is forced back into the world of thieves\r\n<br>With the stakes much more personal, Drake embarks on a globe-trotting journey in pursuit of a historical conspiracy behind a fabled pirate treasure\r\n<br>His greatest adventure will test his physical limits, his resolve, and ultimately what he\'s willing to sacrifice to save the ones he loves\r\n', 'Video Games', 29.64, NULL, NULL, NULL),
(57, 'Red Dead Redemption 2 (PS4)', 'rom the creators of Grand Theft Auto V and Red Dead Redemption\r\n<br>The deepest and most complex world Rockstar Games has ever created\r\n<br>Covers a huge range of 19th century American landscapes\r\n<br>Play as Arthur Morgan, lead enforcer in the notorious Van der Linde gang\r\n<br>Interact with every character in the world with more than just your gun;Engage in conversation with people you meet. Your actions influence Arthur\'s honour;Horses are a cowboy\'s best friend, both transport and personal companion;Bond with your horse as you ride together to unlock new abilities\r\n', 'Video Games', 27.1, NULL, NULL, NULL),
(58, 'The Last of Us Part I â€“ PlayStation 5', 'Enhanced visuals: Completely rebuilt from the ground up using Naughty Dogâ€™s latest PS5 engine technology to improve every visual detail, The Last of Us experience has been faithfully enhanced with more realistic lighting and atmosphere, more intricate environments and creative reimaginings of familiar spaces.\r\n<br>Fast loading: Initial loading times are near instant, and seamless after the first instance thanks to the PS5 consoleâ€™s SSD â€“ so you can pick up where you left off in the story and load specific encounters and chapters more quickly.\r\n<br>Haptic feedback: DualSense wireless controller haptic feedback support for every weapon elevates combat encounters, and environments are brought to life through DualSense wireless controller haptic sensations of subtle falling rain, the crunch of stepping on snow and more.\r\n', 'Video Games', 69, NULL, NULL, NULL),
(59, 'Cyberpunk 2077 - PlayStation 4', 'Cyberpunk 2077 is an open-world, action-adventure story set in Night City\r\n<br>Become a cyberpunk, an urban mercenary equipped with cybernetic enhancements and build your legend on the streets of Night City\r\n<br>Take the riskiest job of your life and go after a prototype implant that is the key to immortality\r\n', 'Video Games', 49.99, NULL, NULL, NULL),
(60, 'God of War Ragnarok - PlayStation 5', 'Feel your journey through the Norse realms, made possible by immersive haptic feedback and adaptive trigger functionality.\r\n<br>Take advantage of multidirectional 3D Audio; hear enemies approaching from any direction. (3D audio with stereo headphones (analog or USB))\r\n<br>Bask in the beautiful worlds you travel through, brought to life by precise art direction and arresting attention to detail.\r\n<br>Switch between full 4K resolution at a targeted 30 frames per second, or dynamic resolution upscaled to 4K at a targeted 60fps. (4K resolution requires a compatible 4K TV or display)\r\n', 'Video Games', 69.88, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `id_color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_client`, `id_article`, `color`, `quantity`, `id_color`) VALUES
(1, 7, 8, '', 1, 'color1'),
(2, 7, 58, '', 1, 'color1');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `Fname` varchar(30) DEFAULT NULL,
  `Lname` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password_client` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `Fname`, `Lname`, `email`, `password_client`, `address`) VALUES
(7, 'Achraf', 'Elmahi', 'elmahi.achraf9@gmail.com', '$2y$10$s73XV.4.0d9cQiorZjYEa.K2xiQCFGw45F3vp9uE4dQspPc7rdZoG', '68 YOUSSEF IBN TACHFINE APPT 20 KENITRA , MOROCCO'),
(10, 'Gh0st', 'Elmahi', 'elmahi.achraf1@gmail.com', '$2y$10$PrEFAZu.Poob4hpu5yqPnOTF7ZbEdBwVLF8zIS0/4rT5AupKlHLf6', '68 YOUSSEF IBN TACHFINE APPT 20 KENITRA , MOROCCO'),
(11, 'Billy', 'Butcher', 'billy@gmail.com', '123456', NULL),
(12, 'Clark', 'Kent', 'clark@gmail.com', '123456', NULL),
(13, 'Bruce', 'Wayne', 'Bruce@gmail.com', '123456', NULL),
(14, 'barry', 'ellen', 'barry@gmail.com', '123456', NULL),
(15, 'Jhon', 'homelander', 'homelander@gmail.com', '123456', NULL),
(16, 'Achraf', 'Elmahi', 'elmahi.achraf2@gmail.com', '$2y$10$z81/SX7q4nufvTinsEOW4u/01cPxoHz73OdpBXOxtXM.cdNF9YzgC', NULL),
(17, 'Achraf', 'Elmahi', 'elmahi.achraf5@gmail.com', '$2y$10$cmcs8K07xI2Ea4ts4Fd/WecvzdHplwujcvN0yd9NiNugKMiT3crDa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `date_commande` datetime DEFAULT NULL,
  `date_livraison` date DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `brief_review` varchar(50) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `delivery` int(11) DEFAULT 0,
  `id_color` varchar(10) DEFAULT 'color1',
  `order_token` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_client`, `id_article`, `date_commande`, `date_livraison`, `color`, `quantity`, `brief_review`, `review`, `rating`, `delivery`, `id_color`, `order_token`, `transaction_id`) VALUES
(1, 7, 1, '2023-04-20 00:00:00', '2023-02-20', '', 1, 'Great', 'High quality earpods', 4, 1, 'color1', NULL, NULL),
(2, 10, 1, '2023-02-15 00:00:00', '2023-02-20', '#5588B7', 1, 'Great!', 'It\'s a really high quality earpods', 4, 1, 'color1', NULL, NULL),
(3, 11, 1, '2023-02-15 00:00:00', '2023-02-20', '#5588B7', 1, 'Great backpack!', 'high quality backpack with a plenty of room', 5, 0, 'color1', NULL, NULL),
(4, 12, 1, '2023-02-15 00:00:00', '2023-02-20', '#5588B7', 1, 'It\'s a scam', 'The orders haven\'t bring delivered', 0, 0, 'color1', NULL, NULL),
(5, 15, 1, '2023-02-15 00:00:00', '2023-02-20', '#5588B7', 1, 'Disapointement', 'not what i expected', 2, 0, 'color1', NULL, NULL),
(6, 14, 37, '2023-02-15 00:00:00', '2023-02-20', '#5588B7', 1, 'Decent!', 'Not great but also not bad', 3, 0, 'color1', NULL, NULL),
(8, 13, 37, '2023-02-15 00:00:00', '2023-02-20', '#5588B7', 1, 'pleased', 'Worth buying. I recommand it', 4, 0, 'color1', NULL, NULL),
(9, 10, 2, '2023-03-19 00:00:00', '2023-03-30', '', 1, 'Great product!', 'This product exceeded my expectations.', 4, 0, 'color1', NULL, NULL),
(10, 12, 50, '2023-03-19 00:00:00', '2023-03-30', '', 1, 'Nice design!', 'I really liked the design of this article.', 3, 0, 'color1', NULL, NULL),
(11, 15, 23, '2023-03-19 00:00:00', '2023-03-30', '', 1, 'Not what I expected', 'This article did not meet my expectations.', 2, 0, 'color1', NULL, NULL),
(12, 17, 42, '2023-03-19 00:00:00', '2023-03-30', '', 1, 'Average article', 'This article was just average.', 3, 0, 'color1', NULL, NULL),
(13, 9, 7, '2023-03-19 00:00:00', '2023-03-30', '', 1, 'Great quality', 'The quality of this article was really good.', 4, 0, 'color1', NULL, NULL),
(14, 11, 39, '2023-03-19 00:00:00', '2023-03-30', '', 1, 'Perfect fit', 'This article fit me perfectly.', 5, 0, 'color1', NULL, NULL),
(15, 8, 20, '2023-03-19 00:00:00', '2023-03-30', '', 1, 'Disappointed', 'I was disappointed with this article.', 1, 0, 'color1', NULL, NULL),
(16, 14, 17, '2023-03-19 00:00:00', '2023-03-30', '', 1, 'Not worth it', 'This article was not worth the price.', 2, 0, 'color1', NULL, NULL),
(17, 10, 15, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Perfect size, excellent quality', 'Great product, highly recommend', 5, 0, 'color1', NULL, NULL),
(18, 7, 2, '2023-04-19 00:00:00', '2023-03-24', '', 1, 'Fast nvme', 'it\'s really fast, I recommend it', 4, 1, 'color1', NULL, NULL),
(19, 10, 58, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Awesome product!', 'Couldn\'t be happier with my purchase', 5, 0, 'color1', NULL, NULL),
(20, 15, 42, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Fast delivery, great quality', 'Love this product, would buy again', 4, 0, 'color1', NULL, NULL),
(21, 12, 19, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Exactly what I needed', 'Fantastic customer service, highly recommend', 5, 0, 'color1', NULL, NULL),
(22, 16, 6, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Very comfortable, excellent fit', 'Great value for the price', 4.5, 0, 'color1', NULL, NULL),
(23, 13, 33, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Beautiful color, great quality', 'Highly recommend this product!', 5, 0, 'color1', NULL, NULL),
(24, 11, 56, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Perfect fit, fast shipping', 'Very satisfied with my purchase', 4, 0, 'color1', NULL, NULL),
(25, 17, 14, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Excellent quality, great value', 'Love this product, will definitely buy again', 5, 0, 'color1', NULL, NULL),
(26, 14, 23, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Exactly what I was looking for', 'Very happy with my purchase', 4.5, 0, 'color1', NULL, NULL),
(27, 12, 23, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Very stylish, great fit', 'Would definitely recommend this product!', 4.5, 0, 'color1', NULL, NULL),
(28, 13, 48, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Comfortable and durable', 'Love this product, will definitely buy again', 5, 0, 'color1', NULL, NULL),
(29, 14, 10, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Decent quality for the price', 'Not bad, but could be better', 3.5, 0, 'color1', NULL, NULL),
(30, 15, 34, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Poor stitching, not worth the price', 'Do not recommend this product', 2, 0, 'color1', NULL, NULL),
(31, 16, 6, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Great value for the price', 'Pleasantly surprised with this product!', 4, 0, 'color1', NULL, NULL),
(32, 17, 17, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Horrible fit, uncomfortable', 'Product did not meet my expectations', 1.5, 0, 'color1', NULL, NULL),
(33, 7, 45, '2023-04-21 00:00:00', '2023-03-24', '', 1, 'Decent quality', 'it\'s decent', 3.5, 1, 'color1', NULL, NULL),
(34, 12, 52, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Flimsy material, poor quality', 'Do not recommend this product', 2.5, 0, 'color1', NULL, NULL),
(35, 14, 2, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Great design, comfortable', 'Love this product, would definitely buy again', 4.5, 0, 'color1', NULL, NULL),
(37, 10, 28, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'High quality, good fit', 'Would highly recommend this product!', 5, 0, 'color1', NULL, NULL),
(38, 13, 14, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Great design!', 'Love this product', 4, 0, 'color1', NULL, NULL),
(39, 11, 51, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Poor quality, bad fit', 'Would not recommend this product', 2, 0, 'color1', NULL, NULL),
(40, 16, 6, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Nice color, comfortable', 'Satisfied with my purchase', 3.5, 0, 'color1', NULL, NULL),
(41, 15, 33, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Terrible product, fell apart', 'Do not buy this product', 1, 0, 'color1', NULL, NULL),
(42, 12, 2, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Good value for money', 'Happy with my purchase', 4.5, 0, 'color1', NULL, NULL),
(43, 10, 11, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Disappointing product', 'Not what I was expecting', 2.5, 0, 'color1', NULL, NULL),
(44, 15, 46, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Great fit, comfortable', 'Would recommend this product', 4, 0, 'color1', NULL, NULL),
(45, 11, 19, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Awful quality, uncomfortable', 'Avoid this product', 1.5, 0, 'color1', NULL, NULL),
(46, 12, 55, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Highly dissatisfied', 'Do not buy this product', 0, 0, 'color1', NULL, NULL),
(47, 15, 45, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Great color!', 'Love it so much', 4, 0, 'color1', NULL, NULL),
(48, 16, 52, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Fits perfectly', 'So comfortable and stylish', 5, 0, 'color1', NULL, NULL),
(49, 12, 39, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Nice fabric', 'Exactly what I was looking for', 4.5, 0, 'color1', NULL, NULL),
(50, 11, 15, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Soft and cozy', 'I would buy this again', 4, 0, 'color1', NULL, NULL),
(51, 14, 28, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Looks good', 'Very satisfied with my purchase', 3.5, 0, 'color1', NULL, NULL),
(52, 13, 37, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Disappointed', 'Not what I expected', 2, 0, 'color1', NULL, NULL),
(53, 15, 11, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Poor quality', 'Would not recommend this product', 1.5, 0, 'color1', NULL, NULL),
(54, 16, 21, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Too small', 'Unhappy with the fit', 2, 0, 'color1', NULL, NULL),
(55, 12, 53, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Cheap material', 'Not worth the price', 2.5, 0, 'color1', NULL, NULL),
(56, 11, 46, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Wrong size', 'Disappointed with the fit', 2, 0, 'color1', NULL, NULL),
(57, 14, 23, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Uncomfortable', 'Can’t wear this for more than an hour', 1.5, 0, 'color1', NULL, NULL),
(58, 13, 34, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Not as described', 'False advertising', 2, 0, 'color1', NULL, NULL),
(59, 15, 17, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Bad stitching', 'Fell apart after one wash', 1.5, 0, 'color1', NULL, NULL),
(60, 16, 49, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Poorly made', 'Would not recommend to anyone', 1, 0, 'color1', NULL, NULL),
(61, 12, 31, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Terrible fit', 'Looks nothing like the picture', 1.5, 0, 'color1', NULL, NULL),
(62, 11, 55, '2023-03-19 00:00:00', '2023-03-24', '', 1, 'Cheaply made', 'Not worth the money', 2, 0, 'color1', NULL, NULL),
(63, 7, 24, '2023-06-15 12:45:16', '2023-06-18', 'rgb(11, 234, 242)', 1, 'Hign quality', 'Very nice and soft rug', 4.5, 1, 'color3', '1bbea980933d13f7', 'pi_3NJ2R7K4PQO9iold0Feuu3fH'),
(66, 7, 8, '2023-06-18 04:06:58', '2023-06-23', '', 1, '', '', 0, 0, 'color1', 'e1148a8c9f192729', 'pi_3NKMFpK4PQO9iold1MBEaZRq'),
(67, 7, 57, '2023-06-20 04:36:28', '2023-06-23', '', 1, '', '', 0, 0, 'color1', '03e69a3d5a3365bc', 'pi_3NL5fOK4PQO9iold0Vhh5GRe');

-- --------------------------------------------------------

--
-- Table structure for table `precovery`
--

CREATE TABLE `precovery` (
  `token` varchar(255) NOT NULL,
  `token_creation_time` datetime DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `precovery`
--

INSERT INTO `precovery` (`token`, `token_creation_time`, `id_client`) VALUES
('23778fe69fa6dee814a3ae5f56f1e1c1', '2023-04-07 22:50:49', 10),
('5468be360c13e7e902da9de6898d6782', '2023-06-20 16:35:40', 7);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `token` varchar(255) NOT NULL,
  `creation_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`token`, `creation_date`, `expiration_date`, `id_client`) VALUES
('e14dc05517078b667f481b86a09a7c592822bb8d901de525274bcb6f60f23c5a', '2023-10-28', '2023-11-04', 7);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_client` int(11) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_client`, `id_article`) VALUES
(10, 21),
(10, 6),
(7, 47);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `fk_articles1` (`color1`),
  ADD KEY `fk_articles2` (`color2`),
  ADD KEY `fk_articles3` (`color3`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`,`id_client`,`id_article`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_article` (`id_article`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`,`id_client`,`id_article`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_article` (`id_article`);

--
-- Indexes for table `precovery`
--
ALTER TABLE `precovery`
  ADD PRIMARY KEY (`token`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`token`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_article` (`id_article`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
