<?php
namespace config\Setting;

use ActiveCollab\SDK\Authenticator\Cloud;

class Setting {

	public $env = [];
	public $ac;
	public $client;

	public function __construct() {
		$this->load();
		$this->authorization();
		$this->client();
	}
	public function load(): void
   {
       $lines = file(__DIR__ . '/../../.env');
       foreach ($lines as $line) {
           [$key, $value] = explode('=', $line, 2);
           $key = trim($key);
           $value = trim($value);

           putenv(sprintf('%s=%s', $key, $value));
           $this->env[$key] = $value;
       }
   }
   public function authorization(): void {
	$this->ac = new Cloud($this->env['ACTIVECOLLAB_COMPANY'], $this->env['ACTIVECOLLAB_APP_NAME'], $this->env['ACTIVECOLLAB_MAIL'], $this->env['ACTIVECOLLAB_PASSWORD']);

   }
   public function client(): void {
	$account = $this->ac->getAccounts();
	$token = $this->ac->issueToken(key($account));
	if ($token instanceof \ActiveCollab\SDK\TokenInterface) {
		$this->client = new \ActiveCollab\SDK\Client($token);
	} else {
		print "Invalid response from ac client\n";
		die();
	}
   }
}
new Setting;

