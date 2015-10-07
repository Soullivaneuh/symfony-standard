<?php

namespace AppBundle\DBAL\Platforms;

use Doctrine\DBAL\Platforms\MySqlPlatform as BaseMySqlPlatform;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class MySqlPlatform extends BaseMySqlPlatform
{
    /**
     * {@inheritdoc}
     *
     * Have to manually deactivate foreign_key_check by overriding.
     *
     * @link https://github.com/doctrine/data-fixtures/issues/113#issuecomment-144950542
     */
    public function getTruncateTableSQL($tableName, $cascade = false)
    {
        return sprintf('SET foreign_key_checks = 0; TRUNCATE %s; SET foreign_key_checks = 1;', $tableName);
    }
}
