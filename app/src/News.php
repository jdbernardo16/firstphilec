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

	class News extends Page {

		private static $db = [

			/*News*/
			'NewsTitle' => 'Text',
			'Date' => 'Text',
			'Desc' => 'HTMLText',
		
		];

		private static $has_one = [
			'F1BG' => Image::class,
		];

		private static $owns = [
			'F1BG',
		];

		private static $allowed_children = "none";

		private static $defaults = array(
			'PageName' => 'News',
			'MenuTitle' => 'News ',
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
				$uploadf1 = UploadField::create('F1BG','Banner'),
				new TextField('NewsTitle', 'Article Title'),
				new TextField('Date', 'Date'),
				new HTMLEditorField('Desc', 'Description'),
			));
			# SET FIELD DESCRIPTION 
			$uploadf1->setDescription('Max file size: 2MB | Dimension: 1366px x 768px');
			# Set destination path for the uploaded images.
			$uploadf1->setFolderName('newspage/Article');
			
			return $fields;
		}
	}

	class NewsController extends PageController {


	}
}
