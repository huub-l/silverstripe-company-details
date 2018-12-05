<?php

namespace Huubl\Extensions\DataObjects;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

class SiteConfigExtension extends DataExtension {
	
	private static $db = [
		'Phone'     => 'Varchar',
		'Email'       => 'Varchar',
		'Company'   => 'Varchar',
		'Street'    => 'Varchar',
		'City'      => 'Varchar',
		'ZIP'       => 'Varchar',
		'Email'     => 'Varchar',
		'Facebook'  => 'Varchar',
		'Twitter'   => 'Varchar',
		'Pinterest' => 'Varchar',
		'Instagram' => 'Varchar',
		'Youtube'   => 'Varchar',
		'LinkedIn'  => 'Varchar',

    ];

//	private static $has_one = [
//		'Logo' => Image::class,
//
//	];

	public function updateCMSFields(FieldList $fields) {

		$fields->addFieldsToTab('Root.Main', [
//				UploadField::create('Logo', _t($this->owner->getClassName() . '.Logo', 'Logo')),
				TabSet::create('MainTabs',
					Tab::create('Contactdata', _t($this->owner->getClassName() . '.ContactData', 'Contact Data'),
						TextField::create('Company', _t($this->owner->getClassName() . '.Company', 'Company')),
						TextField::create('Street', _t($this->owner->getClassName() . '.Street', 'Street')),
						$zipCity = FieldGroup::create(
							$zip = TextField::create('ZIP', _t($this->owner->getClassName() . '.ZIP', 'ZIP')),
							$city = TextField::create('City', _t($this->owner->getClassName() . '.City', 'City'))
						),
						TextField::create('Phone', _t($this->owner->getClassName() . '.Phone', 'Phone')),
						TextField::create('Email', _t($this->owner->getClassName() . '.Email', 'Email'))
					),
					Tab::create('SocialMedia', _t($this->owner->getClassName() . 'SocialMedia', 'Social Media'),
						TextField::create('Facebook'),
						TextField::create('Twitter'),
						TextField::create('Pinterest'),
						TextField::create('Instagram'),
						TextField::create('Youtube'),
						TextField::create('LinkedIn')
					)
				),
			]
		);

		$zipCity->setTitle(_t($this->owner->getClassName() . '.ZIP', 'ZIP') . ' & ' . _t($this->owner->getClassName() . '.City', 'City'));
		$zip->addExtraClass('col-1of5');
		$zip->setTitle(false);
		$city->addExtraClass('col-4of5');
		$city->setTitle(false);
	}
}
