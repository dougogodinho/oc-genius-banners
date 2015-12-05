<?php namespace Genius\Banners;

use Backend\Facades\Backend;
use Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;

/**
 * Banners Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'genius.banners::lang.plugin.name',
            'description' => 'genius.banners::lang.plugin.description',
            'author'      => 'Genius',
            'icon'        => 'icon-leaf'
        ];
    }

    public function boot()
    {
        Event::listen('backend.menu.extendItems', function($manager) {
            $manager->addSideMenuItems('Genius.Base', 'models', [
                'banners' => [
                    'label' => 'genius.banners::lang.banners.menu_label',
                    'icon' => 'icon-picture-o',
                    'url' => Backend::url('genius/banners/banners'),
                    'order' => 20,
                ],
            ]);
        });
    }

}
