<?php

namespace AlexaSkills\Model;

class FlashBriefingTextItem extends AbstractFlashBriefingItem
{
	/**
	 * @var string
	 */
	private $mainText;

	/**
	 * @return string
	 */
	public function getMainText() : string
	{
		return $this->mainText;
	}

	/**
	 * @param string $mainText
	 */
	public function setMainText(string $mainText)
	{
		$this->mainText = $mainText;
	}

	/**
	 * @return array
	 */
	public function renderJson() : array
	{
		return array_merge(
			[
				'mainText' => $this->getMainText()
			],
			parent::renderJson()
		);
	}
}