<?php include_once("header_view.php");?>

<div class="form_style">
  <h1>Register</h1>
  <?php echo validation_errors(); ?>
  <?php echo form_open('register/create');?>
    <p><input type="text" name="uname" value="" placeholder="Username"></p>
    <p><input type="password" name="pw" value="" placeholder="Password"></p>
    <p><input type="password" name="repw" value="" placeholder="Password Again"></p>
    <p class="submit"><input type="submit" name="commit" value="Create User"></p>
  <?php echo form_close();?>
</div>

<?php include_once("footer_view.php");?>