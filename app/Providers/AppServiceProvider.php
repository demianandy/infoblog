<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Source;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    

        Paginator::useBootstrap();

        view()->composer('layouts.layout', function($view) {
            $day = date('d');
            $month = date('M');
            $year = date('Y');
            $week = date('l');

            switch ($month) {
                case 'Jan' : $month = 'января'; break;
                case 'Feb' : $month = 'февраля'; break;
                case 'Mar' : $month = 'марта'; break;
                case 'Apr' : $month = 'апреля'; break;
                case 'May' : $month = 'мая'; break;
                case 'Jun' : $month = 'июня'; break;
                case 'Jul' : $month = 'июля'; break;
                case 'Aug' : $month = 'августа'; break;
                case 'Sep' : $month = 'сентября'; break;
                case 'Oct' : $month = 'октября'; break;
                case 'Nov' : $month = 'ноября'; break;
                case 'Dec' : $month = 'декабря'; break;
            }

            switch ($week) {
                case 'Monday' : $week = 'Понедельник'; break;
                case 'Tuesday' : $week = 'Вторник'; break;
                case 'Wednesday' : $week = 'Среда'; break;
                case 'Thursday' : $week = 'Четверг'; break;
                case 'Friday' : $week = 'Пятница'; break;
                case 'Saturday' : $week = 'Суббота'; break;
                case 'Sunday' : $week = 'Воскресенье'; break;
            }

            $date = "$day $month, $year год. $week.";

            $view->with([
                'categories' => Category::all(), 
                'tags' => Tag::all(), 
                'sources' => Source::all(),
                'articles_last' => Article::limit(20)->orderby('id', 'DESC')->get(),
                'articles_last2' => Article::limit(5)->orderby('id', 'DESC')->get(),
                'articles_view' => Article::limit(4)->orderby('view', 'DESC')->get(),
                'date' => $date,
                'year' => date('Y'),
            ]);
        });
    }
}
