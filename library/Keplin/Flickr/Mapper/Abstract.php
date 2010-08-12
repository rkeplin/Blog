<?php
abstract class Keplin_Flickr_Mapper_Abstract
{
    const API_KEY = 'xxxx';
    const SECRET = 'xxxx';
    const BASE_URL = 'http://api.flickr.com/services/rest/';
   
    private $_params;
   
    public function __construct()
    {
        $this->_setOption('api_key', self::API_KEY);
        $this->_setOption('format', 'php_serial');
    }
    
    protected function _buildUrl()
    {
        $query_string = '';
       
        foreach($this->_params as $key => $value)
        {
            $query_string .= "{$key}=" . urlencode($value) . '&';
        }
       
        $url = self::BASE_URL . '?' . $query_string;
        
        return $url;
    }
   
    protected function _setOption($key, $value)
    {
        $this->_params[$key] = $value;
    }
   
    protected function _removeOption($key)
    {
        unset($this->_params[$key]);
    }
   
    protected function _setOptions($params)
    {
        foreach($params as $key => $value)
        {
            $this->setOption($key, $value);
        }
    }
    
    protected function _removeAllOptions()
    {
        foreach($this->_params as $key => $val)
        {
            if(($key != 'api_key') && ($key != 'format'))
            {
                $this->_removeOption($key);
            }
        }
    }
}