{include file="header.tpl"}
	<div id="content">
			<h2 id="cities">Cities</h2>
			<p><a href="{$BASE_URL_ADMIN}cities/prepare-add/" title="Add a new city"><img src="{$BASE_URL_ADMIN}_templates/img/plus-button.png" alt="Add new city" /></a></p>
			<div  class="icons">
			<strong>Select State</state>
			<form  method="post"action="{$BASE_URL_ADMIN}cities/list/">
			<select name="state_id" id="state_id" onchange="stateFunction(this.value);">
				<option value="">{$translations.jobs.state}</option>
				{section name="c" loop=$states}
				<option value="{$states[c].id}" {if $smarty.post.state_id == $states[c].id }selected="selected"{/if}>{$states[c].name}
				</option>
				{/section}
			</select>
			<input type="submit" name="submit" value="SUBMIT"/>
			{if $state_error}<span class="suggestion">{$state_error}</span>{/if}
			<input type="hidden" name="action" value="state" />
			</form>
			</div>
			<br/>
			<div class="list">
			<table>
				<tr style="font-size:14px;background:#0070c0;color:#ffffff;">
					<th width="100px;">S.No</th>
					<th width="200px;">City</th>
					<th width="200px;">Ascii Name</th>
					<th width="220px;">State</th>
					<th width="100px;">Edit</th>
					<th width="100px;">Delete</th>
				</tr>
					{assign var="id" value="1"}
				{if $cities_list}
					{foreach from=$cities_list item=cities_list}
					<tr class="row {cycle values='odd,even'}" id="item{$cities_list.id}" align="center">
						<td width="100px;">{$id}</td>
						<td width="200px;" style="text-align:left;">{$cities_list.name}</td>
						<td width="200px;" style="text-align:left;">{$cities_list.ascii_name}</td>
						<td width="220px;" style="text-align:left;">
							{section name="c" loop=$states}
								{if $cities_list.state_id == $states[c].id}
									{$states[c].name}
								 {/if}
							{/section}
						</td>
						<td width="100px;"><a href="{$BASE_URL_ADMIN}cities/prepare-edit/{$cities_list.id}/" title="Edit this city"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a></td>
						<td width="100px;"><a href="javascript:void(0);" title="Delete this city" onclick="jobberBase.deleteCity('{$BASE_URL_ADMIN}cities/delete/', {$cities_list.id})"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a></td>
					</tr>
					{assign var="id" value=$id+1}
					{/foreach}		
				{else}
					{foreach from=$cities item=city}
					<tr class="row {cycle values='odd,even'}" id="item{$city.id}" align="center">
						<td width="100px;">{$id}</td>
						<td width="200px;" style="text-align:left;">{$city.name}</td>
						<td width="200px;" style="text-align:left;">{$city.ascii_name}</td>
						<td width="220px;" style="text-align:left;">
							{section name="c" loop=$states}
								{if $city.state_id == $states[c].id}
									{$states[c].name}
								 {/if}
							{/section}
						</td>
						<td width="100px;"><a href="{$BASE_URL_ADMIN}cities/prepare-edit/{$city.id}/" title="Edit this city"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a></td>
						<td width="100px;"><a href="javascript:void(0);" title="Delete this city" onclick="jobberBase.deleteCity('{$BASE_URL_ADMIN}cities/delete/', {$city.id})"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a></td>
					</tr>
					{assign var="id" value=$id+1}
					{/foreach}
				{/if}
			</table>
			</div>
			<p><a href="{$BASE_URL_ADMIN}cities/prepare-add/" title="Add a new city"><img src="{$BASE_URL_ADMIN}_templates/img/plus-button.png" alt="Add new city" /></a></p>
		</div><!-- #content -->

{include file="footer.tpl"}