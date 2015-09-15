<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // nelmio_api_doc_index
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_nelmio_api_doc_index;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'nelmio_api_doc_index');
            }

            return array (  '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  '_route' => 'nelmio_api_doc_index',);
        }
        not_nelmio_api_doc_index:

        if (0 === strpos($pathinfo, '/security/token')) {
            // byexample_demo_securityrest_post_token_create
            if (0 === strpos($pathinfo, '/security/tokens/creates') && preg_match('#^/security/tokens/creates(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_demo_securityrest_post_token_create;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_securityrest_post_token_create')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\SecurityController::postTokenCreateAction',  '_format' => NULL,));
            }
            not_byexample_demo_securityrest_post_token_create:

            // byexample_demo_securityrest_get_token_destroy
            if (0 === strpos($pathinfo, '/security/token/destroy') && preg_match('#^/security/token/destroy(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_securityrest_get_token_destroy;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_securityrest_get_token_destroy')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\SecurityController::getTokenDestroyAction',  '_format' => NULL,));
            }
            not_byexample_demo_securityrest_get_token_destroy:

        }

        if (0 === strpos($pathinfo, '/api')) {
            // byexample_demo_userrest_get_user
            if (0 === strpos($pathinfo, '/api/users') && preg_match('#^/api/users/(?P<id>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_userrest_get_user;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_get_user')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::getUserAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_get_user:

            // byexample_demo_userrest_get_connected_user
            if (0 === strpos($pathinfo, '/api/connected') && preg_match('#^/api/connected(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_userrest_get_connected_user;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_get_connected_user')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::getConnectedUserAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_get_connected_user:

        }

        if (0 === strpos($pathinfo, '/users')) {
            // byexample_demo_userrest_put_note_item
            if (preg_match('#^/users/(?P<id>[^/]++)/note/item/(?P<id_item>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_byexample_demo_userrest_put_note_item;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_put_note_item')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::putNoteItemAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_put_note_item:

            // byexample_demo_userrest_get_note_item
            if (preg_match('#^/users/(?P<iduser>[^/]++)/note/item/(?P<id_item>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_userrest_get_note_item;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_get_note_item')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::getNoteItemAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_get_note_item:

            // byexample_demo_userrest_put_playlist
            if (preg_match('#^/users/(?P<id>[^/]++)/playlist/(?P<id_playlist>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_byexample_demo_userrest_put_playlist;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_put_playlist')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::putPlaylistAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_put_playlist:

            // byexample_demo_userrest_post_playlist
            if (preg_match('#^/users/(?P<id>[^/]++)/playlist(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_demo_userrest_post_playlist;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_post_playlist')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::postPlaylistAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_post_playlist:

            // byexample_demo_userrest_get_playlist
            if (preg_match('#^/users/(?P<id>[^/]++)/playlist(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_userrest_get_playlist;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_get_playlist')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::getPlaylistAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_get_playlist:

            // byexample_demo_userrest_post_users
            if (preg_match('#^/users(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_demo_userrest_post_users;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_post_users')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::postUsersAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_post_users:

        }

        // byexample_demo_userrest_put_user
        if (0 === strpos($pathinfo, '/api/users') && preg_match('#^/api/users/(?P<id>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'PUT') {
                $allow[] = 'PUT';
                goto not_byexample_demo_userrest_put_user;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_put_user')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::putUserAction',  '_format' => NULL,));
        }
        not_byexample_demo_userrest_put_user:

        if (0 === strpos($pathinfo, '/users')) {
            // byexample_demo_userrest_put_note_artiste
            if (preg_match('#^/users/(?P<id>[^/]++)/note/artiste/(?P<idArtiste>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_byexample_demo_userrest_put_note_artiste;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_put_note_artiste')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::putNoteArtisteAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_put_note_artiste:

            // byexample_demo_userrest_get_note_artiste
            if (preg_match('#^/users/(?P<iduser>[^/]++)/note/artiste/(?P<idArtiste>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_userrest_get_note_artiste;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_get_note_artiste')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::getNoteArtisteAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_get_note_artiste:

            // byexample_demo_userrest_post_friend
            if (preg_match('#^/users/(?P<id>[^/]++)/friends(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_demo_userrest_post_friend;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_post_friend')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::postFriendAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_post_friend:

            // byexample_demo_userrest_delete_friend
            if (preg_match('#^/users/(?P<id>[^/]++)/friends/(?P<idfriend>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_byexample_demo_userrest_delete_friend;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_delete_friend')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::deleteFriendAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_delete_friend:

            // byexample_demo_userrest_get_friends
            if (preg_match('#^/users/(?P<id>[^/]++)/friends(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_userrest_get_friends;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_get_friends')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::getFriendsAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_get_friends:

            // byexample_demo_userrest_get_item_by_action
            if (preg_match('#^/users/(?P<id>[^/]++)/action/(?P<id_action>[^/]++)/items(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_userrest_get_item_by_action;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_get_item_by_action')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::getItemByActionAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_get_item_by_action:

            // byexample_demo_userrest_get_token
            if (preg_match('#^/users/(?P<id>[^/]++)/rhapsody/new(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_userrest_get_token;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_get_token')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::getTokenAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_get_token:

            // byexample_demo_userrest_put_refresh_token
            if (preg_match('#^/users/(?P<id>[^/]++)/rhapsody/refresh(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_byexample_demo_userrest_put_refresh_token;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_userrest_put_refresh_token')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\UserRestController::putRefreshTokenAction',  '_format' => NULL,));
            }
            not_byexample_demo_userrest_put_refresh_token:

        }

        if (0 === strpos($pathinfo, '/genres')) {
            // byexample_genres_get_genres
            if (preg_match('#^/genres(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_genres_get_genres;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_genres_get_genres')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\GenreRestController::getGenresAction',  '_format' => NULL,));
            }
            not_byexample_genres_get_genres:

            // byexample_genres_get_search_genres
            if (preg_match('#^/genres/(?P<key>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_genres_get_search_genres;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_genres_get_search_genres')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\GenreRestController::getSearchGenresAction',  '_format' => NULL,));
            }
            not_byexample_genres_get_search_genres:

        }

        if (0 === strpos($pathinfo, '/items')) {
            // byexample_items_update_view_item
            if (preg_match('#^/items/(?P<idItem>[^/]++)/vues/(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_update_view_item;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_update_view_item')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::updateViewItemAction',  '_format' => NULL,));
            }
            not_byexample_items_update_view_item:

            // byexample_items_search_item_grooveshark
            if (0 === strpos($pathinfo, '/items/grooveshark/search') && preg_match('#^/items/grooveshark/search/(?P<key>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_search_item_grooveshark;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_search_item_grooveshark')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::searchItemGroovesharkAction',  '_format' => NULL,));
            }
            not_byexample_items_search_item_grooveshark:

            // byexample_items_add_item_artiste
            if (preg_match('#^/items(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_items_add_item_artiste;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_add_item_artiste')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::addItemArtisteAction',  '_format' => NULL,));
            }
            not_byexample_items_add_item_artiste:

            // byexample_items_get_item
            if (preg_match('#^/items/(?P<id>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_item;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_item')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getItemAction',  '_format' => NULL,));
            }
            not_byexample_items_get_item:

            // byexample_items_get_items_search
            if (0 === strpos($pathinfo, '/items/search') && preg_match('#^/items/search/(?P<key>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_items_search;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_items_search')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getItemsSearchAction',  '_format' => NULL,));
            }
            not_byexample_items_get_items_search:

            // byexample_items_get_items_popular
            if (0 === strpos($pathinfo, '/items/get/popular') && preg_match('#^/items/get/popular(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_items_popular;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_items_popular')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getItemsPopularAction',  '_format' => NULL,));
            }
            not_byexample_items_get_items_popular:

            // byexample_items_get_item_tags
            if (preg_match('#^/items/(?P<id>[^/]++)/tags(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_item_tags;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_item_tags')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getItemTagsAction',  '_format' => NULL,));
            }
            not_byexample_items_get_item_tags:

            // byexample_items_get_item_genre
            if (0 === strpos($pathinfo, '/items/genre') && preg_match('#^/items/genre/(?P<idGenre>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_item_genre;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_item_genre')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getItemGenreAction',  '_format' => NULL,));
            }
            not_byexample_items_get_item_genre:

            // byexample_items_get_item_artiste
            if (0 === strpos($pathinfo, '/items/artiste') && preg_match('#^/items/artiste/(?P<idArtiste>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_item_artiste;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_item_artiste')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getItemArtisteAction',  '_format' => NULL,));
            }
            not_byexample_items_get_item_artiste:

            // byexample_items_get_item_echonest
            if (0 === strpos($pathinfo, '/items/echonest') && preg_match('#^/items/echonest(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_item_echonest;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_item_echonest')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getItemEchonestAction',  '_format' => NULL,));
            }
            not_byexample_items_get_item_echonest:

            // byexample_items_get_genres_item
            if (0 === strpos($pathinfo, '/items/getgenres') && preg_match('#^/items/getgenres/(?P<idArtist>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_genres_item;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_genres_item')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getGenresItemAction',  '_format' => NULL,));
            }
            not_byexample_items_get_genres_item:

            // byexample_items_get_album_by_artiste
            if (0 === strpos($pathinfo, '/items/albums') && preg_match('#^/items/albums/(?P<idArtiste>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_album_by_artiste;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_album_by_artiste')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getAlbumByArtisteAction',  '_format' => NULL,));
            }
            not_byexample_items_get_album_by_artiste:

        }

        if (0 === strpos($pathinfo, '/users')) {
            // byexample_items_put_note_tag_item
            if (preg_match('#^/users/(?P<iduser>[^/]++)/items/(?P<idItem>[^/]++)/tags/(?P<idTag>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_byexample_items_put_note_tag_item;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_put_note_tag_item')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::putNoteTagItemAction',  '_format' => NULL,));
            }
            not_byexample_items_put_note_tag_item:

            // byexample_items_get_note_tag_item
            if (preg_match('#^/users/(?P<iduser>[^/]++)/items/(?P<idItem>[^/]++)/tags/(?P<idTag>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_note_tag_item;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_note_tag_item')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getNoteTagItemAction',  '_format' => NULL,));
            }
            not_byexample_items_get_note_tag_item:

        }

        if (0 === strpos($pathinfo, '/items/xbox/s')) {
            // byexample_items_get_search_xbox
            if (0 === strpos($pathinfo, '/items/xbox/search') && preg_match('#^/items/xbox/search(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_search_xbox;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_search_xbox')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getSearchXboxAction',  '_format' => NULL,));
            }
            not_byexample_items_get_search_xbox:

            if (0 === strpos($pathinfo, '/items/xbox/streaming')) {
                // byexample_items_get_xbox
                if (preg_match('#^/items/xbox/streaming(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_byexample_items_get_xbox;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_xbox')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getXboxAction',  '_format' => NULL,));
                }
                not_byexample_items_get_xbox:

                // byexample_items_post_xbox_authorization
                if (preg_match('#^/items/xbox/streaming(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_byexample_items_post_xbox_authorization;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_post_xbox_authorization')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::postXboxAuthorizationAction',  '_format' => NULL,));
                }
                not_byexample_items_post_xbox_authorization:

                // byexample_items_get_xbox_streaming
                if (preg_match('#^/items/xbox/streaming/(?P<iditem>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_byexample_items_get_xbox_streaming;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_xbox_streaming')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ItemRestController::getXboxStreamingAction',  '_format' => NULL,));
                }
                not_byexample_items_get_xbox_streaming:

            }

        }

        if (0 === strpos($pathinfo, '/artistes')) {
            // byexample_artistes_get_artiste
            if (preg_match('#^/artistes/(?P<id>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_artistes_get_artiste;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_artistes_get_artiste')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ArtisteRestController::getArtisteAction',  '_format' => NULL,));
            }
            not_byexample_artistes_get_artiste:

            // byexample_artistes_get_artistes
            if (preg_match('#^/artistes(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_artistes_get_artistes;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_artistes_get_artistes')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ArtisteRestController::getArtistesAction',  '_format' => NULL,));
            }
            not_byexample_artistes_get_artistes:

            // byexample_artistes_get_artistes_search
            if (0 === strpos($pathinfo, '/artistes/search') && preg_match('#^/artistes/search/(?P<keyword>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_artistes_get_artistes_search;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_artistes_get_artistes_search')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ArtisteRestController::getArtistesSearchAction',  '_format' => NULL,));
            }
            not_byexample_artistes_get_artistes_search:

        }

        if (0 === strpos($pathinfo, '/users')) {
            // byexample_items_update_token_index_item
            if (preg_match('#^/users/(?P<id>[^/]++)/playlist/(?P<id_playlist>[^/]++)/items(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_byexample_items_update_token_index_item;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_update_token_index_item')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\PlaylistRestController::updateIndexItemAction',  '_format' => NULL,));
            }
            not_byexample_items_update_token_index_item:

            // byexample_items_get_token_playlists
            if (preg_match('#^/users/(?P<id>[^/]++)/playlist/(?P<id_playlist>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_token_playlists;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_token_playlists')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\PlaylistRestController::getPlaylistsAction',  '_format' => NULL,));
            }
            not_byexample_items_get_token_playlists:

            // byexample_items_get_token_playlist_tags
            if (preg_match('#^/users/(?P<id>[^/]++)/playlists/(?P<id_playlist>[^/]++)/tags(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_token_playlist_tags;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_token_playlist_tags')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\PlaylistRestController::getPlaylistTagsAction',  '_format' => NULL,));
            }
            not_byexample_items_get_token_playlist_tags:

            // byexample_items_get_token_playlist_tag
            if (preg_match('#^/users/(?P<id>[^/]++)/playlists/(?P<id_playlist>[^/]++)/tags(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_items_get_token_playlist_tag;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_token_playlist_tag')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\PlaylistRestController::getPlaylistTagAction',  '_format' => NULL,));
            }
            not_byexample_items_get_token_playlist_tag:

            // byexample_items_delete_token_playlist_tag
            if (preg_match('#^/users/(?P<id>[^/]++)/playlists/(?P<id_playlist>[^/]++)/tags/(?P<idtag>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_byexample_items_delete_token_playlist_tag;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_delete_token_playlist_tag')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\PlaylistRestController::deletePlaylistTagAction',  '_format' => NULL,));
            }
            not_byexample_items_delete_token_playlist_tag:

            // byexample_items_delete_token_playlist
            if (preg_match('#^/users/(?P<id>[^/]++)/playlist/(?P<id_playlist>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_byexample_items_delete_token_playlist;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_delete_token_playlist')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\PlaylistRestController::deletePlaylistAction',  '_format' => NULL,));
            }
            not_byexample_items_delete_token_playlist:

            // byexample_items_post_token_playlist_item
            if (preg_match('#^/users/(?P<id>[^/]++)/playlist/(?P<id_playlist>[^/]++)/items(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_items_post_token_playlist_item;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_post_token_playlist_item')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\PlaylistRestController::postPlaylistItemAction',  '_format' => NULL,));
            }
            not_byexample_items_post_token_playlist_item:

            // byexample_items_delete_token_playlist_item
            if (preg_match('#^/users/(?P<id>[^/]++)/playlist/(?P<id_playlist>[^/]++)/items/(?P<iditem>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_byexample_items_delete_token_playlist_item;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_delete_token_playlist_item')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\PlaylistRestController::deletePlaylistItemAction',  '_format' => NULL,));
            }
            not_byexample_items_delete_token_playlist_item:

            // byexample_demo_sessionrest_getitemsbysession
            if (preg_match('#^/users/(?P<id>[^/]++)/sessions/(?P<id_session>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_sessionrest_getitemsbysession;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_sessionrest_getitemsbysession')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\SessionRestController::getItemsBySessionAction',));
            }
            not_byexample_demo_sessionrest_getitemsbysession:

            // byexample_demo_sessionrest_getsessions
            if (preg_match('#^/users/(?P<id>[^/]++)/sessions$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_sessionrest_getsessions;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_sessionrest_getsessions')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\SessionRestController::getSessionsAction',));
            }
            not_byexample_demo_sessionrest_getsessions:

            // byexample_demo_sessionrest_gettagsbysession
            if (preg_match('#^/users/(?P<id>[^/]++)/sessions/(?P<id_session>[^/]++)/tags$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_demo_sessionrest_gettagsbysession;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_sessionrest_gettagsbysession')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\SessionRestController::getTagsBySessionAction',));
            }
            not_byexample_demo_sessionrest_gettagsbysession:

            // byexample_demo_sessionrest_addsessiontag
            if (preg_match('#^/users/(?P<id>[^/]++)/sessions/(?P<id_session>[^/]++)/tags$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_demo_sessionrest_addsessiontag;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_sessionrest_addsessiontag')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\SessionRestController::addSessionTagAction',));
            }
            not_byexample_demo_sessionrest_addsessiontag:

            // byexample_demo_sessionrest_deletesessiontag
            if (preg_match('#^/users/(?P<id>[^/]++)/sessions/(?P<id_session>[^/]++)/tags/(?P<idTag>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_byexample_demo_sessionrest_deletesessiontag;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_sessionrest_deletesessiontag')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\SessionRestController::deleteSessionTagAction',));
            }
            not_byexample_demo_sessionrest_deletesessiontag:

            // byexample_demo_sessionrest_getlastecoute
            if (preg_match('#^/users/(?P<id>[^/]++)/session/end$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_byexample_demo_sessionrest_getlastecoute;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_demo_sessionrest_getlastecoute')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\SessionRestController::getLastEcouteAction',));
            }
            not_byexample_demo_sessionrest_getlastecoute:

            // byexample_items_add_token_ecoute
            if (preg_match('#^/users/(?P<id>[^/]++)/ecoute(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_items_add_token_ecoute;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_add_token_ecoute')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\EcouteRestController::addEcouteAction',  '_format' => NULL,));
            }
            not_byexample_items_add_token_ecoute:

            // byexample_items_get_token_sessions
            if (preg_match('#^/users/(?P<id>[^/]++)/ecoute(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_token_sessions;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_token_sessions')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\EcouteRestController::getSessionsAction',  '_format' => NULL,));
            }
            not_byexample_items_get_token_sessions:

            // byexample_items_add_token_interaction
            if (preg_match('#^/users/(?P<id>[^/]++)/interaction(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_items_add_token_interaction;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_add_token_interaction')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\InteractionRestController::addInteractionAction',  '_format' => NULL,));
            }
            not_byexample_items_add_token_interaction:

        }

        if (0 === strpos($pathinfo, '/note')) {
            // byexample_notes_get_note_artiste
            if (0 === strpos($pathinfo, '/note/artiste') && preg_match('#^/note/artiste/(?P<idArtiste>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_notes_get_note_artiste;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_notes_get_note_artiste')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\NoteRestController::getNoteArtisteAction',  '_format' => NULL,));
            }
            not_byexample_notes_get_note_artiste:

            // byexample_notes_get_note_item
            if (0 === strpos($pathinfo, '/note/item') && preg_match('#^/note/item/(?P<idItem>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_notes_get_note_item;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_notes_get_note_item')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\NoteRestController::getNoteItemAction',  '_format' => NULL,));
            }
            not_byexample_notes_get_note_item:

        }

        if (0 === strpos($pathinfo, '/users')) {
            // byexample_items_add_token_action
            if (preg_match('#^/users/(?P<id>[^/]++)/action(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_items_add_token_action;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_add_token_action')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ActionRestController::addActionAction',  '_format' => NULL,));
            }
            not_byexample_items_add_token_action:

            // byexample_items_get_token_actions
            if (preg_match('#^/users/(?P<id>[^/]++)/actions/(?P<iditem>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_items_get_token_actions;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_items_get_token_actions')), array (  '_controller' => 'ByExample\\DemoBundle\\Controller\\ActionRestController::getActionsAction',  '_format' => NULL,));
            }
            not_byexample_items_get_token_actions:

        }

        if (0 === strpos($pathinfo, '/algorithms')) {
            // byexample_algorithm_update_algorithm
            if (preg_match('#^/algorithms(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_byexample_algorithm_update_algorithm;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_algorithm_update_algorithm')), array (  '_controller' => 'ByExample\\RecommandationsBundle\\Controller\\AlgorithmController::updateAlgorithmAction',  '_format' => NULL,));
            }
            not_byexample_algorithm_update_algorithm:

            // byexample_algorithm_get_algorithms
            if (preg_match('#^/algorithms(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_algorithm_get_algorithms;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_algorithm_get_algorithms')), array (  '_controller' => 'ByExample\\RecommandationsBundle\\Controller\\AlgorithmController::getAlgorithmsAction',  '_format' => NULL,));
            }
            not_byexample_algorithm_get_algorithms:

        }

        if (0 === strpos($pathinfo, '/tests')) {
            // byexample_test_get_tests
            if (preg_match('#^/tests(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_test_get_tests;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_test_get_tests')), array (  '_controller' => 'ByExample\\RecommandationsBundle\\Controller\\TestController::getTestsAction',  '_format' => NULL,));
            }
            not_byexample_test_get_tests:

            // byexample_test_get_current_test
            if (0 === strpos($pathinfo, '/tests/current') && preg_match('#^/tests/current/(?P<iduser>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_test_get_current_test;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_test_get_current_test')), array (  '_controller' => 'ByExample\\RecommandationsBundle\\Controller\\TestController::getCurrentTestAction',  '_format' => NULL,));
            }
            not_byexample_test_get_current_test:

        }

        // byexample_test_get_verify_group
        if (0 === strpos($pathinfo, '/groups/verify') && preg_match('#^/groups/verify(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_byexample_test_get_verify_group;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_test_get_verify_group')), array (  '_controller' => 'ByExample\\RecommandationsBundle\\Controller\\TestController::getVerifyGroupAction',  '_format' => NULL,));
        }
        not_byexample_test_get_verify_group:

        if (0 === strpos($pathinfo, '/tests')) {
            // byexample_test_post_test
            if (preg_match('#^/tests(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_byexample_test_post_test;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_test_post_test')), array (  '_controller' => 'ByExample\\RecommandationsBundle\\Controller\\TestController::postTestAction',  '_format' => NULL,));
            }
            not_byexample_test_post_test:

            // byexample_test_get_end_test
            if (preg_match('#^/tests/(?P<idtest>[^/]++)/end(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_byexample_test_get_end_test;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_test_get_end_test')), array (  '_controller' => 'ByExample\\RecommandationsBundle\\Controller\\TestController::getEndTestAction',  '_format' => NULL,));
            }
            not_byexample_test_get_end_test:

        }

        // byexample_recommandation_get_recommandation
        if (0 === strpos($pathinfo, '/users') && preg_match('#^/users/(?P<iduser>[^/]++)/recommandations(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_byexample_recommandation_get_recommandation;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_recommandation_get_recommandation')), array (  '_controller' => 'ByExample\\RecommandationsBundle\\Controller\\RecommandationController::getRecommandationAction',  '_format' => NULL,));
        }
        not_byexample_recommandation_get_recommandation:

        // byexample_recommandation_get_recommandations
        if (0 === strpos($pathinfo, '/recommandations') && preg_match('#^/recommandations(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_byexample_recommandation_get_recommandations;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'byexample_recommandation_get_recommandations')), array (  '_controller' => 'ByExample\\RecommandationsBundle\\Controller\\RecommandationController::getRecommandationsAction',  '_format' => NULL,));
        }
        not_byexample_recommandation_get_recommandations:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
