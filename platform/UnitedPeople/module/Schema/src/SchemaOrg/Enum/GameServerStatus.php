<?php

namespace Schema\SchemaOrg\Enum;

use Schema\Enum\Enum;


/**
 * Status of a game server.
 *
 * @see http://schema.org/GameServerStatus Documentation on Schema.org
 */
class GameServerStatus extends Enum
{
    /**
     * @var string Game server status: Online. Server is available
     */
    const ONLINE = 'http://schema.org/Online';
    /**
     * @var string Game server status: OnlineFull. Server is online but unavailable. The maximum number of players has reached
     */
    const ONLINE_FULL = 'http://schema.org/OnlineFull';
    /**
     * @var string Game server status: OfflineTemporarily. Server is offline now but it can be online soon
     */
    const OFFLINE_TEMPORARILY = 'http://schema.org/OfflineTemporarily';
    /**
     * @var string Game server status: OfflinePermanently. Server is offline and not available
     */
    const OFFLINE_PERMANENTLY = 'http://schema.org/OfflinePermanently';
}
