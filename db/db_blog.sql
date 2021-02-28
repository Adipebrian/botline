-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2021 pada 17.47
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(128) NOT NULL,
  `cat_slug` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog_category`
--

INSERT INTO `blog_category` (`id`, `cat_name`, `cat_slug`) VALUES
(2, 'program', 'program'),
(3, 'baru nih', 'baru-nih'),
(4, 'programing', 'programing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `tag` varchar(128) NOT NULL,
  `views` int(255) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` int(128) NOT NULL,
  `update_created` int(128) NOT NULL,
  `user_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `slug`, `content`, `image`, `category`, `tag`, `views`, `status`, `date_created`, `update_created`, `user_id`) VALUES
(4, 'Data Jumlah Mingguan ', 'data-jumlah-mingguan-', 'ini adalah conten blog', '44aa205cf92c554527746bc84041c992.jpg', 'teknologi', 'kehidupan,a,b', 3, 1, 1612956459, 1613065127, 1),
(5, 'Baru', 'baru', 'Ini isi baru', '921463d14058fb91def8b2aa374c1014.jpg', 'program', 'kehidupan', 1, 1, 1613065297, 0, 1),
(7, 'ini blog terbaru', 'ini-blog-terbaru', 'Lorem ipsum dolor <strong>sit amet</strong> consectetur adipiscingb elit amet sit <strong>eros</strong> pulvinar', 'ca0be44a3143d8e4d1d358d97c95b179.jpg', 'baru nih', 'html', 0, 1, 1613377895, 1614058274, 1),
(11, 'terbaru banget', 'terbaru-banget', '<div>a</div>', 'e46d549b110174dfef24db744061076c.jpg', 'program', 'html,baru nih 2021', 0, 1, 1614059768, 1614059890, 2),
(12, 'kudeta', 'kudeta', '<div>a</div>', 'b6b628caef4275b2545cf80ba8590625.jpg', 'baru nih', 'baru nih 2021', 3, 1, 1614059802, 1614059878, 2),
(13, 'Data Rekap Mingguan ', 'data-rekap-mingguan-', '<div>a</div>', 'f593394fa3a9771b6994e08120178922.jpeg', 'baru nih', 'baru nih 2021', 3, 1, 1614059843, 1614059868, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_subs`
--

CREATE TABLE `blog_subs` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog_subs`
--

INSERT INTO `blog_subs` (`id`, `email`) VALUES
(1, 'salfaais@gmail.com'),
(2, 'admin@tkj.id'),
(3, 'admin@tkj.id'),
(4, 'salfaais@gmail.com'),
(5, 'salfaais@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog_tag`
--

INSERT INTO `blog_tag` (`id`, `name`, `slug`) VALUES
(1, 'html', 'html'),
(3, 'baru nih 2021', 'baru-nih-2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `name_from` varchar(128) NOT NULL,
  `name_to` varchar(128) NOT NULL,
  `email_to` varchar(128) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` int(128) NOT NULL,
  `pesan_subject` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(128) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `role`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `last_login`) VALUES
(1, 'Admin', 'Super Admin', 'admin@tkj.id', 'default.jpg', '$2y$10$2Rags9WLuQ5aXAwz0aC5fe8/ZPQKorJW5P8gyddklWlSRgk7vJyEe', 1, 1, 1627310, 0),
(2, 'Adi', 'Admin blog', 'pebrianadi05@gmail.com', 'default.jpg', '$2y$10$AbTiteb523.tYMGfyzSsje8DkNjSQNnuq/Nwg0RvM2COqZ6UlD4G6', 2, 1, 1627310, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 1, 25),
(6, 1, 29),
(7, 1, 4),
(8, 1, 32),
(9, 1, 5),
(10, 2, 4),
(11, 2, 29),
(12, 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Blog'),
(5, 'Subscriber'),
(25, 'Edit Pofile'),
(29, 'Pesan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Admin Blog');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'home', 1),
(2, 1, 'Role', 'admin/role', 'view_module', 1),
(3, 25, 'Edit Profile', 'edit', 'person', 1),
(4, 25, 'Change Password', 'editpass', 'vertical_split', 1),
(5, 3, 'Menu', 'menu', 'table_chart', 1),
(6, 3, 'SubMenu', 'menu/submenu', 'table_chart', 1),
(22, 2, 'Profilku', 'user', 'person', 1),
(67, 29, 'Pesan Masuk', 'backend/pesan', 'mail', 1),
(71, 4, 'Blog Posts', 'blog', 'vertical_split', 1),
(72, 4, 'Add New Post', 'blog/add', 'note_add', 1),
(73, 4, 'Data Blog', 'blog/data', 'vertical_split', 1),
(74, 4, 'Add Category', 'blog/add_cat', 'note_add', 1),
(75, 4, 'Add Tag', 'blog/add_tag', 'note_add', 1),
(76, 5, 'Subscriber', 'subscribe', 'person', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`id`, `ip`, `date`, `hits`, `online`, `time`) VALUES
(1, '::1', '2021-02-07', 21, '1612707852', '2021-02-07 12:02:16'),
(2, '::1', '2021-02-08', 9, '1612790459', '2021-02-08 02:53:12'),
(3, '::1', '2021-02-09', 1, '1612840088', '2021-02-09 04:08:08'),
(4, '::1', '2021-02-10', 1, '1612953189', '2021-02-10 11:33:09'),
(5, '::1', '2021-02-11', 3, '1613067171', '2021-02-11 03:50:44'),
(6, '::1', '2021-02-12', 9, '1613137363', '2021-02-12 05:37:54'),
(7, '::1', '2021-02-15', 3, '1613377522', '2021-02-15 09:23:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog_subs`
--
ALTER TABLE `blog_subs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `blog_subs`
--
ALTER TABLE `blog_subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
