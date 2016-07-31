{include file="header.tpl"}
	<div id="content">
		<h2 id="cities">Qualification - <em>{if $action eq 'add'}New Qualification{else}"Edit {$qualification.name}"{/if}</em></h2>
		<form id="qualification_form" action="{$BASE_URL_ADMIN}qualification/{if $action eq 'add'}add/{else}edit/{/if}" method="post">
			<div class="clearfix">
				<div class="left span2 block">
					<h3>{if $action eq 'add'}New Qualification{else}Edit {$qualification.name}{/if}</h3>
					<div class="block_inner">
						<div class="group{if $errors.name} error{/if}">
							<label>Name</label>
							<input type="text" size="60" name="name" value="{$qualification.name}" />
							{if $errors.name}<span class="suggestion">{$errors.name}</span>
							<!-- ERROR MESSAGES NEED TO BE CHANGED IN page_qualification.php -->{/if}
						</div>
						<div class="group_submit">
							<a href="{$BASE_URL_ADMIN}qualification/" class="button_gray">Cancel</a>
							<button type="submit"><span>{if $action eq 'add'}Save Qualification{else}Save changes{/if}</span></button>
							{if $action eq 'edit'}<input type="hidden" name="id" value="{$qualification.id}" />{/if}
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