<?php 
require('../../../wp-blog-header.php');
global $wpdb;


$table_name_setting=get_option(table_name_setting);
		$table_name_service=get_option(table_name_service);
		
if ($_GET["hdg"] != "")
		{
			//with parameter
			// read the get from PayGol system
			$resultado = explode('yJkF12JB',$_GET["hdg"]);
			$post_id = $_GET["post_id"];
			$user = explode('PO98Fv',$resultado[1]);
			$user_id = $user[0];
			$message_id = $_GET[message_id];
			$shortcode = $_GET[shortcode];
			$keyword = $_GET[keyword];
			$message = $_GET[message];
			$sender = $_GET[sender];
			$operator = $_GET[operator];
			$country = $_GET[country];
			$custom = $_GET[custom];
			$price = $_GET[price];
			$currency = $_GET[currency];
			$pg_name = $_GET[pg_name];
			
			
			$sql = "INSERT INTO ".$table_name_service." (nkey_usuario, pg_serviceid, pg_currency, pg_price, pg_name, 
						pg_shortcode, message_id, keyword, message, sender, operator, country, custom, post_id)
					VALUES ('".$user_id."','".$pg_serviceid."','".$currency."','".$price."',
					'".$pg_name."','".$shortcode."','".$message_id."','".$keyword."','".$message."',
					'".$sender."','".$operator."', '".$country."','".$custom."','".$post_id."')";
			$wpdb->query($sql);	
			//return;
		}


?>