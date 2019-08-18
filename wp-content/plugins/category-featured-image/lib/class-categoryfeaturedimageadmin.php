<?php
/**
 * Category Featured Image
 *
 * @package    Category Featured Image
 * @subpackage CategoryFeaturedImageAdmin Management screen
/*
	Copyright (c) 2019- Katsushi Kawamori (email : dodesyoswift312@gmail.com)
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; version 2 of the License.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

$categoryfeaturedimageadmin = new CategoryFeaturedImageAdmin();

/** ==================================================
 * Management screen
 */
class CategoryFeaturedImageAdmin {

	/** ==================================================
	 * Construct
	 *
	 * @since 1.00
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'plugin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_custom_wp_admin_style' ) );
		add_filter( 'plugin_action_links', array( $this, 'settings_link' ), 10, 2 );

		add_action( 'admin_menu', array( $this, 'add_exclude_categoryfeaturedimage_custom_box' ) );
		add_action( 'save_post', array( $this, 'save_exclude_categoryfeaturedimage_postdata' ) );
		add_filter( 'manage_posts_columns', array( $this, 'posts_columns_categoryfeaturedimage' ) );
		add_action( 'manage_posts_custom_column', array( $this, 'posts_custom_columns_categoryfeaturedimage' ), 10, 2 );
		add_action( 'quick_edit_custom_box', array( $this, 'display_custom_quickedit_categoryfeaturedimage' ), 10, 2 );
		add_action( 'admin_enqueue_scripts', array( $this, 'wp_categoryfeaturedimage_admin_enqueue_scripts' ) );

	}

	/** ==================================================
	 * Add a "Settings" link to the plugins page
	 *
	 * @param  array  $links  links array.
	 * @param  string $file   file.
	 * @return array  $links  links array.
	 * @since 1.00
	 */
	public function settings_link( $links, $file ) {
		static $this_plugin;
		if ( empty( $this_plugin ) ) {
			$this_plugin = 'category-featured-image/categoryfeaturedimage.php';
		}
		if ( $file == $this_plugin ) {
			$links[] = '<a href="' . admin_url( 'edit.php?page=categoryfeaturedimage' ) . '">' . __( 'Settings' ) . '</a>';
		}
			return $links;
	}

	/** ==================================================
	 * Settings page
	 *
	 * @since 1.00
	 */
	public function plugin_menu() {
		add_posts_page( 'Category Featured Image Options', 'Category Featured Image', 'manage_options', 'categoryfeaturedimage', array( $this, 'plugin_options' ) );
	}

	/** ==================================================
	 * Add Css and Script
	 *
	 * @since 1.00
	 */
	public function load_custom_wp_admin_style() {
		if ( $this->is_my_plugin_screen() ) {
			wp_enqueue_style( 'jquery-responsiveTabs', plugin_dir_url( __DIR__ ) . 'css/responsive-tabs.css', array(), '1.4.0' );
			wp_enqueue_style( 'jquery-responsiveTabs-style', plugin_dir_url( __DIR__ ) . 'css/style.css', array(), '1.4.0' );
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-responsiveTabs', plugin_dir_url( __DIR__ ) . 'js/jquery.responsiveTabs.min.js', array(), '1.4.0', false );
			wp_enqueue_script( 'categoryfeaturedimage-admin-js', plugin_dir_url( __DIR__ ) . 'js/jquery.categoryfeaturedimage.admin.js', array( 'jquery' ), '1.00', false );
		}
	}

	/** ==================================================
	 * For only admin style
	 *
	 * @since 1.00
	 */
	private function is_my_plugin_screen() {
		$screen = get_current_screen();
		if ( is_object( $screen ) && 'posts_page_categoryfeaturedimage' == $screen->id ) {
			return true;
		} else {
			return false;
		}
	}

