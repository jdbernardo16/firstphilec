<?php
namespace {
	use SilverStripe\CMS\Model\SiteTree;
	use Page;  
	use PageController;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\HTMLEditorField;
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

	class AboutPage extends Page {

		private static $db = [

			/*Frame 1*/
			'F1Header' => 'Text',

			/*Frame 2*/
			'F2Header' => 'Text',
			'F2Desc' => 'Text',

			/*Frame 3*/
			'F3Header' => 'Text',
			'F3Title' => 'Text',

			/*Frame 4*/
			'F4Header' => 'Text',
			'F4Desc' => 'Text',
			'F4Descb' => 'Text',

			/*Frame 5*/
			'F5Header' => 'Text',

		
		];

		private static $has_one = [
			'F1BG' => Image::class,
			'F4BG' => Image::class,
		];

		private static $owns = [
			'F1BG',	
			'F4BG',	
		];

		private static $has_many = [
	        'Awards' => Award::class,
	        'Values' => Value::class,
	        'Leaders' => Leader::class,
	    ];

		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Who We Are',
			'MenuTitle' => 'Who We Are',
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
				new TextField('F1Header', 'Header'),
				$uploadf1 = UploadField::create('F1BG','Background'),
			));

			# SET FIELD DESCRIPTION 
			$uploadf1->setDescription('Max file size: 2MB | Dimension: 1366px x 768px');
			# Set destination path for the uploaded images.
			$uploadf1->setFolderName('whoweare/frame-1');

			/*
			|-----------------------------------------------
			| @Frame2
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame2.Main', array(
				new TextField('F2Header', 'Header'),
				new TextareaField('F2Desc', 'Description'),
			));

			/*
			|-----------------------------------------------
			| @Frame3
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame3.Main', array(
				new TextField('F3Header', 'Header'),
				new TextareaField('F3Title', 'Sub Title'),
			));

			$fields->addFieldToTab('Root.Frame3.Main', new TabSet('Awards',
				new Tab('Awards', GridField::create(
		            'Awards',
		            'Awards',
		            $this->Awards(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			/*
			|-----------------------------------------------
			| @Frame4
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame4.Main', array(
				new TextField('F4Header', 'Header'),
				$uploadf4 = UploadField::create('F4BG','Background'),
				new TextareaField('F4Desc', 'Description Top'),
				new TextareaField('F4Descb', 'Description Bottom'),
			));

			# SET FIELD DESCRIPTION 
			$uploadf4->setDescription('Max file size: 2MB | Dimension: 1366px x 768px');
			# Set destination path for the uploaded images.
			$uploadf4->setFolderName('whoweare/frame-4');

			$fields->addFieldToTab('Root.Frame4.Main', new TabSet('Values',
				new Tab('Values', GridField::create(
		            'Values',
		            'Core Values',
		            $this->Values(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			/*
			|-----------------------------------------------
			| @Frame5
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame5.Main', array(
				new TextField('F5Header', 'Header'),
			));

			$fields->addFieldToTab('Root.Frame5.Main', new TabSet('Leaddrs',
				new Tab('Leaders', GridField::create(
		            'Leaders',
		            'Leaders',
		            $this->Leaders(),
		            GridFieldConfig_RecordEditor::create()
				))
			));


			
			return $fields;
		}
	}

	class AboutPageController extends PageController {

	}
}
