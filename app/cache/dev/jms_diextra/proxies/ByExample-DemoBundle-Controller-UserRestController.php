<?php

namespace EnhancedProxy3920a9f5_541efc166f8577e5ebfce132290480d81073446f\__CG__\ByExample\DemoBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class UserRestController extends \ByExample\DemoBundle\Controller\UserRestController
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