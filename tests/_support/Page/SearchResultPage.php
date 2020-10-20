<?php
namespace Page;

class SearchResultPage {
	public $intVideoPosition;

	public function getNewVideoOnChannelByPosition() {
		return '//ytd-video-renderer['.($this->intVideoPosition).']';
	}

	public function getNewVideoOnChannelByPositionMouseOverlay() {
		return $this->getNewVideoOnChannelByPosition().'//div[@id=\'mouseover-overlay\']';
	}

	public function getNewVideoOnChannelByPositionPlayIcon() {
		return $this->getNewVideoOnChannelByPosition().'//yt-icon[@id=\'play\']';
	}

	public function setIntVideoPosition($intVideoPosition) {
		$this->intVideoPosition = $intVideoPosition;
	}
}
