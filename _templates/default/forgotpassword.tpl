{include file="header.tpl"}
<div id="forgotemail">
<form name="forgotpasswordform" action="" method="post">
        <table><div id="forgotheading">

	Forgot password</div>
	<tr>
	<td>Email ID:
	</td>
	<td height="40" >
	<input name="forgotpassword" type="text" value="" id="forgotpassword" />
	</td>
          <tr>
          <tr><td></td>
            <td  height="40" align="center" >
	    <input type="hidden" name="submit" value="Submit"/>
<input type="image" src="{$BASE_URL}_templates/{$THEME}/img/submit.png" value=""/>
	    </td>
          </tr>
        </table>

      </form>
     </div>
{include file="footer.tpl"}