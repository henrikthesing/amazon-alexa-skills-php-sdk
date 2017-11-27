<?php

namespace AlexaSkills\Response;

/**
 * Amazon Alexa Skills PHP SDK
 * @author Henrik Thesing <mail@henrikthesing.de>
 */
class OutputSpeechResponse extends AbstractResponse
{
	const TYPE_TEXT = 'text';
	const TYPE_SSML = 'ssml';

	/**
	 * @var string
	 */
	private $type;

	/**
	 * @var string
	 */
	private $text;

	/**
	 * @var string
	 */
	private $ssml;

	/**
	 * @param string $type
	 */
	public function setType(string $type)
	{
		$this->type = $type;
	}

	/**
	 * @param string $text
	 */
	public function setText(string $text)
	{
		$this->text = $text;
	}

	/**
	 * @param string $ssml
	 */
	public function setSsml(string $ssml)
	{
		$this->ssml = $ssml;
	}

	/**
	 * @return array
	 */
	public function buildResponse(): array
	{
		$response = array_merge(parent::buildResponse(),
		[
			'version' => 'version',
			'sessionAttributes' => [
				'key' => '',
			],
			'response' => [
				'outputSpeech' => [
					'type' => $this->type,
					'text' => $this->text
				]
			],
			'shouldEndSession' => true
		]);

		return $response;
	}
}