<?php

// ------------------------------------------------------------------------- //
// Enterprise-X for Xoops //
// Version: 1.0 //
// ------------------------------------------------------------------------- //
// Author: Wang Jue (alias wjue)  //
// Purpose: Professional Corporate Presentation Application //
// email: wjue@wjue.org  //
// URLs: http://www.wjue.org, http://www.guanxiCRM.com //
// Copyright 2004 (c): Wang Jue  //
// Graphic design: (c) www.Imagocn.net  //
//   //
// You may not change or alter any portion of this comment or credits //
// of supporting developers from this source code or any supporting //
// source code which is considered copyrighted (c) material of the //
// original comment or credit authors.  //
//---------------------------------------------------------------------------//
// This program is free software; you can redistribute it and/or modify //
// it under the terms of the GNU General Public License as published by //
// the Free Software Foundation; either version 2 of the License, or //
// (at your option) any later version.  //
//   //
// This program is distributed in the hope that it will be useful, //
// but WITHOUT ANY WARRANTY; without even the implied warranty of //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the //
// GNU General Public License for more details. //
//---------------------------------------------------------------------------//
require dirname(__DIR__, 2) . '/mainfile.php';
$GLOBALS['xoopsOption']['template_main'] = 'enterprise_index.html';
require XOOPS_ROOT_PATH . '/header.php';
require_once XOOPS_ROOT_PATH . '/modules/enterprise/class/class.enterprise.php';
$introPart = Enterprise::get_introPart();
$servicesPart = Enterprise::get_servicesPart();
$testimonyPart = Enterprise::get_testimonyPart();
$accroche = Enterprise::get_accroche();
$xoopsTpl->assign('accroche', $accroche);
$xoopsTpl->assign('introPart', $introPart);
$xoopsTpl->assign('servicesPart', $servicesPart);
$xoopsTpl->assign('testimonyPart', $testimonyPart);
require_once XOOPS_ROOT_PATH . '/modules/enterprise/footer.php';
require_once XOOPS_ROOT_PATH . '/footer.php';
