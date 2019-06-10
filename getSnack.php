<script> 
		$(document).ready( function () {
			$('#myTable4').DataTable();	
		} );
</script>		
		
<table id="myTable4" class="display">
	<thead>
		<tr>
			<th style = "color: white;">Location</th>
		</tr>
	</thead>
		
	<!-- Using a while loop to display the elements of the table onto the HTML webpage-->
	<?php		
		echo "<tbody style = 'color: white;'>";
		//displays information 
		$q = $_GET['q'];

		include "config.php";
		mysqli_select_db($conn, 'vending_machines');//chooses the database

		$sql="SELECT DISTINCT Location FROM products WHERE Name = '".$q."'";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)) {  
			echo "<tr>" . 
			"<td style = 'color: white;'>" . $row['Location'] . "</td>". "</tr>"; 						 
		}

		echo "</tbody>";
	?>
</table>
