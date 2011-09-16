<?php
App::uses('BaseAuthorize', 'Controller/Component/Auth');

class ShopAuthorize extends BaseAuthorize {

/**
 * Returns whether a user is authorized to access an action
 *
 * @param array $user 
 * @param CakeRequest $request 
 * @return boolean
 */
	public function authorize($user, CakeRequest $request) {
		if (!empty($user['admin']) || $user['role'] == 'admin') {
			return true;
		}
		
		// @todo implement permissions for other users
		return true;
	}
}