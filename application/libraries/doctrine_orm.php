<?php

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\Mapping\Driver\DatabaseDriver,
    Doctrine\ORM\Tools\DisconnectedClassMetadataFactory,
    Doctrine\ORM\Tools\EntityGenerator,
    Doctrine\ORM\EntityManager;

class Doctrine_orm
{
    public $em;

    public function __construct()
    {
        // Load the database configuration from CodeIgniter
        require APPPATH . 'config/database.php';

        $connection_options = array(
            'driver'        => 'pdo_mysql',
            'user'          => $db['default']['username'],
            'password'      => $db['default']['password'],
            'host'          => $db['default']['hostname'],
            'dbname'        => $db['default']['database'],
            'charset'       => $db['default']['char_set'],
            'driverOptions' => array(
                'charset'   => $db['default']['char_set'],
            ),
        );

        // With this configuration, your model files need to be in application/models/Entity
        // e.g. Creating a new Entity\User loads the class from application/models/Entity/User.php
        $models_namespace = 'Entity';
        $models_path = APPPATH . 'models';
        $proxies_dir = APPPATH . 'models/proxies';
        $metadata_paths = array(APPPATH . 'models');

        // Set $dev_mode to TRUE to disable caching while you develop
        $config = Setup::createAnnotationMetadataConfiguration($metadata_paths, $dev_mode = true, $proxies_dir);
        $this->em = EntityManager::create($connection_options, $config);

        $loader = new ClassLoader($models_namespace, $models_path);
        $loader->register();

        //$this->generate_classes();
    }

    /**
    * generate entity objects automatically from mysql db tables
    * @return none
    */
    function generate_classes()
    {     
       
        $this->em->getConfiguration()
                 ->setMetadataDriverImpl(
                    new DatabaseDriver(
                            $this->em->getConnection()->getSchemaManager()
                    )
        );

        $cmf = new DisconnectedClassMetadataFactory();
        $cmf->setEntityManager($this->em);
        $metadata = $cmf->getAllMetadata();     
        $generator = new EntityGenerator();
         
        $generator->setUpdateEntityIfExists(true);
        $generator->setGenerateStubMethods(true);
        $generator->setGenerateAnnotations(true);
        $generator->generate($metadata, APPPATH."models/entities");
     
    }
}