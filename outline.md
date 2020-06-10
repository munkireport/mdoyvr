# MunkiReport Workshop MacDevOpsYVR 2020

## Who We Are

* [@joncrain](https://joncra.in)
* [@tuxudo](https://github.com/tuxudo)
* [@bochoven](https://www.youtube.com/watch?v=pB8uZ6VVtNg)

## What Are We Doing

1. What is MunkiReport
2. What's New
3. Basic Installation
4. Basic Customizations
5. Modules
6. Advanced Customization
7. Q/A

## What Is It?

Beautiful, simple, extensive, modular reporting for macOS.
* [Dashboards](https://munkireport.azurewebsites.net/public/index.php?/show/dashboard/default)
* [Reports](https://munkireport.azurewebsites.net/public/index.php?/show/report/munkireport/munki)
* [Graphs](https://munkireport.azurewebsites.net/public/index.php?/show/report/reportdata/clients)
* [Listings](https://munkireport.azurewebsites.net/public/index.php?/show/listing/reportdata/clients)
* Client Details

## What's New?

[Releases](https://github.com/munkireport/munkireport-php/releases)

## Basic Installation

```sh
# download release and install
curl -LJO https://github.com/munkireport/munkireport-php/releases/download/v5.5.1/munkireport-php-v5.5.1.zip
unzip ./munkireport-php-v5.5.1.zip -d munkireport-php
cd munkireport-php
echo 'AUTH_METHODS="NOAUTH"' > .env
php database/migrate.php
php -S localhost:8080 -t public
```

```sh
# clone from github install
git clone https://github.com/munkireport/munkireport-php.git
cd munkireport-php
git checkout wip
echo 'AUTH_METHODS="NOAUTH"' > .env
./build/setup_composer.sh
./composer update --no-suggest
php database/migrate.php
php -S localhost:8080 -t public
```

```sh
# enable more modules
echo "MODULES='applications, ard, bluetooth, caching, certificate, disk_report, displays_info, extensions, filevault_status, findmymac, firewall, gpu, ibridge, inventory, mdm_status, munkireport, munkireportinfo, network, network_shares, power, printer, profile, security, softwareupdate, supported_os, timemachine, usb, users, user_sessions, warranty, wifi, event, managedinstalls, munki_facts, munkiinfo'" >> .env
```

```sh
# install client locally
sudo /bin/bash -c "$(curl -s http://localhost:8080/index.php?/install)"
```

```sh
# manually submit the client data
sudo /usr/local/munkireport/munkireport-runner
```

## Basic Customizations

### Side Note - Fake Data

A growing number of modules support fake data for development

```sh
# add fake data (in development!)
php database/faker.php # --records=100
```

### Dashboards

[Dashboard Layouts](https://github.com/munkireport/munkireport-php/tree/master/local/dashboards)

Default Dashboard:

```yml
display_name: My Awesome Dashboard
hotkey: q
row1:
    client:
    messages:
row2:
    new_clients:
    pending_apple:
    pending_munki:
row3:
    munki:
    disk_report:
    uptime:
```

Find more widgets at the [Widget Gallery](https://munkireport.azurewebsites.net/public/index.php?/system/show/widget_gallery)  
Protip: (name of widget = `$filename - _widget.php`)

```yml
row4:
    registered_clients:
row5:
    app1: {appName: "zoom.us", widget: "app"}
    app2: {appName: "Microsoft Word", widget: "app"}
    app3: {appName: "Google Chrome", widget: "app"}
row6:
    hardware_basemodel:
    memory:
```

### Unofficial/Beta Modules

[Current List of Known Unofficial Modules](https://github.com/munkireport/munkireport-php/wiki/Modules#unofficialbeta-modules)

File structure of `local` folder

```sh
$ tree local
local
├── certs
│   └── README.md #SAML cert store
├── dashboards
│   └── README.md # Custom Dashboards
├── module_configs
│   └── README.md # Configs for modules
├── modules
│   └── README.md # Custom modules
├── users
│   └── README.md # Local Users
└── views
    └── widgets # Custom Widgets
        └── README.md
```

1. Add module to a custom module location
2. Enable the module in `.env`
3. Run database migrations `php database/migrate.php`
4. Reinstall client
5. Submit the data

### Customizing with `.env`

```sh
# Layout for the Client Summary Page
CLIENT_DETAIL_WIDGETS="machine_info_1, machine_info_2, storage_detail, hardware_detail, software_detail, ard, manifests_detail, network_detail, users_detail, warranty_detail, security_detail"
# Set the default theme for new logins/users.
DEFAULT_THEME="Slate"
# Set links for MunkiWebAdmin.
MWA2_LINK="https://munkiadmin.domain.com"
# If set to TRUE, will deliver debugging messages in the page.
DEBUG="TRUE"
# Will appear in the title bar of your browser and as heading on each webpage
SITENAME="MacDevOpsYVR"
# Path to the local directory where settings, users and certificates are stored
LOCAL_DIRECTORY_PATH="/usr/local/munkireport-config/local/"
# More at https://github.com/munkireport/munkireport-php/wiki/.env-Settings
```

### More Tips and Tricks

* [The Build Directory](https://github.com/munkireport/munkireport-php/tree/master/build)  
* [Source Control `Local`](https://joncra.in/2019/08/05/munkireport-setup-tweaks.html)
* [autopkg recipes](https://github.com/autopkg/munkireport-recipes)
* Clear the Cache

## Helpful links:

* [MunkiReport Wiki](https://github.com/munkireport/munkireport-php/wiki)
* [Demo site](https://munkireport.azurewebsites.net)
* [Postman Collection](https://github.com/joncrain/munkireport-postman-collection)
* [Create a Module](https://joncra.in/2018/11/30/creating-munkireport-modules.html)
* [FileMaker Pro Template](https://www.precursor.ca/mrq/)
* [These notes?](https://github.com/munkireport/mdoyvr)
* [Full Res Presentation](https://www.dropbox.com/s/965j0bw339hq70d/MDOYVR%20MunkiReport%20Basics.key?dl=0)

## Modules

### Module Marketplace

Demo site version of [Module Marketplace](https://munkireport.azurewebsites.net/public/index.php?/system/show/module_marketplace)

### Major Updates

#### Built in Modules

[Supported OS](https://github.com/munkireport/supported_os)
[Printer](https://github.com/munkireport/printer)
[Bluetooth](https://github.com/munkireport/bluetooth)
[Apple Remote Desktop](https://github.com/munkireport/ard)
[SMART Stats](https://github.com/munkireport/smart_stats)
[WiFi](https://github.com/munkireport/wifi)
[Users](https://github.com/munkireport/users)
[Firewall](https://github.com/munkireport/firewall)

#### Unofficial Modules

[Geekbench](https://github.com/tuxudo/geekbench)
[Jamf](https://github.com/tuxudo/jamf)
[Extension Attributes](https://github.com/tuxudo/extension_attributes)
[TCC](https://github.com/tuxudo/tcc)

## Advanced MunkiReport

Say `please`.