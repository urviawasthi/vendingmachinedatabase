Things to note: 
	- Bootstrap Scrollspy to make the webpage. 
	- Used the 50 color schemes website on Moodle to color the page. 
	- Created my own Hash function, called encrypt(), to encrypt the password 
	- JQuery Accordion that states the mission of the website.

1. User authentification 
2. Data Tables: 
	Three data tables: product information, students' preferences for chips in the vending machine, and dietary restrictions for vending machine snacks. Formatted these tables using jQuery, and extracted the data using MySQL and PHP.
	Here is a brief layout of the databases: 
		database: Vending_Machines

			table name: products
			columns:  name, location, price, type, flavor 

			table name: preference
			columns: Name, numOfStudents

			table name: diet
			columns: Name, Restriction
		
		database: login 
			table name: register 
			columns: ID, fullName, username, password, 


3. Charts 
	Two charts: a bar graph and a pie chart. The pie chart talks about the frequency of flavors in the vending machines, and the bar graph displays each product, and the number of students that want that product to be in vending machines. I made these using JavaScript, and help from Google charts. 

4. More Informationn + Queries
	Here, I displayed interesting information using queries in MySQL. The information included the most wanted chips brand, the most common vending machine snack, and the average price of all of the snacks in the vending machine. 

5. Advanced Search
	In this, used AJAX to complete the user's query. Basically, the user chose a snack, and it displays the locations of that snack. s