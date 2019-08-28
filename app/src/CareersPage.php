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

	class CareersPage extends Page {

		private static $db = [

			/*Frame 1*/
			'F1Header' => 'Text',

			/*Frame 2*/
			'F2Header' => 'Text',
			'F2Desc' => 'HTMLText',

			/*Frame 3*/
			'F3Header' => 'Text',
			'F3Awardee' => 'Text',
			'F3Detail' => 'HTMLText',
			'F3Desc' => 'HTMLText',

			/*Frame 4*/
			'F4Header' => 'Text',
			'F4Sub' => 'Text',
			'F4Desc' => 'HTMLText',
		
		];

		private static $has_one = [
			'F1BG' => Image::class,
			'F2IMG' => Image::class,
			'F3IMG' => Image::class,
		];

		private static $owns = [
			'F1BG',
			'F2IMG',
			'F3IMG',

		];

		private static $has_many = [
	        'Careers' => Career::class,
	    ];


		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'Careers',
			'MenuTitle' => 'Careers',
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
				new TextField('F1Header', 'Title'),
				$uploadf1 = UploadField::create('F1BG','Background'),

			));
			# SET FIELD DESCRIPTION 
			$uploadf1->setDescription('Max file size: 2MB | Dimension: 1366px x 768px');
			# Set destination path for the uploaded images.
			$uploadf1->setFolderName('careerpage/frame-1');

			/*
			|-----------------------------------------------
			| @Frame2
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame2.Main', array(
				new TextField('F2Header', 'Title'),
				new HTMLEditorField('F2Desc', 'Desc (Use H3 for header)'),
				$uploadf2 = UploadField::create('F2IMG','Image'),

			));
			# SET FIELD DESCRIPTION 
			$uploadf2->setDescription('Max file size: 2MB | Dimension: 1366px x 768px');
			# Set destination path for the uploaded images.
			$uploadf2->setFolderName('careerpage/frame-2');

			/*
			|-----------------------------------------------
			| @Frame3
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame3.Main', array(
				$uploadf3 = UploadField::create('F3IMG','Image of Awardee'),
				new TextField('F3Header', 'Title'),
				new HTMLEditorField('F3Detail', 'Detail'),
				new HTMLEditorField('F3Desc', 'Description'),
			));
			# SET FIELD DESCRIPTION 
			$uploadf3->setDescription('Max file size: 2MB | Dimension: 250px x 320px');
			# Set destination path for the uploaded images.
			$uploadf3->setFolderName('careerpage/frame-3');

			/*
			|-----------------------------------------------
			| @Frame4
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame4.Main', array(
				new TextField('F4Header', 'Title'),
				new TextField('F4Sub', 'Sub title'),
				new HTMLEditorField('F4Desc', 'Description'),
			));

			$fields->addFieldToTab('Root.Frame4.Main', new TabSet('Careers',
				new Tab('Careers', GridField::create(
		            'Careers',
		            'Careers',
		            $this->Careers(),
		            GridFieldConfig_RecordEditor::create()
				))
			));

			
			return $fields;
		}
	}

	class CareersPageController extends PageController {

	}
}
