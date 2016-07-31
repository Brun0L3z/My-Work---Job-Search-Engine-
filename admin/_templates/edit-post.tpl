{include file="header.tpl"}
{literal}
	<script type="text/javascript">
		$(document).ready(state_selectbox_change);
		function state_selectbox_change(){
			$('#state_id').change(update_cities_list);
		}
		function update_cities_list(){
			var state_id=$('#state_id').attr('value');
			$.get('../state.php?state_id='+state_id, show_cities);
		}
		function show_cities(cities){
			$('#cities_list').html(cities);
		}
	</script>
{/literal}
		<div id="content">
		<h2 id="edit_job">{if $job.id == 0}Post a job{else}Edit a job{/if}</h2>
			<div id="job-listings"></div><!-- #job-listings -->
			{if $filter_error}
			<div class="fail">
				{$filter_error}
			</div>
			{/if}
			{if $errors}
			<div class="fail">
				{$translations.publish.form_error}
			</div>
			{/if}
			
			{if $show_preview}
				{include file="edit-post-preview.tpl"}
			{/if}
			<form id="publish_form" method="post" action="{$BASE_URL_ADMIN}edit-post/">
			<div class="clearfix">
				<div class="left span2 block">
					<h3>Job Details</h3>
					<div id="job_details" class="block_inner">
						<!-- <div class="group clearfix category">
							<label>Job Type</label>
						
							 {section name=tmp2 loop=$types}
							<div>
								 <label for="type_id_{$types[tmp2].id}">
									<input class="no-border" type="radio" name="type_id" id="type_id_{$types[tmp2].id}" value="{$types[tmp2].id}" {if !$job.type_id && !$smarty.post.type_id}{if $types[tmp2].id == 1}checked="checked"{/if}{else}{if $types[tmp2].id == $job.type_id}checked="checked"{/if}{if $types[tmp2].id == $smarty.post.type_id}checked="checked"{/if}{/if} />
									<img src="{$BASE_URL}_templates/{$THEME}/img/icon-{$types[tmp2].var_name}.png" alt="{$types[tmp2].name}" />
								</label> 
							</div>
							{/section}

						</div> -->
						<div class="group">
							<label >Category</label>
							<span id="dropdown">
								<select name="category_id" id="listdropdown">
								<option value="">{$translations.jobs.category}</option>
								{section name="c" loop=$categories}
								<option value="{$categories[c].id}" {if $smarty.post.category_id== $categories[c].id || $job.category_id== $categories[c].id }selected="selected"{/if}>{$categories[c].name}
								</option>
								{/section}
								</select>
							</span>
						</div>
						<div class="group{if $errors.title} error{/if}">
							<label for="title">{$translations.publish.title_label}</label>
							<input type="text" name="title" id="title" size="50" value="{if $job.title}{$job.title|escape}{else}{$smarty.post.title|escape}{/if}" />
							<div class="{$translations.publish.title_info}"></div>
						</div>
						<div class="group">
						<table>
							<tr>
								<td>
									<label for="city_id">{$translations.publish.location_label}</label>
								</td>
								<td>
									<select name="state_id" id="state_id" onchange="stateFunction(this.value);">
											<option value="">{$translations.jobs.state}</option>
											{section name="c" loop=$states}
											<option value="{$states[c].id}" {if $smarty.post.state == $states[c].id || $job.state_id== $states[c].id}selected="selected"{/if}>{$states[c].name}
											</option>
											{/section}
									</select>
								</td>
								<td>
								<div id="cities_list">
									<select name="city_id" id="city_id" {if $job.location_outside_ro != ''}disabled="disabled"{/if} class="ml1">
										<option value="0">{$translations.jobs.city}</option>
										{section name="c" loop=$cities}
										{if $job.state_id == $cities[c].state_id }
										<option value="{$cities[c].id}" {if $smarty.post.city_id == $cities[c].id || $job.city_id == $cities[c].id}selected="selected"{else}{if $user_city.id == $cities[c].id AND !$smarty.post.city_id AND !$job.city_id}selected="selected"{/if}{/if}>{$cities[c].name}</option>
										{/if}
										{/section}
									</select>
								</div>
								</td>
							</tr>
						</table>
						</div>
						<div class="group{if $errors.description} error{/if}">
							<label for="description">{$translations.publish.description_label}</label>
							<textarea name="description" id="description" cols="80" rows="15">{if $job.description}{$job.description}{else}{$smarty.post.description}{/if}</textarea>
							<div class="suggestion">
								<a target="_blank" href="http://www.textism.com/tools/textile/" onclick="$('#textile-suggestions').toggle(); return false;">{$translations.publish.description_info}</a>
							</div>

							<div id="textile-suggestions" style="display: none;">
								<table>
									<thead>
										<tr class="odd">
											<th>{$translations.publish.syntax}</th>
											<th>{$translations.publish.result}</th>
										</tr>
									</thead>
									<tbody>
										<tr class="even">
											<td>That is _incredible_</td>
											<td>That is <em>incredible</em></td>
	
										</tr>
										<tr class="odd">
											<td>*Indeed* it is</td>
											<td><strong>Indeed</strong> it is</td>
										</tr>
										<tr class="even">
											<td>"Wikipedia":http://www.wikipedia.org</td>
	
											<td><a href="http://www.wikipedia.org">Wikipedia</a></td>
										</tr>
										<tr class="odd">
											<td>* apples<br />* oranges<br />* pears</td>
											<td>
	
												<ul>
													<li>apples</li>
													<li>oranges</li>
													<li>pears</li>
												</ul>
											</td>
										</tr>
	
										<tr class="even">
											<td># first<br /># second<br /># third</td>
											<td>
												<ol>
													<li>first</li>
													<li>second</li>
	
													<li>third</li>
												</ol>
											</td>
										</tr>
									</tbody>
								</table>
							</div><!-- #textile-suggestions -->


