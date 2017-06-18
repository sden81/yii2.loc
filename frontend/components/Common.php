<?php
declare(strict_types = 1);
namespace frontend\components;

use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;
use Imagine\Image\Box;

class Common extends Component
{

    const EVENT_SEND_EMAIL = 'send_email';

    public function sendEmail($email, $subject, $body, $template = 'mail', $params = [])
    {
        $this->on(self::EVENT_SEND_EMAIL, [$this, 'logActions']);
        $this->trigger(self::EVENT_SEND_EMAIL);
        return Yii::$app->mailer->compose($template, ArrayHelper::merge(['title' => $subject, $body => $body], $params))
            ->setFrom(Yii::$app->params['supportEmail'])
            ->setTo($email)
            ->setSubject($subject)
            ->send();
    }

    public function logActions($event)
    {
        Yii::info($event->sender->classname(), 'myinfo');
    }

    public function resizeImage(string $srcImage, string $destImage, integer $width, integer $height):bool
    {
        //resize Images
        $image = Image::getImagine()->open("@uploads/$srcImage");
        $image->resize(new Box($width, $height))->save("@uploads/$destImage", ['quality' => 90]);
        return file_exists("@uploads/$destImage") ? true : false;
    }
}