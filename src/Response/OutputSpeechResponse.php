<?php

namespace AlexaSkills\Response;

/**
 * Amazon Alexa Skills PHP SDK
 * @author Henrik Thesing <mail@henrikthesing.de>
 */
class OutputSpeechResponse extends AbstractResponse
{
	const TYPE_TEXT = 'PlainText';
	const TYPE_SSML = 'SSML';

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
			'version' => '1.0',
			'sessionAttributes' => [
				'key' => '',
			],
			'response' => [
				'outputSpeech' => [
					'type' => $this->type,
					'text' => $this->text,
					'smml' => $this->smml,
				],
			],
			'shouldEndSession' => true
		]);

		return $response;
	}
}