<?php
namespace App\EventListener;


use phpDocumentor\Reflection\Types\Boolean;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
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
	    if(!$event->isMasterRequest()){
	        return;
        }
		$request = $event->getRequest();

		/*
		$request->attributes->set('_controller', function($slug = null){
		    dd($slug);

		    return new Response('I just took over the controller!');
        });
        */

		$userAgent = $request->headers->get('User-Agent');
		$this->logger->info(sprintf(
			'The User-Agent is "%s"',
			$userAgent
		));
		$request->attributes->set('_isMac', $this->isMac($request));
	}

	private function isMac(Request $request): bool {
      if($request->query->has('mac')){
        return $request->query->getBoolean('mac');
      }

      $userAgent = $request->headers->get('User-Agent');

      return stripos($userAgent, 'Linux') !== false;
    }
}