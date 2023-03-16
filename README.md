# CRM-based-on-PHP-engine

This is an old attempt to build a CRM on PHP. It is fully workable but archaic.

## File Structure

- `admin`: Folder for admin-related files.
- `comp`: Folder for component files.
- `css`: Folder for CSS files.
- `images`: Folder for image files.
- `lib`: Folder for library files.
- `tmpl`: Folder for template files.
- `functions.php`: File containing functions used for the project.
- `index.php`: File containing the main PHP code.
- `start.php`: File used to initialize the project.

## Customer Faced Functions

- `add_cart`: Function to add an item to the cart.
- `delete_cart`: Function to delete an item from the cart.
- `cart`: Function to update the cart.
- `order`: Function to add an order.
- `success_pay`: Function to process a successful payment.
- `fail_pay`: Function to process a failed payment.
- `status_pay`: Function to check the status of a payment.

## Example of archticture and logic based on Admin Functionality

This site includes an admin section that allows authorized users to manage products, sections, orders, and coupons. The admin section is implemented in PHP and the functionality is defined in the `functions.php` file located in the `admin` folder.

### Authentication

To access the admin section, users must first authenticate by entering a valid username and password. The authentication functionality is implemented in the `auth.php` file and the authentication process is initiated when the user submits the login form.

### Managing Products

Authorized users can add, edit, and delete products from the site's inventory. The functionality to manage products is implemented in the `ManageAdmin` class and includes the following methods:

- `addProduct()`: Adds a new product to the inventory.
- `editProduct()`: Updates the details of an existing product.
- `deleteProduct()`: Removes a product from the inventory.

### Managing Sections

Authorized users can also manage the site's sections, which are categories used to organize products. The functionality to manage sections is implemented in the `ManageAdmin` class and includes the following methods:

- `addSection()`: Adds a new section to the site.
- `editSection()`: Updates the details of an existing section.
- `deleteSection()`: Removes a section from the site.

### Managing Orders

Authorized users can view and manage customer orders placed on the site. The functionality to manage orders is implemented in the `ManageAdmin` class and includes the following methods:

- `addOrder()`: Adds a new order to the system.
- `editOrder()`: Updates the details of an existing order.
- `deleteOrder()`: Removes an order from the system.

### Managing Coupons

Authorized users can create and manage coupon codes for the site. The functionality to manage coupons is implemented in the `ManageAdmin` class and includes the following methods:

- `addCoupone()`: Adds a new coupon code to the site.
- `editCoupone()`: Updates the details of an existing coupon code.
- `deleteCoupone()`: Removes a coupon code from the site.

### Authorization and Access Control

The `Auth` class is used to authenticate users and check if a user is authorized to access the admin section. The `checkAdmin()` method of the `Auth` class is used to check if a user has the necessary credentials to access the admin section. If a user is not authorized, they will be redirected to the login page.

### URL Management

The `URLAdmin` class is used to manage URLs for the admin section of the site. It includes methods to generate URLs for the different pages in the admin section.

### Functionality Implementation

The functionality of the admin section is implemented in the `functions.php` file located in the `admin` folder. The file includes the main logic to route incoming requests and execute the appropriate functionality based on the request parameter specified.


## Getting Started

To deploy this solution on a local server, follow these steps:

1. Clone this repository using the command: `git clone https://github.com/USERNAME/CRM-based-on-PHP-engine.git`
2. Install a local web server such as XAMPP, WAMP or MAMP.
3. Copy the repository files to the web server root directory.
4. Import the database file `db.sql` to a new database using PHPMyAdmin or other database management tool.
5. Open the `start.php` file and change the database connection settings to match your local server configuration.
6. Open a web browser and navigate to `http://localhost/CRM-based-on-PHP-engine` to view the project.
