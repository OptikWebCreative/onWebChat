# Grav OnWebChat Live Chat Box Plugin

`OnWebChat Live Chat Box` is a [GRAV](http://www.getgrav.org) Plugin and allows to integrate live chat functionality on page, to use this, you will need an account at [OnWebChat](http://www.onwebchat.com) Free Accounts are available.

The full documentation is available at the [developer's website](http://www.optikwebcreative.com/blog/grav-onwebchat-plugin)

OnWebChat Live Chat Plugin works with Gantry5 on GRAV too :)

We strongly recommend that you create your account at [onWebChat](http://www.onwebchat.com?target=_blank) **before** you install the onWebChat Plugin for [GRAV](http://www.getgrav.org?target=_blank).  You can choose either a free account or a paid account whichever has the features that fit your needs best.

# 1. Installing onWebChat Plugin

Follow these instructions to install the onWebChat plugin

## a. Install onWebChat Plugin

Install the onWebChat Plugin from GPM.

#### From Command Line

Type:

```
$ bin/gpm install onwebchat
```

#### From The Admin Interface GUI

## b. Configure onWebChat Plugin

Add the ChatId from your OnWebChat control panel into the admin panel or the onwebchat.yaml file.

## c. Enable onWebChat Plugin

Browse to your website and you will have your onWebChat plugin enabled and visible for your website users to contact you (or your client)

onWebChat is by default enabled on ***all*** pages of your GRAV website. If you want to change the default status for all pages, change the field "_Active on pages by default_" or set `active_default` in onwebchat.yaml

# 2. Controlling onWebChat Plugin

You can toggle the onWebChat plugin for specific pages by adding a line to their frontmatter. The default behaviour, without this line, is determined by the value of the plugin configuration `active_default` (or "_Active on pages by default_" in the Admin plugin dashboard).

To achieve this, you need to add one of the following lines to the frontmatter of the pages that you want to set individually:

```
onwebchat: false
```

_or_

```
onwebchat: true
```

We have disabled the plugin using this code on the [Contact](http://www.optikwebcreative.com/contact) page.

### Acknowledgements

Optik Web Creative would like to thank the onWebChat for permission to create this plugin.

Optik Web Creative would also like to thank the [GRAV Gitter Community](https://gitter.im/getgrav/grav?target=_blank) for valuable assistance with bug-testing and problem resolution.

