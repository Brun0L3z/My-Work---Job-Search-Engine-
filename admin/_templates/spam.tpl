{include file="header.tpl"}
 <div id="content">
     <h3 class="page-heading">Fake Reports</h3>
          <div id="accordion-list">
               <h3>Jobs marked as Fake:</h3> 
                <ul> 
                    <li>Total: {$count_reports}</li> 
                </ul>
		<div id="fakejobs">
           <table  height=160 width=660 style="border:1px solid black;">
		<tr>
		   <th>Total </th>
		   <th> Job Title</th>
                   <th>Company </th> 
			{section name=customer loop=$reports}
			<tr>
			<td bgcolor="#ffffff" >
			      {$reports[customer].counter}
			</td>
			<td bgcolor="#ffffff" >
			<a href="{$BASE_URL_ADMIN}job/{$reports[customer].id}/">{$reports[customer].title}
			</a>
			</td>
			<td bgcolor="#ffffff" >
			      {$reports[customer].company}
			</td>
			</tr>
			{/section}
	   </table>
	   
			    </div><!--#fakejobs-->     
			    </div>
</div><!-- #content -->

{include file="footer.tpl"}