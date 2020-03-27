<?php
namespace App\EventListener;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserAgentSubscriber implements EventSubscriberInterface {
	public static function getSubscribedEvents() {
		return [
		  'kernel.request' => 'onKernelRequest'
		];
	}
}