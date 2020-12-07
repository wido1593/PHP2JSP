select count(*) from product;
select product.*, country.name as country_name, city.name as city_name, flight.name as flight_name
		 from ((product left join country on product.country_no=country.no)
		 left join city on product.city_no=city.no)
		 left join flight on product.flight_no=flight.no
		 where product.price between '100000' and '5000000';