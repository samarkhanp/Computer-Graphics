<?php
	
		$con=mysqli_connect("localhost","root","","test");
		if($con)
		{
			if(isset($_POST['add']))
			{
				$name=trim($_POST['name']);
				$marks=trim($_POST['marks']);
				$count=mysqli_query($con,"select count(*) count from student");
				$id=mysqli_fetch_assoc($count)['count']+1;
				$sql="insert into student values(".$id.",'".$name."',".$marks.")";
				if(mysqli_query($con,$sql))
				{
						echo "Added";
						header("refresh:2;url=index.php");
				}
				else{
					echo "Failed to Add";
					header("refresh:2;url=index.php");
				}
			}
			
			if(isset($_POST['update']))
			{
				$id=trim($_POST['id']);
				$name=trim($_POST['name']);
				$marks=trim($_POST['marks']);
				
				$sql="update student set name='".$name."',marks=".$marks." where id=".$id;
				
				if(mysqli_query($con,$sql))
				{
						echo "Updated";
						header("refresh:2;url=index.php");
				}
				else{
					echo "Failed Update";
					header("refresh:2;url=index.php");
				}
				
			}
			
			if(isset($_GET['did']))
			{
				$id=trim($_GET['did']);
				$sql="delete from student where id=".$id;
				if(mysqli_query($con,$sql))
				{
						echo "Deleted";
						header("refresh:2;url=index.php");
				}
				else{
					echo "Failed to Deleted";
					header("refresh:2;url=index.php");
				}
			}
		}
		else
			echo "NO Connection";
			
?>
		
		
<html>
	<head>
		<title>CRUD OPERATION</title>
	</head>
	<body> 
		
		<table border="1">
			<tr>
				<td>SNO</td>
				<td>Name</td>
				<td>Marks</td>
				<td>Action</td>
			</tr>
			<?php
				$con=mysqli_connect("localhost","root","","test");
				if($con)
				{
				
					$res=mysqli_query($con,"select * from student");
					if(mysqli_num_rows($res)>0)
					{
						while($row=mysqli_fetch_assoc($res))
						{
											
						?>
							<tr>
								<td><?php echo $row['id'];?></td>
								<td><?php echo $row['name'];?></td>
								<td><?php echo $row['marks'];?></td>
								<td><a href="index.php?uid=<?php echo $row['id'];?>">Edit</a>
									<a href="index.php?did=<?php echo $row['id'];?>">Delete</a>
								</td>
							</tr>
						<?php 
						}
					}
					else
					{
						?>
							<tr>
								<td colspan="4">No Data Found</td>
							</tr>
						<?php
					}
				}
			
			?>
		</table>
		<?php
		if(isset($_GET['uid']))
			{
				$id = trim($_GET['uid']);
				$sql = "select * from student where id=".$id;
				if($res = mysqli_query($con,$sql))
				{
					$row = mysqli_fetch_assoc($res);
					$name = $row['name'];
					$marks = $row['marks'];
					?>
					<form action="index.php" method="POST">
					<input type="text" name="id" value="<?php echo $id?>" hidden="">
					Name: <input type="text" placeholder="Enter Name" name="name" value="<?php echo $name;?>"><br>
					Marks: <input type="number" placeholder="Enter Marks" name="marks" value="<?php echo $marks;?>"><br>
					<input type="submit" name="update" value="Update">
					
					<?php
				}
			
			}
			else{
		
		?>
		<form action="index.php" method="POST">
		Name: <input type="text" placeholder="Enter Name" name="name"><br>
		Marks: <input type="number" placeholder="Enter Marks" name="marks"><br>
		<input type="submit" name="add" value="Add">
		<?php
			}
		?>
	</body>
</html>
