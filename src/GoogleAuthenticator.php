<?php
namespace ramprasadm1986\Authenticator;
use yii\base\Component;
use yii\base\InvalidParamException;

class GoogleAuthenticator extends Component
{
    /**
     * PHP Class for handling Google Authenticator 2-factor authentication.
     * @var object
     */
    private static $PHPGangsta_GoogleAuthenticator;

    /**
     * Google Authenticator Sercet
     * @var string
     */
    private static $_secret;

    /**
     * Google Authenticator QRCode Name
     * @var string
     */
    private static $_name;

    public function init()
    {
        if (null == self::$PHPGangsta_GoogleAuthenticator) {
            self::$PHPGangsta_GoogleAuthenticator = new PhpGangstaGoogleAuthenticator();
        }
    }

    /**
     * Google Authenticator Secret
     * Secret is: ".\Yii::$app->authenticator->secret;
     * @return string Google Authenticator Secret
     */
    public function getSecret()
    {
        self::$_secret = self::$PHPGangsta_GoogleAuthenticator->createSecret();
        return self::$_secret;
    }

    /**
     * Google Authenticator Secret
     */
    public function setSecret($secret)
    {
        self::$_secret = $secret;
    }

    /**
     * QRCode
     */
    public function setName($name)
    {
        self::$_name = $name;
    }

    /**
     * Google Charts URL for the QR-Code: ".\Yii::$app->authenticator->qRCodeGoogleUrl;
     */
    public function getQRCodeGoogleUrl()
    {
        return self::$PHPGangsta_GoogleAuthenticator->getQRCodeGoogleUrl(self::$_name, self::$_secret);
    }

    /**
     * Secret Code
     */
    public function getCode()
    {
        return self::$PHPGangsta_GoogleAuthenticator->getCode(self::$_secret);
    }

    /**
     * Code
     * @param $code string Code
     * @param $ct intager clock tolerance, 2 = 2*30sec clock tolerance
     * @return bool
     */
    public function verifyCode($code, $ct = 2)
    {
        return self::$PHPGangsta_GoogleAuthenticator->verifyCode(self::$_secret, $code, $ct);
    }
}
/* end the file of Authenticator.php*/
