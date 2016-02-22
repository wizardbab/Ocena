

DROP TABLE IF EXISTS `CLASS`;

CREATE TABLE `CLASS` (
  `class_id` int(11) NOT NULL,
  `class_teacher_id` int(11) NOT NULL,
  `class_course_id` int(11) NOT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `COURSE`;

CREATE TABLE `COURSE` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `COURSE_RATING`;

CREATE TABLE `COURSE_RATING` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `course_question_one` int(11) DEFAULT NULL,
  `course_question_two` int(11) DEFAULT NULL,
  `course_question_three` int(11) DEFAULT NULL,
  `course_question_four` int(11) DEFAULT NULL,
  `course_question_five` int(11) DEFAULT NULL,
  `comment` varchar(2000) DEFAULT '',
  `course_teacher_id` int(11) DEFAULT NULL,
  `course_rating_active` int(11) DEFAULT '1',
  `rating_date` datetime DEFAULT NULL,
  `vote_count` int(11) DEFAULT '0',
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `ENROLL`;

CREATE TABLE `ENROLL` (
  `enroll_id` int(11) NOT NULL AUTO_INCREMENT,
  `enroll_student_id` int(11) NOT NULL,
  `enroll_class_id` int(11) NOT NULL,
  PRIMARY KEY (`enroll_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `STUDENT`;

CREATE TABLE `STUDENT` (
  `student_id` int(11) NOT NULL,
  `student_lname` varchar(255) DEFAULT NULL,
  `student_fname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `TEACHER`;

CREATE TABLE `TEACHER` (
  `teacher_id` int(11) NOT NULL,
  `teacher_lname` varchar(255) DEFAULT NULL,
  `teacher_fname` varchar(255) DEFAULT NULL,
  `teacher_office` varchar(255) DEFAULT NULL,
  `teacher_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `TEACHER_RATING`;

CREATE TABLE `TEACHER_RATING` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `teacher_question_one` int(11) DEFAULT NULL,
  `teacher_question_two` int(11) DEFAULT NULL,
  `teacher_question_three` int(11) DEFAULT NULL,
  `teacher_question_four` int(11) DEFAULT NULL,
  `teacher_question_five` int(11) DEFAULT NULL,
  `comment` varchar(2000) DEFAULT '',
  `teacher_course_id` int(11) DEFAULT NULL,
  `teacher_rating_active` int(11) DEFAULT '1',
  `rating_date` datetime DEFAULT NULL,
  `vote_count` int(11) DEFAULT '0',
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `VOTES`;

CREATE TABLE `VOTES` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `t_or_c` char(1) DEFAULT NULL,
  `rating_id` int(11) DEFAULT NULL,
  `vote` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
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