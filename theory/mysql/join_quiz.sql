
drop table pdo.student_class;
drop table pdo.students;
drop table pdo.classes;

create table if not exists pdo.students (
  StudentId int not null auto_increment,
  StudentName varchar(50) not null,
  primary key (StudentId)
  );


create table if not exists pdo.classes (
  ClassId int not null auto_increment,
  ClassName varchar(50) not null,
  primary key (ClassId)
  );

create table if not exists pdo.student_class (
  ClassId int not null,
  StudentId int not null,
  foreign key (ClassId) references pdo.classes(ClassId),
  foreign key (StudentId) references pdo.students(StudentId)
);

insert into pdo.students 
(StudentName)
values
('John'),
('Matt'),
('James'),
('Chris');

insert into pdo.classes
(ClassName)
values
('Math'),
('Art'),
('History');


insert into pdo.student_class
(classId, StudentId)
values
(1,1),
(1,2),
(3,1),
(3,2),
(3,3);

select * from pdo.students;
select * from pdo.classes;
select * from pdo.student_class;

-- ki az aki feliratkozott már valamilyen kurzusra
select pdo.classes.ClassName, pdo.students.StudentName
from pdo.student_class
inner join pdo.classes on classes.classId = student_class.classid
inner join pdo.students on students.studentId = student_class.studentId;

-- ha csak a név kell:
select distinct pdo.students.StudentName
from pdo.student_class
inner join pdo.classes on classes.classId = student_class.classid
inner join pdo.students on students.studentId = student_class.studentId;

-- ki iratkozott fel csak matekra
select pdo.students.StudentName
from pdo.student_class
inner join pdo.classes on classes.classId = student_class.classid
inner join pdo.students on students.studentId = student_class.studentId
where ClassName = 'Math';

-- ki nem iratkozott fel semmire
select pdo.students.StudentName, pdo.classes.ClassName
from pdo.students
left join pdo.student_class on student_class.studentId = students.studentId
left join pdo.classes on classes.classId = student_class.classId;

-- ki nem iratkozott fel semmire tényleges...
select pdo.students.StudentName, pdo.classes.ClassName
from pdo.students
left join pdo.student_class on student_class.studentId = students.studentId
left join pdo.classes on classes.ClassId = student_class.ClassId
where pdo.classes.ClassName is null;

-- optimalizáltabb megoldás:
-- ha student id van a bal oldalon és balra join-olunk (left join)
-- akkor minden elem ami bennevan a students-be, az benne lesz a találatokban
-- és minden elem ami bennevan a student_class-ban és a studentsben is, az is benne lesz.
select pdo.students.StudentName, pdo.student_class.ClassId
from pdo.students
left join pdo.student_class on student_class.studentId = students.studentId
where pdo.student_class.ClassId is null;

select pdo.students.StudentName
from pdo.students
left join pdo.student_class on student_class.studentId = students.studentId
where pdo.student_class.ClassId is null;

-- mik a fel nem vett tárgyak?


