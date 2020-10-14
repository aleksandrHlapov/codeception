<?php
namespace Step\Acceptance;

use Facebook\WebDriver\WebDriverKeys;
use http\Exception\RuntimeException;
use Page\SearchFormPage;

class SearchFormSteps extends \AcceptanceTester
{
		public function lookFor($term) {
            try {
                $this->waitForElementVisible(SearchFormPage::$inputField);
            } catch (\Exception $e) {
                throw new RuntimeException('test message '.$e);
            }
            $this->fillField(SearchFormPage::$inputField, $term);
            $this->pressKey(SearchFormPage::$inputField,WebDriverKeys::ENTER);
        }
}