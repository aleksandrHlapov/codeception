<?php

use Codeception\Scenario;
use Step\Acceptance\SearchFormSteps;
use Step\Acceptance\SearchResultsSteps;

class TubeCest {
	// tests
	public function shouldSeePreviewEnd(AcceptanceTester $i, Scenario $scenario) {
		$i->wantTo('test is preview available');
		$i->amOnPage('/');
		$this->lookFor('nice job', $scenario);
		$this->shouldSeePlayButton(2, $scenario);
	}

	private function lookFor($term, Scenario $scenario) {
		$useSearchFormTo = new SearchFormSteps($scenario);
		$useSearchFormTo->lookFor($term);
	}

	private function shouldSeePlayButton($videoNumber, Scenario $scenario) {
		$useSearchResultTo = new SearchResultsSteps($scenario);
		$useSearchResultTo->checkPlayButtonDisplayed($videoNumber);
	}
}
