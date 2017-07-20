<?php
   /*
      Plugin Name: Easy PayGol
      Plugin URI: http://codex.appwebmaster.com/
      Description: This plugin allows you to charge for some content in a post or page / Este plugin permite cobrar por algun contenido en un post o en una pagina.
      Version: version 1.0
      Author: Teorico
      Author URI: http://www.iteracion.cl
   */
   
  /*  Copyright 2010  Teorico  (email : contacto@iteracion.cl)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
*/
?>
<?php 
class paygol { 
	var $opt;
	var $table_name_setting;
	var $table_name_service;


 
	// initiallize plug-in
	function paygol() 
	{
		global $wpdb;
		$table_name_setting=$wpdb->prefix.'paygol';
		$table_name_service=$wpdb->prefix.'paygol_service';
		add_option('table_name_setting', $table_name_setting);
		add_option('table_name_service', $table_name_service);
	 
		
	 	add_action('admin_menu', array(&$this, 'paygol_config_page'));
		register_activation_hook(__FILE__, array(&$this, 'paygol_install')); //hook for install
		register_deactivation_hook(__FILE__, array(&$this, 'paygol_uninstall')); //hook for uninstall
		

		add_shortcode('paygol', array(&$this, 'paygol_put_buttom'));


	}
	// install plug-in
	function paygol_install() 
	{ 
	
		echo "<scrip>alert('activando');</script>";
		global $wpdb;
		
		$table_name_setting=get_option(table_name_setting);
		$table_name_service=get_option(table_name_service);
		
 		$sql = "CREATE TABLE $table_name_setting ( pg_serviceid int NOT NULL, pg_currency varchar(4),
			pg_price double, pg_button varchar(1000)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8";
	 
		$wpdb->query($sql);

		
		$sql = "CREATE TABLE $table_name_service ( nkey_usuario int NOT NULL, pg_serviceid int NOT NULL, pg_currency varchar(4),
			pg_price double, pg_name varchar(200), pg_shortcode varchar(100), message_id varchar(100), keyword varchar(100), 
			message varchar(100), sender varchar(100), operator varchar(100), country varchar(100), custom varchar(100), post_id int			
		) ENGINE=MyISAM DEFAULT CHARSET=utf8";
	 
		$wpdb->query($sql);
		
		add_shortcode('paygol', array(&$this, 'paygol_put_buttom'));
	}
	// unistall plug-in
	function paygol_uninstall() 
	{ 
		global $wpdb;
	 	$table_name_setting=get_option(table_name_setting);
		$table_name_service=get_option(table_name_service);
		
		$sql = 'drop table `'.$table_name_setting.'`';
		$wpdb->query($sql);
		$sql = 'drop table `'.$table_name_service.'`';
		$wpdb->query($sql);
	}
	// configuration page
	function paygol_config_page() 
	{ 
		add_options_page('PayGol', 'PayGol', 8, basename(__FILE__), array(&$this, 'paygol_options_plugin'));
	}
	//configuration option
	function paygol_options_plugin() 
	{ 
		global $wpdb; 
		$table_name_setting=get_option(table_name_setting);
		

		if (isset($_POST['Submit'])) 
		{
			//aquí podemos poner el sql update, abasado en los datos de un formulario
			$comcount = $wpdb->get_var("SELECT COUNT(*)
                      FROM $table_name_setting
                      WHERE pg_serviceid = ".$_REQUEST['pg_serviceid']);
			if ($comcount ==0)
			{		
				//No existe el servicio
				$sql = "INSERT INTO ".$table_name_setting." ( pg_serviceid,pg_currency , pg_price, pg_button )
						VALUES ('".$_REQUEST['pg_serviceid']."', '".$_REQUEST['pg_currency']."', '".$_REQUEST['pg_price']."', '".$_REQUEST['pg_button']."' )";
				$wpdb->query($sql);		
			}
			else
			{
				//Si existe el servicio
				$sql = "UPDATE ".$table_name_setting." SET pg_serviceid='".$_REQUEST['pg_serviceid']."', pg_currency= '".$_REQUEST['pg_currency']."', pg_price='".$_REQUEST['pg_price']."', pg_button='".$_REQUEST['pg_button']."'";
				$wpdb->query($sql);		
			}
		}	 
		$sql = "SELECT * FROM $table_name_setting ";

		$settings = $wpdb->get_results($sql);
		foreach ($settings as $service) 
		{
		  // retrieve post information we need
		  $pg_serviceid = $service->pg_serviceid;
		  $pg_currency = $service->pg_currency;
		  $pg_price = $service->pg_price;
		  $pg_button = $service->pg_button;
		}


		include("paygol_form_admin.php");
	}
	//put buttom in post trought shortcode
	function paygol_put_buttom($parametros, $content = null) 
	{ 
		global $wpdb; 
		$table_name_setting=get_option(table_name_setting);
		$table_name_service=get_option(table_name_service);
		$sql = "SELECT * FROM $table_name_setting ";

		$settings = $wpdb->get_results($sql);
		foreach ($settings as $service) 
		{
		  // retrieve service information we need
		  $pg_serviceid = $service->pg_serviceid;
		  $pg_currency = $service->pg_currency;
		  $pg_price = $service->pg_price;
		  $pg_button = $service->pg_button;
		}
		extract(shortcode_atts(array(
				'pg_price' => $pg_price,
				'pg_name' => "service:".$pg_serviceid
			), $parametros));
		if(!is_null($content))
		{
			
			if ( !is_user_logged_in() ) 
			{
				// Not logged in.
				$resultado = explode('<input type="image" name="pg_button" class="paygol" src="',$pg_button);
				$textoimagen = explode('"',$resultado[1]);
				//Redirect to the login page
				$strCodigo= "<a href='".wp_login_url( get_permalink() )."'><img src='".$textoimagen[0]."'  ></a>";
			} 
			else 
			{
				// Logged in.
				global $current_user;
      			get_currentuserinfo();

				$user_id = $current_user->ID; // User ID
				$post_url = get_permalink($post->D); // URL Post 
				$blog_url = get_bloginfo('siteurl');
				$post_id = get_the_ID();
				$pg_cancel_url= $post_url; 
				$pg_notify_url = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__))."notify_url.php?hdg=yJkF12JB".$user_id."PO98Fv&post_id=".$post_id;
				$pg_return_url = $post_url;
				
				$sql = "SELECT COUNT(*) FROM ".$table_name_service." WHERE nkey_usuario='".$user_id."' and post_id='".get_the_ID()."'";
				$comcount = $wpdb->get_var($sql);
				
				if ($comcount !=0)
				{	
					$strCodigo = $content;
				}
				else
				{					
					$strCodigo= "<script src='http://www.paygol.com/micropayment/js/paygol.js' type='text/javascript'></script>";
					$strCodigo= $strCodigo."<form name='pg_frm' method='post'>
												<input type='hidden' name='pg_serviceid' value='$pg_serviceid'>
												<input type='hidden' name='pg_currency' value='$pg_currency'>
												<input type='hidden' name='pg_price' value='$pg_price'>
												<input type='hidden' name='pg_name' value='$pg_name'>
												<input type='hidden' name='pg_notify_url' value='$pg_notify_url'>
												<input type='hidden' name='pg_return_url' value='$pg_return_url'>
												<input type='hidden' name='pg_cancel_url' value='$pg_cancel_url'>
												<input type='image' name='pg_button' class='paygol' src='$pg_button' border='0' alt='PayGol' title='PayGol' onClick='pg_reDirect(this.form)'>    
											</form>";
				}
			}
			return $strCodigo;
		}
	}
} //end class


$mp = new paygol();


		
?>