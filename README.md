
<h3>This repository contains a CRUD RESTful API along with an Web Application which is built around this API. </h3>

<h1>All File details : </h1>

<strong>[API] </strong>
 <p><a href="">“php_rest_api_arnab/api/events.php”</a></p>
<br>
<strong>[WEB APP – FrontEnd]</strong>
  <p><a href="">“php_rest_api_arnab/application/index.php”</a></p>
  <p><a href="">“php_rest_api_arnab/application/create.php”</a></p>
  <p><a href="">“php_rest_api_arnab/application/edit.php”</a></p>
  <p><a href="">“php_rest_api_arnab/application/delete.php”</a></p>
<br>
<strong>[WEB APP – BackEnd]</strong>
  <p><a href="">“php_rest_api_arnab/application/backend/form_handle.php”</a></p>
<br>
<strong>[Database Configuration File]</strong>
  <p><a href="">“php_rest_api_arnab/config/connection.php”</a></p>
<br>
<strong>[WEB APP – CSS Stylesheet]</strong>
  <p><a href="">“php_rest_api_arnab/styles.css”</a></p>
<br>
<strong>[MySQL Database Import File]</strong>
  <p><a href="">“php_rest_api_arnab/php_rest_api.sql”</a></p>
<br>

<h1>How to run the project:</h1>


<strong>Requirements – </strong>

1. XAMPP [PHP & MYSQL]
2. Internet Browser [Firefox or else]
3. Postman [Optional : For API testing]

<strong>Configuration Instructions – </strong>

1. Copy and paste the folder “php_rest_api_arnab”  inside the “htdocs” folder of xampp installation directory.
2. Create a database on MySQL named “php_rest_api”. MySQL database should have default user credentials such as username = ‘root’ & password = ‘’.
3. Create a table on that database named “events_table” which should contain 3 columns named “Name”, “Location” & “DateTime” along with a primary key named “id”. [For ease,      just import the provided database sql file to the “php_rest_api” database].
4. Open Browser and copy paste this link http://localhost/php_rest_api_arnab/application/index.php to view the homepage of the web app.
5. Open this link http://localhost/php_rest_api_arnab/application/create.php or click on “Create” from the homepage to create a new event.
6. Click on “Edit” to update an existing event record.
7. Click on “Delete” to delete an existing event record.

