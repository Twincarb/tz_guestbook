<?php
/*------------------------------------------------------------------------

# TZ Guestbook Extension

# ------------------------------------------------------------------------

# author    TuNguyenTemPlaza

# copyright Copyright (C) 2012 templaza.com. All Rights Reserved.

# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

# Websites: http://www.templaza.com

# Technical Support:  Forum - http://templaza.com/Forum

-------------------------------------------------------------------------*/
defined('_JEXEC') or die;
jimport('joomla.application.component.controlleradmin');
//$task = JRequest::getVar('task');
//var_dump($task);die;

class Tz_guestbookControllerGuestbook extends JControllerAdmin
{

    function display($cachable = false, $urlparams = array())
    {	
		$doc = JFactory::getDocument();
        $task = JRequest::getVar('task');
        $type = $doc->getType();
        $view = $this->getView('guestbook', $type);
        $model = $this->getModel('guestbook');
        $view->setModel($model, true);

        switch ($task) {
            case'tz.edit':
            case'edit':
            case'guestbook.edit':
                $view->setLayout('edit');
                break;
            case'remove':
                $model->delete();
                break;
            default:
                $view->setLayout('default');
                break;
        }
        $view->display();
    }
}

?>