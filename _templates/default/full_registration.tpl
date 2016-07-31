{include file="header.tpl"}
{literal}
<script type="text/javascript">
 function lettersOnly(evt)
 {
	evt = (evt) ? evt : event;
	var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :((evt.which) ? evt.which : 0));
	if ( charCode > 32 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) 
	{
		return false;
	}
	return true;
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
<div id="container">
  <div id="vr">	
    <div class="block_register">
	<br/>
	<div id="sp">
		Complete the information in this page to finish the registration process.  This information helps the recruiters to short list your resume.
	</div>
	 <form  method="post" action="{$BASE_URL}full_registration/" enctype="multipart/form-data">
		<h5>Personal Details</h5>
		<div id="details">
			<table>
			   <tr>
			      <td align="right" width="200px;">Name<span style="color:red;">*</span>:</td>
			      <td>
			      <input type="text" name="name" id="text"  
				     placeholder="First Name" onKeypress="return lettersOnly(event);" value="{$smarty.post.name}"/>
				<input type="text" name="surname" id="text" placeholder="Last Name" onKeypress="return lettersOnly(event);"  value="{$smarty.post.surname}"/></td>
				<td>{if $register_errors.name}
					<div class="suggestion">{$register_errors.name}</div>
					{/if}
				</td>
			   </tr>
			   <tr>
				<td  align="right" width="200px;">Current Location<span style="color:red;">*</span>:</td>
				<td>
				<table>
				  <tr>
					<td style="padding-left:10px;">
					<select name="state" id="state" onchange="stateFunction(this.value);">
					<option value="">{$translations.jobs.state}</option>
					{section name="c" loop=$states}
					<option value="{$states[c].id}" {if $smarty.post.state == $states[c].id }selected="selected"{/if}>{$states[c].name}
					</option>
					{/section}
					</select>&nbsp;&nbsp;&nbsp;
					</td>
				<td id="cities_list">
					<select name="city" id="city">
					<option value="">{$translations.jobs.city}</option>
					{section name="c" loop=$cities}
					{if $cities[c].state_id == $smarty.post.state}
					<option value="{$cities[c].id}" {if $smarty.post.city == $cities[c].id}selected="selected"{/if}>{$cities[c].name}</option>
					{/if}
					{/section}
					</select>
				</td>
				</tr>
				</table>
				</td>
				<td>
					{if $register_errors.location}<div 
					class="suggestion">{$register_errors.location}</div>{/if}
					
				</td>

			</tr>
			<tr>
			   <td  align="right" width="200px;">Gender<span style="color:red;">*</span>:</td>
			   <td>
			      <input type="radio" name="gender" value="male" {if $smarty.request.gender eq "male"}checked{/if}>Male
			      <input type="radio" name="gender" value="female" {if $smarty.request.gender eq "female"}checked{/if}>Female
			   </td>
			   <td>
			   {if $register_errors.gender}
			     <div class="suggestion">{$register_errors.gender}</div>
			  {/if}
			  </td>
			</tr>
		</table>
	</div><!--details closed-->
	<h5>Work Experience</h5>
	<div id="details">
