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
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $this->enable([
            'onPageInitialized' => ['onPageInitialized', 0]
        ]);
    }
	
    public function onPageInitialized()
    {
        $pluginsobject = (array) $this->config->get('plugins');
        $pageobject = $this->grav['page'];
		if (isset($pluginsobject['onwebchat'])) {
            if ($pluginsobject['onwebchat']['enabled']) {
				$this->grav['assets']->addInlineJs('var onWebChat={ar:[], set: function(a,b){if (typeof onWebChat_==="undefined"){this.ar.push([a,b]);}else{onWebChat_.set(a,b);}},get:function(a){return(onWebChat_.get(a));},w:(function(){ var ga=document.createElement("script"); ga.type = "text/javascript";ga.async=1;ga.src="//www.onwebchat.com/clientchat/'.$this->config->get('plugins.onwebchat.chatid').'";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ga,s);})()}');
            }
        }
    }
}
