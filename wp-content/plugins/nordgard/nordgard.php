<?php
	/*
	Plugin Name: Nordgårdfestivalen
	Plugin URI: https://github.com/nikolaia/wp-festival-nordgaard
	Description: Plugin for signup and administration of the festival participants.
	Version: 1.0
	Author: Nikolai Norman Andersen
	Author URI: http://www.stasj.com
	License: WTFPL
	*/
	/*

			 DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
		                   Version 2, December 2004
		
		Copyright (C) 2004 Sam Hocevar <sam@hocevar.net>
		
		Everyone is permitted to copy and distribute verbatim or modified
		copies of this license document, and changing it is allowed as long
		as the name is changed.
		
		           DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
		  TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION
		
		 0. You just DO WHAT THE FUCK YOU WANT TO.
	*/
	
	// Make sure we don't expose any info if called directly
	if ( !function_exists( 'add_action' ) ) {
		echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
		exit;
	}

	global $nordgard_db_version, $nordgard_passes, $nordgard_table, $nordgard_error;
	$nordgard_db_version = "1.0";
	$nordgard_passes = 84;
	$nordgard_table = $wpdb->prefix . "nordgard";

	function nordgard_install() {
	   global $wpdb;
	   global $nordgard_db_version;
	   global $nordgard_table;
	
	   $sql = "CREATE TABLE $nordgard_table (
				  `SignupID` int(11) NOT NULL AUTO_INCREMENT,
				  `Firstname` varchar(255) NOT NULL,
				  `Lastname` varchar(255) NOT NULL,
				  `Birthdate` varchar(100) NOT NULL,
				  `Email` varchar(255) NOT NULL,
				  `Phone` varchar(255) NOT NULL,
				  `Postarea` varchar(255) NOT NULL,
				  `Refered` text NOT NULL,
				  `Relation` text NOT NULL,
				  PRIMARY KEY (`SignupID`)
				) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35;";
	
	   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	   dbDelta( $sql );
	 
	   add_option( "nordgard_db_version", $jal_db_version );
	}
	register_activation_hook( __FILE__, 'nordgard_install' );

	//function nordgard_init() {
	//	global $nordgard_db_name, $nordgard_db_username, $nordgard_db_pass;
	//
	//	if ( $wpcom_api_kevy )
	//		$akismet_api_host = $wpcom_api_key . '.rest.akismet.com';
	//	else
	//		$akismet_api_host = get_option('wordpress_api_key') . '.rest.akismet.com';
	//
	//	$akismt_api_port = 80;
	//}
	//add_action('init', 'nordgard_init');

    function nordgard_passesleft() {

		global $wpdb;
	   	global $nordgard_table;
		global $nordgard_passes;

		$signup_count = $wpdb->get_var("SELECT COUNT(*) FROM $nordgard_table");

		$result = $nordgard_passes-$signup_count;

        echo ("<h2>Det er {$result} festivalpass igjen!</h2>");
        return;

    }
    add_action( 'show_nordgard_passesleft', 'nordgard_passesleft' );

    function nordgard_showerror() {
		global $nordgard_error;
		if (trim($nordgard_error) == '') return;
		?>

			<div class="row">
			
				<div class="span3"></div>
				<div class="span6">
					<div class="alert alert-error">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
					 	<strong>ALARM!</strong> <?php echo $nordgard_error; ?>
					</div>
				</div>
				<div class="span3"></div>

			</div>
		<?php
		return;
    }
    add_action( 'show_nordgard_showerror', 'nordgard_showerror');

    add_action('template_redirect', 'nordgard_signup');
	function nordgard_signup() {

		if(!isset($_POST['Firstname']) || get_query_var('pagename') != "pamelding") return;

		global $wpdb;
		global $nordgard_table;
		global $nordgard_passes;
		global $nordgard_error;

		// Check that the registration ain't full
		$signup_count = $wpdb->get_var( "SELECT COUNT(*) FROM $nordgard_table" );
		
		if ($signup_count >= $nordgard_passes) {
			$nordgard_error = "Sorry, det e ikkje flere festivalplassa ledig :(";
			return;
		}
		
		// Yaaay there is room in the festival!!! Let's just check that every field has valid info
		if(empty($_POST[acceptTerms])) {
			$nordgard_error =  "Du må godta vilkåran!";
			return;
		}
		
		$Firstname = $_POST[Firstname];
		$Lastname = $_POST[Lastname];
		$Birthdate = $_POST[Birthdate];
		$Email = $_POST[Email];
		$Phone = $_POST[Phone];
		$Postarea = $_POST[Postarea];
		$Refered = $_POST[Refered];
		$Relation = $_POST[Relation];
		
		if (!filter_var($Email, FILTER_VALIDATE_EMAIL) 
				|| empty($Firstname)
				|| empty($Lastname)
				|| empty($Birthdate)
				|| empty($Phone)
				|| empty($Postarea))
			{
			$nordgard_error =  "Du mangle et felt, eller har oppgitt en ugyldig e-post!";
			return;
		}
		
		// THEY ARE OKAY!! Let's insert!
		$wpdb->insert($nordgard_table, array(
            'Firstname'     => $Firstname,
        	'Lastname'    => $Lastname,
        	'Birthdate'  => $Birthdate,
        	'Email'   => $Email,
        	'Phone'  => $Phone,
        	'Postarea'    => $Postarea,
        	'Refered' => $Refered,
        	'Relation'   => $Relation
            )
        );

		$email_sent = "";
		$subject = "Du er påmeldt Nordgårdfestivalen!";
		$body = "Hei, $Firstname\n\nDu er påmeldt Nordgårdfestivalen! All info om festivalen finner du på http://www.nordgårdfestivalen.no";
		$headers = 'From: paamelding@xn--nordgrdfestivalen-drb.no' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		
 		if (mail($Email, $subject, $body, $headers)) {
 		  $email_sent = "Vi har prøvd å sende dæ en epostbekreftelse til {$Email}, så får vi nu se om den kommer fram!";
 		 } else {
 		  $email_sent = "Nokka gikk galt når vi sku sende dæ en epost til {$Email}, men vi har registrert påmeldinga di!";
 		 }

        ?>

        <?php get_header(); ?>

			<div class="row">
				<div class="span12 main">
			
					<div class="row">
			
						<div class="span3"></div>
						<div class="span6">
							<h2>PÅMELDT!!!</h2>
							<?php echo "Gratulere {$Firstname}, du e nu påmeldt festivalen! Sees dær!<br/><br/>{$email_sent}"; ?>
						</div>
						<div class="span3"></div>
					</div>
				</div>
			</div>

        <?php get_footer(); ?>
        <?php
		exit;
	}

	// ADMIN PART

	add_action('admin_menu', 'nordgard_admin_menu');

	function nordgard_admin_menu() {
	    add_menu_page('Nordgård options', 'Nordgård', 'manage_options', 'nordgard-options', 'nordgard_admin_main');
	    add_submenu_page('nordgard-options', 'Nordgård report', 'Nordgård report', 'manage_options', 'nordgard-options-report', 'nordgard_admin_report');
	}
	
	function nordgard_admin_main() {
	    echo 'Hello world!';
	}
	
	function nordgard_admin_report() {

		global $wpdb;
		global $nordgard_table;

		$signup_count = $wpdb->get_var("SELECT COUNT(*) FROM $nordgard_table");
		
	    $signups = $wpdb->get_results( 
			"
			SELECT * 
			FROM $nordgard_table
			ORDER BY SignupID
			"
		);

		echo "<h2>Det er {$signup_count} påmeldinger!</h2>";
		
		echo "<table><thead><tr>
			<th>SignupID</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Birthdate</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Postarea</th>
			<th>Refered</th>
			<th>Relation</th>
			</tr></thead><tbody>";
		foreach ( $signups as $signup ) 
		{
			echo "<tr>
			<td>{$signup->SignupID}</td>
			<td>{$signup->Firstname}</td>
        	<td>{$signup->Lastname}</td>
        	<td>{$signup->Birthdate}</td>
        	<td>{$signup->Email}</td>
        	<td>{$signup->Phone}</td>
        	<td>{$signup->Postarea}</td>
        	<td>{$signup->Refered}</td>
        	<td>{$signup->Relation}</td>
        	</tr>";
		}
		echo "</tbody></table>";
		return;
	}
	 
?>