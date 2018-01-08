<?php

namespace AlexaSkills\Service;

use AlexaSkills\Response\OutputSpeechResponse;

class ResponseService
{

	/**
	 * @var \HttpRequest
	 */
	private $httpRequest;

	public function __construct()
	{
#		$this->initHttpRequest();
	}

	/**
	 * @param \AlexaSkills\Response\OutputSpeechResponse $response
	 */
	public function sendOutputSpeech(OutputSpeechResponse $response)
	{
		$this->httpRequest->setUrl('');
		$this->sendResponse(json_encode($response->buildResponse()));
	}

	/**
	 * @param string $body
	 *
	 * @return void
	 */
	private function sendResponse(string $body): void
	{
		$this->httpRequest->setBody($body);
		$message = $this->httpRequest->send();
	}

	/**
	 * @return void
	 */
	public function initHttpRequest(): void
	{
		$this->httpRequest = new \HttpRequest();
		$this->httpRequest->setContentType('application/json;charset=UTF-8');
	}

}