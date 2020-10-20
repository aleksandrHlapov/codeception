<?php
namespace Step\Acceptance;

use Facebook\WebDriver\WebDriverKeys;
use Page\SearchFormPage;

class SearchFormSteps extends \AcceptanceTester {
	public function lookFor($term) {
        $this->waitForElementVisible(SearchFormPage::$inputField);
		$this->fillField(SearchFormPage::$inputField, $term);
		$this->pressKey(SearchFormPage::$inputField,WebDriverKeys::ENTER);
	}
}