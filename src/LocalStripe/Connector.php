<?php namespace Kumuwai\LocalStripe;


class Connector
{

    public function setApiKey($key)
    {
        $this->remote('stripe')->setApiKey($key);
    }

    public function remote($stripeObjectName)
    {
        $class = '\\Stripe\\' . $this->studly($stripeObjectName);
        return new $class;
    }

    public function local($localObjectName)
    {
        $class = 'Kumuwai\LocalStripe\Models\Stripe' . $this->studly($localObjectName);
        return new $class;
    }

    private function studly($value)
    {
        $value = ucwords(str_replace(array('-', '_'), ' ', $value));
        return str_replace(' ', '', $value);
    }

}
