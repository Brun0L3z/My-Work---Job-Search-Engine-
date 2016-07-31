{include file="header.tpl"}
		<div id="content">
	<div id="job-listings"></div>
	{section name="co" }
	{assign var="skills" value=$user[co].skills}
	{/section}
	{if (empty($skills))}<br>
		<p style="font-size:18px;color:red;"><em>Please update your skillset for matching jobs</em></p>
		{if $skillsasperjobs}
		<br/>
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
                  {else}
			{include file="home.tpl"}
		{/if}
		</div><!-- #content -->

{include file="footer.tpl"}