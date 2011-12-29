<?php
class Model_Config extends Model_Table {
    function init(){
        parent::init();
        $this->addField('register_email_confirmation')->type('boolean');
        $this->addField('register_payment_needed')->type('boolean');
        $this->addField('register_payment_amount')->type('money');
        $this->addField('register_payment_type')->type('money');
        $this->addField('register_payment_paypal_account');
    }
}
