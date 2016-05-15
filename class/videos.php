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
 * @version        $Id: 1.0 videos.php 14050 Sat 2016-05-07 14:43:57Z Timgno $
 */
defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object VideoVideos
 */
class VideoVideos extends XoopsObject
{
	/**
	 * Constructor 
	 *
	 * @param null
	 */
	public function __construct()
	{
		$this->initVar('video_id', XOBJ_DTYPE_INT);
		$this->initVar('video_cid', XOBJ_DTYPE_INT);
		$this->initVar('video_title', XOBJ_DTYPE_TXTBOX);
		$this->initVar('video_file', XOBJ_DTYPE_TXTBOX);
		$this->initVar('video_description', XOBJ_DTYPE_TXTAREA);
		$this->initVar('video_url', XOBJ_DTYPE_TXTBOX);
		$this->initVar('video_created', XOBJ_DTYPE_INT);
		$this->initVar('video_published', XOBJ_DTYPE_INT);
		$this->initVar('video_weight', XOBJ_DTYPE_INT);
		$this->initVar('video_display', XOBJ_DTYPE_INT);
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
	public function getNewInsertedIdVideos()
	{
		$newInsertedId = $GLOBALS['xoopsDB']->getInsertId();
		return $newInsertedId;
	}

	/**
	 * Get form
	 *
	 * @param mixed $action
	 */
	public function getFormVideos($action = false)
	{
		$video = VideoHelper::getInstance();
		if($action === false) {
			$action = $_SERVER['REQUEST_URI'];
		}
		// Permissions for uploader
		$gpermHandler = xoops_gethandler('groupperm');
		$groups = is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->getGroups() : XOOPS_GROUP_ANONYMOUS;
		if($GLOBALS['xoopsUser']) {
			if(!$GLOBALS['xoopsUser']->isAdmin($GLOBALS['xoopsModule']->mid())) {
				$permissionUpload = $gpermHandler->checkRight('', 32, $groups, $GLOBALS['xoopsModule']->getVar('mid')) ? true : false;
			} else {
				$permissionUpload = true;
			}
		} else {
			$permissionUpload = $gpermHandler->checkRight('', 32, $groups, $GLOBALS['xoopsModule']->getVar('mid')) ? true : false;
		}
		// Title
		$title = $this->isNew() ? sprintf(_AM_VIDEO_VIDEO_ADD) : sprintf(_AM_VIDEO_VIDEO_EDIT);
		// Get Theme Form
		xoops_load('XoopsFormLoader');
		$form = new XoopsThemeForm($title, 'form', $action, 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		// Use tag module
		$dirTag = is_dir(XOOPS_ROOT_PATH . '/modules/tag') ? true : false;
		if(($video->getConfig('usetag') == 1) && $dirTag) {
			$tagId = $this->isNew() ? 0 : $this->getVar('video_id');
			include_once XOOPS_ROOT_PATH .'/modules/tag/include/formtag.php';
			$form->addElement(new XoopsFormTag( 'tag', 60, 255, $tagId, 0 ));
		}
		// Form Table Videos
		$categoriesHandler = $video->getHandler('categories');
		$videoCidSelect = new XoopsFormSelect( _AM_VIDEO_VIDEO_CID, 'video_cid', $this->getVar('video_cid'));
		$videoCidSelect->addOptionArray($categoriesHandler->getList());
		$form->addElement($videoCidSelect);
		// Form Text VideoTitle
		$form->addElement(new XoopsFormText( _AM_VIDEO_VIDEO_TITLE, 'video_title', 50, 255, $this->getVar('video_title') ), true);
		if($permissionUpload == true) {
			// Form File
			$fileSelectTray = new XoopsFormElementTray('', '<br />' );
			$fileSelectTray->addElement(new XoopsFormFile( _AM_VIDEO_VIDEO_FILE, 'attachedfile', $video->getConfig('maxsize') ));
			$fileSelectTray->addElement(new XoopsFormLabel(''));
			$form->addElement($fileSelectTray);
			// Form File
			// $form->addElement(new XoopsFormFile( _AM_VIDEO_VIDEO_FILE, 'attachedFile', $video->getConfig('maxsize')));
		}
		// Form Text Area VideoDescription
		$form->addElement(new XoopsFormTextArea( _AM_VIDEO_VIDEO_DESCRIPTION, 'video_description', $this->getVar('video_description'), 4, 47));
		// Form Text VideoUrl
		$form->addElement(new XoopsFormText( _AM_VIDEO_VIDEO_URL, 'video_url', 50, 255, $this->getVar('video_url') ));
		// Form Text Date Select
		$videoCreated = $this->isNew() ? 0 : $this->getVar('video_created');
		$form->addElement(new XoopsFormTextDateSelect( _AM_VIDEO_VIDEO_CREATED, 'video_created', '', $this->getVar('video_created') ));
		// Form Text Date Select
		$videoPublished = $this->isNew() ? 0 : $this->getVar('video_published');
		$form->addElement(new XoopsFormTextDateSelect( _AM_VIDEO_VIDEO_PUBLISHED, 'video_published', '', $this->getVar('video_published') ));
		// Form Text VideoWeight
		$videoWeight = $this->isNew() ? '0' : $this->getVar('video_weight');
		$form->addElement(new XoopsFormText( _AM_VIDEO_VIDEO_WEIGHT, 'video_weight', 20, 150, $videoWeight ), true);
		// Form Radio Yes/No
		$videoDisplay = $this->isNew() ? 0 : $this->getVar('video_display');
		$form->addElement(new XoopsFormRadioYN( _AM_VIDEO_VIDEO_DISPLAY, 'video_display', $videoDisplay));
		// To Save
		$form->addElement(new XoopsFormHidden('op', 'save'));
		$form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
		return $form;
	}
	
	/**
	 * Get form
	 *
	 * @param mixed $action
	 */
	public function getFormSubmitVideos($action = false)
	{
		$video = VideoHelper::getInstance();
		if($action === false) {
			$action = $_SERVER['REQUEST_URI'];
		}
		// Permissions for uploader
		$gpermHandler = xoops_gethandler('groupperm');
		$groups = is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->getGroups() : XOOPS_GROUP_ANONYMOUS;
		if($GLOBALS['xoopsUser']) {
			if(!$GLOBALS['xoopsUser']->isAdmin($GLOBALS['xoopsModule']->mid())) {
				$permissionUpload = $gpermHandler->checkRight('', 32, $groups, $GLOBALS['xoopsModule']->getVar('mid')) ? true : false;
			} else {
				$permissionUpload = true;
			}
		} else {
			$permissionUpload = $gpermHandler->checkRight('', 32, $groups, $GLOBALS['xoopsModule']->getVar('mid')) ? true : false;
		}
		// Title
		$title = $this->isNew() ? sprintf(_MA_VIDEO_SUBMIT_ADD) : sprintf(_MA_VIDEO_SUBMIT_EDIT);
		// Get Theme Form
		xoops_load('XoopsFormLoader');
		$form = new XoopsThemeForm($title, 'form', $action, 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		// Use tag module
		$dirTag = is_dir(XOOPS_ROOT_PATH . '/modules/tag') ? true : false;
		if(($video->getConfig('usetag') == 1) && $dirTag) {
			$tagId = $this->isNew() ? 0 : $this->getVar('video_id');
			include_once XOOPS_ROOT_PATH .'/modules/tag/include/formtag.php';
			$form->addElement(new XoopsFormTag( 'tag', 60, 255, $tagId, 0 ));
		}
		// Form Table Videos
		$categoriesHandler = $video->getHandler('categories');
		$videoCidSelect = new XoopsFormSelect( _MA_VIDEO_VIDEO_CID, 'video_cid', $this->getVar('video_cid'));
		$videoCidSelect->addOptionArray($categoriesHandler->getList());
		$form->addElement($videoCidSelect);
		// Form Text VideoTitle
		$form->addElement(new XoopsFormText( _MA_VIDEO_VIDEO_TITLE, 'video_title', 50, 255, $this->getVar('video_title') ), true);
		if($permissionUpload == true) {
			// Form File
			$form->addElement(new XoopsFormFile( _MA_VIDEO_VIDEO_FILE, 'video_file', $video->getConfig('maxsize')));
		}
		// Form Text Area VideoDescription
		$form->addElement(new XoopsFormTextArea( _MA_VIDEO_VIDEO_DESCRIPTION, 'video_description', $this->getVar('video_description'), 4, 47));
		// Form Text VideoUrl
		$form->addElement(new XoopsFormText( _MA_VIDEO_VIDEO_URL, 'video_url', 50, 255, $this->getVar('video_url') ));
		// Form Text Date Select
		$videoCreated = $this->isNew() ? 0 : $this->getVar('video_created');
		$form->addElement(new XoopsFormTextDateSelect( _MA_VIDEO_VIDEO_CREATED, 'video_created', '', $this->getVar('video_created') ));
		// Form Text Date Select
		$videoPublished = $this->isNew() ? 0 : $this->getVar('video_published');
		$form->addElement(new XoopsFormTextDateSelect( _MA_VIDEO_VIDEO_PUBLISHED, 'video_published', '', $this->getVar('video_published') ));
		// Form Text VideoWeight
		$videoWeight = $this->isNew() ? '0' : $this->getVar('video_weight');
		$form->addElement(new XoopsFormText( _MA_VIDEO_VIDEO_WEIGHT, 'video_weight', 20, 150, $videoWeight ), true);
		// Form Radio Yes/No
		$videoDisplay = $this->isNew() ? 0 : $this->getVar('video_display');
		$form->addElement(new XoopsFormRadioYN( _MA_VIDEO_VIDEO_DISPLAY, 'video_display', $videoDisplay));
		// To Save
		$form->addElement(new XoopsFormHidden('op', 'save'));
		$form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
		return $form;
	}

	/**
	 * Get Values
	 */
	public function getValuesVideos($keys = null, $format = null, $maxDepth = null)
	{
		$video = VideoHelper::getInstance();
		$ret = $this->getValues($keys, $format, $maxDepth);
		$ret['id'] = $this->getVar('video_id');
		$categories = $video->getHandler('categories');
		$video_cid = $categories->get($this->getVar('video_cid'));
		$ret['cid'] = $video_cid->getVar('cat_title');
		$ret['title'] = $this->getVar('video_title');
		$ret['file'] = $this->getVar('video_file');
		$ret['description'] = strip_tags($this->getVar('video_description'));
		$ret['url'] = $this->getVar('video_url');
		$ret['created'] = formatTimeStamp($this->getVar('video_created'), 's');
		$ret['published'] = formatTimeStamp($this->getVar('video_published'), 's');
		$ret['weight'] = $this->getVar('video_weight');
		$ret['display'] = $this->getVar('video_display');
		return $ret;
	}

	/**
	 * Returns an array representation of the object
	 *
	 * @return array
	 */
	public function toArrayVideos()
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
 * Class Object Handler VideoVideos
 */
class VideoVideosHandler extends XoopsPersistableObjectHandler
{
	/**
	 * Constructor 
	 *
	 * @param null|XoopsDatabase $db
	 */
	public function __construct(XoopsDatabase $db)
	{
		parent::__construct($db, 'video_videos', 'videovideos', 'video_id', 'video_title');
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
	 * Get Count Videos in the database
	 */
	public function getCountVideos($start = 0, $limit = 0, $sort = 'video_id ASC, video_title', $order = 'ASC')
	{
		$criteriaCountVideos = new CriteriaCompo();
		$criteriaCountVideos = $this->getVideosCriteria($criteriaCountVideos, $start, $limit, $sort, $order);
		return parent::getCount($criteriaCountVideos);
	}

	/**
	 * Get All Videos in the database
	 */
	public function getAllVideos($start = 0, $limit = 0, $sort = 'video_id ASC, video_title', $order = 'ASC')
	{
		$criteriaAllVideos = new CriteriaCompo();
		$criteriaAllVideos = $this->getVideosCriteria($criteriaAllVideos, $start, $limit, $sort = 'video_id ASC, video_title', $order = 'ASC');
		return parent::getAll($criteriaAllVideos);
	}

	/**
	 * Get Criteria Videos
	 */
	private function getVideosCriteria($criteriaVideos, $start, $limit, $sort, $order)
	{
		$criteriaVideos->setStart( $start );
		$criteriaVideos->setLimit( $limit );
		$criteriaVideos->setSort( $sort );
		$criteriaVideos->setOrder( $order );
		return $criteriaVideos;
	}
}
