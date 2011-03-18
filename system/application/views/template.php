<!doctype html>  

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
 
<?=$this->load->view('global/header')?>

</head>

<body>
 <!--[if lt IE 7]>
  <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>
    <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>
      <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>
      <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
        <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>You are using an outdated browser</div>
        <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>For a better experience using this site, please upgrade to a modern web browser.</div>
      </div>
      <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>
      <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>
      <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>
      <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>
    </div>
  </div>
  <![endif]-->




   <header>
   	<div class="logotop">
    	<div class="container_24">
    	
    	<!-- Logo here --> 
	    <div class="grid_19">
		<div id="logo"><img width="385px" src="<?=base_url()?>images/logos/leasedesk_logo.jpg"/></div>
		</div>
	    
		<div class="grid_5" id="contact_details">
		<img width="183px" height="68px" src="<?=base_url()?>images/logos/contact_details.png"/>
		</div>
	    	
    	</div>
    </div>
    	<div class="menu_container">
    		<div class="container_24"><?=$this->load->view('global/top_menu')?></div>
    	</div>
    	
    	<?php	
			      if (isset($slideshow))
			      { ?>
    	<div class="header">
    		
			<div class="slide_container">
				<div class="slides" align="center">
				
			      <?=$this->load->view($slideshow)?> 
			      
	
				</div>
			</div>
			<div class="menu_container">
    			<div class="container_24">
    				<div class="grid_14">
    					Take the tour
    				</div>
    			</div>
    		</div>
		</div>
		<?php }  ?>
    </header>




<div class="top_shadow"></div>


<div class="main_content">
	<div class="container_24">
		
		<div class="grid_14">
			
			<?php $this->load->view('global/warning'); ?>
			<?php $this->load->view($main); ?>
			
		</div>
		<div class="container_10">
			<div class="grid_5">
				
				<?php $this->load->view('global/mainbuttons'); ?> 
		
				<?php $this->load->view('sidebar/login_box'); ?> 
			
			</div>
			
			<div class="grid_5">
				
				<?php $this->load->view('sidebar/channel_partner_program'); ?> 
		
			</div>
			
			<div class="grid_10">
				
				
		
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
	
	<?php $this->load->view('global/greybox'); ?> 
	
<div class="clear"></div>
<div class="footer1">
	<div class="container_24" >
		
	<div class="grid_24">
		<?=$this->load->view('slideshow/companies')?>
	</div>
	
	
	</div>
</div>

<div class="footer2">
	<div class="container_24">
	
	
		<div class="grid_19">
			bottom links
		</div>
	
		<div class="grid_5">
			social links
		</div>
	
	</div>
</div>
<?php $this->load->view('global/footer'); ?>





</body>
</html>