# SSP Book Store

Welcome to the SSP Book Store project repository! This project is an online bookstore website with dynamic forms, secure user authentication, and an interactive UI. The website is built using HTML, CSS, Bootstrap, JavaScript, PHP, and MySQL.

## Current Features

1. **Dynamic Form:**
   - Restrictions for phone number, Aadhar card, and PAN card.
   - Ability to upload documents in different formats.
   - Dynamic country, state, and city dropdowns:
     - Initially, only the country dropdown is enabled.
     - State and city dropdowns are disabled until a country is selected.

2. **User Authentication:**
   - Login and Sign Up pages.
   - Intermediate "Enter Email and Password" page after signup.

## Technologies Used

- HTML
- CSS
- Bootstrap
- JavaScript
- PHP
- MySQL

## Installation

To run the SSP Book Store website locally, follow these steps:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Utkarsh1244p/SSP-Book-Store-Website.git

2. **Navigate into the project directory:**

   ```bash
   cd ssp-book-store

3. **Set up the MySQL database:**

   - Ensure MySQL is installed and running on your machine.
   - Create a new database named book_store(which i will provide later).
   - This database contain users table which has 4 columns viz. id, city, state, country
   ```bash
   create table users(
   id primary key auto_increment,
   city varchar(50),
   state varchar(50),
   country varchar(50)
   );

4. **Configure the database connection:**

   - Update the database connection settings in the PHP configuration file to match your local setup.

5. **Run the website:**

   - Use a local server environment like XAMPP or WAMP to serve the PHP files.
   - Open your browser and navigate to the provided local server URL (e.g., http://localhost/ssp-book-store) to view the website.

## Work Needed

1. **Creating More Pages:**

   - Implement additional pages as needed (e.g., user profile, product listings, product details, checkout).

2. **Adding CSS and Styles:**

   - Enhance the visual appearance of the website with additional CSS and styles.
  
3. **Encryption:**

   - Implement encryption for sensitive data such as passwords, Aadhar numbers, and PAN card numbers


