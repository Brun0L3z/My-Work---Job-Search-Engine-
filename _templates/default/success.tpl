{include file="header.tpl"}
		<div id="content">
		{if $send != ''}
		<div id="warring">
			{$translations.apply.warring}
		</div>
		{else}
		<div id="success">
			{$translations.apply.success}
		</div>
		{/if}
		<div id="job-listings"></div>
		 {section name="co" }
		{assign var="skills" value=$user[co].skills}
		{/section}
		{if (empty($skills))}<br>
		<p style="font-size:18px;color:red;"><em>Please update your skillset for matching jobs</em></p>
                   {if $CURRENT_PAGE != ''}
			<br>
				<a href="{$BASE_URL}" title="{$translations.header.title}">&laquo; {$translations.header.home}</a><br />
			{/if}
	 
		{elseif $skillsasperjobs}
			{include file="home.tpl"}
		
		{else !($skillsasperjobs)}
			{if $CURRENT_PAGE != ''}
			<br>
				<a href="{$BASE_URL}" title="{$translations.header.title}">&laquo; {$translations.header.home}</a><br />
			{/if}
		{/if}
		</div><!-- #content -->
{include file="footer.tpl"}