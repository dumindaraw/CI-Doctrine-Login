<?php include_once("header_view.php");?>

<div class="form_style">
  <h1>User Edit</h1>
  <?php echo form_open('home/editDone/'.$id);?>
    <p><input type="text" name="uname" value="" placeholder="Username"></p>
    <p><input type="password" name="pw" value="" placeholder="Password"></p>
    <p class="submit"><input type="submit" name="commit" value="Edit User"></p>
  <?php echo form_close();?>
</div>

<?php include_once("footer_view.php");?>