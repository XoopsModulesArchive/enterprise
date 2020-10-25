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
$service_id = new XoopsFormHidden('service_id', $form_v['service_id']);
$service_title_text = new XoopsFormText('Service Title (*)', 'service_title', 60, 120, $form_v['service_title']);
$service_image_text = new XoopsFormText('Image file name<br><br>Image files show be<br>located in :<br>enterprise/images/', 'service_image', 60, 80, $form_v['service_image']);
$service_text_short_textarea = new XoopsFormTextArea('Service text short (*)', 'service_text_short', $form_v['service_text_short'], 6, 50);
$service_text_long_textarea = new XoopsFormTextArea('Service text long (*)', 'service_text_long', $form_v['service_text_long'], 12, 50);
$submit_button = new XoopsFormButton('', 'submit', 'submit', 'submit');
$e_service_form = new XoopsThemeForm('Service details', 'serviceform', "index.php?obj=service&op=$operation");
$e_service_form->addElement($service_id);
$e_service_form->addElement($service_title_text, true);
$e_service_form->addElement($service_image_text);
$e_service_form->addElement($service_text_short_textarea, true);
$e_service_form->addElement($service_text_long_textarea, true);
$e_service_form->addElement($submit_button);
