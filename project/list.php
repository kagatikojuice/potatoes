<?php
	include 'header.php' ;
	include 'navbar.php' ;
	include 'session.php';
	include 'connection.php';
?>

<div class="container border-info border border-3 rounded mt-3 ps-5 pe-5 pb-2">

	<div class="mb-4 mt-4">
        <h1 class="text-info text-center">Here is who've signed in</h1>
    </div>
	
	<table class="table table-bordered border-info table-striped table-hover mt-2">
		<thead class="table-info">
			<tr class="text-center border-info">
				<th>First Name</th>
				<th>Second Name</th>
				<th>Gender</th>
				<th>Username</th>
				<th>Delete</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody class="text-center">
			<?php
				$sql = "SELECT * FROM users";
				$data = $usr->prepare($sql);
				$data->execute();
				$result = $data->fetchAll();
				foreach($result as $sdata)
				{
			?>
				<tr>
					<td><?php echo $sdata['Firstname'] ?></td>
					<td><?php echo $sdata['Lastname'] ?></td>
					<td><?php echo $sdata['Gender'] ?></td>
					<td><?php echo $sdata['Username'] ?></td>
					<td class="text-center">
						<a onclick="return confirm('Do you want to delete this record?')" href="deleteuser.php?un=<?php echo $sdata['Username']?>">
							<button class="btn btn-danger" title="Delete this record">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
									<path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
								</svg>
							</button>
						</a>
					</td>
					<td class="text-center">
						<a class="btn btn-primary" href="edituser.php?un=<?php echo $sdata['Username'];?>" title="Edit this record">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush-fill" viewBox="0 0 16 16">
  								<path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
							</svg>
						</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<div class="col text-end">
		<span class="text-muted">Go to <a href="http://localhost/phpmyadmin/index.php?route=/sql&db=signup&table=information&sql_query=SELECT+%2A+FROM+%60information%60++%0AORDER+BY+%60information%60.%60Firstname%60+ASC&sql_signature=1ce1845af72e067e39d1509fc1250f5500e179f30ba38f8424888c9cff42bca3&session_max_rows=25&is_browse_distinct=0" title="Go to the database of this list" class="text-info">database.</a></span>
	</div>
</div>

<?php
	include 'end.php';
?>