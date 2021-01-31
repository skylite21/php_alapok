
create table if not exists pdo.actor_sample (
  actor_id smallint(5) unsigned not null auto_increment,
  first_name varchar(45) not null,
  last_name varchar(45) null,
  -- if we do not specify anything here, it will be automatically current timestamp
  last_update timestamp not null default current_timestamp
    on update current_timestamp,
  primary key (actor_id)
);

insert into pdo.actor_sample
(first_name, last_name, last_update)
values
('John', 'Smith', '2013-12-23');

select * from pdo.actor_sample;

-- if we do not specify the columns, we need to specify every column in the correct order...
insert into pdo.actor_sample
values
(default, 'John', 'Smith', '2013-12-24');


-- last_update has a default value so it will be used...
insert into pdo.actor_sample
(first_name, last_name)
values
('Stan', 'Smith');

-- first_name is specified, last_name will be null..
insert into pdo.actor_sample
(first_name)
values
('Stan');

-- last_name is NOT NULL which means it has to have a value
insert into pdo.actor_sample
(last_name)
values
('Smith');

-- insert with select
insert into pdo.actor_sample (first_name, last_name)
select first_name, last_name from pdo.users
where last_name = 'Lengyel'; 

select * from pdo.actor_sample;

update pdo.actor_sample
set first_name = 'Hayley'
where actor_id = 2;

update pdo.actor_sample
set first_name = 'András',last_name='Kovács'
where actor_id = 2;

update pdo.actor_sample
set first_name = 'Anonymous'
where actor_id in (2, 3, 4);

-- update based on subqery
update pdo.actor_sample
set first_name = 'XXX'
where actor_id in (select id from pdo.users where user_name = 'skylite');

delete from pdo.actor_sample
where actor_id = 1;

-- subquery would also work...
delete from pdo.actor_sample
where actor_id in (2, 3, 4);
