<?php require "templates/header.php"; ?>
<style>
.center_div{
    margin: 0 auto;
    width:90% /* value of your choice which suits your alignment */
}
</style>
<div class="container center_div">
	<div class=row">
		<div class="col-md-12">
<form class="form-horizontal" method="POST" action="contact_query.php">
 
	<p class="full_name">
		<input type="text" name="full_name" id="full_name" placeholder="Enter Full Name" autofocus="autofocus" required/>
		<label for="full_name">Your Name</label>
	</p>
 
	<p class="email">
		<input type="email" name="email" id="email" placeholder="" required/>
		<label for="email">Your Email Address</label>
	</p>	
 
	<p class="message">
		<textarea name="message" placeholder="" required></textarea>
		<label for="message">Your Message</label>
	</p>
 
<div class="control-group" style="float:left; margin-left:-185px;">
	<div class="controls">
 
	<img src="generatecaptcha.php?rand=<?php echo rand(); ?>" name="captcha_img" id='image_captcha' > 
	<a href='javascript: refreshing_Captcha();'><i class="icon-refresh icon-large"></i></a> 
	<script language='JavaScript' type='text/javascript'>
		function refreshing_Captcha()
		{
			var img = document.images['image_captcha'];
			img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
		}
	</script>
	</div>
</div>
 
<br />
<br />
<br />
 
<div class="control-group" style="margin-left:-181px;">
	<div class="controls">
		<input id="code" name="code_confirmation" type="text" placeholder="Enter the Code Above" required></td>
	</div>
</div>
<div class="control-group" style="margin-left:-181px;">
	<div class="controls">
		<button type="submit" name="send_message" class="btn btn-primary"><i class="icon-ok icon-large"></i> Submit</button>
	</div>
</div>
 
</form>
</div>
</div>
</div>
<?php require "templates/footer.php"; ?>