<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.view');
//require_once(JPATH_SITE . '/libraries/legacy/view/legacy.php');
/**
 * Content categories view.
 *
 * @package     Joomla.Site
 * @subpackage  com_content
 * @since       1.5
 */
class TZ_guestbookViewCategories extends JViewLegacy
{
    protected $state = null;
    protected $item = null;
    protected $items = null;

    /**
     * Display the view
     *
     * @return    mixed    False on error, null otherwise.
     */
    function display($tpl = null)
    {
        // Initialise variables
        $state = $this->get('State');
        $items = $this->get('Items');
        $parent = $this->get('Parent');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseWarning(500, implode("\n", $errors));
            return false;
        }
        if ($items === false) {
            JError::raiseError(404, JText::_('COM_CONTENT_ERROR_CATEGORY_NOT_FOUND'));
            return false;
        }
        if ($parent == false) {
            JError::raiseError(404, JText::_('COM_CONTENT_ERROR_PARENT_CATEGORY_NOT_FOUND'));
            return false;
        }
        $params = & $state->params;
        $items = array($parent->id => $items);
        //Escape strings for HTML output
        $this->pageclass_sfx = htmlspecialchars($params->get('pageclass_sfx'));
        $this->assign('maxLevelcat', $params->get('maxLevelcat', -1));
        $this->assignRef('params', $params);
        $this->assignRef('parent', $parent);
        $this->assignRef('items', $items);
        parent::display($tpl);

    }


}
