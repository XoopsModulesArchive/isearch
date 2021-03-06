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
 * @package   modules\isearch\frontside
 * @copyright Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * @author    Hervé Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * ****************************************************************************
 */

require '../../mainfile.php';

$xoopsOption['template_main'] = 'isearch_index.tpl';
include_once XOOPS_ROOT_PATH . '/header.php';

$moduleDirName = basename(__DIR__);
$isHelper      = Xmf\Module\Helper::getHelper($moduleDirName);

include_once $isHelper->path('include/functions.php');

$isearch_handler = $isHelper->getHandler('searches');

$visiblekeywords = $isHelper->getConfig('showindex', 10);
$xoopsTpl->assign('visiblekeywords', (int)$visiblekeywords);

if ((int)$visiblekeywords > 0) {
    $totalcount = $isearch_handler->getCount();
    $start      = isset($_GET['start']) ? (int)$_GET['start'] : 0;
    $critere    = new Criteria('keyword');
    $critere->setSort('datesearch');
    $critere->setLimit($visiblekeywords);
    $critere->setStart($start);
    $critere->setOrder('DESC');
    include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
    $pagenav = new XoopsPageNav($totalcount, $visiblekeywords, $start, 'start', '');
    $xoopsTpl->assign('pagenav', $pagenav->renderNav());

    $elements = $isearch_handler->getObjects($critere);
    foreach($elements as $oneelement) {
        $xoopsTpl->append('keywords',array('keyword' => $oneelement->getVar('keyword'),
                                              'date' => formatTimestamp(strtotime($oneelement->getVar('datesearch'))))
        );
    }
}

include_once XOOPS_ROOT_PATH . '/footer.php';
