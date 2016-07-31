{include file='header.tpl'}
<div id="profile_body">

<div id="container_myprofile">

      <div class="profile">
      <div class="icons1">
      <a href="{$BASE_URL}useredit/{$id}" value="edit" title="Edit">
      <img src="{$BASE_URL}_templates/default/img/pencil.png" alt="Edit"/></a>
    </div> 
     <div class="intext">
    <table>
    
	<tr>
	   <td><strong>Email Id<div class="stats_list"></div></strong></td><td>:<div class="stat_list"></div></td><td>{section name="co" }
				{$user[co].email}
				{/section}
<div class="stats_list"></div>
	   </td>
       </tr>

       <tr>
	   <td><strong>Mobile Number<div class="stat_list"></div></strong></td><td>:<div class="stat_list"></div></td><td>{section name="co" }
				{$user[co].contact_number}
				{/section}<div class="stat_list"></div>
	    </td>
      </tr>
 {section name="co" }
 {assign var="city_id" value=$user[co].city_id}
 {/section}
 {if $city_id != 0}

      <tr>
	      <td><strong>Current Location<div class="stat_list"></div></td><td></strong>:<div class="stat_list"></div></td><td>{section name="co"}
				{section name="name" loop=$cllist}
				{if $user[co].city_id == $cllist[name].id}
				{$cllist[name].name}
				{/if}
				{/section}
				{/section}<div class="stat_list"></div>
				
	      </td>
      </tr>
{else}
             <tr>
	      <td><strong>Current Location<div class="stat_list"></div></td><td></strong>:<div class="stat_list"></div></td><td>
			     <div class="not_available"><em>Not Available</em></div>
				
				<div class="stat_list"></div>
				
	      </td>
      </tr>

  {/if} 

 {section name="co" }
 {assign var="gender" value=$user[co].gender}
 {/section}
 {if !(empty($gender))} 
 
      <tr>
	      <td><strong>Gender<div class="stat_list"></div></strong></td><td>:<div class="stat_list"></div></td><td>{section name="co" }
				{$user[co].gender|ucfirst}
				{/section}<div class="stat_list"></div>
	      </td>
      </tr>

      {else}

      <tr>
	      <td><strong>Gender<div class="stat_list"></div></strong></td><td>:<div class="stat_list"></div></td><td>
				 <div class="not_available"><em>Not Available</em></div>
				<div class="stat_list"></div>

	      </td>

      </tr>
      {/if}
    </table>      
        </div> 
	</div>
 </div>	   
	 
  <div id="container_myprofile1">
    	  
<div class="profile1">
     <div class="profile2">

 {section name="co" }
 {assign var="firstname" value=$user[co].firstname}
 {/section}
 {if !(empty($firstname))}  

		        {section name="co" }
				<strong>{$user[co].firstname}</strong>
			{/section}
  {else}
		  <div class="not_available"><em></em></div>

  {/if}

 {section name="co" }
 {assign var="lastname" value=$user[co].lastname}
 {/section}
 {if !(empty($lastname))}

			       {section name="co" }
				      <strong>{$user[co].lastname}</strong>
				{/section}
  {else}
                       <div class="not_available"><em>User Details Not Available</em></div>

{/if}

{section name="co" }
{assign var="firstname" value=$user[co].firstname}
{/section}
{if (empty($firstname))} 
To Update Your Profile please click On
    <a href="{$BASE_URL}full_registration/{$user.id}/" title="Edit">Continue</a> 
{/if}   
<table>
<tr>
<td>
{section name="co" }
{assign var="fresher" value=$user[co].category}
{assign var="total_exp" value=$user[co].total_exp}
{/section}

{if $fresher != fresher}
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
			,
			{section name="name" loop=$sallist}
				{if $user[co].salary == $sallist[name].id}
				{$sallist[name].salary}
				{/if}
				{/section}
				 Per year
			
			{/section}
			{/if}
			{/if}
</td>
</tr>
</table>
      </div>
 </div>
     
 </div>	
 {section name="co" }
 {assign var="fresher" value=$user[co].category}

 {/section}
 {if $fresher != fresher}
 <div class="steps1">
	   Work Experience
</div>
<div class="icons">
 <a href="{$BASE_URL}useredit/{$user.id}/" title="Edit"><img src="{$BASE_URL}_templates/default/img/pencil.png" alt="Edit" /></a>
</div>
 <div class="text">
<table>
{section name="co" }
{assign var="total_exp" value=$user[co].total_exp}
{/section}
 {if $total_exp != 0}  
      <tr>
       <td align="right" width="300px;"><strong>Total Experience</strong>:</td><td style="padding-left:10px;" width="300px;"> 
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
       

      </td>
      </tr>
      {else}
      <tr>
	        <td align="right" width="300px;"><strong>Total Experience</strong>:</td><td style="padding-left:10px;" width="300px;"> 
				 <div class="not_available"><em>Not Available</em></div>
				
	      </td>

      </tr>
      {/if}
{section name="co" }
 {assign var="salary" value=$user[co].salary}
 {/section}
 {if $salary != 0}  
      
      <tr>

      <td align="right" width="300px;"><strong>Current / Latest Annual Salary</strong>:</td><td style="padding-left:10px;" width="300px;">{section name="co"}
				{section name="name" loop=$sallist}
				{if $user[co].salary == $sallist[name].id}
				{$sallist[name].salary}
				{/if}
				{/section}
				{/section} Per year
      </td>
      </tr>
      {else}
      <tr>

      <td align="right" width="300px;"><strong>Current / Latest Annual Salary</strong>:</td><td style="padding-left:10px;" width="300px;">
			<div class="not_available"><em>Not Available</em></div>	
      </td>
      </tr>
{/if}
 </table>
