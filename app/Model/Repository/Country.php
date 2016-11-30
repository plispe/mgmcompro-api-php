<?php

namespace App\Model\Repository;

use CCMBenchmark\Ting\Repository\Metadata;
use CCMBenchmark\Ting\Repository\MetadataInitializer;
use CCMBenchmark\Ting\Serializer\SerializerFactoryInterface;

/**
 * Class CountryRepository
 * @package App\Model\Repository
 * @author Petr Pliska <petr.pliska@post.cz>
 */
class Country extends \CCMBenchmark\Ting\Repository\Repository implements MetadataInitializer
{
    /**
     * @param SerializerFactoryInterface $serializerFactory
     * @param array $options
     * @return Metadata
     */
    public static function initMetadata(SerializerFactoryInterface $serializerFactory, array $options = [])
    {
        $metadata = new Metadata($serializerFactory);

        $metadata->setEntity(\App\Model\Entity\Country::class);
        $metadata->setConnectionName('main');
        $metadata->setDatabase('heroku_44a071ce1e8ee67');
        $metadata->setTable('t_country_cou');

        $metadata->addField([
            'primary' => true,
            'autoincrement' => true,
            'fieldName' => 'code',
            'columnName' => 'cou_code',
            'type' => 'int'
        ]);

        $metadata->addField([
            'fieldName' => 'name',
            'columnName' => 'cou_name',
            'type' => 'string'
        ]);

        $metadata->addField([
            'fieldName' => 'continent',
            'columnName' => 'cou_continent',
            'type' => 'string'
        ]);

        $metadata->addField([
            'fieldName' => 'region',
            'columnName' => 'cou_region',
            'type' => 'string'
        ]);

        $metadata->addField([
            'fieldName' => 'president',
            'columnName' => 'cou_head_of_state',
            'type' => 'string'
        ]);

        return $metadata;
    }
}
