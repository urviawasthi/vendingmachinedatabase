<!-- Urvi Awasthi; March 14th, 2019, Vending Machine Database -->

<?php  
	include "config.php";
	mysqli_select_db($conn, 'vending_machines'); 	
?>  

<html>
	<head>
	  <title>Vending Machines</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  
	  <!-- stuff for bootstrap -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  
	  <!-- stuff for jquery -->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  
	  <!-- my own style sheet -->
	  <link rel = "stylesheet" type = "text/css" href = "style.css"> 

	  <!-- more bootstrap and jquery -->		
	  <script src = "https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	  <link rel = "stylesheet" href = "https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	

	  <!-- importing libraries needed for pie charts from google --> 
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	  

	  <?php 
	  	$sql = "SELECT Flavor, count(*) AS Number FROM products GROUP BY Flavor";  
		$result = mysqli_query($conn, $sql);
	  ?>
      <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Flavor', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Flavor"]."', ".$row["Number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Frequency of Flavors in Vending Machine Products',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
       </script>  
	  
      <script>
	  	  <!-- script for the accordion in jquery --> 
		  $( function() {
			$( "#accordion" ).accordion();
		  } );
		  
		  <!-- Calling the data table function in JQuery -->		
		  $(document).ready( function () {
			$('#myTable').DataTable();
		  } );
		  		  
		  <!-- Calling the data table function in JQuery -->		
		  $(document).ready( function () {
			$('#myTable2').DataTable();
		  } );
		  		  
		  <!-- Calling the data table function in JQuery -->		
		  $(document).ready( function () {
			$('#myTable3').DataTable();
		  } );
		  
		  <!-- Calling the data table function in JQuery -->		
		  $(document).ready( function () {
			$('#myTable4').DataTable();
		  } );		  
	  </script>
	  
	  <script>
	  //get location of snack 
		function showSnack(str) {
		  if (str=="") {
			document.getElementById("txtHint").innerHTML="";
			return;
		  } 
		  if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
			  document.getElementById("txtHint").innerHTML=this.responseText;
			}
		  }
		  xmlhttp.open("GET","getSnack.php?q="+str,true);
		  xmlhttp.send();
		}
	  </script>
	 
   <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
         ['Snack Name','Number of Students'],
		 <?php 
					$query = "SELECT * from preference";
		 
					 $exec = mysqli_query($conn,$query);
					 while($row = mysqli_fetch_array($exec)){
						echo "['".$row['Name']."',".$row['numOfStudents']."],";
					 }
		?> 
        ]);

        var options = {
          title: 'Snack Preferences',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Snack Preferences',
                   subtitle: 'Popularity by the number of students that chose that snack' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Number of Students'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
 
	</head>
	
	<!--using bootstrap scrollspy to make a better webpage -->  
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
	
	<!-- navbar using bootstrap --> 
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#section1">Vending Machines at IMSA</a>
		</div>
		<div>
		  <div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
			  <li><a href="#section1">About This Website</a></li>
			  <li><a href="#section2"> Data Tables </a></li>
			  <li><a href="#section3">Charts and Graphs</a></li>
			  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Extra<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="#section41">More Information</a></li>
				  <li><a href="#section42">Advanced Search</a></li>
				</ul>
			  </li>
			  <li><a href="logout1.php">Logout</a></li>
			</ul>
		  </div>
		</div>
	  </div>
	</nav>    

	<div id="section1" class="container-fluid">
	  <h1>About This Website</h1>
		<div id="accordion" style = "height: 300px;">
		  <h3>Our Purpose</h3>
		  <div>
			<p>
			We have collected data from all the vending machines across campus, to inform you about the IMSA collection of snacks and drinks. Our website includes information on what snacks are in each vending machine, as well as the ingredients of each snack, and where the snack is located. Have fun exploring!
			</p>
		  </div>
		  <h3>How We Collect Our Information</h3>
		  <div>
			<p>
			We have gone across campus, taken pictures of each vending machine, and noted down every single snack that each vending machine has. This collection of data has been collected on March 11th, 2019. We have also contacted Student Council for a recent survey that they had all IMSA students take,in which we asked them questions about their vending machine preferences and other thoughts. 
			</p>
		  </div>
		  <h3>Who Are We?</h3>
		  <div>
			<p>
			We are hungry IMSA students who are looking for ways to find our favorite snacks. Different vending machines have different things, so we decided to find a way to organize all of our information.
			</p>
			<ul>
			  <li>Snacks</li>
			  <li>Drinks</li>
			  <li>Candy</li>
			</ul>
		  </div>
		</div>
		<img src="vendingmachine1.png">
	</div>
	
	<!-- part two- data tables! -->
	<div id="section2" class="container-fluid">
	  <h1>Data Tables</h1>
		
		<br />  
		<!-- the first data table, called products -->
		<h2> Product Information </h2>
		<h3 style = "text-align: center;"> Below, you will find a table with the name of the product, its location at IMSA, its unit price, type of snack, and flavor. If you would like to seach up a certain snack, simply type it into the search bar below. </h3>
		<table id="myTable" class="display" style="width:100%">
			<!-- The headers for the table-->
			<thead>
				<tr>
					<th>productName</th>
					<th>location</th>
					<th>unitPrice</th>
					<th>type</th>
					<th>flavor</th>
				</tr>
			</thead>
				
			<!-- Using a while loop to display the elements of the table onto the HTML webpage-->
			<?php		
				echo "<tbody>";
				//displays information about all of the products
				$sql = "SELECT * FROM products";
				$result = mysqli_query($conn, $sql); 
				while($row = mysqli_fetch_assoc($result)) {
				   echo "<tr>" .  
						"<td>" .  $row['Name'] . "</td>" .  
						"<td>" .  $row['Location'] . "</td>" . 
						"<td>" . $row['Price'] . "</td>" .
						"<td>" . $row['Type'] . "</td>" . 	
						"<td>" . $row['Flavor'] . "</td>" . 							
				   "</tr>";
				}
				echo "</tbody>"
			?>
		</table>
		
		<br /> <br />
		<hr>
		<!-- the second data table, called preference -->
		<h2> Students' Preferences for Chips in the Vending Machine </h2>
		<h3 style = "text-align: center;"> The data for this table was collected from a survey run throughout the IMSA community, asking students about their favorite snack. Below is a table with the snack name, and the number of students that called it their favorite snack. </h3>
		<table id="myTable2" class="display" style="width:100%">
			<!-- The headers for the table-->
			<thead>
				<tr>
					<th>name</th>
					<th>numOfStudents</th>
				</tr>
			</thead>
				
			<!-- Using a while loop to display the elements of the table onto the HTML webpage-->
			<?php		
				echo "<tbody>";
				//displays information about all of the preferences
				$sql = "SELECT * FROM preference";
				$result = mysqli_query($conn, $sql); 
				while($row = mysqli_fetch_assoc($result)) {
				   echo "<tr>" .  
						"<td>" .  $row['Name'] . "</td>" .  
						"<td>" .  $row['numOfStudents'] . "</td>" . 
				   "</tr>";
				}
				echo "</tbody>"
			?>
		</table>
		
		<br /> <br />
		<hr>
		<!-- the third data table, called preferences -->
		<h2> Dietary Restrictions for Vending Machine Snacks </h2>
		<h3 style = "text-align: center;"> In the table below, each snack's has been labeled as either vegan, vegetarian, or non-vegetarian. You can search for a certain snack below as well. </h3>
		<table id="myTable3" class="display" style="width:100%">
			<!-- The headers for the table-->
			<thead>
				<tr>
					<th>name</th>
					<th>restriction</th>
				</tr>
			</thead>
				
			<!-- Using a while loop to display the elements of the table onto the HTML webpage-->
			<?php		
				echo "<tbody>";
				//displays information about all of the people
				$sql = "SELECT * FROM diet";
				$result = mysqli_query($conn, $sql); 
				while($row = mysqli_fetch_assoc($result)) {
				   echo "<tr>" .  
						"<td>" .  $row['Name'] . "</td>" .  
						"<td>" .  $row['Restriction'] . "</td>" . 
				   "</tr>";
				}
				echo "</tbody>"
			?>
		</table>
	</div>
	
	<div id="section3" class="container-fluid">
	  <h1>Charts and Graphs</h1>
	  <!-- making a pie chart that separates each vending machine with the variety of food that it has --> 
			<br /><br />  
           <div>  
                <h3 align="center">A Pie Chart Representing the Frequency of Flavors In Vending Machines</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div> 
	  <!-- making a bar graph with each product, and how many students wanted that product -->
			<br /><br /> 
			<div>  
                <h3 align="center">A Bar Graph Representing the Popularity of Certain Snacks </h3>  
                <br />  
               <div id="top_x_div" style="width: 900px; height: 500px; margin: auto;"></div> 
           </div> 
			


    </div>
	
	<div id="section41" class="container-fluid">
	  <h1>More Information</h1>
	  <br /> <br /> <br /> <br /> <br /> 
	  <p> <b> Most wanted chips brand throughout the vending machines: </b> </p> 
	  		<table style = "margin: auto; padding: 20px; color: white; text-align: center;">
			<!-- The headers for the table-->
			<thead>
				<tr>
					<th style = 'width: 200px; text-align: left;'><p>name</p></th>
					<th style = 'width: 200px; text-align: left;'><p>numOfStudents</p></th>
				</tr>
			</thead>
				
			<!-- Using a while loop to display the elements of the table onto the HTML webpage-->
			<?php	
				echo "<tbody>";			
				//displays information 
				$sql = "select name, numOfStudents from preference where numOfStudents in (select max(numOfStudents) from preference) LIMIT 1";			  
				$result = mysqli_query($conn, $sql); 
				while($row = mysqli_fetch_assoc($result)) {  
				   echo "<tr>" .  
						"<td style = 'width: 200px; text-align: center;'><p>" .  $row['name'] . "</p></td>" .  
						"<td style = 'width: 200px; text-align: center;'><p>" .  $row['numOfStudents'] . "</p></td>" . 
				   "</tr>";				}
				echo "</tbody>";
			?>
		</table>
			<br />  <br /> 
	  <p> <b> Most common snack in the vending machine: </b></p> 
			<?php		
				//displays information 
				$sql = "SELECT Name, COUNT(Name) AS value_occurrence FROM products GROUP BY Name ORDER BY value_occurrence DESC LIMIT 1";			  
				$result = mysqli_query($conn, $sql); 
				while($row = mysqli_fetch_assoc($result)) {  
					echo "<p>" . $row['Name'] . "</p>"; 						 
				}
			?>
			<br />  <br /> 
	  <p> <b> Average price of all of the snacks in the vending machines: </b> </p>
			<?php		
				//displays information 
				$sql = "SELECT AVG(Price) 'Average Price' FROM products";			  
				$result = mysqli_query($conn, $sql); 
				while($row = mysqli_fetch_assoc($result)) {  
				 echo "<p>" . round($row['Average Price'], 2) . " dollars </p>"; 						 
				}
			?>
	</div>
	
	<div id="section42" class="container-fluid">
	  <h1>Advanced Search</h1>
	  <br />  <br /> 
	  <p> Select whatever food you want, and we will return the vending machines that have that food! </p>
	  <br /> 
		<p style = "margin: auto;"> Name of Snack: </p> <br> <br>
		<form style = "color: black; margin-left: 40%;">
			<select onchange="showSnack(this.value)">
			<option value="">Select a snack:</option>
			<option value="Salsitas">Salsitas</option>
			<option value="Fritos Original">Fritos Original</option>
			<option value="Dove Dark Chocolate">Dove Dark Chocolate</option>
			<option value="Skittles Original">Skittles Original</option>
			</select>
			</form>
			<br>
		<div id="txtHint" style = "margin-left: 42%; color: white;"><b>Snack location will be listed here.</b></div>
	  </form>
	</div>

	</body>
</html>
