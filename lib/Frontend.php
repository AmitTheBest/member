<?php
class Frontend extends ApiFrontend {
    public $my_config; // model for config
    function init(){
        parent::init();

        // init config, if no config, go to installer
        try {
            $this->dbConnect();

            $this->my_config=$this->add('Model_Config');
            $this->my_config->loadData('1');
            if(!$this->my_config->isInstanceLoaded())
                throw $this->exception('Configuration not found');



        }catch(Exception $e){
        }
    }

    /** getConfig is modified to fallback to the "config" model */
    function getConfig($path, $default_value = '**undefined_value**'){
        $val = parent::getConfig($path, '**not_in_config_file**');
        if(!$this->my_config)return $val=='**not_in_config_file**'?$default_value:$val;
        if($val=='**not_in_config_file**' && $this->my_config->hasField($path)){
            $val=$this->my_config->get($path);
        }else{
            $val=$default_value;
        }

        return $val;
    }
}
