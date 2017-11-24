<?php

namespace AlexaSkills\Parser;

use AlexaSkills\Exception\InvalidRequestTypeException;
use AlexaSkills\Exception\MissingRequestTypeException;
use AlexaSkills\Exception\RequestParserException;
use AlexaSkills\Request\AbstractRequest;

/**
 * Amazon Alexa Skills PHP SDK
 * @author Henrik Thesing <mail@henrikthesing.de>
 */
class RequestParser
{
	/**
	 * @param string $json
	 *
	 * @return \AlexaSkills\Request\AbstractRequest
	 * @throws \AlexaSkills\Exception\RequestParserException
	 * @throws \AlexaSkills\Exception\InvalidRequestTypeException
	 * @throws \AlexaSkills\Exception\MissingRequestTypeException
	 */
	public function createRequestFromJson(string $json): AbstractRequest
	{
		$requestData = json_decode($json);

		try {
			if (!isset($requestData->request->type)) {
				throw new MissingRequestTypeException(
					'Unable to determine the correct request type',
					1511553729581
				);
			}

			return $this->getRequestByType($requestData->request->type);

		} catch (\Exception $exception) {
			throw new RequestParserException(
				'Unable to determine the correct request type',
				1511555306992,
				$exception
			);
		}
	}

	/**
	 * @param string $requestType
	 *
	 * @return \AlexaSkills\Request\AbstractRequest
	 * @throws \AlexaSkills\Exception\InvalidRequestTypeException
	 */
	private function getRequestByType(string $requestType): AbstractRequest
	{
		if (!class_exists('\\AlexaSkills\\Request\\' . $requestType)) {
			throw new InvalidRequestTypeException(
				'Invalid request type "{$requestType}" found',
				1511554089000
			);
		}

		$className = '\\AlexaSkills\\Request\\' . $requestType;

		return new $className();
	}
}