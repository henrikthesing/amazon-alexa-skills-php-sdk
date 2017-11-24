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
	private $type;

	/**
	 * @var string
	 */
	private $requestId;

	/**
	 * @var string
	 */
	private $timestamp;

	/**
	 * @var string
	 */
	private $locale;

	/**
	 * @return string
	 */
	public function getType() : string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 */
	public function setType(string $type)
	{
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getRequestId() : string
	{
		return $this->requestId;
	}

	/**
	 * @param string $requestId
	 */
	public function setRequestId(string $requestId)
	{
		$this->requestId = $requestId;
	}

	/**
	 * @return string
	 */
	public function getTimestamp() : string
	{
		return $this->timestamp;
	}

	/**
	 * @param string $timestamp
	 */
	public function setTimestamp(string $timestamp)
	{
		$this->timestamp = $timestamp;
	}

	/**
	 * @return string
	 */
	public function getLocale() : string
	{
		return $this->locale;
	}

	/**
	 * @param string $locale
	 */
	public function setLocale(string $locale)
	{
		$this->locale = $locale;
	}
}