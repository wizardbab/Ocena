CREATE TABLE IF NOT EXISTS `CLASS` (
  `class_id`         int(11) NOT NULL,
  `class_teacher_id` int(11) NOT NULL,
  `class_course_id`  int(11) NOT NULL,
  `class_name`       varchar(255) DEFAULT NULL,
  PRIMARY KEY (class_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `COURSE_RATING` (
  `rating_id`              int(11) NOT NULL AUTO_INCREMENT,
  `class_id`               int(11) NOT NULL,
  `student_id`             int(11) NOT NULL,
  `rating`                 double NOT NULL,
  `course_question_one`    int(11) NOT NULL,
  `course_question_two`    int(11) NOT NULL,
  `course_question_three`  int(11) NOT NULL,
  `course_question_four`   int(11) NOT NULL,
  `course_question_five`   int(11) NOT NULL,
  `comment`                varchar(2000) NOT NULL,
  `course_teacher_id`      int(11) NOT NULL,
  `course_rating_active`   int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (rating_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `COURSE` (
  `course_id`     int(11) NOT NULL,
  `course_name`   varchar(255) DEFAULT NULL,
  `course_label`  varchar(255) DEFAULT NULL,
  PRIMARY KEY (course_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `ENROLL` (
  `enroll_id`           int(11) NOT NULL AUTO_INCREMENT,
  `enroll_student_id`   int(11) NOT NULL,
  `enroll_class_id`     int(11) NOT NULL,
  PRIMARY KEY (enroll_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `STUDENT` (
  `student_id`          int(11) NOT NULL,
  `student_lname`       varchar(255) DEFAULT NULL,
  `student_fname`       varchar(255) DEFAULT NULL,
  PRIMARY KEY (student_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `TEACHER` (
  `teacher_id`       int(11) NOT NULL,
  `teacher_lname`    varchar(255) DEFAULT NULL,
  `teacher_fname`    varchar(255) DEFAULT NULL,
  `teacher_office`   varchar(255) DEFAULT NULL,
  `teacher_email`    varchar(255) DEFAULT NULL,
  PRIMARY KEY (teacher_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `TEACHER_RATING` (
  `rating_id`              int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id`             int(11) NOT NULL,
  `student_id`             int(11) NOT NULL,
  `rating`                 double NOT NULL,
  `teacher_question_one`   int(11) NOT NULL,
  `teacher_question_two`   int(11) NOT NULL,
  `teacher_question_three` int(11) NOT NULL,
  `teacher_question_four`  int(11) NOT NULL,
  `teacher_question_five`  int(11) NOT NULL,
  `comment`                varchar(2000) NOT NULL,
  `teacher_course_id`      int(11) NOT NULL,
  `teacher_rating_active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (rating_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `TEACHER` (`teacher_id`, `teacher_lname`, `teacher_fname`, `teacher_office`, `teacher_email`) VALUES
(1, 'Geary', 'Michael', 'AC 2XX', 'mgeary@faculty.pcci.edu'),
(2, 'Howell', 'Robert', 'AC 2XX', 'rhowell@faculty.pcci.edu'),
(3, 'Smith', 'Lonnie', 'AC 4XX', 'lsmith@faculty.pcci.edu');

INSERT INTO `COURSE` (`course_id`, `course_name`, `course_label`) VALUES
(1, 'Topics in Computation', 'CS 431'),
(2, 'Business Communications', 'BA 403'),
(3, 'Software Engineering Project 1', 'CS 451');

INSERT INTO `CLASS` (`class_id`, `class_teacher_id`, `class_course_id`, `class_name`) VALUES
(1, 2, 1, 'Topics in Computation'),
(2, 1, 3, 'Software Engineering Project 1'),
(3, 3, 2, 'Business Communications');