<?php

namespace {
	use SilverStripe\CMS\Model\SiteTree;
	use SilverStripe\ORM\DataObject;
	use SilverStripe\Assets\Image;
	use SilverStripe\Forms\FieldList;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\ReadonlyField;
	use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Versioned\Versioned;
	use SilverStripe\Control\Controller;

	class Project extends DataObject {

		private static $db = [
			#Specialty
			'SortID' => 'Int',
			'PTitle' => 'Text',
			'PSubTitle' => 'Text',
			'Date' => 'Text',
			'Desc' => 'Text',
		];

		private static $has_one = [
			'Image1' => Image::class,
			'Image2' => Image::class,
			'WhatWeOffer' => WhatWeOffer::class,
		];

		private static $owns = [
			'Image1',
			'Image2',
		];

		public function getThumbnail() {
		   if ($this->Image1()->exists()) { 
		       return $this->Image1()->ScaleWidth(50); 
		   } else { 
		       return '(No Image)'; 
		   }
		}

		private static $summary_fields = array(
			'Thumbnail' => 'Image',
			'PTitle' => 'Title',
			'PSubTitle' => 'Sub Title',
			'Date' => 'Date',
			'Desc' => 'Description',
			

		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.Main', ReadonlyField::create('SortID', 'Sort ID'));
			$fields->addFieldToTab('Root.Main', TextField::create('PTitle', 'Title'));
			$fields->addFieldToTab('Root.Main', TextField::create('PSubTitle', 'Sub Title'));
			$fields->addFieldToTab('Root.Main', TextField::create('Date', 'Date'));
			$fields->addFieldToTab('Root.Main', TextareaField::create('Desc', 'Description'));
			$fields->addFieldToTab('Root.Main', $upload1 = UploadField::create('Image1','Image'));
			$fields->addFieldToTab('Root.Main', $upload2 = UploadField::create('Image2','Image'));

			# SET FIELD DESCRIPTION 
			$upload1->setDescription('Max file size: 2MB | Dimension: 400px x 280px');

			# Set destination path for the uploaded images.
			$upload1->setFolderName('aboutpage/project');

			# SET FIELD DESCRIPTION 
			$upload2->setDescription('Max file size: 2MB | Dimension: 400px x 280px');

			# Set destination path for the uploaded images.
			$upload2->setFolderName('aboutpage/project');
			return $fields;
		}
	}
}

