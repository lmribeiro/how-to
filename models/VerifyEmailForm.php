<?php

namespace app\models;

use app\models\Customer;
use yii\base\InvalidArgumentException;
use yii\base\Model;

class VerifyEmailForm extends Model
{
	/**
	 * @var string
	 */
	public $token;

	/**
	 * @var User
	 */
	private $_customer;


	/**
	 * Creates a form model with given token.
	 *
	 * @param string $token
	 * @param array $config name-value pairs that will be used to initialize the object properties
	 * @throws InvalidArgumentException if token is empty or not valid
	 */
	public function __construct($token, array $config = [])
	{
		if (empty($token) || !is_string($token)) {
			throw new InvalidArgumentException('Verify email token cannot be blank.');
		}
		$this->_customer = Customer::findByVerificationToken($token);
		if (!$this->_customer) {
			throw new InvalidArgumentException('Wrong verify email token.');
		}
		parent::__construct($config);
	}

	/**
	 * Verify email
	 *
	 * @return User|null the saved model or null if saving fails
	 */
	public function verifyEmail()
	{
		$customer = $this->_customer;
		$customer->status = Customer::STATUS_ACTIVE;
		return $customer->save(false) ? $customer : null;
	}
}
