# PHP Client Library for interacting with Epoch's Customer Search API

[![Build Status](https://travis-ci.org/buonzz/epoch-csa-client.svg?branch=master)](https://travis-ci.org/buonzz/epoch-csa-client) [![codecov](https://codecov.io/gh/buonzz/epoch-csa-client/branch/master/graph/badge.svg)](https://codecov.io/gh/buonzz/epoch-csa-client)


This library allows you to easily interact with Epoch's Search API by wrapping the API call into simple objects that validates and ensures the values of the parameter is complete and with correct data type. Most of the classes will throw InvalidArgumentException preventing your app from executing calls to the API with possibly invalid values - thus improving the quality of your app.


## Features

* Validation of each parameter to make sure you are using the correct values
* Mapping of required/optional parameters to each action (search, expire etc)

## Installation

install via composer
```
composer require buonzz/epoch-csa-client
```


## Usage


The following example searches a member by Member ID:
```
use Buonzz\Epoch\CustomerSearch\Client;
use Buonzz\Epoch\CustomerSearch\Actions\Search;
use Buonzz\Epoch\CustomerSearch\Parameters\Memberid;


// create a new parameter object
$memberid = new Memberid(1234587);

// create a new action
$search = new Search();

// create a client to connect to the API
$client = new Client('mahuser', 'mahpass');


// pass the action and array of parameters to execute method of the client object
$output = $client->execute($search, [$memberid]);

// now the result can be used for whatever purpose it may serve
var_dump($output);

```


## Contributing


You can contribute in documentation by editing the files in docs folder.
to re-generate the doc
```
make html
```
