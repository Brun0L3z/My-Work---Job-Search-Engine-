<table>
  {foreach from=$use item="entry"}
  <tr>
    <td>
      <h4><font color="#0070c0">Hi {$entry.firstname}</font></h4>
     </td>
   </tr>
      {/foreach}
      </table>
   {if $skillsasperjobs}
	<br/>
	<h2>Jobs according to your  Skill Set</h2>
	<br/>
	{foreach item=job from=$skillsasperjobs}
		<div class="{cycle values='row,row-alt'}">
			<span class="row-info">
			
			<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}" target="_blank">{$job.title}</a>,{$job.minexp}
			<span class="la"> to </span>{$job.maxexp}
			<span class="la"> Yrs </span>
			<br/>
			
			<span>{$job.company}&nbsp;</span><span class="city">{if $job.is_location_anywhere}, ({$translations.jobs.location_anywhere}){else}({$job.location}){/if}</span>
			<br/>
			
		<span class="dispaly_job">
			
				{if $job.description|strlen > 130}
					{$job.description|truncate:130}<span style="color:orange">
					<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}" target="_blank">More</a></span>
					
				{else}
				{$job.description}
				{/if}
			</span>
		</span>
		<span class="applicant">
				{if $job.apply != 1}
					{if $job.apply == 0}
						<span style="text-align:center;"><p>0</p></span>
							<p>{$translations.homepage.applicants}</p>
					{else}
						<span style="text-align:center;"><p>{$job.apply}</p></span>
							<p>{$translations.homepage.applicants}</p>

					{/if}
				{else}
				<span style="text-align:center;"><p>{$job.apply}</p></span>
					<p>{$translations.homepage.applicant}</p>
				{/if}
		</span>
		<span class="date">
			{$translations.homepage.posted_date}{$job.created_on}

		</span>
		
		
		</div>
	{/foreach}
	
	<div id="view_all">
			<a href="{$BASE_URL}{$URL_JOBS}/">{$translations.homepage.view_all_jobs}</a>
	</div>
{/if}
	{if !($skillsasperjobs)}
			<div id="skilljobs">
				No Jobs Found In Your Skill Set.
			</div>
	<div id="view_all">
			<a href="{$BASE_URL}{$URL_JOBS}/">{$translations.homepage.view_all_jobs}</a>
	</div>
	 {/if}

{*{if $spotlight_jobs}
	<h2>{$translations.homepage.spotlight_jobs}</h2>
	<br/>
	{foreach item=job from=$spotlight_jobs}
		<div class="row-spot">
			<span class="row-info">
			<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}" target="_blank">{$job.title}</a>,{$job.minexp}
			<span class="la"> to </span>{$job.maxexp}
			<span class="la"> Yrs </span>
			<br/>
			<span>{$job.company}&nbsp;</span><span class="city">{if $job.is_location_anywhere}, ({$translations.jobs.location_anywhere}){else}({$job.location}){/if}</span>
			<br/>
		<span class="dispaly_job">
			{if $job.description|strlen > 130}
				{$job.description|truncate:130}<span style="color:orange">
					<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}" target="_blank">More</a></span>
				{else}
				{$job.description}
			{/if}
			</span>
		</span>
		<span class="applicant">
				{if $job.apply != 1}
					{if $job.apply == 0}
						<span style="text-align:center;"><p>0</p></span>
							<p>{$translations.homepage.applicants}</p>
					{else}
						<span style="text-align:center;"><p>{$job.apply}</p></span>
							<p>{$translations.homepage.applicants}</p>

					{/if}
				{else}
				<span style="text-align:center;"><p>{$job.apply}</p></span>
					<p>{$translations.homepage.applicant}</p>
				{/if}
		</span>
		<span class="date">
			{$translations.homepage.posted_date}{$job.created_on}
		</span>
		</div>
	{/foreach}
{/if}
{if $latest_jobs}
	<br/>
	<h2>{$translations.homepage.recent_jobs}</h2>
	<br/>
	{foreach item=job from=$latest_jobs}
		<div class="{cycle values='row,row-alt'}">
			<span class="row-info">
			<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}" target="_blank">{$job.title}</a>,{$job.minexp}
			<span class="la"> to </span>{$job.maxexp}
			<span class="la"> Yrs </span>
			<br/>
			<span>{$job.company}&nbsp;</span><span class="city">{if $job.is_location_anywhere}, ({$translations.jobs.location_anywhere}){else}({$job.location}){/if}</span>
			<br/>
		<span class="dispaly_job">
			{if $job.description|strlen > 130}
				{$job.description|truncate:130}<span style="color:orange">
				<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}" target="_blank">More</a></span>
			{else}
				{$job.description}
			{/if}
			</span>
		</span>
		<span class="applicant">
				{if $job.apply != 1}
					{if $job.apply == 0}
						<span style="text-align:center;"><p>0</p></span>
						<p>{$translations.homepage.applicants}</p>
					{else}
						<span style="text-align:center;"><p>{$job.apply}</p></span>
						<p>{$translations.homepage.applicants}</p>
					{/if}
				{else}
				<span style="text-align:center;"><p>{$job.apply}</p></span>
					<p>{$translations.homepage.applicant}</p>
				{/if}
		</span>
		<span class="date">
			{$translations.homepage.posted_date}{$job.created_on}
		</span>
		</div>
	{/foreach}
	<div id="view_all">
			<a href="{$BASE_URL}{$URL_JOBS}/">{$translations.homepage.view_all_jobs}</a>
	</div>
{/if}
{if $most_applied_to_jobs}
	<br/>
	<h2>{$translations.homepage.popular_jobs}</h2>
	<br/>
	{foreach item=job from=$most_applied_to_jobs}
		<div class="{cycle values='row,row-alt'}">
			<span class="row-info">
			<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}" target="_blank">{$job.title}</a>,{$job.minexp}
			<span class="la"> to </span>{$job.maxexp}
			<span class="la"> Yrs </span>
			<br/>
			<span>{$job.company}&nbsp;</span><span class="city">{if $job.is_location_anywhere}, ({$translations.jobs.location_anywhere}){else}({$job.location}){/if}</span>
			<br/>
		<span class="dispaly_job">
			{if $job.description|strlen > 130}
				{$job.description|truncate:130}<span style="color:orange">
				<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" title="{$job.title}" target="_blank">More</a></span>
			{else}
				{$job.description}
			{/if}
			</span>
		</span>
		<span class="applicant">
				{if $job.apps != 1}
					{if $job.apps == 0}
						<span style="text-align:center;"><p>0</p></span>
							<p>{$translations.homepage.applicants}</p>
					{else}
						<span style="text-align:center;"><p>{$job.apps}</p></span>
							<p>{$translations.homepage.applicants}</p>
					{/if}
				{else}
				<span style="text-align:center;"><p>{$job.apps}</p></span>
					<p>{$translations.homepage.applicant}</p>
				{/if}
		</span>
		<span class="date">
			{$translations.homepage.posted_date}{$job.created_on}
		</span>
		</div>
	{/foreach}
{/if}*}

{if !$latest_jobs && !$most_applied_to_jobs}
	<p>
		{$translations.homepage.no_jobs}.<br />
	<!--	<a href="{$BASE_URL}post/" title="{$translations.footer.new_job_title}">{$translations.footer.new_job}</a>?-->
	</p>
{/if}