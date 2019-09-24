<?php
	require getcwd().'/vendor/autoload.php';

	$Kafka = new RdKafka\Consumer();
	$Kafka->setLogLevel(LOG_DEBUG);
	$Kafka->addBrokers( "149.129.252.13" );
	$Topic = $Kafka->newTopic( "testing" );
	$Topic->consumeStart( 0, RD_KAFKA_OFFSET_BEGINNING );
	while ( true ) {
		$message = $Topic->consume( 0, 1000 );
		if ( null === $message ) {
			continue;
		} elseif ( $message->err ) {
			echo $message->errstr(), "\n";
			break;
		} else {
			$payload = json_decode( $message->payload, true );
			print_r($payload);
		}
	}