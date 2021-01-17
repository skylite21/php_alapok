-- npm install -g sql-lint
-- coc install coc-db
-- :DBUIFindBuffer
-- execute visual selected query: \S
-- https://github.com/kristijanhusak/vim-dadbod-ui
-- to run this in the cli:  mysql pdo < demo.sql

create database if not exists pdo;

-- unsigned: limits the stored data to positive numbers and zero
create table if not exists rates (
  rental_rate int,
  id int unsigned auto_increment primary key
);

insert into rates
(rental_rate)
values
(100);

create table if not exists users (
  first_name varchar(50) not null,
  last_name varchar(50) not null,
  user_name varchar(50),
  id int unsigned auto_increment primary key
);

select first_name, last_name
from users
order by first_name desc;

select first_name, last_name
from users
where id > 10;


select first_name, last_name
from users
-- we could also use first_name > 'Peter' which means alphabetically after Peter
where first_name = 'Zsolt'
order by first_name desc;

-- empty result set
select first_name, last_name
from users
-- one = means equality comparsion, <> means not equal, but != also works
where 1 = 2;

-- aritmetic experssions are always best to use with parentheses () to avoid confusion

select first_name as FirstName
from users;

create table if not exists movies (
  duration int,
  id int unsigned auto_increment primary key
);


select duration/60 as TimeInHour
from movies;

select (CAST(rental_rate as float) * 1.27) / 2 as TimeInHour from rates;

create table if not exists payment (
  amount int,
  created DATETIME,
  id int unsigned auto_increment primary key
);

insert into payment (amount, created) values (233, '2020-01-1-23-23');
insert into payment (amount, created) values (233, curdate());
insert into payment (amount, created) values (233, now());

-- floor, ceiling etc...
select round(amount) from pdo.payment;

select concat(first_name, ' ', last_name) as FullName
from users;

-- other string functions like reverse, replace are also possible...
-- https://dev.mysql.com/doc/refman/8.0/en/string-functions.html
select concat(left(first_name, 1), ' ', left(last_name, 1)) as Monogramm
from pdo.users;

-- https://dev.mysql.com/doc/refman/8.0/en/date-and-time-functions.html#function_date-format
select amount,
  date_format(created, '%Y, %b, %d - %T: %f') as TheDate
from pdo.payment;

select amount FROM payment where created between '2020-12-01' and '2020-01-01 12:59:59';
select amount FROM pdo.payment where created between '2020-12-01' and now();

-- specific date format
select amount,
  date_format(created, get_format(date, 'ISO')) as TheDate
from pdo.payment;

-- various useful date functions
select created,
  DAYOFWEEK(created) as DayOfWeek,
  QUARTER(created) as Quarter,
  WEEK(created) as WeekOfTheYear,
  MONTHNAME(created) as MonthName
  from pdo.payment;

-- distinct = unique values only
select rental_rate from pdo.rates;
select distinct rental_rate from pdo.rates;
select count(distinct rental_rate) from pdo.rates;
select count(rental_rate) from pdo.rates;

-- When in doubt, use parenthesis! 
-- https://dev.mysql.com/doc/refman/8.0/en/operator-precedence.html
select * from pdo.rates
  where rental_rate = 100 and id < 5 or id > 20
