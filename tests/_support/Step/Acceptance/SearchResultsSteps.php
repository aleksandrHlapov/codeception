<?php
namespace Step\Acceptance;

use Page\SearchResultPage;

class SearchResultsSteps extends \AcceptanceTester {
	public function checkPlayButtonDisplayed($intVideoPosition) {
        $searchResultPage = $this->setVideoPosition($intVideoPosition);
        $this->waitForElementVisible($searchResultPage -> getNewVideoOnChannelByPosition());
        $this->moveMouseOver($searchResultPage -> getNewVideoOnChannelByPositionMouseOverlay());
        $this->waitForElementVisible($searchResultPage -> getNewVideoOnChannelByPositionPlayIcon());
	}

    private function setVideoPosition($intVideoPosition) {
        $searchResultPage = new SearchResultPage();
        $searchResultPage->setIntVideoPosition($intVideoPosition);
        return $searchResultPage;
    }
}