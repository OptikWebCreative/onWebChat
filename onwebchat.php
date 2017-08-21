<?php
namespace Grav\Plugin;

use Grav\Common\Grav;
use Grav\Common\Plugin;

class onWebChatPlugin extends Plugin
{
    public static function getSubscribedEvents() {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    public function onPluginsInitialized()
    {
		$pluginsobject = (array) $this->config->get('plugins');
		$enabled = (isset($pluginsobject['onwebchat']) && $pluginsobject['onwebchat']['enabled']);

        if ($this->isAdmin() || !$enabled) {
            $this->active = false;
            return;
        }

		$this->enable([
			'onPageInitialized' => ['onPageInitialized', 0]
		]);
    }

    public function onPageInitialized()
    {
        $pageobject = $this->grav['page'];

        if(isset($pageobject->header()->onwebchat)) {
			$activate = $pageobject->header()->onwebchat;
		}
		else {
			$activate = $this->config->get('plugins.onwebchat.active_default');
		}

		if ($activate) {
			$this->grav['assets']->addInlineJs('var onWebChat={ar:[], set: function(a,b){if (typeof onWebChat_==="undefined"){this.ar.push([a,b]);}else{onWebChat_.set(a,b);}},get:function(a){return(onWebChat_.get(a));},w:(function(){ var ga=document.createElement("script"); ga.type = "text/javascript";ga.async=1;ga.src="//www.onwebchat.com/clientchat/'.$this->config->get('plugins.onwebchat.chatid').'";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ga,s);})()}');
		}
    }
}
