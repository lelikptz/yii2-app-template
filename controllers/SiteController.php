<?php

namespace app\controllers;

use app\services\PostService;
use yii\base\InvalidConfigException;
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
     * @throws InvalidConfigException
     */
    public function actionIndex(): array
    {
        $service = new PostService();

        return $service->list([])->getData();
    }

    /**
     * @param int $id
     * @return array
     * @throws InvalidConfigException
     */
    public function actionPost(int $id): array
    {
        $service = new PostService();

        return $service->get($id)->getData();
    }
}
