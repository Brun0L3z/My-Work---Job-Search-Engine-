{include file="header.tpl"}
<div id="content">
	{if $back_link != "not_required"}
	<a href="{$back_link}" title="home">&laquo; go back</a>
	{/if}
	<br/><br/>
{if $user.firstname != ''}
	<b>{$user.firstname}</b> {$translations.user_details.userdetails}
{/if}
<table id="view_details">
	<tr>
		<th colspan="2">{$translations.user_details.personal_details} </th>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.name}</td>
		<td>
			{if $user.firstname != ''}
				{$user.firstname}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.surname} </td>
		<td>
			{if $user.lastname != ''}
				{$user.lastname}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.gender}</td>
		<td>
			{if $user.gender != ''}
				{$user.gender}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.city}</td>
		<td>
			{if $user.city_id != 0}
				{section name="c" loop="$city"}
				{if $city[c].id ==  $user.city_id}
					{$city[c].name}
				{/if}
				{/section}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.state}</td>
		<td>
		{if $user.state_id != 0}
				{section name="c" loop="$states"}
				{if $states[c].id ==  $user.state_id}
					{$states[c].name}
				{/if}
				{/section}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.email}</td>
		<td>
			{if $user.email != ''}
				{$user.email}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.contact_number}</td>
		<td>
			{if $user.contact_number != ''}
				{$user.contact_number}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.sms}</td>
		<td>
			{if $sms == 1} 
				Yes
			{else}
				
				No
			{/if}
		</td>
	</tr>
	<tr>
		<th colspan="2">{$translations.user_details.education_details}</th>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.qualification}</td>
		<td>
			{if $user.qualification != '' }
				{section name="c" loop="$qualification"}
					{if $qualification[c].id ==  $user.qualification}
						{$qualification[c].qualification}
					{/if}
				{/section}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.education_specialization}</td>
		<td>
			{if $user.education_specialization != ''}
				{section name="c" loop="$education_specialization"}
					{if $education_specialization[c].id ==  $user.education_specialization}
						{$education_specialization[c].name}
					{/if}
				{/section}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.instutite_name}</td>
		<td>
			{if $user.institute_name != ''}
				{$user.institute_name}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
		<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.year_of_passout}</td>
		<td>
			{if $user.year_of_passout != 0}
				{section name="c" loop="$passout"}
					{if $passout[c].id ==  $user.year_of_passout}
						{$passout[c].year_of_passout}
					{/if}
				{/section}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<th colspan="2">{$translations.user_details.job_details} </th>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.total_experience}</td>
		<td>
			{assign var="exp" value =$user.total_exp}
			{assign var="testsplit" value=","|explode:$exp}
			{if $user.total_exp != 0}
				{section name="y" loop="$years"}
					{if $years[y].id == $testsplit[0]}
						{if $years[y].years == 1} 
							{$years[y].years} Year
						{else}
							{$years[y].years} Years
						{/if}
					{/if}
				{/section}
				{section name="m" loop="$months"}
					{if $months[m].id == $testsplit[1]}
						{if $months[m].months == 1}
							{$months[m].months} Month
						{else}
							{$months[m].months} Months
						{/if}
					{/if}
				{/section}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.latest_job_experience}</td>
		<td>
			{assign var="exp" value =$user.latest_job_exp}
			{assign var="testsplit" value=","|explode:$exp}
			{if $user.latest_job_exp != 0}
				{section name="y" loop="$years"}
					{if $years[y].id == $testsplit[0]}
						{if $years[y].years == 1} 
							{$years[y].years} Year
						{else}
							{$years[y].years} Years
						{/if}
					{/if}
				{/section}
				{section name="m" loop="$months"}
					{if $months[m].id == $testsplit[1]}
						{if $months[m].months == 1}
							{$months[m].months} Month
						{else}
							{$months[m].months} Months
						{/if}
					{/if}
				{/section}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.company_name}</td>
		<td>
			{if $user.company_name != ''}
				{$user.company_name}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.category}</td>
		<td>
			{if $user.category != ''}
				{$user.category}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.job_title}</td>
		<td>
			{if $user.job_title != ''}
				{$user.job_title}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.salary}</td>
		<td>
			{if $user.salary != 0 }
				{if $user.salary == 1.0 || $user.salary == 1}
					{$user.salary} Lakh
				{else}
					{$user.salary} Lakhs
				{/if}
			
			<!--{assign var="sal" value = $user.salary}
			{assign var="testsplit" value=","|explode:$sal}
			
				{section name="c" loop="$salary"}
					{if $salary[c].id ==  $testsplit[0] }
						{if $salary[c].salary == 1}
							{$salary[c].salary} Lakh
						{else}
							{$salary[c].salary} Lakhs
						{/if}

					{/if}
				{/section}
				{section name="c" loop="$thousands"}
					{if $thousands[c].id == $testsplit[1]}
						{if $thousands[c].salary_thousands == 1} 
							{$thousands[c].salary_thousands} Thousand
						{else}
							{$thousands[c].salary_thousands} Thousands
						{/if}
					{/if}
				{/section}-->
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.industry}</td>
		<td>
			{if $user.industry != 0}
				{section name="c" loop="$industries"}
				{if $industries[c].industry_id ==  $user.industry}
					{$industries[c].name}
				{/if}
				{/section}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>
	<tr>
		<td align="right" style="font-weight:bold;">{$translations.user_details.functional_area}</td>
		<td>
			{if $user.functional_area != 0}
				{section name="c" loop="$area"}
				{if $area[c].id ==  $user.functional_area}
					{$area[c].name}
				{/if}
				{/section}
			{else}
				{$translations.user_details.not_available}
			{/if}
		</td>
	</tr>


</table>
</div><!--content-->
{include file="footer.tpl"}