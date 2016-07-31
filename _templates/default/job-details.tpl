{if $login != ''}
<div id="button">
<a href="{$BASE_URL}apply-online/?job_id={$job.id}&user_id={$login}">
		<span>
		<img src="{$BASE_URL}_templates/{$THEME}/img/apply.png" alt="Apply" />
		</span>
	</a>
	</div>
&nbsp;&nbsp;
{else}
<div id="registerandlogin">
<a href="{$BASE_URL}detailregistration/?job_id={$job.id}&title={$job.url_title}" >
<span>
<img src="{$BASE_URL}_templates/{$THEME}/img/register&apply.png" alt="Register&Apply" />
</span>
</a>
&nbsp;&nbsp;

<a href="{$BASE_URL}detaillogin/?job_id={$job.id}&title={$job.url_title}">
<span>
<img src="{$BASE_URL}_templates/{$THEME}/img/login&apply.png" alt="Login&Apply" />
</span>
</a>
</div>
{/if}
<div id="job-details">
	
	{if ($job.days_old > $smarty.const.OLD_JOB_NOTIFY) && ($smarty.const.OLD_JOB_NOTIFY > 0)}
	<div id="old-ad">
		{$translator->translate("apply.old_ad", $smarty.const.OLD_JOB_NOTIFY)}
	</div><!-- closed old-ad -->
	{/if}
	
	<p>
	  <h2>{$job.title}</h2>
	</p>
	<p>Posted:{$job.created_on}</p>
	<table id="job_details">
		<tr>
			<th colspan="2"><p>{$translations.job_details.jobdetails}</p></th>
		</tr>
		<tr>
			<td width="100px"> <b><p>{$translations.job_details.area_of_work}</p></b>
			</td>
			<td width="600px">
				<p>
				{if $job.functional_area != 0}
				{section name="c" loop=$jobslist}
					 {if $job.functional_area == $jobslist[c].id }
						{$jobslist[c].name }
					 {/if}
				{/section}
				{else}
				{$translations.job_details.not_given}
				{/if}
				</p>
		   </td>
		</tr>
		<tr>
			<td width="100px"><b><p>{$translations.job_details.industry}</p></b></td>
			<td width="600px">
				<p>
				{if $job.industry != 0}
				{section name="c" loop=$industries}
					 {if $job.industry == $industries[c].industry_id }
						{$industries[c].name }
					 {/if}
				{/section}
				{else}
				{$translations.job_details.not_given}
				{/if}
				</p>
			
			</td>
		</tr>
		<tr>
			<td><b><p>{$translations.job_details.skills}</p></b></td>
			<td>
				<p>{if $job.skills != ''}
					{$job.skills}
					{else}
					{$translations.job_details.not_given}
					{/if}
				</p>
			<td>
		<tr>
			<td width="100px"><b><p>{$translations.job_details.location}</p></b></td>
			<td width="600px">
				<p>
					
					{if $job.location !=''}
					{$job.location}
					{else}
					{$translations.job_details.not_given}
					{/if}
				</p>
			</td>
		</tr>
		<tr>
			<td width="100px"><b><p>{$translations.job_details.experience}</p></b> </td>
			<td width="600px">
				<p>
				{if $job.minexp != 0 && $job.maxexp !=0}
				 <strong>{$job.minexp}</strong> to  <strong>{$job.maxexp}</strong>years.
				{elseif $job.maxexp != 0 && $job.minexp ==0}
				 <strong>0</strong> to <strong>{$job.maxexp}</strong>years.
				{elseif $job.maxexp == 0 && $job.minexp!=0}
				 <strong>0</strong> t0 <strong>{$job.minexp}</strong>years.
				{else}
				{$translations.job_details.not_given}
				{/if}
				</td>
				</p>
			</td>
		</tr>
		<tr>
			<td width="100px"><b><p>{$translations.job_details.salary}</p></b></td>
			<td width="600px">
				<p>
				{if $job.salary != 0 }
			      <span class="WebRupee">Rs</span>&nbsp;{$job.salary}lakhs.
				{else}
				{$translations.job_details.not_given}
				{/if}
				</p>
			</td>
		</tr>
		
	</table>
	<br/>
	<table id="job_details">
		<tr>
			<th colspan="2"><p>{$translations.job_details.job_description}</p></th>
		</tr>
		<tr>
			<td colspan="2">
				<p>
					{if $job.description != ''}
						{$job.description}
					{else}
					{$translations.job_details.not_given}
					{/if}
				</p>						
		   </td>
		</tr>
	</table>
	<br/>
	<table id="job_details">
		<tr>
			<th colspan="2"><p>{$translations.job_details.company_details}</p></th>
		</tr>
		<tr>
			<td width="100px"><b><p>{$translations.job_details.name}</p></b></td>
			<td width="600px">
				<p>
					{if $job.url && $job.company != ''}
					<a href="http://{$job.url}" target="_blank">{$job.company}</a>
					{elseif $job.company !=''}
					<strong>{$job.company}</strong>
					{else}
					{$translations.job_details.not_given}
					{/if}
					
				</p>						
		   </td>
		</tr>
		<tr>
			<td width="100px"><b><p>{$translations.job_details.website}</p></b></td>
			<td width="600px">
			<p>{if $job.url != ''}
				{$job.url}
				{else}
				{$translations.job_details.not_given}
				{/if}
			</p>						
			</td>
		</tr>
		<tr>
			<td><b><p>{$translations.job_details.email}</p></b></td>
			<td>
			<p>{if $job.poster_email != ''}
				{$job.poster_email}
				{else}
				{$translations.job_details.not_given}
				{/if}
			</p>
			</td>
		</tr>
	</table>
</div><!-- closed job-details -->
	
			
			
				