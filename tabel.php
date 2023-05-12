<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>overzicht melding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

  <div class="container">
  <a href="form1_crud.php" class="btn btn-success my-5">W&eacute;&eacute;r eentje te laat!</a> 
  <table class="table">
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">Student naam</th>
      <th scope="col">Klas</th>
      <th scope="col">Minuten te laat</th>
      <th scope="col">Reden te laat </th>
      <th scope="col"> </th>
      <td>
    </tr>
  </thead>
  <tbody>

  <?php 
include 'connect.php';
$sql = "SELECT * FROM studenten1";
 $res = $conn->query($sql);
foreach($res as $row){
  echo "<tr><td>".$row['id']."</td><td>".$row['naam']."</td><td>".$row["klas"]."</td><td>".$row["minuten"]."</td><td>".$row["reden"]."</td> 
  <td>
  <button class='btn btn-success'><a href='update.php?updatid=".$row['id']." ' class='text-light'>UPDATE</a></button>
  <button class='btn btn-danger'><a href='delete.php?deleteid=".$row['id']."' class='text-light'>DELETE</a></button> </td>
  </tr>";
}
echo "</table>";

  ?>


  </tbody>
</table>
 <?php 
include 'connect.php';
$sql = "SELECT MAX(minuten) AS max_minuten, AVG(minuten) AS avg_minuten, SUM(minuten) AS total_minuten FROM studenten1";
$res = $conn->query($sql);
$statistics = $res->fetch();
echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th>Statistieken</th>";
echo "<th>Waarde</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
echo "<tr>";
echo "<td>Hoogste minuten te laat</td>";
echo "<td>".$statistics['max_minuten']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Gemiddeld minuten te laat</td>";
echo "<td>".$statistics['avg_minuten']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Totaal aantal minuten</td>";
echo "<td>".$statistics['total_minuten']."</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
?>

 </div>
  </body>
</html>