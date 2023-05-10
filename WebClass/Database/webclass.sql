-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: webpagesdb.it.auth.gr:3306
-- Χρόνος δημιουργίας: 23 Μαρ 2023 στις 20:51:14
-- Έκδοση διακομιστή: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- Έκδοση PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `webclass`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `announcments`
--

CREATE TABLE `announcments` (
  `id` int(11) NOT NULL,
  `Title` longtext NOT NULL,
  `Dat` date NOT NULL,
  `MainText` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `announcments`
--

INSERT INTO `announcments` (`id`, `Title`, `Dat`, `MainText`) VALUES
(1, 'Αργία 28ης Οκτωμβρίου', '2019-10-23', 'Δεν θα γίνουν μαθήματα λόγω τις 28ης Οκτωμβρίου'),
(3, 'Ανάρτηση Εργασίας', '2020-01-15', 'Η πρώτη εργασία έχει ανακοινωθεί στην ιστοσελίδα εργασίες με προθεσμία τις 22/01/2020 και ώρα 23:59\r\nΜε εκτίμηση\r\n... '),
(6, 'Ανάρτηση 2ης Εργασίας', '2020-02-05', 'Η 2η εργασία έχει ανακοινωθεί στην σέλιδα εργασίες \r\nΜε Εκτίμηση\r\n...');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `link` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `documents`
--

INSERT INTO `documents` (`id`, `title`, `description`, `link`) VALUES
(1, 'Πληροφορίες Μαθήματος', 'Οι βασικές πληροφορίες του μαθήματος', 'Uploads/Documents/5e3aad6cd11028.09907535.doc'),
(2, 'Κεφάλαιο 1ο: Εισαγωγή στην HTML', 'Οι διαφάνειες για το 1ο κεφάλαιο', 'Uploads/Documents/5e3aad6cd11028.09907535.doc'),
(4, 'Κεφάλαιο 2 Εισαγωγή στην CSS', 'Βασικά στοιχεία της CSS', 'Uploads/Documents/5e3aad6cd11028.09907535.doc'),
(6, 'Κεφάλαιο 3  Η 1η Σελιδα', 'Δημιουργία βασικής Σελιδάς με HTML και css', 'Uploads/Documents/5e3aad6cd11028.09907535.doc'),
(8, 'Κεφάλαιο 3 Το FTP', 'Εκμάθηση χρήσεις των FTP', 'Uploads/Documents/5e3b3a54eb02c2.31645727.doc');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `homeworks`
--

CREATE TABLE `homeworks` (
  `id` int(11) NOT NULL,
  `ekfon` longtext NOT NULL,
  `goals` longtext NOT NULL,
  `due` date NOT NULL,
  `give` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `homeworks`
--

INSERT INTO `homeworks` (`id`, `ekfon`, `goals`, `due`, `give`) VALUES
(3, 'Uploads/Homeworks/5e347928cbd987.19704326.doc', 'Εξοικείωση με την HTML\r\nΕξοικείωση με την css\r\n', '2020-02-25', 'Αναφορά σε word \r\nΚώδικας'),
(5, 'Uploads/Homeworks/5e347928cbd987.19704326.doc', 'Εξοικείωση με την HTML\r\nΕξοικείωση με την css\r\n', '2020-02-25', 'Αναφορά σε word \r\nΚώδικας'),
(8, 'Uploads/Homeworks/5e3b3afd7cce06.24312239.doc', 'Στόχος 1\r\nΣτόχος 2\r\nΣτόχος 3', '2020-02-06', 'Αναφορά σε word\r\nΠαρουσίαση σε PowerPoint  ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Surname` text NOT NULL,
  `Pass` tinytext NOT NULL,
  `Username` tinytext NOT NULL,
  `type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `Name`, `Surname`, `Pass`, `Username`, `type`) VALUES
(1, 'Γιώργος', 'Παπαδόπουλος', 'User1pass', 'user1@csd.auth.gr', 'Professor'),
(2, 'Κώστας', 'Αντωνίου', 'User2pass', 'user2@csd.auth.gr', 'Student');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `announcments`
--
ALTER TABLE `announcments`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `announcments`
--
ALTER TABLE `announcments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
