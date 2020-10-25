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
class Enterprise
{
    public function __construct()
    {
        $this->db    = XoopsDatabaseFactory::getDatabaseConnection();
        $this->table = $this->db->prefix('enterprise_front');
        // $this->imagetable = $this->db->prefix("enterprise_image");
    }

    public function get_introPart()
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT front_title, front_intro, front_image FROM ' . $db->prefix('enterprise_front');
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret['title'] = htmlspecialchars($myrow['front_title'], ENT_QUOTES | ENT_HTML5);
            $ret['text']  = $myts->displayTarea($myrow['front_intro'], $html = 1, $smiley = 1, $xcode = 1, $image = 1, $br = 1);
            if ($myrow['front_image'] && file_exists(XOOPS_ROOT_PATH . '/modules/enterprise/images/' . $myrow['front_image'])) {
                $ret['image'] = '<img src="' . XOOPS_URL . '/modules/enterprise/images/' . $myrow['front_image'] . '" alt="">';
            } else {
                $ret['image'] = '';
            }
        }
        return $ret;
    }

    public function get_servicesPart()
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT services_title, services_intro_front, services_image FROM ' . $db->prefix('enterprise_front');
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret['title'] = htmlspecialchars($myrow['services_title'], ENT_QUOTES | ENT_HTML5);
            $ret['text']  = $myts->displayTarea($myrow['services_intro_front'], $html = 1, $smiley = 1, $xcode = 1, $image = 1, $br = 1);
            if ($myrow['services_image'] && file_exists(XOOPS_ROOT_PATH . '/modules/enterprise/images/' . $myrow['services_image'])) {
                $ret['image'] = '<img src="' . XOOPS_URL . '/modules/enterprise/images/' . $myrow['services_image'] . '" alt="">';
            } else {
                $ret['image'] = '';
            }
            $ret['link'] = '<a href="' . XOOPS_URL . '/modules/enterprise/services.php">' . 'learn more about our services' . '</a>';
        }
        return $ret;
    }

    public function get_testimonyPart()
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT testimony_title, testimony_intro_front, testimony_image FROM ' . $db->prefix('enterprise_front');
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret['title'] = htmlspecialchars($myrow['testimony_title'], ENT_QUOTES | ENT_HTML5);
            $ret['text']  = $myts->displayTarea($myrow['testimony_intro_front'], $html = 1, $smiley = 1, $xcode = 1, $image = 1, $br = 1);
            if ($myrow['testimony_image'] && file_exists(XOOPS_ROOT_PATH . '/modules/enterprise/images/' . $myrow['testimony_image'])) {
                $ret['image'] = '<img src="' . XOOPS_URL . '/modules/enterprise/images/' . $myrow['testimony_image'] . '" alt="">';
            } else {
                $ret['image'] = '';
            }
            $ret['link'] = '<a href="' . XOOPS_URL . '/modules/enterprise/testimonies.php">' . 'view more case studies' . '</a>';
        }
        return $ret;
    }

    public function get_aboutUs($item)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT name, description, image FROM ' . $db->prefix('enterprise_aboutus') . ' WHERE id=' . $item;
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret['nav']  = '<a href="' . XOOPS_URL . '/modules/enterprise/">Enterprise Home</a>-><a href="' . XOOPS_URL . '/modules/enterprise/aboutus.php">About Us</a>->' . htmlspecialchars($myrow['name'], ENT_QUOTES | ENT_HTML5);
            $ret['text'] = $myts->displayTarea($myrow['description'], $html = 1, $smiley = 1, $xcode = 1, $image = 1, $br = 1);
            if ($myrow['image'] && file_exists(XOOPS_ROOT_PATH . '/modules/enterprise/images/' . $myrow['image'])) {
                $ret['image'] = '<img src="' . XOOPS_URL . '/modules/enterprise/images/' . $myrow['image'] . '" alt="">';
            } else {
                $ret['image'] = '';
            }
        }
        $sql             = 'SELECT id, name FROM ' . $db->prefix('enterprise_aboutus');
        $result          = $db->query($sql);
        $ret['accroche'] = '';
        while ($myrow = $db->fetchArray($result)) {
            $ret['accroche'] .= '<a href="' . XOOPS_URL . '/modules/enterprise/aboutus.php?item=' . $myrow['id'] . '">' . $myrow['name'] . '</a>';
        }
        return $ret;
    }

    public function get_accroche()
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT id, name FROM ' . $db->prefix('enterprise_aboutus');
        $result = $db->query($sql);
        $ret    = '';
        while ($myrow = $db->fetchArray($result)) {
            $ret .= '<a href="' . XOOPS_URL . '/modules/enterprise/aboutus.php?item=' . $myrow['id'] . '">' . $myrow['name'] . '</a>';
        }
        return $ret;
    }

    public function get_servicesIntro()
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT services_intro FROM ' . $db->prefix('enterprise_front');
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret = $myts->displayTarea($myrow['services_intro'], $html = 1, $smiley = 1, $xcode = 1, $image = 1, $br = 1);
        }
        return $ret;
    }

    public function get_services()
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT id, title, text_short, image FROM ' . $db->prefix('enterprise_service');
        $result = $db->query($sql);
        $i      = 0;
        while ($myrow = $db->fetchArray($result)) {
            $ret[$i]['title']      = '<a href="' . XOOPS_URL . '/modules/enterprise/services.php?item=' . $myrow['id'] . '">' . htmlspecialchars($myrow['title'], ENT_QUOTES | ENT_HTML5) . '</a>';
            $ret[$i]['text_short'] = $myts->displayTarea($myrow['text_short'], $html = 1, $smiley = 1, $xcode = 1, $image = 1, $br = 1);
            if ($myrow['image'] && file_exists(XOOPS_ROOT_PATH . '/modules/enterprise/images/' . $myrow['image'])) {
                $ret[$i]['image'] = '<img src="' . XOOPS_URL . '/modules/enterprise/images/' . $myrow['image'] . '" alt="">';
            } else {
                $ret[$i]['image'] = '';
            }
            $i++;
        }
        return $ret;
    }

    public function get_service($item)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT title, text_long FROM ' . $db->prefix('enterprise_service') . ' WHERE id=' . $item;
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret['title']     = htmlspecialchars($myrow['title'], ENT_QUOTES | ENT_HTML5);
            $ret['nav']       = '<a href="' . XOOPS_URL . '/modules/enterprise/">Enterprise Home</a>-><a href="' . XOOPS_URL . '/modules/enterprise/services.php">Services</a>->' . $ret['title'];
            $ret['text_long'] = $myts->displayTarea($myrow['text_long'], $html = 1, $smiley = 1, $xcode = 1, $image = 1, $br = 1);
        }
        return $ret;
    }

    public function get_testimoniesIntro()
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT testimony_intro FROM ' . $db->prefix('enterprise_front');
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret = $myts->displayTarea($myrow['testimony_intro'], $html = 1, $smiley = 1, $xcode = 1, $image = 1, $br = 1);
        }
        return $ret;
    }

    public function get_testimonies()
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT a.id, project_name, project_desc, technology, project_desc_long, name FROM ' . $db->prefix('enterprise_success_story') . ' a LEFT JOIN ' . $db->prefix('enterprise_success_story_family') . ' b ON a.family_id=b.id';
        $result = $db->query($sql);
        $i      = 0;
        while ($myrow = $db->fetchArray($result)) {
            $ret[$i]['family'] = $myrow['name'];
            if ($myrow['project_desc_long']) {
                $ret[$i]['project_name'] = '<a href="' . XOOPS_URL . '/modules/enterprise/testimonies.php?item=' . $myrow['id'] . '">' . htmlspecialchars($myrow['project_name'], ENT_QUOTES | ENT_HTML5) . '</a>';
            } else {
                $ret[$i]['project_name'] = $myts->addSlashes($myrow['project_name']);
            }
            $ret[$i]['project_desc'] = $myts->displayTarea($myrow['project_desc'], $html = 1, $smiley = 1, $xcode = 1, $image = 1, $br = 1);
            $ret[$i]['technology']   = $myts->addSlashes($myrow['technology']);
            $i++;
        }
        return $ret;
    }

    public function get_testimony($item)
    {
        $db = XoopsDatabaseFactory::getDatabaseConnection();
        // $myts = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT project_name, project_desc_long FROM ' . $db->prefix('enterprise_success_story') . ' WHERE id=' . $item;
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret['project_name']      = $myrow['project_name'];
            $ret['nav']               = '<a href="' . XOOPS_URL . '/modules/enterprise/">Enterprise Home</a>-><a href="' . XOOPS_URL . '/modules/enterprise/testimonies.php">Testimony</a>->' . $ret['project_name'];
            $ret['project_desc_long'] = $myrow['project_desc_long'];
        }
        return $ret;
    }

    public function get_generalsettings()
    {
        $db = XoopsDatabaseFactory::getDatabaseConnection();
        // $myts = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT * FROM ' . $db->prefix('enterprise_front');
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret['front_title']           = $myrow['front_title'];
            $ret['front_intro']           = $myrow['front_intro'];
            $ret['front_image']           = $myrow['front_image'];
            $ret['testimony_title']       = $myrow['testimony_title'];
            $ret['testimony_intro_front'] = $myrow['testimony_intro_front'];
            $ret['testimony_intro']       = $myrow['testimony_intro'];
            $ret['testimony_image']       = $myrow['testimony_image'];
            $ret['services_title']        = $myrow['services_title'];
            $ret['services_intro_front']  = $myrow['services_intro_front'];
            $ret['services_intro']        = $myrow['services_intro'];
            $ret['services_image']        = $myrow['services_image'];
        }
        return $ret;
    }

    public function set_generalsettings($form_v)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $sql    = sprintf(
            "UPDATE %s SET 
front_title = '%s', front_intro = '%s', front_image = '%s', 
testimony_title = '%s', testimony_intro_front = '%s', testimony_intro = '%s', testimony_image = '%s',
services_title = '%s', services_intro_front = '%s', services_intro = '%s', services_image = '%s'",
            $db->prefix('enterprise_front'),
            $form_v['front_title'],
            $form_v['front_intro'],
            $form_v['front_image'],
            $form_v['testimony_title'],
            $form_v['testimony_intro_front'],
            $form_v['testimony_intro'],
            $form_v['testimony_image'],
            $form_v['services_title'],
            $form_v['services_intro_front'],
            $form_v['services_intro'],
            $form_v['services_image']
        );
        $result = $db->query($sql);
        return $result;
    }

    public function get_serviceitems()
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT id, title FROM ' . $db->prefix('enterprise_service') . ' ORDER BY id asc';
        $result = $db->query($sql);
        $i      = 0;
        while ($myrow = $db->fetchArray($result)) {
            $ret[$i]['title'] = '<a href="index.php?op=edit&obj=service&itemid=' . $myrow['id'] . '">' . htmlspecialchars($myrow['title'], ENT_QUOTES | ENT_HTML5) . '</a>';
            $ret[$i]['del']   = '<a href="index.php?op=delete&obj=service&itemid=' . $myrow['id'] . '">delete this item</a>';
            $i++;
        }
        return $ret;
    }

    public function get_serviceitem($itemid)
    {
        $db = XoopsDatabaseFactory::getDatabaseConnection();
        // $myts = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT title, text_short, text_long, image FROM ' . $db->prefix('enterprise_service') . ' WHERE id=' . $itemid;
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret['service_id']         = $itemid;
            $ret['service_title']      = $myrow['title'];
            $ret['service_image']      = $myrow['image'];
            $ret['service_text_short'] = $myrow['text_short'];
            $ret['service_text_long']  = $myrow['text_long'];
        }
        return $ret;
    }

    public function updateservice($form_v)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $sql    = sprintf(
            "UPDATE %s SET 
title = '%s', image = '%s', text_short = '%s', text_long = '%s' WHERE id = %u",
            $db->prefix('enterprise_service'),
            $form_v['service_title'],
            $form_v['service_image'],
            $form_v['service_text_short'],
            $form_v['service_text_long'],
            $form_v['service_id']
        );
        $result = $db->queryF($sql);
        return $result;
    }

    public function insertservice($form_v)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $sql    = sprintf(
            "INSERT INTO %s (id, title, text_short, text_long, image) 
VALUES('', '%s', '%s', '%s', '%s')",
            $db->prefix('enterprise_service'),
            $form_v['service_title'],
            $form_v['service_text_short'],
            $form_v['service_text_long'],
            $form_v['service_image']
        );
        $result = $db->queryF($sql);
        return $result;
    }

    public function deleteservice($itemid)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $sql    = 'DELETE FROM ' . $db->prefix('enterprise_service') . ' WHERE id=' . $itemid;
        $result = $db->queryF($sql);
        return $result;
    }

    public function get_aboutusitems()
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT id, name FROM ' . $db->prefix('enterprise_aboutus') . ' ORDER BY id desc';
        $result = $db->query($sql);
        $i      = 0;
        while ($myrow = $db->fetchArray($result)) {
            $ret[$i]['title'] = '<a href="index.php?op=edit&obj=aboutus&itemid=' . $myrow['id'] . '">' . htmlspecialchars($myrow['name'], ENT_QUOTES | ENT_HTML5) . '</a>';
            $ret[$i]['del']   = '<a href="index.php?op=delete&obj=aboutus&itemid=' . $myrow['id'] . '">delete this item</a>';
            $i++;
        }
        return $ret;
    }

    public function get_aboutusitem($itemid)
    {
        $db = XoopsDatabaseFactory::getDatabaseConnection();
        // $myts = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT name, description, image FROM ' . $db->prefix('enterprise_aboutus') . ' WHERE id=' . $itemid;
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret['aboutus_id']          = $itemid;
            $ret['aboutus_name']        = $myrow['name'];
            $ret['aboutus_image']       = $myrow['image'];
            $ret['aboutus_description'] = $myrow['description'];
        }
        return $ret;
    }

    public function updateaboutus($form_v)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $sql    = sprintf(
            "UPDATE %s SET 
name = '%s', description = '%s', image = '%s' WHERE id = %u",
            $db->prefix('enterprise_aboutus'),
            $form_v['aboutus_name'],
            $form_v['aboutus_description'],
            $form_v['aboutus_image'],
            $form_v['aboutus_id']
        );
        $result = $db->queryF($sql);
        return $result;
    }

    public function insertaboutus($form_v)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $sql    = sprintf(
            "INSERT INTO %s (id, name, description, image) 
VALUES('', '%s', '%s', '%s')",
            $db->prefix('enterprise_aboutus'),
            $form_v['aboutus_name'],
            $form_v['aboutus_description'],
            $form_v['aboutus_image']
        );
        $result = $db->queryF($sql);
        return $result;
    }

    public function deleteaboutus($itemid)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $sql    = 'DELETE FROM ' . $db->prefix('enterprise_aboutus') . ' WHERE id=' . $itemid;
        $result = $db->queryF($sql);
        return $result;
    }

    public function get_caseitems()
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $myts   = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT id, project_name FROM ' . $db->prefix('enterprise_success_story') . ' ORDER BY id desc';
        $result = $db->query($sql);
        $i      = 0;
        while ($myrow = $db->fetchArray($result)) {
            $ret[$i]['title'] = '<a href="index.php?op=edit&obj=case&itemid=' . $myrow['id'] . '">' . htmlspecialchars($myrow['project_name'], ENT_QUOTES | ENT_HTML5) . '</a>';
            $ret[$i]['del']   = '<a href="index.php?op=delete&obj=case&itemid=' . $myrow['id'] . '">delete this item</a>';
            $i++;
        }
        return $ret;
    }

    public function get_caseitem($itemid)
    {
        $db = XoopsDatabaseFactory::getDatabaseConnection();
        // $myts = MyTextSanitizer::getInstance();
        $ret    = [];
        $sql    = 'SELECT a.name, b.family_id, b.project_name, b.project_desc, b.technology, b.project_desc_long FROM ' . $db->prefix('enterprise_success_story_family') . ' a LEFT JOIN ' . $db->prefix('enterprise_success_story') . ' b ON a.id = b.family_id WHERE b.id = ' . $itemid;
        $result = $db->query($sql);
        if ($myrow = $db->fetchArray($result)) {
            $ret['case_id']                = $itemid;
            $ret['case_family_id']         = $myrow['family_id'];
            $ret['case_project_name']      = $myrow['project_name'];
            $ret['case_project_desc']      = $myrow['project_desc'];
            $ret['case_technology']        = $myrow['technology'];
            $ret['case_project_desc_long'] = $myrow['project_desc_long'];
        }
        return $ret;
    }

    public function updatecase($form_v)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $sql    = sprintf(
            "UPDATE %s SET 
family_id = %u, project_name = '%s', project_desc = '%s', technology = '%s', project_desc_long = '%s' WHERE id = %u",
            $db->prefix('enterprise_success_story'),
            $form_v['case_family_id'],
            $form_v['case_project_name'],
            $form_v['case_project_desc'],
            $form_v['case_technology'],
            $form_v['case_project_desc_long'],
            $form_v['case_id']
        );
        $result = $db->queryF($sql);
        return $result;
    }

    public function insertcase($form_v)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $sql    = sprintf(
            "INSERT INTO %s (id, family_id, project_name, project_desc, technology, project_desc_long) 
VALUES('', %u, '%s', '%s', '%s', '%s')",
            $db->prefix('enterprise_success_story'),
            $form_v['case_family_id'],
            $form_v['case_project_name'],
            $form_v['case_project_desc'],
            $form_v['case_technology'],
            $form_v['case_project_desc_long']
        );
        $result = $db->queryF($sql);
        return $result;
    }

    public function deletecase($itemid)
    {
        $db     = XoopsDatabaseFactory::getDatabaseConnection();
        $sql    = 'DELETE FROM ' . $db->prefix('enterprise_success_story') . ' WHERE id=' . $itemid;
        $result = $db->queryF($sql);
        return $result;
    }
}


