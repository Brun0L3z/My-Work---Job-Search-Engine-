{include file="header.tpl"}
<div id="content">
{if $jobs}
	</br>
	<p style="font-family:arial;color:#0070c0;font-size:20px;">Applied Jobs</p>
	</br>
	{foreach item=job from=$jobs}
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
		
		</div>
	{/foreach}
{else}
<p style="font-family:arial;color:red;font-size:20px;padding-top:25px;" align='center'>YOU HAVE NOT APPLIED FOR ANY JOB</p>
{/if}
</div>
{include file="footer.tpl"}