<?php /* Smarty version 2.6.26, created on 2012-11-09 11:00:00
         compiled from myprofile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ucfirst', 'myprofile.tpl', 145, false),array('modifier', 'explode', 'myprofile.tpl', 298, false),array('modifier', 'escape', 'myprofile.tpl', 492, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
	<script type="text/javascript">
		function activate(){
			confirm("SMS alerts are activated to your mobile");
			window.location.reload();
			return true;
		}
		function deactivate(){
			confirm("SMS alerts are deactivated to your mobile");
			window.location.reload();
			return true;
		}
	</script>
'; ?>

<?php echo '
<script>
$(document).ready(function() {	
	$(\'a[name=modal]\').click(function(e) {
		e.preventDefault();
		var id = $(this).attr(\'href\');
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
		$(\'#mask\').css({\'width\':maskWidth,\'height\':maskHeight});
		$(\'#mask\').fadeIn(1000);	
		$(\'#mask\').fadeTo("slow",0.8);	
		var winH = $(window).height();
		var winW = $(window).width();
              	$(id).css(\'top\',  winH/2-$(id).height()/2);
		$(id).css(\'left\', winW/2-$(id).width()/2);
	   $(id).fadeIn(2000); 
	});
	$(\'.window .close\').click(function (e) {
		e.preventDefault();
		$(\'#mask\').hide();
		$(\'.window\').hide();
	});	
        $(\'#mask\').click(function () {
		$(this).hide();
		$(\'.window\').hide();
	});			
});
</script>
'; ?>

<?php echo '
	<script type="text/javascript">
		$(document).ready(state_selectbox_change);
			function state_selectbox_change(){
				$(\'#state\').change(update_cities_list);
			}
			function update_cities_list(){
				var state=$(\'#state\').attr(\'value\');
				$.get(\'../state.php?state=\'+state, show_cities);
			}
			function show_cities(cities){
				$(\'#cities_list\').html(cities);
			}
	</script>
'; ?>

<?php echo '
	<script type="text/javascript">
		$(document).ready(function()
		{
			  $(".intro1").hide();
			  
		});
	</script>
'; ?>

<?php echo '
	<script type="text/javascript">
		$(document).ready(function()
		{
		  $("#hide").click(function()
		       {
			$(".intro1").hide();
		   
		       });
		    $("#show").click(function()
		    {
			 $(".intro1").show();
		    
		     });
		});
	</script>
'; ?>

<?php unset($this->_sections['all']);
$this->_sections['all']['name'] = 'all';
$this->_sections['all']['loop'] = is_array($_loop=$this->_tpl_vars['user']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['all']['show'] = true;
$this->_sections['all']['max'] = $this->_sections['all']['loop'];
$this->_sections['all']['step'] = 1;
$this->_sections['all']['start'] = $this->_sections['all']['step'] > 0 ? 0 : $this->_sections['all']['loop']-1;
if ($this->_sections['all']['show']) {
    $this->_sections['all']['total'] = $this->_sections['all']['loop'];
    if ($this->_sections['all']['total'] == 0)
        $this->_sections['all']['show'] = false;
} else
    $this->_sections['all']['total'] = 0;
if ($this->_sections['all']['show']):

            for ($this->_sections['all']['index'] = $this->_sections['all']['start'], $this->_sections['all']['iteration'] = 1;
                 $this->_sections['all']['iteration'] <= $this->_sections['all']['total'];
                 $this->_sections['all']['index'] += $this->_sections['all']['step'], $this->_sections['all']['iteration']++):
$this->_sections['all']['rownum'] = $this->_sections['all']['iteration'];
$this->_sections['all']['index_prev'] = $this->_sections['all']['index'] - $this->_sections['all']['step'];
$this->_sections['all']['index_next'] = $this->_sections['all']['index'] + $this->_sections['all']['step'];
$this->_sections['all']['first']      = ($this->_sections['all']['iteration'] == 1);
$this->_sections['all']['last']       = ($this->_sections['all']['iteration'] == $this->_sections['all']['total']);
?>
<div id="container_myprofile">
	<div class="profile">
		<?php if ($this->_tpl_vars['user'][$this->_sections['all']['index']]['city_id'] != 0): ?>
			<?php if ($this->_tpl_vars['personal_details'] != personal_details): ?>
				<div class="icons1">
					<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/?edit=personal_details" value="edit" title="Edit">
					<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/default/img/pencil.png" alt="Edit"/></a>
				</div> 
			<?php endif; ?>
		<?php endif; ?>
		<div class="intext">
			<table>
			<tr>
				<td><strong>Email Id<div class="stats_list"></div></strong></td><td>:&nbsp;<div class="stat_list"></div></td><td><?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
					<?php echo $this->_tpl_vars['user'][$this->_sections['co']['index']]['email']; ?>

					<?php endfor; endif; ?>
					<div class="under_line"></div>
				</td>
			</tr>
			<tr>
				<td><strong>Mobile Number<div class="stat_list"></div></strong></td><td>:&nbsp;<div class="stat_list"></div></td><td><?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
					<?php echo $this->_tpl_vars['user'][$this->_sections['co']['index']]['contact_number']; ?>

					<?php endfor; endif; ?><div class="stat_list"></div>
				</td>
			</tr>
				<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
				<?php $this->assign('city_id', $this->_tpl_vars['user'][$this->_sections['co']['index']]['city_id']); ?>
				<?php endfor; endif; ?>
			<tr>
			<td><strong>Current Location<div class="stat_list"></div></td><td></strong>:&nbsp;<div class="stat_list"></div></td><td>
				<?php if ($this->_tpl_vars['city_id'] != 0): ?>
					<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
						<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['loop'] = is_array($_loop=$this->_tpl_vars['cllist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['name']['show'] = true;
$this->_sections['name']['max'] = $this->_sections['name']['loop'];
$this->_sections['name']['step'] = 1;
$this->_sections['name']['start'] = $this->_sections['name']['step'] > 0 ? 0 : $this->_sections['name']['loop']-1;
if ($this->_sections['name']['show']) {
    $this->_sections['name']['total'] = $this->_sections['name']['loop'];
    if ($this->_sections['name']['total'] == 0)
        $this->_sections['name']['show'] = false;
} else
    $this->_sections['name']['total'] = 0;
if ($this->_sections['name']['show']):

            for ($this->_sections['name']['index'] = $this->_sections['name']['start'], $this->_sections['name']['iteration'] = 1;
                 $this->_sections['name']['iteration'] <= $this->_sections['name']['total'];
                 $this->_sections['name']['index'] += $this->_sections['name']['step'], $this->_sections['name']['iteration']++):
$this->_sections['name']['rownum'] = $this->_sections['name']['iteration'];
$this->_sections['name']['index_prev'] = $this->_sections['name']['index'] - $this->_sections['name']['step'];
$this->_sections['name']['index_next'] = $this->_sections['name']['index'] + $this->_sections['name']['step'];
$this->_sections['name']['first']      = ($this->_sections['name']['iteration'] == 1);
$this->_sections['name']['last']       = ($this->_sections['name']['iteration'] == $this->_sections['name']['total']);
?>
							<?php if ($this->_tpl_vars['user'][$this->_sections['co']['index']]['city_id'] == $this->_tpl_vars['cllist'][$this->_sections['name']['index']]['id']): ?>
							<?php echo $this->_tpl_vars['cllist'][$this->_sections['name']['index']]['name']; ?>

							<?php endif; ?>
						<?php endfor; endif; ?>,
						<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['loop'] = is_array($_loop=$this->_tpl_vars['states']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['name']['show'] = true;
$this->_sections['name']['max'] = $this->_sections['name']['loop'];
$this->_sections['name']['step'] = 1;
$this->_sections['name']['start'] = $this->_sections['name']['step'] > 0 ? 0 : $this->_sections['name']['loop']-1;
if ($this->_sections['name']['show']) {
    $this->_sections['name']['total'] = $this->_sections['name']['loop'];
    if ($this->_sections['name']['total'] == 0)
        $this->_sections['name']['show'] = false;
} else
    $this->_sections['name']['total'] = 0;
if ($this->_sections['name']['show']):

            for ($this->_sections['name']['index'] = $this->_sections['name']['start'], $this->_sections['name']['iteration'] = 1;
                 $this->_sections['name']['iteration'] <= $this->_sections['name']['total'];
                 $this->_sections['name']['index'] += $this->_sections['name']['step'], $this->_sections['name']['iteration']++):
$this->_sections['name']['rownum'] = $this->_sections['name']['iteration'];
$this->_sections['name']['index_prev'] = $this->_sections['name']['index'] - $this->_sections['name']['step'];
$this->_sections['name']['index_next'] = $this->_sections['name']['index'] + $this->_sections['name']['step'];
$this->_sections['name']['first']      = ($this->_sections['name']['iteration'] == 1);
$this->_sections['name']['last']       = ($this->_sections['name']['iteration'] == $this->_sections['name']['total']);
?>
							<?php if ($this->_tpl_vars['user'][$this->_sections['co']['index']]['state_id'] == $this->_tpl_vars['states'][$this->_sections['name']['index']]['id']): ?>
							<?php echo $this->_tpl_vars['states'][$this->_sections['name']['index']]['name']; ?>

							<?php endif; ?>
						<?php endfor; endif; ?>
					<?php endfor; endif; ?>
				<div class="under_line"></div>
				<?php else: ?>
					<div class="not_available"><em>Not Available</em></div>
					<div class="stat_list"></div>
				<?php endif; ?> 
			</td>
			</tr>
				<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
				<?php $this->assign('gender', $this->_tpl_vars['user'][$this->_sections['co']['index']]['gender']); ?>
				<?php endfor; endif; ?>
			<tr>
				<td>
				<strong>Gender<div class="stat_list"></div></strong></td><td>:&nbsp;<div class="stat_list"></div></td><td>
				<?php if (! ( empty ( $this->_tpl_vars['gender'] ) )): ?> 
				<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['user'][$this->_sections['co']['index']]['gender'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>

				<?php endfor; endif; ?><div class="under_line"></div>
				<?php else: ?>
					<div class="not_available"><em>Not Available</em></div>
					<div class="stat_list"></div>
				<?php endif; ?>
				</td>
			</tr>
			
			<tr>
				<td colspan="3">
					<strong>Recieve SMS Alerts </strong>&nbsp;
					<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
					<?php if ($this->_tpl_vars['user'][$this->_sections['co']['index']]['sms'] == 1): ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/default/img/checkmark.png"/><?php else: ?><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/default/img/deactive.gif"/><?php endif; ?><a href="#dialog2" name="modal">&nbsp;change</a>
					<?php endfor; endif; ?>
				</td>
			</tr>
			</table>      
		</div><!--intext--> 
	</div><!--profile-->
</div><!---container myprofile-->
<div id="container_myprofile1">
	<div class="profile1">
		<div class="profile2">
		<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
			<?php $this->assign('firstname', $this->_tpl_vars['user'][$this->_sections['co']['index']]['firstname']); ?>
			<?php if (! ( empty ( $this->_tpl_vars['firstname'] ) )): ?>  
				<strong><?php echo $this->_tpl_vars['user'][$this->_sections['co']['index']]['firstname']; ?>
</strong>
			<?php else: ?>
				<div class="not_available"><em>User Details Not Available</em></div>
				To Update Your Profile please click On
				<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
full_registration/" title="Continue">Continue</a>
			<?php endif; ?>
				<strong><?php echo $this->_tpl_vars['user'][$this->_sections['co']['index']]['lastname']; ?>
</strong>
		<?php endfor; endif; ?>
		<br/><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
changepassword/" title="Change Password" ><span style="font-size:14px;color:#0070C0;padding-top:5px;">Change password</span></a>
		</div>
	</div>
</div><!--container_myprofile1-->
<?php if ($this->_tpl_vars['personal_details'] == personal_details): ?>
<div class="steps1">Personal Details</div>
<div class="text">
	<form id="edit" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/?edit=personal_details">
		<table>
		<tr>
			<td align="right" width="300px;">
				<strong>Mobile Number:</strong></td>
			<td style="padding-left:10px;">
				<input type="num" maxlength="10" value="<?php if ($_POST['contactnumber'] != ''): ?><?php echo $_POST['contactnumber']; ?>
<?php else: ?><?php echo $this->_tpl_vars['user'][$this->_sections['all']['index']]['contact_number']; ?>
<?php endif; ?>" name="contactnumber">
				<?php if ($this->_tpl_vars['errors']['contactnumber']): ?><td><div class="suggestion"><?php echo $this->_tpl_vars['errors']['contactnumber']; ?>
</div></td><?php endif; ?>	
			</td>
		</tr>
		<tr>
			<td align="right" width="300px;">
			<strong>Current Location</strong>:</td>
			<td style="padding-left:7px;">
				<select name="state" id="state"  onchange="stateFunction(this.value);">
				<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['state']; ?>
</option>
					<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['states']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
						<option value="<?php echo $this->_tpl_vars['states'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['state'] == $this->_tpl_vars['states'][$this->_sections['c']['index']]['id'] || $this->_tpl_vars['user'][$this->_sections['all']['index']]['state_id'] == $this->_tpl_vars['states'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php else: ?><?php if ($this->_tpl_vars['user_city']['id'] == $this->_tpl_vars['states'][$this->_sections['c']['index']]['id'] && ! $_POST['state_id'] && ! $this->_tpl_vars['user'][$this->_sections['all']['index']]['state_id']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['states'][$this->_sections['c']['index']]['name']; ?>
</option>
					<?php endfor; endif; ?>
				</select>
			</td>
			<td id="cities_list">				
				<select name="city" id="city">
				<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['city']; ?>
</option>
					<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['cllist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
						<?php if ($this->_tpl_vars['cllist'][$this->_sections['c']['index']]['state_id'] == $this->_tpl_vars['user'][$this->_sections['all']['index']]['state_id']): ?>
							<option value="<?php echo $this->_tpl_vars['cllist'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['city'] == $this->_tpl_vars['cllist'][$this->_sections['c']['index']]['id'] || $this->_tpl_vars['user'][$this->_sections['all']['index']]['city_id'] == $this->_tpl_vars['cllist'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['cllist'][$this->_sections['c']['index']]['name']; ?>
</option>
						<?php endif; ?>
					<?php endfor; endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php if ($this->_tpl_vars['errors']['city']): ?>
					<div class="cityerror">
						<?php echo $this->_tpl_vars['errors']['city']; ?>

					</div>
				<?php endif; ?>
			</td>
		</tr>
			<tr>
				<td align="right" width="300px;"><strong>Gender</strong>:</td>
				<td style="padding-left:10px;">
					<input type="radio" name="gender" value="Male" <?php if ($_REQUEST['gender'] == 'Male' || $this->_tpl_vars['user'][$this->_sections['all']['index']]['gender'] == 'Male'): ?>checked<?php endif; ?>>Male
					<input type="radio" name="gender" value="Female" <?php if ($_REQUEST['gender'] == 'Female' || $this->_tpl_vars['user'][$this->_sections['all']['index']]['gender'] == 'Female'): ?>checked<?php endif; ?>>Female
				</td>
				<?php if ($this->_tpl_vars['errors']['gender']): ?>
					<td><div class="suggestion">
					<?php echo $this->_tpl_vars['errors']['gender']; ?>
</div>
					</td>
				<?php endif; ?>
			</tr>
		</table>    
	<div class="update">
		<table>
			<tr>
				<td><input type="submit" class="upadatebutton" value=""/>&nbsp;&nbsp;</td>
				<td><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/"><input type="button" id="button"/></a></td>
			</tr>
		</table>
		<input type="hidden" name="action" value="useredit" />
	</div><!---update closed-->
</div><!-- text box closed-->
</form>
<?php endif; ?>
<div class="steps1">
	Work Experience
</div>
<?php if ($this->_tpl_vars['user'][$this->_sections['all']['index']]['city_id'] != 0): ?>
	<?php if ($this->_tpl_vars['category'] != category): ?>
		<div class="icons">
			<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/?edit=category" title="Edit"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/default/img/pencil.png" alt="Edit" /></a>
		</div>
	<?php endif; ?>
<?php endif; ?>
<div class="text">
<?php if ($this->_tpl_vars['category'] != category): ?>
<table>
	<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
		<?php $this->assign('fresher', $this->_tpl_vars['user'][$this->_sections['co']['index']]['category']); ?>
	<?php endfor; endif; ?>
<?php if (( empty ( $this->_tpl_vars['fresher'] ) )): ?>
	<tr>
		<td align="right" width="300px;"><strong>Experience</strong>:</td>
		<td style="padding-left:10px;" width="300px;"><div class="not_available"><em>Not Available</em></div>	
		</td>
	</tr>
	<?php elseif ($this->_tpl_vars['fresher'] == fresher): ?>
	<tr>
		<td align="right" width="300px;">
			<strong>Experience</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;">
			<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
				<?php echo $this->_tpl_vars['user'][$this->_sections['co']['index']]['category']; ?>

			<?php endfor; endif; ?>   
		</td>
	</tr>
	<?php else: ?>
		<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
			<?php $this->assign('total_exp', $this->_tpl_vars['user'][$this->_sections['co']['index']]['total_exp']); ?>
		<?php endfor; endif; ?>
	<tr>
		<td align="right" width="300px;">
			<strong>Total Experience</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;"> 
		<?php if ($this->_tpl_vars['total_exp'] != 0): ?> 
			<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
				<?php $this->assign('teststring', $this->_tpl_vars['user'][$this->_sections['co']['index']]['total_exp']); ?>
				<?php $this->assign('testsplit', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['teststring']) : explode($_tmp, $this->_tpl_vars['teststring']))); ?>
				<?php unset($this->_sections['y']);
$this->_sections['y']['name'] = 'y';
$this->_sections['y']['loop'] = is_array($_loop=($this->_tpl_vars['years'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['y']['show'] = true;
$this->_sections['y']['max'] = $this->_sections['y']['loop'];
$this->_sections['y']['step'] = 1;
$this->_sections['y']['start'] = $this->_sections['y']['step'] > 0 ? 0 : $this->_sections['y']['loop']-1;
if ($this->_sections['y']['show']) {
    $this->_sections['y']['total'] = $this->_sections['y']['loop'];
    if ($this->_sections['y']['total'] == 0)
        $this->_sections['y']['show'] = false;
} else
    $this->_sections['y']['total'] = 0;
if ($this->_sections['y']['show']):

            for ($this->_sections['y']['index'] = $this->_sections['y']['start'], $this->_sections['y']['iteration'] = 1;
                 $this->_sections['y']['iteration'] <= $this->_sections['y']['total'];
                 $this->_sections['y']['index'] += $this->_sections['y']['step'], $this->_sections['y']['iteration']++):
$this->_sections['y']['rownum'] = $this->_sections['y']['iteration'];
$this->_sections['y']['index_prev'] = $this->_sections['y']['index'] - $this->_sections['y']['step'];
$this->_sections['y']['index_next'] = $this->_sections['y']['index'] + $this->_sections['y']['step'];
$this->_sections['y']['first']      = ($this->_sections['y']['iteration'] == 1);
$this->_sections['y']['last']       = ($this->_sections['y']['iteration'] == $this->_sections['y']['total']);
?>
					<?php if ($this->_tpl_vars['years'][$this->_sections['y']['index']]['id'] == $this->_tpl_vars['testsplit'][0]): ?>
						<?php echo $this->_tpl_vars['years'][$this->_sections['y']['index']]['years']; ?>
 Years
					<?php endif; ?>
				<?php endfor; endif; ?>
				<?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=($this->_tpl_vars['months'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['m']['show'] = true;
$this->_sections['m']['max'] = $this->_sections['m']['loop'];
$this->_sections['m']['step'] = 1;
$this->_sections['m']['start'] = $this->_sections['m']['step'] > 0 ? 0 : $this->_sections['m']['loop']-1;
if ($this->_sections['m']['show']) {
    $this->_sections['m']['total'] = $this->_sections['m']['loop'];
    if ($this->_sections['m']['total'] == 0)
        $this->_sections['m']['show'] = false;
} else
    $this->_sections['m']['total'] = 0;
if ($this->_sections['m']['show']):

            for ($this->_sections['m']['index'] = $this->_sections['m']['start'], $this->_sections['m']['iteration'] = 1;
                 $this->_sections['m']['iteration'] <= $this->_sections['m']['total'];
                 $this->_sections['m']['index'] += $this->_sections['m']['step'], $this->_sections['m']['iteration']++):
$this->_sections['m']['rownum'] = $this->_sections['m']['iteration'];
$this->_sections['m']['index_prev'] = $this->_sections['m']['index'] - $this->_sections['m']['step'];
$this->_sections['m']['index_next'] = $this->_sections['m']['index'] + $this->_sections['m']['step'];
$this->_sections['m']['first']      = ($this->_sections['m']['iteration'] == 1);
$this->_sections['m']['last']       = ($this->_sections['m']['iteration'] == $this->_sections['m']['total']);
?>
					<?php if ($this->_tpl_vars['months'][$this->_sections['m']['index']]['id'] == $this->_tpl_vars['testsplit'][1]): ?>
						<?php echo $this->_tpl_vars['months'][$this->_sections['m']['index']]['months']; ?>
 Months
					<?php endif; ?>
				<?php endfor; endif; ?>
			<?php endfor; endif; ?>
		<?php else: ?>
			<div class="not_available"><em>Not Available</em></div>
		<?php endif; ?>
		</td>
	</tr>
		<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
			<?php $this->assign('salary', $this->_tpl_vars['user'][$this->_sections['co']['index']]['salary']); ?>
		<?php endfor; endif; ?>
	<tr>
		<td align="right" width="300px;">
			<strong>Current / Latest Annual Salary</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;">
			<?php if ($this->_tpl_vars['salary'] != 0): ?> 
				<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
					<span class="WebRupee">Rs</span><?php echo $this->_tpl_vars['user'][$this->_sections['co']['index']]['salary']; ?>
lakhs.
				<?php endfor; endif; ?>
			<?php else: ?>
				<div class="not_available"><em>Not Available</em></div>
			<?php endif; ?>
		</td>
	</tr>     
		<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
			<?php $this->assign('job_title', $this->_tpl_vars['user'][$this->_sections['co']['index']]['job_title']); ?>
		<?php endfor; endif; ?>
	<tr>
		<td align="right" width="300px;"><strong>Job Title</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;"> 
			<?php if (! ( empty ( $this->_tpl_vars['job_title'] ) )): ?>
				<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
					<?php echo $this->_tpl_vars['user'][$this->_sections['co']['index']]['job_title']; ?>

				<?php endfor; endif; ?>   
			<?php else: ?>
				<div class="not_available"><em>Not Available</em></div>
			<?php endif; ?>
		</td>
	</tr>
		<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
		<?php $this->assign('company_name', $this->_tpl_vars['user'][$this->_sections['co']['index']]['company_name']); ?>
		<?php endfor; endif; ?>
	<tr>
		<td align="right" width="300px;">
			<strong>Company Name</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;">
			<?php if (! ( empty ( $this->_tpl_vars['job_title'] ) )): ?>
				<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
					<?php echo $this->_tpl_vars['user'][$this->_sections['co']['index']]['company_name']; ?>

				<?php endfor; endif; ?>   
			<?php else: ?>
				<div class="not_available"><em>Not Available</em></div>
			<?php endif; ?>
		</td>
	</tr>
		<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
			<?php $this->assign('industry', $this->_tpl_vars['user'][$this->_sections['co']['index']]['industry']); ?>
		<?php endfor; endif; ?>
	<tr>
		<td align="right" width="300px;">
			<strong>Industry of company:</strong>
		</td>
		<td style="padding-left:10px;" width="300px;">
		<?php if ($this->_tpl_vars['industry'] != 0): ?> 
			<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
				<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['loop'] = is_array($_loop=$this->_tpl_vars['industries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['name']['show'] = true;
$this->_sections['name']['max'] = $this->_sections['name']['loop'];
$this->_sections['name']['step'] = 1;
$this->_sections['name']['start'] = $this->_sections['name']['step'] > 0 ? 0 : $this->_sections['name']['loop']-1;
if ($this->_sections['name']['show']) {
    $this->_sections['name']['total'] = $this->_sections['name']['loop'];
    if ($this->_sections['name']['total'] == 0)
        $this->_sections['name']['show'] = false;
} else
    $this->_sections['name']['total'] = 0;
if ($this->_sections['name']['show']):

            for ($this->_sections['name']['index'] = $this->_sections['name']['start'], $this->_sections['name']['iteration'] = 1;
                 $this->_sections['name']['iteration'] <= $this->_sections['name']['total'];
                 $this->_sections['name']['index'] += $this->_sections['name']['step'], $this->_sections['name']['iteration']++):
$this->_sections['name']['rownum'] = $this->_sections['name']['iteration'];
$this->_sections['name']['index_prev'] = $this->_sections['name']['index'] - $this->_sections['name']['step'];
$this->_sections['name']['index_next'] = $this->_sections['name']['index'] + $this->_sections['name']['step'];
$this->_sections['name']['first']      = ($this->_sections['name']['iteration'] == 1);
$this->_sections['name']['last']       = ($this->_sections['name']['iteration'] == $this->_sections['name']['total']);
?>
					<?php if ($this->_tpl_vars['user'][$this->_sections['co']['index']]['industry'] == $this->_tpl_vars['industries'][$this->_sections['name']['index']]['industry_id']): ?>
						<?php echo $this->_tpl_vars['industries'][$this->_sections['name']['index']]['name']; ?>

					<?php endif; ?>
				<?php endfor; endif; ?>
			<?php endfor; endif; ?>
		<?php else: ?>
				<div class="not_available"><em>Not Available</em></div>		
		<?php endif; ?>
		</td>
	</tr>
		<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
			<?php $this->assign('functional_area', $this->_tpl_vars['user'][$this->_sections['co']['index']]['functional_area']); ?>
		<?php endfor; endif; ?>
	<tr>
		<td align="right" width="300px;">
			<strong>Functional Area of Job:</strong>
		</td>
		<td style="padding-left:10px;" width="300px;">
		<?php if ($this->_tpl_vars['functional_area'] != 0): ?> 
			<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
				<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['loop'] = is_array($_loop=$this->_tpl_vars['area']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['name']['show'] = true;
$this->_sections['name']['max'] = $this->_sections['name']['loop'];
$this->_sections['name']['step'] = 1;
$this->_sections['name']['start'] = $this->_sections['name']['step'] > 0 ? 0 : $this->_sections['name']['loop']-1;
if ($this->_sections['name']['show']) {
    $this->_sections['name']['total'] = $this->_sections['name']['loop'];
    if ($this->_sections['name']['total'] == 0)
        $this->_sections['name']['show'] = false;
} else
    $this->_sections['name']['total'] = 0;
if ($this->_sections['name']['show']):

            for ($this->_sections['name']['index'] = $this->_sections['name']['start'], $this->_sections['name']['iteration'] = 1;
                 $this->_sections['name']['iteration'] <= $this->_sections['name']['total'];
                 $this->_sections['name']['index'] += $this->_sections['name']['step'], $this->_sections['name']['iteration']++):
$this->_sections['name']['rownum'] = $this->_sections['name']['iteration'];
$this->_sections['name']['index_prev'] = $this->_sections['name']['index'] - $this->_sections['name']['step'];
$this->_sections['name']['index_next'] = $this->_sections['name']['index'] + $this->_sections['name']['step'];
$this->_sections['name']['first']      = ($this->_sections['name']['iteration'] == 1);
$this->_sections['name']['last']       = ($this->_sections['name']['iteration'] == $this->_sections['name']['total']);
?>
					<?php if ($this->_tpl_vars['user'][$this->_sections['co']['index']]['functional_area'] == $this->_tpl_vars['area'][$this->_sections['name']['index']]['id']): ?>
						<?php echo $this->_tpl_vars['area'][$this->_sections['name']['index']]['name']; ?>

					<?php endif; ?>
				<?php endfor; endif; ?>
			<?php endfor; endif; ?>
			<?php else: ?>
			<div class="not_available"><em>Not Available</em></div>		
		<?php endif; ?>
		</td>
	</tr>
	<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
	<?php $this->assign('jobexp', $this->_tpl_vars['user'][$this->_sections['co']['index']]['latest_job_exp']); ?>
	<?php endfor; endif; ?>
	<tr>
		<td align="right" width="300px;">
		<strong>Duration of Job</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;"> 
			<?php if ($this->_tpl_vars['total_exp'] != 0): ?> 
				<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
					<?php $this->assign('teststring', $this->_tpl_vars['user'][$this->_sections['co']['index']]['latest_job_exp']); ?>
					<?php $this->assign('testsplit', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['teststring']) : explode($_tmp, $this->_tpl_vars['teststring']))); ?>
					<?php unset($this->_sections['y']);
$this->_sections['y']['name'] = 'y';
$this->_sections['y']['loop'] = is_array($_loop=($this->_tpl_vars['years'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['y']['show'] = true;
$this->_sections['y']['max'] = $this->_sections['y']['loop'];
$this->_sections['y']['step'] = 1;
$this->_sections['y']['start'] = $this->_sections['y']['step'] > 0 ? 0 : $this->_sections['y']['loop']-1;
if ($this->_sections['y']['show']) {
    $this->_sections['y']['total'] = $this->_sections['y']['loop'];
    if ($this->_sections['y']['total'] == 0)
        $this->_sections['y']['show'] = false;
} else
    $this->_sections['y']['total'] = 0;
if ($this->_sections['y']['show']):

            for ($this->_sections['y']['index'] = $this->_sections['y']['start'], $this->_sections['y']['iteration'] = 1;
                 $this->_sections['y']['iteration'] <= $this->_sections['y']['total'];
                 $this->_sections['y']['index'] += $this->_sections['y']['step'], $this->_sections['y']['iteration']++):
$this->_sections['y']['rownum'] = $this->_sections['y']['iteration'];
$this->_sections['y']['index_prev'] = $this->_sections['y']['index'] - $this->_sections['y']['step'];
$this->_sections['y']['index_next'] = $this->_sections['y']['index'] + $this->_sections['y']['step'];
$this->_sections['y']['first']      = ($this->_sections['y']['iteration'] == 1);
$this->_sections['y']['last']       = ($this->_sections['y']['iteration'] == $this->_sections['y']['total']);
?>
						<?php if ($this->_tpl_vars['years'][$this->_sections['y']['index']]['id'] == $this->_tpl_vars['testsplit'][0]): ?>
							<?php echo $this->_tpl_vars['years'][$this->_sections['y']['index']]['years']; ?>
 Years
						<?php endif; ?>
					<?php endfor; endif; ?>
					<?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=($this->_tpl_vars['months'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['m']['show'] = true;
$this->_sections['m']['max'] = $this->_sections['m']['loop'];
$this->_sections['m']['step'] = 1;
$this->_sections['m']['start'] = $this->_sections['m']['step'] > 0 ? 0 : $this->_sections['m']['loop']-1;
if ($this->_sections['m']['show']) {
    $this->_sections['m']['total'] = $this->_sections['m']['loop'];
    if ($this->_sections['m']['total'] == 0)
        $this->_sections['m']['show'] = false;
} else
    $this->_sections['m']['total'] = 0;
if ($this->_sections['m']['show']):

            for ($this->_sections['m']['index'] = $this->_sections['m']['start'], $this->_sections['m']['iteration'] = 1;
                 $this->_sections['m']['iteration'] <= $this->_sections['m']['total'];
                 $this->_sections['m']['index'] += $this->_sections['m']['step'], $this->_sections['m']['iteration']++):
$this->_sections['m']['rownum'] = $this->_sections['m']['iteration'];
$this->_sections['m']['index_prev'] = $this->_sections['m']['index'] - $this->_sections['m']['step'];
$this->_sections['m']['index_next'] = $this->_sections['m']['index'] + $this->_sections['m']['step'];
$this->_sections['m']['first']      = ($this->_sections['m']['iteration'] == 1);
$this->_sections['m']['last']       = ($this->_sections['m']['iteration'] == $this->_sections['m']['total']);
?>
						<?php if ($this->_tpl_vars['months'][$this->_sections['m']['index']]['id'] == $this->_tpl_vars['testsplit'][1]): ?>
							<?php echo $this->_tpl_vars['months'][$this->_sections['m']['index']]['months']; ?>
 Months
						<?php endif; ?>
					<?php endfor; endif; ?>
				<?php endfor; endif; ?>
			<?php else: ?>
				<div class="not_available"><em>Not Available</em></div>
			<?php endif; ?>
		</td>
	</tr>
<?php endif; ?>
</table>
<?php else: ?>
	<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>	
	<?php $this->assign('fresher', $this->_tpl_vars['user'][$this->_sections['co']['index']]['category']); ?>
	<?php endfor; endif; ?>
<form id="edit" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/?edit=category">  
<?php if ($this->_tpl_vars['fresher'] == fresher): ?>
<table>
	<tr>
		<td  align="right" width="300px;">
			<strong>Are You</strong><span style="color:red;">*</span>:
		</td>
		<td style="padding-left:10px;">
			<input type="radio" name="category" id="hide" value="fresher"<?php if ($_REQUEST['category'] == 'fresher' || $this->_tpl_vars['user'][$this->_sections['all']['index']]['category'] == 'fresher'): ?>checked<?php endif; ?> onclick="$('.intro').hide()">Fresher
			<input type="radio" name="category" id="show" value="experienced" <?php if ($_REQUEST['category'] == 'experienced' || $this->_tpl_vars['user'][$this->_sections['all']['index']]['category'] == 'experienced'): ?>checked<?php endif; ?> onclick="$('.intro').hide()">Experienced
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro1">Total experiences:</strong></td> 
		<td style="padding-left:10px;">
			<select name="year" id="listdropdown" class="intro1" >
			<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['years']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['years']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['year'] == $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['years']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
			<select name="month" id="listdropdown" class="intro1"  >
			<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['months']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['months']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['month'] == $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['months']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		</td>
		<td>
			<div class="intro1">
				<?php if ($this->_tpl_vars['errors']['year']): ?><div class="suggestion">
				<?php echo $this->_tpl_vars['errors']['year']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong class="intro1">Current / Latest Annual Salary:</strong>
		</td>
		<td style="padding-left:10px;" >
			<input type="text" name="salary" class="intro1" id="largetext" value="<?php echo ((is_array($_tmp=$_POST['salary'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
		</td>
		<td>
			<div class="intro1">
				<?php if ($this->_tpl_vars['errors']['salary']): ?><div  class="suggestion"><?php echo $this->_tpl_vars['errors']['salary']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td></td>
		<td style="padding-left:20px;" class="intro1">Eg:2.5lakhs. </td>
	</tr>
	<tr>
		<td colspan="2">
			<b><p class="intro1">Current / Latest Job Details</b></p>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro1">Job Tittle:</strong>
		</td>
		<td style="padding-left:10px;" >
			<input type="text" name="job_title" class="intro1" 
			id="usertextbox" onKeypress="return lettersOnly(event);"  
			value="<?php echo ((is_array($_tmp=$_POST['job_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
		</td>
		<td>
			<div class="intro1">
				<?php if ($this->_tpl_vars['errors']['job_title']): ?><div  class="suggestion"><?php echo $this->_tpl_vars['errors']['job_title']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
	<td align="right" >
	<strong class="intro1">Company Name:</strong>
	</td>
		<td style="padding-left:10px;">
			<input type="text" name="company_name" class="intro1" id="usertextbox" 
		onKeypress="return lettersOnly(event);"  value="<?php echo ((is_array($_tmp=$_POST['company_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
		</td>
		<td>
			<div class="intro1">
				<?php if ($this->_tpl_vars['errors']['company_name']): ?><div  class="suggestion"><?php echo $this->_tpl_vars['errors']['company_name']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro1">Industry of Company:</strong> 
		</td>
		<td style="padding-left:10px;">
			<select name="industry" class="intro1" id="usereditlist">
			<option value=""> <?php echo $this->_tpl_vars['translations']['jobs']['industry']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['industries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['industries'][$this->_sections['c']['index']]['industry_id']; ?>
" <?php if ($_POST['industry'] == $this->_tpl_vars['industries'][$this->_sections['c']['index']]['industry_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['industries'][$this->_sections['c']['index']]['name']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		</td>
		<td>
			<div class="intro1">
				<?php if ($this->_tpl_vars['errors']['industry']): ?><div  class="suggestion"><?php echo $this->_tpl_vars['errors']['industry']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro1">Functional area of Job:</strong>
		</td>
		<td style="padding-left:10px;">
			<select name="functional_area" class="intro1"  id="usereditlist">
			<option value=""> <?php echo $this->_tpl_vars['translations']['jobs']['functional_area']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['area']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['area'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['functional_area'] == $this->_tpl_vars['area'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['area'][$this->_sections['c']['index']]['name']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		</td>
		<td>
			<div class="intro1">
				<?php if ($this->_tpl_vars['errors']['job']): ?><div class="suggestion"><?php echo $this->_tpl_vars['errors']['job']; ?>
</div>
				<?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong class="intro1">Duration of Job:</strong>
		</td> 
		<td style="padding-left:10px;" >
			<select name="job_year" id="listdropdown" class="intro1">
			<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['years']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['years']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['job_year'] == $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['years']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
			<select name="job_month" id="listdropdown"  class="intro1">
			<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['months']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['months']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['job_month'] == $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['months']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		</td>
		<td>
			<div class="intro1">
				<?php if ($this->_tpl_vars['errors']['job_year']): ?><div  class="suggestion"><?php echo $this->_tpl_vars['errors']['job_year']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<?php if ($_REQUEST['category'] == 'experienced' || $this->_tpl_vars['user'][$this->_sections['all']['index']]['category'] == 'experienced'): ?>
		<tr>
		<td align="right">
			<strong class="intro">Total experiences:</strong>
		</td> 
		<td style="padding-left:10px;">
			<select name="year" id="listdropdown" class="intro">
			<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['years']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['years']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']; ?>
"<?php if ($_POST['year'] == $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['years']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
			<select name="month"id="listdropdown" class="intro" >
			<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['months']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['months']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['month'] == $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['months']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		</td>
		<td>
			<div class="intro">
				<?php if ($this->_tpl_vars['errors']['year']): ?><div  class="suggestion"><?php echo $this->_tpl_vars['errors']['year']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro">Current / Latest Annual Salary:</strong>
		</td>
		<td style="padding-left:10px;">
			<input type="text" name="salary" class="intro" id="largetext" value="<?php echo ((is_array($_tmp=$_POST['salary'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
		</td>
		<td>
		<div class="intro">
			<?php if ($this->_tpl_vars['errors']['salary']): ?><div  class="suggestion"><?php echo $this->_tpl_vars['errors']['salary']; ?>
</div><?php endif; ?>
		</div>
		</td>
	</tr>
	<tr>
		<td></td>
		<td style="padding-left:20px;" class="intro">Eg:2.5lakhs. </td>
	</tr>
	<tr>
		<td colspan="2">
			<b><p class="intro">Current / Latest Job Details</b></p>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro">Job Tittle:</strong>
		</td>
		<td style="padding-left:10px;" >
			<input type="text" name="job_title" class="intro" id="usertextbox" onKeypress="return lettersOnly(event);"  value="<?php echo ((is_array($_tmp=$_POST['job_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
		</td>
		<td>
			<div class="intro">
				<?php if ($this->_tpl_vars['errors']['job_title']): ?><div  class="suggestion"><?php echo $this->_tpl_vars['errors']['job_title']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong class="intro">Company Name:</strong>
		</td>
		<td style="padding-left:10px;" >
			<input type="text" name="company_name" class="intro" id="usertextbox" onKeypress="return lettersOnly(event);"  
			value="<?php echo ((is_array($_tmp=$_POST['company_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
		</td>
		<td>
			<div class="intro">
				<?php if ($this->_tpl_vars['errors']['company_name']): ?>
			<div  class="suggestion">
				<?php echo $this->_tpl_vars['errors']['company_name']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong class="intro">Industry of company :</strong>
		</td>
		<td style="padding-left:10px;" > 
			<select name="industry" class="intro" id="usereditlist">
			<option value=""> <?php echo $this->_tpl_vars['translations']['jobs']['industry']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['industries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['industries'][$this->_sections['c']['index']]['industry_id']; ?>
" <?php if ($_POST['industry'] == $this->_tpl_vars['industries'][$this->_sections['c']['index']]['industry_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['industries'][$this->_sections['c']['index']]['name']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		</td>
		<td>
			<div class="intro">
				<?php if ($this->_tpl_vars['errors']['industry']): ?><div  class="suggestion"><?php echo $this->_tpl_vars['errors']['industry']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro">Functional area of Job:</strong>
		</td>
		<td style="padding-left:10px;">
			<select name="functional_area" class="intro"  id="usereditlist">
			<option value=""> <?php echo $this->_tpl_vars['translations']['jobs']['functional_area']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['area']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['area'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['functional_area'] == $this->_tpl_vars['area'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['area'][$this->_sections['c']['index']]['name']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		</td>
		<td>
			<div class="intro">
				<?php if ($this->_tpl_vars['errors']['job']): ?><div class="suggestion"><?php echo $this->_tpl_vars['errors']['job']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td align="right" >
			<strong class="intro">Duration of Job:</strong>
		</td>
		<td style="padding-left:10px;">
			<select name="job_year" id="listdropdown" class="intro"  >
			<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['years']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['years']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['job_year'] == $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['years']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
			<select name="job_month" id="listdropdown"class="intro">
			<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['months']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['months']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['job_month'] == $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['months']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		</td>
		<td>
			<div class="intro">
				<?php if ($this->_tpl_vars['errors']['job_year']): ?><div  class="suggestion"><?php echo $this->_tpl_vars['errors']['job_year']; ?>
</div><?php endif; ?>
			</div>
		</td>
	</tr>
	<?php endif; ?>	
</table>
<?php elseif ($this->_tpl_vars['fresher'] != fresher): ?>
<table>
	<tr>
		<td align="right" width="300px;">
			<input type="hidden" name="category" value="experienced">
			<strong>Total Experience:</strong> 
		</td>
		<td style="padding-left:10px;">
		<?php $this->assign('teststring', $this->_tpl_vars['user'][$this->_sections['all']['index']]['total_exp']); ?>
		<?php $this->assign('testsplit', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['teststring']) : explode($_tmp, $this->_tpl_vars['teststring']))); ?>
		<select name="year" id="listdropdown" >
		<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['years']; ?>
</option>
			<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['years']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
				<option value="<?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['year'] == $this->_tpl_vars['years'][$this->_sections['c']['index']]['id'] || $this->_tpl_vars['testsplit'][0] == $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php else: ?><?php if ($this->_tpl_vars['user'] == $this->_tpl_vars['year'][$this->_sections['c']['index']]['id'] && ! $_POST['year']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['years']; ?>

				</option>
			<?php endfor; endif; ?>
		</select>
		<select name="month" id="listdropdown" >
		<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['months']; ?>
</option>
			<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['months']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
				<option value="<?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['month'] == $this->_tpl_vars['months'][$this->_sections['c']['index']]['id'] || $this->_tpl_vars['testsplit'][1] == $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php else: ?><?php if ($this->_tpl_vars['user_total_exp'] == $this->_tpl_vars['month'][$this->_sections['c']['index']]['id'] && ! $_POST['total_exp'] && ! $this->_tpl_vars['testsplit'][1]): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['months']; ?>

				</option>
			<?php endfor; endif; ?>
		</select>
	</td>	
		<?php if ($this->_tpl_vars['errors']['year']): ?>
			<td>
				<div class="suggestion"><?php echo $this->_tpl_vars['errors']['year']; ?>
</div>
			</td>
		<?php endif; ?>
	</tr>
	<tr>
		<td align="right">
			<strong>Current / Latest Annual Salary:</strong>
		</td>
		<td style="padding-left:10px;">
		<?php $this->assign('salspilt', ((is_array($_tmp=".")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['user'][$this->_sections['all']['index']]['salary']) : explode($_tmp, $this->_tpl_vars['user'][$this->_sections['all']['index']]['salary']))); ?>
		<?php if ($this->_tpl_vars['salspilt'][0] != '' && $this->_tpl_vars['salspilt'][1] != ''): ?>
			<input type="text" name="salary" id="largetext" value="<?php echo $this->_tpl_vars['user'][$this->_sections['all']['index']]['salary']; ?>
"/>
		<?php else: ?>
			<input type="text" name="salary" id="largetext" value="<?php echo $this->_tpl_vars['user'][$this->_sections['all']['index']]['salary']; ?>
.0"/>
		<?php endif; ?>
		</td>
		<?php if ($this->_tpl_vars['errors']['salary']): ?>
			<td>
				<div class="suggestion"><?php echo $this->_tpl_vars['errors']['salary']; ?>
</div>
			</td>
		<?php endif; ?>
	</tr>
	<tr>
		<td></td>
		<td style="padding-left:20px;">Eg:2.5lakhs. </td>
	</tr>
	<tr>
		<td colspan="2">
			<b><strong>Current / Latest Job Details</strong>
		</td>
	</tr>
	<tr>		
		<td align="right">
			<strong>Job Title:</strong>
		</td>
		<td style="padding-left:10px;">
			<input type="text" name="job_title"  id="usertextbox" onKeypress="return lettersOnly(event);"  value="<?php echo $this->_tpl_vars['user'][$this->_sections['all']['index']]['job_title']; ?>
"/>
		</td>
		<td>
			<div class="intro1">
				<?php if ($this->_tpl_vars['register_errors']['jobtitle']): ?></p><div 
				class="suggestion"><?php echo $this->_tpl_vars['register_errors']['jobtitle']; ?>
</p></div>
				<?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong>Company Name:</strong>
		</td>
		<td style="padding-left:10px;">
			<input type="text" name="company_name" id="usertextbox" onKeypress="return lettersOnly(event);"  value="<?php echo $this->_tpl_vars['user'][$this->_sections['all']['index']]['company_name']; ?>
"/>
		</td>
		<td>
			<?php if ($this->_tpl_vars['register_errors']['companyname']): ?><div 
			class="suggestion"><?php echo $this->_tpl_vars['register_errors']['companyname']; ?>
</div>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td align="right">
			<strong>Industry of company :</strong>
		</td>
		<td style="padding-left:10px;"> 
			<select name="industry"  id="usereditlist">
			<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['industry']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['industries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['industries'][$this->_sections['c']['index']]['industry_id']; ?>
" <?php if ($_POST['industry'] == $this->_tpl_vars['industries'][$this->_sections['c']['index']]['industry_id'] || $this->_tpl_vars['user'][$this->_sections['all']['index']]['industry'] == $this->_tpl_vars['industries'][$this->_sections['c']['index']]['industry_id']): ?>selected="selected"<?php else: ?><?php if ($this->_tpl_vars['user'] == $this->_tpl_vars['industries'][$this->_sections['c']['index']]['industry_id'] && ! $_POST['industry'] && ! $this->_tpl_vars['user'][$this->_sections['all']['index']]['industry']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['industries'][$this->_sections['c']['index']]['name']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		</td>
		<?php if ($this->_tpl_vars['errors']['industry']): ?>
			<td><div class="suggestion"><?php echo $this->_tpl_vars['errors']['industry']; ?>
</div></td>
		<?php endif; ?>
	</tr>
	<tr>
		<td align="right">
		<strong>Functional Area of the Job:</strong>
		</td>
		<td style="padding-left:10px;">
			<select name="functional_area"  id="usereditlist">
			<option value=""> <?php echo $this->_tpl_vars['translations']['jobs']['functional_area']; ?>
</option>	 
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['area']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['area'][$this->_sections['c']['index']]['id']; ?>
"<?php if ($_POST['functional_area'] == $this->_tpl_vars['area'][$this->_sections['c']['index']]['id'] || $this->_tpl_vars['user'][$this->_sections['all']['index']]['functional_area'] == $this->_tpl_vars['area'][$this->_sections['c']['index']]['id']): ?>selected="selected"
					selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['area'][$this->_sections['c']['index']]['name']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		</td>
		<?php if ($this->_tpl_vars['errors']['job']): ?>
			<td>
				<div class="suggestion"><?php echo $this->_tpl_vars['errors']['job']; ?>
</div>
			</td>
		<?php endif; ?>
	</tr>
	<tr>
		<td align="right" ><strong>Duration of Job:</strong>
		</td>
		<td style="padding-left:10px;">
			<?php $this->assign('teststring', $this->_tpl_vars['user'][$this->_sections['all']['index']]['latest_job_exp']); ?>
			<?php $this->assign('testsplit', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['teststring']) : explode($_tmp, $this->_tpl_vars['teststring']))); ?>
			<?php $this->assign('teststring', $this->_tpl_vars['user'][$this->_sections['all']['index']]['latest_job_exp']); ?>
			<?php $this->assign('testsplit', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['teststring']) : explode($_tmp, $this->_tpl_vars['teststring']))); ?>
		<select name="job_year" id="listdropdown" >
		<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['years']; ?>
</option>
			<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['years']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
				<option value="<?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']; ?>
"<?php if ($_POST['latest_job_exp'] == $this->_tpl_vars['years'][$this->_sections['c']['index']]['id'] || $this->_tpl_vars['testsplit'][0] == $this->_tpl_vars['years'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php else: ?><?php if ($this->_tpl_vars['user_latest_job_exp'] == $this->_tpl_vars['years'][$this->_sections['c']['index']]['id'] && ! $_POST['latest_job_exp'] && ! $this->_tpl_vars['testsplit'][0]): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['years'][$this->_sections['c']['index']]['years']; ?>

				</option>
			<?php endfor; endif; ?>
		</select>
		<select name="job_month" id="listdropdown" >
		<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['months']; ?>
</option>
			<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['months']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
				<option value="<?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']; ?>
"<?php if ($_POST['latest_job_exp'] == $this->_tpl_vars['months'][$this->_sections['c']['index']]['id'] || $this->_tpl_vars['testsplit'][1] == $this->_tpl_vars['months'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php else: ?><?php if ($this->_tpl_vars['user_latest_job_exp'] == $this->_tpl_vars['months'][$this->_sections['c']['index']]['id'] && ! $_POST['latest_job_exp'] && ! $this->_tpl_vars['testsplit'][1]): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['months'][$this->_sections['c']['index']]['months']; ?>

				</option>
			<?php endfor; endif; ?>
		</select>
		</td>
		<?php if ($this->_tpl_vars['errors']['job_year']): ?>
			<td>
				<div class="suggestion"><?php echo $this->_tpl_vars['errors']['job_year']; ?>
</div>
			</td>
		<?php endif; ?>
	</tr>
</table>
<?php endif; ?>
	<div class="update">
		<table>
			<tr>
				<td><input type="submit" class="upadatebutton" value=""/>&nbsp;&nbsp;</td>
				<td><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/"><input type="button" id="button"/></a></td>
			</tr>
		</table>
		<input type="hidden" name="action" value="useredit" />
	</div><!---update closed-->
</form>
<?php endif; ?><!-- category if closed here-->
</div><!--intext-->
<div class="steps1">Education Details</div>
<?php if ($this->_tpl_vars['user'][$this->_sections['all']['index']]['city_id'] != 0): ?>
	<?php if ($this->_tpl_vars['education_details'] != education_details): ?>
		<div class="icons"><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/?edit=education_details" title="Edit">
			<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/default/img/pencil.png" alt="Edit" /></a>
		</div>
	<?php endif; ?>
<?php endif; ?>
<div class="text">
<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['other_values']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
	<?php if ($this->_tpl_vars['other_values'][$this->_sections['c']['index']]['category'] == education_list): ?>
		<?php $this->assign('other_education_list', $this->_tpl_vars['other_values'][$this->_sections['c']['index']]['others']); ?>	
	<?php endif; ?>
	<?php if ($this->_tpl_vars['other_values'][$this->_sections['c']['index']]['category'] == qualification): ?>
		<?php $this->assign('other_qualification_list', $this->_tpl_vars['other_values'][$this->_sections['c']['index']]['others']); ?>	
	<?php endif; ?>
<?php endfor; endif; ?>
<?php if ($this->_tpl_vars['education_details'] != education_details): ?>
<table>
<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
<?php $this->assign('qualification', $this->_tpl_vars['user'][$this->_sections['co']['index']]['qualification']); ?>
<?php endfor; endif; ?>
	<tr>
	<td align="right" width="300px;">
		<strong>Qualification Level:</strong>
	</td>
	<td style="padding-left:10px;" width="300px;">
	<?php if ($this->_tpl_vars['qualification'] != 0): ?> 
		<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
			<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['name']['show'] = true;
$this->_sections['name']['max'] = $this->_sections['name']['loop'];
$this->_sections['name']['step'] = 1;
$this->_sections['name']['start'] = $this->_sections['name']['step'] > 0 ? 0 : $this->_sections['name']['loop']-1;
if ($this->_sections['name']['show']) {
    $this->_sections['name']['total'] = $this->_sections['name']['loop'];
    if ($this->_sections['name']['total'] == 0)
        $this->_sections['name']['show'] = false;
} else
    $this->_sections['name']['total'] = 0;
if ($this->_sections['name']['show']):

            for ($this->_sections['name']['index'] = $this->_sections['name']['start'], $this->_sections['name']['iteration'] = 1;
                 $this->_sections['name']['iteration'] <= $this->_sections['name']['total'];
                 $this->_sections['name']['index'] += $this->_sections['name']['step'], $this->_sections['name']['iteration']++):
$this->_sections['name']['rownum'] = $this->_sections['name']['iteration'];
$this->_sections['name']['index_prev'] = $this->_sections['name']['index'] - $this->_sections['name']['step'];
$this->_sections['name']['index_next'] = $this->_sections['name']['index'] + $this->_sections['name']['step'];
$this->_sections['name']['first']      = ($this->_sections['name']['iteration'] == 1);
$this->_sections['name']['last']       = ($this->_sections['name']['iteration'] == $this->_sections['name']['total']);
?>
				<?php if ($this->_tpl_vars['user'][$this->_sections['co']['index']]['qualification'] == $this->_tpl_vars['list'][$this->_sections['name']['index']]['id']): ?>
					<?php echo $this->_tpl_vars['list'][$this->_sections['name']['index']]['qualification']; ?>

				<?php endif; ?>
			<?php endfor; endif; ?>
		<?php endfor; endif; ?>
	<?php elseif ($this->_tpl_vars['other_qualification_list'] != ''): ?> 
		Our admin will approve your option.
	<?php else: ?>
		<div class="not_available"><em>Not Available</em></div> 
	<?php endif; ?>
	</td>
	</tr>
	<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
	<?php $this->assign('education_specialization', $this->_tpl_vars['user'][$this->_sections['co']['index']]['education_specialization']); ?>
	<?php endfor; endif; ?>
	<tr>
		<td align="right" width="300px;">
			<strong>Education Specialization</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;">
		<?php if ($this->_tpl_vars['education_specialization'] != 0): ?>
			<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
				<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['loop'] = is_array($_loop=$this->_tpl_vars['edulist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['name']['show'] = true;
$this->_sections['name']['max'] = $this->_sections['name']['loop'];
$this->_sections['name']['step'] = 1;
$this->_sections['name']['start'] = $this->_sections['name']['step'] > 0 ? 0 : $this->_sections['name']['loop']-1;
if ($this->_sections['name']['show']) {
    $this->_sections['name']['total'] = $this->_sections['name']['loop'];
    if ($this->_sections['name']['total'] == 0)
        $this->_sections['name']['show'] = false;
} else
    $this->_sections['name']['total'] = 0;
if ($this->_sections['name']['show']):

            for ($this->_sections['name']['index'] = $this->_sections['name']['start'], $this->_sections['name']['iteration'] = 1;
                 $this->_sections['name']['iteration'] <= $this->_sections['name']['total'];
                 $this->_sections['name']['index'] += $this->_sections['name']['step'], $this->_sections['name']['iteration']++):
$this->_sections['name']['rownum'] = $this->_sections['name']['iteration'];
$this->_sections['name']['index_prev'] = $this->_sections['name']['index'] - $this->_sections['name']['step'];
$this->_sections['name']['index_next'] = $this->_sections['name']['index'] + $this->_sections['name']['step'];
$this->_sections['name']['first']      = ($this->_sections['name']['iteration'] == 1);
$this->_sections['name']['last']       = ($this->_sections['name']['iteration'] == $this->_sections['name']['total']);
?>
					<?php if ($this->_tpl_vars['user'][$this->_sections['co']['index']]['education_specialization'] == $this->_tpl_vars['edulist'][$this->_sections['name']['index']]['id']): ?>
						<?php echo $this->_tpl_vars['edulist'][$this->_sections['name']['index']]['name']; ?>

					<?php endif; ?>	
				<?php endfor; endif; ?>
			<?php endfor; endif; ?> 
		<?php elseif ($this->_tpl_vars['other_education_list'] != ''): ?>
			Our admin will approve your option.
		<?php else: ?>
			<div class="not_available"><em>Not Available</em></div> 
		<?php endif; ?>
		</td>
	</tr>
		<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
			<?php $this->assign('institute_name', $this->_tpl_vars['user'][$this->_sections['co']['index']]['institute_name']); ?>
		<?php endfor; endif; ?>
	<tr>
		<td align="right" width="300px;">
			<strong>Institute Name</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;"> 
		<?php if (! ( empty ( $this->_tpl_vars['institute_name'] ) )): ?>
			<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
				<?php echo $this->_tpl_vars['user'][$this->_sections['co']['index']]['institute_name']; ?>

			<?php endfor; endif; ?>   
		<?php else: ?>
			<div class="not_available"><em>Not Available</em></div>
		<?php endif; ?>
		</td>
	</tr>
		<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
			<?php $this->assign('year_of_passout', $this->_tpl_vars['user'][$this->_sections['co']['index']]['year_of_passout']); ?>
		<?php endfor; endif; ?>
	<tr>
	<td align="right" width="300px;"><strong>Year of Passout</strong> :</td><td style="padding-left:10px;" width="300px;">
	<?php if ($this->_tpl_vars['year_of_passout'] != 0): ?>
	<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
		<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['loop'] = is_array($_loop=$this->_tpl_vars['passoutlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['name']['show'] = true;
$this->_sections['name']['max'] = $this->_sections['name']['loop'];
$this->_sections['name']['step'] = 1;
$this->_sections['name']['start'] = $this->_sections['name']['step'] > 0 ? 0 : $this->_sections['name']['loop']-1;
if ($this->_sections['name']['show']) {
    $this->_sections['name']['total'] = $this->_sections['name']['loop'];
    if ($this->_sections['name']['total'] == 0)
        $this->_sections['name']['show'] = false;
} else
    $this->_sections['name']['total'] = 0;
if ($this->_sections['name']['show']):

            for ($this->_sections['name']['index'] = $this->_sections['name']['start'], $this->_sections['name']['iteration'] = 1;
                 $this->_sections['name']['iteration'] <= $this->_sections['name']['total'];
                 $this->_sections['name']['index'] += $this->_sections['name']['step'], $this->_sections['name']['iteration']++):
$this->_sections['name']['rownum'] = $this->_sections['name']['iteration'];
$this->_sections['name']['index_prev'] = $this->_sections['name']['index'] - $this->_sections['name']['step'];
$this->_sections['name']['index_next'] = $this->_sections['name']['index'] + $this->_sections['name']['step'];
$this->_sections['name']['first']      = ($this->_sections['name']['iteration'] == 1);
$this->_sections['name']['last']       = ($this->_sections['name']['iteration'] == $this->_sections['name']['total']);
?>
			<?php if ($this->_tpl_vars['user'][$this->_sections['co']['index']]['year_of_passout'] == $this->_tpl_vars['passoutlist'][$this->_sections['name']['index']]['id']): ?>
				<?php echo $this->_tpl_vars['passoutlist'][$this->_sections['name']['index']]['year_of_passout']; ?>

			<?php endif; ?>
		<?php endfor; endif; ?>
	<?php endfor; endif; ?>
	<?php else: ?>
		<div class="not_available"><em>Not Available</em></div>
	<?php endif; ?>
	</td>
	</tr>
</table>
<?php else: ?>
<form id="edit" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/?edit=education_details">  
<table>
	<tr>
		<td align="right" width="300px">
		<strong>Qualification Level:</strong>
		</td>
		<td style="padding-left:10px;">  
		<?php if ($this->_tpl_vars['other_qualification_list'] == ''): ?>
			<select name="qualification" id="usereditlist">
				<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['qualification']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['list'][$this->_sections['c']['index']]['id']; ?>
" <?php if ($_POST['list'] == $this->_tpl_vars['list'][$this->_sections['c']['index']]['id'] || $this->_tpl_vars['user'][$this->_sections['all']['index']]['qualification'] == $this->_tpl_vars['list'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php else: ?><?php if ($this->_tpl_vars['user_year'] == $this->_tpl_vars['list'][$this->_sections['c']['index']]['id'] && ! $_POST['list'] && ! $this->_tpl_vars['user'][$this->_sections['all']['index']]['list']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['list'][$this->_sections['c']['index']]['qualification']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		<?php else: ?>
			
			<input type="text" name="qualification_outside_ro_where" id="qualification_outside_ro_where" size="40" maxlength="140" <?php if ($_POST['qualification_outside_ro_where'] != '' && $this->_tpl_vars['errors_outside']['qualification_outside_ro_where'] == ''): ?>value="<?php echo ((is_array($_tmp=$_POST['qualification_outside_ro_where'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php else: ?> value="<?php echo $this->_tpl_vars['other_qualification_list']; ?>
" <?php endif; ?> />
			<div class="sug"><?php echo $this->_tpl_vars['translations']['publish']['edu_info']; ?>
</div>
			</div>
		<?php endif; ?>
		</td>
		<?php if ($this->_tpl_vars['errors']['qualification']): ?>
			<td><div class="suggestion"><?php echo $this->_tpl_vars['errors']['qualification']; ?>
</div>
			</td>
		<?php endif; ?>
	</tr>
	<tr>
	<td align="right" valign="top">
	<strong>Education Specialization:</strong>
	</td>
		<td style="padding-left:5px;">
		<?php if ($this->_tpl_vars['other_education_list'] == ''): ?>
			<select name="education_specialization" id="education"  <?php if ($this->_tpl_vars['errors_outside']['education_outside_ro_where'] != 'edu' && $_POST['education_outside_ro_where'] != ''): ?>disabled="disabled"<?php endif; ?>>
				<option value=""> <?php echo $this->_tpl_vars['translations']['jobs']['education']; ?>
</option>
					<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['edulist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['edulist'][$this->_sections['c']['index']]['id']; ?>
"
						<?php if ($_POST['education_specialization'] == $this->_tpl_vars['edulist'][$this->_sections['c']['index']]['id'] || $this->_tpl_vars['user'][$this->_sections['all']['index']]['education_specialization'] == $this->_tpl_vars['edulist'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php else: ?><?php if ($this->_tpl_vars['user_year'] == $this->_tpl_vars['edulist'][$this->_sections['c']['index']]['id'] && ! $_POST['education_specialization'] && ! $this->_tpl_vars['user'][$this->_sections['all']['index']]['education_specialization']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['edulist'][$this->_sections['c']['index']]['name']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		<?php else: ?>
			<span style="padding-left:5px;">
			<input type="text" name="education_outside_ro_where" id="education_outside_ro_where" size="40" maxlength="140" <?php if ($_POST['education_outside_ro_where'] != '' && $this->_tpl_vars['errors_outside']['education_outside_ro_where'] == ''): ?>value="<?php echo ((is_array($_tmp=$_POST['education_outside_ro_where'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php else: ?> value="<?php echo $this->_tpl_vars['other_education_list']; ?>
" <?php endif; ?> />
			<div class="sug"><?php echo $this->_tpl_vars['translations']['publish']['edu_info']; ?>
</div>
			</div>
			</span>
		<?php endif; ?>
	</td>
		<?php if ($this->_tpl_vars['errors']['education']): ?>
			<td><div class="suggestion"><?php echo $this->_tpl_vars['errors']['education']; ?>
</div></td>
		<?php endif; ?>
	</tr>
	<tr>
		<td align="right">
			<strong>Institute Name:</strong>
		</td>
		<td style="padding-left:10px;" > 
			<input type="text" name='institutename' id="usertextbox"  value="<?php if ($this->_tpl_vars['user'][$this->_sections['all']['index']]['institute_name']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['user'][$this->_sections['all']['index']]['institute_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo $_POST['institutename']; ?>
<?php endif; ?>">
			<?php if ($this->_tpl_vars['errors']['institutename']): ?>
				<td><div class="suggestion"><?php echo $this->_tpl_vars['errors']['institutename']; ?>
</div></td>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td align="right" ><strong>Year of Passout:</strong></td>
		<td style="padding-left:10px;">
			<select name="passout"  id="usereditlist">
				<option value=""><?php echo $this->_tpl_vars['translations']['jobs']['passoutyear']; ?>
</option>
				<?php unset($this->_sections['c']);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['passoutlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['passoutlist'][$this->_sections['c']['index']]['id']; ?>
"<?php if ($_POST['passout'] == $this->_tpl_vars['passoutlist'][$this->_sections['c']['index']]['id'] || $this->_tpl_vars['user'][$this->_sections['all']['index']]['year_of_passout'] == $this->_tpl_vars['passoutlist'][$this->_sections['c']['index']]['id']): ?>selected="selected"<?php else: ?><?php if ($this->_tpl_vars['user_year'] == $this->_tpl_vars['passoutlist'][$this->_sections['c']['index']]['id'] && ! $_POST['passoutlist'] && ! $this->_tpl_vars['user'][$this->_sections['all']['index']]['passoutlist']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['passoutlist'][$this->_sections['c']['index']]['year_of_passout']; ?>

					</option>
				<?php endfor; endif; ?>
			</select>
		</td>
		<?php if ($this->_tpl_vars['errors']['passout']): ?>
			<td><div class="suggestion"><?php echo $this->_tpl_vars['errors']['passout']; ?>
</div></td>
		<?php endif; ?>
	</tr>
</table>
	<div class="update">
		<table>
			<tr>
				<td><input type="submit" class="upadatebutton" value=""/>&nbsp;&nbsp;</td>
				<td><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/"><input type="button" id="button"/></a></td>
			</tr>
		</table>
		<input type="hidden" name="action" value="useredit" />
	</div><!---update closed-->
</form>
<?php endif; ?>
</div><!--text-->
<div class="steps1">Skills</div>
<div class="icons">
	<?php if ($this->_tpl_vars['user'][$this->_sections['all']['index']]['city_id'] != 0): ?>
		<?php if ($this->_tpl_vars['skills'] != skills): ?>
			<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/?edit=skills" title="Edit">
			<img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/default/img/pencil.png" alt="Edit" /></a>
		<?php endif; ?>
	<?php endif; ?>
</div>
<div class="text">
<?php if ($this->_tpl_vars['skills'] != skills): ?>
	<table>
	<tr>
		<td align="right" width="300px;">
		<strong>Skills</strong>:
		</td>
		<td style="padding-left:10px;" width="300px;"> 
			<?php if (! ( empty ( $this->_tpl_vars['user'][$this->_sections['all']['index']]['skills'] ) )): ?>
				<?php echo $this->_tpl_vars['user'][$this->_sections['all']['index']]['skills']; ?>

			<?php else: ?>
				<div class="not_available"><em>Not Available</em></div>
			<?php endif; ?>
		</td>
	</tr>
	</table> 
	<?php else: ?>
	<form id="edit" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/?edit=skills">  
	<table>
	<tr>
		<td align="right" width="300px;">
			<strong>Skills:</strong>
		</td>
		<td style="padding-left:10px;">
			<input type="text" name="skills_name" id="usereditskills" value="<?php if ($this->_tpl_vars['user'][$this->_sections['all']['index']]['skills']): ?><?php echo $this->_tpl_vars['user'][$this->_sections['all']['index']]['skills']; ?>
<?php else: ?><?php echo $_POST['skills_name']; ?>
<?php endif; ?>"/>
		</td>
		<td>
			<?php if ($this->_tpl_vars['errors']['skills_name']): ?>
				<div class="suggestion"><?php echo $this->_tpl_vars['errors']['skills_name']; ?>
</div>
			<?php endif; ?>
		</td>
	</tr>
	</table>
		<div class="update">
		<table>
			<tr>
				<td><input type="submit" class="upadatebutton" value=""/>&nbsp;&nbsp;</td>
				<td><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/"><input type="button" id="button"/></a></td>
			</tr>
		</table>
			<input type="hidden" name="action" value="useredit" />
		</div><!---update closed-->
	</form>
<?php endif; ?>
</div><!--text-->
<div class="steps1">
Resume
	<?php if ($this->_tpl_vars['user'][$this->_sections['all']['index']]['city_id'] != 0): ?>
		<?php if ($this->_tpl_vars['edit'] != resume): ?>
			<div id="uploadresumemyprofile">
				<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/?edit=resumedetails" title="Edit">UPLOAD RESUME</a>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>
<div class="text">
	<?php if ($this->_tpl_vars['edit'] != resume): ?>
	<table>
	<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
	<?php $this->assign('resume_path', $this->_tpl_vars['user'][$this->_sections['co']['index']]['resume_path']); ?>
	<?php endfor; endif; ?>
		<tr> 
			<td align="right" width="300px;">
			<strong>Default Resume</strong>:
			</td>
			<td style="padding-left:10px;" width="300px;"> 
			<?php if (! empty ( $this->_tpl_vars['user'][$this->_sections['all']['index']]['resume_path'] )): ?>
				<?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
					<a href = "<?php echo $this->_tpl_vars['BASE_URL']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['user'][$this->_sections['co']['index']]['resume_path'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" target="_blank">
					<?php echo $this->_tpl_vars['user'][$this->_sections['co']['index']]['resume_path']; ?>
</a> 
				<?php endfor; endif; ?>   
			<?php else: ?>
				<div class="not_available"><em>Not Available</em></div>
			<?php endif; ?>
			</td>
		</tr>
	</table>
	<?php else: ?>
	<form id="edit" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/?edit=resumedetails" enctype="multipart/form-data">  
		<table>
		<tr>
			<td align="right" width="300px;"><strong>Default Resume:</strong></td>
			<td style="padding-left:10px;">
			<input type="file" name="resume" value="<?php echo $this->_tpl_vars['user'][$this->_sections['all']['index']]['resume_path']; ?>
"/>
			</td>
			<?php if ($this->_tpl_vars['resume_err']['resume']): ?>
				<td><div class="suggestion"><?php echo $this->_tpl_vars['resume_err']['resume']; ?>
</div></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['resume_err']['cv']): ?>
				<td><div class="suggestion"><?php echo $this->_tpl_vars['resume_err']['cv']; ?>
</div></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['resume_err']['size']): ?>
				<td><div class="suggestion"><?php echo $this->_tpl_vars['resume_err']['size']; ?>
</div></td>
			<?php endif; ?>	
		</tr>
		</table>
			<div class="update">
				<table>
					<tr>
						<td><input type="submit" class="upadatebutton" value=""/>&nbsp;&nbsp;<td>
						<td><a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/"><input type="button" id="button"/></a></td>
					</tr>
				</table>
				<input type="hidden" name="action" value="useredit" />
			</div><!---update closed-->
	</form>
	<?php endif; ?>
</div><!--text-->
<?php endfor; endif; ?>
<!-- SMS activation box -->
<div id="boxes">
<div id="dialog2" class="window">
	<a href="#" class="close"><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
_templates/default/img/Close_icon.png" class="btn_closes" title="Close Window" alt="Close" /></a>
	 <div id="pass">Sms Alerts</div>
       <form id="edit" method="post" action="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/" enctype="multipart/form-data">
	 <div id="boxupdate">
	 <?php unset($this->_sections['co']);
$this->_sections['co']['name'] = 'co';
$this->_sections['co']['show'] = true;
$this->_sections['co']['loop'] = 1;
$this->_sections['co']['max'] = $this->_sections['co']['loop'];
$this->_sections['co']['step'] = 1;
$this->_sections['co']['start'] = $this->_sections['co']['step'] > 0 ? 0 : $this->_sections['co']['loop']-1;
if ($this->_sections['co']['show']) {
    $this->_sections['co']['total'] = $this->_sections['co']['loop'];
    if ($this->_sections['co']['total'] == 0)
        $this->_sections['co']['show'] = false;
} else
    $this->_sections['co']['total'] = 0;
if ($this->_sections['co']['show']):

            for ($this->_sections['co']['index'] = $this->_sections['co']['start'], $this->_sections['co']['iteration'] = 1;
                 $this->_sections['co']['iteration'] <= $this->_sections['co']['total'];
                 $this->_sections['co']['index'] += $this->_sections['co']['step'], $this->_sections['co']['iteration']++):
$this->_sections['co']['rownum'] = $this->_sections['co']['iteration'];
$this->_sections['co']['index_prev'] = $this->_sections['co']['index'] - $this->_sections['co']['step'];
$this->_sections['co']['index_next'] = $this->_sections['co']['index'] + $this->_sections['co']['step'];
$this->_sections['co']['first']      = ($this->_sections['co']['iteration'] == 1);
$this->_sections['co']['last']       = ($this->_sections['co']['iteration'] == $this->_sections['co']['total']);
?>
	      <input type="radio" name="sms" value="1" <?php if ($_REQUEST['sms'] == '1' || $this->_tpl_vars['user'][$this->_sections['co']['index']]['sms'] == '1'): ?>checked<?php endif; ?>>Activate</br>
	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Active sms Alerts from scan4jobs</br>
	        <br> <input type="radio" name="sms" value="0" <?php if ($_REQUEST['sms'] == '0' || $this->_tpl_vars['user'][$this->_sections['co']['index']]['sms'] == '0'): ?>checked<?php endif; ?>>Deactivate</br>
	       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Deactive sms Alerts from scan4jobs</br>
	  <?php endfor; endif; ?>
	 </div>
	<div id="sms_alerts">
		<input type="submit" class="upadatebutton" value=""/>
		<a href="<?php echo $this->_tpl_vars['BASE_URL']; ?>
myprofile/"><input type="button" id="button"/></a>
		<input type="hidden" name="action" value="useredit" />
         </div>
      </form>
</div>
<div id="mask"></div>
</div>
<!-- SMS Activation box closed here -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>