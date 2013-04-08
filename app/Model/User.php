<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Role $Role
 * @property Post $Post
 * @property Report $Report
 */
class User extends AppModel {

	public function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }

	
	public function bindNode($user) {
		return array('model' => 'Role', 'foreign_key' => $user['User']['role_id']);
	}
	
	 var $validate = array(
        'username' => array(
            'length' => array(
                'rule'      => array('minLength', 5),
                'message'   => 'Must be more than 5 characters',
                'required'  => true,
            ),
            'alphanum' => array(
                'rule'      => 'alphanumeric',
                'message'   => 'May only contain letters and numbers',
            ),
            'unique' => array(
                'rule'      => 'isUnique',
                'message'   => 'Already taken',
            ),
        ),
        'email' => array(
            'email' => array(
                'rule'      => 'email',
                'message'   => 'Must be a valid email address',
            ),
            'unique' => array(
                'rule'      => 'isUnique',
                'message'   => 'Already taken',
            ),
        ),
        'password' => array(
            'empty' => array(
                'rule'      => 'notEmpty',
                'message'   => 'Must not be blank',
                'required'  => true,
            ),
        ),
        'password_confirm' => array(
            'compare'    => array(
                'rule'      => array('password_match', 'password', true),
                'message'   => 'The password you entered does not match',
                'required'  => true,
            ),
            'length' => array(
                'rule'      => array('between', 6, 20),
                'message'   => 'Use between 6 and 20 characters',
            ),
            'empty' => array(
                'rule'      => 'notEmpty',
                'message'   => 'Must not be blank',
            ),
        ),
    );
     
	 /**
     * Generate a random pronounceable password
     */
    public function generatePassword($length = 10) {
        // Seed
        srand((double) microtime()*1000000);
         
        $vowels = array('a', 'e', 'i', 'o', 'u');
        $cons = array('b', 'c', 'd', 'g', 'h', 'j', 'k', 'l', 'm', 'n',
            'p', 'r', 's', 't', 'u', 'v', 'w', 'tr',
            'cr', 'br', 'fr', 'th', 'dr', 'ch', 'ph',
            'wr', 'st', 'sp', 'sw', 'pr', 'sl', 'cl');
         
        $num_vowels = count($vowels);
        $num_cons = count($cons);
         
        $password = '';
        for ($i = 0; $i < $length; $i++){
            $password .= $cons[rand(0, $num_cons - 1)] . $vowels[rand(0, $num_vowels - 1)];
        }
         
        return substr($password, 0, $length);
    }
 
    /**
     * Ensure two password fields match
     *
     * @param   array   data provided by the controller
     * @param   string  the original (already hashed) password fieldname
     * @param   bool    whether the password field has been hashed,
     *                  only hashed when a username input is present
     */
    public function password_match($data, $password_field, $hashed = true)
    {       
        $password         = $this->data[$this->alias][$password_field];
        $keys             = array_keys($data);
        /*$password_confirm = $hashed ?
              Security::hash($data[$keys[0]], null, true) :
              $data[$keys[0]]; */
			  
		// you noticed that the passwords were not hashed at this point so
		// you did direct compare.
		$password_confirm =  $data[$keys[0]];
        return $password === $password_confirm;
       // return true;
    }
	
	 /**
     * Extra form dependent validation rules
     */
    var $validateChangePassword = array(
        '_import' => array('password', 'password_confirm'),
        'password_old' => array(
            'correct' => array(
                'rule'      => 'password_old',
                'message'   => 'Does not match',
                'required'  => true,
            ),
            'empty' => array(
                'rule'      => 'notEmpty',
                'message'   => 'Must not be blank',
            ),
        ),
    );
 
    /**
     * Dynamically adjust our validation behaviour
     *
     * Look for an _import key in new ruleset, and import
     * those rules from the base validation ruleset
     *
     * @param   string  array key of the validation ruleset to use
     */
    public function useValidationRules($key)
    {
        $variable = 'validate' . $key;
        $rules = $this->$variable;
         
        if (isset($rules['_import'])) {
            foreach ($rules['_import'] as $key) {
                $rules[$key] = $this->validate[$key];
            }
            unset($rules['_import']);
        }
         
        $this->validate = $rules;
    }
     
 
    /**
     * Ensure password matches the user session
     *
     * @param   array   data provided by the controller
     */
    public function password_old($data)
    {
        $password = $this->field('password', array('User.id' => $this->id));
        /*return $password ===
            Security::hash($data['password_old'], null, true);*/
			echo "<br/>" .  Security::hash($data['password_old'], null, true);
			echo "<br/>" . $password;
			echo "<br/>" . AuthComponent::password($data['password_old']);
			echo "<br/>" . $data['password_old'] . " fuck " . $password;
		return $password === AuthComponent::password($data['password_old']);
    }
	
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $actsAs = array('Acl' => array('type' => 'requester'));
	public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['role_id'])) {
            $groupId = $this->data['User']['role_id'];
        } else {
            $groupId = $this->field('role_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Role' => array('id' => $groupId));
        }
    }
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Report' => array(
			'className' => 'Report',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
