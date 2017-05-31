<?php

namespace App\Http\Controllers;

use Core\Rss\Contracts\RssFeed;
use Illuminate\Contracts\Cache\Factory as CacheManager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

/**
 * Class RssController.
 *
 * @property CacheManager cacheManager
 * @property RssFeed rssFeed
 * @package App\Http\Controllers
 */
class RssController extends Controller
{
    /**
     * RssController constructor.
     *
     * @param CacheManager $cacheManager
     * @param RssFeed $rssFeed
     */
    public function __construct(CacheManager $cacheManager, RssFeed $rssFeed)
    {
        $this->cacheManager = $cacheManager;
        $this->rssFeed = $rssFeed;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $data = $this->cacheManager->remember("request:{$request->getRequestUri()}", 15, function () {
            return ['rss' => $this->rssFeed->build()];
        });

        return response()
            ->view('app.rss.index', $data)
            ->header('Content-Type', 'text/xml');
    }
}
