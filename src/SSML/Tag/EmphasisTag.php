<?php

namespace AlexaSkills\SSML\Tag;

/**
 * Emphasize the tagged words or phrases. Emphasis changes rate and volume of the speech.
 * More emphasis is spoken louder and slower. Less emphasis is quieter and faster.
 *
 * Example:
 * <speak>
 *   I already told you I
 *   <emphasis level="strong">really like</emphasis>
 *   that person.
 * </speak>
 *
 * @author Henrik Thesing <mail@henrikthesing.de>
 */
class EmphasisTag
{
	const LEVEL_STRONG = 'strong';
	const LEVEL_MODERATE = 'moderate';
	const LEVEL_REDUCED = 'reduced';

	/**
	 * @var string
	 */
	private $level;

	/**
	 * @return string
	 */
	public function getLevel() : string
	{
		return $this->level;
	}

	/**
	 * @param string $level
	 *
	 * @return \AlexaSkills\SSML\Tag\EmphasisTag
	 */
	public function setLevel(string $level): self
	{
		$this->level = $level;

		return $this;
	}
}