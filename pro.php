<?php
	$server_name="localhost";
	$username="root";
	$password="";
	$database_name="semexam";
	
	$conn=mysqli_connect($server_name,$username,$password,$database_name);
	if(!$conn){
		die("Connection Established .. ". mysqli_connect_error());
	}
	if(isset($_POST['submit'])){
		$productid=$_POST['pid'];
		$productname=$_POST['pname'];
		$reorder=$_POST['ror'];
		$quantity=$_POST['quan'];
		$cost=$_POST['cost'];
		
		$sql_query="INSERT into semexamtable (pid,pname,ror,quan,cost) VALUES ('$productid','$productname','$reorder','$quantity','$cost')";
		
		if(mysqli_query($conn,$sql_query)){
			echo "Inserted to table successfully";
		}
		else{
			echo "Error: " . $sql . "" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
	
	if(isset($_POST['view'])){
		$sql_query="SELECT * FROM semexamtable";
		$result=$conn->query($sql_query);
		echo "<table border='1'>
		<tr>
		<th> PRODUCT ID </th>
		<th> PRODUCT NAME </th>
		<th> REORDER LEVEL </th>
		<th> QUANTITY </th>
		<th> COST </th>
		</tr> ";
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$row['pid']."</td>";
			echo "<td>".$row['pname']."</td>";
			echo "<td>".$row['ror']."</td>";
			echo "<td>".$row['quan']."</td>";
			echo "<td>".$row['cost']."</td>";
		}
		echo "</table>";
		mysqli_close($conn);
	}
	if(isset($_POST['ret'])){
		$proid=$_POST['proidret'];
		$sql_query="SELECT * FROM semexamtable WHERE pid='$proid'";
		$result=$conn->query($sql_query);
		echo "<table border='1'>
		<tr>
		<th> PRODUCT ID </th>
		<th> PRODUCT NAME </th>
		<th> REORDER LEVEL </th>
		<th> QUANTITY </th>
		<th> COST </th>
		</tr>";
		while($row=mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$row['pid']."</td>";
			echo "<td>".$row['pname']."</td>";
			echo "<td>".$row['ror']."</td>";
			echo "<td>".$row['quan']."</td>";
			echo "<td>".$row['cost']."</td>";
			
		}
		echo "</table>";
		
		mysqli_close($conn);
	}
	/*if(isset($_POST['update'])){
		$prodid=$_POST['proidret'];
		$upquantity=$_POST['upqnt'];
		$sql_query="UPDATE semexamtable SET quan='$upquantity' WHERE pid='$prodid'";
		if(mysqli_query($conn,$sql_query)){
			echo "Updated successfully";
		}	
		else{
			echo "Error: ". $sql . "" . mysqli_errno($conn);
		}
		mysqli_close($conn);
	}*/
	if(isset($_POST['retcost'])){
		$co1=$_POST['c1'];
		$co2=$_POST['c2'];
		$sql_query="SELECT * FROM semexamtable WHERE cost>='$co1' AND cost<='$co2'";
		$result=$conn->query($sql_query);
		echo "<table border='1'>
		<tr>
		<th> PRODUCT ID </th>
		<th> PRODUCT NAME </th>
		<th> REORDER LEVEL </th>
		<th> QUANTITY </th>
		<th> COST </th>
		</tr>";
		while($row=mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$row['pid']."</td>";
			echo "<td>".$row['pname']."</td>";
			echo "<td>".$row['ror']."</td>";
			echo "<td>".$row['quan']."</td>";
			echo "<td>".$row['cost']."</td>";
			
		}
		echo "</table>";
		
		mysqli_close($conn); 
	}
	if(isset($_POST['update1'])){
		$upproductid=$_POST['uppid'];
		$upproductname=$_POST['uppname'];
		$upreorder=$_POST['upror'];
		$upquantity=$_POST['upquan'];
		$upcost=$_POST['upcost'];
		
		$sql_query="UPDATE semexamtable SET pname='$upproductname',ror='$upreorder',quan='$upquantity',cost='$upcost' WHERE pid='$upproductid'";
		
		if(mysqli_query($conn,$sql_query)){
			echo "Updated Successfully";
		}
		else{
			echo "Error: ".$sql."".mysqli_error($conn);
		}
	}
?>