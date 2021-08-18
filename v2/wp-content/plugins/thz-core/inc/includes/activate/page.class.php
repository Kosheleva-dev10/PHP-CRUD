<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}

/**
 * Created by PhpStorm.
 * User: CodeFlavors
 * Date: 3/26/2018
 * Time: 6:01 PM
 */
/**
 * Class ThzCore_Activation_Page
 */
class ThzCore_Activation_Page{
	/**
	 * @var ThzCore_Activation_Option
	 */
	private $option;
	/**
	 * @var string
	 */
    private $endpoint;
	/**
	 * @var NULL|String
	 */
    private $error = null;

	/**
	 * ThzCore_Activation_Page constructor.
	 *
	 * @param $endpoint - endpoint URL
	 * @param ThzCore_Activation_Option $option
	 */
	public function __construct( $endpoint, ThzCore_Activation_Option $option ) {
		$this->show_alert();

		if( !ThzCore_Update_Helper::not_uses_cp() || ThzCore_Update_Helper::has_cp() ){
		    return;
        }

	    $this->endpoint = $endpoint;

		add_action( 'creatus_admin_menu', array( $this, 'menu' ) );
		add_action( 'thz_core_activation_error', array( $this, 'process_error' ), 10, 2 );
		$this->option = $option;
		$this->load();
	}

	/**
	 * Load dependencies
	 */
	private function load(){
		$path = plugin_dir_path( __FILE__ );
		require_once $path . 'admin-notice.class.php';
		require_once $path . 'activation.class.php';
    }

    private function show_alert(){
	    // if theme is last version from tf or higher (coming from WP.org)
	    if( ThzCore_Update_Helper::requires_cp() ) {
		    $this->load();
            // show alert for CP and stop
            new ThzCore_Admin_Notice( __( "Before updating, please make sure you install and activate Creatus PRO.", "thz-core" ) );
        }
  }

	/**
	 * Admin menu callback
	 */
	public function menu( $parent_slug ){
		$page = add_submenu_page(
		    $parent_slug,
			__( 'Creatus Activation', 'thz-core' ),
			__( 'Creatus Activation', 'thz-core' ),
			'activate_plugins',
			'creatus-activation',
			array( $this, 'page' )
		);

		add_action( 'load-' . $page, array( $this, 'on_load' ) );
	}

	/**
	 * @param $message
	 * @param $error_code
	 */
	public function process_error( $message, $error_code ){
	    switch( $error_code ){
	        // Envato purchase code was already activated successfully. Additional activations for the same code are not allowed unless user either deactivates from his WP website or from Themezly account.
            case 100:
                $this->error = __( 'There was an error with code 100', 'thz-core' );
                break;
            // Activation not allowed because domain was disabled by admin and cannot be activated. Error is triggered only for users that purchased directly from Themezly.
            case 101:
	            $this->error = __( 'There was an error with code 101', 'thz-core' );
                break;
            // Activation not allowed because domain already has a successful activation. Error is triggered only for users that purchased directly from Themezly.
            case 102:
	            $this->error = __( 'There was an error with code 102', 'thz-core' );
                break;
	         // Activation failed because activation was done by username but the user ID isn't in allowed IDs list.
		    case 103:
			    $this->error = __( 'There was an error with code 103', 'thz-core' );
			    break;
			// Activation failed because there was a MySQL error and insertion failed.
		    case 104:
			    $this->error = __( 'There was an error with code 104', 'thz-core' );
			    break;
			// Activation could not be processed due to various reasons (possibly Envato API issues or the purchase code was not valid). User is required to try later.
		    case 105:
			    $this->error = __( 'There was an error with code 105', 'thz-core' );
			    break;
			// Activation was not processed due to completely unknown causes. User is required to try again.
		    case 130:
			    $this->error = __( 'There was an error with code 130', 'thz-core' );
			    break;
        }
    }

	/**
     * Displays any activation error set by hook
	 * @param string $before
	 * @param string $after
	 */
    private function show_activation_error( $before = '', $after = '' ){
	    if( null === $this->error ){
	        return;
        }

        echo $before . $this->error . $after;
    }

