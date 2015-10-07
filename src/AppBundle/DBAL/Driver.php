<?php

namespace AppBundle\DBAL;

use AppBundle\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Driver\PDOMySql\Driver as BaseDriver;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class Driver extends BaseDriver
{
    /**
     * {@inheritdoc}
     */
    public function getDatabasePlatform()
    {
        return new MySqlPlatform();
    }
}
