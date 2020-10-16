<?php

use Codeception\Scenario;
use Step\Acceptance\SearchFormSteps;
use Step\Acceptance\SearchResultsSteps;

class TubeCest {
    public function _before(AcceptanceTester $i) {}

    // tests
    public function videoShouldHavePreview(AcceptanceTester $i, Scenario $scenario) {
        $i->wantTo('test is preview available');
        $i->amOnPage('/');

        $useSearchFormTo = new SearchFormSteps($scenario);
    	$useSearchFormTo->lookFor('nice job');

    	$useSearchResultTo = new SearchResultsSteps($scenario);
    	$useSearchResultTo->checkPreviewExist(2);
    }
}
