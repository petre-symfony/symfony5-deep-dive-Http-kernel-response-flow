<?php
namespace App\EventListener;


use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class UserAgentSubscriber implements EventSubscriberInterface {
	private LoggerInterface $logger;

	public function __construct(LoggerInterface $logger) {
		$this->logger = $logger;
	}

	public static function getSubscribedEvents() {
		return [
		  RequestEvent::class => 'onKernelRequest'
		];
	}

	public function onKernelRequest(RequestEvent $event){
		$event->setResponse(new Response(
			'Ah, ah, ah: you didn\'t say the magic word'
		));
		$request = $event->getRequest();

		$userAgent = $request->headers->get('User-Agent');
		$this->logger->info(sprintf(
			'The User-Agent is "%s"',
			$userAgent
		));
	}
}