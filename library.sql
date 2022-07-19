CREATE TABLE author (
    authorid int(11) NOT NULL AUTO_INCREMENT,
    name varchar(55) NOT NULL DEFAULT '',
    PRIMARY KEY (authorid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

INSERT INTO author (authorid, name) VALUES
(1,'Tolkien'),
(2,'Alex Haley'),
(3,'Tom Clancy'),
(4,'Isaac Asimov');

CREATE TABLE books (
    bookid int(11) NOT NULL AUTO_INCREMENT,
    authorid int(11) NOT NULL DEFAULT '0',
    title varchar(55) NOT NULL DEFAULT '',
    ISBN varchar(25) NOT NULL DEFAULT '',
    pub_year smallint(6) NOT NULL DEFAULT '0',
    available tinyint(4) NOT NULL,
    PRIMARY KEY (bookid)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;

INSERT INTO books (bookid, authorid, title, ISBN, pub_year, available) VALUES
            (1, 1, 'The Two Towers', '0-216-10236-2', 1954, 1);