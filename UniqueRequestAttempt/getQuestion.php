<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','fishell1','S219352','Game2');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"Game2"); //can i take out Game2 here?  leave it blank?
$sql="SELECT * FROM QuestionDatabase WHERE QuestionNumber = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Prompt</th>
<th>CorrectResponse</th>
<th>WrongResponse1</th>
<th>WrongResponse2</th>
<th>WrongResponse3</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['Prompt'] . "</td>";
  echo "<td>" . $row['CorrectResponse'] . "</td>";
  echo "<td>" . $row['WrongResponse1'] . "</td>";
  echo "<td>" . $row['WrongResponse2'] . "</td>";
  echo "<td>" . $row['WrongResponse3'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>