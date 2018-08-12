<?php

namespace common\managers;

use common\models\RequestService;
use yii\mail\MailerInterface;

/**
 * Class RequestServiceNotification
 * @package common\managers
 */
class RequestServiceAdminNotification
{
    /**
     * @var MailerInterface
     */
    protected $mailer;

    protected $from = 'site@looklab.com.ua';

    protected $to = 'hello@alhimiya.com';

    protected $subject = 'Новая заявка seo-stars.top';

    protected $layout = 'request-service-notification';

    /**
     * @var RequestService
     */
    protected $requestInfo;

    /**
     * RequestServiceNotification constructor.
     * @param MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }


    public function setRequestInfo(RequestService $requestService)
    {
        $this->requestInfo = $requestService;
        return $this;
    }

    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    public function setTo($to)
    {
        $this->to = $to;
        return $to;
    }


    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function send()
    {
        $send = $this->mailer->compose($this->layout, ['model' => $this->requestInfo])
            ->setFrom($this->from)
            ->setTo($this->to)
            ->setSubject($this->subject)
            ->send();

        return $send;
    }
}