<?php 
include("connection.php");
$query_course = mysqli_query($connection,"SELECT * FROM courses"); 
?>
<select id="course" name="course" style="width: 100%;padding: 8px 12px;" >
<option value="">Your course..</option>
<?php while($row = mysqli_fetch_array($query_course)):; ?>
<option value="<?php echo $row[1];?>"> <?php echo $row[2];?> </option>
<?php endwhile;?>
</select>