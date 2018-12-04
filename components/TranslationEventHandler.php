<?php

namespace app\components;

use Yii;
use yii\i18n\MissingTranslationEvent;
use app\models\SourceMessage;
use app\models\Message;

class TranslationEventHandler {

    public static function handleMissingTranslation(MissingTranslationEvent $event) {
        if ($event->message != '') {
            // Load the messages		
            $source = SourceMessage::find()->where(['message' => $event->message, 'category' => $event->category])->one();
            // If we didn't find one then add it
            if (!$source) {
                // Add it
                $model = new SourceMessage;
                $model->category = $event->category;
                $model->message = $event->message;
                $model->save();
                $lastID = Yii::$app->db->getLastInsertID();
                $id_sourceMessage = $lastID;
            } else {
                $id_sourceMessage = $source->id;
            }

            if ($event->language != Yii::$app->sourceLanguage) {
                // Do the same thing with the messages	
                $translation = Message::find()->where(['language' => $event->language, 'id' => $id_sourceMessage])->one();
                // If we didn't find one then add it
                if (!$translation) {
                    $source = SourceMessage::find()->where(['message' => $event->message, 'category' => $event->category])->one();

                    // Add it
                    $model = new Message;
                    $model->id = $source->id;
                    $model->language = 'en';
                    $model->translation = ucwords(strtolower(str_replace('_', ' ', $event->message)));
                    $model->save();
                    
                    $model = new Message;
                    $model->id = $source->id;
                    $model->language = 'jp';
                    $model->translation = ucwords(strtolower(str_replace('_', ' ', $event->message)));
                    $model->save();
                }
            }
        }
    }

}
