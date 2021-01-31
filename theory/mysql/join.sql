
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

-- https://i.stack.imgur.com/VQ5XP.png


-- minden sor ahol az id-k a két táblában megegyeznek (union..)
select pdo.table1.*, pdo.table2.*
from pdo.table1
inner join pdo.table2 on table1.id = table2.id;

-- aliassal
select pdo.t1.*, pdo.t2.*
from pdo.table1 t1
inner join pdo.table2 t2 on t1.id = t2.id;

select pdo.t1.value as T1Value , pdo.t2.value as T2Value
from pdo.table1 t1
inner join pdo.table2 t2 on t1.id = t2.id;

-- minden ami table1 és ami table2+table1ben is benne van
select pdo.t1.value as T1Value
from pdo.table1 t1
left outer join pdo.table2 t2 on t1.id = t2.id;

select pdo.t1.value as T1Value
from pdo.table1 t1
right outer join pdo.table2 t2 on t1.id = t2.id;

-- a right join ugyanez és egyiket a másikkal is ki lehet fejezni
-- általában a left jobb mert balról jobbra gondolkodunk
select pdo.t2.value as T1Value
from pdo.table1 t1
right outer join pdo.table2 t2 on t1.id = t2.id;

-- full outer join (egy left és egy right.. egybe)
select * from pdo.table1
left join pdo.table2 on pdo.table1.id = pdo.table2.id
union all
select * from pdo.table1
right join pdo.table2 on pdo.table1.id = pdo.table2.id
where pdo.table1.id is null


create table pdo.table_a
(id int, value varchar(10));

insert into pdo.table_a (id, value)
values
(1, 'a1'),
(2, 'a2'),
(3, 'a3'),
(4, 'a4'),
(5, 'a5');

create table pdo.table_b
(id int, value varchar(10));

insert into pdo.table_b (id, value)
values
(1, 'b1'),
(2, 'b2'),
(3, 'b3'),
(4, 'b4'),
(5, 'b5'),
(6, 'b6');

-- az a oszlop összes sorát összepárosítja a b oszlop összes sorával
select pdo.table_a.*, pdo.table_b.*
from pdo.table_a
cross join pdo.table_b;

