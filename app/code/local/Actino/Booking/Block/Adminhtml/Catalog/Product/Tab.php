<?php
class Actino_Booking_Block_Adminhtml_Catalog_Product_Tab extends Mage_Adminhtml_Block_Template implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
	/*
		set the template for the block
	*/
	public function _construct()
	{
		parent::_construct();
		$this->setTemplate('booking/catalog/product/tab.phtml');
	}

	/*
		Retrieve the label used for the tab relating to this block
		@return string
	*/

	public function getTabLabel()
	{
		return $this->__('Booking & Reservation');
	}

	/*
	Retrieve the tiltle used by this tab
	@return string
	*/

	public function getTabTitle()
	{
		return $this->__('click here to view your custom tab content');
	}

	/*
	Determines whether to display the tab
	Add logic here to decide whether you want the tab to display
	*/

	public function canShowTab()
	{
		//get the current product instance
		$product = Mage::registry('product');
		//if on edit mode show the tab
		if($product->getId())
		{
			return true;
		}
		//if on add mode and the attribue set has not bee nselected yet don't show the tab
		if(!$product->getAttributeSetId())
		{
			return false;
		}
		$request = Mage::app()->getRequest();
		//if creating a configurable product andn you have selected the configurable attributes,
		if($request->getParam('type') == 'configurable')
		{
			if ($request->getParam('attributes'))
			{
				return false;
			}
		}
		return true;
	}

	/*
	Stops the tab being hidden
	@return bool
	*/

	public function isHidden()
	{
		return false;
	}

	/*
		AJAX TAB's
		if you want to used an ajax tab, uncomment the following functions
		Please note that you will need to setup a controller to recieve
		the tab content request
	*/

	/*
		Retrieve the class name of the tab
		Return 'ajax' here if you want the tab to be loaded via Ajax
		@return string
	*/

/*	public function getTabClass()
	{
		return 'my-custom-tab';
	}*/

	/*
		Determine whether to generate content on load or via AJAX
		If true, the tab's content won't be loaded until the tab is clicked
		You will need to setup a controller to handle the tab request

		return bool
	*/

/*	public function getSkipGenerateContent()
	{
		return false;
	}*/

	/*
		Retrive the URL used to load the tab content
		Return the URL here used to load the content by AJAX
		see self::getSkipGenratedContent & self::getTabClass

		@return string
	*/

/*	public function getTabUrl()
	{
		return null;
	}*/
}