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

	class WhatWeOffer extends Page {

		private static $db = [

			/*Frame 1*/
			'F1Header' => 'Text',

			/*Frame 2*/
			'F2Header' => 'Text',
			'F2Title' => 'Text',
			'F2Desc' => 'Text',

			/*Frame 3*/
			'F3Header1' => 'Text',
			'F3Header2' => 'Text',
			'F3Desc1' => 'HTMLText',
			'F3Desc2' => 'HTMLText',

			/*Frame 4*/
			'F4Header1' => 'Text',

			/*Frame 5*/
			'F5Header1' => 'Text',
		
		];

		private static $has_one = [
			'F1BG' => Image::class,
		];

		private static $owns = [
			'F1BG',
		];

		private static $has_many = [
	        'Projects' => Project::class,
	        'Testimonials' => Testimonial::class,
	    ];

		private static $allowed_children = array(
			"ProductCategory"
		);

		private static $defaults = array(
			'PageName' => 'What We Offer',
			'MenuTitle' => 'What We Offer',
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
			$uploadf1->setFolderName('whatweoffer/frame-1');

			/*
			|-----------------------------------------------
			| @Frame2
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame2.Main', array(
				new TextField('F2Header', 'Header'),
				new TextField('F2Title', 'Title'),
				new TextareaField('F2Desc', 'Description'),
			));

			/*
			|-----------------------------------------------
			| @Frame3
			|----------------------------------------------- */
			$fields->addFieldToTab('Root.Frame 3', new TabSet('Frame3Sets',
				new Tab('Solutions',
					TextField::create('F3Header1', 'Header'),
					HTMLEditorField::create('F3Desc1', 'Description')
				),
				new Tab('Packages',
					TextField::create('F3Header2', 'Header'),
					HTMLEditorField::create('F3Desc2', 'Description')
				)
			));	

			/*
			|-----------------------------------------------
			| @Frame4
			|----------------------------------------------- */
			$fields->addFieldsToTab('Root.Frame4.Main', array(
				new TextField('F4Header', 'Header'),
			));

			$fields->addFieldToTab('Root.Frame4.Main', new TabSet('Projects',
				new Tab('Projects', GridField::create(
		            'Projects',
		            'Projects',
		            $this->Projects(),
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

			$fields->addFieldToTab('Root.Frame5.Main', new TabSet('Testimonials',
				new Tab('Testimonials', GridField::create(
		            'Testimonials',
		            'Testimonials',
		            $this->Testimonials(),
		            GridFieldConfig_RecordEditor::create()
				))
			));
			
			return $fields;
		}
	}

	class WhatWeOfferController extends PageController {

	}
}
