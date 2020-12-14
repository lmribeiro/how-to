<?php

namespace app\components;

use Yii;
use keltstr\simplehtmldom\SimpleHTMLDom;

class CoordinatesService
{
    private $address = array();
    private $error = array();
    private $api = 'http://www.ctt.pt/pdcp/xml_pdcp?';
    private $api2 = 'https://www.codigo-postal.pt/?';

    /**
     * @param type $code
     */
    public function getByPostalCode($code)
    {
        if (strlen($code) < 7) {
            $this->error['error'] = true;
            $this->error['message'] = Yii::t('app', 'Código postal incompleto');

            return $this->error;
        }

        $cp4 = substr($code, 0, 4);
        $cp3 = substr($code, 4);

        $ruas = array();
        $simpleHTML = new SimpleHTMLDom();
        $html = $simpleHTML->file_get_html($this->api2."cp4=$cp4&cp3=$cp3", false, null, 0);

        $elements = $html->find('.places');

        if (count($elements) == 0) {
            $this->error['error'] = true;
            $this->error['message'] = Yii::t('app', 'Nenhuma morada encontrada.');

            return $this->error;
        }

        $this->address['postal_code'] = \trim($elements[0]->find('.cp', 0)->plaintext);
        $this->address['gps'] = \trim(substr($elements[0]->find('span.gps', 0)->plaintext, 6));
        $locality = explode(', ', \trim($elements[0]->find('span', 3)->plaintext));
        $this->address['locality'] = $locality[0];
        $this->address['city'] = [@$locality[1]];
        $this->address['district'] = [@$locality[1]];

        foreach ($elements as $element) {
            foreach ($element->find('.search-title') as $e) {
                if (!in_array($e->plaintext, $ruas)) {
                    array_push($ruas, $e->plaintext);
                }
            }
        }

        $this->address['street'] = $ruas;

        return $this->address;
    }
}
