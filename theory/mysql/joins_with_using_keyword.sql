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

-- a using keyword lényegében egy shortcutja a feltétel megadásnak amikor
-- joinolunk de persze csak akkor jó ha ugyanaz a column név mindkét táblában
select pdo.table1.id as T1ID, pdo.table1.value as T1Value,
      pdo.table2.id as T2ID, pdo.table2.value as T2Value
from pdo.table1 
inner join pdo.table2 on pdo.table1.id = pdo.table2.id;

select pdo.table1.id as T1ID, pdo.table1.value as T1Value,
      pdo.table2.id as T2ID, pdo.table2.value as T2Value
from pdo.table1 
inner join pdo.table2 using(id);

select pdo.table1.id as T1ID, pdo.table1.value as T1Value,
      pdo.table2.id as T2ID, pdo.table2.value as T2Value
from pdo.table1 
inner join pdo.table2 on pdo.table1.id = pdo.table2.id and pdo.table1.value = pdo.table2.id;

-- két vizsgálat esetén már ez röbidebb sokkal:
select pdo.table1.id as T1ID, pdo.table1.value as T1Value,
      pdo.table2.id as T2ID, pdo.table2.value as T2Value
from pdo.table1 
inner join pdo.table2 using(id, value);