	/** ==================================================
	 * Settings page
	 *
	 * @since 1.00
	 */
	public function plugin_options() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
		}

		$this->options_updated();

		$scriptname = admin_url( 'edit.php?page=categoryfeaturedimage' );
		$categoryfeaturedimage_settings = get_option( 'categoryfeaturedimage' );

		?>

		<div class="wrap">
		<h2>Category Featured Image</h2>

	<div id="categoryfeaturedimage-admin-tabs">
	  <ul>
		<li><a href="#categoryfeaturedimage-admin-tabs-1">Category Featured Image&nbsp<?php esc_html_e( 'Settings' ); ?></a></li>
		<li><a href="#categoryfeaturedimage-admin-tabs-2"><?php esc_html_e( 'Donate to this plugin &#187;' ); ?></a></li>
	  </ul>

	  <div id="categoryfeaturedimage-admin-tabs-1">
		<div class="wrap">
			<h2>Category Featured Image <?php esc_html_e( 'Settings' ); ?></h2>	

			<form method="post" action="<?php echo esc_url( $scriptname ); ?>">
			<?php wp_nonce_field( 'cfi_set', 'categoryfeaturedimage_set' ); ?>

			<div style="margin: 5px; padding: 5px;">

			<div style="display: block;padding:5px 15px">
			<input type="checkbox" name="when_posting" value="1" <?php checked( '1', $categoryfeaturedimage_settings['when_posting'] ); ?>><?php esc_html_e( 'Apply category featured image at post', 'category-featured-image' ); ?>
			</div>

			</div>

			<?php submit_button( __( 'Save Changes' ), 'large', 'Manageset', false ); ?>

			</form>

		</div>
	  </div>

	  <div id="categoryfeaturedimage-admin-tabs-2">
		<div class="wrap">
		<?php $this->credit(); ?>
		</div>
	  </div>

	</div>

		</div>
		<?php
	}

	/** ==================================================
	 * Credit
	 *
	 * @since 1.00
	 */
	private function credit() {

		$plugin_name    = null;
		$plugin_ver_num = null;
		$plugin_path    = plugin_dir_path( __DIR__ );
		$plugin_dir     = untrailingslashit( $plugin_path );
		$slugs          = explode( '/', $plugin_dir );
		$slug           = end( $slugs );
		$files          = scandir( $plugin_dir );
		foreach ( $files as $file ) {
			if ( '.' === $file || '..' === $file || is_dir( $plugin_path . $file ) ) {
				continue;
			} else {
				$exts = explode( '.', $file );
				$ext  = strtolower( end( $exts ) );
				if ( 'php' === $ext ) {
					$plugin_datas = get_file_data(
						$plugin_path . $file,
						array(
							'name'    => 'Plugin Name',
							'version' => 'Version',
						)
					);
					if ( array_key_exists( 'name', $plugin_datas ) && ! empty( $plugin_datas['name'] ) && array_key_exists( 'version', $plugin_datas ) && ! empty( $plugin_datas['version'] ) ) {
						$plugin_name    = $plugin_datas['name'];
						$plugin_ver_num = $plugin_datas['version'];
						break;
					}
				}
			}
		}
		$plugin_version = __( 'Version:' ) . ' ' . $plugin_ver_num;
		/* translators: FAQ Link & Slug */
		$faq       = sprintf( esc_html__( 'https://wordpress.org/plugins/%s/faq', '%s' ), $slug );
		$support   = 'https://wordpress.org/support/plugin/' . $slug;
		$review    = 'https://wordpress.org/support/view/plugin-reviews/' . $slug;
		$translate = 'https://translate.wordpress.org/projects/wp-plugins/' . $slug;
		$facebook  = 'https://www.facebook.com/katsushikawamori/';
		$twitter   = 'https://twitter.com/dodesyo312';
		$youtube   = 'https://www.youtube.com/channel/UC5zTLeyROkvZm86OgNRcb_w';
		$donate    = sprintf( esc_html__( 'https://shop.riverforest-wp.info/donate/', '%s' ), $slug );

		?>
			<span style="font-weight: bold;">
			<div>
		<?php echo esc_html( $plugin_version ); ?> | 
			<a style="text-decoration: none;" href="<?php echo esc_url( $faq ); ?>" target="_blank"><?php esc_html_e( 'FAQ' ); ?></a> | <a style="text-decoration: none;" href="<?php echo esc_url( $support ); ?>" target="_blank"><?php esc_html_e( 'Support Forums' ); ?></a> | <a style="text-decoration: none;" href="<?php echo esc_url( $review ); ?>" target="_blank"><?php sprintf( esc_html_e( 'Reviews', '%s' ), $slug ); ?></a>
			</div>
			<div>
			<a style="text-decoration: none;" href="<?php echo esc_url( $translate ); ?>" target="_blank">
			<?php
			/* translators: Plugin translation link */
			echo sprintf( esc_html__( 'Translations for %s' ), esc_html( $plugin_name ) );
			?>
			</a> | <a style="text-decoration: none;" href="<?php echo esc_url( $facebook ); ?>" target="_blank"><span class="dashicons dashicons-facebook"></span></a> | <a style="text-decoration: none;" href="<?php echo esc_url( $twitter ); ?>" target="_blank"><span class="dashicons dashicons-twitter"></span></a> | <a style="text-decoration: none;" href="<?php echo esc_url( $youtube ); ?>" target="_blank"><span class="dashicons dashicons-video-alt3"></span></a>
			</div>
			</span>

			<div style="width: 250px; height: 180px; margin: 5px; padding: 5px; border: #CCC 2px solid;">
			<h3><?php sprintf( esc_html_e( 'Please make a donation if you like my work or would like to further the development of this plugin.', '%s' ), $slug ); ?></h3>
			<div style="text-align: right; margin: 5px; padding: 5px;"><span style="padding: 3px; color: #ffffff; background-color: #008000">Plugin Author</span> <span style="font-weight: bold;">Katsushi Kawamori</span></div>
			<button type="button" style="margin: 5px; padding: 5px;" onclick="window.open('<?php echo esc_url( $donate ); ?>')"><?php esc_html_e( 'Donate to this plugin &#187;' ); ?></button>
			</div>

			<?php

	}

	/** ==================================================
	 * Update wp_options table.
	 *
	 * @since 1.00
	 */
	private function options_updated() {

		if ( isset( $_POST['Manageset'] ) && ! empty( $_POST['Manageset'] ) ) {
			if ( check_admin_referer( 'cfi_set', 'categoryfeaturedimage_set' ) ) {
				$categoryfeaturedimage_settings = get_option( 'categoryfeaturedimage' );
				if ( ! empty( $_POST['when_posting'] ) ) {
					$categoryfeaturedimage_settings['when_posting'] = true;
				} else {
					$categoryfeaturedimage_settings['when_posting'] = false;
				}
				update_option( 'categoryfeaturedimage', $categoryfeaturedimage_settings );
				echo '<div class="notice notice-success is-dismissible"><ul><li>' . esc_html( __( 'Settings' ) . ' --> ' . __( 'Settings saved.' ) ) . '</li></ul></div>';
			}
		}

	}

	/** ==================================================
	 * Add custom box.
	 *
	 * @since 1.02
	 */
	public function add_exclude_categoryfeaturedimage_custom_box() {

		add_meta_box( 'categoryfeaturedimage_exclude', 'Category Featured Image', array( $this, 'exclude_categoryfeaturedimage_custom_box' ), 'post', 'side', 'high' );

		$args = array(
			'public'   => true,
			'_builtin' => false,
		);
		$custom_post_types = get_post_types( $args, 'objects', 'and' );
		foreach ( $custom_post_types as $post_type ) {
			add_meta_box( 'categoryfeaturedimage_exclude', 'Category Featured Image', array( $this, 'exclude_categoryfeaturedimage_custom_box' ), $post_type->name, 'side', 'high' );
		}

	}

	/** ==================================================
	 * Custom box.
	 *
	 * @since 1.02
	 */
	public function exclude_categoryfeaturedimage_custom_box() {

		if ( isset( $_GET['post'] ) && ! empty( $_GET['post'] ) ) {
			$get_post = intval( $_GET['post'] );
		} else {
			$get_post = null;
		}

		static $print_nonce = true;
		if ( $print_nonce ) {
			$print_nonce = false;
			wp_nonce_field( plugin_basename( __FILE__ ), 'categoryfeaturedimage_edit_nonce' );
		}

		$categoryfeaturedimage_exclude = get_post_meta( intval( $get_post ), 'categoryfeaturedimage_exclude', true );

		?>
		<table>
		<tbody>
			<tr>
				<td>
					<div>
						<?php
						if ( $categoryfeaturedimage_exclude ) {
							?>
							<input type="checkbox" name="categoryfeaturedimage_exclude" value="1">
							<?php
						} else {
							?>
							<input type="checkbox" name="categoryfeaturedimage_exclude" value="1" checked>
							<?php
						}
						esc_html_e( 'Apply' );
						?>
					</div>
				</td>
			</tr>
		</tbody>
		</table>
		<?php

	}

	/** ==================================================
	 * Update wp_postmeta table.
	 *
	 * @param int $post_id  post_id.
	 * @since 1.02
	 */
	public function save_exclude_categoryfeaturedimage_postdata( $post_id ) {

		$slug = 'categoryfeaturedimage';

		if ( ! current_user_can( 'edit_post', intval( $post_id ) ) ) {
			return;
		}
		$_POST += array( "{$slug}_edit_nonce" => '' );
		if ( isset( $_POST[ "{$slug}_edit_nonce" ] ) && ! empty( $_POST[ "{$slug}_edit_nonce" ] ) ) {
			$edit_nonce = wp_strip_all_tags( wp_unslash( $_POST[ "{$slug}_edit_nonce" ] ) );
			if ( ! wp_verify_nonce( $edit_nonce, plugin_basename( __FILE__ ) ) ) {
				return;
			}
		}

		if ( isset( $_REQUEST['categoryfeaturedimage_exclude'] ) ) {
			delete_post_meta( intval( $post_id ), 'categoryfeaturedimage_exclude' );
		} else {
			add_post_meta( intval( $post_id ), 'categoryfeaturedimage_exclude', 1, true );
		}

	}

	/** ==================================================
	 * Posts columns menu
	 *
	 * @param array $columns  columns.
	 * @since 1.02
	 */
	public function posts_columns_categoryfeaturedimage( $columns ) {

		$columns['column_categoryfeaturedimage_exclude'] = __( 'Category Featured Image' );
		return $columns;

	}

	/** ==================================================
	 * Posts columns
	 *
	 * @param string $column_name  column_name.
	 * @param int    $post_id  post_id.
	 * @since 1.02
	 */
	public function posts_custom_columns_categoryfeaturedimage( $column_name, $post_id ) {

		if ( 'column_categoryfeaturedimage_exclude' === $column_name ) {
			$categoryfeaturedimage_exclude = get_post_meta( $post_id, 'categoryfeaturedimage_exclude', true );
			if ( $categoryfeaturedimage_exclude ) {
				?>
				<div><span class="column-categoryfeaturedimage_exclude" style="display: none;">1</span>
				<?php esc_html_e( 'Exclude', 'category-featured-image' ); ?></div>
				<?php
			} else {
				esc_html_e( 'Apply' );
			}
		}

	}

	/** ==================================================
	 * Quick Edit Form
	 *
	 * @param string $column_name  column_name.
	 * @param object $post_type  post_type.
	 * @since 1.02
	 */
	public function display_custom_quickedit_categoryfeaturedimage( $column_name, $post_type ) {

		static $print_nonce = true;
		if ( $print_nonce ) {
			$print_nonce = false;
			wp_nonce_field( plugin_basename( __FILE__ ), 'categoryfeaturedimage_edit_nonce' );
		}

		?>
		<fieldset class="inline-edit-col-right inline-edit-<?php echo esc_attr( $column_name ); ?>">
			<div class="inline-edit-col <?php echo esc_attr( $column_name ); ?>">
				<label class="inline-edit-group">
				<?php
				if ( 'column_categoryfeaturedimage_exclude' === $column_name ) {
					?>
					<span class="title">Category Featured Image</span>
					<div>
					<span style="margin-right: 1em;"></span>
					<input type="checkbox" name="categoryfeaturedimage_exclude" value="1" />
					<span class="checkbox-title"><?php esc_html_e( 'Apply' ); ?></span>
					</div>
					<?php
				}
				?>
				</label>
			</div>
		</fieldset>
		<?php

	}

	/** ==================================================
	 * Load Quick Edit Script
	 *
	 * @param string $hook  hook.
	 * @since 1.02
	 */
	public function wp_categoryfeaturedimage_admin_enqueue_scripts( $hook ) {

		wp_enqueue_script( 'categoryfeaturedimage_custom_script', plugin_dir_url( __DIR__ ) . 'js/admin_edit.js', array( 'jquery', 'inline-edit-post' ), '1.00', false );

	}

}


