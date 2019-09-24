<?php
    require getcwd().'/vendor/autoload.php';

    $config = \Kafka\ConsumerConfig::getInstance();
    $config->setMetadataRefreshIntervalMs(10000);
    $config->setMetadataBrokerList('149.129.252.13:9092');
    $config->setGroupId('ferdinand_topic_ebcc');
    $config->setBrokerVersion('1.0.0');
    $config->setTopics(['ferdinand_topic_ebcc']);
    $consumer = new \Kafka\Consumer();

    $consumer->start(function($topic, $part, $message) {
        var_dump($message);
    });
