# TYPO3 Extension in2contact

## Introduction

Generic address and personlisting for universities and companies. This is the free core extension, that can be used by
everyone.

* See extension in real live: http://personendatenbank.in2code.de/
* See full description (german only) under: https://www.in2code.de/produkte/personendatenbank/


## Individual modules

in2contact can be extended by individual importers (e.g. from SAP, UnivIS, Digital phone book, etc...). 
It's also possible to extend it with new fields or additional tables or simply map it to an existing table like
fe_users or tt_address.
Please ask Sandra for more information about additional modules or if you need professional services: 
https://www.in2code.de/produkte/personendatenbank/


## Screenshots

<img src="https://box.everhelper.me/attachment/910673/84725fb7-0b3e-4c40-b52e-29d7620777bb/262407-iEttqLwsgsZEzqLo/screen.png" width="500" />

<img src="https://box.everhelper.me/attachment/910671/84725fb7-0b3e-4c40-b52e-29d7620777bb/262407-sOORVfQuAJZAdNyz/screen.png" width="500" />

<img src="https://box.everhelper.me/attachment/910675/84725fb7-0b3e-4c40-b52e-29d7620777bb/262407-gNlKcznG3Ios8vYP/screen.png" width="500" />


## Requirements

* TYPO3 8.7 or newer
* PHP 7.0 or newer


## FAQ

* Q1: Can I use fe_users or tt_address for the persons?
* A1: Of course, you can map persons to any existing table via TypoScript
* Q2: I need to import persons from an external service, but how?
* A2: Please ask in2code for professional service or individual importers

## Changelog

| Version    | Date       | State      | Description                                                                  |
| ---------- | ---------- | ---------- | ---------------------------------------------------------------------------- |
| 1.2.3      | 2018-01-19 | Bugfix     | Allow empty birthdates                                                       |
| 1.2.2      | 2017-12-15 | Bugfix     | Disable chash check for plugin                                               |
| 1.2.1      | 2017-05-11 | Bugfix     | Update cms requirement in composer.json                                      |
| 1.2.0      | 2017-05-11 | Feature    | Add an ABC filter                                                            |
| 1.1.0      | 2017-03-22 | Task       | Remove unneeded fields, some cleanup                                         |
| 1.0.0      | 2017-03-19 | Task       | Initial release                                                              |
