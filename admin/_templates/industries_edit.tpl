{include file="header.tpl"}
	<div id="content">
		<h2 id="industry">Industries - <em>{if $action eq 'add'}New Industry{else}"Edit {$industry.name}"{/if}</em></h2>
		<form id="industry_form" action="{$BASE_URL_ADMIN}industries/{if $action eq 'add'}add/{else}edit/{/if}" method="post">
			<div class="clearfix">
				<div class="left span2 block">
					<h3>{if $action eq 'add'}New Industry{else}Edit {$industry.name}{/if}</h3>
					<div class="block_inner">
						<div class="group{if $errors.name} error{/if}">
							<label>Name</label>
							<input type="text" size="60" name="name" value="{$industry.name}" />
							{if $errors.name}<span class="suggestion">{$errors.name}</span>
							<!-- ERROR MESSAGES NEED TO BE CHANGED IN page_industries.php -->{/if}
						</div>
						<div class="group_submit">
							<a href="{$BASE_URL_ADMIN}industries/" class="button_gray">Cancel</a>
							<button type="submit"><span>{if $action eq 'add'}Save Industry{else}Save Changes{/if}</span></button>
							{if $action eq 'edit'}<input type="hidden" name="id" value="{$industry.id}" />{/if}
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