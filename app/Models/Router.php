<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUid;
use phpseclib3\Net\SSH2;
use App\Models\Role;

class Router extends Model
{
    use HasFactory, HasUid;

    protected $fillable = [
        'domain',
        'port_no',
        'username',
        'password',
    ];

    /**
    * Rules
    */
    public function rules() {
        return [
            'domain' => 'required',
            'port_no' => 'required',
            'username' => 'required',
            'password' => 'required',
        ];
    }
    
    /**
     * Relationships
    */
    public function subscription() {
        return $this->hasMany(\App\Models\Subscription::class);
    }

    public function role() {
        return $this->hasMany(\App\Models\Role::class);
    }

    public function connect() {
        try {
            $ssh = new SSH2($this->domain, $this->port_no);
            $ssh->login($this->username, $this->password);
        } catch (\Exception $e) {
            \Log::error('SSH Exception: ' . $e->getMessage());
            return false;
        }

        $this->status = true;
        $this->save();

        $ssh->disconnect();
    }

    public function getSystemResource() {
        $ssh = new SSH2($this->domain, $this->port_no);

        if (!$ssh->login($this->username, $this->password)) {
            return false;
            $ssh->disconnect();
        }

        $output = $ssh->exec('/system resource print');

        $lines = explode("\r\n", $output);

        $data = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (!empty($line)) {
                list($key, $value) = explode(':', $line, 2);
                $data[trim($key)] = trim($value);
            }
        }

        $ssh->disconnect();

        return $data;
    }

    //Get Router Identity
    public function getSystemRouterboard() {

        $ssh = new SSH2($this->domain, $this->port_no);

        if (!$ssh && !$ssh->login($this->username, $this->password)) {
            return false;
        }

        $output = $ssh->exec('/system routerboard print');

        $lines = explode("\r\n", $output);

        $data = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (!empty($line)) {
                list($key, $value) = explode(':', $line, 2);
                $data[trim($key)] = trim($value);
            }
        }

        $ssh->disconnect();

        return $data;
    }

    public static function getPppProfile() {
        $router = self::find(session('router_id'));
        try {
            $ssh = new SSH2($router->domain, $router->port_no);
            $ssh->login($router->username, $router->password);
        } catch (\Exception $e) {
            \Log::error('SSH Exception: ' . $e->getMessage());
            return false;
        }

        $output = $ssh->exec(':put [/ppp profile print as-value]');

        $profiles = [];

        $lines = explode(";", $output);

        $key = '';
        foreach ($lines as $line) {
            $fields = explode('=', $line, 2);
            if($fields[0] == '.id') {
                $key = str_replace('*', '', $fields[1]);
                $profiles[$key] = [];
            } else {
                $profiles[$key][$fields[0]] = $fields[1];
            }
        }

        $ssh->disconnect();

        return $profiles;
    }

    public static function getSubscriptionProfileSelectOptions() {
        $options = [];
        $profiles = self::getPppProfile();

        if($profiles) {
            foreach($profiles as $profile) {
                $options[] = ['label' => $profile['name'], 'value' => $profile['name']];
            }
        }

        return $options;
    }
}
