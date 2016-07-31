{include file='header.tpl'}
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
<div id="profile_body">
	<form id="edit" method="post" action="{$BASE_URL}useredit/" enctype="multipart/form-data">
	{section name=all loop=$user}
	<div class="steps1">Personal Details</div>
	<div id="container_myprofile">
		<div class="profile">
			 <div class="profile3">
				<table>
					<tr>
					<td align="right"><b>Mobile Number</b>:</td>
						<td>
						<input type="num" maxlength="10" value="{if $user[all].contact_number}{$user[all].contact_number}{else}{$smarty.post.contactnumber}{/if}" name="contactnumber">
						{if $errors.contactnumber}<td><div class="suggestion">{$errors.contactnumber}</div></td>{/if}	
						</td>
					</tr>
					<tr>
						<td align="right"><b>Current Location</b>:</td>
						 <td>
							<select name="state" id="state"  onchange="stateFunction(this.value);">
							<option value="">{$translations.jobs.location_anywhere}</option>
							{section name="c" loop=$states}
							<option value="{$states[c].id}" {if $smarty.post.state == $states[c].id || $user[all].state_id == $states[c].id}selected="selected"{else}{if $user_city.id == $states[c].id AND !$smarty.post.state_id AND !$user[all].state_id}selected="selected"{/if}{/if}>{$states[c].name}</option>
							{/section}
							</select>
						</td>
						<td id="cities_list">					
						 	<select name="city" id="city">
							<option value="">{$translations.jobs.location_anywhere}</option>
							{section name="c" loop=$cities}
							{if $cities[c].state_id == $user[all].state_id}
							<option value="{$cities[c].id}" {if $smarty.post.city == $cities[c].id || $user[all].city_id == $cities[c].id}selected="selected"{/if}>{$cities[c].name}</option>
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
						<td align="right"><b>Gender</b>:</td>
						<td>
						<input type="radio" name="gender" value="Male" {if $smarty.request.gender eq "Male" || $user[all].gender eq "Male"}checked{/if}>Male
						<input type="radio" name="gender" value="Female" {if $smarty.request.gender eq "Female" || $user[all].gender eq "Female"}checked{/if}>Female
						</td>
						{if $errors.gender}
						<td><div class="suggestion">
						{$errors.gender}</div>
						</td>{/if}
					</tr>
     
				</table>      
			</div><!--profile3 close--> 
		</div><!---profile close-->
	</div><!--container_myprofile-->	   
	<div id="container_myprofile1">
    		<div class="profile1">
			<div class="profile2">
				<tr>
					<td><strong>Email Id</strong></td><td>:</td><td>
					{section name="co" }{$user[co].email}{/section}
					</td>
				</tr>
				<br/>
				<tr>
				{section name="co" }	
         {assign var="firstname" value=$user[co].firstname}
         {/section}        
	                    <tr>
				{if !empty($firstname)}
					{$user[all].firstname}
				<input type="hidden" name="firstname" value="{$user[all].firstname}">
	                   	{else}
				<td>
				<input type="text" name="firstname" placeholder="First Name" value="{$smarty.post.firstname}">
				</td>
				{/if}
           {section name="co" }	
         {assign var="lastname" value=$user[co].lastname}
         {/section}
				{if !empty($lastname)}
					{$user[all].lastname}
				<input type="hidden" name="lastname" value="{$user[all].lastname}">
				{else}
				<td>
				<input type="text" name="lastname" placeholder="Last Name" value="{$smarty.post.lastname}">
				</td>
				</tr>
				<tr>
				<td>
				{if $errors.firstname}<div class="suggestion">{$errors.firstname}</div>{/if}
					</td>
				</tr>
                              {/if}
				</tr>
    
			</div><!--profile2-->
		</div><!--profile1-->
     </div><!--container_myprofile1-->
         {section name="co" }	
         {assign var="fresher" value=$user[co].category}
         {/section}
{*
step1:fill registration form after do not fill full registration.
    2:fresher will be fill and complete.
    3.experience will be fill and comple.
*}
{if empty($fresher)}
	<div class="steps1">Work Experience</div>
		<div class="data">
		
			<table>
				<tr><td colspan=3"><b>Experience Summary</b></td></tr>
				<tr>
					<td  align="right" width="300px;">
						<strong>Are You</strong>:
					</td >
					<td style="padding-left:10px;" >
						<input type="radio" name="category" id="hide" value="fresher"{if $smarty.request.category eq "fresher"}checked{/if} onclick="$('.intro').hide()">Fresher
						<input type="radio" name="category" id="show" value="experienced"  {if $smarty.request.category eq "experienced"}checked{/if} onclick="$('.intro').hide()">Experienced
					</td>
					<td>
						{if $errors.category}
							<td><div class="suggestion">{$errors.category}</div></td>
						{/if}
				</td>
				</tr>
				 <tr>
					<td align="right"><strong class="intro1">Total experiences:</strong></td>
						<td style="padding-left:10px;">
							<select name="year" id="listdropdown"  class="intro1">
							<option value="">{$translations.jobs.years}</option>
							{section name="c" loop=$year}
							<option value="{$year[c].id}" {if $smarty.post.year == $year[c].id}selected="selected"{/if}>{$year[c].years}
							</option>
							{/section}
							</select>
							<select name="month" id="listdropdown" class="intro1">
							<option value="">{$translations.jobs.months}</option>
							{section name="c" loop=$month}
							<option value="{$month[c].id}" {if $smarty.post.month == $month[c].id}selected="selected"{/if}>{$month[c].months}
							</option>
							{/section}
							</select>
						</td> 
					
					     <td>
						<div class="intro1">
							{if $errors.year}
							<div  class="suggestion">{$errors.year}</div>
							{/if}
						</div>
					     </td>
				</tr>
				<tr>
				  <td align="right">
					   <strong strong class="intro1">Current / Latest Annual Salary:</strong>
				   </td>
				  <td style="padding-left:10px;">
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
			<td colspan="2"><b><p class="intro1">Current / Latest Job Details</b></p></td>
		  </tr>
		  <tr>
			<td align="right" >
				<strong class="intro1">Job Tittle:</strong></td>
				<td style="padding-left:10px;">
					<input type="text" name="job_title" class="intro1" id="usertextbox" onKeypress="return lettersOnly(event);"  value="{$smarty.post.job_title|escape}"/>
				</td>
				<td>
					<div class="intro1">
					 {if $errors.job_title}<div  class="suggestion">{$errors.job_title}</div>{/if}
					</div>
				</td>
		  </tr>
		  <tr>
			<td align="right">
				<strong class="intro1">Company Name:</strong>
			</td>
			<td style="padding-left:10px;">
				<input type="text" name="company_name" class="intro1" id="usertextbox" onKeypress="return lettersOnly(event);"  value="{$smarty.post.company_name|escape}"/>
			</td>
			<td>
				<div class="intro1">
				 {if $errors.company_name}<div  class="suggestion">
				 {$errors.company_name}</div>{/if}
				</div>
			 </td>
		  </tr>
		  <tr>
			<td align="right">
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
				{if $errors.industry}<div  class="suggestion">
				{$errors.industry}</div>{/if}
				</div>
			</td>
		   </tr>
				<tr>
					<td align="right" >
						<strong class="intro1">Functional area of Job:</strong>
					</td> 
					<td style="padding-left:10px;">
						<select name="functional_area" class="intro1" id="usereditlist">
						<option value=""> {$translations.jobs.functional_area}</option>
						{section name="c" loop=$jobslist}
						<option value="{$jobslist[c].id}" {if $smarty.post.functional_area == $jobslist[c].id}selected="selected"{/if}>{$jobslist[c].name}
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
				<td align="right" >
					<strong class="intro1">Duration of Job:</strong>
				</td>
				<td style="padding-left:10px;">
					<select name="job_year" id="listdropdown" class="intro1">
					<option value="">{$translations.jobs.years}</option>
					{section name="c" loop=$year}
					<option value="{$year[c].id}" {if $smarty.post.job_year == $year[c].id}selected="selected"{/if}>{$year[c].years}
					</option>
					{/section}
					</select>
					<select name="job_month" id="listdropdown" class="intro1" >
					<option value="">{$translations.jobs.months}</option>
					{section name="c" loop=$month}
					<option value="{$month[c].id}" {if $smarty.post.job_month == $month[c].id}selected="selected"{/if}>{$month[c].months}
					</option>
					{/section}
					</select>
				</td>
				<td>
					<div class="intro1">
					{if $errors.job_year}<div class="suggestion">{$errors.job_year}</div>{/if}
					</div>
				</td>
		   </tr>
{if $smarty.request.category eq "experienced"}
{*EXPERIENCED CLICK TO SAVE CHANGES *}
			<tr>
				<td align="right" >
					<strong class="intro">Total experiences:</strong>
				</td> 
				<td style="padding-left:10px;" >
					<select name="year" id="listdropdown" class="intro"  >
					<option value="">{$translations.jobs.years}</option>
					{section name="c" loop=$year}
					<option value="{$year[c].id}" {if $smarty.post.year == $year[c].id}selected="selected"{/if}>{$year[c].years}
					</option>
					{/section}
					</select>
					<select name="month" id="listdropdown" class="intro" >
					<option value="">{$translations.jobs.months}</option>
					{section name="c" loop=$month}
					<option value="{$month[c].id}" {if $smarty.post.month == $month[c].id}selected="selected"{/if}>{$month[c].months}
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
					<strong strong class="intro">
					Current / Latest Annual Salary:</strong>
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
				<td style="padding-left:10px;">
					<input type="text" name="job_title" id="usertextbox"
					class="intro"  onKeypress="return lettersOnly(event);"  
					value="{$smarty.post.job_title|escape}"/>
				</td>
				<td>
					<div class="intro">
					{if $errors.job_title}<div  class="suggestion">{$errors.job_title}</div>{/if}
					</div>
				</td>
			</tr>
			<tr>
				<td align="right" >
					<strong class="intro">Company Name:</strong>
				</td>
				<td style="padding-left:10px;">
					<input type="text" name="company_name" class="intro" id="usertextbox" onKeypress="return lettersOnly(event);"  value="{$smarty.post.company_name|escape}"/>
				</td>
				<td>
					<div class="intro">
					{if $errors.company_name}<div  class="suggestion">{$errors.company_name}</div>{/if}
					</div>
				</td>
			
			</tr>
			<tr>
				<td align="right" >
					<strong class="intro">Industry of Company:</strong>
				</td>
				<td style="padding-left:10px;">
					<select name="industry" class="intro"  id="usereditlist">
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
						<select name="functional_area" class="intro" id="usereditlist">
						<option value=""> {$translations.jobs.functional_area}</option>
						{section name="c" loop=$jobslist}
						<option value="{$jobslist[c].id}" {if $smarty.post.functional_area == $jobslist[c].id}selected="selected"{/if}>{$jobslist[c].name}
						</option>
						{/section}
						</select>
					</td>
				 <td>
					<div class="intro">
					{if $errors.job}<div 
						class="suggestion">{$errors.job}</div>
					{/if}
					</div>
				 </td>
			
		      </tr>
		      <tr>
			 <td align="right" >
				<strong class="intro">Duration of Job:</strong> 
			  </td>
				<td style="padding-left:10px;">
					<select name="job_years" id="list1" class="intro" width="130">
					<option value="">{$translations.jobs.years}</option>
					{section name="c" loop=$year}
					<option value="{$year[c].id}" {if $smarty.post.job_years == $year[c].id}selected="selected"{/if}>{$year[c].years}
					</option>
					{/section}
					</select>
					<select name="job_month" id="list1" class="intro" width="130">
					<option value="">{$translations.jobs.months}</option>
					{section name="c" loop=$month}
					<option value="{$month[c].id}" {if $smarty.post.job_month == $month[c].id}selected="selected"{/if}>{$month[c].months}
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
	</div><!---data closed-->
{elseif $fresher==fresher}
	{*
	if you fresher click it will go user edit also experience at the time this loop come 
	*}
	<div class="steps1">Work Experience</div>
	<div class="data">
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
					{section name="c" loop=$year}
					<option value="{$year[c].id}" {if $smarty.post.year == $year[c].id}selected="selected"{/if}>{$year[c].years}
					</option>
					{/section}
					</select>
					<select name="month" id="listdropdown" class="intro1"  >
					<option value="">{$translations.jobs.months}</option>
					{section name="c" loop=$month}
					<option value="{$month[c].id}" {if $smarty.post.month == $month[c].id}selected="selected"{/if}>{$month[c].months}
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
					{section name="c" loop=$jobslist}					<option value="{$jobslist[c].id}" {if $smarty.post.functional_area == $jobslist[c].id}selected="selected"{/if}>{$jobslist[c].name}
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
					{section name="c" loop=$year}
					<option value="{$year[c].id}" {if $smarty.post.job_year == $year[c].id}selected="selected"{/if}>{$year[c].years}
					</option>
					{/section}
					</select>
					<select name="job_month" id="listdropdown"  class="intro1">
					<option value="">{$translations.jobs.months}</option>
					{section name="c" loop=$month}
					<option value="{$month[c].id}" {if $smarty.post.job_month == $month[c].id}selected="selected"{/if}>{$month[c].months}
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
					{section name="c" loop=$year}
					<option value="{$year[c].id}"{if $smarty.post.year == $year[c].id}selected="selected"{/if}>{$year[c].years}
					</option>
					{/section}
					</select>
					<select name="month"id="listdropdown" class="intro" >
					<option value="">{$translations.jobs.months}</option>
					{section name="c" loop=$month}
					<option value="{$month[c].id}" {if $smarty.post.month == $month[c].id}selected="selected"{/if}>{$month[c].months}
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
					<input type="text" name="company_name" class="intro" 
					id="usertextbox" onKeypress="return lettersOnly(event);"  
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
					{section name="c" loop=$jobslist}
					<option value="{$jobslist[c].id}" {if $smarty.post.functional_area == $jobslist[c].id}selected="selected"{/if}>{$jobslist[c].name}
					</option>
					{/section}
					</select>
				</td>
				<td>
					<div class="intro">
						{if $errors.job}<div class="suggestion">{$errors.job}</div>
						{/if}
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
					{section name="c" loop=$year}
					<option value="{$year[c].id}" {if $smarty.post.job_year== $year[c].id}selected="selected"{/if}>{$year[c].years}
					</option>
					{/section}
					</select>
					<select name="job_month" id="listdropdown"class="intro">
					<option value="">{$translations.jobs.months}</option>
					{section name="c" loop=$month}
					<option value="{$month[c].id}" {if $smarty.post.job_month == $month[c].id}selected="selected"{/if}>{$month[c].months}
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
</div><!---data closed--->
{elseif $fresher != fresher}
{* 
if experienced selected it will click user edit it will comes this loop
*}
		<div class="steps1">Work Experience</div>
		<div class="data">
			<table>
			
				<tr>
					<td align="right" width="300px;">
						<input type="hidden" name="category" value="experienced">
						<strong>Total Experience:</strong> 
					</td>
					<td style="padding-left:10px;"  >
						 {assign var="teststring" value =$user[all].total_exp}
						 {assign var="testsplit" value=","|explode:$teststring}
						 <select name="year" id="listdropdown" >
						 <option value="">{$translations.jobs.years}</option>
						 {section name="c" loop=$year}
						 <option value="{$year[c].id}" {if $smarty.post.year == $year[c].id || $testsplit[0] == $year[c].id}selected="selected"{else}{if $user== $year[c].id AND !$smarty.post.year }selected="selected"{/if}{/if}>{$year[c].years}
						 </option>
						 {/section}
						 </select>
						<select name="month" id="listdropdown" >
						<option value="">{$translations.jobs.months}</option>
						{section name="c" loop=$month}
						<option value="{$month[c].id}" {if $smarty.post.month == $month[c].id || $testsplit[1] == $month[c].id}selected="selected"{else}{if $user_total_exp == $month[c].id AND !$smarty.post.total_exp AND !$testsplit[1]}selected="selected"{/if}{/if}>{$month[c].months}
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
						 <input type="text" name="salary" id="largetext" value="{$user[all].salary}"/>
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
						<td>
							<div class="suggestion">{$errors.industry}</div>
						</td>
					{/if}
				</tr>
				<tr>
					<td align="right">
						<strong>Functional Area of the Job:</strong>
					</td>
					<td style="padding-left:10px;">
						<select name="functional_area"  id="usereditlist">
						<option value=""> {$translations.jobs.functional_area}</option>	                                         {section name="c" loop=$jobslist}
						<option value="{$jobslist[c].id}"{if $smarty.post.functional_area== $jobslist[c].id || $user[all].functional_area == $jobslist[c].id}selected="selected"{else}
						{if $user_year == $jobslist[c].id AND !$smarty.post.functional_area AND !$user[all].functional_area}selected="selected"{/if}{/if}>{$jobslist[c].name}
						</option>
						{/section}
						</select>
					</td>
						{if $errors.job}
							<td>
							<div class="suggestion">{$errors.job}
							</div>
							</td>
						{/if}
				</tr>
				<tr>
					<td align="right" >
						<strong>Duration of Job:</strong>
					</td>
					<td style="padding-left:10px;">
						{assign var="teststring" value =$user[all].latest_job_exp}
						{assign var="testsplit" value=","|explode:$teststring}
						{assign var="teststring" value =$user[all].latest_job_exp}
						{assign var="testsplit" value=","|explode:$teststring}
						<select name="job_year" id="listdropdown" >
						<option value="">{$translations.jobs.years}</option>
						{section name="c" loop=$year}
						<option value="{$year[c].id}"{if $smarty.post.latest_job_exp == $year[c].id || $testsplit[0] == $year[c].id}selected="selected"{else}{if $user_latest_job_exp == $year[c].id AND !$smarty.post.latest_job_exp AND !$testsplit[0]}selected="selected"{/if}{/if}>{$year[c].years}
						</option>
                        			{/section}
						</select>
						<select name="job_month" id="listdropdown" >
						<option value="">{$translations.jobs.months}</option>
						{section name="c" loop=$month}
						<option value="{$month[c].id}"{if $smarty.post.latest_job_exp == $month[c].id || $testsplit[1] == $month[c].id}selected="selected"{else}{if $user_latest_job_exp == $month[c].id AND !$smarty.post.latest_job_exp AND !$testsplit[1]}selected="selected"{/if}{/if}>{$month[c].months}
						</option>
						{/section}
						</select>
					   </td>
						{if $errors.job_year}
							<td>
							<div class="suggestion">
							{$errors.job_year}</div>
							</td>
						{/if}
				</tr>
	
			</table>
		</div><!---------data closed------------->
    {/if}
 <div class="steps1">Education Details</div>
	<div class="data">
		<table>
			<tr>
				<td align="right" width="300px">
					<strong>Qualification Level:</strong>
				</td>
				<td style="padding-left:10px;">  
					<select name="qualification" id="usereditlist">
					<option value="">{$translations.jobs.qualification}</option>
					{section name="c" loop=$qualification}
					<option value="{$qualification[c].id}" {if $smarty.post.qualification== $qualification[c].id || $user[all].qualification == $qualification[c].id}selected="selected"{else}{if $user_year == $qualification[c].id AND !$smarty.post.qualification AND !$user[all].qualification}selected="selected"{/if}{/if}>{$qualification[c].qualification}
					</option>
					{/section}
					</select>
				</td>
				{if $errors.qualification}
					<td><div class="suggestion">
					{$errors.qualification}</div>
					</td>
				{/if}
			</tr>
			<tr>
				<td align="right">
					<strong>Education Specialization:</strong>
				</td>
				<td style="padding-left:10px;">
					<select name="education_specialization" id="usereditlist">
					<option value=""> {$translations.jobs.industry}</option>					
					{section name="c" loop=$education_list}
					<option value="{$education_list[c].id}"
					{if $smarty.post.education_specialization== $education_list[c].id || $user[all].education_specialization == $education_list[c].id}selected="selected"{else}{if $user_year == $education_list[c].id AND !$smarty.post.education_specialization AND !$user[all].education_specialization}selected="selected"{/if}{/if}>{$education_list[c].name}
					</option>
					{/section}
					</select>
				</td>
					{if $errors.education}
						<td>
						<div class="suggestion">{$errors.education}</div>
						</td>
					{/if}
			</tr>
			<tr>
				<td align="right">
					<strong>Institute Name:</strong>
				</td>
				<td style="padding-left:10px;" > 
					<input type="text" name='institutename' id="usertextbox"  value="{if $user[all].institute_name}{$user[all].institute_name|escape}{else}{$smarty.post.institutename}{/if}">
					{if $errors.institutename}
						<td>
						<div class="suggestion">{$errors.institutename}</div>
						</td>
					{/if}
				</td>
			</tr>
			<tr>
				<td align="right" >
					<strong>Year of Passout:</strong>
				</td>
				<td style="padding-left:10px;">
					<select name="passout"  id="usereditlist">
					<option value="">{$translations.jobs.passoutyear}</option>
					{section name="c" loop=$year_of_passout}
					<option value="{$year_of_passout[c].id}"{if $smarty.post.passout== $year_of_passout[c].id || $user[all].year_of_passout == $year_of_passout[c].id}selected="selected"{else}{if $user_year == $year_of_passout[c].id AND !$smarty.post.year_of_passout AND !$user[all].year_of_passout}selected="selected"{/if}{/if}>{$year_of_passout[c].year_of_passout}
					</option>
					{/section}
					</select>
				</td>
				{if $errors.passout}
					<td><div class="suggestion">{$errors.passout}</div>
					</td>
				{/if}
			</tr>
	</table>
 </div><!---data closed-->
 <div class="steps1">Skills</div>
 <div class="data">
	{assign var="teststring" value = $user[all].skills }
	{assign var="testsplit" value=","|explode:$teststring}
	<table>
	   <tr>
		<td align="right" width="300px;">
			<strong>Skills:</strong>
		</td>
		<td style="padding-left:10px;">
			<input type="text" name="skills_name" id="usereditskills" value="{if $testsplit[0]}{$testsplit[0]|escape}{else}{$smarty.post.skills_name}{/if}"/>
		</td>
		<td>
		                   <span id="dropdown">
					<select name="skillsexp" id="listexperience" class="intro1">
					<option value="">{$translations.jobs.years}</option>
					{section name="c" loop=$year}
					<option value="{$year[c].id}" {if $smarty.post.skillsexp == $year[c].id}selected="selected"{/if}>
					{$year[c].years}
					</option>
					{/section}
					</select>
			         </span>
				 </td>
				 {if $smarty.request.category eq "experienced"|| $user[all].category eq "experienced"}
				 <td>
				 {section name="co" }
			{assign var=$testsplit[1] value=$user[co].skills}
			{/section}
			{if $testsplit[1] != 0}
			<span id="dropdown">
			<select name="skillsexp" class="intro" id="listdropdown" >
			<option value="">{$translations.jobs.years}</option>
			{section name="c" loop=$year}
			<option value="{$year[c].id}" 
			{if $smarty.post.skillsexp == $year[c].id || $testsplit[1] == $year[c].id}selected="selected"{else}
			{if $user_skillsexp == $year[c].id AND !$smarty.post.skillsexp AND !$testsplit[1]}selected="selected"{/if}{/if}>{$year[c].years}
			</option>
			{/section}
			</select>
			</span>
			{else}
			<span id="dropdown">
					<select name="skillsexp" id="listexperience" class="intro">
					<option value="">{$translations.jobs.years}</option>
					{section name="c" loop=$year}
					<option value="{$year[c].id}" {if $smarty.post.skillsexp == $year[c].id}selected="selected"{/if}>
					{$year[c].years}
					</option>
					{/section}
					</select>
			         </span>
				 {/if}
		</td>
		{/if}
		<td>
		{if $errors.skills_name}
					<div class="suggestion">{$errors.skills_name}</div>
				{/if}
						{if $errors.both}
				    
				    <div class="suggestion">{$errors.both}</div>
				    </td>
			    {/if}
	</tr>
  </table>
</div><!---data closed-->
<div class="steps1">Resume</div>
<div class="data">
   <table>
	<tr>
		<td align="right" width="300px;">
			<strong>Default Resume:</strong>
		</td>
		<td style="padding-left:10px;">
			<input type="file" name="resume" value="{$user[all].resume_path}"/>
			</td>
			{if $errors.resume}
				<td><div class="suggestion">{$errors.resume}</div>
				</td>
			{/if}
			{if $errors.cv}
				<td><div class="suggestion">{$errors.cv}</div></td>
			{/if}
				{if $errors.size}
				<td><div class="suggestion">{$errors.size}</div></td>
			{/if}	
	 </tr>
 </table>
 </div><!---data closed-->
	 <div class="txt">
		 <input type="image" src="{$BASE_URL}_templates/{$THEME}/img/savechanges.png" value=""/>
		 <input type="hidden" name="action" value="useredit" />
	</div><!---txt closed-->
 {/section}
</form>
</div><!---body closed-->
{include file='footer.tpl'}