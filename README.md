## Setup

- Clone repository. (Do not fork.)
- Copy .env.example to .env and configure database settings.
- Run the following commands to get a functional and seeded application:
  ```
  composer install
  php artisan key:generate
  php artisan migrate:fresh
  php artisan db:seed
  npm install
  npm run dev
  php artisan serve
  ```

## Code Challenges

The objectives outlined below should be completed and any resulting code should follow the code style of the project and have doc-blocks where applicable.

- Modified Owners table to include columns for number of addresses and cars associated with each owner.
- Modified Addresses table to include concatenated owner name and number of cars associated with each address.
- Modified Cars table to include concatenated owner name and address associated with each car.


- Build simple and reusable view/edit Vue.js components for owners, addresses, and cars and linked them to the action buttons in each table. The displayed data includes associated entities. (Addresses and cars for the owner. Owner and cars for the address. Owner and address for the car.)
- Build a simple and reusable delete Vue.js component for owners, addresses, and cars. This also include a confirmation prompt.


- Created a route for owners that uses the DB facade (not Eloquent) to return the average number of addresses and cars, respectively, per user and added a component that    displays the information above the table on the owners page.
- Created a route for addresses that uses the DB facade (not Eloquent) to return the average number of cars per address and added a component that displays the information above the table on the addresses page.
