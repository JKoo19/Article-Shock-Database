# Article-Shock-Database

A basic interface that contains a database of authors and their essays on finance and economics, economic shocks, and also tables that relate all of these other tables together.

## Usage

The interface allows for addition and search functionalities for each table. It would only work, of course, with the corresponding database which is hosted on servers hosted by the Northwestern University Pritzker School of Law. The "connection.php" file must be linked to the correct address of the database server for access to be established.

## Functionalities
The addition functionality of each table takes users to an interface to fill out the necessary information for a new entry. There are some fields that require information and will not allow the user to add an entry without first being filled out.

```
*First Name
```
The asterisk next to a field name indicates when that field is required.


The querying functionality looks through a table, using the given key word. It will find string matches that exists in any field within the table and return all of the rows that satisfy the search condition. The user can then easily run another search from the results page or return to the original table.
```
Searching for "ch" will return, for example, author names such as "Chelsea" or even "Richard."
```

## Built With
HTML
CSS
PHP
PDO (http://php.net/manual/en/book.pdo.php)
SQL

## Authors
Joshua Koo

## Acknowledgments
Bernard Black
Vladimir Atanasov
