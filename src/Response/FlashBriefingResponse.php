<?php

namespace AlexaSkills\Response;

use AlexaSkills\Exception\MissingResponseItemException;
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

	private function validate()
	{
		$items = $this->getItems();

		if (empty($items)) {
			throw new MissingResponseItemException('Missing FlashBriefing Response Item - Please add at least one FlashBriefing Item', 1515448412139);
		}

		$type = null;
		foreach ($items as $item) {

		}

	}
}