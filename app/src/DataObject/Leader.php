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

	class Leader extends DataObject {

		private static $db = [
			#Specialty
			'SortID' => 'Int',
			'Name' => 'Text',
			'Position' => 'Text',
			'Description' => 'Text',
		];

		private static $has_one = [
			'Image' => Image::class,
			'AboutPage' => AboutPage::class,
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
			'Thumbnail' => 'Profile Picture',
			'Name' => 'Name',
			'Position' => 'Position',
			'Description' => 'Description',
			

		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.Main', ReadonlyField::create('SortID', 'Sort ID'));
			$fields->addFieldToTab('Root.Main', TextField::create('Name', 'Name'));
			$fields->addFieldToTab('Root.Main', TextField::create('Position', 'Position'));
			$fields->addFieldToTab('Root.Main', TextareaField::create('Description', 'Description'));
			$fields->addFieldToTab('Root.Main', $upload = UploadField::create('Image','Image'));

			# SET FIELD DESCRIPTION 
			$upload->setDescription('Max file size: 2MB | Dimension: 300px x 400px');

			# Set destination path for the uploaded images.
			$upload->setFolderName('aboutpage/leaders');
			return $fields;
		}
	}
}

