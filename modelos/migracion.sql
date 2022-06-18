

CREATE TABLE `characters` (
  `id` int NOT NULL,
  `name` text COLLATE utf8mb3_spanish_ci,
  `species` text COLLATE utf8mb3_spanish_ci,
  `status` text COLLATE utf8mb3_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