<table>
<!--Skills -->
						<tr>
			<td align="left"  class="publish-label" valign="top">{$translations.publish.skills}:</td>
							<td>
			<input {if $errors.skills}class="error" please {/if} type="text" name="skills"  id="largetext" value="{if $job.company}{$job.skills|escape}{else}{$smarty.post.skills|escape}{/if}" />
								{if $errors.skills}<span class="validation-error">Please fills this<img src="{$BASE_URL}_templates/{$THEME}/img/icon-delete.png" alt="" /></span>{/if}
			</td>
						</tr>
		</div>
<!--Skills closed-->
<!-- Salary Range -->
<tr>
  <td  align="left" width="200px;">Salary per Annual</td>
		{assign var="salspilt" value="."|explode:$job.salary}
		   <td>
		   {if $salspilt[0] != '' && $salspilt[1] != ''}
			<input type="text" id="largetext" name="salary" value="{if $job.company}{$job.salary|escape}{else}{$smarty.post.salary|escape}{/if}">
		   {else}
			<input type="text" id="largetext" name="salary" value="{if $job.company}{$job.salary|escape}.0{else}{$smarty.post.salary|escape}{/if}">
		    {/if}
		   </td>
     	   	   </tr>
			   <tr>
			    <td></td>
			    <td style="padding-left:20px;">Eg:(2.5,3.0lakhs.)</td>
			    </tr>
			    <tr>
			    <td></td>
			    <td>
			   {if $errors.salary}
			    <p style="color:red;">{$errors.salary}</p>
			    {/if}
			   </td>
			    </tr>
<!-- /Salary Range -->
<!-- experience -->
		<tr>
			<td>{$translations.publish.experience}:</td>
		  <td>
			<span id="dropdown">
				<select name="minexp" id="listdropdown">
				<option value="">{$translations.search.minexp}</option>
				{section name="c" loop=$year}
				<option value="{$year[c].id}" {if $smarty.post.minexp == $year[c].id || $job.minexp == $year[c].id }selected{/if}>{$year[c].years}
				</option>
				{/section}
				</select>
			</span>
			<span id="dropdown">
				<select name="maxexp" id="listdropdown">
				<option value="">{$translations.search.maxexp}</option>
				{section name="c" loop=$year}
				<option value="{$year[c].id}" {if $smarty.post.maxexp == $year[c].id || $job.maxexp == $year[c].id}selected="selected"{/if}>{$year[c].years}
				</option>
				{/section}
				</select>
			</span>
			</div>
		   </td>
		   </tr>
		   <tr>
		  <td></td>
                 	   <td>
			   {if $errors.minexp}
			    <p style="color:red;">{$errors.minexp}</p>
			    {elseif $errors.exp}
			  <p style="color:red;">{$errors.exp}</p>
			    
			{/if}
				   </td>
		</tr>
<!--/experience -->
<!-- Qualification -->
						<tr>
							<td >Qualification Level:</td>
							<td>
								<span id="dropdown">
									<select name="qualification" id="list2">
									<option value="">{$translations.jobs.qualification}</option>
									{section name="c" loop=$qualification}
									<option value="{$qualification[c].id}" {if $job.qualification == $qualification[c].id || $smarty.post.qualification == $qualification[c].id}selected="selected"{/if}>{$qualification[c].qualification}
									</option>
									{/section}
									</select>
								</span>
							</td>
							
						</tr>
						<!-- Qualification closed -->
