<?php
include_once '../llb/database.php';
$db= new database();
$category_id = $_POST["category_id"];

$select_sub_cat = "SELECT * FROM subcategory where cat_id = $category_id";
$result=$db->select($select_sub_cat);
?>




<option value="">Select SubCategory</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["sub_cat_id"];?>"><?php echo $row["sub_cat_name"];?></option>
<?php
}
?>
