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

	class Career extends DataObject {

		private static $db = [
			#Specialty
			'SortID' => 'Int',
			'JobTitle' => 'Text',
			'Desc' => 'Text',
		];

		private static $has_one = [
			'Image' => Image::class,
			'CareersPage' => CareersPage::class,
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
			'JobTitle' => 'Job Title',
			'Desc' => 'Description',
			

		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.Main', ReadonlyField::create('SortID', 'Sort ID'));
			$fields->addFieldToTab('Root.Main', $upload = UploadField::create('Image','Image'));
			$fields->addFieldToTab('Root.Main', TextField::create('JobTitle', 'Job Title'));
			$fields->addFieldToTab('Root.Main', HTMLEditorField::create('Desc', 'Description'));

			# SET FIELD DESCRIPTION 
			$upload1->setDescription('Max file size: 2MB | Dimension: 350px x 200px');

			# Set destination path for the uploaded images.
			$upload1->setFolderName('careerpage/job');

			return $fields;
		}
	}
}

