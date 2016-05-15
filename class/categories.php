<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Video module for xoops
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        video
 * @since          1.0
 * @min_xoops      2.5.7
 * @author         Txmod Xoops - Email:<info@txmodxoops.org> - Website:<http://txmodxoops.org>
 * @version        $Id: 1.0 categories.php 14050 Sat 2016-05-07 14:43:56Z Timgno $
 */
defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object VideoCategories
 */
class VideoCategories extends XoopsObject
{
	/**
	 * Constructor 
	 *
	 * @param null
	 */
	public function __construct()
	{
		$this->initVar('cat_id', XOBJ_DTYPE_INT);
		$this->initVar('cat_pid', XOBJ_DTYPE_INT);
		$this->initVar('cat_title', XOBJ_DTYPE_TXTBOX);
		$this->initVar('cat_description', XOBJ_DTYPE_TXTAREA);
		$this->initVar('cat_image', XOBJ_DTYPE_TXTBOX);
		$this->initVar('cat_weight', XOBJ_DTYPE_INT);
	}

	/**
	 * @static function &getInstance
	 *
	 * @param null
	 */
	public static function getInstance()
	{
		static $instance = false;
		if(!$instance) {
			$instance = new self();
		}
	}

	/**
	 * The new inserted $Id
	 */
	public function getNewInsertedIdCategories()
	{
		$newInsertedId = $GLOBALS['xoopsDB']->getInsertId();
		return $newInsertedId;
	}

	/**
	 * Get form
	 *
	 * @param mixed $action
	 */
	public function getFormCategories($action = false)
	{
		$video = VideoHelper::getInstance();
		if($action === false) {
			$action = $_SERVER['REQUEST_URI'];
		}
		// Title
		$title = $this->isNew() ? sprintf(_AM_VIDEO_CATEGORY_ADD) : sprintf(_AM_VIDEO_CATEGORY_EDIT);
		// Get Theme Form
		xoops_load('XoopsFormLoader');
		$form = new XoopsThemeForm($title, 'form', $action, 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		// Form Text CatTitle
		$form->addElement(new XoopsFormText( _AM_VIDEO_CATEGORY_TITLE, 'cat_title', 50, 255, $this->getVar('cat_title') ), true);
		// Form Table Categories
		$categoriesHandler = $video->getHandler('categories');
		$criteria = new CriteriaCompo();
		$categoriesCount = $categoriesHandler->getCount($criteria);
		if($categoriesCount) {
			include_once XOOPS_ROOT_PATH .'/class/tree.php';
			$categoriesAll = $categoriesHandler->getAll($criteria);
			$categoriesTree = new XoopsObjectTree($categoriesAll, 'cat_id', 'cat_pid');
			$catPid = $categoriesTree->makeSelBox( 'cat_pid', 'cat_title', '--', $this->getVar('cat_pid'), true );
			$form->addElement(new XoopsFormLabel(_AM_VIDEO_CATEGORY_PID, $catPid));
		}
		unset($criteria);
		// Form Text Area CatDescription
		$form->addElement(new XoopsFormTextArea( _AM_VIDEO_CATEGORY_DESCRIPTION, 'cat_description', $this->getVar('cat_description'), 4, 47 ));
		// Form Frameworks Image Files
		$getCatImage = $this->getVar('cat_image');
		$catImage = $getCatImage ? $getCatImage : 'blank.gif';
		$imageDirectory = '/Frameworks/moduleclasses/icons/32';
		$imageTray = new XoopsFormElementTray(_AM_VIDEO_CATEGORY_IMAGE, '<br />' );
		$imageSelect = new XoopsFormSelect( sprintf(_AM_VIDEO_FORM_IMAGE_PATH, ".{$imageDirectory}/"), 'cat_image', $catImage, 5);
		$imageArray = XoopsLists::getImgListAsArray( XOOPS_ROOT_PATH . $imageDirectory );
		foreach($imageArray as $image1) {
			$imageSelect->addOption("{$image1}", $image1);
		}
		$imageSelect->setExtra("onchange='showImgSelected(\"image1\", \"cat_image\", \"".$imageDirectory."\", \"\", \"".XOOPS_URL."\")'");
		$imageTray->addElement($imageSelect, false);
		$imageTray->addElement(new XoopsFormLabel('', ''));
		// Form File
		$fileSelectTray = new XoopsFormElementTray('', '<br />' );
		$fileSelectTray->addElement(new XoopsFormFile( _AM_VIDEO_FORM_IMAGE_LIST_CATEGORIES, 'attachedfile', $video->getConfig('maxsize') ));
		$fileSelectTray->addElement(new XoopsFormLabel(''));
		$imageTray->addElement($fileSelectTray);
		$form->addElement($imageTray);
		// Form Text CatWeight
		$catWeight = $this->isNew() ? '0' : $this->getVar('cat_weight');
		$form->addElement(new XoopsFormText( _AM_VIDEO_CATEGORY_WEIGHT, 'cat_weight', 20, 150, $catWeight ), true);
		// Permissions
		$memberHandler = xoops_gethandler('member');
		$groupList = $memberHandler->getGroupList();
		$gpermHandler = xoops_gethandler('groupperm');
		$fullList[] = array_keys($groupList);
		if(!$this->isNew()) {
			$groupsIdsApprove = $gpermHandler->getGroupIds('video_approve', $this->getVar('cat_id'), $GLOBALS['xoopsModule']->getVar('mid'));
			$groupsIdsApprove[] = array_values($groupsIdsApprove);
			$groupsCanApproveCheckbox = new XoopsFormCheckBox( _AM_VIDEO_PERMISSIONS_APPROVE, 'groups_approve[]', $groupsIdsApprove);
			$groupsIdsSubmit = $gpermHandler->getGroupIds('video_submit', $this->getVar('cat_id'), $GLOBALS['xoopsModule']->getVar('mid'));
			$groupsIdsSubmit[] = array_values($groupsIdsSubmit);
			$groupsCanSubmitCheckbox = new XoopsFormCheckBox( _AM_VIDEO_PERMISSIONS_SUBMIT, 'groups_submit[]', $groupsIdsSubmit);
			$groupsIdsView = $gpermHandler->getGroupIds('video_view', $this->getVar('cat_id'), $GLOBALS['xoopsModule']->getVar('mid'));
			$groupsIdsView[] = array_values($groupsIdsView);
			$groupsCanViewCheckbox = new XoopsFormCheckBox( _AM_VIDEO_PERMISSIONS_VIEW, 'groups_view[]', $groupsIdsView);
		} else {
			$groupsCanApproveCheckbox = new XoopsFormCheckBox( _AM_VIDEO_PERMISSIONS_APPROVE, 'groups_approve[]', $fullList);
			$groupsCanSubmitCheckbox = new XoopsFormCheckBox( _AM_VIDEO_PERMISSIONS_SUBMIT, 'groups_submit[]', $fullList);
			$groupsCanViewCheckbox = new XoopsFormCheckBox( _AM_VIDEO_PERMISSIONS_VIEW, 'groups_view[]', $fullList);
		}
		// To Approve
		$groupsCanApproveCheckbox->addOptionArray($groupList);
		$form->addElement($groupsCanApproveCheckbox);
		// To Submit
		$groupsCanSubmitCheckbox->addOptionArray($groupList);
		$form->addElement($groupsCanSubmitCheckbox);
		// To View
		$groupsCanViewCheckbox->addOptionArray($groupList);
		$form->addElement($groupsCanViewCheckbox);
		// To Save
		$form->addElement(new XoopsFormHidden('op', 'save'));
		$form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
		return $form;
	}

	/**
	 * Get Values
	 */
	public function getValuesCategories($keys = null, $format = null, $maxDepth = null)
	{
		$video = VideoHelper::getInstance();
		$ret = $this->getValues($keys, $format, $maxDepth);
		$ret['id'] = $this->getVar('cat_id');
		$categories = $video->getHandler('categories');
		$cat_pid = $categories->get($this->getVar('cat_pid'));
		$ret['pid'] = $cat_pid->getVar('cat_title');
		$ret['title'] = $this->getVar('cat_title');
		$ret['description'] = strip_tags($this->getVar('cat_description'));
		$ret['image'] = $this->getVar('cat_image');
		$ret['weight'] = $this->getVar('cat_weight');
		return $ret;
	}

	/**
	 * Returns an array representation of the object
	 *
	 * @return array
	 */
	public function toArrayCategories()
	{
		$ret = array();
		$vars = $this->getVars();
		foreach(array_keys($vars) as $var) {
			$ret[$var] = $this->getVar('{$var}');
		}
		return $ret;
	}
}

/**
 * Class Object Handler VideoCategories
 */
class VideoCategoriesHandler extends XoopsPersistableObjectHandler
{
	/**
	 * Constructor 
	 *
	 * @param null|XoopsDatabase $db
	 */
	public function __construct(XoopsDatabase $db)
	{
		parent::__construct($db, 'video_categories', 'videocategories', 'cat_id', 'cat_title');
	}

