<?php
/**
 * Admin functions, especially for hooking into the Genesis Exporter.
 *
 * @package    Genesis Extra Settings Transporter
 * @subpackage Admin
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2013, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL-2.0+
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-extra-settings-transporter/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.0.0
 */

add_filter( 'genesis_export_options', 'ddw_gest_plugins_export_additions', 15, 1 );
/**
* Hook official & third-party Genesis-specific plugins into "Genesis Exporter",
*    allowing their settings to be exported.
*
* @since 1.0.0
*
* @param $gest_plugin_string
* @param $gest_plugin_prefix
* @param $gest_plugin_suffix_studiopress
* @param $gest_plugin_suffix_other
* @param array $options Genesis Exporter options.
*
* @return array
*/
function ddw_gest_plugins_export_additions( array $options ) {

	/** Helper strings */
	$gest_plugin_string             = '*' . __( 'Plugin', 'genesis-extra-settings-transporter' );
	$gest_plugin_prefix             = $gest_plugin_string . ': ';
	$gest_plugin_suffix_studiopress = ' (' . __( 'official release', 'genesis-extra-settings-transporter' ) . ')';
	$gest_plugin_suffix_other       = ' (' . __( 'community release', 'genesis-extra-settings-transporter' ) . ')';

	define( 'GEST_PLUGIN_STRING', $gest_plugin_string );

	/**
	 * 1) StudioPress official stuff:
	 */

	/** Genesis Simple Hooks (gsh) - free by StudioPress */
	if ( defined( 'SIMPLEHOOKS_SETTINGS_FIELD' ) ) {

		$options[ 'gsh' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Simple Hooks', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_studiopress,
			'settings-field' => SIMPLEHOOKS_SETTINGS_FIELD
		);

	}

	/** Genesis Simple Sidebars (gss) - free by StudioPress */
	if ( defined( 'SS_SETTINGS_FIELD' ) /* && ! function_exists( 'gsse_export_options' ) */ ) {

		$options[ 'gss' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Simple Sidebars', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_studiopress,
			'settings-field' => SS_SETTINGS_FIELD
		);

	}

	/** Genesis Slider (gs) - free by StudioPress */
	if ( defined( 'GENESIS_SLIDER_SETTINGS_FIELD' ) ) {

		$options[ 'gs' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Slider', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_studiopress,
			'settings-field' => GENESIS_SLIDER_SETTINGS_FIELD
		);

	}

	/** Genesis Responsive Slider (grs) - free by StudioPress */
	if ( defined( 'GENESIS_RESPONSIVE_SLIDER_SETTINGS_FIELD' ) ) {

		$options[ 'grs' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Responsive Slider', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_studiopress,
			'settings-field' => GENESIS_RESPONSIVE_SLIDER_SETTINGS_FIELD
		);

	}

	/** Genesis Simple Edits (gse) - free by StudioPress */
	if ( defined( 'GSE_SETTINGS_FIELD' ) ) {

		$options[ 'gse' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Simple Edits', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_studiopress,
			'settings-field' => GSE_SETTINGS_FIELD
		);

	}

	/**
	 * 2) Third party stuff:
	 */

	/** Genesis Layout Extras (gle) - free, by David Decker */
	if ( defined( 'GLE_SETTINGS_FIELD' ) ) {

		$options[ 'gle' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Layout Extras', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GLE_SETTINGS_FIELD
		);

	}

	/** Genesis Simple Comments (gsc) - free, by Nick Croft */
	if ( defined( 'GSC_SETTINGS_FIELD' ) ) {

		$options[ 'gsc' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Simple Comments', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GSC_SETTINGS_FIELD
		);

	}

	/** Genesis Simple Breadcrumbs (gsb) - free, by Nick Croft */
	if ( defined( 'GSB_SETTINGS_FIELD' ) ) {

		$options[ 'gsb' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Simple Breadcrumbs', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GSB_SETTINGS_FIELD
		);

	}

	/** Genesis Responsive Header (grh) - free, by Nick Croft */
	if ( defined( 'GRH_SETTINGS_FIELD' ) ) {

		$options[ 'grh' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Responsive Header', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GRH_SETTINGS_FIELD
		);

	}

	/** Genesis Grid Loop (ggl) - free, by Bill Erickson */
	if ( class_exists( 'BE_Genesis_Grid' ) ) {

		$options[ 'ggl' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Grid Loop', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'genesis-grid'
		);

	}

	/** Genesis Bootstrap Carousel (gbsc) - free, by Justin Tallant */
	if ( defined( 'GENESIS_BOOTSTRAP_CAROUSEL_SETTINGS_FIELD' ) ) {

		$options[ 'gbsc' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Bootstrap Carousel', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GENESIS_BOOTSTRAP_CAROUSEL_SETTINGS_FIELD
		);

	}

	/** Genesis Widget Toggle (gwt) - free, by Arya Prakasa */
	if ( defined( 'GWT_SETTINGS_FIELD' ) ) {

		$options[ 'gwt' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Widget Toggle', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GWT_SETTINGS_FIELD
		);

	}

	/** Genesis Accordion (gacc) - free, by Pat Ramsey */
	if ( defined( 'GENESIS_ACCORDION_SETTINGS_FIELD' ) ) {

		$options[ 'gacc' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Accordion', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GENESIS_ACCORDION_SETTINGS_FIELD
		);

	}

	/** Genesis Post Navigation (gpn) - free, by Iniyan */
	if ( defined( 'GPN_SETTINGS_FIELD' ) ) {

		$options[ 'gpn' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Post Navigation', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GPN_SETTINGS_FIELD
		);

	}

	/** Genesis 404 Page (g404p) - free, by Bill Erickson */
	if ( class_exists( 'BE_Genesis_404' ) ) {

		$options[ 'g404p' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis 404 Page', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => 'genesis-404'
		);

	}

	/** Genesis Design Palette (gdp)  - free, by Andrew Norcross */
	if ( defined( 'GS_SETTINGS_FIELD' ) ) {

		$options[ 'gdp' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Genesis Design Palette', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => GS_SETTINGS_FIELD
		);

	}

	/** Generate Box (grtbox)  - free, by Hesham Zebida */
	if ( defined( 'generatebox_SETTINGS_FIELD' ) ) {

		$options[ 'grtbox' ] = array(
			'label'          => $gest_plugin_prefix . __( 'Generate Box', 'genesis-extra-settings-transporter' ) . $gest_plugin_suffix_other,
			'settings-field' => generatebox_SETTINGS_FIELD
		);

	}

	/** Return the additional (plugins) settings fields to hook into the Genesis Exporter */
	return $options;

}  // end of function ddw_gest_plugins_export_additions


