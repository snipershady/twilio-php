<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sip;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Version;

/**
 * @property string accountSid
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string friendlyName
 * @property string sid
 * @property string subresourceUris
 * @property string uri
 */
class CredentialListInstance extends InstanceResource {
    /**
     * Initialize the CredentialListInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @param string $sid Fetch by unique credential Sid
     * @return \Twilio\Rest\Api\V2010\Account\Sip\CredentialListInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $sid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'dateCreated' => Deserialize::iso8601DateTime($payload['date_created']),
            'dateUpdated' => Deserialize::iso8601DateTime($payload['date_updated']),
            'friendlyName' => $payload['friendly_name'],
            'sid' => $payload['sid'],
            'subresourceUris' => $payload['subresource_uris'],
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
     * @return \Twilio\Rest\Api\V2010\Account\Sip\CredentialListContext Context for
     *                                                                  this
     *                                                                  CredentialListInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new CredentialListContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a CredentialListInstance
     * 
     * @return CredentialListInstance Fetched CredentialListInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the CredentialListInstance
     * 
     * @param string $friendlyName The friendly_name
     * @return CredentialListInstance Updated CredentialListInstance
     */
    public function update($friendlyName) {
        return $this->proxy()->update(
            $friendlyName
        );
    }

    /**
     * Deletes the CredentialListInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Access the credentials
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Sip\CredentialList\CredentialList 
     */
    protected function getCredentials() {
        return $this->proxy()->credentials;
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
        return '[Twilio.Api.V2010.CredentialListInstance ' . implode(' ', $context) . ']';
    }
}