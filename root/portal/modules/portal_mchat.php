<?php
/**
*
* @package Board3 Portal v2 - mChat Block
* @copyright (c) Board3 Group ( www.board3.de )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package Modulname
*/
class portal_mchat_module
{
	/**
	* Allowed columns: Just sum up your options (Exp: left + right = 10)
	* top		1
	* left		2
	* center	4
	* right		8
	* bottom	16
	*/
	public $columns = 21;

	/**
	* Default modulename
	*/
	public $name = 'PORTAL_MCHAT';

	/**
	* Default module-image:
	* file must be in "{T_THEME_PATH}/images/portal/"
	*/
	public $image_src = '';

	/**
	* module-language file
	* file must be in "language/{$user->lang}/mods/portal/"
	*/
	public $language = 'portal_mchat_module';
	
	/**
	* custom acp template
	* file must be in "adm/style/portal/"
	*/
	public $custom_acp_tpl = '';
	
	/**
	* hide module name in ACP configuration page
	*/
	public $hide_name = true;

	public function get_template_center($module_id)
	{
		global $config, $template, $phpbb_root_path, $phpEx, $auth, $user, $cache, $db;

		if(!defined('MCHAT_INCLUDE'))
		{
			define('MCHAT_INCLUDE', true);
		}
		if(!function_exists('mchat_cache') && !empty($config['mchat_enable']) && $auth->acl_get('u_mchat_view'))
		{
			$mchat_include_index = true;
			include($phpbb_root_path . 'mchat.' . $phpEx);
		}

		return 'mchat_center.html';
	}

	public function get_template_acp($module_id)
	{
		return array(
			'title'	=> 'PORTAL_MCHAT',
			'vars'	=> array(),
		);
	}

	/**
	* API functions
	*/
	public function install($module_id)
	{
		return true;
	}

	public function uninstall($module_id)
	{
		global $db;

		return true;
	}
}
