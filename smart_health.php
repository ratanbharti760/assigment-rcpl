<?php
session_start();
$conn = mysqli_connect("localhost","root","","smart_health");
if(!$conn) die("Database Error");
?>

<!DOCTYPE html>
<html>
<head>
<title>Smart Health Prediction System</title>
</head>
<body>

<h1 align="center">Smart Health Prediction System</h1>
<hr>

<!-- ================= ADMIN LOGIN ================= -->
<h2>Admin Login</h2>
<form method="post">
Username: <input type="text" name="au">
Password: <input type="password" name="ap">
<input type="submit" name="admin_login" value="Login">
</form>

<?php
if(isset($_POST['admin_login'])){
  $u=$_POST['au'];
  $p=$_POST['ap'];
  $q=mysqli_query($conn,"SELECT * FROM admin WHERE username='$u' AND password='$p'");
  if(mysqli_num_rows($q)>0){
    $_SESSION['admin']=true;
    echo "<b>Admin Logged In</b>";
  } else {
    echo "<b>Invalid Admin</b>";
  }
}
?>

<hr>

<!-- ================= ADMIN PANEL ================= -->
<?php if(isset($_SESSION['admin'])){ ?>
<h2>Admin Panel</h2>

<!-- ADD SYMPTOM -->
<form method="post">
Add Symptom:
<input type="text" name="symptom">
<input type="submit" name="add_symptom" value="Add">
</form>

<!-- UPDATE SYMPTOM -->
<form method="post">
Update Symptom:
<select name="sym_id">
<?php
$s=mysqli_query($conn,"SELECT * FROM symptoms");
while($r=mysqli_fetch_assoc($s)){
 echo "<option value='{$r['symptom_id']}'>{$r['symptom_name']}</option>";
}
?>
</select>
<input type="text" name="new_symptom" placeholder="New Name">
<input type="submit" name="update_symptom" value="Update">
</form>

<hr>

<!-- ADD DISEASE -->
<form method="post">
Add Disease:
<input type="text" name="disease">
<textarea name="desc" placeholder="Description"></textarea>
<input type="submit" name="add_disease" value="Add">
</form>

<!-- UPDATE DISEASE -->
<form method="post">
Update Disease:
<select name="did">
<?php
$d=mysqli_query($conn,"SELECT * FROM diseases");
while($r=mysqli_fetch_assoc($d)){
 echo "<option value='{$r['disease_id']}'>{$r['disease_name']}</option>";
}
?>
</select>
<input type="text" name="new_disease" placeholder="New Disease Name">
<textarea name="new_desc" placeholder="New Description"></textarea>
<input type="submit" name="update_disease" value="Update">
</form>

<hr>

<!-- MAP DISEASE & SYMPTOM -->
<form method="post">
Disease:
<select name="d_id">
<?php
$d=mysqli_query($conn,"SELECT * FROM diseases");
while($r=mysqli_fetch_assoc($d)){
 echo "<option value='{$r['disease_id']}'>{$r['disease_name']}</option>";
}
?>
</select>

Symptom:
<select name="s_id">
<?php
$s=mysqli_query($conn,"SELECT * FROM symptoms");
while($r=mysqli_fetch_assoc($s)){
 echo "<option value='{$r['symptom_id']}'>{$r['symptom_name']}</option>";
}
?>
</select>

<input type="submit" name="map" value="Map">
</form>

<?php
// INSERTS
if(isset($_POST['add_symptom'])){
 mysqli_query($conn,"INSERT INTO symptoms VALUES(NULL,'".$_POST['symptom']."')");
 echo "Symptom Added<br>";
}

if(isset($_POST['add_disease'])){
 mysqli_query($conn,"INSERT INTO diseases VALUES(NULL,'".$_POST['disease']."','".$_POST['desc']."')");
 echo "Disease Added<br>";
}

if(isset($_POST['map'])){
 mysqli_query($conn,"INSERT INTO disease_symptom VALUES(NULL,'".$_POST['d_id']."','".$_POST['s_id']."')");
 echo "Mapped Successfully<br>";
}

// UPDATES
if(isset($_POST['update_symptom'])){
 mysqli_query($conn,
 "UPDATE symptoms SET symptom_name='".$_POST['new_symptom']."' 
  WHERE symptom_id=".$_POST['sym_id']);
 echo "Symptom Updated<br>";
}

if(isset($_POST['update_disease'])){
 mysqli_query($conn,
 "UPDATE diseases 
  SET disease_name='".$_POST['new_disease']."',
      description='".$_POST['new_desc']."'
  WHERE disease_id=".$_POST['did']);
 echo "Disease Updated<br>";
}
?>

<hr>
<?php } ?>

<!-- ================= USER SECTION ================= -->
<h2>User – Select Symptoms</h2>

<form method="post">
<?php
$r=mysqli_query($conn,"SELECT * FROM symptoms");
while($row=mysqli_fetch_assoc($r)){
 echo "<input type='checkbox' name='symptoms[]' value='{$row['symptom_id']}'>
       {$row['symptom_name']}<br>";
}
?>
<input type="submit" name="predict" value="Predict Disease">
</form>

<?php
if(isset($_POST['predict']) && !empty($_POST['symptoms'])){
 $ids = implode(",",$_POST['symptoms']);

 $sql="
 SELECT disease_id, COUNT(*) AS total
 FROM disease_symptom
 WHERE symptom_id IN ($ids)
 GROUP BY disease_id
 ORDER BY total DESC
 LIMIT 1";

 $res=mysqli_query($conn,$sql);
 if($row=mysqli_fetch_assoc($res)){
   $d=mysqli_query($conn,"SELECT * FROM diseases WHERE disease_id=".$row['disease_id']);
   $dis=mysqli_fetch_assoc($d);

   echo "<h3>Predicted Disease</h3>";
   echo "<b>".$dis['disease_name']."</b><br>";
   echo $dis['description'];
 } else {
   echo "No disease found";
 }
}
?>

<hr>
<p align="center"><b>Smart Health Prediction System – PHP & MySQL</b></p>

</body>
</html>