</div>
{/if}

  <div class="steps1">
	Education Details
  </div>

  <div class="icons"><a href="{$BASE_URL}useredit/{$user.id}/" title="Edit"><img src="{$BASE_URL}_templates/default/img/pencil.png" alt="Edit" /></a>
 </div>
  <div class="text">
<table>

{section name="co" }
 {assign var="qualification" value=$user[co].qualification}
 {/section}
 {if $qualification != 0}  
      <tr>
      <td align="right" width="300px;"><strong>Qualification Level:</strong></td><td style="padding-left:10px;" width="300px;">{section name="co"}
			{section name="name" loop=$list}
				{if $user[co].qualification == $list[name].id}
				{$list[name].qualification}
				{/if}
				{/section}
				{/section}
      </td>
      </tr>

      {else}

       <tr>
      <td align="right" width="300px;"><strong>Qualification Level:</strong></td><td style="padding-left:10px;" width="300px;">
					<div class="not_available"><em>Not Available</em></div>		
				
      </td>
      </tr>
   {/if}

 {section name="co" }
 {assign var="education_specialization" value=$user[co].education_specialization}
 {/section}
 {if $education_specialization != 0}
       <tr>
      <td align="right" width="300px;"><strong>Education Specialization</strong>:</td><td style="padding-left:10px;" width="300px;">
                                {section name="co"}
				{section name="name" loop=$edulist}
				{if $user[co].education_specialization == $edulist[name].id}
				{$edulist[name].name}
				{/if}
				{/section}
				{/section} 
      </td>
      </tr>

      {else}

      <tr>
      <td align="right" width="300px;"><strong>Education Specialization</strong>:</td><td style="padding-left:10px;" width="300px;">
                              <div class="not_available"><em>Not Available</em></div>	  
      </td>
      </tr>
{/if}

 {section name="co" }
 {assign var="institute_name" value=$user[co].institute_name}
 {/section}
 {if !(empty($institute_name))}

      <tr>
      <td align="right" width="300px;"><strong>Institute Name</strong>:</td><td style="padding-left:10px;" width="300px;"> {section name="co" }
				{$user[co].institute_name}
				{/section}   
      </td>
      </tr>
{else}
<tr>
      <td align="right" width="300px;"><strong>Institute Name</strong>:</td><td style="padding-left:10px;" width="300px;"> 
				<div class="not_available"><em>Not Available</em></div>
				 
      </td>
      </tr>
{/if}


{section name="co"}
{assign var="year_of_passout" value=$user[co].year_of_passout}
{/section}
{if $year_of_passout != 0}
      <tr>
      <td align="right" width="300px;"><strong>Year OF Passout</strong> :</td><td style="padding-left:10px;" width="300px;">
                                {section name="co"}
			        {section name="name" loop=$passoutlist}
				{if $user[co].year_of_passout == $passoutlist[name].id}
				{$passoutlist[name].year_of_passout}
				{/if}
				{/section}
				{/section}
      </td>
      </tr>

      {else}
      <tr>
      <td align="right" width="300px;"><strong>Year OF Passout</strong> :</td><td style="padding-left:10px;" width="300px;">
                                  <div class="not_available"><em>Not Available</em></div>
      </td>
      </tr>

 {/if}

 </table>
 </div>
 <div class="steps1">
	SKILLS
  </div>
   <div class="icons"><a href="{$BASE_URL}useredit/{$user.id}/" title="Edit"><img src="{$BASE_URL}_templates/default/img/pencil.png" alt="Edit" /></a>
 </div>
   <div class="text">
 <table>
{section name="co" }
{assign var="skills" value=$user[co].skills}
{/section}
{if !(empty($skills))}

  <tr>
  

      <td align="right" width="300px;"><strong>SKILLS</strong>:</td><td style="padding-left:10px;" width="300px;"> {section name="co" }
				{$user[co].skills}
				{/section}  Yrs  
      </td>
     
     </tr>
     {else}
     <tr>
  

      <td align="right" width="300px;"><strong>SKILLS</strong>:</td><td style="padding-left:10px;" width="300px;">
				<div class="not_available"><em>Not Available</em></div>
       </td>
       </tr>
{/if}
   </table>    

</div>
 <div class="steps1">
	
	Resume 
	<div class="icons"><a href="{$BASE_URL}useredit/{$user.id}/" title="Edit">UPLOAD RESUME</a>
 </div>
</div>
 <div class="text">
 <table>
{section name="co" }
{assign var="resume_path" value=$user[co].resume_path}
{/section}
{if !(empty($skills))}

 <tr> 
     <td align="right" width="300px;"><strong>Default Resume</strong>:</td><td style="padding-left:10px;" width="300px;"> 
            	 {section name="co" }
	<a href = "{$BASE_URL}{$user[co].resume_path|escape}" target="_blank">
			 {$user[co].resume_path}</a> 
			  {/section}   
      </td>
   </tr>

{else}

 <tr> 
     <td align="right" width="300px;"><strong>Default Resume</strong>:</td><td style="padding-left:10px;" width="300px;"> 
            	<div class="not_available"><em>Not Available</em></div>
      </td>
   </tr>

{/if}

 </table>
</div>
</div><!-- profile body ends-->

{include file='footer.tpl'}