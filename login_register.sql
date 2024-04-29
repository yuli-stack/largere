SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE 'users'(
    `id` int(11)NOT NULL,
    `fullname`varchar(128) NOT NULL,
    `email`varchar(255) NOT NULL,
    'password'varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO `users` (`id`,`fullname`,`email`,`password`)VALUES
(1, 'Aktar', 'aktar@gmail.com', '$2y$10$Jmf9Xk2y8m.fo3c/ZgKmzOrdIRkU05KSGLI0picKLEtr68ll7hjB.');

-- Indexes for dumped tables

ALTER TABLE `users`
    ADD PRIMARY key(`id`);
ALTER TABLE `users`
    MODIFY `id` int(11)NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 2;
COMMIT;