<marquee onmouseover='this.stop();'onmouseout='this.start();'direction="up" height="200"  scrollamount="2">
{foreach item=job from=$latest_jobs}
<div class="{cycle values='ro,ro-alt'}">
	<span class="ro-info">
		<a href="{$BASE_URL}{$URL_JOB}/{$job.id}/{$job.url_title}/" 
			title="{$job.title}" target="_blank">
			<u>{$job.title}</u></a>&nbsp;[{$job.minexp}
			<span class="la"> to </span>{$job.maxexp}
			<span class="la"> Yrs </span>]<span class="scrollcity">[{if $job.is_location_anywhere}, 
			({$translations.jobs.location_anywhere}){else}
			{$job.location}{/if}]</span><br>
			<span>{$job.company}&nbsp;</span>
			
			{*<span class="city">{if $job.is_location_anywhere}, 
			({$translations.jobs.location_anywhere}){else}
			{$job.location}{/if}</span>*}
			
		</span>
		</div>
	{/foreach}</marquee>
