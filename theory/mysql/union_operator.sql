
drop table pdo.table1;
drop table pdo.table2;

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
(7, 'seventh'),
(8, 'eighth');

-- the header of the table is always the first select. 
select pdo.table1.id as T1ID, pdo.table1.value as T1Value
from pdo.table1
union
select pdo.table2.id as T2ID, pdo.table2.value as T2Value
from pdo.table2

-- union all displays the duplicates as well.
select pdo.table1.id as T1ID, pdo.table1.value as T1Value
from pdo.table1
union all
select pdo.table2.id as T2ID, pdo.table2.value as T2Value
from pdo.table2

-- error
-- the number of tables should be the same.
select pdo.table1.id as T1ID
from pdo.table1
union all
select pdo.table2.id as T2ID, pdo.table2.value as T2Value
from pdo.table2

-- full outer join (egy left és egy right.. egybe)
select * from pdo.table1
left join pdo.table2 on pdo.table1.id = pdo.table2.id
union all
select * from pdo.table1
right join pdo.table2 on pdo.table1.id = pdo.table2.id
where pdo.table1.id is null