	/**
	 * Page output
	 */
	public function page(){
		$o = $this->option->get_option();
		$fw_icon = !$o? 'fw-no-icon dashicons dashicons-info' : 'fw-yes-icon dashicons dashicons-yes';
		?>
		<div class="wrap creatus-system-info">
        	<div class="thz-system-info">
			<h1>
				<?php _e( 'Creatus Activation', 'thz-core' ); ?> <span class="thz-admin-system-state <?php echo $fw_icon ?>"></span>
            </h1>
			<hr/>
			<?php if( !$o ):?>
                <div class="thz-system-group">
                    <h2 class="fw-error-message"><?php _e( 'Updates & Support Are Not Active!', 'thz-core' ); ?></h2>
                    <?php $this->show_activation_error( '<div class="activation activation-error">', '</div>' )?>
                    <form method="post" action="">
                        <?php wp_nonce_field( 'creatus-activation', 'nonce' ); ?>
                        <table class="form-table">
                          <tbody>
                            <tr>
                              <th scope="row"><label for="thz_purchase_code"><?php _e( 'Enter your purchase code', 'thz-core' );?></label></th>
                              <td><input id="thz_purchase_code" type="text" value="" name="thz_purchase_code" size="42" />
                            <p class="description"> <?php _e('Need help with activation?', 'thz-core'); ?> <a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/how-to-activate-creatus-theme-updates/"><?php _e('Visit the docs', 'thz-core'); ?> <span class="thz-docs-info thzicon thzicon-link-external"></span></a>
                            </p></td>
                            </tr>
                          </tbody>
                        </table>
                        <?php submit_button( __( 'Click to activate your theme', 'thz-core' ) ); ?>
                    </form>
                <?php else: ?>
                <div class="thz-system-group">
                	<h1 class="fw-success-message"><?php _e( 'Updates & Support Are Active', 'thz-core' ); ?></h1>
                    <h3><span class="fw-success-message"><?php _e( 'Your theme is active.', 'thz-core' ); ?></span> <?php _e( 'Have fun!', 'thz-core' ); ?></h3>
                	<h4>
                    	<?php _e( 'If you need any assistance please', 'thz-core' ); ?> <a href="https://themezly.com/support/" target="blank"><?php _e( 'contact us', 'thz-core' ); ?></a>
                    </h4>
                    <form method="post" action="">
                        <?php wp_nonce_field( 'creatus-deactivation', 'deactivate_nonce' ); ?>
                        <?php submit_button( __( 'Deactivate', 'thz-core' ) );?>
                    </form>
                </div>
                <?php
                endif;
                ?>
                </div>
            </div>
		</div>
		<?php
	}

	/**
	 * Page load event
	 */
	public function on_load(){
		$screen = get_current_screen();
		$screen->add_help_tab( array(
		    'id' => 'creatus-activation-help',
            'title' => __( 'Overview', 'thz-core' ),
            'callback' => array( $this, 'help_tab' )
        ));

		// set activation class
		$activation = new ThzCore_Activate(
			$this->endpoint,
			menu_page_url( 'creatus-activation', false ),
			$this->option
		);

		// check for the activation token
		$activation->token_actions();
		// activate theme
		if( isset( $_POST['nonce'] ) ){
			check_admin_referer( 'creatus-activation', 'nonce' );
			if( empty( $_POST['thz_purchase_code'] ) ){
				new ThzCore_Admin_Notice( __( 'Please enter a valid purchase code.', 'thz-core' ), 'notice notice-error is-dismissible' );
			}else{
				$activation->activate( $_POST['thz_purchase_code'] );
            }
		}

		// start deactivation process
		if( isset( $_POST['deactivate_nonce'] ) ){
		    check_admin_referer( 'creatus-deactivation', 'deactivate_nonce' );
		    $activation->deactivate();
        }

        // just remove activation key from database
        if( isset( $_GET['crt_nonce'] ) ){
		    check_admin_referer( 'creatus-remove-activation', 'crt_nonce' );
		    $this->option->delete_option();
		    wp_redirect( menu_page_url( 'creatus-activation', false ) );
        }
	}

	/**
	 * Help tab output
	 */
	public function help_tab(){
        echo '<p>' . __( 'To manually remove the activation code, please click the button below', 'thz-core' ) . '</p>';
        echo '<p>';
        printf( '<a href="%s" class="button">%s</a>',
            wp_nonce_url( menu_page_url( 'creatus-activation', false ), 'creatus-remove-activation', 'crt_nonce' ),
            __( 'Remove activation code', 'thz-core' )
        );
        echo '</p>';
    }
}