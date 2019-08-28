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

	class Award extends DataObject {

		private static $db = [
			#Specialty
			'SortID' => 'Int',
			'awardyr' => 'Text',
			'awarddesc' => 'Text',
		];

		private static $has_one = [
			'AboutPage' => AboutPage::class,
		];

		private static $owns = [
		];


		private static $summary_fields = array(
			'awardyr' => 'Year',
			'awarddesc' => 'Description'
			

		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.Main', ReadonlyField::create('SortID', 'Sort ID'));
			$fields->addFieldToTab('Root.Main', TextField::create('awardyr', 'Year'));
			$fields->addFieldToTab('Root.Main', TextareaField::create('awarddesc', 'Description'));

			return $fields;
		}
	}
}

