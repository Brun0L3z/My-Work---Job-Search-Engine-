{include file="header.tpl"}
	<div id="content">
		<h2 id="area">Functional Area - <em>{if $action eq 'add'}New Functional Area{else}"Edit {$area.name}"{/if}</em></h2>
		<form id="area_form" action="{$BASE_URL_ADMIN}area/{if $action eq 'add'}add/{else}edit/{/if}" method="post">
			<div class="clearfix">
				<div class="left span2 block">
					<h3>{if $action eq 'add'}New Qualification{else}Edit {$area.name}{/if}</h3>
					<div class="block_inner">
						<div class="group{if $errors.name} error{/if}">
							<label>Name</label>
							<input type="text" size="60" name="name" value="{$area.name}" />
							{if $errors.name}<span class="suggestion">{$errors.name}</span>
							<!-- ERROR MESSAGES NEED TO BE CHANGED IN page_area.php -->{/if}
						</div>
						<div class="group_submit">
							<a href="{$BASE_URL_ADMIN}area/" class="button_gray">Cancel</a>
							<button type="submit"><span>{if $action eq 'add'}Save Functional Area{else}Save Changes{/if}</span></button>
							{if $action eq 'edit'}<input type="hidden" name="id" value="{$area.id}" />{/if}
						</div>
					</div>
				</div>
				<!--<div class="left span1 block last">
					<h3>Additional information</h3>
					<div class="block_inner">
						<p><strong>Name:</strong> the name of the city that is being used in the text. For example:</p>
						<pre>The Hague</pre>
						<p class="mt1"><strong>Ascii name:</strong> the name of the city that is being used in url's. It must not contain spaces, other special chars and we strongly advice you to keep everything lowercase. For example:</p>
						<pre>the-hague</pre>
					</div>
				</div>-->
			</div>
		</form>
	</div>

{include file="footer.tpl"}