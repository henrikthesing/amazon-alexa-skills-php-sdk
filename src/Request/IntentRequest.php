<?php

namespace AlexaSkills\Request;

/**
 * Amazon Alexa Skills PHP SDK
 * @author Henrik Thesing <mail@henrikthesing.de>
 */
class IntentRequest extends AbstractRequest
{
	/**
	 * @var string
	 */
	private $intent;

	/**
	 * @var array
	 */
	private $slots = [];

	/**
	 * @param \stdClass $alexaRequest
	 */
	public function __construct(\stdClass $alexaRequest)
	{
		parent::__construct($alexaRequest);

		$this->intent = $alexaRequest->request->intent->name;
		foreach ((array)$alexaRequest->request->intent->slots as $slotName => $slot) {
			$this->slots[$slotName] = $slot->value;
		}
	}

	/**
	 * @return string
	 */
	public function getIntent() : string
	{
		return $this->intent;
	}

	/**
	 * @return array
	 */
	public function getSlots() : array
	{
		return $this->slots;
	}

	/**
	 * @param string $slotName
	 *
	 * @return bool
	 */
	public function hasSlot(string $slotName): bool
	{
		return isset($this->slots[$slotName]);
	}

	/**
	 * @param string $slotName
	 *
	 * @return null|string
	 */
	public function getSlotValue(string $slotName): string
	{
		return $this->slots[$slotName] ?? null;
	}

}