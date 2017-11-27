<?php

namespace AlexaSkills\SSML\Tag;

class AudioTag
{
	/** @var string */
	private $src;

	/**
	 * @return string
	 */
	public function getSrc() : string
	{
		return $this->src;
	}

	/**
	 * @param string $src
	 */
	public function setSrc(string $src)
	{
		$this->src = $src;
	}
}