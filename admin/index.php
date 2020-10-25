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
require dirname(__DIR__, 3) . '/mainfile.php';
require XOOPS_ROOT_PATH . '/header.php';
require_once XOOPS_ROOT_PATH . '/modules/enterprise/class/class.enterprise.php';
require __DIR__ . '/admin_header.php';
if (isset($_POST)) {
    foreach ($_POST as $k => $v) {
        ${$k} = $v;
    }
}
$enterprise_version = '1.0 beta';
if (isset($_GET['op'])) {
    $op = $_GET['op'];

    if (isset($_GET['itemid'])) {
        $itemid = (int)$_GET['itemid'];
    } else {
        $itemid = 0;
    }
} else {
    $op = 'default';
}
$obj = $_GET['obj'] ?? 'none';
if ('front' == $obj) {
    $GLOBALS['xoopsOption']['template_main'] = 'e_front_form.html';

    if (empty($_POST['submit'])) {
        require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

        $form_v = Enterprise::get_generalsettings();

        include 'e_front_form.php';

        $e_front_form->assign($xoopsTpl);
    } else {
        extract($_POST);

        $myts = MyTextSanitizer::getInstance();

        $form_v['front_title'] = $myts->addSlashes($front_title);

        $form_v['front_image'] = $myts->addSlashes($front_image);

        $form_v['front_intro'] = $myts->addSlashes($front_intro);

        $form_v['testimony_title'] = $myts->addSlashes($testimony_title);

        $form_v['testimony_image'] = $myts->addSlashes($testimony_image);

        $form_v['testimony_intro_front'] = $myts->addSlashes($testimony_intro_front);

        $form_v['testimony_intro'] = $myts->addSlashes($testimony_intro);

        $form_v['services_title'] = $myts->addSlashes($services_title);

        $form_v['services_image'] = $myts->addSlashes($services_image);

        $form_v['services_intro_front'] = $myts->addSlashes($services_intro_front);

        $form_v['services_intro'] = $myts->addSlashes($services_intro);

        if (Enterprise::set_generalsettings($form_v)) {
            redirect_header('index.php', 1, 'Data Base has updated');
        } else {
            redirect_header('index.php?obj=front', 0, 'Data Base update problem, retry');
        }

        exit();
    }
} elseif ('service' == $obj) {
    switch ($op) {
case 'edit':
if (empty($itemid)) {
    //should be as same actions as $op=default

    $e_servicelist = Enterprise::get_serviceitems();

    $GLOBALS['xoopsOption']['template_main'] = 'e_servicelist.html';

    $xoopsTpl->assign('e_servicelist', $e_servicelist);

    $e_service_msg = 'Current services (click on service title to edit)';

    $xoopsTpl->assign('e_service_msg', $e_service_msg);

    $e_service_insert = '<a href="index.php?obj=service&op=newitem">Insert a new service item</a>';

    $xoopsTpl->assign('e_service_insert', $e_service_insert);

    $e_service_return = '<a href="index.php">Return to admin menu</a>';

    $xoopsTpl->assign('e_service_return', $e_service_return);
} else {
    $GLOBALS['xoopsOption']['template_main'] = 'e_service_form.html';

    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $form_v = Enterprise::get_serviceitem($itemid);

    $operation = 'save';

    include 'e_service_form.php';

    $e_service_form->assign($xoopsTpl);
}
break;
case 'newitem':
$GLOBALS['xoopsOption']['template_main'] = 'e_service_form.html';
if (empty($_POST['submit'])) {
    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $form_v = [];

    $operation = 'newitem';

    include 'e_service_form.php';

    $e_service_form->assign($xoopsTpl);
} else {
    extract($_POST);

    $myts = MyTextSanitizer::getInstance();

    $form_v['service_title'] = $myts->addSlashes($service_title);

    $form_v['service_image'] = $myts->addSlashes($service_image);

    $form_v['service_text_short'] = $myts->addSlashes($service_text_short);

    $form_v['service_text_long'] = $myts->addSlashes($service_text_long);

    if (Enterprise::insertservice($form_v)) {
        redirect_header('index.php?obj=service', 1, 'Data Base has updated');
    } else {
        redirect_header('index.php?obj=service&op=newitem', 2, 'Data Base update problem, retry');
    }

    exit();
}
break;
case 'preview':
break;
case 'save':
if (!empty($_POST['submit'])) {
    extract($_POST);

    $myts = MyTextSanitizer::getInstance();

    $form_v['service_id'] = (int)$service_id;

    $form_v['service_title'] = $myts->addSlashes($service_title);

    $form_v['service_image'] = $myts->addSlashes($service_image);

    $form_v['service_text_long'] = $myts->addSlashes($service_text_long);

    $form_v['service_text_short'] = $myts->addSlashes($service_text_short);

    if (Enterprise::updateservice($form_v)) {
        redirect_header('index.php?obj=service', 1, 'Data Base has updated');
    } else {
        redirect_header('index.php?obj=service', 2, 'Data Base update problem, retry');
    }

    exit();
}
break;
case 'delete':
if (empty($ok) && (0 != $itemid)) {
    Enterprise::deleteservice($itemid);

    redirect_header('index.php?obj=service', 1, 'Data Base has updated');

    exit();
}
break;
case 'default':
default:
$e_servicelist = Enterprise::get_serviceitems();
$GLOBALS['xoopsOption']['template_main'] = 'e_servicelist.html';
$xoopsTpl->assign('e_servicelist', $e_servicelist);
$e_service_msg = 'Current services (click on service title to edit)';
$xoopsTpl->assign('e_service_msg', $e_service_msg);
$e_service_insert = '<a href="index.php?obj=service&op=newitem">Insert a new service item</a>';
$xoopsTpl->assign('e_service_insert', $e_service_insert);
$e_service_return = '<a href="index.php">Return to admin menu</a>';
$xoopsTpl->assign('e_service_return', $e_service_return);
break;
}
} elseif ('aboutus' == $obj) {
    switch ($op) {
case 'edit':
if (empty($itemid)) {
    //should be as same actions as $op=default

    $e_aboutuslist = Enterprise::get_aboutusitems();

    $GLOBALS['xoopsOption']['template_main'] = 'e_aboutuslist.html';

    $xoopsTpl->assign('e_aboutuslist', $e_aboutuslist);

    $e_aboutus_msg = 'Current about-us items (click on item title to edit)';

    $xoopsTpl->assign('e_aboutus_msg', $e_aboutus_msg);

    $e_aboutus_insert = '<a href="index.php?obj=aboutus&op=newitem">Insert a new about-us item</a>';

    $xoopsTpl->assign('e_aboutus_insert', $e_aboutus_insert);

    $e_aboutus_return = '<a href="index.php">Return to admin menu</a>';

    $xoopsTpl->assign('e_aboutus_return', $e_aboutus_return);
} else {
    $GLOBALS['xoopsOption']['template_main'] = 'e_aboutus_form.html';

    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $form_v = Enterprise::get_aboutusitem($itemid);

    $operation = 'save';

    include 'e_aboutus_form.php';

    $e_aboutus_form->assign($xoopsTpl);
}
break;
case 'newitem':
$GLOBALS['xoopsOption']['template_main'] = 'e_aboutus_form.html';
if (empty($_POST['submit'])) {
    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $form_v = [];

    $operation = 'newitem';

    include 'e_aboutus_form.php';

    $e_aboutus_form->assign($xoopsTpl);
} else {
    extract($_POST);

    $myts = MyTextSanitizer::getInstance();

    $form_v['aboutus_name'] = $myts->addSlashes($aboutus_name);

    $form_v['aboutus_image'] = $myts->addSlashes($aboutus_image);

    $form_v['aboutus_description'] = $myts->addSlashes($aboutus_description);

    if (Enterprise::insertaboutus($form_v)) {
        redirect_header('index.php?obj=aboutus', 1, 'Data Base has updated');
    } else {
        redirect_header('index.php?obj=aboutus&op=newitem', 2, 'Data Base update problem, retry');
    }

    exit();
}
break;
case 'preview':
break;
case 'save':
if (!empty($_POST['submit'])) {
    extract($_POST);

    $myts = MyTextSanitizer::getInstance();

    $form_v['aboutus_id'] = (int)$aboutus_id;

    $form_v['aboutus_name'] = $myts->addSlashes($aboutus_name);

    $form_v['aboutus_image'] = $myts->addSlashes($aboutus_image);

    $form_v['aboutus_description'] = $myts->addSlashes($aboutus_description);

    if (Enterprise::updateaboutus($form_v)) {
        redirect_header('index.php?obj=aboutus', 1, 'Data Base has updated');
    } else {
        redirect_header('index.php?obj=aboutus', 2, 'Data Base update problem, retry');
    }

    exit();
}
break;
case 'delete':
if (empty($ok) && (0 != $itemid)) {
    Enterprise::deleteaboutus($itemid);

    redirect_header('index.php?obj=aboutus', 1, 'Data Base has updated');

    exit();
}
break;
case 'default':
default:
$e_aboutuslist = Enterprise::get_aboutusitems();
$GLOBALS['xoopsOption']['template_main'] = 'e_aboutuslist.html';
$xoopsTpl->assign('e_aboutuslist', $e_aboutuslist);
$e_aboutus_msg = 'Current about-us items (click on item title to edit)';
$xoopsTpl->assign('e_aboutus_msg', $e_aboutus_msg);
$e_aboutus_insert = '<a href="index.php?obj=aboutus&op=newitem">Insert a new about-us item</a>';
$xoopsTpl->assign('e_aboutus_insert', $e_aboutus_insert);
$e_aboutus_return = '<a href="index.php">Return to admin menu</a>';
$xoopsTpl->assign('e_aboutus_return', $e_aboutus_return);
break;
}
} elseif ('case' == $obj) {
    switch ($op) {
case 'edit':
if (empty($itemid)) {
    //should be as same actions as $op=default

    $e_caselist = Enterprise::get_caseitems();

    $GLOBALS['xoopsOption']['template_main'] = 'e_caselist.html';

    $xoopsTpl->assign('e_caselist', $e_caselist);

    $e_case_msg = 'List of case items (click on item title to edit)';

    $xoopsTpl->assign('e_case_msg', $e_case_msg);

    $e_case_insert = '<a href="index.php?obj=case&op=newitem">Insert a new case/success story item</a>';

    $xoopsTpl->assign('e_case_insert', $e_case_insert);

    $e_case_return = '<a href="index.php">Return to admin menu</a>';

    $xoopsTpl->assign('e_case_return', $e_case_return);
} else {
    $GLOBALS['xoopsOption']['template_main'] = 'e_case_form.html';

    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $form_v = Enterprise::get_caseitem($itemid);

    $operation = 'save';

    include 'e_case_form.php';

    $e_case_form->assign($xoopsTpl);
}
break;
case 'newitem':
$GLOBALS['xoopsOption']['template_main'] = 'e_case_form.html';
if (empty($_POST['submit'])) {
    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $form_v = [];

    $operation = 'newitem';

    include 'e_case_form.php';

    $e_case_form->assign($xoopsTpl);
} else {
    extract($_POST);

    $myts = MyTextSanitizer::getInstance();

    $form_v['case_family_id'] = (int)$myts->addSlashes($case_family_id);

    $form_v['case_project_name'] = $myts->addSlashes($case_project_name);

    $form_v['case_project_desc'] = $myts->addSlashes($case_project_desc);

    $form_v['case_technology'] = $myts->addSlashes($case_technology);

    $form_v['case_project_desc_long'] = $myts->addSlashes($case_project_desc_long);

    if (Enterprise::insertcase($form_v)) {
        redirect_header('index.php?obj=case', 1, 'Data Base has updated');
    } else {
        redirect_header('index.php?obj=case&op=newitem', 2, 'Data Base update problem, retry');
    }

    exit();
}
break;
case 'preview':
break;
case 'save':
if (!empty($_POST['submit'])) {
    extract($_POST);

    $myts = MyTextSanitizer::getInstance();

    $form_v['case_id'] = (int)$case_id;

    $form_v['case_family_id'] = (int)$myts->addSlashes($case_family_id);

    $form_v['case_project_name'] = $myts->addSlashes($case_project_name);

    $form_v['case_project_desc'] = $myts->addSlashes($case_project_desc);

    $form_v['case_technology'] = $myts->addSlashes($case_technology);

    $form_v['case_project_desc_long'] = $myts->addSlashes($case_project_desc_long);

    if (Enterprise::updatecase($form_v)) {
        redirect_header('index.php?obj=case', 1, 'Data Base has updated');
    } else {
        redirect_header('index.php?obj=case', 2, 'Data Base update problem, retry');
    }

    exit();
}
break;
case 'delete':
if (empty($ok) && (0 != $itemid)) {
    Enterprise::deletecase($itemid);

    redirect_header('index.php?obj=case', 1, 'Data Base has updated');

    exit();
}
break;
case 'default':
default:
$e_caselist = Enterprise::get_caseitems();
$GLOBALS['xoopsOption']['template_main'] = 'e_caselist.html';
$xoopsTpl->assign('e_caselist', $e_caselist);
$e_case_msg = 'List of case items (click on item title to edit)';
$xoopsTpl->assign('e_case_msg', $e_case_msg);
$e_case_insert = '<a href="index.php?obj=case&op=newitem">Insert a new case/success story item</a>';
$xoopsTpl->assign('e_case_insert', $e_case_insert);
$e_case_return = '<a href="index.php">Return to admin menu</a>';
$xoopsTpl->assign('e_case_return', $e_case_return);
break;
}
} elseif ('casecat' == $obj) {
    switch ($op) {
case 'edit':
if (!empty($_POST['modify'])) {
    extract($_POST);

    $db = XoopsDatabaseFactory::getDatabaseConnection();

    $myts = MyTextSanitizer::getInstance();

    $form_v['case_family_id'] = (int)$myts->addSlashes($case_family_id);

    $sql = 'SELECT name FROM ' . $db->prefix('enterprise_success_story_family') . ' WHERE id=' . $form_v['case_family_id'];

    $result = $db->query($sql);

    if ($myrow = $db->fetchArray($result)) {
        $form_v['case_family_name'] = $myrow['name'];
    }

    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $case_edit_category = new XoopsFormText('Category name', 'case_family_name', 22, 80, $form_v['case_family_name']);

    $family_id = new XoopsFormHidden('case_family_id', $form_v['case_family_id']);

    $e_newcat_form = new XoopsThemeForm('Edit category', 'newcatform', 'index.php?obj=casecat&op=sdc');

    $save_button = new XoopsFormButton('', 'save', 'save', 'submit');

    $delete_button = new XoopsFormButton('', 'delete', 'delete', 'submit');

    $cancel_button = new XoopsFormButton('', 'cancel', 'cancel', 'submit');

    $e_newcat_form->addElement($case_edit_category, true);

    $e_newcat_form->addElement($family_id);

    $e_newcat_form->addElement($save_button);

    $e_newcat_form->addElement($delete_button);

    $e_newcat_form->addElement($cancel_button);

    $GLOBALS['xoopsOption']['template_main'] = 'e_catedit_form.html';

    $e_newcat_form->assign($xoopsTpl);
}
break;
case 'sdc': // save, delete, cancel
if (!empty($_POST['save'])) {
    extract($_POST);

    $db = XoopsDatabaseFactory::getDatabaseConnection();

    $myts = MyTextSanitizer::getInstance();

    $case_family_id = (int)$myts->addSlashes($case_family_id);

    $case_family_name = $myts->addSlashes($case_family_name);

    $sql = sprintf(
        "UPDATE %s SET name = '%s' WHERE id = %u",
        $db->prefix('enterprise_success_story_family'),
        $case_family_name,
        $case_family_id
    );

    $db->query($sql);

    redirect_header('index.php', 1, 'Data Base has updated');

    exit();
} elseif (!empty($_POST['delete'])) {
    extract($_POST);

    $e_really_delete['question'] = "Do you really want to delete the category who's id = " . $case_family_id . ' ?';

    $e_really_delete['warning'] = 'Warning : All success stories of this category will also be deleted';

    $e_really_delete['yes'] = '<a href="index.php?obj=casecat&op=reallydelete&catid=' . $case_family_id . '">' . 'Yes I want !' . '</a>';

    $e_really_delete['no'] = '<a href="index.php?obj=casecat">' . 'No, I am not sure' . '</a>';

    $e_really_delete['return'] = '<a href="index.php">' . 'Return to Admin menu' . '</a>';

    $GLOBALS['xoopsOption']['template_main'] = 'e_reallydeletecat.html';

    $xoopsTpl->assign('e_really_delete', $e_really_delete);

    break;
}
redirect_header('index.php?obj=casecat', 1, 'operation canceled');
// no break
case 'reallydelete':
$db = XoopsDatabaseFactory::getDatabaseConnection();
$myts = MyTextSanitizer::getInstance();
$case_family_id = (int)$myts->addSlashes($_GET['catid']);
$sql = 'DELETE FROM ' . $db->prefix('enterprise_success_story_family') . ' WHERE id=' . $case_family_id;
$db->queryF($sql);
// delete also ALL success stories for that category
$sql2 = 'DELETE FROM ' . $db->prefix('enterprise_success_story') . ' WHERE family_id=' . $case_family_id;
$db->queryF($sql2);
redirect_header('index.php', 1, 'Data Base has updated');
exit();

case 'insert':
if (!empty($_POST['insert'])) {
    extract($_POST);

    $db = XoopsDatabaseFactory::getDatabaseConnection();

    $myts = MyTextSanitizer::getInstance();

    $case_new_name = $myts->addSlashes($case_new_name);

    $sql = sprintf(
        "INSERT INTO %s (name) VALUES( '%s' )",
        $db->prefix('enterprise_success_story_family'),
        $case_new_name
    );

    $db->query($sql);

    redirect_header('index.php', 1, 'Data Base has updated');

    exit();
}
// no break
default:
$GLOBALS['xoopsOption']['template_main'] = 'e_casecat_form.html';
require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include 'e_casecat_form.php';
$e_casecat_form->assign($xoopsTpl);
include 'e_newcat_form.php';
$e_newcat_form->assign($xoopsTpl);
}
} else {
    $GLOBALS['xoopsOption']['template_main'] = 'enterprise_adminmenu.html';

    $enterprise_adminmenu['title'] = 'Corporate Presentation Admin';

    $enterprise_adminmenu['generalsettings'] = '<a href="index.php?obj=front">' . 'General Settings' . '</a>';

    $enterprise_adminmenu['aboutusmanager'] = '<a href="index.php?obj=aboutus">' . 'About-us Manager' . '</a>';

    $enterprise_adminmenu['servicemanager'] = '<a href="index.php?obj=service">' . 'Service Manager' . '</a>';

    $enterprise_adminmenu['testimonymanager'] = '<a href="index.php?obj=case">' . 'Testimony Manager' . '</a>';

    $enterprise_adminmenu['casecategorymanager'] = '<a href="index.php?obj=casecat">' . 'Testimony Category Manager' . '</a>';

    $xoopsTpl->assign('enterprise_adminmenu', $enterprise_adminmenu);
}
$xoopsTpl->assign('xoops_module_header', '');
require_once XOOPS_ROOT_PATH . '/footer.php';
