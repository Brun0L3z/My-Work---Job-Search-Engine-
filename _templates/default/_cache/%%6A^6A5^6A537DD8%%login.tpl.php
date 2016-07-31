<?php /* Smarty version 2.6.26, created on 2012-11-09 11:00:57
         compiled from login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">
 function numbersOnly(evt,val) { 
	  evt = (evt) ? evt : event; 
	  var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0)); 
	  if ( (charCode >= 48 && charCode <= 57) || charCode == 8 || charCode == 9 || charCode == 13) { 
	    return true; 
	  }; 
	  return false; 
	} 
</script>
'; ?>

	<div id="headline">
		</div><!---head line-->
<div id="side1">
	<form id="register" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
registration/">
	<div id="reg_h1"></div>
	<table>
		<tr>
		<td align="right">Email ID<span style="color:red;">*</span>:</td>
		<td style="padding:3px"><input type="text" name="email" id="email" size="24" 
						 value="<?php echo $_POST['email']; ?>
"/></td>
				   </tr>
				   <tr>
					<td></td>

					<td align="left" style="padding-left:3px"><?php if ($this->_tpl_vars['register_errors']['email']): ?><div 
					class="suggestion"><?php echo $this->_tpl_vars['register_errors']['email']; ?>
</div><?php endif; ?>
					</td>
				   </tr>
				    <tr>
					<td></td>
					<td align="left" style="padding-left:3px"><?php if ($this->_tpl_vars['register_errors']['id']): ?><div 
					class="suggestion"><?php echo $this->_tpl_vars['register_errors']['id']; ?>
</div><?php endif; ?>
					</td>
				   </tr>
					<tr>
					   <td align="right">Password<span style="color:red;">*</span> :</td>
					   <td style="padding:3px"><input type="password" name="pwd" id="pwd" size="24"	
						maxlength="15" value="<?php echo $_POST['pwd']; ?>
"/></td>
					</tr>
					 <tr>
						<td></td>
						<td align="left" style="padding-left:3px">
							  <?php if ($this->_tpl_vars['register_errors']['pwd']): ?><div 
							 class="suggestion"><?php echo $this->_tpl_vars['register_errors']['pwd']; ?>
</div><?php endif; ?>
						</td>
					 </tr>
					 <tr>
					   <td align="right">Confirm Password<span style="color:red;">*</span>:</td>
					   <td style="padding:3px"><input type="password" name="cpwd" id="cpwd" size="24"	
						maxlength="15" value="<?php echo $_POST['cpwd']; ?>
"/></td>
					</tr>
					 <tr>
						<td></td>
						<td align="left" style="padding-left:3px">
							  <?php if ($this->_tpl_vars['register_errors']['cpwd']): ?><div 
							 class="suggestion"><?php echo $this->_tpl_vars['register_errors']['cpwd']; ?>
</div><?php endif; ?>
						</td>
					 </tr>
					 <tr>
						<td></td>
						<td align="left" style="padding-left:3px">
							  <?php if ($this->_tpl_vars['register_errors']['match']): ?><div 
							 class="suggestion"><?php echo $this->_tpl_vars['register_errors']['match']; ?>
</div><?php endif; ?>
						</td>
					 </tr>
					 </table>
					 <table>
					 <tr>
					 <td align="left" style="padding-left:50px">Mobile No<span style="color:red;">*</span>:</td>
						  <td align="left" style="padding:3px;">
						  
						 +91<input type="tel" id="mblno" name="contactnumber" id="contactnumber" size="22" maxlength="10"
							 value="<?php echo $_POST['contactnumber']; ?>
" onkeypress="return numbersOnly(event,this.value);"/></td>
					</tr>
					 <tr>
						 <td></td>
						 <td align="left" style="padding-left:3px"><?php if ($this->_tpl_vars['register_errors']['contactnumber']): ?><div 
						  class="suggestion"><?php echo $this->_tpl_vars['register_errors']['contactnumber']; ?>
</div><?php endif; ?>
						 </td>
						 
					</tr>
					</table>
					<table>
					<tr>
					
					  <td colspan="2" style="padding-left:75px;">
					   <input type="checkbox" name="sms" id="sms" size="20" value="1" <?php if ($_REQUEST['sms'] == 1): ?>checked<?php endif; ?> />Receive SMS Alerts.</td>
				   </tr>
				   <tr>
					  <td colspan="2" style="padding-left:75px;">
					    <input type="checkbox" name="terms"  size="20" value="1" <?php if ($_REQUEST['terms'] == 1): ?>checked<?php endif; ?>/>I agree to the <a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
terms/" title="Terms and Conditions" target="_blank">Terms & Conditions.</a> 
						<?php if ($this->_tpl_vars['register_errors']['terms']): ?>
						<div class="suggestion"><sapn style="padding-left:12px;"><?php echo $this->_tpl_vars['register_errors']['terms']; ?>

						</span></div>
						<?php endif; ?>
					  </td>
				   </tr>
					 <tr >
						<td colspan="2" align="center" style="padding-top:10px;">

						<a href="#"><input type="image" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/continue.png" value=""/>
						
						<input type="hidden" name="action" value="register" id="register" />
					
						</td>
					</tr>
				</table>
     </form>

</div><!-- side1 closed-->
<div id="side2">
	<table>
	<tr>
		<td>
		<div id="homeimage">
		</div><!--home image-->
		</td>
		
	<td>
	<!-- login page-->
		<div id="logindiv">
		<div id="para"></div>
		 <table class="loginbg">
		<form  method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
">
		<tr>
		<td height="227"align="center" valign="middle" >
		<table width="100%" border="0" cellspacing="0" cellpadding="3">
		 <tr>
			<td valign="top">
			<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/lap.gif" width="164" height="82" border="0" />
			</td>
		</tr>
		 <tr>
			<td height="5px">
			<div class="suggestion"><?php echo $this->_tpl_vars['errors']['incorrect']; ?>
</div>
			<div class="suggestion"><?php echo $this->_tpl_vars['errors']['username']; ?>
</div>
			<div class="suggestion"><?php echo $this->_tpl_vars['errors']['password']; ?>
</div>
			</td>
		 </tr>
			
		<tr>
			<td><input type="text" name="username" id="username" size="20" 
				value="<?php echo $_POST['username']; ?>
"  class="inputtxt" />
			</td>
			
		
		</tr>
     
		<tr>
			<td align="center"><input type="password" name="password" id="password" class="inputtxtpwd"/>
			</td>
			
				
		</tr>
		 <tr>
			<td height="40" align="center" valign="bottom">
			<a href="#"><input type="image" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/jobseeker.png" value=""/>
			<input type="hidden" name="action" value="login" />

			</td>
		</tr>
			<tr>
			<td height="20" align="center" valign="bottom">
			<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
forgotpassword"><u>Forgot Password?</u></a>
			</td>
		</tr>
		
		
		</table>
	</td>
	</tr>
</form>
</table>
 </div><!-- login div -->
</td>
</tr>
</table>
</div><!-- side2 closed-->
<table>
<tr>
<td>
<div id="scan4">Scan4jobs helps you find right jobs
</div><!---LOGO-->
</td>
</tr>
</table>
<table>
	<tr>
	<td>
		<div id="walkins">
			<div id="walkinsheading"></div><!---walkinsheading-->
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "walkins.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div><!--walkins-->
	</td>
	<td>
		<div id="company">
		<div id="walkinsheading1"></div><!---walkinsheading-->
		<div id="comapanylogos">
		<table>
		<tr>
		<td style="padding-left:2px;" >
			<a href="http://www.ibm.com/careers/."target="_blank" >
			<image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/IBM_1.png"/></td>
			</a>
		</td>
		<td style="padding-left:2px;">
			<a href="http://www.microsoft.com/careers/."target="_blank" >
			<image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/Microsoft_1.png"/></td>
			</a>
		</td>
		<td style="padding-left:2px;">
			<a href="http://www.cisco.com/web/about/ac40/about_cisco_careers_home.html" target="_blank">
			<image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/Cisco_1.png"/></td>
			</a>
		</td>
		</tr>
		<tr>
		<td style="padding-left:2px;">
			<a href="http://www.hp.com/careers/." target="_blank">
			<image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/HP_1.png"/></td>
			</a>
		</td>
		<td style="padding-left:2px;">
			<a href="http://www.tcs.com/careers/."target="_blank" >
			<image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/TCS_1.png"/></td>
			</a>
		</td>
		<td style="padding-left:2px;">
			<a href="http://www.infosys.com/careers/."target="_blank" >
			  <image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/Infosys_1.png"/></td>
			</a>
		</td>
		</tr>
		<tr><td style="padding-left:2px;">
			<a href="http://www.wipro.com/careers/."target="_blank" >
			 <image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/Wipro_1.png"/></td>
			</a>
		</td>
		<td style="padding-left:2px;">
		<a href="http://www.cognizant.com/careers/" target="_blank" >
			<image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/Cognizant_1.png"/></td>
		</a>
		</td>
		<td style="padding-left:2px;">
			<a href="http://www.hcl.in/careers.asp" target="_blank" >
			<image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/HCL_1.png"/></td>
			</a>
		</td>
		</tr>
		<tr>
		<td style="padding-left:2px;">
			<a href="http://www.in.capgemini.com/careers/." target="_blank">
			<image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/CG_1.png"/></td>
			</a>
		</td>
		<td style="padding-left:2px;">
			<a href="http://www.convergys.com/company/careers/" target="_blank">
			<image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/Convergys_1.png"/></td>
			</a>
		</td>
		<td style="padding-left:2px;">
			<a href="http://www.techmahindra.com/tech_mahindra_careers/tech_mahindra_jobs.aspx"target="_blank" >
			<image id="comapanylogos1" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/TM_1.png"/></td>
			</a>
		</td>
		</tr>
		</table>
		</div><!--companylogos-->
		</div><!--company-->
		</td>
		<td>
		<div id="company">
			<div id="walkinsheading2">
			</div><!---walkinsheading-->
			<table>
			   <tr>
			    <td>
			     <a href="http://www.scan4jobs.com/."target="_blank" >
			     <input type="image" id="adslogos" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/AD_Red.gif"/>
			    </td>
			   </tr>
			   <tr>
			   <tr>
			    <td>
			     <a href="http://www.scan4jobs.com/."target="_blank" >
			     <input type="image" id="adslogos" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/AD_Green.gif"/>
			    </td>
			    
			   </tr>
			   <tr>
			    <td>
			     <a href="http://www.techindya.com/."target="_blank" >
			     <input type="image" id="adslogos" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/AD_TechIndya.gif"/></td>
			     </a>
			    </td>
			   <tr>
			   <tr>
			    <td>
			     <a href="http://www.scan4jobs.com/."target="_blank" >
			     <input type="image" id="adslogos" src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/<?php echo $this->_tpl_vars['THEME']; ?>
/img/AD_Blue.gif"/>
			    </td>
			   </tr>
			 </table>
		</div><!--company-->
	</td>
	</tr>
</table>
<!--<?php echo '
<script type="text/javascript">
$(document).ready(function() {
 
    $(\'#register\').click(function() { 
 
        $(".error").hide();
        var hasError = false;
        var emailReg = /^([\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4})?$/;
 
        var emailaddressVal = $("#email").val();
      if(!emailReg.test(emailaddressVal)) {
            $("#email").after(\'<div class="error">Enter a valid email address.</div>\');
            hasError = true;
        }
 
        if(hasError == true) { return false; }
 
    });
});
</script>
'; ?>
 -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>