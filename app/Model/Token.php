<?php
App::uses('AppModel', 'Model');
/**
 * Token Model
 *
 */
class Token extends AppModel
{
    /**
     * Create a new ticket by providing the data to be stored in the ticket.
     */
    public function generate($data = null)
    {
        $data = array(
          'token' => substr(md5(uniqid(rand(), 1)), 0, 10),
          'data'  => serialize($data),
        );
         
        if ($this->save($data)) {
            return $data['token'];
        }
         
        return false;
    }
     
    /**
     * Return the value stored or false if the ticket can not be found.
     */
    public function get($token)
    {
        $this->garbage();
        $token = $this->findByToken($token);
        if ($token) {
          $this->delete($token['Token']['id']);
          return unserialize($token['Token']['data']);
        }
           
        return false;
    }
   
    /**
     * Remove old tickets
     */
    public function garbage()
    {  
        return $this->deleteAll(array('created < INTERVAL -1 DAY + NOW()'));
    }
}