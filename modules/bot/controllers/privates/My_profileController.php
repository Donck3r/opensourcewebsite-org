<?php

namespace app\modules\bot\controllers\privates;

use Yii;
use \app\modules\bot\components\response\SendMessageCommand;
use \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use app\modules\bot\components\Controller as Controller;

/**
 * Class My_profileController
 *
 * @package app\modules\bot\controllers
 */
class My_profileController extends Controller
{
    /**
     * @return array
     */
    public function actionIndex()
    {
        $update = $this->getUpdate();

        return [
            new SendMessageCommand(
                $this->getTelegramChat()->chat_id,
                $this->render('index', [
                    'profile' => $update->getMessage()->getFrom(),
                ]),
                [
                    'parseMode' => $this->textFormat,
                    'replyMarkup' => new InlineKeyboardMarkup([
                        [
                            [
                                'callback_data' => '/my_location',
                                'text' => Yii::t('bot', 'Location'),
                            ],
                        ],
                        [
                            [
                                'callback_data' => '/my_gender',
                                'text' => Yii::t('bot', 'Gender'),
                            ],
                        ],
                        [
                            [
                                'callback_data' => '/my_birthday',
                                'text' => Yii::t('bot', 'Birthday'),
                            ],
                        ],
                        [
                            [
                                'callback_data' => '/my_currency',
                                'text' => Yii::t('bot', 'Currency'),
                            ],
                        ],
                        [
                            [
                                'callback_data' => '/my_email',
                                'text' => Yii::t('bot', 'Email'),
                            ],
                        ],
                        [
                            [
                                'callback_data' => '/menu',
                                'text' => '🔙',
                            ],
                        ],
                    ]),
                ]
            ),
        ];
    }
}