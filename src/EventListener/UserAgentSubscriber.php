<?php
namespace App\EventListener;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class UserAgentSubscriber implements EventSubscriberInterface {
	public static function getSubscribedEvents() {
		return [
		  RequestEvent::class => 'onKernelRequest'
		];
	}

	public function onKernelRequest(){
		dd('it\'s alive!!!');
	}
}