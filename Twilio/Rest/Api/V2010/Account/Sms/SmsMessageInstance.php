<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sms;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string apiVersion
 * @property string body
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property \DateTime dateSent
 * @property string direction
 * @property string from
 * @property string price
 * @property string priceUnit
 * @property string sid
 * @property string status
 * @property string to
 * @property string uri
 */
class SmsMessageInstance extends InstanceResource {
    /**
     * Initialize the SmsMessageInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @param string $sid The sid
     * @return \Twilio\Rest\Api\V2010\Account\Sms\SmsMessageInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $sid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'apiVersion' => $payload['api_version'],
            'body' => $payload['body'],
            'dateCreated' => Deserialize::iso8601DateTime($payload['date_created']),
            'dateUpdated' => Deserialize::iso8601DateTime($payload['date_updated']),
            'dateSent' => Deserialize::iso8601DateTime($payload['date_sent']),
            'direction' => $payload['direction'],
            'from' => $payload['from'],
            'price' => $payload['price'],
            'priceUnit' => $payload['price_unit'],
            'sid' => $payload['sid'],
            'status' => $payload['status'],
            'to' => $payload['to'],
            'uri' => $payload['uri'],
        );
        
        $this->solution = array(
            'accountSid' => $accountSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Sms\SmsMessageContext Context for
     *                                                              this
     *                                                              SmsMessageInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new SmsMessageContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }
        
        return $this->context;
    }

    /**
     * Deletes the SmsMessageInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Fetch a SmsMessageInstance
     * 
     * @return SmsMessageInstance Fetched SmsMessageInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the SmsMessageInstance
     * 
     * @param array $options Optional Arguments
     * @return SmsMessageInstance Updated SmsMessageInstance
     */
    public function update(array $options = array()) {
        return $this->proxy()->update(
            $options
        );
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        
        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.SmsMessageInstance ' . implode(' ', $context) . ']';
    }
}