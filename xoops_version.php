<?php
/**
 * ****************************************************************************
 * isearch - MODULE FOR XOOPS
 * Copyright (c) Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package   modules\isearch\config
 * @copyright Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * @author    Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * ****************************************************************************
 */
defined('XOOPS_ROOT_PATH') || exit('Restricted access');

$modversion['version']       = 1.91;
$modversion['module_status'] = 'ALPHA 1';
$modversion['release_date']  = '2017/05/27';

$modversion['name']        = _MI_ISEARCH_NAME;
$modversion['description'] = _MI_ISEARCH_DESC;
$modversion['credits'] = "Christian, Marco";
$modversion['author'] = 'Instant Zero - http://instant-zero.com/xoops';
$modversion['help'] = "";
$modversion['license'] = "GPL";
$modversion['official'] = 0;
$modversion['image'] = "assets/images/isearch_logo.png";
$modversion['dirname'] = "isearch";

$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

// Scripts to run upon installation or update
$modversion['onInstall'] = "include/oninstall.inc.php";
$modversion['onUpdate']  = "include/onupdate.inc.php";


$modversion['tables'][0] = "isearch_searches";

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

$modversion['min_php']   = '5.3.7';
$modversion['min_xoops'] = '2.5.8';
$modversion['min_db']    = array('mysql'=>'5.0.7', 'mysqli'=>'5.0.7');
$modversion['min_admin'] = '1.2';

// Templates
$modversion['templates'][1]['file'] = 'isearch_index.tpl';
$modversion['templates'][1]['description'] = '';

// Blocks
$modversion['blocks'][1]['file'] = "isearch_last_search.php";
$modversion['blocks'][1]['name'] = _MI_ISEARCH_BNAME1;
$modversion['blocks'][1]['description'] = "Show last searches";
$modversion['blocks'][1]['show_func'] = "b_isearch_last_search_show";
$modversion['blocks'][1]['template'] = 'isearch_block_last_search.tpl';

$modversion['blocks'][2]['file'] = "isearch_biggest_users.php";
$modversion['blocks'][2]['name'] = _MI_ISEARCH_BNAME2;
$modversion['blocks'][2]['description'] = "Show people who are the biggest users of the search";
$modversion['blocks'][2]['show_func'] = "b_isearch_big_user_show";
$modversion['blocks'][2]['template'] = 'isearch_block_big_user.tpl';

$modversion['blocks'][3]['file'] = "isearch_stats.php";
$modversion['blocks'][3]['name'] = _MI_ISEARCH_BNAME3;
$modversion['blocks'][3]['description'] = "Show statistics";
$modversion['blocks'][3]['show_func'] = "b_isearch_stats_show";
$modversion['blocks'][3]['template'] = 'isearch_block_stats.tpl';

// Menu
$modversion['hasMain'] = 1;

// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "isearch_search";

// Comments
$modversion['hasComments'] = 0;

// Show last searches on the module's index page ?
$modversion['config'][1]['name'] = 'showindex';
$modversion['config'][1]['title'] = '_MI_ISEARCH_OPT0';
$modversion['config'][1]['description'] = '_MI_ISEARCH_OPT0_DSC';
$modversion['config'][1]['formtype'] = 'textbox';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = 10;

// Groups that should not be recorded
$member_handler = xoops_gethandler('member');

$modversion['config'][2]['name'] = 'bannedgroups';
$modversion['config'][2]['title'] = "_MI_ISEARCH_OPT1";
$modversion['config'][2]['description'] = "_MI_ISEARCH_OPT1_DSC";
$modversion['config'][2]['formtype'] = 'select_multi';
$modversion['config'][2]['valuetype'] = 'array';
$modversion['config'][2]['default'] = array();
$modversion['config'][2]['options'] = array_flip($member_handler->getGroupList());

// How many keywords to see at a time in the admin's part of the module ?
$modversion['config'][3]['name'] = 'admincount';
$modversion['config'][3]['title'] = '_MI_ISEARCH_OPT2';
$modversion['config'][3]['description'] = '_MI_ISEARCH_OPT2_DSC';
$modversion['config'][3]['formtype'] = 'textbox';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = 10;

// List of IPs you don't want to record searches
$modversion['config'][4]['name'] = 'remove_ip';
$modversion['config'][4]['title'] = '_MI_ISEARCH_OPT3';
$modversion['config'][4]['description'] = '_MI_ISEARCH_OPT3_DSC';
$modversion['config'][4]['formtype'] = 'textarea';
$modversion['config'][4]['valuetype'] = 'text';
$modversion['config'][4]['default'] = '';

// Notifications
$modversion['hasNotification'] = 0;
