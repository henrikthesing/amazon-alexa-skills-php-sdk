<?php

namespace AlexaSkills\SSML\Tag;

/**
 * Provides a phonemic/phonetic pronunciation for the contained text. For example, people may pronounce
 * words like “pecan” differently. When using this tag, Alexa uses the pronunciation provided in the ph
 * attribute rather than the text contained within the tag. However, you should still provide
 * human-readable text within the tags.
 *
 * Example:
 * <speak>
 *   You say, <phoneme alphabet="ipa" ph="pɪˈkɑːn">pecan</phoneme>.
 *   I say, <phoneme alphabet="ipa" ph="ˈpi.kæn">pecan</phoneme>.
 * </speak>
 *
 * @author Henrik Thesing <mail@henrikthesing.de>
 */
class PhonemeTag
{
	/**
	 * @var string
	 */
	private $alphabet;

	/**
	 * @var string
	 */
	private $ph;

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