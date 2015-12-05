<?php namespace Genius\Banners\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Flash;
use Lang;
use Genius\Banners\Models\Banner;

/**
 * Banners Back-end Controller
 */
class Banners extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Genius.Base', 'models');
    }

    /**
     * Deleted checked banners.
     */
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $bannerId) {
                if (!$banner = Banner::find($bannerId)) continue;
                $banner->delete();
            }

            Flash::success(Lang::get('genius.banners::lang.banners.delete_selected_success'));
        }
        else {
            Flash::error(Lang::get('genius.banners::lang.banners.delete_selected_empty'));
        }

        return $this->listRefresh();
    }
}