<!-- industry & functional area -->
	<tr>
		<td>{$translations.publish.functional_area}:</td>
		<td>
		  	<span id="dropdown">
			<select name="area" id="list2">/* multiple="yes" size="3">*/
				<option value=""> {$translations.search.area}</option>
					{section name="c" loop=$jobslist}
					<option value="{$jobslist[c].id}" {if $smarty.post.area == $jobslist[c].id || $job.functional_area == $jobslist[c].id}selected{/if}>{$jobslist[c].name}
					</option>
					{/section}
			</select><br/>
			
			</span>
		</td>
	</tr>
	</div>
	<div class="group{if $errors.industry}error{/if}">
	<tr>
		<td>{$translations.publish.industry}:</td>
		<td>
		<span id="dropdown">
		<select name="industry" id="list2">
			<option value=""> {$translations.search.industry}</option>
			{section name="c" loop=$industries}
			<option value="{$industries[c].industry_id}" {if $smarty.post.industry == $industries[c].industry_id || $job.industry == $industries[c].industry_id}selected{/if}>{$industries[c].name}
			</option>
			{/section}
		</select>
		</span>
		</td>
	</tr>
	</table>
<!-- /industry and functional area-->
						</div>
					</div>
				</div>

				<div id="company_info" class="left span1 block last">
					<h3>{$translations.publish.company}</h3>
					<div class="block_inner">
						<div class="group{if $errors.company} error{/if}">
							<label for="company">{$translations.publish.name_label}</label>
							<input type="text" name="company" id="company" size="30" value="{if $job.company}{$job.company|escape}{else}{$smarty.post.company|escape}{/if}" />
						</div>

						<div class="group{if $errors.url} error{/if}">
							<label for="url">{$translations.publish.website_label}</label>
							<em>http://</em><input type="text" name="url" id="url" size="25" value="{if $job.company}{$job.url}{else}{$smarty.post.url}{/if}" />
							<div class="suggestion">{$translations.publish.website_info}</div>
						</div>
	
						<div class="group{if $errors.poster_email} error{/if}">
							<label for="poster_email">{$translations.publish.email_label} <span class="light">({$translations.publish.email_info1})</span></label>
							<input type="text" name="poster_email" id="poster_email" size="30" value="{if $job.poster_email}{$job.poster_email}{else}{$smarty.post.poster_email}{/if}" />
							<div class="suggestion">{$translations.publish.email_info2}</div>
						</div>
	
						<div class="group">
							<label for="apply_online">Allow online applications
							<input type="checkbox" name="apply_online" id="apply_online" class="no-indent" {if $job.apply_online == 1 || $job.id == 0}checked="checked"{/if}{if !isset($job.apply_online)}checked="checked"{/if} /></label><span class="suggestion">If you are unchecking this, then add a description on how to apply online!</span>
						</div>
						
						<div class="group_submit">
							<button type="button" id="preview" class="gray"><span>Preview</span></button>
							<button type="submit" id="save"><span>{if $job.id == 0}Post job{else}Save changes{/if}</span></button>
							<input type="hidden" name="show_preview" id="show_preview" value="false" />
							<input type="hidden" name="job_id" value="{$job.id}" />
						</div>
					</div>
				</div>
			</form>
		</div><!-- /content -->
		
		{literal}
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#type_id_1').focus();
				
				$("#publish_form").validate({
					rules: {
						category_id:{ required: true },
						company: { required: true },
						title: { required: true },
						description: { required: true },
						skills:{ required: true },
						url:{ required: true },
						area:{ required: true},
						qualification:{required: true},
						industry:{required: true},
						state_id:{required: true},
						city_id:{required: true},
						salary:{required: true},
						poster_email: { required: true, email: true }
					},
					messages: {
						category:'',
						company: '',
						title: '',
						location: '',
						description: '',
						poster_email: '',
						skills:'',
						url:'',
						area:'',
						salary:'',
						qualification:'',
						state_id:'',
						city_id:'',
						industry:''
					}
				});
				
				$('#save').bind('click', function()
				{
					$("#publish_form").submit();
				});
				
				$('#preview').bind('click', function()
				{
					$('#show_preview').val('true');
					$("#publish_form").submit();
				});
			});
		</script>
		{/literal}

{include file="footer.tpl"}