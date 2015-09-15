<?php

namespace EnhancedProxy96881c9f_1b792b6620b9b37a2d0209b9293382972075d48e\__CG__\ByExample\DemoBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class UserRestController extends \EnhancedProxy96881c9f_541efc166f8577e5ebfce132290480d81073446f\__CG__\ByExample\DemoBundle\Controller\UserRestController
{
    private $__CGInterception__loader;

    public function getUserAction($id)
    {
        $ref = new \ReflectionMethod('ByExample\\DemoBundle\\Controller\\UserRestController', 'getUserAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function getConnectedUserAction()
    {
        $ref = new \ReflectionMethod('ByExample\\DemoBundle\\Controller\\UserRestController', 'getConnectedUserAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}