<?php

namespace Omnipay\Unitpay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;


class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    protected $redirectUrl;
    protected $publicKey;

    public function __construct(RequestInterface $request, $data, $redirectUrl, $publicKey)
    {
        parent::__construct($request, $data);
        $this->redirectUrl = $redirectUrl;
        $this->publicKey = $publicKey;
    }

    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        return $this->getRequest()->getEndpoint(). '/'. $this->publicKey;
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return $this->data;
    }
}