<table>
				<tr><td colspan=3"><b>Experience Summary</b></td></tr>
				<tr>
					<td  align="right" width="200px;">
						Are You<span style="color:red;">*</span>:</td >
					<td>
						<input type="radio" name="fresher" id="hide" value="fresher"{if $smarty.request.fresher eq "fresher"}checked{/if} onclick="$('.intro').hide()">Fresher
						<input type="radio" name="fresher" id="show" value="experienced"  {if $smarty.request.fresher eq "experienced"}checked{/if} onclick="$('.intro').hide()">Experienced
					</td>
					<td>
				{if $register_errors.fresher}
			<div class="suggestion">{$register_errors.fresher}</div>
			{/if}
			</td>
				</tr>
				 <tr>
					<td align="right" class="intro1" width="200px;">Total experiences<span style="color:red;">*</span>:</td>
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
			                            {if $register_errors.year}<div 
				                          class="suggestion">{$register_errors.year}</div>
			                                    {/if}
			                        </div>
					     </td>
				</tr>
				<tr>
				  <td align="right" class="intro1" width="200px;">Current / Latest Annual Salary<span style="color:red;">*</span>:</td>
				<td>
				      <input type="text" name="salary" class="intro1" id="largetext"  value="{$smarty.post.salary|escape}"/>
				</td>
				<td>
					<div class="intro1">
					{if $register_errors.salary}<div 
				class="suggestion">{$register_errors.salary}</div>
			{/if}
					</div>
				</td>
			    </tr>
			    <tr>
			    <td></td>
			    <td style="padding-left:20px;" class="intro1">Eg:(2.5,3.0lakhs.) </td>
			    </tr>
		  <tr>
			<td colspan="2"><b><p class="intro1">Current / Latest Job Details</b></p></td>
		  </tr>
		  <tr>
			<td align="right" class="intro1" width="200px;">Job Tittle<span style="color:red;">*</span>:</td>
				<td><input type="text" name="job_title" class="intro1" id="largetext" onKeypress="return lettersOnly(event);"  value="{$smarty.post.job_title|escape}"/></td>
				<td>
					<div class="intro1">
					 {if $register_errors.jobtitle}</p><div 
					class="suggestion">{$register_errors.jobtitle}</p></div>
				{/if}
					</div>
				</td>
		  </tr>
		  <tr>
			<td align="right" class="intro1" width="200px;">Company Name<span style="color:red;">*</span>:</td>
			<td><input type="text" name="company_name" class="intro1" id="largetext" onKeypress="return lettersOnly(event);"  value="{$smarty.post.company_name|escape}"/></td>
			<td>
				<div class="intro1">
				{if $register_errors.companyname}<div 
					class="suggestion">{$register_errors.companyname}</div>
				{/if}
				</div>
			 </td>
		  </tr>
		  <tr>
			<td align="right" class="intro1" width="200px;">Industry of Company<span style="color:red;">*</span>:</td>
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
				{if $register_errors.industry}<div 
					class="suggestion">{$register_errors.industry}</div>
				{/if}
				</div>
			</td>
		   </tr>
				<tr>
					<td align="right" class="intro1">Functional area of Job<span style="color:red;">*</span>:</td>
					<td style="padding-left:10px;">
						<select name="jobslist" class="intro1" id="usereditlist">
						<option value=""> {$translations.jobs.functional_area}</option>
						{section name="c" loop=$jobslist}
						<option value="{$jobslist[c].id}" {if $smarty.post.jobslist== $jobslist[c].id}selected="selected"{/if}>{$jobslist[c].name}
						</option>
						{/section}
						</select>
					</td>
					<td>
						<div class="intro1">
						{if $register_errors.job}<div 
					class="suggestion">{$register_errors.job}</div>
				{/if}
						</div>
					</td>
				</tr>
			<tr>
				<td align="right" class="intro1">Duration of Job<span style="color:red;">*</span>:</td>
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
					{if $register_errors.duration}<div 
					class="suggestion">{$register_errors.duration}</div>
				{/if}
					</div>
				</td>
		   </tr>
{if $smarty.request.fresher eq "experienced"}
{*EXPERIENCED CLICK TO SAVE CHANGES *}
			<tr>
				<td align="right" class="intro" >Total experiences<span style="color:red;">*</span>:</td>
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
					  {if $register_errors.year}<div 
				                          class="suggestion">{$register_errors.year}</div>
			                                    {/if}
					</div>
				</td>
			</tr>
			<tr>
				<td align="right"  class="intro" >Current/Latest Annual Salary<span style="color:red;">*</span>:</td>
				 
				 <td>  
				 <input type="text" name="salary"  class="intro" id="largetext" value="{$smarty.post.salary|escape}"/>
				</td>
				<td>
				      <div class="intro">
				      {if $register_errors.salary}<div 
				class="suggestion">{$register_errors.salary}</div>
			{/if}
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
				<td align="right" class="intro" >Job Tittle<span style="color:red;">*</span>:</td>
				<td><input type="text" name="job_title" class="intro" id="largetext" onKeypress="return lettersOnly(event);"  value="{$smarty.post.job_title|escape}"/></td>
				<td>
					<div class="intro">
					{if $register_errors.jobtitle}</p><div 
					class="suggestion">{$register_errors.jobtitle}</p></div>
				{/if}
					</div>
				</td>
			</tr>
			<tr>
				<td align="right" class="intro">Company Name<span style="color:red;">*</span>:</td>
				<td><input type="text" name="company_name" class="intro" id="largetext" onKeypress="return lettersOnly(event);"  value="{$smarty.post.company_name|escape}"/></td>
				<td>
					<div class="intro">
					{if $register_errors.companyname}<div 
					class="suggestion">{$register_errors.companyname}</div>
				{/if}
					</div>
				</td>
			
			</tr>
			<tr>
				<td align="right" class="intro" >Industry of Company<span style="color:red;">*</span>:</td>
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
					{if $register_errors.industry}<div 
					class="suggestion">{$register_errors.industry}</div>
				{/if}
					</div>
				</td>
			</tr>
			<tr>
				<td align="right" class="intro" >Functional area of Job<span style="color:red;">*</span>:</td>
					<td style="padding-left:10px;">
						<select name="jobslist" class="intro" id="usereditlist">
						<option value=""> {$translations.jobs.functional_area}</option>
						{section name="c" loop=$jobslist}
						<option value="{$jobslist[c].id}" {if $smarty.post.jobslist == $jobslist[c].id}selected="selected"{/if}>{$jobslist[c].name}
						</option>
						{/section}
						</select>
					</td>
				 <td>
					<div class="intro">
					{if $register_errors.job}<div 
					class="suggestion">{$register_errors.job}</div>
				{/if}
					</div>
				 </td>
			
		      </tr>
		      <tr>
			 <td align="right" class="intro">Duration of Job<span style="color:red;">*</span>:</td>
				<td style="padding-left:10px;">
					<select name="job_year" id="list1" class="intro" width="130">
					<option value="">{$translations.jobs.years}</option>
					{section name="c" loop=$year}
					<option value="{$year[c].id}" {if $smarty.post.job_year == $year[c].id}selected="selected"{/if}>{$year[c].years}
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
				 {if $register_errors.duration}<div 
					class="suggestion">{$register_errors.duration}</div>
				{/if}
				</div>
			     </td>
		       </tr>
		{/if}	
		   </table>
		
	</div><!-- details closed-->
	
	<h5>Education Details</h5>
	<div id="details">
		<table>
		  <tr>
			<td  align="right" width="200px;" valign="top">Qualification Level<span style="color:red;">*</span>:</td>
			<td>
					<span id="dropdown">
					<select name="qualification" id="qualification" class="list2" {if $errors_outside.qualification_outside_ro_where != 'qua' && $smarty.post.qualification_outside_ro_where != ''}disabled="disabled"{/if}>
						<option value=""> {$translations.jobs.qualification}</option>
						{section name="c" loop=$qualification}
						<option value="{$qualification[c].id}" {if $smarty.post.qualification == $qualification[c].id}selected="selected"{/if}>{$qualification[c].qualification}
						</option>
						{/section}
					</select>
					</span>

					<br/>
					&nbsp;&nbsp;&nbsp;<a id="other_qualification_label" href="#" onclick="Jobber.HandleQualificationOutsideRo(); return false;">{if $errors_outside.qualification_outside_ro_where == '' && $smarty.post.qualification_outside_ro_where != ''}{$translations.publish.location_pick_from_list}{else}{$translations.publish.other}{/if}</a>
					<div id="qualification_outside_ro" {if $errors_outside.qualification_outside_ro_where == '' && $smarty.post.qualification_outside_ro_where != ''}style="display: block;"{else}style="display: none;"{/if}>
					<input type="text" name="qualification_outside_ro_where" id="qualification_outside_ro_where" size="40" maxlength="140" {if $errors_outside.qualification_outside_ro_where == '' && $smarty.post.qualification_outside_ro_where != ''}value="{$smarty.post.qualification_outside_ro_where|escape}"{else} value="" {/if} />
					<div class="sug">{$translations.publish.qua_info}</div>
					</div>
			</td>
			<td>
				{if $register_errors.qualification}<div 
					class="suggestion">{$register_errors.qualification}</div>
				{/if}
			 </td>
		  </tr>
		  <tr>
			<td  align="right" width="200px;" valign="top">Education Specialization<span style="color:red;">*</span>:</td>
			<td>
					<span id="dropdown">
					<select name="education" id="education" class="list2" {if $errors_outside.education_outside_ro_where != 'edu' && $smarty.post.education_outside_ro_where != ''}disabled="disabled"{/if}>
					<option value=""> {$translations.jobs.education}</option>
						{section name="c" loop=$education}
							<option value="{$education[c].id}" {if $smarty.post.education == $education[c].id}selected="selected"{/if}>{$education[c].name}
							</option>
						{/section}
					</select>
					</span>
					<br/>
					&nbsp;&nbsp;&nbsp;<a id="other_education_label" href="#" onclick="Jobber.HandleEducationOutsideRo(); return false;">{if $errors_outside.education_outside_ro_where == '' && $smarty.post.education_outside_ro_where != ''}{$translations.publish.location_pick_from_list}{else}{$translations.publish.other}{/if}</a>
					<div id="education_outside_ro" {if $errors_outside.education_outside_ro_where == '' && $smarty.post.education_outside_ro_where != ''}style="display: block;"{else}style="display: none;"{/if}>
					<input type="text" name="education_outside_ro_where" id="education_outside_ro_where" size="40" maxlength="140" {if $smarty.post.education_outside_ro_where != '' && $errors_outside.education_outside_ro_where == ''}value="{$smarty.post.education_outside_ro_where|escape}"{else} value="" {/if} />
					<div class="sug">{$translations.publish.edu_info}</div>
					</div>
			</td>
			<td>
					{if $register_errors.education}<div 
						class="suggestion">{$register_errors.education}</div>
					{/if}
			 </td>
		 </tr>
		  <tr>
			<td  align="right" width="200px;">Year of Passout<span style="color:red;">*</span>:</td>
			<td>
				<span id="dropdown">
					<select name="passout" id="list2">
					<option value=""> {$translations.jobs.passoutyear}</option>
					{section name="c" loop=$passoutlist}
					<option value="{$passoutlist[c].id}" {if $smarty.post.passout == $passoutlist[c].id}selected="selected"{/if}>{$passoutlist[c].year_of_passout}
					</option>
					{/section}
					</select>
				</span>
			</td>
			<td>
				{if $register_errors.passout}<div 
					class="suggestion">{$register_errors.passout}</div>
				{/if}
			 </td>
			
		   </tr>
		   <tr>
			<td  align="right" width="200px;">Institute Name<span style="color:red;">*</span>:</td>
			<td><input type="text" name="institutename" id="largetext" onKeypress="return lettersOnly(event);" value="{if $job.company}{$job.institutename|escape}{else}{$smarty.post.institutename|escape}{/if}"/></td>
			<td>
				{if $register_errors.institutename}<div 
					class="suggestion">{$register_errors.institutename}</div>
				{/if}
			 </td>
		   </tr>
		
		</table>
		
	</div><!-- details closed-->
	<h5>Key Skills</h5>
	<div id="details">
		<table>
		        <tr>
			    <td align="right" width="200px;">
				Key Skill / Experience<span style="color:red;">*</span>:

			    </td>
			   <td>
			   <input type="text" name="skills_name" id="largetext" value="{$smarty.post.skills_name|escape}"/></td>
			    <td>
				{if $register_errors.skills_name}
					<div class="suggestion">{$register_errors.skills_name}</div>
				{/if}
			   </td>
                   </tr>
		</table>
	</div><!-- details closed-->
	
	<h5>Resume</h5>
	<div id="details" id="intro">
		<table>
			<tr>
			     <td  align="right" width="200px;">Upload Resume<span style="color:red;">*</span>:</td>
			     <td><input type="file" name="resume"/></td>
				 <td>
					{if $register_errors.resume}
						<div class="suggestion">{$register_errors.resume}</div>
					{/if}
					{if $register_errors.cv}
						<div class="suggestion">{$register_errors.cv}</div>
					{/if}
					{if $register_errors.size}
						<div class="suggestion">{$register_errors.size}</div>
					{/if}

				 </td>
			</tr>
			<tr>
				<td></td>
				<td> Allowed formats are txt,doc,docx,pdf only. </td>
			</tr>
		        <tr><td></td>
			    <td height="60" >
			    {if $number != ''}
				<input type="hidden" name="number" value="{$number}"/>
			    {else}
				    {section name="number"}
					<input type="hidden" name="number" value="{$continue[number].contact_number}"/>
				    {/section}
			    {/if}
			    {if $email != ''}
                                <input type="hidden" name="email" value="{$email}"/>
			    {else}
				    {section name="email"}
					<input type="hidden" name="email" value="{$continue[email].email}"/>
				    {/section}
			    {/if}
				<input type="image" src="{$BASE_URL}_templates/{$THEME}/img/complete.png" alt="Complete" />
				<input type="hidden" name="action" value="register" />
				
			    </td>
			 </tr>
		</table>
	</div><!-- details closed-->
	</div><!--block register closed-->
</form>
  </div><!-- vr closed -->
</div><!--container closed-->
{include file="footer.tpl"}
