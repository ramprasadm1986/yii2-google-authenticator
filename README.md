# yii2-google-authenticator
[![GitHub tag](https://img.shields.io/badge/license-BSD%203--Clause-brightgreen.svg)]()
[![GitHub tag](https://img.shields.io/badge/tag-v1.0.0-blue.svg)]()
[![GitHub tag](https://img.shields.io/badge/composer-yii2--extension-orange.svg)]()

This PHP class can be used to interact with the Google Authenticator mobile app for 2-factor-authentication. This class can generate secrets, generate codes, validate codes and present a QR-Code for scanning the secret. It implements TOTP according to RFC6238

For a secure installation you have to make sure that used codes cannot be reused (replay-attack). You also need to limit the number of verifications, to fight against brute-force attacks. For example you could limit the amount of verifications to 10 tries within 10 minutes for one IP address (or IPv6 block). It depends on your environment.

## Install
`composer require x1ankun/yii2-google-authenticator `

## Configuration
```
'authenticator' => [
    'class' => 'x1ankun\Authenticator\GoogleAuthenticator'
]
```

## Usage example
```
$authenticator = \Yii::$app->authenticator;

//生成Google Authenticator Secret
$secret = $authenticator->secret;

//Google Charts URL for the QR-Code
$authenticator->secret = $secret;
$authenticator->name = 'EXAMPLE';
$qRCodeGoogleUrl = $authenticator ->qRCodeGoogleUrl;

//验证Code码
$code = $authenticator->code;
$authenticator->verifyCode($code); //return bool
```