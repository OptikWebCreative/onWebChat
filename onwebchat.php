<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

class onWebChatPlugin extends Plugin
{
    public static function getSubscribedEvents() {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
        ];
    }

    public function onPluginsInitialized()
    {
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $this->enable([
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
        ]);
    }

    /**
     * Add current directory to twig lookup paths.
     */
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    /**
     * if enabled on this page, load the JS + CSS theme.
     */
    public function onTwigSiteVariables()
    {
        $type = strtolower($this->config->get('plugins.onwebchat.chatid'));
        if (empty($type)){
            throw new \InvalidArgumentException('A ChatID must be defined. At the moment it is empty. Without a ChatID you will not be able to connect to your Chat Box');
        }
        
        $twig->twig_vars['onwebchat'] = $twig->twig->render('partials/onwebchat.html.twig');
    }
}
