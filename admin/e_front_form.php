<?php

$front_title_text = new XoopsFormText('Front Title', 'front_title', 60, 120, $form_v['front_title']);
$front_image_text = new XoopsFormText('Front image file name<br><br>Image files show be<br>located in :<br>enterprise/images/', 'front_image', 60, 80, $form_v['front_image']);
$front_intro_textarea = new XoopsFormTextArea('Front intro text', 'front_intro', $form_v['front_intro'], 6, 50);
$testim_title_text = new XoopsFormText('Testimony Title', 'testimony_title', 60, 120, $form_v['testimony_title']);
$testim_image_text = new XoopsFormText('Testimony image file name', 'testimony_image', 60, 80, $form_v['testimony_image']);
$testim_intro_front_textarea = new XoopsFormTextArea('Testimony intro text in front', 'testimony_intro_front', $form_v['testimony_intro_front'], 6, 50);
$testim_intro_textarea = new XoopsFormTextArea('Testimony intro text ', 'testimony_intro', $form_v['testimony_intro'], 6, 50);
$services_title_text = new XoopsFormText('Services Title', 'services_title', 60, 120, $form_v['services_title']);
$services_image_text = new XoopsFormText('Services image file name', 'services_image', 60, 80, $form_v['services_image']);
$services_intro_front_textarea = new XoopsFormTextArea('Services intro text in front', 'services_intro_front', $form_v['services_intro_front'], 6, 50);
$services_intro_textarea = new XoopsFormTextArea('Services intro text <br><br>This text will be showed<br> in services main page', 'services_intro', $form_v['services_intro'], 6, 50);
$submit_button = new XoopsFormButton('', 'submit', 'submit', 'submit');
$e_front_form = new XoopsThemeForm('Enterprise Front Settings', 'frontform', 'index.php?obj=front');
$e_front_form->addElement($front_title_text, true);
$e_front_form->addElement($front_image_text);
$e_front_form->addElement($front_intro_textarea, true);
$e_front_form->addElement($testim_title_text);
$e_front_form->addElement($testim_image_text);
$e_front_form->addElement($testim_intro_front_textarea);
$e_front_form->addElement($testim_intro_textarea);
$e_front_form->addElement($services_title_text, true);
$e_front_form->addElement($services_image_text);
$e_front_form->addElement($services_intro_front_textarea, true);
$e_front_form->addElement($services_intro_textarea, true);
$e_front_form->addElement($submit_button);
