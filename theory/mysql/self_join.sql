

create table pdo.employee (
EmployeeID int primary key,
Name varchar(50),
ManagerId int
);

insert into pdo.employee 
(employeeID, name, managerid)
values
(1, 'Mike', 3),
(2, 'David', 3),
(3, 'Roger', Null),
(4, 'Marry', 2),
(5, 'Joseph', 2),
(6, 'Ben', 2);

select * from pdo.employee;


-- mindenkinek kiiratjuk a managerét... a táblát saját magával joinoljuk
-- muszáj aliasokat használni
select e1.name as EmployeeName, e2.name as ManagerName
from pdo.employee as e1
inner join pdo.employee as e2
on e1.managerid = e2.employeeID;

-- ha left joint csinálunk Roger is bekerül, de mivel ő a top manager
-- ennek adhatunk szép értéket is
select e1.name as EmployeeName, ifnull(e2.name, 'TopManager') as ManagerName
from pdo.employee as e1
left join pdo.employee as e2
on e1.managerid = e2.employeeID;
