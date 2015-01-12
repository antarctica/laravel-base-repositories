# Laravel Base Repositories

A set of base [repository](http://msdn.microsoft.com/en-us/library/ff649690.aspx) interfaces and default implementations for Laravel applications.

## Installing

Require this package in your `composer.json` file:

```json
{
	"require-dev": {
		"antarctica/laravel-base-repositories": "~0.2"
	}
}
```

Run `composer update`.

## Usage

### `BaseRepositoryInterface`

This package provides a very minimal interface of required methods for an abstract repository. That it is to say to aims to describe most of the basic/fundamental methods a typical repository/model would need.

For example: *find resource `x`* or *create a resource*.

Where a repository needs more specialised methods, to suit its particular needs, these can be added either directly to a repository class or to another interface that extends this one (if these extra methods are needed by other repositories).

Essentially this base interface is designed to provide the most common functionality that will almost certainly be needed.

See `BaseRepositoryInterface.php` for the specific methods this interface requires, each is documented inline using PHP DocBlocks.

##### Return types

In order to provide as neutral an interface as possible, data **MUST** be returned as **PHP standard arrays**.

This is to ensure implementations remain interoperable with each other by using a lowest common denominator approach.

This is specified within the implementation through type hinted DocBlock properties. However these rely on a either manual validation or features provided by your editor to be enforced.

#### Basic usage (Laravel)

```php
<?php

use Antarctica\LaravelBaseRepositories\Repository\BaseRepositoryInterface;

abstract class BaseRepositoryEloquent implements BaseRepositoryInterface {

}
```

### `BaseRepositoryEloquent`

This package provides a default implementation of the `BaseRepositoryInterface` using [Laravel's Eloquent ORM](http://laravel.com/docs/4.2/eloquent).

This class uses a given Eloquent model to implement the required repository methods in their most basic form.

E.g. the `all()` method returns `$this->model->all();` without any default where clauses, sorting etc.

Essentially this base implementation is designed to prevent you having to write implementations for basic functions (such as delete) to allow you to focus on the cases where you need custom functionality.

This provides a neutral base which more targeted specific classes can extend to target the methods they need, rather than implementing of the required methods that may be no different than normal.

See `BaseRepositoryEloquent.php` for details on how each method is implemented, PHP DocBlocks are used to document each method inline.

#### Return types

To ensure all methods return data in the format data type/structure a common `export()` method is used. This method accepts data in a variety of types (such as an Eloquent collection) and provides functionality to convert these complex data structures into a standard array.

It is possible to extend this function (currently only by replacement) to add support for other input types as needed.

#### Basic usage (Laravel)

```php
<?php

use Antarctica\LaravelBaseRepositories\Repository\BaseRepositoryEloquent;
use User;

class UserRepositoryEloquent extends BaseRepositoryEloquent {

    /**
     * @var User
     */
    protected $model;

    /**
     * @param User $model
     */
    function __construct(User $model)
    {
        $this->model = $model;
    }
}
```

## Contributing

This project welcomes contributions, see `CONTRIBUTING` for our general policy.

## Developing

To aid development and keep your local computer clean, a VM (managed by Vagrant) is used to create an isolated environment with all necessary tools/libraries available.

### Requirements

* Mac OS X
* Ansible `brew install ansible`
* [VMware Fusion](http://vmware.com/fusion)
* [Vagrant](http://vagrantup.com) `brew cask install vmware-fusion vagrant`
* [Host manager](https://github.com/smdahlen/vagrant-hostmanager) and [Vagrant VMware](http://www.vagrantup.com/vmware) plugins `vagrant plugin install vagrant-hostmanager && vagrant plugin install vagrant-vmware-fusion`
* You have a private key `id_rsa` and public key `id_rsa.pub` in `~/.ssh/`
* You have an entry like [1] in your `~/.ssh/config`

[1] SSH config entry

```shell
Host bslweb-*
    ForwardAgent yes
    User app
    IdentityFile ~/.ssh/id_rsa
    Port 22
```

### Provisioning development VM

VMs are managed using Vagrant and configured by Ansible.

```shell
$ git clone ssh://git@stash.ceh.ac.uk:7999/basweb/laravel-base-repositories.git
$ cp ~/.ssh/id_rsa.pub laravel-base-repositories/provisioning/public_keys/
$ cd laravel-base-repositories
$ ./armadillo_standin.sh

$ vagrant up

$ ssh bslweb-laravel-base-repositories-dev-node1
$ cd /app

$ composer install

$ logout
```

### Committing changes

The [Git flow](https://github.com/fzaninotto/Faker#formatters) workflow is used to manage development of this package.

Discrete changes should be made within *feature* branches, created from and merged back into *develop* (where small one-line changes may be made directly).

When ready to release a set of features/changes create a *release* branch from *develop*, update documentation as required and merge into *master* with a tagged, [semantic version](http://semver.org/) (e.g. `v1.2.3`).

After releases the *master* branch should be merged with *develop* to restart the process. High impact bugs can be addressed in *hotfix* branches, created from and merged into *master* directly (and then into *develop*).

### Issue tracking

Issues, bugs, improvements, questions, suggestions and other tasks related to this package are managed through the BAS Web & Applications Team Jira project ([BASWEB](https://jira.ceh.ac.uk/browse/BASWEB)).

### Clean up

To remove the development VM:

```shell
vagrant halt
vagrant destroy
```

The `laravel-base-repositories` directory can then be safely deleted as normal.

## License

Copyright 2014 NERC BAS. Licensed under the MIT license, see `LICENSE` for details.