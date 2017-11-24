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
	private $dialogState;

	/**
	 * @var string
	 */
	private $intent;

	/**
	 * @var string
	 */
	private $locale;

}