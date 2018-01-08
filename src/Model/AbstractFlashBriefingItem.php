<?php

namespace AlexaSkills\Model;

abstract class AbstractFlashBriefingItem
{
	const TIMESTAMP_FORMAT = 'Y-m-d\TH:i:s\.\0\Z';

	/**
	 * @var string
	 */
	private $id;

	/**
	 * @var \DateTime
	 */
	private $updatedAt;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $redirectionUrl;

	/**
	 * @return string
	 */
	public function getId() : string
	{
		return $this->id;
	}

	/**
	 * @param string $id
	 */
	public function setId(string $id)
	{
		$this->id = $id;
	}

	/**
	 * @return \DateTime
	 */
	public function getUpdatedAt() : \DateTime
	{
		return $this->updatedAt;
	}

	/**
	 * @param \DateTime $updatedAt
	 */
	public function setUpdatedAt(\DateTime $updatedAt)
	{
		$this->updatedAt = $updatedAt;
	}

	/**
	 * @return string
	 */
	public function getTitle() : string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title)
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getRedirectionUrl() : string
	{
		return $this->redirectionUrl;
	}

	/**
	 * @param string $redirectionUrl
	 */
	public function setRedirectionUrl(string $redirectionUrl)
	{
		$this->redirectionUrl = $redirectionUrl;
	}

	/**
	 * @return array
	 */
	public function renderJson() : array
	{
		return [
			'uid' => $this->getId(),
			'updateDate' => $this->getUpdatedAt()->format(self::TIMESTAMP_FORMAT),
			'titleText' => $this->getTitle(),
			'redirectionUrl' => $this->getRedirectionUrl()
		];
	}
}