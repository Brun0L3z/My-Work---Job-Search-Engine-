{include file='header.tpl'}
{literal}
	<script type="text/javascript">
		function activate(){
			confirm("SMS alerts are activated to your mobile");
			window.location.reload();
			return true;
		}
		function deactivate(){
			confirm("SMS alerts are deactivated to your mobile");
			window.location.reload();
			return true;
		}
	</script>
{/literal}
{literal}
<script>
$(document).ready(function() {	
	$('a[name=modal]').click(function(e) {
		e.preventDefault();
		var id = $(this).attr('href');
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
		var winH = $(window).height();
		var winW = $(window).width();
              	$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	   $(id).fadeIn(2000); 
	});
	$('.window .close').click(function (e) {
		e.preventDefault();
		$('#mask').hide();
		$('.window').hide();
	});	
        $('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
});
</script>
{/literal}
{literal}
	<script type="text/javascript">
		$(document).ready(state_selectbox_change);
			function state_selectbox_change(){
				$('#state').change(update_cities_list);
			}
			function update_cities_list(){
				var state=$('#state').attr('value');
				$.get('../state.php?state='+state, show_cities);
			}
			function show_cities(cities){
				$('#cities_list').html(cities);
			}
	</script>
{/literal}
{literal}
	<script type="text/javascript">
		$(document).ready(function()
		{
			  $(".intro1").hide();
			  
		});
	</script>
{/literal}
{literal}
	<script type="text/javascript">
		$(document).ready(function()
		{
		  $("#hide").click(function()
		       {
			$(".intro1").hide();
		   
		       });
		    $("#show").click(function()
		    {
			 $(".intro1").show();
		    
		     });
		});
	</script>
{/literal}
{section name=all loop=$user}
<div id="container_myprofile">
	<div class="profile">
		{if $user[all].city_id != 0}
			{if $personal_details != personal_details}
				<div class="icons1">
					<a href="{$BASE_URL}myprofile/?edit=personal_details" value="edit" title="Edit">
					<img src="{$BASE_URL}_templates/default/img/pencil.png" alt="Edit"/></a>
				</div> 
			{/if}
		{/if}
		<div class="intext">
			<table>
			<tr>
				<td><strong>Email Id<div class="stats_list"></div></strong></td><td>:&nbsp;<div class="stat_list"></div></td><td>{section name="co" }
					{$user[co].email}
					{/section}
					<div class="under_line"></div>
				</td>
			</tr>
			<tr>
				<td><strong>Mobile Number<div class="stat_list"></div></strong></td><td>:&nbsp;<div class="stat_list"></div></td><td>{section name="co" }
					{$user[co].contact_number}
					{/section}<div class="stat_list"></div>
				</td>
			</tr>
				{section name="co" }
				{assign var="city_id" value=$user[co].city_id}
				{/section}
			<tr>
			<td><strong>Current Location<div class="stat_list"></div></td><td></strong>:&nbsp;<div class="stat_list"></div></td><td>
				{if $city_id != 0}
					{section name="co"}
						{section name="name" loop=$cllist}
							{if $user[co].city_id == $cllist[name].id}
							{$cllist[name].name}
							{/if}
						{/section},
						{section name="name" loop=$states}
							{if $user[co].state_id == $states[name].id}
							{$states[name].name}
							{/if}
						{/section}
					{/section}
				<div class="under_line"></div>
				{else}
					<div class="not_available"><em>Not Available</em></div>
					<div class="stat_list"></div>
				{/if} 
			</td>
			</tr>
				{section name="co" }
				{assign var="gender" value=$user[co].gender}
				{/section}
			<tr>
				<td>
				<strong>Gender<div class="stat_list"></div></strong></td><td>:&nbsp;<div class="stat_list"></div></td><td>
				{if !(empty($gender))} 
				{section name="co" }
				{$user[co].gender|ucfirst}
				{/section}<div class="under_line"></div>
				{else}
					<div class="not_available"><em>Not Available</em></div>
					<div class="stat_list"></div>
				{/if}
				</td>
			</tr>
			
			<tr>
				<td colspan="3">
					<strong>Recieve SMS Alerts </strong>&nbsp;
					{section name="co" }
					{if $user[co].sms == 1}<img src="{$BASE_URL}_templates/default/img/checkmark.png"/>{else}<img src="{$BASE_URL}_templates/default/img/deactive.gif"/>{/if}<a href="#dialog2" name="modal">&nbsp;change</a>
					{/section}
				</td>
			</tr>
			</table>      
		</div><!--intext--> 
	</div><!--profile-->
</div><!---container myprofile-->
<div id="container_myprofile1">
	<div class="profile1">
		<div class="profile2">
		{section name="co" }
			{assign var="firstname" value=$user[co].firstname}
			{if !(empty($firstname))}  
				<strong>{$user[co].firstname}</strong>
			{else}
				<div class="not_available"><em>User Details Not Available</em></div>
				To Update Your Profile please click On
				<a href="{$BASE_URL}full_registration/" title="Continue">Continue</a>
			{/if}
				<strong>{$user[co].lastname}</strong>
		{/section}
		<br/><a href="{$BASE_URL}changepassword/" title="Change Password" ><span style="font-size:14px;color:#0070C0;padding-top:5px;">Change password</span></a>
		</div>
	</div>
</div><!--container_myprofile1-->
{if $personal_details == personal_details}
<div class="steps1">Personal Details</div>
<div class="text">
	<form id="edit" method="post" action="{$BASE_URL}myprofile/?edit=personal_details">
		<table>
		<tr>
			<td align="right" width="300px;">
				<strong>Mobile Number:</strong></td>
			<td style="padding-left:10px;">
				<input type="num" maxlength="10" value="{if $smarty.post.contactnumber != ''}{$smarty.post.contactnumber}{else}{$user[all].contact_number}{/if}" name="contactnumber">
				{if $errors.contactnumber}<td><div class="suggestion">{$errors.contactnumber}</div></td>{/if}	
			</td>
		</tr>
		<tr>
			<td align="right" width="300px;">
			<strong>Current Location</strong>:</td>
			<td style="padding-left:7px;">
				<select name="state" id="state"  onchange="stateFunction(this.value);">
				<option value="">{$translations.jobs.state}</option>
					{section name="c" loop=$states}
						<option value="{$states[c].id}" {if $smarty.post.state == $states[c].id || $user[all].state_id == $states[c].id}selected="selected"{else}{if $user_city.id == $states[c].id AND !$smarty.post.state_id AND !$user[all].state_id}selected="selected"{/if}{/if}>{$states[c].name}</option>
					{/section}
				</select>
			</td>
			<td id="cities_list">				
				<select name="city" id="city">
				<option value="">{$translations.jobs.city}</option>
					{section name="c" loop=$cllist}
						{if $cllist[c].state_id == $user[all].state_id}
							<option value="{$cllist[c].id}" {if $smarty.post.city == $cllist[c].id || $user[all].city_id == $cllist[c].id}selected="selected"{/if}>{$cllist[c].name}</option>
						{/if}
					{/section}
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				{if $errors.city}
					<div class="cityerror">
						{$errors.city}
					</div>
				{/if}
			</td>
		</tr>
			<tr>
				<td align="right" width="300px;"><strong>Gender</strong>:</td>
				<td style="padding-left:10px;">
					<input type="radio" name="gender" value="Male" {if $smarty.request.gender eq "Male" || $user[all].gender eq "Male"}checked{/if}>Male
					<input type="radio" name="gender" value="Female" {if $smarty.request.gender eq "Female" || $user[all].gender eq "Female"}checked{/if}>Female
				</td>
				{if $errors.gender}
					<td><div class="suggestion">
					{$errors.gender}</div>
					</td>
				{/if}
			</tr>
		</table>    
	<div class="update">
		<table>
			<tr>
				<td><input type="submit" class="upadatebutton" value=""/>&nbsp;&nbsp;</td>
				<td><a href="{$BASE_URL}myprofile/"><input type="button" id="button"/></a></td>
			</tr>
		</table>
		<input type="hidden" name="action" value="useredit" />
	</div><!---update closed-->
</div><!-- text box closed-->
</form>
{/if}
<div class="steps1">
	Work Experience
</div>
{if $user[all].city_id != 0}
	{if $category != category}
		<div class="icons">
			<a href="{$BASE_URL}myprofile/?edit=category" title="Edit"><img src="{$BASE_URL}_templates/default/img/pencil.png" alt="Edit" /></a>
		</div>
	{/if}
{/if}
<div class="text">
{if $category != category}
<table>
	{section name="co" }
		{assign var="fresher" value=$user[co].category}
	{/section}
{if (empty($fresher))}
	<tr>
		<td align="right" width="300px;"><strong>Experience</strong>:</td>
		<td style="padding-left:10px;" width="300px;"><div class="not_available"><em>Not Available</em></div>	
		</td>
	</tr>
	{elseif $fresher == fresher}
	<tr>
		<td align="right" width="300px;">
			<strong>Experience</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;">
			{section name="co" }
				{$user[co].category}
			{/section}   
		</td>
	</tr>
	{else $fresher != fresher}
		{section name="co" }
			{assign var="total_exp" value=$user[co].total_exp}
		{/section}
	<tr>
		<td align="right" width="300px;">
			<strong>Total Experience</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;"> 
		{if $total_exp != 0} 
			{section name="co"}
				{assign var="teststring" value =$user[co].total_exp}
				{assign var="testsplit" value=","|explode:$teststring}
				{section name="y" loop="$years"}
					{if $years[y].id == $testsplit[0]}
						{$years[y].years} Years
					{/if}
				{/section}
				{section name="m" loop="$months"}
					{if $months[m].id == $testsplit[1]}
						{$months[m].months} Months
					{/if}
				{/section}
			{/section}
		{else}
			<div class="not_available"><em>Not Available</em></div>
		{/if}
		</td>
	</tr>
		{section name="co" }
			{assign var="salary" value=$user[co].salary}
		{/section}
	<tr>
		<td align="right" width="300px;">
			<strong>Current / Latest Annual Salary</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;">
			{if $salary != 0} 
				{section name="co"}
					<span class="WebRupee">Rs</span>{$user[co].salary}lakhs.
				{/section}
			{else}
				<div class="not_available"><em>Not Available</em></div>
			{/if}
		</td>
	</tr>     
		{section name="co" }
			{assign var="job_title" value=$user[co].job_title}
		{/section}
	<tr>
		<td align="right" width="300px;"><strong>Job Title</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;"> 
			{if !(empty($job_title))}
				{section name="co" }
					{$user[co].job_title}
				{/section}   
			{else}
				<div class="not_available"><em>Not Available</em></div>
			{/if}
		</td>
	</tr>
		{section name="co" }
		{assign var="company_name" value=$user[co].company_name}
		{/section}
	<tr>
		<td align="right" width="300px;">
			<strong>Company Name</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;">
			{if !(empty($job_title))}
				{section name="co" }
					{$user[co].company_name}
				{/section}   
			{else}
				<div class="not_available"><em>Not Available</em></div>
			{/if}
		</td>
	</tr>
		{section name="co" }
			{assign var="industry" value=$user[co].industry}
		{/section}
	<tr>
		<td align="right" width="300px;">
			<strong>Industry of company:</strong>
		</td>
		<td style="padding-left:10px;" width="300px;">
		{if $industry!= 0} 
			{section name="co"}
				{section name="name" loop=$industries}
					{if $user[co].industry == $industries[name].industry_id}
						{$industries[name].name}
					{/if}
				{/section}
			{/section}
		{else}
				<div class="not_available"><em>Not Available</em></div>		
		{/if}
		</td>
	</tr>
		{section name="co" }
			{assign var="functional_area" value=$user[co].functional_area}
		{/section}
	<tr>
		<td align="right" width="300px;">
			<strong>Functional Area of Job:</strong>
		</td>
		<td style="padding-left:10px;" width="300px;">
		{if $functional_area != 0} 
			{section name="co"}
				{section name="name" loop=$area}
					{if $user[co].functional_area == $area[name].id}
						{$area[name].name}
					{/if}
				{/section}
			{/section}
			{else}
			<div class="not_available"><em>Not Available</em></div>		
		{/if}
		</td>
	</tr>
	{section name="co" }
	{assign var="jobexp" value=$user[co].latest_job_exp}
	{/section}
	<tr>
		<td align="right" width="300px;">
		<strong>Duration of Job</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;"> 
			{if $total_exp != 0} 
				{section name="co"}
					{assign var="teststring" value =$user[co].latest_job_exp}
					{assign var="testsplit" value=","|explode:$teststring}
					{section name="y" loop="$years"}
						{if $years[y].id == $testsplit[0]}
							{$years[y].years} Years
						{/if}
					{/section}
					{section name="m" loop="$months"}
						{if $months[m].id == $testsplit[1]}
							{$months[m].months} Months
						{/if}
					{/section}
				{/section}
			{else}
				<div class="not_available"><em>Not Available</em></div>
			{/if}
		</td>
	</tr>
{/if}
</table>
{else}
	{section name="co" }	
	{assign var="fresher" value=$user[co].category}
	{/section}
{*
step1:fill registration form after do not fill full registration.
2:fresher will be fill and complete.
3.experience will be fill and comple.
*}
<form id="edit" method="post" action="{$BASE_URL}myprofile/?edit=category">  
{if $fresher==fresher}
{*
if you fresher click it will go user edit also experience at the time this loop come 
*}
<table>
	<tr>
		<td  align="right" width="300px;">
			<strong>Are You</strong><span style="color:red;">*</span>:
		</td>
		<td style="padding-left:10px;">
			<input type="radio" name="category" id="hide" value="fresher"{if $smarty.request.category eq "fresher" || $user[all].category eq "fresher"}checked{/if} onclick="$('.intro').hide()">Fresher
			<input type="radio" name="category" id="show" value="experienced" {if $smarty.request.category eq "experienced" || $user[all].category eq "experienced"}checked{/if} onclick="$('.intro').hide()">Experienced
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro1">Total experiences:</strong></td> 
		<td style="padding-left:10px;">
			<select name="year" id="listdropdown" class="intro1" >
			<option value="">{$translations.jobs.years}</option>
				{section name="c" loop=$years}
					<option value="{$years[c].id}" {if $smarty.post.year == $years[c].id}selected="selected"{/if}>{$years[c].years}
					</option>
				{/section}
			</select>
			<select name="month" id="listdropdown" class="intro1"  >
			<option value="">{$translations.jobs.months}</option>
				{section name="c" loop=$months}
					<option value="{$months[c].id}" {if $smarty.post.month == $months[c].id}selected="selected"{/if}>{$months[c].months}
					</option>
				{/section}
			</select>
		</td>
		<td>
			<div class="intro1">
				{if $errors.year}<div class="suggestion">
				{$errors.year}</div>{/if}
			</div>
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong class="intro1">Current / Latest Annual Salary:</strong>
		</td>
		<td style="padding-left:10px;" >
			<input type="text" name="salary" class="intro1" id="largetext" value="{$smarty.post.salary|escape}"/>
		</td>
		<td>
			<div class="intro1">
				{if $errors.salary}<div  class="suggestion">{$errors.salary}</div>{/if}
			</div>
		</td>
	</tr>
	<tr>
		<td></td>
		<td style="padding-left:20px;" class="intro1">Eg:2.5lakhs. </td>
	</tr>
	<tr>
		<td colspan="2">
			<b><p class="intro1">Current / Latest Job Details</b></p>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro1">Job Tittle:</strong>
		</td>
		<td style="padding-left:10px;" >
			<input type="text" name="job_title" class="intro1" 
			id="usertextbox" onKeypress="return lettersOnly(event);"  
			value="{$smarty.post.job_title|escape}"/>
		</td>
		<td>
			<div class="intro1">
				{if $errors.job_title}<div  class="suggestion">{$errors.job_title}</div>{/if}
			</div>
		</td>
	</tr>
	<tr>
	<td align="right" >
	<strong class="intro1">Company Name:</strong>
	</td>
		<td style="padding-left:10px;">
			<input type="text" name="company_name" class="intro1" id="usertextbox" 
		onKeypress="return lettersOnly(event);"  value="{$smarty.post.company_name|escape}"/>
		</td>
		<td>
			<div class="intro1">
				{if $errors.company_name}<div  class="suggestion">{$errors.company_name}</div>{/if}
			</div>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro1">Industry of Company:</strong> 
		</td>
		<td style="padding-left:10px;">
			<select name="industry" class="intro1" id="usereditlist">
			<option value=""> {$translations.jobs.industry}</option>
				{section name="c" loop=$industries}
					<option value="{$industries[c].industry_id}" {if $smarty.post.industry == $industries[c].industry_id}selected="selected"{/if}>{$industries[c].name}
					</option>
				{/section}
			</select>
		</td>
		<td>
			<div class="intro1">
				{if $errors.industry}<div  class="suggestion">{$errors.industry}</div>{/if}
			</div>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro1">Functional area of Job:</strong>
		</td>
		<td style="padding-left:10px;">
			<select name="functional_area" class="intro1"  id="usereditlist">
			<option value=""> {$translations.jobs.functional_area}</option>
				{section name="c" loop=$area}
					<option value="{$area[c].id}" {if $smarty.post.functional_area == $area[c].id}selected="selected"{/if}>{$area[c].name}
					</option>
				{/section}
			</select>
		</td>
		<td>
			<div class="intro1">
				{if $errors.job}<div class="suggestion">{$errors.job}</div>
				{/if}
			</div>
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong class="intro1">Duration of Job:</strong>
		</td> 
		<td style="padding-left:10px;" >
			<select name="job_year" id="listdropdown" class="intro1">
			<option value="">{$translations.jobs.years}</option>
				{section name="c" loop=$years}
					<option value="{$years[c].id}" {if $smarty.post.job_year == $years[c].id}selected="selected"{/if}>{$years[c].years}
					</option>
				{/section}
			</select>
			<select name="job_month" id="listdropdown"  class="intro1">
			<option value="">{$translations.jobs.months}</option>
				{section name="c" loop=$months}
					<option value="{$months[c].id}" {if $smarty.post.job_month == $months[c].id}selected="selected"{/if}>{$months[c].months}
					</option>
				{/section}
			</select>
		</td>
		<td>
			<div class="intro1">
				{if $errors.job_year}<div  class="suggestion">{$errors.job_year}</div>{/if}
			</div>
		</td>
	</tr>
	{if $smarty.request.category eq "experienced"|| $user[all].category eq "experienced"}
	{*fresher to experience *}
	<tr>
		<td align="right">
			<strong class="intro">Total experiences:</strong>
		</td> 
		<td style="padding-left:10px;">
			<select name="year" id="listdropdown" class="intro">
			<option value="">{$translations.jobs.years}</option>
				{section name="c" loop=$years}
					<option value="{$years[c].id}"{if $smarty.post.year == $years[c].id}selected="selected"{/if}>{$years[c].years}
					</option>
				{/section}
			</select>
			<select name="month"id="listdropdown" class="intro" >
			<option value="">{$translations.jobs.months}</option>
				{section name="c" loop=$months}
					<option value="{$months[c].id}" {if $smarty.post.month == $months[c].id}selected="selected"{/if}>{$months[c].months}
					</option>
				{/section}
			</select>
		</td>
		<td>
			<div class="intro">
				{if $errors.year}<div  class="suggestion">{$errors.year}</div>{/if}
			</div>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro">Current / Latest Annual Salary:</strong>
		</td>
		<td style="padding-left:10px;">
			<input type="text" name="salary" class="intro" id="largetext" value="{$smarty.post.salary|escape}"/>
		</td>
		<td>
		<div class="intro">
			{if $errors.salary}<div  class="suggestion">{$errors.salary}</div>{/if}
		</div>
		</td>
	</tr>
	<tr>
		<td></td>
		<td style="padding-left:20px;" class="intro">Eg:2.5lakhs. </td>
	</tr>
	<tr>
		<td colspan="2">
			<b><p class="intro">Current / Latest Job Details</b></p>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro">Job Tittle:</strong>
		</td>
		<td style="padding-left:10px;" >
			<input type="text" name="job_title" class="intro" id="usertextbox" onKeypress="return lettersOnly(event);"  value="{$smarty.post.job_title|escape}"/>
		</td>
		<td>
			<div class="intro">
				{if $errors.job_title}<div  class="suggestion">{$errors.job_title}</div>{/if}
			</div>
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong class="intro">Company Name:</strong>
		</td>
		<td style="padding-left:10px;" >
			<input type="text" name="company_name" class="intro" id="usertextbox" onKeypress="return lettersOnly(event);"  
			value="{$smarty.post.company_name|escape}"/>
		</td>
		<td>
			<div class="intro">
				{if $errors.company_name}
			<div  class="suggestion">
				{$errors.company_name}</div>{/if}
			</div>
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong class="intro">Industry of company :</strong>
		</td>
		<td style="padding-left:10px;" > 
			<select name="industry" class="intro" id="usereditlist">
			<option value=""> {$translations.jobs.industry}</option>
				{section name="c" loop=$industries}
					<option value="{$industries[c].industry_id}" {if $smarty.post.industry == $industries[c].industry_id}selected="selected"{/if}>{$industries[c].name}
					</option>
				{/section}
			</select>
		</td>
		<td>
			<div class="intro">
				{if $errors.industry}<div  class="suggestion">{$errors.industry}</div>{/if}
			</div>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro">Functional area of Job:</strong>
		</td>
		<td style="padding-left:10px;">
			<select name="functional_area" class="intro"  id="usereditlist">
			<option value=""> {$translations.jobs.functional_area}</option>
				{section name="c" loop=$area}
					<option value="{$area[c].id}" {if $smarty.post.functional_area == $area[c].id}selected="selected"{/if}>{$area[c].name}
					</option>
				{/section}
			</select>
		</td>
		<td>
			<div class="intro">
				{if $errors.job}<div class="suggestion">{$errors.job}</div>{/if}
			</div>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro">Duration of Job:</strong>
		</td>
		<td style="padding-left:10px;">
			<select name="job_year" id="listdropdown" class="intro"  >
			<option value="">{$translations.jobs.years}</option>
				{section name="c" loop=$years}
					<option value="{$years[c].id}" {if $smarty.post.job_year== $years[c].id}selected="selected"{/if}>{$years[c].years}
					</option>
				{/section}
			</select>
			<select name="job_month" id="listdropdown"class="intro">
			<option value="">{$translations.jobs.months}</option>
				{section name="c" loop=$months}
					<option value="{$months[c].id}" {if $smarty.post.job_month == $months[c].id}selected="selected"{/if}>{$months[c].months}
					</option>
				{/section}
			</select>
		</td>
		<td>
			<div class="intro">
				{if $errors.job_year}<div  class="suggestion">{$errors.job_year}</div>{/if}
			</div>
		</td>
	</tr>
	{/if}	
</table>
{elseif $fresher != fresher}
{* 
if experienced selected it will click user edit it will comes this loop
*}
<table>
	<tr>
		<td align="right" width="300px;">
			<input type="hidden" name="category" value="experienced">
			<strong>Total Experience:</strong> 
		</td>
		<td style="padding-left:10px;">
		{assign var="teststring" value =$user[all].total_exp}
		{assign var="testsplit" value=","|explode:$teststring}
		<select name="year" id="listdropdown" >
		<option value="">{$translations.jobs.years}</option>
			{section name="c" loop=$years}
				<option value="{$years[c].id}" {if $smarty.post.year == $years[c].id || $testsplit[0] == $years[c].id}selected="selected"{else}{if $user== $year[c].id AND !$smarty.post.year }selected="selected"{/if}{/if}>{$years[c].years}
				</option>
			{/section}
		</select>
		<select name="month" id="listdropdown" >
		<option value="">{$translations.jobs.months}</option>
			{section name="c" loop=$months}
				<option value="{$months[c].id}" {if $smarty.post.month == $months[c].id || $testsplit[1] == $months[c].id}selected="selected"{else}{if $user_total_exp == $month[c].id AND !$smarty.post.total_exp AND !$testsplit[1]}selected="selected"{/if}{/if}>{$months[c].months}
				</option>
			{/section}
		</select>
	</td>	
		{if $errors.year}
			<td>
				<div class="suggestion">{$errors.year}</div>
			</td>
		{/if}
	</tr>
	<tr>
		<td align="right">
			<strong>Current / Latest Annual Salary:</strong>
		</td>
		<td style="padding-left:10px;">
		{assign var="salspilt" value="."|explode:$user[all].salary}
		{if $salspilt[0] != '' && $salspilt[1] != ''}
			<input type="text" name="salary" id="largetext" value="{$user[all].salary}"/>
		{else}
			<input type="text" name="salary" id="largetext" value="{$user[all].salary}.0"/>
		{/if}
		</td>
		{if $errors.salary}
			<td>
				<div class="suggestion">{$errors.salary}</div>
			</td>
		{/if}
	</tr>
	<tr>
		<td></td>
		<td style="padding-left:20px;">Eg:2.5lakhs. </td>
	</tr>
	<tr>
		<td colspan="2">
			<b><strong>Current / Latest Job Details</strong>
		</td>
	</tr>
	<tr>		
		<td align="right">
			<strong>Job Title:</strong>
		</td>
		<td style="padding-left:10px;">
			<input type="text" name="job_title"  id="usertextbox" onKeypress="return lettersOnly(event);"  value="{$user[all].job_title}"/>
		</td>
		<td>
			<div class="intro1">
				{if $register_errors.jobtitle}</p><div 
				class="suggestion">{$register_errors.jobtitle}</p></div>
				{/if}
			</div>
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong>Company Name:</strong>
		</td>
		<td style="padding-left:10px;">
			<input type="text" name="company_name" id="usertextbox" onKeypress="return lettersOnly(event);"  value="{$user[all].company_name}"/>
		</td>
		<td>
			{if $register_errors.companyname}<div 
			class="suggestion">{$register_errors.companyname}</div>
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong>Industry of company :</strong>
		</td>
		<td style="padding-left:10px;"> 
			<select name="industry"  id="usereditlist">
			<option value="">{$translations.jobs.industry}</option>
				{section name="c" loop=$industries}
					<option value="{$industries[c].industry_id}" {if $smarty.post.industry== $industries[c].industry_id || $user[all].industry == $industries[c].industry_id}selected="selected"{else}{if $user == $industries[c].industry_id AND !$smarty.post.industry AND !$user[all].industry}selected="selected"{/if}{/if}>{$industries[c].name}
					</option>
				{/section}
			</select>
		</td>
		{if $errors.industry}
			<td><div class="suggestion">{$errors.industry}</div></td>
		{/if}
	</tr>
	<tr>
		<td align="right">
		<strong>Functional Area of the Job:</strong>
		</td>
		<td style="padding-left:10px;">
			<select name="functional_area"  id="usereditlist">
			<option value=""> {$translations.jobs.functional_area}</option>	 
				{section name="c" loop=$area}
					<option value="{$area[c].id}"{if $smarty.post.functional_area== $area[c].id || $user[all].functional_area == $area[c].id}selected="selected"
					selected="selected"{/if}>{$area[c].name}
					</option>
				{/section}
			</select>
		</td>
		{if $errors.job}
			<td>
				<div class="suggestion">{$errors.job}</div>
			</td>
		{/if}
	</tr>
	<tr>
		<td align="right" ><strong>Duration of Job:</strong>
		</td>
		<td style="padding-left:10px;">
			{assign var="teststring" value =$user[all].latest_job_exp}
			{assign var="testsplit" value=","|explode:$teststring}
			{assign var="teststring" value =$user[all].latest_job_exp}
			{assign var="testsplit" value=","|explode:$teststring}
		<select name="job_year" id="listdropdown" >
		<option value="">{$translations.jobs.years}</option>
			{section name="c" loop=$years}
				<option value="{$years[c].id}"{if $smarty.post.latest_job_exp == $years[c].id || $testsplit[0] == $years[c].id}selected="selected"{else}{if $user_latest_job_exp == $years[c].id AND !$smarty.post.latest_job_exp AND !$testsplit[0]}selected="selected"{/if}{/if}>{$years[c].years}
				</option>
			{/section}
		</select>
		<select name="job_month" id="listdropdown" >
		<option value="">{$translations.jobs.months}</option>
			{section name="c" loop=$months}
				<option value="{$months[c].id}"{if $smarty.post.latest_job_exp == $months[c].id || $testsplit[1] == $months[c].id}selected="selected"{else}{if $user_latest_job_exp == $months[c].id AND !$smarty.post.latest_job_exp AND !$testsplit[1]}selected="selected"{/if}{/if}>{$months[c].months}
				</option>
			{/section}
		</select>
		</td>
		{if $errors.job_year}
			<td>
				<div class="suggestion">{$errors.job_year}</div>
			</td>
		{/if}
	</tr>
</table>
{/if}
	<div class="update">
		<table>
			<tr>
				<td><input type="submit" class="upadatebutton" value=""/>&nbsp;&nbsp;</td>
				<td><a href="{$BASE_URL}myprofile/"><input type="button" id="button"/></a></td>
			</tr>
		</table>
		<input type="hidden" name="action" value="useredit" />
	</div><!---update closed-->
</form>
{/if}<!-- category if closed here-->
</div><!--intext-->
<div class="steps1">Education Details</div>
{if $user[all].city_id != 0}
	{if $education_details != education_details}
		<div class="icons"><a href="{$BASE_URL}myprofile/?edit=education_details" title="Edit">
			<img src="{$BASE_URL}_templates/default/img/pencil.png" alt="Edit" /></a>
		</div>
	{/if}
{/if}
<div class="text">
{section name="c" loop=$other_values}
	{if $other_values[c].category == education_list }
		{assign var="other_education_list" value=$other_values[c].others}	
	{/if}
	{if $other_values[c].category == qualification }
		{assign var="other_qualification_list" value=$other_values[c].others}	
	{/if}
{/section}
{if $education_details != education_details}
<table>
{section name="co" }
{assign var="qualification" value=$user[co].qualification}
{/section}
	<tr>
	<td align="right" width="300px;">
		<strong>Qualification Level:</strong>
	</td>
	<td style="padding-left:10px;" width="300px;">
	{if $qualification != 0} 
		{section name="co"}
			{section name="name" loop=$list}
				{if $user[co].qualification == $list[name].id}
					{$list[name].qualification}
				{/if}
			{/section}
		{/section}
	{elseif $other_qualification_list != ''} 
		Our admin will approve your option.
	{else}
		<div class="not_available"><em>Not Available</em></div> 
	{/if}
	</td>
	</tr>
	{section name="co" }
	{assign var="education_specialization" value=$user[co].education_specialization}
	{/section}
	<tr>
		<td align="right" width="300px;">
			<strong>Education Specialization</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;">
		{if $education_specialization != 0}
			{section name="co"}
				{section name="name" loop=$edulist}
					{if $user[co].education_specialization == $edulist[name].id}
						{$edulist[name].name}
					{/if}	
				{/section}
			{/section} 
		{elseif $other_education_list != ''}
			Our admin will approve your option.
		{else}
			<div class="not_available"><em>Not Available</em></div> 
		{/if}
		</td>
	</tr>
		{section name="co" }
			{assign var="institute_name" value=$user[co].institute_name}
		{/section}
	<tr>
		<td align="right" width="300px;">
			<strong>Institute Name</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;"> 
		{if !(empty($institute_name))}
			{section name="co" }
				{$user[co].institute_name}
			{/section}   
		{else}
			<div class="not_available"><em>Not Available</em></div>
		{/if}
		</td>
	</tr>
		{section name="co"}
			{assign var="year_of_passout" value=$user[co].year_of_passout}
		{/section}
	<tr>
	<td align="right" width="300px;"><strong>Year of Passout</strong> :</td><td style="padding-left:10px;" width="300px;">
	{if $year_of_passout != 0}
	{section name="co"}
		{section name="name" loop=$passoutlist}
			{if $user[co].year_of_passout == $passoutlist[name].id}
				{$passoutlist[name].year_of_passout}
			{/if}
		{/section}
	{/section}
	{else}
		<div class="not_available"><em>Not Available</em></div>
	{/if}
	</td>
	</tr>
</table>
{else}
<form id="edit" method="post" action="{$BASE_URL}myprofile/?edit=education_details">  
<table>
	<tr>
		<td align="right" width="300px">
		<strong>Qualification Level:</strong>
		</td>
		<td style="padding-left:10px;">  
		{if $other_qualification_list == ''}
			<select name="qualification" id="usereditlist">
				<option value="">{$translations.jobs.qualification}</option>
				{section name="c" loop=$list}
					<option value="{$list[c].id}" {if $smarty.post.list== $list[c].id || $user[all].qualification == $list[c].id}selected="selected"{else}{if $user_year == $list[c].id AND !$smarty.post.list AND !$user[all].list}selected="selected"{/if}{/if}>{$list[c].qualification}
					</option>
				{/section}
			</select>
		{else}
			
			<input type="text" name="qualification_outside_ro_where" id="qualification_outside_ro_where" size="40" maxlength="140" {if $smarty.post.qualification_outside_ro_where != '' && $errors_outside.qualification_outside_ro_where == ''}value="{$smarty.post.qualification_outside_ro_where|escape}"{else} value="{$other_qualification_list}" {/if} />
			<div class="sug">{$translations.publish.edu_info}</div>
			</div>
		{/if}
		</td>
		{if $errors.qualification}
			<td><div class="suggestion">{$errors.qualification}</div>
			</td>
		{/if}
	</tr>
	<tr>
	<td align="right" valign="top">
	<strong>Education Specialization:</strong>
	</td>
		<td style="padding-left:5px;">
		{if $other_education_list == ''}
			<select name="education_specialization" id="education"  {if $errors_outside.education_outside_ro_where != 'edu' && $smarty.post.education_outside_ro_where != ''}disabled="disabled"{/if}>
				<option value=""> {$translations.jobs.education}</option>
					{section name="c" loop=$edulist}
					<option value="{$edulist[c].id}"
						{if $smarty.post.education_specialization== $edulist[c].id || $user[all].education_specialization == $edulist[c].id}selected="selected"{else}{if $user_year == $edulist[c].id AND !$smarty.post.education_specialization AND !$user[all].education_specialization}selected="selected"{/if}{/if}>{$edulist[c].name}
					</option>
				{/section}
			</select>
		{else}
			<span style="padding-left:5px;">
			<input type="text" name="education_outside_ro_where" id="education_outside_ro_where" size="40" maxlength="140" {if $smarty.post.education_outside_ro_where != '' && $errors_outside.education_outside_ro_where == ''}value="{$smarty.post.education_outside_ro_where|escape}"{else} value="{$other_education_list}" {/if} />
			<div class="sug">{$translations.publish.edu_info}</div>
			</div>
			</span>
		{/if}
	</td>
		{if $errors.education}
			<td><div class="suggestion">{$errors.education}</div></td>
		{/if}
	</tr>
	<tr>
		<td align="right">
			<strong>Institute Name:</strong>
		</td>
		<td style="padding-left:10px;" > 
			<input type="text" name='institutename' id="usertextbox"  value="{if $user[all].institute_name}{$user[all].institute_name|escape}{else}{$smarty.post.institutename}{/if}">
			{if $errors.institutename}
				<td><div class="suggestion">{$errors.institutename}</div></td>
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" ><strong>Year of Passout:</strong></td>
		<td style="padding-left:10px;">
			<select name="passout"  id="usereditlist">
				<option value="">{$translations.jobs.passoutyear}</option>
				{section name="c" loop=$passoutlist}
					<option value="{$passoutlist[c].id}"{if $smarty.post.passout== $passoutlist[c].id || $user[all].year_of_passout == $passoutlist[c].id}selected="selected"{else}{if $user_year == $passoutlist[c].id AND !$smarty.post.passoutlist AND !$user[all].passoutlist}selected="selected"{/if}{/if}>{$passoutlist[c].year_of_passout}
					</option>
				{/section}
			</select>
		</td>
		{if $errors.passout}
			<td><div class="suggestion">{$errors.passout}</div></td>
		{/if}
	</tr>
</table>
	<div class="update">
		<table>
			<tr>
				<td><input type="submit" class="upadatebutton" value=""/>&nbsp;&nbsp;</td>
				<td><a href="{$BASE_URL}myprofile/"><input type="button" id="button"/></a></td>
			</tr>
		</table>
		<input type="hidden" name="action" value="useredit" />
	</div><!---update closed-->
</form>
{/if}
</div><!--text-->
<div class="steps1">Skills</div>
<div class="icons">
	{if $user[all].city_id != 0}
		{if $skills != skills}
			<a href="{$BASE_URL}myprofile/?edit=skills" title="Edit">
			<img src="{$BASE_URL}_templates/default/img/pencil.png" alt="Edit" /></a>
		{/if}
	{/if}
</div>
<div class="text">
{if $skills != skills}
	<table>
	<tr>
		<td align="right" width="300px;">
		<strong>Skills</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;"> 
			{if !(empty($user[all].skills))}
				{$user[all].skills}
			{else}
				<div class="not_available"><em>Not Available</em></div>
			{/if}
		</td>
	</tr>
	</table> 
	{else}
	<form id="edit" method="post" action="{$BASE_URL}myprofile/?edit=skills">  
	<table>
	<tr>
		<td align="right" width="300px;">
			<strong>Skills:</strong>
		</td>
		<td style="padding-left:10px;">
			<input type="text" name="skills_name" id="usereditskills" value="{if $user[all].skills}{$user[all].skills}{else}{$smarty.post.skills_name}{/if}"/>
		</td>
		<td>
			{if $errors.skills_name}
				<div class="suggestion">{$errors.skills_name}</div>
			{/if}
		</td>
	</tr>
	</table>
		<div class="update">
		<table>
			<tr>
				<td><input type="submit" class="upadatebutton" value=""/>&nbsp;&nbsp;</td>
				<td><a href="{$BASE_URL}myprofile/"><input type="button" id="button"/></a></td>
			</tr>
		</table>
			<input type="hidden" name="action" value="useredit" />
		</div><!---update closed-->
	</form>
{/if}
</div><!--text-->
<div class="steps1">
Resume
	{if $user[all].city_id != 0}
		{if $edit != resume}
			<div id="uploadresumemyprofile">
				<a href="{$BASE_URL}myprofile/?edit=resumedetails" title="Edit">UPLOAD RESUME</a>
			</div>
		{/if}
	{/if}
</div>
<div class="text">
	{if $edit != resume}
	<table>
	{section name="co" }
	{assign var="resume_path" value=$user[co].resume_path}
	{/section}
		<tr> 
			<td align="right" width="300px;">
			<strong>Default Resume</strong>:
			</td>
			<td style="padding-left:10px;" width="300px;"> 
			{if !empty($user[all].resume_path)}
				{section name="co" }
					<a href = "{$BASE_URL}{$user[co].resume_path|escape}" target="_blank">
					{$user[co].resume_path}</a> 
				{/section}   
			{else}
				<div class="not_available"><em>Not Available</em></div>
			{/if}
			</td>
		</tr>
	</table>
	{else}
	<form id="edit" method="post" action="{$BASE_URL}myprofile/?edit=resumedetails" enctype="multipart/form-data">  
		<table>
		<tr>
			<td align="right" width="300px;"><strong>Default Resume:</strong></td>
			<td style="padding-left:10px;">
			<input type="file" name="resume" value="{$user[all].resume_path}"/>
			</td>
			{if $resume_err.resume}
				<td><div class="suggestion">{$resume_err.resume}</div></td>
			{/if}
			{if $resume_err.cv}
				<td><div class="suggestion">{$resume_err.cv}</div></td>
			{/if}
			{if $resume_err.size}
				<td><div class="suggestion">{$resume_err.size}</div></td>
			{/if}	
		</tr>
		</table>
			<div class="update">
				<table>
					<tr>
						<td><input type="submit" class="upadatebutton" value=""/>&nbsp;&nbsp;<td>
						<td><a href="{$BASE_URL}myprofile/"><input type="button" id="button"/></a></td>
					</tr>
				</table>
				<input type="hidden" name="action" value="useredit" />
			</div><!---update closed-->
	</form>
	{/if}
</div><!--text-->
{/section}
<!-- SMS activation box -->
<div id="boxes">
<div id="dialog2" class="window">
	<a href="#" class="close"><img src="{$BASE_URL}_templates/default/img/Close_icon.png" class="btn_closes" title="Close Window" alt="Close" /></a>
	 <div id="pass">Sms Alerts</div>
       <form id="edit" method="post" action="{$BASE_URL}myprofile/" enctype="multipart/form-data">
	 <div id="boxupdate">
	 {section name="co" }
	      <input type="radio" name="sms" value="1" {if $smarty.request.sms eq "1"||$user[co].sms eq "1"}checked{/if}>Activate</br>
	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Active sms Alerts from scan4jobs</br>
	        <br> <input type="radio" name="sms" value="0" {if $smarty.request.sms eq "0" ||$user[co].sms eq "0"}checked{/if}>Deactivate</br>
	       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Deactive sms Alerts from scan4jobs</br>
	  {/section}
	 </div>
	<div id="sms_alerts">
		<input type="submit" class="upadatebutton" value=""/>
		<a href="{$BASE_URL}myprofile/"><input type="button" id="button"/></a>
		<input type="hidden" name="action" value="useredit" />
         </div>
      </form>
</div>
<div id="mask"></div>
</div>
<!-- SMS Activation box closed here -->
{include file='footer.tpl'}