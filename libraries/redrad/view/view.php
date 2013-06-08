<?php
/**
 * @package     RedRad
 * @subpackage  Toolbar
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_REDRAD') or die;

/**
 * A view that can be rendered in full screen.
 *
 * @package     RedRad
 * @subpackage  Toolbar
 * @since       1.0
 */
abstract class RView extends JViewLegacy
{
	/**
	 * Do we have to display a sidebar ?
	 *
	 * @var  boolean
	 */
	protected $displaySidebar = false;

	/**
	 * The sidebar layout name to display.
	 *
	 * @var  boolean
	 */
	protected $sidebarLayout = '';

	/**
	 * An array of data to pass to the sidebar layout.
	 * For example the active link.
	 *
	 * @var  array
	 */
	protected $sidebarData = array();

	/**
	 * Do we have to display a topbar ?
	 *
	 * @var  boolean
	 */
	protected $displayTopBar = false;

	/**
	 * The topbar layout name to display.
	 *
	 * @var  boolean
	 */
	protected $topBarLayout = '';

	/**
	 * An array of data to pass to the topbar layout.
	 * For example the active link.
	 *
	 * @var  array
	 */
	protected $topBarData = array();

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a Error object.
	 */
	public function display($tpl = null)
	{
		$render = RLayoutHelper::render('component',
			array(
				'view' => $this,
				'tpl' => $tpl,
				'sidebar_display' => $this->displaySidebar,
				'sidebar_layout' => $this->sidebarLayout,
				'sidebar_data' => $this->sidebarData,
				'topbar_display' => $this->displayTopBar,
				'topbar_layout' => $this->topBarLayout,
				'topbar_data' => $this->topBarData,
			)
		);

		if ($render instanceof Exception)
		{
			return $render;
		}

		echo $render;

		return true;
	}

	/**
	 * Get the view title.
	 *
	 * @return  string  The view title.
	 */
	abstract public function getTitle();

	/**
	 * Get the toolbar to render.
	 *
	 * @return  RToolbar
	 */
	abstract public function getToolbar();
}
