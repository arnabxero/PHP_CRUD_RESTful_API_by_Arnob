

<h3>This repository contains a CRUD RESTful API along with an Web Application which is built around this API. </h3>
<code><small><i>Copyright © by Eftakhar Ahmed Arnob</i></small></code>
<h1>All File details : </h1>

<strong>[API] </strong>
 <p><a href="https://github.com/arnabxero/PHP_CRUD_RESTful_API_by_Arnob/blob/main/php_rest_api_arnab/api/events.php">“php_rest_api_arnab/api/events.php”</a></p>
<br>
<strong>[WEB APP – FrontEnd]</strong>
  <p><a href="https://github.com/arnabxero/PHP_CRUD_RESTful_API_by_Arnob/blob/main/php_rest_api_arnab/application/index.php">“php_rest_api_arnab/application/index.php”</a> - List of events page UI</p>
  <p><a href="https://github.com/arnabxero/PHP_CRUD_RESTful_API_by_Arnob/blob/main/php_rest_api_arnab/application/create.php">“php_rest_api_arnab/application/create.php”</a> - Create an event page UI</p>
  <p><a href="https://github.com/arnabxero/PHP_CRUD_RESTful_API_by_Arnob/blob/main/php_rest_api_arnab/application/edit.php">“php_rest_api_arnab/application/edit.php”</a> - Edit an event page UI</p>
  <p><a href="https://github.com/arnabxero/PHP_CRUD_RESTful_API_by_Arnob/blob/main/php_rest_api_arnab/application/delete.php">“php_rest_api_arnab/application/delete.php”</a> - Delete an event page UI</p>
<br>
<strong>[WEB APP – BackEnd]</strong>
  <p><a href="https://github.com/arnabxero/PHP_CRUD_RESTful_API_by_Arnob/blob/main/php_rest_api_arnab/application/backend/form_handle.php">“php_rest_api_arnab/application/backend/form_handle.php”</a></p>
<br>
<strong>[Database Configuration File]</strong>
  <p><a href="https://github.com/arnabxero/PHP_CRUD_RESTful_API_by_Arnob/blob/main/php_rest_api_arnab/config/connection.php">“php_rest_api_arnab/config/connection.php”</a></p>
<br>
<strong>[WEB APP – CSS Stylesheet]</strong>
  <p><a href="https://github.com/arnabxero/PHP_CRUD_RESTful_API_by_Arnob/blob/main/php_rest_api_arnab/application/css/styles.css">“php_rest_api_arnab/styles.css”</a></p>
<br>
<strong>[MySQL Database Import File]</strong>
  <p><a href="https://github.com/arnabxero/PHP_CRUD_RESTful_API_by_Arnob/blob/main/php_rest_api_arnab/php_rest_api.sql">“php_rest_api_arnab/php_rest_api.sql”</a></p>
<br>

<h1>How to run the project:</h1>


<h2><strong>🟨Requirements🟨</strong></h2>

1. XAMPP [PHP & MYSQL]
2. Internet Browser [Firefox or else]
3. Postman [Optional : For API testing]

<h2><strong>🟥Configuring and Running the Web App🟥</strong></h2>

1. Copy and paste the folder “php_rest_api_arnab”  inside the “htdocs” folder of xampp installation directory.
2. Create a database on MySQL named “php_rest_api”. [MySQL database should have default user credentials such as username = ‘root’ & password = ‘’.]
3. Create a table on that database named “events_table” which should contain 3 columns named “Name”, “Location” & “DateTime” along with a primary key named “id”. [For ease,      just import the provided database sql file to the “php_rest_api” database].
4. Open Browser and copy paste this link http://localhost/php_rest_api_arnab/application/index.php to view the homepage of the web app.
5. Open this link http://localhost/php_rest_api_arnab/application/create.php or click on “Create” from the homepage to create a new event.
6. Click on “Edit” to update an existing event record.
7. Click on “Delete” to delete an existing event record.


<br><hr>
<h1>Optional : Direct API Testing</h1>
<strong>For API Testing – </strong>

1. Open Postman Software. Enter link http://localhost/php_rest_api_arnab/api/events.php?page[number]=1&page[size]=5 and method GET, then submit. Modify page[number] and page[size] to test the API.

2. To get a single entry, enter the link http://localhost/php_rest_api_arnab/api/events.php?id=5 or enter the link http://localhost/php_rest_api_arnab/api/events.php with a http body = 
    <code>{
    "id": "5"
}</code> and method GET on POSTMAN.
This will return a single entry with the key 'id'. Change 'id' to test the API.

3. To create an entry, put this link http://localhost/php_rest_api_arnab/api/events.php and provide a http body as like this =  <code>{
    "name": "EventName",
    "location": "EventLocation",
    "date": "EventDateTime"
}</code> and method POST on POSTMAN.
This will create a new entry.

4. To update an entry, put this link http://localhost/php_rest_api_arnab/api/events.php and enter this in http body = 
    <code>{
    "id": "5",
    "name": "EventName",
    "location": "EventLocation",
    "date": "EventDateTime"
}</code> and method PUT on POSTMAN.
This will update the entry with 'id' = 5. Change key values to test the API.

5. To delete an entry, put this link http://localhost/php_rest_api_arnab/api/events.php and provide a http body with the key 'id' as like this =  <code>{
    "id": "5"
}</code> and method DELETE on POSTMAN.
This will delete the entry with id = 5.
