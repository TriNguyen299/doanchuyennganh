-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 23, 2020 lúc 03:45 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phimhay6`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(12) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `name`, `email`, `phone`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyen Mai Huu Tri', 'tringuyen2091999@gmail.com', '0368777354');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `cat_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
('hd', 'Hành Động'),
('hh', 'Hoáº¡t HÃ¬nh'),
('kd', 'Kinh Dá»‹'),
('khvt', 'Khoa Há»c Viá»…n TÆ°á»Ÿng'),
('tc', 'TÃ¬nh Cáº£m'),
('tt', 'Tháº§n Thoáº¡i');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `dm_id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `dm_name` varchar(255) CHARACTER SET ucs2 NOT NULL,
  PRIMARY KEY (`dm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`dm_id`, `dm_name`) VALUES
('pb', 'Phim Bá»™'),
('pc', 'Phim Chiáº¿u Ráº¡p'),
('pl', 'Phim Láº»');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

DROP TABLE IF EXISTS `phim`;
CREATE TABLE IF NOT EXISTS `phim` (
  `phim_id` varchar(15) CHARACTER SET utf8 NOT NULL,
  `phim_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `link` varchar(250) CHARACTER SET utf8 NOT NULL,
  `img` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `qg_id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `cat_id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `dm_id` varchar(5) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`phim_id`),
  KEY `frk_category` (`cat_id`),
  KEY `frk_danhmuc` (`dm_id`),
  KEY `frk_quocgia` (`qg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`phim_id`, `phim_name`, `description`, `link`, `img`, `status`, `qg_id`, `cat_id`, `dm_id`) VALUES
