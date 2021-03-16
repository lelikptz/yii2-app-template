<?php

namespace app\controllers;

use app\infrastructure\services\PostService;
use yii\rest\Controller;

/**
 * Class SiteController
 */
class SiteController extends Controller
{
    public function behaviors(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function actionIndex(): array
    {
        $service = new PostService();

        return $service->list([])->getData();
    }

    /**
     * @param int $id
     * @return array
     */
    public function actionPost(int $id): array
    {
        $service = new PostService();

        return $service->get($id)->getData();
    }
}
