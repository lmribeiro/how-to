<?php

namespace app\components;

/**
 * A class to validate email domains
 * 
 */
class EmailValidator
{
    public $pattern = '/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/';

    public function validate($email)
    {
        $result['is_valid'] = preg_match($this->pattern, $email);
        if ($result['is_valid']) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                list($user, $domain) = explode('@', $email);
                $info = ['is_valid' => false, 'user' => $user, 'domain' => $domain, 'ip' => null, 'mx' => null];
                $result['address'] = $email;
                $result['is_valid'] = dns_check_record($domain, "MX");

                if ($result['is_valid']) {
                    $a = dns_get_record($domain, DNS_A);
                    $mx = dns_get_record($domain, DNS_MX);

                    if (isset($a[0]['ip'])) {
                        $info['ip'] = $a[0]['ip'];
                    }

                    if (isset($mx[0]['target'])) {
                        $info['mx'] = $mx[0]['target'];
                    }
                }

                $result['info'] = $info;
            }
        }

        return (Object) $result;
    }

}
