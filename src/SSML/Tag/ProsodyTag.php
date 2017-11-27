<?php

namespace AlexaSkills\SSML\Tag;

/**
 * Modifies the volume, pitch, and rate of the tagged speech.
 *
 * Example:
 * <speak>
 *   Normal volume for the first sentence.
 *   <prosody volume="x-loud">Louder volume for the second sentence</prosody>.
 *   When I wake up, <prosody rate="x-slow">I speak quite slowly</prosody>.
 *   I can speak with my normal pitch,
 *   <prosody pitch="x-high"> but also with a much higher pitch </prosody>,
 *   and also <prosody pitch="low">with a lower pitch</prosody>.
 * </speak>
 *
 * @author Henrik Thesing <mail@henrikthesing.de>
 */
class ProsodyTag
{
	/**
	 * @var string
	 */
	private $rate;

	/**
	 * @var string
	 */
	private $pitch;

	/**
	 * @var string
	 */
	private $volume;

	/**
	 * @return string
	 */
	public function getAlphabet() : string
	{
		return $this->alphabet;
	}

	/**
	 * @param string $alphabet
	 *
	 * @return \AlexaSkills\SSML\Tag\PhonemeTag
	 */
	public function setAlphabet(string $alphabet): self
	{
		$this->alphabet = $alphabet;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getPh() : string
	{
		return $this->ph;
	}

	/**
	 * @param string $ph
	 *
	 * @return \AlexaSkills\SSML\Tag\PhonemeTag
	 */
	public function setPh(string $ph): self
	{
		$this->ph = $ph;

		return $this;
	}
}