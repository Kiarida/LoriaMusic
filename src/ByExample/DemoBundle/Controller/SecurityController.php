<?php

/**
 * This file is part of the FOSRestByExample package.
 *
 * (c) Santiago Diaz <santiago.diaz@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace ByExample\DemoBundle\Controller;

use ByExample\DemoBundle\Entity\User;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\Prefix;
use FOS\RestBundle\Controller\Annotations\NamePrefix;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\View\View AS FOSView;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;

/**
 * Controller that provides Restfuls security functions.
 *
 * @Prefix("/security")
 * @NamePrefix("byexample_demo_securityrest_")
 * @author Santiago Diaz <santiago.diaz@me.com>
 */
class SecurityController extends Controller
{

    /**
     * WSSE Token generation
     *
     * @return FOSView
     * @throws AccessDeniedException
     * @ApiDoc()
     */
    public function postTokenCreateAction()
    {

        $view = FOSView::create();
        $request = $this->getRequest();

        $username = $request->get('_username');
        $password = $request->get('_password');

        //$csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');
        //$data = array('csrf_token' => $csrfToken,);

        $um = $this->get('fos_user.user_manager');
        $user = $um->findUserByUsernameOrEmail($username);

        if (!$user instanceof User) {
            return $view->setStatusCode(400)->setData(array("status"=>"error", "message"=>"Wrong username"));
        }
        $encoder = $this->get('security.encoder_factory')->getEncoder($user);
        if(!$encoder->isPasswordValid($user->getPassword(),$password,$user->getSalt())){
            return $view->setStatusCode(400)->setData(array("status"=>"error", "message"=>"Wrong password"));
        }

        $password = $user->getPassword();
        $utilisateur = $this->getDoctrine()->getRepository('ByExampleDemoBundle:Utilisateur')->findOneById($user->getId());

        

        $created = date('c');
        $nonce = substr(md5(uniqid('nonce_', true)), 0, 16);
        $nonceHigh = base64_encode($nonce);
        $passwordDigest = base64_encode(sha1($nonce . $created . $password, true));
        $header = "UsernameToken Username=\"{$username}\", PasswordDigest=\"{$passwordDigest}\", Nonce=\"{$nonceHigh}\", Created=\"{$created}\"";
        $auth = 'WSSE profile="'.$username.'"';
        $view->setHeader("Authorization", 'WSSE profile="UsernameToken"');
        $view->setHeader("X-WSSE", "UsernameToken Username=\"{$username}\", PasswordDigest=\"{$passwordDigest}\", Nonce=\"{$nonceHigh}\", Created=\"{$created}\"");
        if($utilisateur){
            $data = array('WSSE' => $header, "auth" => $auth, "email" => $user->getEmail(), "country"=> $utilisateur->getPays(), "id"=>$user->getId(), "username" => $user->getUsername(), "role" => $user->getRoles());

        }
        else{
            $data = array('WSSE' => $header, "auth" => $auth, "email" => $user->getEmail(), "id"=>$user->getId(), "username" => $user->getUsername(), "role" => $user->getRoles());

        }
        $view->setStatusCode(200)->setData($data);
        return $view;
    }

  /**
     * WSSE Token Remove
     *
     * @return FOSView
     * @ApiDoc()
     */
    public function getTokenDestroyAction()
    {
        $view = FOSView::create();
        $security = $this->get('security.context');
        $token = new AnonymousToken(null, new User());
        $security->setToken($token);
        $this->get('session')->invalidate();
        $view->setStatusCode(200)->setData('Logout successful');
        return $view;
    }
}
