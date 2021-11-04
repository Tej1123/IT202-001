IT 202 Project Proposal

Project Name: Simple Shop
Project Summary: This project will create a simple e-commerce site for users. Administrators or store owners will be able to manage inventory and users will be able to manage their cart and place orders.
Github Link:
Website Link:
Your Name:

Milestone Features:
	Milestone 1:
User will be able to register a new account
Form Fields
Username, email, password, confirm password (other fields optional)
Email is required and must be validated
Username is required
Confirm password’s match
Users Table
Id, username, email, password (60 characters), created, modified
Password must be hashed (plain text passwords will lose points)
Email should be unique
Username should be unique
System should let user know if username or email is taken and allow the user to correct the error without wiping/clearing the form
The only fields that may be cleared are the password fields
User will be able to login to their account (given they enter the correct credentials)
Form
User can login with email or username
This can be done as a single field or as two separate fields
Password is required
User should see friendly error messages when an account either doesn’t exist or if passwords don’t match
Logging in should fetch the user’s details (and roles) and save them into the session.
User will be directed to a landing page upon login
This is a protected page (non-logged in users shouldn’t have access)
This can be home, profile, a dashboard, etc
User will be able to logout
Logging out will redirect to login page
User should see a message that they’ve successfully logged out
Session should be destroyed (so the back button doesn’t allow them access back in)
Basic security rules implemented
Authentication:
Function to check if user is logged in
Function should be called on appropriate pages that only allow logged in users
Roles/Authorization:
Have a roles table (see below)
Basic Roles implemented
Have a Roles table	(id, name, description, is_active, modified, created)
Have a User Roles table (id, user_id, role_id, is_active, created, modified)
Include a function to check if a user has a specific role (we won’t use it for this milestone but it should be usable in the future)
Site should have basic styles/theme applied; everything should be styled
I.e., forms/input, navigation bar, etc
Any output messages/errors should be “user friendly”
Any technical errors or debug output displayed will result in a loss of points
User will be able to see their profile
Email, username, etc
User will be able to edit their profile
Changing username/email should properly check to see if it’s available before allowing the change
Any other fields should be properly validated
Allow password reset (only if the existing correct password is provided)
Hint: logic for the password check would be similar to login
	Milestone 2:
User with an admin role or shop owner role will be able to add products to inventory
Table should be called Products (id, name, description, category, stock, created, modified, unit_price, visibility [true, false])
Any user will be able to see products with visibility = true on the Shop page
Product list page will be public (i.e. doesn’t require login)
For now limit results to 10 most recent
User will be able to filter results by category
User will be able to filter results by partial matches on the name
User will be able to sort results by price
Admin/Shop owner will be able to see products with any visibility
This should be a separate page from Shop, but will be similar
This page should only be accessible to the appropriate role(s)
Admin/Shop owner will be able to edit any product
Edit button should be accessible for the appropriate role(s) anywhere a product is shown (Shop list, Product Details Page, etc)
User will be able to click an item from a list and view a full page with more info about the item (Product Details Page)
User must be logged in for any Cart related activity below
User will be able to add items to Cart
Cart will be table-based (id, product_id, user_id, desired_quantity, unit_cost, created, modified)
Adding items to Cart will not affect the Product's quantity in the Products table
User will be able to see their cart
List all the items
Show subtotal for each line item based on desired_quantity * unit_cost
Show total cart value (sum of line item subtotals)
Will be able to click an item to see more details (Product Details Page)
User will be able to change quantity of items in their cart
Quantity of 0 should also remove from cart
User will be able to remove a single item from their cart vai button click
User will be able to clear their entire cart via a button click
	Milestone 3:
User will be able to purchase items in their Cart
Create an Orders table (id, user_id, created, total_price, address, payment_method)
Payment method will simply record (Cash, Visa, MasterCard, Amex, etc) We will not be recording CC numbers or anything of that nature, this is just a sample and in real world projects you’d commonly use a third party payment processor
Hint: This must be inserted first before you can insert into the OrderItems table
Create an OrderItems table (id, order_id, product_id, quantity, unit_price)
Hint: This is basically a copy of the data from the Cart table, just persisted as a purchase
Checkout Form
Ask for payment method (Cash, Visa, MasterCard, Amex, etc)
Do not ask for credit card number, this is just a sample
Ask for a numerical value to be entered (this will be a fake payment check to compare against the cart total to determine if the payment succeeds)
Ask for Address/shipping information
User will be asked for their Address for shipping purposes
Address form should validate correctly
Use this as a rough guide (likely you’ll want to prefill some of the data you already have about the user)

Order process:
Calculate Cart Items
Verify the current product price against the Products table
Since our Cart is table based it can be long lived so if a user added a Product at a sale and they attempt to purchase afterwards, it should pull the true Product cost.
You can also show the Cart.unit_price vs Product.unit_price to show a sale or an increase in price
Verify desired product and desired quantity are still available in the Products table
Users can’t purchase more than what’s in stock
Show an error message and prevent order from going through if something isn’t available
Let the user update their cart and try again
Clearly show what the issue is (which product isn’t available, how much quantity is available if the cart exceeds it)
Make an entry into the Orders table
Get last Order ID from Orders table
Copy the cart details into the OrderItems tables with the Order ID from the previous step
Update the Products table Stock for each item to deduct the Ordered Quantity
Clear out the user’s cart after successful order
Redirect user to Order Confirmation Page
Order Confirmation Page
Show the entire order details from the Order and OrderItems table (similar to cart)
Displays a Thank you message
User will be able to see their Purchase History
For now limit to 10 most recent orders
A list item can be clicked to view the full details in the Order Details Page (similar to Order Confirmation Page except no “Thank you” message)
Store Owner will be able to see all Purchase History
For now limit to 10 most recent orders
A list item can be clicked to view the full details in the Order Details Page (similar to Order Confirmation Page except no “Thank you” message)
	Milestone 4:
User can set their profile to be public or private (will need another column in Users table)
If public, hide email address from other users
User will be able to rate a product they purchased
Create table called Ratings (id, product_id, user_id, rating, comment, created)
1-5 rating
Text Comment (use TEXT data type in sql)
Must be done on the Product Details Page
Ratings and Rating Comments will be visible on the Product Details page
Show the latest 10 reviews
Paginate anything beyond 10
Show the average rating on the Product Details Page
User’s Purchase History Changes
Filter by date range
Filter by category
Sort by total, date purchased, etc
Add pagination
Any filter/sort applied must be followed during the pagination process
Store Owner Purchase History Changes
Filter by Date Range
Filter by Category
Sort by total, date purchased, etc
Add pagination
Any filter/sort applied must be followed during the pagination process
The result page should show the accurate total price of the combined search results (i.e., if just 3 records show each of $25, it should show $75 total for this view)
Add pagination to Shop Page (and any other product lists not yet mentioned)
Store Owner will be able to see all products out of stock
This will be added as a filter to their product list page from Milestone 2
Pagination should account for this new filter
Recommended to have the filter applied as a given value (i.e., where quantity is <= value)
User can sort products by average rating on the Shop Page
Hint: may want to add an “average rating” field to the Products table and update this value any time a new rating is given for the product