add_filter( 'genesis_export_options', 'ddw_gest_child_themes_export_additions', 16, 1 );
/**
* Hook official & third-party Genesis child themes into "Genesis Exporter",
*    allowing their settings to be exported.
*
* @since 1.0.0
*
* @param $gest_child_theme_string
* @param $gest_child_theme_prefix
* @param $gest_theme_settings
* @param $gest_footer_settings
* @param $gest_child_theme_suffix_spmarket
* @param $gest_child_theme_suffix_other
* @param array $options Genesis Exporter options.
*
* @return array
*/
function ddw_gest_child_themes_export_additions( array $options ) {

	/** Helper strings */
	$gest_child_theme_string          = '*' . __( 'Child Theme', 'genesis-extra-settings-transporter' );
	$gest_child_theme_prefix          = $gest_child_theme_string . ': ';
	$gest_theme_settings              = ' ' . __( 'Theme Settings', 'genesis-extra-settings-transporter' );
	$gest_footer_settings             = ' ' . __( 'Footer Settings', 'genesis-extra-settings-transporter' );
	$gest_child_theme_suffix_spmarket = ' (' . __( 'via Community/ Marketplace', 'genesis-extra-settings-transporter' ) . ')';
	$gest_child_theme_suffix_other    = ' (' . __( 'third-party product', 'genesis-extra-settings-transporter' ) . ')';

	define( 'GEST_CHILD_THEME_STRING', $gest_child_theme_string );

	/**
	 * 1) Community/ Markeptlace child themes (via studiopress.com)
	 */

	/** Curtail (by Thomas Griffin Media) */
	if ( defined( 'CURTAIL_SETTINGS_FIELD' ) ) {

		$options[ 'ctcurtail' ] = array(
			'label'          => $gest_child_theme_prefix . 'Curtail' . $gest_theme_settings . $gest_child_theme_suffix_spmarket,
			'settings-field' => CURTAIL_SETTINGS_FIELD
		);

	}

	/**
	 * 2) Third-party child themes (via other sources)
	 */

	/** Genesis Sandbox (by SureFireWebservice) */
	if ( class_exists( 'Genesis_Sandbox_Settings' ) && defined( 'CHILD_SETTINGS_FIELD' ) ) {

		$options[ 'ctgsandbox' ] = array(
			'label'          => $gest_child_theme_prefix . 'Genesis Sandbox' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => CHILD_SETTINGS_FIELD
		);

	}

	/** AyoShop (by AyoThemes) */
	if ( function_exists( 'ayoshop_setup' ) ) {

		$options[ 'ctayoshop' ] = array(
			'label'          => $gest_child_theme_prefix . 'AyoShop' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'ayo_theme_customizer'
		);

	}

	/** Dizain-01 (by ThemeDizain) */
	if ( class_exists( 'Dizain' ) ) {

		$options[ 'ctdizain01' ] = array(
			'label'          => $gest_child_theme_prefix . 'Dizain-01' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'option_tree'
		);

	}

	/** Radio (by Greg Rickaby) */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Radio Theme' == CHILD_THEME_NAME ) ) {

		$options[ 'ctradio' ] = array(
			'label'          => $gest_child_theme_prefix . 'Radio' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'child-settings'
		);

	}

	/** Curb Appeal (by Agent Evolution) */
	if ( class_exists( 'Curb_Appeal_Footer_Settings' ) ) {

		$options[ 'ctcurbappeal' ] = array(
			'label'          => $gest_child_theme_prefix . 'Curb Appeal' . $gest_footer_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'curbappeal-footer-settings'
		);

	}

	/** Turn Key (by Agent Evolution) */
	if ( class_exists( 'Turn_Key_Footer_Settings' ) ) {

		$options[ 'ctturnkey' ] = array(
			'label'          => $gest_child_theme_prefix . 'Turn Key' . $gest_footer_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'turnkey-footer-settings'
		);

	}

	/** Egreen (by ThemeWolf) */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Egreen Theme' == CHILD_THEME_NAME ) ) {

		$options[ 'ctegreen' ] = array(
			'label'          => $gest_child_theme_prefix . 'Egreen' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'tw-egreen-settings'
		);

	}

	/** Dedicated (by GenesisAwesome) */
	if ( defined( 'GA_CHILDTHEME_FIELD' ) || ( defined( 'CHILD_THEME_NAME' ) && ( 'Dedicated' == CHILD_THEME_NAME ) ) ) {

		$options[ 'ctdedicated' ] = array(
			'label'          => $gest_child_theme_prefix . 'Dedicated' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => GA_CHILDTHEME_FIELD
		);

	}

	/** Greetings (by GenesisAwesome) */
	if ( defined( 'GA_CHILDTHEME_FIELD' ) || ( defined( 'CHILD_THEME_NAME' ) && ( 'Greetings' == CHILD_THEME_NAME ) ) ) {

		$options[ 'ctgreetings' ] = array(
			'label'          => $gest_child_theme_prefix . 'Greetings' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => GA_CHILDTHEME_FIELD
		);

	}

	/** Portlight (by GenesisAwesome) */
	if ( defined( 'GA_CHILDTHEME_FIELD' ) || ( defined( 'CHILD_THEME_NAME' ) && ( 'Portlight' == CHILD_THEME_NAME ) ) ) {

		$options[ 'ctportlight' ] = array(
			'label'          => $gest_child_theme_prefix . 'Portlight' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => GA_CHILDTHEME_FIELD
		);

	}

	/**
	 * 3) Third-party child themes by "Web Savvy Marketing, LLC"
	 */

	/** Alexandra */
	if ( class_exists( 'Alexandra_Settings' ) ) {

		$options[ 'ctalexandra' ] = array(
			'label'          => $gest_child_theme_prefix . 'Alexandra' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'alexandra-settings'
		);

	}

	/** Anneliese */
	if ( class_exists( 'WSM_Anneliese_Settings' ) ) {

		$options[ 'ctanneliese' ] = array(
			'label'          => $gest_child_theme_prefix . 'Anneliese' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'anneliese-settings'
		);

	}

	/** Carla Anna */
	if ( class_exists( 'Child_Theme_Settings' ) || function_exists( 'carla_anna_flexslider_options' ) ) {

		$options[ 'ctcarlaanna' ] = array(
			'label'          => $gest_child_theme_prefix . 'Carla Anna' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'child-settings'
		);

	}

	/** Christian */
	if ( class_exists( 'WSM_Christian_Settings' ) ) {

		$options[ 'ctchristian' ] = array(
			'label'          => $gest_child_theme_prefix . 'Christian' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'christian-settings'
		);

	}

	/** Colin */
	if ( class_exists( 'WSM_Colin_Settings' ) ) {

		$options[ 'ctcolin' ] = array(
			'label'          => $gest_child_theme_prefix . 'Colin' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'colin-settings'
		);

	}

	/** Dagmar */
	if ( class_exists( 'Dagmar_Settings' ) ) {

		$options[ 'ctdagmar' ] = array(
			'label'          => $gest_child_theme_prefix . 'Dagmar' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'dagmar-settings'
		);

	}

	/** Daniel */
	if ( class_exists( 'WSM_Daniel_Settings' ) ) {

		$options[ 'ctdaniel' ] = array(
			'label'          => $gest_child_theme_prefix . 'Daniel' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'daniel-settings'
		);

	}

	/** Ellen Mae */
	if ( class_exists( 'WSM_Ellen_Settings' ) ) {

		$options[ 'ctellen' ] = array(
			'label'          => $gest_child_theme_prefix . 'Ellen' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'ellen-settings'
		);

	}

	/** Erik */
	if ( class_exists( 'Erik_Settings' ) ) {

		$options[ 'cterik' ] = array(
			'label'          => $gest_child_theme_prefix . 'Erik' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'erik-settings'
		);

	}

	/** Elsa */
	if ( defined( 'ELSA_SETTINGS_FIELD' ) || class_exists( 'Elsa_Settings' ) ) {

		$options[ 'ctelsa' ] = array(
			'label'          => $gest_child_theme_prefix . 'Elsa' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => ELSA_SETTINGS_FIELD
		);

	}

	/** Frederik */
	if ( class_exists( 'WSM_Settings' ) || function_exists( 'frederik_do_header' ) ) {

		$options[ 'ctfrederik' ] = array(
			'label'          => $gest_child_theme_prefix . 'Frederik' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'frederik-settings'
		);

	}

	/** Hans */
	if ( class_exists( 'WSM_Settings' ) || function_exists( 'hans_add_viewport_meta_tag' )) {

		$options[ 'cthans' ] = array(
			'label'          => $gest_child_theme_prefix . 'Hans' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'hans-settings'
		);

	}

	/** Kathryn */
	if ( class_exists( 'WSM_Kathryn_Settings' ) ) {

		$options[ 'ctkathryn' ] = array(
			'label'          => $gest_child_theme_prefix . 'Kathryn' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'kathryn-settings'
		);

	}

	/** Lillian */
	if ( class_exists( 'Lillian_Settings' ) ) {

		$options[ 'ctlillian' ] = array(
			'label'          => $gest_child_theme_prefix . 'Lillian' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'lillian-settings'
		);

	}

	/** Mariah */
	if ( class_exists( 'Mariah_Settings' ) ) {

		$options[ 'ctmariah' ] = array(
			'label'          => $gest_child_theme_prefix . 'Mariah' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'mariah-settings'
		);

	}

	/** Nancy */
	if ( class_exists( 'WSM_Nancy_Settings' ) ) {

		$options[ 'ctnancy' ] = array(
			'label'          => $gest_child_theme_prefix . 'Nancy' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'nancy-settings'
		);

	}

	/** Rasmus */
	if ( defined( 'RASMUS_SETTINGS_FIELD' ) ) {

		$options[ 'ctrasmus' ] = array(
			'label'          => $gest_child_theme_prefix . 'Rasmus' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => RASMUS_SETTINGS_FIELD
		);

	}

	/** Robert */
	if ( class_exists( 'WSM_Robert_Settings' ) ) {

		$options[ 'ctrobert' ] = array(
			'label'          => $gest_child_theme_prefix . 'Robert' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'robert-settings'
		);

	}

	/** Soren */
	if ( function_exists( 'soren_flexslider_options' ) ) {

		$options[ 'ctsoren' ] = array(
			'label'          => $gest_child_theme_prefix . 'Soren' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => WSM_SETTINGS_FIELD
		);

	}

	/**
	 * 4) Third-party child themes by "Themedy" brand
	 */

	/** Blink */
	if ( defined( 'BLINK_SETTINGS_FIELD' ) ) {

		$options[ 'ctblink' ] = array(
			'label'          => $gest_child_theme_prefix . 'Blink' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => BLINK_SETTINGS_FIELD
		);

	}

	/** CinchPress */
	if ( defined( 'CINCHPRESS_SETTINGS_FIELD' ) ) {

		$options[ 'ctcinchpress' ] = array(
			'label'          => $gest_child_theme_prefix . 'CinchPress' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => CINCHPRESS_SETTINGS_FIELD
		);

	}

	/** Clip Cart */
	if ( defined( 'CLIPCART_SETTINGS_FIELD' ) ) {

		$options[ 'ctclipcart' ] = array(
			'label'          => $gest_child_theme_prefix . 'Clip Cart' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => CLIPCART_SETTINGS_FIELD
		);

	}

	/** Derby */
	if ( defined( 'DERBY_SETTINGS_FIELD' ) ) {

		$options[ 'ctderby' ] = array(
			'label'          => $gest_child_theme_prefix . 'Derby' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => DERBY_SETTINGS_FIELD
		);

	}

	/** FeedPop */
	if ( defined( 'FEEDPOP_SETTINGS_FIELD' ) ) {

		$options[ 'ctfeedpop' ] = array(
			'label'          => $gest_child_theme_prefix . 'FeedPop' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => FEEDPOP_SETTINGS_FIELD
		);

	}

	/** Foxy News */
	if ( defined( 'FOXYNEWS_SETTINGS_FIELD' ) ) {

		$options[ 'ctfoxynews' ] = array(
			'label'          => $gest_child_theme_prefix . 'Foxy News' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => FOXYNEWS_SETTINGS_FIELD
		);

	}

	/** Fremedy */
	if ( defined( 'FREMEDY_SETTINGS_FIELD' ) ) {

		$options[ 'ctfremedy' ] = array(
			'label'          => $gest_child_theme_prefix . 'Fremedy' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => FREMEDY_SETTINGS_FIELD
		);

	}

	/** Grind */
	if ( defined( 'GRIND_SETTINGS_FIELD' ) ) {

		$options[ 'ctgrind' ] = array(
			'label'          => $gest_child_theme_prefix . 'Grind' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => GRIND_SETTINGS_FIELD
		);

	}

	/** Line It Up */
	if ( defined( 'LINEITUP_SETTINGS_FIELD' ) ) {

		$options[ 'ctlineitup' ] = array(
			'label'          => $gest_child_theme_prefix . 'Line It Up' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => LINEITUP_SETTINGS_FIELD
		);

	}

	/** MockFive */
	if ( defined( 'MOCKFIVE_SETTINGS_FIELD' ) ) {

		$options[ 'ctmockfive' ] = array(
			'label'          => $gest_child_theme_prefix . 'MockFive' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => MOCKFIVE_SETTINGS_FIELD
		);

	}

	/** Quik */
	if ( defined( 'QUIK_SETTINGS_FIELD' ) ) {

		$options[ 'ctquik' ] = array(
			'label'          => $gest_child_theme_prefix . 'Quik' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => QUIK_SETTINGS_FIELD
		);

	}

	/** Reactiv */
	if ( defined( 'REACTIV_SETTINGS_FIELD' ) ) {

		$options[ 'ctreactiv' ] = array(
			'label'          => $gest_child_theme_prefix . 'Reactiv' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => REACTIV_SETTINGS_FIELD
		);

	}

	/** Readyfolio */
	if ( defined( 'READYFOLIO_SETTINGS_FIELD' ) ) {

		$options[ 'ctreadyfolio' ] = array(
			'label'          => $gest_child_theme_prefix . 'Readyfolio' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => READYFOLIO_SETTINGS_FIELD
		);

	}

	/** Rough Print */
	if ( defined( 'ROUGHPRINT_SETTINGS_FIELD' ) ) {

		$options[ 'ctroghprint' ] = array(
			'label'          => $gest_child_theme_prefix . 'Rough Print' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => ROUGHPRINT_SETTINGS_FIELD
		);

	}

	/** Smooth Post */
	if ( defined( 'SMOOTHPOST_SETTINGS_FIELD' ) ) {

		$options[ 'ctcinchpress' ] = array(
			'label'          => $gest_child_theme_prefix . 'Smooth Post' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => SMOOTHPOST_SETTINGS_FIELD
		);

	}

	/** Stage */
	if ( defined( 'STAGE_SETTINGS_FIELD' ) ) {

		$options[ 'ctstage' ] = array(
			'label'          => $gest_child_theme_prefix . 'Stage' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => STAGE_SETTINGS_FIELD
		);

	}

	/** Tote */
	if ( defined( 'TOTE_SETTINGS_FIELD' ) ) {

		$options[ 'cttote' ] = array(
			'label'          => $gest_child_theme_prefix . 'Tote' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => TOTE_SETTINGS_FIELD
		);

	}

	/**
	 * 5) Third-party child themes by "ZigZagPress" brand
	 */

	/** Bijou */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Bijou' == CHILD_THEME_NAME ) ) {

		$options[ 'ctbijou' ] = array(
			'label'          => $gest_child_theme_prefix . 'Bijou' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

	}

	/** Engrave */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Engrave' == CHILD_THEME_NAME ) ) {

		$options[ 'ctengrave' ] = array(
			'label'          => $gest_child_theme_prefix . 'Engrave' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

	}

	/** Showroom */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Showroom Theme' == CHILD_THEME_NAME ) ) {

		$options[ 'ctshowroom' ] = array(
			'label'          => $gest_child_theme_prefix . 'Showroom' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

	}

	/** Single */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Single' == CHILD_THEME_NAME ) ) {

		$options[ 'ctsingle' ] = array(
			'label'          => $gest_child_theme_prefix . 'Single' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

	}

	/** Solo */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Solo' == CHILD_THEME_NAME ) ) {

		$options[ 'ctsolo' ] = array(
			'label'          => $gest_child_theme_prefix . 'Solo' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

	}

	/** Vanilla */
	if ( defined( 'CHILD_THEME_NAME' ) && ( 'Vanilla' == CHILD_THEME_NAME ) ) {

		$options[ 'ctvanilla' ] = array(
			'label'          => $gest_child_theme_prefix . 'Vanilla' . $gest_theme_settings . $gest_child_theme_suffix_other,
			'settings-field' => 'of_template'
		);

	}

	/** Return the additional (child themes) settings fields to hook into the Genesis Exporter */
	return $options;

}  // end of function ddw_gest_child_themes_export_additions


add_action( 'genesis_import_export_form', 'ddw_gest_exporter_notice' );
/**
 * Adds an extra info message at the bottom of the Genesis Exporter page,
 *    informing the user that there's no warranty supplied for the use of this plugin!
 */
function ddw_gest_exporter_notice() {

	/** Begin table code */
	?>

		<tr>
			<th scope="row"><h4>&rarr; <?php echo sprintf( __( 'Notes for the %s plugin', 'genesis-extra-settings-transporter' ), '&raquo;' . __( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ) . '&laquo;' ); ?>:</h4></th>
				<td>
					<p><br /><?php echo sprintf(
									__( 'Check boxes in the Exporter section above that have a label with the prefix %s or %s are from that plugin.', 'genesis-extra-settings-transporter' ),
									'<code>' . GEST_PLUGIN_STRING . '</code>',
									'<code>' . GEST_CHILD_THEME_STRING . '</code>'
					); ?></p>
					<p><?php _e( 'There\'s NO warranty supplied when you use this plugin, all at your own risk!', 'genesis-extra-settings-transporter' ); ?>
					</p>
				</td>
		</tr>

	<?php
	/** ^End table code */

}  // end of function ddw_gest_exporter_notice