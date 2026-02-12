DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_kategori_index` (`kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `thumbnail`, `kategori`, `nama_produk`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'products/iphone-13-pro.svg', 'Iphone', 'Iphone 13 Pro', 12000000, '2026-02-12 00:00:00', '2026-02-12 00:00:00'),
(2, 'products/samsung-x-flip.svg', 'Samsung', 'Samsung X Flip', 20000000, '2026-02-12 00:00:00', '2026-02-12 00:00:00'),
(3, 'products/xiaomi-redmi-note-11-pro.svg', 'Xiaomi', 'Xiaomi Redmi Note 11 Pro', 3200000, '2026-02-12 00:00:00', '2026-02-12 00:00:00');
