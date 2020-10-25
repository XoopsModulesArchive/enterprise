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
$case_family_id_sel = new XoopsFormSelect('Category', 'case_family_id', '', 1, false);
$db = XoopsDatabaseFactory::getDatabaseConnection();
$myts = MyTextSanitizer::getInstance();
$catList = [];
$sql = 'SELECT id, name FROM ' . $db->prefix('enterprise_success_story_family');
$result = $db->query($sql);
while ($myrow = $db->fetchArray($result)) {
    $catList[$myrow['id']] = $myrow['name'];
}
$case_family_id_sel->addOptionArray($catList);
$edit_button = new XoopsFormButton('', 'modify', 'modify', 'submit');
$e_casecat_form = new XoopsThemeForm('Success story category manager', 'casecatform', 'index.php?obj=casecat&op=edit');
$e_casecat_form->addElement($case_family_id_sel);
$e_casecat_form->addElement($edit_button);
