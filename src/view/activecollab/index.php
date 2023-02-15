

<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
}
table, th, td {
  border: 1px solid;
}
</style>
	</head>
	<body>
		<h2>Task list date by asc</h2>
<table>
  <tr>
    <th>name</th>
    <th>body</th>
    <th>date</th>
  </tr>
	<?php

foreach ($data as $task) {

  ?>
  <tr>
    <td><?php echo $task['name']; ?></td>
    <td><?php echo $task['body']; ?></td>
    <td><?php echo $task['updated_on']; ?></td>

  </tr>
<?php
}

?>

</table>

</body>
</html>

