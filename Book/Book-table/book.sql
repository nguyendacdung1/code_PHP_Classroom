USE books;
CREATE TABLE IF NOT EXISTS `book`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `author` varchar(255) NOT NULL,
    `price` varchar(10) NOT NULL,
    PRIMARY KEY(`id`)
    )ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

INSERT INTO `book`(`id`, `name`, `author`, `price`) VALUES
                                                               (1, 'Talking', 'Madrit', 5000),
                                                               (2, 'Victoria History', 'Lodo', 6500),
                                                               (3, 'Martin History', 'Par', 8000);
