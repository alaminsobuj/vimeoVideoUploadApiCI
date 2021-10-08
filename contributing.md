# Vimeo Video Upload With Codeigniter 
This is a simple PHP library for interacting with the Vimeo API.

#Get Started
<ul>
	<li>Help</li>
	<li>Troubleshooting</li>
	<li>Installation</li>
	<li>Usage</li>
	<li>Authentication and access tokens</li>
	<li>Unauthenticated tokens</li>
	<li>Authenticated tokens</li>
	<li>Make requests</li>
	<li>Uploading videos</li>
	<li>Upload videos from a server</li>
	<li>Replace videos from a server</li>
	<li>Client side uploads</li>
	<li>Upload videos from a URL</li>
	<li>Upload images</li>
	<li>Framework integrations</li>
	<li>Get started with the Vimeo API</li>
</ul>

# Installation
1 .Require this package, with <a href="https://getcomposer.org/">Composer</a>, in the root directory of your project.

Please note that this library requires at least PHP 7.1 installed. If you are on PHP 5.6, or PHP 7.0, please use install the package with the following:

# composer require vimeo/vimeo-api

2 .Use the library $lib = new \Vimeo\Vimeo($client_id, $client_secret)

#Unauthenticated
Unauthenticated API requests must generate an access token. You should not generate a new access token for each request. Instead, request an access token once and use it forever.
# `scope` is an array of permissions your token needs to access.
# You can read more at https://developer.vimeo.com/api/authentication#supported-scopes
$token = $lib->clientCredentials(scope);

#usable access token
var_dump($token['body']['access_token']);

# accepted scopes
var_dump($token['body']['scope']);

# use the token
$lib->setToken($token['body']['access_token']);

#Authenticated
1. Build a link to Vimeo so your users can authorize your app.
2. Your user needs to access the authorization endpoint (either by clicking the link or through a redirect). On the authorization endpoint, the user will have the option to deny your app any scopes you have requested. If they deny your app, they are redirected back to your redirect_url with an error parameter.
3. If the user accepts your app, they are redirected back to your redirect_uri with a code and state query parameter (eg. http://yourredirect.com?code=abc&state=xyz).
     I. You must validate that the state matches your state from Step 1.
    II . If the state is valid, you can exchange your code and redirect_uri for an access token.
# `redirect_uri` must be provided, and must match your configured URI
$token = $lib->accessToken(code, redirect_uri);

# Usable access token
var_dump($token['body']['access_token']);

# Accepted scopes
var_dump($token['body']['scope']);

# Set the token
$lib->setToken($token['body']['access_token']);

# reference  from official git link   https://github.com/vimeo/vimeo.php

