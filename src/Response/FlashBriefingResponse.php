<?php

namespace AlexaSkills\Response;

use AlexaSkills\Exception\InvalidResponseTypeException;
use AlexaSkills\Model\AbstractFlashBriefingItem;

class FlashBriefingResponse extends AbstractResponse
{
	const RESPONSE_TYPE_JSON = 'json';
	const RESPONSE_TYPE_RSS = 'rss';
	const VALID_RESPONSE_TYPES = [
		'json',
		'rss'
	];

	/**
	 * FlashBriefingItem[]
	 */
	private $items = [];

	/**
	 * @var string
	 */
	private $responseType = 'json';

	/**
	 * @return string
	 */
	public function getResponseType() : string
	{
		return $this->responseType;
	}

	/**
	 * @param string $responseType
	 *
	 * @throws \AlexaSkills\Exception\InvalidResponseTypeException
	 */
	public function setResponseType(string $responseType)
	{
		if (!in_array($responseType)) {
			throw new InvalidResponseTypeException(
				sprintf('Invalid response type "%s". Response type must be one of the values "json", "rss".', $responseType)
			);
		}
		$this->responseType = $responseType;
	}

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
			$response[] = $flashBriefingItem->renderJson();
		}

		return array_merge(
			parent::buildResponse(),
			$response
		);
	}
}