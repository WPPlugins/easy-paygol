<?php $action_url = $_SERVER['REQUEST_URI'];
s?>
<div class="wrap"> 
	<form name="frmPaygol" action="<?php echo $action_url ?>" method="post">
	<?php wp_nonce_field('nonce'); ?>

		<table>
			<tr>
				<td colspan="2">
					<h2>PayGol Plugin Options</h2>   by <b>Felipe Saavedra</b> of ITeracion<br /><br />
				</td>
			</tr> 
			<tr>
				<td>Service ID</td><td><input type='text' id='pg_serviceid' name='pg_serviceid' value="<?php echo $pg_serviceid; ?>" /></td>
			</tr>
			<tr>
				<td>Currency</td><td><input type='text' id='pg_currency' name='pg_currency' value="<?php echo $pg_currency; ?>"/></td>
			</tr> 
			<tr>
				<td>Defaul price</td><td><input type='text' id='pg_price' name='pg_price'value="<?php echo $pg_price; ?>" /></td>
			</tr>
			<tr>
				<td valign="top">Button</td><td><textarea id='pg_button' name='pg_button' row='8' cols='70'><?php echo $pg_button; ?></textarea>
                	<br /><i>eg. http://www.paygol.com/micropayment/img/buttons/125/pay_en_1.png</i></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="Submit" value="Save" style="cursor:pointer;" /></td>
			</tr>
		</table>
		<br /><br />
		<table>
			<tr>
				<td><b/>Admin Instructions </td>				
			</tr>
			<tr>
				<td>
					<ol>
						<li>In case you still not have an account at PayGol, get one for free at <a href="http://www.paygol.com">www.paygol.com</a></li>
						<li>Create a service of type Integrated with your <i>PayGol</i> account</li>
						<li>Fill the details of your PayGol Service in the textboxes above of this form</li>
						<li>Save data</li>						
					</ol>
				</td>
			</tr>		
		</table>
		<br />
		<table>
			<tr>
				<td><b/>Post Instructions </td>				
			</tr>
			<tr>
				<td>
					<ol>
						<li>Put this code in your post when you want show the PayGol payment button [paygol]your hidden content[/paygol]</li>
						<li>You can add two parameters to this tag:</li>
						<ul>
							<li><strong>pg_price</strong>: price of the item (if this parameter is not defined, then the default price will be the one you have entered in the form) </li>
							<li><strong>pg_name</strong>: name of the service (if this parameter is not defined, then the name of the service will be the one you have entered in the form) </li>													
						</ul>						
					</ol>
					<br />
					For example:
					<br />
					<ol>
						<li>[paygol]your hidden content[/paygol]</li>
						<li>[paygol pg_price="2" pg_name="My Test"]you hidden text[/paygol]</li>
					</ol>
				</td>
			</tr>		
		</table>
	</form>
	<br /><br /><br />
	<table width="100%">
		<tr>
			<td><b>Donation:</b> If you find yourself making a lot of money using this plugin, consider making a donation.
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
				">
				<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypal.com/es_XC/i/scr/pixel.gif" width="1" height="1">
				</form>

			</td>
		</tr>
	</table>
</div>