('phim', 'NhÆ¡n TÃ¬nh áº¤m Láº¡nh - Táº­p 3', '<p><span>Bá»™ phim nháº¥n máº¡nh má»™t váº¥n Ä‘á» cá»§a x&atilde; há»™i trong báº¥t cá»© kh&ocirc;ng gian hay thá»i gian n&agrave;o, xÆ°a v&agrave; nay th&igrave; Ä‘á»“ng tiá»n váº«n c&oacute; má»™t sá»©c máº¡nh lá»›n l&agrave;m áº£nh hÆ°á»Ÿng Ä‘áº¿n má»i thá»©, l&agrave;m tha h&oacute;a con ngÆ°á»i trá»Ÿ n&ecirc;n biáº¿n cháº¥t v&igrave; tiá»n há» c&oacute; thá»ƒ Ä‘&aacute;nh máº¥t táº¥t cáº£. B&ecirc;n cáº¡nh Ä‘&oacute; phim c&ograve;n mang Ä‘áº¿n cho ta biáº¿t Ä‘Æ°á»£c nhá»¯ng chuyá»‡n t&igrave;nh Ä‘áº¹p, Ä‘áº«m nÆ°á»›c máº¯t cá»§a ngÆ°á»i xÆ°a th&ocirc;ng qua Ä‘&oacute; c&oacute; thá»ƒ so s&aacute;nh Ä‘Æ°á»£c tháº¿ há»‡ tráº» ng&agrave;y nay há» y&ecirc;u kh&aacute;c xÆ°a ra sao. Ná»™i dung phim Ä‘Æ°á»£c chuyá»ƒn thá»ƒ tá»« t&aacute;c pháº©m ná»•i tiáº¿ng cá»§a nh&agrave; vÄƒn Há»“ Biá»ƒu Ch&aacute;nh ká»ƒ vá» ch&agrave;ng thÆ° sinh Tráº§n VÄƒn Phong con nh&agrave; gia gi&aacute;o v&igrave; nghe lá»i máº¹ Ä‘&atilde; bá»™i Æ°á»›c ngÆ°á»i y&ecirc;u c&ocirc; Hai Liá»n Ä‘á»ƒ Ä‘i láº¥y 1 c&ocirc; g&aacute;i t&ecirc;n NhÆ° Hoa &ndash; con g&aacute;i Cai Tá»•ng Lu&ocirc;ng nh&agrave; quyá»n tháº¿, gi&agrave;u sang. Ch&iacute;nh quyáº¿t Ä‘á»‹nh sai láº§m n&agrave;y l&agrave;m cho cuá»™c sá»‘ng cá»§a anh rÆ¡i v&agrave;o bi ká»‹ch, sá»± viá»‡c tiáº¿p diá»…n ra sao k&iacute;nh má»i c&aacute;c báº¡n Ä‘&oacute;n xem NhÆ¡n T&igrave;nh áº¤m Láº¡nh.</span></p>', 'https://www.youtube.com/embed/c-yuXk2cqNE', '41088172c9.jpg', 1, 'vn', 'tc', 'pb'),
('phim01', 'Sa Máº¡c Cháº¿t', '<p><span>SA Máº C CHáº¾T xoay quanh cuá»™c sá»‘ng cá»§a nhá»¯ng cÆ° d&acirc;n táº¡i má»™t thá»‹ tráº¥n nhá» náº±m c&ocirc; láº­p giá»¯a sa máº¡c. M&ocirc;t ng&agrave;y ná», há» báº¥t ngá» bá»‹ táº¥n c&ocirc;ng bá»Ÿi lo&agrave;i sinh váº­t ká»³ láº¡.</span><br /><span>Khi sá»± sá»‘ng c&ograve;n bá»‹ Ä‘e dá»a Ä‘áº¿n tá»™t c&ugrave;ng há» sáº½ pháº£i l&agrave;m g&igrave; Ä‘á»ƒ tho&aacute;t khá»i tai há»a n&agrave;y???</span></p>', 'https://www.youtube.com/embed/umeR1cEwzhI', '16f95516d7.jpg', 1, 'hq', 'kd', 'pl'),
('phim02', 'Chuyáº¿n Bay Sinh Tá»­', '<p><span>Phim dá»±a tr&ecirc;n má»™t c&acirc;u chuyá»‡n c&oacute; tháº­t v&agrave;o ng&agrave;y 14/05/2018 táº¡i Trung Quá»‘c khi m&agrave; chiáº¿c phi cÆ¡ Airbus A319 cá»§a h&atilde;ng h&agrave;ng kh&ocirc;ng Tá»© Xuy&ecirc;n mang m&atilde; hiá»‡u 3U8633 bay tá»« Tr&ugrave;ng Kh&aacute;nh Ä‘i Lhasa (thá»§ Ä‘&ocirc; T&acirc;y Táº¡ng) bá»‹ vá»¡ k&iacute;nh buá»“ng l&aacute;i l&uacute;c tÄƒng Ä‘á»™ cao. Liá»‡u ráº±ng CÆ¡ trÆ°á»Ÿng v&agrave; phi h&agrave;nh Ä‘o&agrave;n c&oacute; thá»ƒ giáº£i cá»©u th&agrave;nh c&ocirc;ng m&aacute;y bay vá»›i 119 h&agrave;nh kh&aacute;ch b&ecirc;n trong vá»›i t&igrave;nh tráº¡ng m&aacute;y bay hÆ° há»ng v&agrave; Ä‘iá»u kiá»‡n thá»i tiáº¿t ráº¥t xáº¥u l&uacute;c Ä‘&oacute; hay kh&ocirc;ng? Xem phim Ä‘á»ƒ c&oacute; c&acirc;u tráº£ lá»i c&aacute;c báº¡n nh&eacute;.</span></p>', 'https://www.youtube.com/embed/_sqSmywLDFA', '494bd8e3c8.jpg', 0, 'tq', 'hd', 'pl'),
('phim03', 'NgÃ y Em Äáº¹p Nháº¥t', '<p><span>Ng&agrave;y em Ä‘áº¹p nháº¥t - On Your Wedding Day</span><span>&nbsp;l&agrave; bá»™ phim thuá»™c thá»ƒ loáº¡i t&igrave;nh cáº£m l&atilde;ng máº¡n cá»§a H&agrave;n Quá»‘c nÄƒm 2018, ká»ƒ vá» chuyá»‡n t&igrave;nh y&ecirc;u v&agrave; t&igrave;nh báº¡n k&eacute;o d&agrave;i 10 nÄƒm cá»§a hai nh&acirc;n váº­t ch&iacute;nh tá»« tuá»•i ni&ecirc;n thiáº¿u cho tá»›i khi trÆ°á»Ÿng th&agrave;nh. Bá»™ phim Ä‘Æ°á»£c Ä‘áº¡o diá»…n v&agrave; viáº¿t ká»‹ch báº£n bá»Ÿi Lee Seok-geun, vá»›i sá»± tham gia cá»§a hai ng&ocirc;i sao l&agrave; Park Bo-young v&agrave; Kim Yong-kwang.</span></p>', 'https://www.youtube.com/embed/iUFj7BhEsoA', '8f200c861e.jpg', 1, 'hq', 'tc', 'pc'),
('phim04', 'Káº» MÃ¡u Láº¡nh', '<p><span>Bá»™ phim ká»ƒ vá» Charly Mattei Ä‘ang tr&ecirc;n Ä‘Æ°á»ng rÅ© bá» qu&aacute; khá»© l&agrave;m láº¡i cuá»™c Ä‘á»i. Suá»‘t 3 nÄƒm qua &ocirc;ng c&oacute; má»™t cuá»™c sá»‘ng &ecirc;m Ä‘á»m b&ecirc;n vá»£ v&agrave; hai Ä‘á»©a con nhá». Tuy nhi&ecirc;n, má»™t buá»•i s&aacute;ng m&ugrave;a Ä‘&ocirc;ng, anh bá»‹ &aacute;m s&aacute;t v&agrave; bá» máº·c Ä‘áº¿n cháº¿t trong má»™t b&atilde;i Ä‘áº­u xe vá»›i 22 vi&ecirc;n Ä‘áº¡n trong cÆ¡ thá»ƒ. NhÆ°ng ThÆ°á»£ng Äáº¿ Ä‘&atilde; má»‰m cÆ°á»i vá»›i &ocirc;ng, &ocirc;ng Ä‘&atilde; kh&ocirc;ng cháº¿t, v&agrave; &ocirc;ng l&ecirc;n káº¿ hoáº¡ch tráº£ th&ugrave;</span></p>', 'https://www.youtube.com/embed/4ztmpnaG9zw', '00d961b807.jpg', 1, 'usa', 'hd', 'pl'),
('phim05', 'Nobita vÃ  NÆ°á»›c Nháº­t Thá»i NguyÃªn Thá»§y', '<p><span>Truyá»‡n láº¥y bá»‘i cáº£nh háº­u&nbsp;</span><a title=\"Tháº¿ Pleistocen\" href=\"https://vi.wikipedia.org/wiki/Th%E1%BA%BF_Pleistocen\">tháº¿ Pleistocen</a><span>&nbsp;táº¡i Nháº­t Báº£n v&agrave;&nbsp;</span><a title=\"Trung Quá»‘c Ä‘áº¡i lá»¥c\" href=\"https://vi.wikipedia.org/wiki/Trung_Qu%E1%BB%91c_%C4%91%E1%BA%A1i_l%E1%BB%A5c\">Trung Quá»‘c Ä‘áº¡i lá»¥c</a><span>&nbsp;c&oacute; má»™t ngÆ°á»i xáº¥u xa Ä‘áº¿n tá»« tháº¿ giá»›i tÆ°Æ¡ng lai trá»Ÿ láº¡i qu&aacute; khá»© nháº±m th&ocirc;n t&iacute;nh, thay Ä‘á»•i lá»‹ch sá»­ nh&acirc;n loáº¡i. Nobita c&ugrave;ng nhá»¯ng ngÆ°á»i báº¡n v&ocirc; t&igrave;nh phi&ecirc;u lÆ°u Ä‘áº¿n v&agrave; gi&uacute;p bá»™ tá»™c cá»• Ä‘áº¡i chá»‘ng láº¡i Gigazombie.&nbsp;</span></p>', 'https://www.youtube.com/embed/rs-vr9OzdFg', 'bb550ce9a5.jpg', 0, 'nb', 'hh', 'pc'),
('phim06', 'Huyá»n Thoáº¡i Hercules', '<p><span>Nhá»¯ng bá»™ phim vá» tháº§n thoáº¡i Hy Láº¡p lu&ocirc;n c&oacute; nhá»¯ng sá»©c h&uacute;t nháº¥t Ä‘á»‹nh trong l&ograve;ng nhá»¯ng kh&aacute;n giáº£.Hercules: Huyá»n thoáº¡i báº¯t Ä‘áº§u cÅ©ng kh&ocirc;ng há» ngoáº¡i lá»‡. C&acirc;u chuyá»‡n ká»ƒ vá» h&agrave;nh tr&igrave;nh gian nan cá»§a Hercules Ä‘á»ƒ gi&agrave;nh láº¡i ngÆ°á»i anh y&ecirc;u l&agrave; c&ocirc;ng ch&uacute;a xá»© Crete, vá»‘n Ä‘&atilde; Ä‘Æ°á»£c há»©a h&ocirc;n cho anh trai cá»§a Hercules. Ch&iacute;nh bá»Ÿi váº­y anh váº¥p pháº£i sá»± pháº£n Ä‘á»‘i cá»§a gia Ä‘&igrave;nh v&agrave; bá»‹ cha Ä‘áº©y Ä‘i lÆ°u vong. Sau Ä‘&oacute;, Hercules bá»‹ b&aacute;n nhÆ° má»™t t&ecirc;n n&ocirc; lá»‡, anh bá»‹ báº¯t buá»™c tham gia c&aacute;c giáº£i Ä‘áº¥u. CÅ©ng tá»« Ä‘&acirc;y, anh ph&aacute;t hiá»‡n ra m&igrave;nh l&agrave; má»™t &Aacute; tháº§n- con lai giá»¯a tháº§n v&agrave; con ngÆ°á»i. NhÆ°ng thá»i Ä‘iá»ƒm Ä‘&oacute;, nhá»¯ng &Aacute; tháº§n lu&ocirc;n kh&ocirc;ng Ä‘Æ°á»£c coi trá»ng, v&igrave; tháº¿ Hercules báº¯t Ä‘áº§u cuá»™c phi&ecirc;u lÆ°u cá»§a m&igrave;nh Ä‘á»ƒ gi&agrave;nh láº¡i t&igrave;nh y&ecirc;u Ä‘á»‹ch thá»±c v&agrave; sá»©c máº¡nh thuá»™c vá» anh.</span></p>', 'https://www.youtube.com/embed/t7ZAKaPhyPQ', '97fcd8a410.jpg', 1, 'usa', 'tt', 'pl'),
('phim07', 'NÄƒm 2067', '<div class=\"zmovo-trailor-dec\">Cuá»™c h&agrave;nh tr&igrave;nh cá»§a má»™t ngÆ°á»i Ä‘áº¿n tÆ°Æ¡ng lai Ä‘á»ƒ cá»©u má»™t tháº¿ giá»›i Ä‘ang cháº¿t ch&oacute;c</div>\r\n<div class=\"zmovo-trailor-story mt-4 p-4\">&nbsp;</div>', 'https://www.youtube.com/embed/NgJ4lQ-ZjtM', '3a42846ce9.jpg', 1, 'usa', 'khvt', 'pc'),
('phim08', 'Chiáº¿n Binh ThÃ©p', '<p><span>Chiáº¿n Binh Th&eacute;p Ä‘Æ°á»£c biáº¿t Ä‘áº¿n vá»›i ti&ecirc;u Ä‘á» Máº¡ng Äá»•i Máº¡ng táº¡i Viá»‡t Nam l&agrave; c&acirc;u chuyá»‡n vá» cuá»™c chiáº¿n giá»¯a cáº£nh s&aacute;t v&agrave; bá»n bu&ocirc;n b&aacute;n ngÆ°á»i xuy&ecirc;n quá»‘c gia. Nick Cassidy l&agrave; má»™t cáº£nh s&aacute;t Ä‘iá»u tra cá»§a bang New Jersey Ä‘&atilde; Ä‘áº¿n Bangkok, há»£p t&aacute;c c&ugrave;ng Tony Vitayakui má»™t cáº£nh s&aacute;t Ä‘iá»u tra Th&aacute;i Lan Ä‘á»ƒ háº¡ gá»¥c bÄƒng nh&oacute;m tá»™i pháº¡m chuy&ecirc;n mua b&aacute;n phá»¥ ná»¯. Káº» cáº§m Ä‘áº§u bÄƒng nh&oacute;m l&agrave; Viktor Dragovic, má»™t káº» tinh ranh, mÆ°u m&ocirc;, tham tiá»n v&agrave; t&agrave;n Ä‘á»™c......</span></p>', 'https://www.youtube.com/embed/NEID-KR7rug', '11787c03de.jpg', 1, 'tq', 'hd', 'pl'),
('phim09', 'NgÆ°á»i Váº­n Chuyá»ƒn', '<p><span>Pháº§n phim má»›i cá»§a series NgÆ°á»i váº­n chuyá»ƒn c&oacute; t&ecirc;n gá»i The Transporter: Refueled, Ä‘&acirc;y sáº½ l&agrave; táº­p phim táº­p trung v&agrave;o viá»‡c khá»Ÿi Ä‘á»™ng láº¡i dá»± &aacute;n Ä‘&igrave;nh Ä‘&aacute;m n&agrave;y do &ldquo;l&iacute;nh má»›i&rdquo; Ed Skrein Ä‘áº£m nháº­n vai ch&iacute;nh. Europacorp, nh&agrave; sáº£n xuáº¥t cá»§a loáº¡t phim h&agrave;nh Ä‘á»™ng ná»•i tiáº¿ng Taken v&agrave; Lucy, há»©a háº¹n sáº½ Ä‘em Ä‘áº¿n cho kh&aacute;n giáº£ má»™t sá»©c sá»‘ng má»›i, má»™t c&aacute;i nh&igrave;n má»›i vá» NgÆ°á»i Váº­n Chuyá»ƒn. Chuyá»‡n phim váº«n xoay quanh nh&acirc;n váº­t Frank Martin, &ldquo;ngÆ°á»i váº­n chuyá»ƒn&rdquo; ná»•i tiáº¿ng nháº¥t trong giá»›i kinh doanh v&agrave; tá»™i pháº¡m vá»›i kÄ© nÄƒng l&aacute;i xe si&ecirc;u háº¡ng.</span></p>', 'https://www.youtube.com/embed/s7lY5w51a8c', '3a04c0085c.jpg', 0, 'usa', 'hd', 'pl'),
('phim10', 'Godzilla', '<p><span>SÆ°Ì£ xu&acirc;Ìt hi&ecirc;Ì£n cuÌ‰a Godzilla trong quaÌ khÆ°Ì khi&ecirc;Ìn con ngÆ°Æ¡Ì€i phaÌt hi&ecirc;Ì£n ra nhÆ°Ìƒng sinh v&acirc;Ì£t c&ocirc;Ì‰ Ä‘aÌ£i Titan kh&ocirc;Ì‰ng l&ocirc;Ì€ v&acirc;Ìƒn coÌ€n t&ocirc;Ì€n taÌ£i tr&ecirc;n TraÌi Ä&acirc;Ìt. Sau tr&acirc;Ì£n chi&ecirc;Ìn Ä‘aÌnh baÌ£i keÌ‰ thuÌ€, Godzilla m&acirc;Ìt tiÌch vaÌ€o loÌ€ng bi&ecirc;Ì‰n. M&ocirc;Ì£t ngaÌ€y kia, Rá»“ng ba Ä‘&acirc;Ì€u Ghidorah trá»—i dáº­y k&eacute;o theo sá»± thá»©c tá»‰nh cá»§a h&agrave;ng trÄƒm qu&aacute;i váº­t khá»•ng lá»“. Táº¥t cáº£ nhá»¯ng g&igrave; chuÌng muá»‘n l&agrave; tranh gi&agrave;nh quyá»n lá»±c tá»‘i cao, thá»‘ng lÄ©nh tháº¿ giá»›i. Trong tráº­n Ä‘áº¡i chiáº¿n há»§y diá»‡t chÆ°a tá»«ng c&oacute; trong lá»‹ch sá»­ n&agrave;y, liá»‡u \"Ch&uacute;a tá»ƒ cá»§a mu&ocirc;n lo&agrave;i\" Godzilla seÌƒ trÆ¡Ì‰ laÌ£i vaÌ€ laÌ€ &ldquo;Ä‘áº¥ng cá»©u tháº¿&rdquo; cá»§a nh&acirc;n loáº¡i trÆ°á»›c hiá»ƒm há»a diá»‡t vong ?</span></p>', 'https://www.youtube.com/embed/PSUX0M5o9QI', 'eedf6de165.jpg', 1, 'usa', 'khvt', 'pc'),
('phim11', 'Táº§n Thá»§y HoÃ ng TrÃ¹ng Sinh - Táº­p 1', '<p><span>Trong T&agrave;n cáº£nh T&agrave;n Dung, má»™t nh&oacute;m binh l&iacute;nh Ä‘á»™t nhi&ecirc;n di chuyá»ƒn rá»“i biáº¿n máº¥t, dáº¥y l&ecirc;n nhiá»‡m vá»¥ kháº¯p nÆ¡i. NhÆ°ng nhá»¯ng g&igrave; ngÆ°á»i ta t&igrave;m tháº¥y l&agrave; má»™t c&acirc;u chuyá»‡n t&igrave;nh y&ecirc;u cá»§a 3.000 nÄƒm trÆ°á»›c: Táº§n Thá»§y Ho&agrave;ng muá»‘n trÆ°á»ng sinh báº¥t l&atilde;o Ä‘&atilde; sai Tá»« Ph&uacute;c xuá»‘ng biá»ƒn cáº§u tháº§n ti&ecirc;n. Má»¹ ná»¯ H&agrave;n Ä&ocirc;ng Nhi y&ecirc;u trung &uacute;y phi táº§n Má»™ng Thi&ecirc;n Phong, pháº£n bá»™i Táº§n Thá»§y Ho&agrave;ng, khiáº¿n hai ngÆ°á»i pháº£i cháº¿t tháº£m.&nbsp;</span></p>', 'https://www.youtube.com/embed/9XHG2ACLgBA', '32c5328b24.jpg', 0, 'tq', 'tt', 'pb'),
('phim12', 'Táº§n Thá»§y HoÃ ng TrÃ¹ng Sinh - Táº­p 2', '<p><span>Trong T&agrave;n cáº£nh T&agrave;n Dung, má»™t nh&oacute;m binh l&iacute;nh Ä‘á»™t nhi&ecirc;n di chuyá»ƒn rá»“i biáº¿n máº¥t, dáº¥y l&ecirc;n nhiá»‡m vá»¥ kháº¯p nÆ¡i. NhÆ°ng nhá»¯ng g&igrave; ngÆ°á»i ta t&igrave;m tháº¥y l&agrave; má»™t c&acirc;u chuyá»‡n t&igrave;nh y&ecirc;u cá»§a 3.000 nÄƒm trÆ°á»›c: Táº§n Thá»§y Ho&agrave;ng muá»‘n trÆ°á»ng sinh báº¥t l&atilde;o Ä‘&atilde; sai Tá»« Ph&uacute;c xuá»‘ng biá»ƒn cáº§u tháº§n ti&ecirc;n. Má»¹ ná»¯ H&agrave;n Ä&ocirc;ng Nhi y&ecirc;u trung &uacute;y phi táº§n Má»™ng Thi&ecirc;n Phong, pháº£n bá»™i Táº§n Thá»§y Ho&agrave;ng, khiáº¿n hai ngÆ°á»i pháº£i cháº¿t tháº£m.&nbsp;</span></p>', 'https://www.youtube.com/embed/8DR-0UyKjn0', '083fdd3a1d.jpg', 0, 'tq', 'tt', 'pb'),
('phim13', 'NhÆ¡n TÃ¬nh áº¤m Láº¡nh - Táº­p 1', '<p><span>Bá»™ phim nháº¥n máº¡nh má»™t váº¥n Ä‘á» cá»§a x&atilde; há»™i trong báº¥t cá»© kh&ocirc;ng gian hay thá»i gian n&agrave;o, xÆ°a v&agrave; nay th&igrave; Ä‘á»“ng tiá»n váº«n c&oacute; má»™t sá»©c máº¡nh lá»›n l&agrave;m áº£nh hÆ°á»Ÿng Ä‘áº¿n má»i thá»©, l&agrave;m tha h&oacute;a con ngÆ°á»i trá»Ÿ n&ecirc;n biáº¿n cháº¥t v&igrave; tiá»n há» c&oacute; thá»ƒ Ä‘&aacute;nh máº¥t táº¥t cáº£. B&ecirc;n cáº¡nh Ä‘&oacute; phim c&ograve;n mang Ä‘áº¿n cho ta biáº¿t Ä‘Æ°á»£c nhá»¯ng chuyá»‡n t&igrave;nh Ä‘áº¹p, Ä‘áº«m nÆ°á»›c máº¯t cá»§a ngÆ°á»i xÆ°a th&ocirc;ng qua Ä‘&oacute; c&oacute; thá»ƒ so s&aacute;nh Ä‘Æ°á»£c tháº¿ há»‡ tráº» ng&agrave;y nay há» y&ecirc;u kh&aacute;c xÆ°a ra sao. Ná»™i dung phim Ä‘Æ°á»£c chuyá»ƒn thá»ƒ tá»« t&aacute;c pháº©m ná»•i tiáº¿ng cá»§a nh&agrave; vÄƒn Há»“ Biá»ƒu Ch&aacute;nh ká»ƒ vá» ch&agrave;ng thÆ° sinh Tráº§n VÄƒn Phong con nh&agrave; gia gi&aacute;o v&igrave; nghe lá»i máº¹ Ä‘&atilde; bá»™i Æ°á»›c ngÆ°á»i y&ecirc;u c&ocirc; Hai Liá»n Ä‘á»ƒ Ä‘i láº¥y 1 c&ocirc; g&aacute;i t&ecirc;n NhÆ° Hoa &ndash; con g&aacute;i Cai Tá»•ng Lu&ocirc;ng nh&agrave; quyá»n tháº¿, gi&agrave;u sang. Ch&iacute;nh quyáº¿t Ä‘á»‹nh sai láº§m n&agrave;y l&agrave;m cho cuá»™c sá»‘ng cá»§a anh rÆ¡i v&agrave;o bi ká»‹ch, sá»± viá»‡c tiáº¿p diá»…n ra sao k&iacute;nh má»i c&aacute;c báº¡n Ä‘&oacute;n xem NhÆ¡n T&igrave;nh áº¤m Láº¡nh.</span></p>', 'https://www.youtube.com/embed/6e4T08K_km0', 'f9f2aad9c1.jpg', 1, 'vn', 'tc', 'pb'),
('phim14', 'NhÆ¡n TÃ¬nh áº¤m Láº¡nh - Táº­p 2', '<p><span>Bá»™ phim nháº¥n máº¡nh má»™t váº¥n Ä‘á» cá»§a x&atilde; há»™i trong báº¥t cá»© kh&ocirc;ng gian hay thá»i gian n&agrave;o, xÆ°a v&agrave; nay th&igrave; Ä‘á»“ng tiá»n váº«n c&oacute; má»™t sá»©c máº¡nh lá»›n l&agrave;m áº£nh hÆ°á»Ÿng Ä‘áº¿n má»i thá»©, l&agrave;m tha h&oacute;a con ngÆ°á»i trá»Ÿ n&ecirc;n biáº¿n cháº¥t v&igrave; tiá»n há» c&oacute; thá»ƒ Ä‘&aacute;nh máº¥t táº¥t cáº£. B&ecirc;n cáº¡nh Ä‘&oacute; phim c&ograve;n mang Ä‘áº¿n cho ta biáº¿t Ä‘Æ°á»£c nhá»¯ng chuyá»‡n t&igrave;nh Ä‘áº¹p, Ä‘áº«m nÆ°á»›c máº¯t cá»§a ngÆ°á»i xÆ°a th&ocirc;ng qua Ä‘&oacute; c&oacute; thá»ƒ so s&aacute;nh Ä‘Æ°á»£c tháº¿ há»‡ tráº» ng&agrave;y nay há» y&ecirc;u kh&aacute;c xÆ°a ra sao. Ná»™i dung phim Ä‘Æ°á»£c chuyá»ƒn thá»ƒ tá»« t&aacute;c pháº©m ná»•i tiáº¿ng cá»§a nh&agrave; vÄƒn Há»“ Biá»ƒu Ch&aacute;nh ká»ƒ vá» ch&agrave;ng thÆ° sinh Tráº§n VÄƒn Phong con nh&agrave; gia gi&aacute;o v&igrave; nghe lá»i máº¹ Ä‘&atilde; bá»™i Æ°á»›c ngÆ°á»i y&ecirc;u c&ocirc; Hai Liá»n Ä‘á»ƒ Ä‘i láº¥y 1 c&ocirc; g&aacute;i t&ecirc;n NhÆ° Hoa &ndash; con g&aacute;i Cai Tá»•ng Lu&ocirc;ng nh&agrave; quyá»n tháº¿, gi&agrave;u sang. Ch&iacute;nh quyáº¿t Ä‘á»‹nh sai láº§m n&agrave;y l&agrave;m cho cuá»™c sá»‘ng cá»§a anh rÆ¡i v&agrave;o bi ká»‹ch, sá»± viá»‡c tiáº¿p diá»…n ra sao k&iacute;nh má»i c&aacute;c báº¡n Ä‘&oacute;n xem NhÆ¡n T&igrave;nh áº¤m Láº¡nh.</span></p>', 'https://www.youtube.com/embed/c-yuXk2cqNE', '266978986c.jpg', 1, 'vn', 'tc', 'pb'),
('phim15', 'Sam Sam Äáº¿n Rá»“i - Táº­p 1', '<p><span>Sam Sam Äáº¿n Rá»“i l&agrave; bá»™ phim xoay quanh ná»™i dung chuyá»‡n t&igrave;nh lá» lem ho&agrave;ng tá»­ thá»i hiá»‡n Ä‘áº¡i, giá»¯a &ocirc;ng chá»§ Phong Äáº±ng (TrÆ°Æ¡ng H&agrave;n) Ä‘áº¹p trai, láº¡nh l&ugrave;ng nhÆ°ng kh&ocirc;ng k&eacute;m pháº§n dá»‹u d&agrave;ng, tráº» con vá»›i c&ocirc; nh&acirc;n vi&ecirc;n Sam Sam (Triá»‡u Lá»‡ DÄ©nh) vá»¥ng vá», ngá»‘c ngháº¿ch nhÆ°ng Ä‘a sáº§u Ä‘a cáº£m. Má»i c&aacute;c báº¡n Ä‘Äƒng k&yacute; theo d&otilde;i k&ecirc;nh v&agrave; Ä‘&oacute;n xem \"Sam Sam Äáº¿n Rá»“i\" Ä‘Æ°á»£c ph&aacute;t s&oacute;ng má»—i ng&agrave;y&nbsp;</span></p>', 'https://www.youtube.com/embed/voTAZlaTCfk', '66a1cf9dba.jpg', 1, 'hq', 'tc', 'pb'),
('phim16', 'Sam Sam Äáº¿n Rá»“i - Táº­p 2', '<p>Sam Sam Äáº¿n Rá»“i l&agrave; bá»™ phim xoay quanh ná»™i dung chuyá»‡n t&igrave;nh lá» lem ho&agrave;ng tá»­ thá»i hiá»‡n Ä‘áº¡i, giá»¯a &ocirc;ng chá»§ Phong Äáº±ng (TrÆ°Æ¡ng H&agrave;n) Ä‘áº¹p trai, láº¡nh l&ugrave;ng nhÆ°ng kh&ocirc;ng k&eacute;m pháº§n dá»‹u d&agrave;ng, tráº» con vá»›i c&ocirc; nh&acirc;n vi&ecirc;n Sam Sam (Triá»‡u Lá»‡ DÄ©nh) vá»¥ng vá», ngá»‘c ngháº¿ch nhÆ°ng Ä‘a sáº§u Ä‘a cáº£m. Má»i c&aacute;c báº¡n Ä‘Äƒng k&yacute; theo d&otilde;i k&ecirc;nh v&agrave; Ä‘&oacute;n xem \"Sam Sam Äáº¿n Rá»“i\" Ä‘Æ°á»£c ph&aacute;t s&oacute;ng má»—i ng&agrave;y&nbsp;</p>', 'https://www.youtube.com/embed/5v5nA6VVXhw', '427f94a06e.jpg', 1, 'hq', 'tc', 'pb');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phimyeuthich`
--

DROP TABLE IF EXISTS `phimyeuthich`;
CREATE TABLE IF NOT EXISTS `phimyeuthich` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `phim_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phim_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `frk_phim` (`phim_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quocgia`
--

DROP TABLE IF EXISTS `quocgia`;
CREATE TABLE IF NOT EXISTS `quocgia` (
  `qg_id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `qg_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`qg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `quocgia`
--

INSERT INTO `quocgia` (`qg_id`, `qg_name`) VALUES
('hq', 'HÃ n Quá»‘c'),
('nb', 'Nháº­t Báº£n'),
('tl', 'ThÃ¡i Lan'),
('tq', 'Trung Quá»‘c'),
('usa', 'Má»¹'),
('vn', 'Viá»‡t Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8 NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `address`, `phone`, `city`, `country`) VALUES
(1, 'tringuyen2091999@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'tringuyen1', 'HCM', '0368777354', 'HCM', 'Viet Nam'),
(2, 'tringuyen190699@gmail.com', 'bde76ad30db9db4419232904b08f480c', 'DemoSVN1', 'HCM', '0924501595', 'HCM', 'HCM'),
(3, 'admin@gmail.cm', 'dba5f8a123b0fbb3325e8f0262e3711c', 'DemoSVN1', 'HCM', '0101010101', 'HCM', 'HCM'),
(4, 'huynhtrung1006', '202cb962ac59075b964b07152d234b70', 'aadasda', 'HCM', '0857822083', 'HCM', 'HCM');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `frk_category` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `frk_danhmuc` FOREIGN KEY (`dm_id`) REFERENCES `danhmuc` (`dm_id`),
  ADD CONSTRAINT `frk_quocgia` FOREIGN KEY (`qg_id`) REFERENCES `quocgia` (`qg_id`);

--
-- Các ràng buộc cho bảng `phimyeuthich`
--
ALTER TABLE `phimyeuthich`
  ADD CONSTRAINT `frk_phim` FOREIGN KEY (`phim_id`) REFERENCES `phim` (`phim_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
