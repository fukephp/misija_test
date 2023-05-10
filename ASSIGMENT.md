### Background
Task is to build a RESTful API for a hypothetical e-commerce platform that sells products and tracks orders. The platform has the following database tables:
- `products`: stores product information, including name, description, price, and availability.
- `orders`: stores information about the orders, including customer information, shipping address, and payment status.
- `order_items`: stores information about the items in each order, including the product ID, quantity, and price.
Generate sample data and seed it (at least 100+ items)

### Requirements
Your task is to implement the following endpoints for the API:
- `GET /products`: returns a list of all products, sorted by name in ascending order.
- `GET /products/{id}`: returns the details of a single product, identified by the product ID.
- `GET /orders`: returns a list of all orders, sorted by date in descending order.
- `GET /orders/{id}`: returns the details of a single order, identified by the order ID.
- `POST /orders`: creates a new order. The request body should contain the customer information, shipping address, and a list of order items. The response should include the newly created order ID.
- `PUT /orders/{id}`: updates an existing order. The request body should contain the updated customer information, shipping address, and/or payment status.
- `DELETE /orders/{id}`: deletes an existing order.
- 'GET /dashboard': returns a total sales amount, top-selling products, and best customer (who purchased most) in the specific period with options to change the range of dates
- 'GET /search/{query}': returns search results grouped by product, orders, or customers for a search query
It would be best if you implemented the API using the latest Laravel, PHP 8 or higher, and MySQL 8. You are welcome to use any other libraries or packages as you need them.

Your code should be well-structured, clean, and easy to maintain. You should follow the PSR-12 coding style guide and write clear and concise documentation for the API.

### Deliverables
You should deliver your code no later than 17.30 in a GitHub repository that includes:
- A `README.md` file that explains how to set up and run the API, and includes documentation for each endpoint.
- The Laravel project code that implements the API, including any necessary database migrations, seeders, and factories.
- A `database.sql` file that includes the schema for the database and any sample data.
You should also include a Postman Collection demonstrating how to use each endpoint.
