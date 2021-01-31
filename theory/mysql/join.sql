
create table pdo.table1
(id int, value varchar(10));

insert into pdo.table1 (id, value)
values
(1, 'first'),
(2, 'second'),
(3, 'third'),
(4, 'fourth'),
(5, 'fifth');

create table pdo.table2
(id int, value varchar(10));

insert into pdo.table2 (id, value)
values
(1, 'first'),
(2, 'second'),
(3, 'third'),
(6, 'sixth'),
(7, 'secenth'),
(8, 'eighth');

select pdo.t1.*, pdo.t2.*
from pdo.table1 t1
inner join pdo.table2 t2 on t1.id = t2.id;
