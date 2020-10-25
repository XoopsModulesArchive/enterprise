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
$case_id = new XoopsFormHidden('case_id', $form_v['case_id']);
$case_family_id_sel = new XoopsFormSelect('Category', 'case_family_id', $form_v['case_family_id'], 1, false);
$db = XoopsDatabaseFactory::getDatabaseConnection();
$myts = MyTextSanitizer::getInstance();
$catList = [];
$sql = 'SELECT id, name FROM ' . $db->prefix('enterprise_success_story_family');
$result = $db->query($sql);
while ($myrow = $db->fetchArray($result)) {
    $catList[$myrow['id']] = $myrow['name'];
}
$case_family_id_sel->addOptionArray($catList);
$case_project_name_text = new XoopsFormText('Project Name (*)', 'case_project_name', 60, 120, $form_v['case_project_name']);
$case_project_desc_textarea = new XoopsFormTextArea('Description (brief) (*)', 'case_project_desc', $form_v['case_project_desc'], 6);
$case_technology_text = new XoopsFormText('Technology', 'case_technology', 60, 255, $form_v['case_technology']);
$case_project_desc_long_textarea = new XoopsFormTextArea('Description (long)', 'case_project_desc_long', $form_v['case_project_desc_long'], 12);
$submit_button = new XoopsFormButton('', 'submit', 'submit', 'submit');
$e_case_form = new XoopsThemeForm('Case/success story item details', 'caseform', "index.php?obj=case&op=$operation");
$e_case_form->addElement($case_id);
$e_case_form->addElement($case_family_id_sel);
$e_case_form->addElement($case_project_name_text, true);
$e_case_form->addElement($case_project_desc_textarea, true);
$e_case_form->addElement($case_technology_text);
$e_case_form->addElement($case_project_desc_long_textarea);
$e_case_form->addElement($submit_button);
