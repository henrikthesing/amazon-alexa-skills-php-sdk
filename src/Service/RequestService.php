<?php

namespace AlexaSkills\Service;

use AlexaSkills\Exception\InvalidRequestTypeException;
use AlexaSkills\Exception\MissingRequestTypeException;
use AlexaSkills\Exception\RequestServiceException;
use AlexaSkills\Request\RequestInterface;

/**
 * Amazon Alexa Skills PHP SDK
 * @author Henrik Thesing <mail@henrikthesing.de>
 */
class RequestService
{
	/**
	 * @param string $json
	 *
	 * @return \AlexaSkills\Request\RequestInterface
	 * @throws \AlexaSkills\Exception\RequestServiceException
	 * @throws \AlexaSkills\Exception\InvalidRequestTypeException
	 * @throws \AlexaSkills\Exception\MissingRequestTypeException
	 */
	public function createRequestFromJson(string $json): RequestInterface
	{
		/** @var \stdClass $requestData */
		$requestData = json_decode($json);

		try {
			return $this->getRequest($requestData);
		} catch (\Exception $exception) {
			throw new RequestServiceException(
				'Unable to determine the correct request type',
				1511555306992,
				$exception
			);
		}
	}

	/**
	 * @param \stdClass $requestData
	 *
	 * @return \AlexaSkills\Request\RequestInterface
	 * @throws \AlexaSkills\Exception\MissingRequestTypeException
	 * @throws \AlexaSkills\Exception\InvalidRequestTypeException
	 */
	private function getRequest(\stdClass $requestData): RequestInterface
	{
		if (!isset($requestData->request->type)) {
			throw new MissingRequestTypeException(
				'Unable to determine the correct request type',
				1511553729581
			);
		}

		$requestType = $requestData->request->type;

		if (!class_exists('\\AlexaSkills\\Request\\' . $requestType)) {
			throw new InvalidRequestTypeException(
				'Invalid request type "{$requestType}" found',
				1511554089000
			);
		}

		$className = '\\AlexaSkills\\Request\\' . $requestType;

		return new $className($requestData);
	}
}