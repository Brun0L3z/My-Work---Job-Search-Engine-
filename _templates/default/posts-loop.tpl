{if $is_home == 1}
	<div><a href="{$BASE_URL}">&laquo; home</a></div>
{/if}
{if $no_categ != 1}
	<div id="search_result">
		{if $rows != 1 && $rows != 0}
			<P><b>{$rows}</b><a>{$translations.jobs.avilable} for</a><span class="city">{$keywords}</span></P>
		{elseif $rows == 1}
			<P><b>{$rows}</b><a>{$translations.jobs.onejob} for</a><span class="city">{$keywords}</span></P>
		{else}
			<P><b>0</b><a>{$translations.jobs.avilable} for</a><span class="city">{$keywords}</span></P>
		{/if}
	</div>	
	
	
	{if $jobs}
		{include file="jobs-list.tpl"}
	{else}
		<div id="no-ads">
			{if $CURRENT_PAGE != 'search'}
				{$translations.jobs.no_job} <strong>{$current_category_name}</strong>.
				<!--{if $smarty.const.ENABLE_NEW_JOBS}
					<br /><a href="{$BASE_URL}post/" title="{$translations.footer.new_job_title}">{$translations.footer.new_job}</a>
				{/if}-->
			{else}
				{$translations.jobs.no_job_found}<br />
			{/if}
		</div><!-- #no-ads -->
	{/if}
{/if}