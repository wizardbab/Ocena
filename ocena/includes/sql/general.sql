CREATE TABLE IF NOT EXISTS `class` (
  `class_id`         int(11) NOT NULL,
  `class_teacher_id` int(11) NOT NULL,
  `class_course_id`  int(11) NOT NULL,
  `class_name`       varchar(255) DEFAULT NULL,
  PRIMARY KEY (class_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `course_rating` (
  `rating_id`              int(11) NOT NULL AUTO_INCREMENT,
  `course_id`               int(11) NULL,
  `student_id`             int(11) NULL,
  `rating`                 double NULL,
  `course_question_one`    int(11) NULL,
  `course_question_two`    int(11) NULL,
  `course_question_three`  int(11) NULL,
  `course_question_four`   int(11) NULL,
  `course_question_five`   int(11) NULL,
  `comment`                varchar(2000) NULL,
  `course_teacher_id`      int(11) NULL,
  `course_rating_active`   int(11) NOT NULL DEFAULT '1',
  `rating_date`            datetime,
  `vote_count`             int(11) NOT NULL DEFAULT '0'
  PRIMARY KEY (rating_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `course` (
  `course_id`     int(11) NOT NULL,
  `course_name`   varchar(255) DEFAULT NULL,
  `course_label`  varchar(255) DEFAULT NULL,
  PRIMARY KEY (course_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `enroll` (
  `enroll_id`           int(11) NOT NULL AUTO_INCREMENT,
  `enroll_student_id`   int(11) NOT NULL,
  `enroll_class_id`     int(11) NOT NULL,
  PRIMARY KEY (enroll_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `student` (
  `student_id`          int(11) NOT NULL,
  `student_lname`       varchar(255) DEFAULT NULL,
  `student_fname`       varchar(255) DEFAULT NULL,
  PRIMARY KEY (student_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id`       int(11) NOT NULL,
  `teacher_lname`    varchar(255) DEFAULT NULL,
  `teacher_fname`    varchar(255) DEFAULT NULL,
  `teacher_office`   varchar(255) DEFAULT NULL,
  `teacher_email`    varchar(255) DEFAULT NULL,
  PRIMARY KEY (teacher_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `teacher_rating` (
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
  `rating_date`            datetime,
  `vote_count`             int(11) NOT NULL DEFAULT '0'
  PRIMARY KEY (rating_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `votes` (
  `id`               int(11) NOT NULL AUTO_INCREMENT,
  `student_id`       int(11),
  `t_or_c`           int(2),
  `rating_id`        int(11) DEFAULT NULL,
  `vote`             int(11) DEFAULT NULL
  PRIMARY KEY (teacher_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `teacher` (`teacher_id`, `teacher_lname`, `teacher_fname`, `teacher_office`, `teacher_email`) VALUES
(1, 'Geary', 'Michael', 'AC 2XX', 'mgeary@faculty.pcci.edu'),
(2, 'Howell', 'Robert', 'AC 2XX', 'rhowell@faculty.pcci.edu'),
(3, 'Smith', 'Lonnie', 'AC 4XX', 'lsmith@faculty.pcci.edu');

INSERT INTO `course` (`course_id`, `course_name`, `course_label`) VALUES
(1, 'Topics in Computation', 'CS 431'),
(2, 'Business Communications', 'BA 403'),
(3, 'Software Engineering Project 1', 'CS 451');

INSERT INTO `class` (`class_id`, `class_teacher_id`, `class_course_id`, `class_name`) VALUES
(1, 2, 1, 'Topics in Computation'),
(2, 1, 3, 'Software Engineering Project 1'),
(3, 3, 2, 'Business Communications');