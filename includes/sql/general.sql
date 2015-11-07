create table STUDENT(
    student_id    int NOT NULL,
    student_lname varchar(255),
    student_fname varchar(255),
    primary key(student_id));
create table DEPARTMENT(
    department_id   int NOT NULL,
    department_head varchar(255),
    department_name varchar(255),
    primary key(department_id));
create table TEACHER(
    teacher_id            int NOT NULL,
    teacher_lname         varchar(255),
    teacher_fname         varchar(255),
    teacher_office        varchar(255),
    teacher_email         varchar(255),
    teacher_department_id int NOT NULL,
    primary key(teacher_id),
    foreign key(teacher_department_id) references TEACHER(teacher_id));
create table COURSE(
    course_id            int NOT NULL,
    course_name          varchar(255),
    course_label         varchar(255),
    course_department_id int NOT NULL,
    primary key(course_id),
    foreign key(course_department_id) references DEPARTMENT(department_id));
create table CLASS(
    class_id         int NOT NULL,
    class_teacher_id int NOT NULL,
    class_course_id  int NOT NULL,
    class_name       varchar(255),
    primary key(class_id),
    foreign key(class_teacher_id) references TEACHER(teacher_id),
    foreign key(class_course_id) references COURSE(course_id));
create table ENROLL(
    enroll_id         int NOT NULL,
    enroll_student_id int NOT NULL,
    enroll_class_id   int NOT NULL,
    primary key(enroll_id),
    foreign key(enroll_student_id) references STUDENT(student_id),
    foreign key(enroll_class_id) references CLASS(class_id));
create table CLASS_RATING(
    class_rating_id         int NOT NULL,
    class_rating_student_id int NOT NULL,
    class_rating_class_id   int NOT NULL,
    primary key(class_rating_id),
    foreign key(class_rating_student_id) references STUDENT(student_id),
    foreign key(class_rating_class_id) references CLASS(class_id));
create table COURSE_RATING(
    course_rating_id         int NOT NULL,
    course_rating_student_id int NOT NULL,
    course_rating_course_id  int NOT NULL,
    primary key(course_rating_id),
    foreign key(course_rating_student_id) references STUDENT(student_id),
    foreign key(course_rating_course_id) references COURSE(course_id));