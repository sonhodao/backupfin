<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Menu;
use Cache;
use App\Models\Option;
use App\Models\Category;
use App\Models\HomeText;
use App\Models\TextLink;
use App\Services\BannerService;

class NavigationComposer
{
    protected $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }
    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view): void
    {
        $navigation = [
            [
                'name' => __('Dashboard'),
                'link' => route('dashboard'),
                'icon' => 'fa-tachometer-alt',
                'permission' => 'dashboard.index',
            ],
            [
                'name' => __('Posts Manager'),
                'link' => '#',
                'icon' => 'fa-newspaper',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('posts.index'),
                        'permission' => 'posts.index',
                        'include'=>[
                            'posts.edit',
                            'posts.delete.list',
                            ]
                    ],
                    [
                        'name' => __('Add'),
                        'link' => route('posts.create'),
                        'permission' => 'posts.store',
                    ],
                    [
                        'name' => __('Category'),
                        'link' => route('categories.index'),
                        'permission' => 'categories.index',
                    ],
                ],
            ],
            [
                'name' => __('Ads Manager'),
                'link' => '#',
                'icon' => 'fa-car',
                'children' => [
                    [
                        'name' => __('List of sliders'),
                        'link' => route('sliders.index'),
                        'permission' => 'sliders.index',
                        'include' => [
                            'sliders.edit',
                        ],
                    ],
                    [
                        'name' => __('Create slider'),
                        'link' => route('sliders.create'),
                        'permission' => 'sliders.store',
                    ],

                    [
                        'name' => __('List of banners'),
                        'link' => route('banners.index'),
                        'permission' => 'banners.index',
                        'include' => [
                            'banners.edit',
                        ],
                    ],
                    [
                        'name' => __('Create banner'),
                        'link' => route('banners.create'),
                        'permission' => 'banners.store',
                    ],
                ],
            ],
            [
                'name' => __('Pages Manager'),
                'link' => '#',
                'icon' => 'fa-external-link-alt',
                'children' => [
                    [
                        'name' => __('List of pages'),
                        'link' => route('pages.index'),
                        'permission' => 'pages.index',
                    ],
                    [
                        'name' => __('Create Page'),
                        'link' => route('pages.create'),
                        'permission' => 'pages.store',
                    ],
                ],
            ],
            [
                'name' => __('Seo Manager'),
                'link' => '#',
                'icon' => 'fa-filter',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('seos.index', ['model'=>'App\\Models\\Post']),
                        'permission' => 'seos.index',
                        'include' => ['seos.index','seos.edit'],
                    ],

                ],
            ],
            [
                'name' => __('Text Link Manager'),
                'link' => '#',
                'icon' => 'fa-link',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('text_links.index'),
                        'permission' => 'text_links.index',
                    ],
                    [
                        'name' => __('text_links.store'),
                        'link' => route('text_links.create'),
                        'permission' => 'text_links.store',
                        'include' => [
                            'text_links.edit',
                        ],
                    ],
                ],
            ],
            [
                'name' => __('Redirections Manager'),
                'link' => '#',
                'icon' => 'fa-forward',
                'children' => [
                    [
                        'name' => __('List of redirections'),
                        'link' => route('redirections.index'),
                        'permission' => 'redirections.index',
                    ],
                    [
                        'name' => __('redirections.store'),
                        'link' => route('redirections.create'),
                        'permission' => 'redirections.store',
                    ],
                ],
            ],
            [
                'name' => __('Home Text Manager'),
                'link' => route('home_texts.index'),
                'icon' => 'fa-align-right',
                'permission' => 'home_texts.index',
                'include' => [
                    'home_texts.update',
                ],
            ],
            [
                'name' => __('Reviews Manager'),
                'link' => route('reviews.index'),
                'icon' => 'fa-comments',
                'permission' => 'reviews.index',
                'include' => [
                    'reviews.create',
                    'reviews.edit',
                ],
            ],
            [
                'name' => __('Media'),
                'link' => route('media.index'),
                'icon' => 'fa-image',
                'permission' => 'media.index',
            ],
            [
                'name' => __('System Settings'),
                'link' => '#',
                'icon' => 'fa-cog',
                'children' => [
                    [
                        'name' => __('Setting'),
                        'link' => route('settings.index'),
                        'permission' => 'settings.index',
                    ],
                    [
                        'name' => __('System logs'),
                        'link' => route('settings.log'),
                        'permission' => 'settings.log',
                    ],
                    [
                        'name' => __('Branches'),
                        'link' => route('branches.index'),
                        'permission' => 'branches.index',
                        'include' => ['branches.create']
                    ],

                ],
            ],

            [
                'name' => __('Menu Manager'),
                'link' => '#',
                'icon' => 'fa-list-alt',
                'children' => [

                    [
                        'name' => __('Text Icon Menu'),
                        'link' => route('menu_items.index'),
                        'permission' => 'menus.index',
                        'include' => ['menu_items.edit'],
                    ],
                    [
                        'name' => __('List of Menu'),
                        'link' => route('menus.index'),
                        'permission' => 'menus.index',
                    ],
                ],
            ],

            [
                'name' => __('Footer Manager'),
                'link' => '#',
                'icon' => 'fa-external-link-alt',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('navigations.index'),
                        'permission' => 'navigations.index',
                        'include' => ['navigations.edit'],
                    ],
                    [
                        'name' => __('Add'),
                        'link' => route('navigations.create'),
                        'permission' => 'navigations.store',
                    ],
                ],
            ],
            [
                'name' => __('Accounts Member'),
                'link' => route('accounts.index'),
                'icon' => 'fa-users',
                'children' => [
                    [
                        'name' => __('Accounts'),
                        'link' => route('accounts.index'),
                        'permission' => 'accounts.index',
                    ],
                    [
                        'name' => __('Contact'),
                        'link' => route('contacts'),
                        'permission' => 'contacts.index',
                    ],
                    [
                        'name' => __('Newsletter'),
                        'link' => route('newsletters.index'),
                        'permission' => 'newsletters.index',
                    ]
                ]
            ],

            [
                'name' => __('Users Manager'),
                'link' => '#',
                'icon' => 'fa-user',
                'children' => [
                    [
                        'name' => __('List'),
                        'link' => route('users.index'),
                        'permission' => 'users.index',
                    ],
                    [
                        'name' => __('Add'),
                        'link' => route('users.create'),
                        'permission' => 'users.store',
                    ],
                    [
                        'name' => __('List of roles'),
                        'link' => route('roles.index'),
                        'permission' => 'roles.index',
                    ],
                ],
            ],

        ];

        // Menu
        $mainMenus = Cache::rememberForever(
            'main-menu', function () {
                return Menu::getByName('Main-menu');
            }
        );

        // Setting
        $mainSettings = Cache::rememberForever(
            'main-setting', function () {

                $settings = Option::get();

                $tempSettings = [];

                foreach ($settings as $setting) {
                    $tempSettings[$setting->option_name] = $setting->option_value;
                }

                return $tempSettings;
            }
        );
        // Category In Footer
        $footerCategories = Cache::rememberForever(
            'footer-categories', function () {
                return Category::where('status', 1)
                    ->where('is_menu_bottom', 1)
                    ->take(4)->get();
            }
        );

        $footerPopularTags = Cache::rememberForever(
            'footer-popular-tags', function () {
                return TextLink::where('is_home', 1)->byModel('Home')->get(['text','link']);
            }
        );

        $headerBanner = Cache::rememberForever(
            'header-banner', function () {
                return  $this->bannerService->getByPosition('HEADER');

            }
        );
        // Text Home
        $mainTexts = Cache::rememberForever(
            'main-text', function () {

                $homeTexts = HomeText::get();

                $tempHomeTexts = [];

                foreach ($homeTexts as $homeText) {
                    $tempHomeTexts[$homeText->text_name] = $homeText->text_value;
                }

                return $tempHomeTexts;
            }
        );




        $view->with(compact('navigation', 'mainMenus', 'mainSettings',  'footerCategories', 'footerPopularTags', 'headerBanner','mainTexts'));
    }
}
