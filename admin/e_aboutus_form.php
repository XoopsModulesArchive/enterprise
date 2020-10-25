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
$aboutus_id = new XoopsFormHidden('aboutus_id', $form_v['aboutus_id']);
$aboutus_name_text = new XoopsFormText('Name (*)', 'aboutus_name', 60, 120, $form_v['aboutus_name']);
$aboutus_description_textarea = new XoopsFormTextArea('Description (*)', 'aboutus_description', $form_v['aboutus_description'], 8);
$aboutus_image_text = new XoopsFormText('Image file name<br><br>Image file show be<br>located in :<br>enterprise/images/', 'aboutus_image', 60, 80, $form_v['aboutus_image']);
$submit_button = new XoopsFormButton('', 'submit', 'submit', 'submit');
$e_aboutus_form = new XoopsThemeForm('About-us item details', 'aboutusform', "index.php?obj=aboutus&op=$operation");
$e_aboutus_form->addElement($aboutus_id);
$e_aboutus_form->addElement($aboutus_name_text, true);
$e_aboutus_form->addElement($aboutus_description_textarea, true);
$e_aboutus_form->addElement($aboutus_image_text);
$e_aboutus_form->addElement($submit_button);
