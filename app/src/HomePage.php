<?php
namespace {
	use SilverStripe\CMS\Model\SiteTree;
	use Page;  
	use PageController;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
	use SilverStripe\Forms\HTMLEditor;
	use SilverStripe\Forms\FormField;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Assets\Image;
	use SilverStripe\Assets\File;
	use SilverStripe\Forms\TabSet;
	use SilverStripe\Forms\Tab;
	use SilverStripe\ORM\DataObject;
	use SilverStripe\Forms\FieldList;
	use SilverStripe\Forms\GridField\GridField;
	use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

	class HomePage extends Page {

		private static $db = [
			/*Frame 1*/
			'F1Header' => 'HTMLText',
			'F1Desc' => 'Text',

			/*Frame 2*/
			'F2Header' => 'Text',

			/*Frame 3*/
			'F3Header' => 'Text',
			'F3Desc' => 'Text',

			/*Frame 4*/
			'F4Header' => 'Text',
			'F4Desc' => 'Text',

			/*Frame 5*/
			'F5Header' => 'Text',
			'F5Desc' => 'Text',

			/*Frame 6*/
			'F6Header' => 'Text',

			/*Frame 7*/
			'F7Header' => 'Text',
		];

		private static $has_one = [
			'F1BG' => Image::class,
		];

		private static $has_many = [
	        'AboutImages' => AboutImage::class,
	        'Customers' => Customer::class,
	    ];

		private static $owns = [
			'F1BG',
		];

		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Home Page',
			'MenuTitle' => 'Home',
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
			$fields->addFieldsToTab('Root.Frame1.Main', array(
				new HTMLEditorField('F1Header', 'Title (BOLD to make yellow)'),
				new TextareaField('F1Desc', 'Description'),
				$uploadf1 = UploadField::create('F1BG','Background'),

			));
			# SET FIELD DESCRIPTION 
			$uploadf1->setDescription('Max file size: 2MB | Dimension: 1366px x 768px');
			# Set destination path for the uploaded images.
			$uploadf1->setFolderName('homepage/frame-1');

			/*
			|-----------------------------------------------
			| @Frame2
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame2.Main', array(
				new TextField('F2Header', 'header'),

			));

			/*
			|-----------------------------------------------
			| @Frame3
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame3.Main', array(
				new TextField('F3Header', 'header'),
				new TextareaField('F3Desc', 'Description'),
			));

			/*
			|-----------------------------------------------
			| @Frame4
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame4.Main', array(
				new TextField('F4Header', 'header'),
				new TextareaField('F4Desc', 'Description'),
			));

			$fields->addFieldToTab('Root.Frame4.Main', new TabSet('About Gallery',
				new Tab('Gallery', GridField::create(
		            'AboutImages',
		            'Gallery',
		            $this->AboutImages(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			/*
			|-----------------------------------------------
			| @Frame5
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame5.Main', array(
				new TextField('F5Header', 'header'),
				new TextareaField('F5Desc', 'Description'),
			));

			$fields->addFieldToTab('Root.Frame5.Main', new TabSet('Customers We Serve',
				new Tab('Customers', GridField::create(
		            'Customers',
		            'Customers',
		            $this->Customers(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			/*
			|-----------------------------------------------
			| @Frame6
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame6.Main', array(
				new TextField('F6Header', 'header'),
			));

			/*
			|-----------------------------------------------
			| @Frame7
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame7.Main', array(
				new TextField('F7Header', 'header'),
			));





			return $fields;
		}
	}

	class HomePageController extends PageController {

	}
}
