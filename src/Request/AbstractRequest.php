<?php

namespace AlexaSkills\Request;

/**
 * Amazon Alexa Skills PHP SDK
 * @author Henrik Thesing <mail@henrikthesing.de>
 */
abstract class AbstractRequest implements RequestInterface
{
	/**
	 * @var string
	 */
	private $sessionId;

	/**
	 * @var string
	 */
	private $applicationId;

	/**
	 * @var integer
	 */
	private $userId;

	/**
	 * @var string
	 */
	private $requestType;

	/**
	 * @var int
	 */
	private $requestId;

	/**
	 * @var \DateTime
	 */
	private $timestamp;

	/**
	 * @var string
	 */
	private $locale;

	/**
	 * @var string
	 */
	private $version;

	/**
	 * @param \stdClass $alexaRequest
	 */
	public function __construct(\stdClass $alexaRequest)
	{
		$this->sessionId = $alexaRequest->session->sessionId;
		$this->applicationId = $alexaRequest->session->application->applicationId;
		$this->userId = $alexaRequest->session->user->userId;
		$this->requestType = $alexaRequest->request->type;
		$this->requestId = $alexaRequest->request->requestId;
		$this->timestamp = $alexaRequest->request->timestamp;
		$this->locale = $alexaRequest->request->locale;
		$this->version = $alexaRequest->version;
	}

	/**
	 * @return string
	 */
	public function getSessionId() : string
	{
		return $this->sessionId;
	}

	/**
	 * @return string
	 */
	public function getApplicationId() : string
	{
		return $this->applicationId;
	}

	/**
	 * @return int
	 */
	public function getUserId() : int
	{
		return $this->userId;
	}

	/**
	 * @return string
	 */
	public function getRequestType() : string
	{
		return $this->requestType;
	}

	/**
	 * @return int
	 */
	public function getRequestId() : int
	{
		return $this->requestId;
	}

	/**
	 * @return \DateTime
	 */
	public function getTimestamp() : \DateTime
	{
		return $this->timestamp;
	}

	/**
	 * @return string
	 */
	public function getLocale() : string
	{
		return $this->locale;
	}

	/**
	 * @return string
	 */
	public function getVersion() : string
	{
		return $this->version;
	}

	/**
	 * @param $instanceName
	 *
	 * @return bool
	 */
	public function instanceOf($instanceName): bool
	{
		return $this instanceof $instanceName;
	}
}