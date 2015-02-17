<?php include_once("header_view.php");?>
<h2>Welcome <?php echo strtoupper($this->session->userdata('username'));?> , Available User List</h2>

<div id="container">
<?php foreach ($userdata as $key => $value) {;?>
<div id="row">

  <div id="cell">
    <p><?php echo $value->getUsername();?></p>
  </div>

  <div id="cell">
  	<?php echo form_open('home/edit/'.$value->getId());?>
    	<input type="submit" value="Edit"/>
    <?php echo form_close();?>
  </div>

  <div id="cell">
    <?php echo form_open('home/delete/'.$value->getId());?>
    	<input type="submit" value="Delete"/>
    <?php echo form_close();?>
  </div>

</div>
<?php }?>
</div>


<?php include_once("footer_view.php");?>