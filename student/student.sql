use  student_list;
CREATE TABLE student(
    studentID int(11) NOT NULL AUTO_INCREMENT,
    name varchar(55) NOT NULL DEFAULT '',
    class_name varchar(20) NOT NULL DEFAULT '',
    PRIMARY KEY (studentID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

INSERT INTO Student(studentID,name, class_name) values
(1,'Nguyễn Đắc Dũng','T2109M'),
(2,'Vũ Viết Quý','T2109M'),
(3,'Duy Linh', 'T2109M'),
(4,'Võ Huy Hoàng','T12412M'),
(5, 'Nguyễn Đức Mạnh','T121311A');
create table parents(
                        pid int(11) NOT NULL AUTO_INCREMENT,
                        id int(11) NOT NULL DEFAULT'0',
                        pname varchar(55) NOT NULL default '',
                        PRIMARY KEY (pid)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;
INSERT INTO parents(pid, id, pname) VALUES
                                        (1, 1 , 'Phụ huynh học sinh'),
                                        (2, 2, 'Phụ huynh học sinh'),
                                        (3, 3, 'Phụ huynh học sinh')
