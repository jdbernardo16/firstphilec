<?php
namespace {
	use SilverStripe\CMS\Model\SiteTree;
	use Page;  
	use PageController;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
	use SilverStripe\Forms\HTMLEditor;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Assets\Image;
	use SilverStripe\Assets\File;
	use SilverStripe\Forms\TabSet;
	use SilverStripe\Forms\Tab;
	use SilverStripe\ORM\DataObject;
	use SilverStripe\Forms\FieldList;
	use SilverStripe\Forms\GridField\GridField;
	use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

	class ContactPage extends Page {

		private static $db = [

			/*MAP*/

			'Lng' => 'Text',
	    	'Lat' => 'Text',

	    	'Title1' => 'Text',
	    	'Header1' => 'Text',
	    	'Header2' => 'Text',
	    	'Location1' => 'Text',
	    	'Contact1' => 'HTMLText',
	    	'Title2' => 'Text',
	    	'Location2' => 'Text',
	    	'Contact2' => 'HTMLText',
	    	'Title3' => 'Text',
	    	'Link' => 'HTMLText',
	    	'Title4' => 'Text',
	    	'Weblink' => 'Text',
	    	'Fblink' => 'Text',
	    	'Iglink' => 'Text',
	    	'inlink' => 'Text',

		
		
		];

		private static $has_one = [
		];

		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Contact Page',
			'MenuTitle' => 'Contact Page',
			'ShowInMenus' => true,
			'ShowInSearch' => true,
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();

			#Remove by tab
			$fields->removeFieldFromTab('Root.Main', 'Content');

			/*
			|-----------------------------------------------
			| @Frame1
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Map.Main', array(
				new TextField('Lat', 'Latitude'),
				new TextField('Lng', 'Longitude'),
			));

			/*
			|-----------------------------------------------
			| @Frame1
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Headers.Main', array(
				new TextField('Header1', 'Header Left'),
				new TextField('Header2', 'Header Right'),
			));

			/*
			|-----------------------------------------------
			| @
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.SalesOffice.Main', array(
				new TextField('Title1', 'Title'),
				new TextareaField('Location1', 'Location'),
				new HTMLEditorField('Contact1', 'Contact'),
			));

			/*
			|-----------------------------------------------
			| @
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.MainOffice.Main', array(
				new TextField('Title2', 'Title'),
				new TextareaField('Location2', 'Location'),
				new HTMLEditorField('Contact2', 'Contact'),
			));

			/*
			|-----------------------------------------------
			| @
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.MainOffice.Main', array(
				new TextField('Title3', 'Title'),
				new HTMLEditorField('Link', 'Email'),
			));

			/*
			|-----------------------------------------------
			| @
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.KeepPosted.Main', array(
				new TextField('Title4', 'Title'),
				new TextField('Weblink', 'Website Link'),
				new TextField('Fblink', 'Facebook Link'),
				new TextField('Iglink', 'Instagram Link'),
				new TextField('inlink', 'Linkedin Link'),
			));
			
			return $fields;
		}
	}

	class ContactPageController extends PageController {

	}
}
