<?php
namespace Step\Acceptance;

use Page\SearchResultPage;
use SebastianBergmann\Template\RuntimeException;

class SearchResultsSteps extends \AcceptanceTester {
    public function checkPreviewExist($intVideoPosition) {
        $searchResultPage = new SearchResultPage();
        $searchResultPage -> setIntVideoPosition(2);
        try {
            $this->waitForElementVisible($searchResultPage -> getNewVideoOnChannelByPosition());
            $this->moveMouseOver($searchResultPage -> getNewVideoOnChannelByPositionMouseOverlay());
            $this->waitForElementVisible($searchResultPage -> getNewVideoOnChannelByPositionPlayIcon());
        } catch (\Exception $e) {
            throw new RuntimeException($e);
        }
    }
}