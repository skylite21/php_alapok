
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

-- a natural join ugyanaz mint a sima, csak itt automatikusan ki van választva
-- a közös oszlop ami jelen esetben az ID. (mindkét táblában vannak ID fieldek)

-- In a natural join, all the source table columns that have the same name are
-- compared with each other for equality.
select pdo.table1.id as T1ID, pdo.table1.value as T1Value,
      pdo.table2.id as T2ID, pdo.table2.value as T2Value
from pdo.table1 
natural join pdo.table2;


select pdo.table1.id as T1ID, pdo.table1.value as T1Value,
      pdo.table2.id as T2ID, pdo.table2.value as T2Value
from pdo.table1 
natural left join pdo.table2;

select pdo.table1.id as T1ID, pdo.table1.value as T1Value,
      pdo.table2.id as T2ID, pdo.table2.value as T2Value
from pdo.table1 
natural right join pdo.table2;
