<?php

namespace AlexaSkills\Response;

use AlexaSkills\Model\AbstractFlashBriefingItem;

class FlashBriefingResponse extends AbstractResponse
{
	/**
	 * FlashBriefingItem[]
	 */
	private $items = [];

	/**
	 * @param \AlexaSkills\Model\AbstractFlashBriefingItem $item
	 *
	 * @return void
	 */
	public function addItem(AbstractFlashBriefingItem $item)
	{
		$this->items[] = $item;
	}

	/**
	 * @param AbstractFlashBriefingItem[] $items
	 *
	 * @return void
	 */
	public function setItems(array $items)
	{
		$this->items = $items;
	}

	/**
	 * @return AbstractFlashBriefingItem[]
	 */
	public function getItems(): array
	{
		return $this->items;
	}

	/**
	 * @return array
	 */
	public function buildResponse(): array
	{
		$response = [];
		foreach ($this->getItems() as $flashBriefingItem) {
			$response[] = $flashBriefingItem->render();
		}

		return array_merge(
			parent::buildResponse(),
			$response
		);
	}
}