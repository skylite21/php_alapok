
-- find customers who like action movies
use sakila;

select customer.customer_id, customer.first_name, customer.last_name
from customer
where customer.customer_id in (

select rental.customer_id
from rental
where rental.inventory_id in (

select inventory.inventory_id
from inventory
where inventory.film_id in (

select film_category.film_id
from film_category
where film_category.category_id in (

select category.category_id
from sakila.category
where category.name = 'Action'
))));

-- the list of all the categories
-- action is id 1
select *
from sakila.category;

-- this table contains which film belongs to which categoty
-- we need all the films of category 1
select *
from sakila.film_category;

-- the inventory contains the film
-- we have the film and we need  all the inventories that has the chosen films
select *
from sakila.inventory;

-- the movie is rented from an inventory (every store has an inventory)
-- we need all the rentals that was made from the chosen inventories
select *
from sakila.rental;

-- every customer is renting movie from a store 
-- we need the names that belong to a given store
select *
from sakila.customer;


-- subuery helyett inner joint is tudunk használni
use sakila;

-- ha joint használunk akkor az összes táblából választhatnánk oszlopokat (amikbol joinolunk)
select distinct customer.customer_id, customer.first_name, customer.last_name
from customer
inner join rental using(customer_id)
inner join inventory using(inventory_id)
inner join film_category using (film_id)
inner join category using (category_id)
where category.name = 'Action'
order by customer.customer_id, customer.first_name, customer.last_name;
