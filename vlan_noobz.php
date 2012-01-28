<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Combsboxen</title>
</head>

<body>

<?
if (isset($_POST['submit']))
{
$username="nope";
$password="nope";
$database="combs_vlan_noobz";

$ip_address=$_POST['ip_address'];
$owner=$_POST['owner'];
$boxname=$_POST['boxname'];
$os=$_POST['os'];
$purpose=$_POST['purpose'];
$hardware=$_POST['hardware'];

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query = "UPDATE box SET owner = '$owner', boxname = '$boxname', os = '$os', purpose = '$purpose', hardware = '$hardware' WHERE ip_address = '$ip_address'";
mysql_query($query) or die("I see what you did there.");

mysql_close();
}
?>

<div class="content">

<div id="navlist">
  <ul>
    <li><a href="index.php" target="_self">Instructions</a></li>
    <li><a href="vlan_noobz.php" target="_self">Noobz VLAN</a></li>
    <li><a href="vlan_projects.php" target="_self">Projects VLAN</a></li>
  </ul>
</div>

<table class="main">

  <caption>VLAN: Noobz</caption>

  <colgroup />
  <colgroup span="2" title="box">

  <thead>
   <tr>
     <th class="headth" scope="col">IP Address</th>
     <th class="headth" scope="col">Owner</th>
     <th class="headth" scope="col">Box Name</th>
     <th class="headth" scope="col">Operating System</th>
     <th class="headth" scope="col">Purpose/Goals</th>
     <th class="headth" scope="col">Hardware</th>
   </tr>
  </thead>

  <tbody>

<?
  $username="combscat";
  $password="nyancat";
  $database="combs_vlan_noobz";

  mysql_connect(localhost,$username,$password);
  @mysql_select_db($database) or die( "Unable to select database");
  $query="SELECT * FROM box";
  $result=mysql_query($query);

  $num=mysql_numrows($result);

  mysql_close();

  $i=0;
  while ($i < $num) {

  $ip_address=mysql_result($result,$i,"ip_address");
  $owner=mysql_result($result,$i,"owner");
  $boxname=mysql_result($result,$i,"boxname");
  $os=mysql_result($result,$i,"os");
  $purpose=mysql_result($result,$i,"purpose");
  $hardware=mysql_result($result,$i,"hardware");

  echo "<tr>
          <th>$ip_address</th>
          <th>$owner</th>
          <th>$boxname</th>
          <th>$os</th>
          <th>$purpose</th>
          <th>$hardware</th>
        </tr>";

  $i++;
  }

?>

  </tbody>
</table>

<br /><br />
  
<div class="main">

<div style="margin: 20px;"><strong>Update an Entry:</strong>
<br /><br />
<form action="vlan_noobz.php" method="post">
IP Address: <input type="text" name="ip_address"><br>
Username of box owner: <input type="text" name="owner"><br>
Box name: <input type="text" name="boxname"><br>
Operating System: <input type="text" name="os"><br>
Purpose: <input type="text" name="purpose"><br>
Hardware: <input type="text" name="hardware"><br>
<input type="submit" name="submit" value="submit">
</form>
</div>
</div>

</div>

</body>
</html>

