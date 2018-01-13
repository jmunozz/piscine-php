<?PHP
/*
 * Plugin Name: Joul_Database
 * */
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
register_activation_hook( __FILE__, array( 'Mon_Prefixe_Mon_Extension', 'creer_tables' ) );





class Joul_Database
{
	public function __construct() {
	}

	public function creer_tables() {
		global $wpdb;

		$Joul_input = $wpdb->prefix . 'Joul_input';
		$sql = "CREATE TABLE $nom_table (
			id int,
			time int,
			temp int,
			light int,
		);";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql);
	 }
}
?>
