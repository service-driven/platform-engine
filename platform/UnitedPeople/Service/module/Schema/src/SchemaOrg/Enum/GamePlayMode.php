<?php

namespace Schema\SchemaOrg\Enum;


use Schema\Enum\Enum;

/**
 * Indicates whether this game is multi-player, co-op or single-player.
 *
 * @see http://schema.org/GamePlayMode Documentation on Schema.org
 */
class GamePlayMode extends Enum
{
    /**
     * @var string Play mode: MultiPlayer. Requiring or allowing multiple human players to play simultaneously
     */
    const MULTI_PLAYER = 'http://schema.org/MultiPlayer';
    /**
     * @var string Play mode: CoOp. Co-operative games, where you play on the same team with friends
     */
    const CO_OP = 'http://schema.org/CoOp';
    /**
     * @var string Play mode: SinglePlayer. Which is played by a lone player
     */
    const SINGLE_PLAYER = 'http://schema.org/SinglePlayer';
}
