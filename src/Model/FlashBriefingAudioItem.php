<?php

namespace AlexaSkills\Model;

class FlashBriefingAudioItem extends AbstractFlashBriefingItem
{
	/**
	 * @var string
	 */
	private $streamUrl;

	/**
	 * @return string
	 */
	public function getStreamUrl() : string
	{
		return $this->streamUrl;
	}

	/**
	 * @param string $streamUrl
	 */
	public function setStreamUrl(string $streamUrl)
	{
		$this->streamUrl = $streamUrl;
	}

	/**
	 * @return array
	 */
	public function render() : array
	{
		return array_merge(
			[
				'streamUrl' => $this->getStreamUrl()
			],
			parent::render()
		);
	}
}