<?php

interface RESTfulInterface {
	public function restGet($params);
	public function restPut($params);
	public function restPost($params);
	public function restDelete($params);	
}

