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

	class Testimonial extends DataObject {

		private static $db = [
			#Specialty
			'SortID' => 'Int',
			'Name' => 'Text',
			'Message' => 'Text',
			'Date' => 'Text',
			'Desc' => 'Text',
		];

		private static $has_one = [
			'Image' => Image::class,
			'WhatWeOffer' => WhatWeOffer::class,
		];

		private static $owns = [
			'Image',
		];

		public function getThumbnail() {
		   if ($this->Image()->exists()) { 
		       return $this->Image()->ScaleWidth(50); 
		   } else { 
		       return '(No Image)'; 
		   }
		}

		private static $summary_fields = array(
			'Thumbnail' => 'Image',
			'Name' => 'Name',
			'Desc' => 'Description',
			'Date' => 'Date',
			'Message' => 'Message',
			

		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.Main', ReadonlyField::create('SortID', 'Sort ID'));
			$fields->addFieldToTab('Root.Main', TextField::create('Name', 'Name'));
			$fields->addFieldToTab('Root.Main', TextareaField::create('Desc', 'Description'));
			$fields->addFieldToTab('Root.Main', TextField::create('Date', 'Date'));
			$fields->addFieldToTab('Root.Main', TextareaField::create('Message', 'Message'));
			$fields->addFieldToTab('Root.Main', $upload = UploadField::create('Image','Image'));

			# SET FIELD DESCRIPTION 
			$upload1->setDescription('Max file size: 2MB | Dimension: 400px x 280px');

			# Set destination path for the uploaded images.
			$upload1->setFolderName('aboutpage/project');

			return $fields;
		}
	}
}

