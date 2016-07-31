{include file="header.tpl"}
	<div id="content">
		<h2 id="education">Education Specialization</h2>
			<a href="{$BASE_URL_ADMIN}education/prepare-add/" title="Add a new education specialization"><img src="{$BASE_URL_ADMIN}_templates/img/plus-button.png" alt="Add new education specialization" /></a>
			<br/>
			<div class="list">
			<table>
				<tr style="font-size:14px;background:#0070c0;color:#ffffff;">
					<th width="100px;">S.No</th>
					<th width="400px;">Name</th>
					<th width="100px;">Edit</th>
					<th width="100px;">Delete</th>
				</tr>
					{assign var="id" value="1"}
					{foreach from=$education item=education}
					<tr class="row {cycle values='odd,even'}" id="item{$education.id}" align="center">
						<td width="100px;">{$id}</td>
						<td width="400px;" style="text-align:left;">{$education.name}</td>
						<td width="100px;"><a href="{$BASE_URL_ADMIN}education/prepare-edit/{$education.id}/" title="Edit this education specialization"><img src="{$BASE_URL_ADMIN}_templates/img/pencil.png" alt="Edit" /></a></td>
						<td width="100px;"><a href="{$BASE_URL_ADMIN}education/delete/?id={$education.id}" title="Delete this education specialization" onclick="return confirm('Are you sure you want to delete this qualification?');"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="Delete" /></a>
						</td>
					</tr>
					{assign var="id" value=$id+1}
					{/foreach}		
			</table>
			</div>
			<p><a href="{$BASE_URL_ADMIN}education/prepare-add/" title="Add a new education specialization"><img src="{$BASE_URL_ADMIN}_templates/img/plus-button.png" alt="Add new industry" /></a></p>
		</div><!-- #content -->

{include file="footer.tpl"}