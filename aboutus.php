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
$GLOBALS['xoopsOption']['template_main'] = 'enterprise_aboutus.html';
require XOOPS_ROOT_PATH . '/header.php';
require_once XOOPS_ROOT_PATH . '/modules/enterprise/class/class.enterprise.php';
if (isset($_GET['item'])) {
    $item = (int)$_GET['item'];
} else {
    $item = 1;
}
$aboutUs = Enterprise::get_aboutUs($item);
$xoopsTpl->assign('aboutUs', $aboutUs);
require_once XOOPS_ROOT_PATH . '/modules/enterprise/footer.php';
require_once XOOPS_ROOT_PATH . '/footer.php';
