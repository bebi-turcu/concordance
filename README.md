<h1 align="center">Word Concordance</h1>

<p align="center">
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework.svg" alt="License"></a>
</p>

<h4 align="center">A basic web application for calculating stats on words in a given text</h4>

Built using the [Laravel](https://laravel.com/) framework, this basic project allows users to input a text in a form and
see in real time a generated alphabetical list of all word occurrences, labeled with word frequencies. Includes unit tests.

Pre-requisites: PHP 8.0, Composer 2.4 and a webserver like Apache.

------

## Task requirements

This project was built to satisfy the following requirements:

"Given an arbitrary text document written in English, write a program that will generate a
concordance, i.e. an alphabetical list of all word occurrences, labeled with word frequencies.
Label each word with the sentence numbers in which each occurrence appeared."

## Installation

Deploy the project files in a folder of your host by cloning this repository or extracting from a downloaded archive. Then: 

- Run `composer install` in your console
- Point your webserver to folder `/public` and make sure you can access the homepage in a browser: `http://localdomain/`

## Usage

Enter an english text in the form. Newlines are used as sentence separators, as dots are not reliable because of
abbreviations like "i.e.", "etc." ...

On clicking "Submit", an alphabetical list of all word occurrences will show in the right half of the screen, labeled
in the format `{x:a,b,c}`, where `x` is the number of occurrence and `a,b,c` are sentence numbers. 

Unit tests can be run using the console command: `vendor\bin\phpunit`

## License

Job Aggregator is an open-source software licensed under the MIT license.