	/**
	 * @param bool $isNew
	 *
	 * @return object
	 */
	public function create($isNew = true)
	{
		return parent::create($isNew);
	}

	/**
	 * retrieve a field
	 *
	 * @param int $i field id
	 * @return mixed reference to the {@link Get} object
	 */
	public function get($i = null, $fields = null)
	{
		return parent::get($i, $fields);
	}

	/**
	 * get inserted id
	 *
	 * @param null
	 * @return integer reference to the {@link Get} object
	 */
	public function getInsertId()
	{
		return $this->db->getInsertId();
	}

	/**
	 * Get Count Categories in the database
	 */
	public function getCountCategories($start = 0, $limit = 0, $sort = 'cat_id ASC, cat_title', $order = 'ASC')
	{
		$criteriaCountCategories = new CriteriaCompo();
		$criteriaCountCategories = $this->getCategoriesCriteria($criteriaCountCategories, $start, $limit, $sort, $order);
		return parent::getCount($criteriaCountCategories);
	}

	/**
	 * Get All Categories in the database
	 */
	public function getAllCategories($start = 0, $limit = 0, $sort = 'cat_id ASC, cat_title', $order = 'ASC')
	{
		$criteriaAllCategories = new CriteriaCompo();
		$criteriaAllCategories = $this->getCategoriesCriteria($criteriaAllCategories, $start, $limit, $sort = 'cat_id ASC, cat_title', $order = 'ASC');
		return parent::getAll($criteriaAllCategories);
	}

	/**
	 * Get Criteria Categories
	 */
	private function getCategoriesCriteria($criteriaCategories, $start, $limit, $sort, $order)
	{
		$criteriaCategories->setStart( $start );
		$criteriaCategories->setLimit( $limit );
		$criteriaCategories->setSort( $sort );
		$criteriaCategories->setOrder( $order );
		return $criteriaCategories;
	}
}
