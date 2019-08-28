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

	class Customer extends DataObject {

		private static $db = [
			#Specialty
			'SortID' => 'Int',
			'CTitle' => 'Text',
			'CDesc' => 'Text',
		];

		private static $has_one = [
			'Logo' => Image::class,
			'HomePage' => HomePage::class,
		];

		private static $owns = [
			'Logo',
		];

		public function getThumbnail() {
		   if ($this->Logo()->exists()) { 
		       return $this->Logo()->ScaleWidth(50); 
		   } else { 
		       return '(No Logo)'; 
		   }
		}

		private static $summary_fields = array(
			'Thumbnail' => 'Image',
			'CTitle' => 'Title',
			'CDesc' => 'Description'
			

		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.Main', ReadonlyField::create('SortID', 'Sort ID'));
			$fields->addFieldToTab('Root.Main', TextField::create('CTitle', 'Title'));
			$fields->addFieldToTab('Root.Main', TextareaField::create('CDesc', 'Description'));
			$fields->addFieldToTab('Root.Main', $upload = UploadField::create('Logo','Logo'));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB | Dimension: 300px x 300px');

			# Set destination path for the uploaded images.
			$upload->setFolderName('homepage/customers');
			return $fields;
		}
	}
}

