# myDiscogsSellerInventory

simple, all-php app to make queries in my database, which is built on CSV files from my Discogs seller Inventory

as a learning Web developer, and a Discogs seller, I wanted to play with my DB and update it at each new order

in the beginning my tables were : "inventory", "orders_items", "orders", after the CSV files

I had to change a few settings in the DB, such as some fields length, and add a "country" field to make more stats

some columns I didn't need have been deleted

a function had to be created to set buyer's country by copying/pasting his shipping address in the form

also, I created the "temp" table which made my work easier to set many items 'Sold' all at once

last table I had to create was the "users" one, before deploying this app, for the minimum required security

(i.e. so that anyone can't changes values in my DB)

next step : allow everyone to upload his csv files and browse his own seller stats

or perhaps make it possible to connect with discogs account and directly access seller stats through Discogs API

certainly will use a framework for this purpose, such as Symfony for exemple 

unless I build this app again from scratch, with a different language / techno ?

...working on it, maybe when I get my graduation and have a little more time
