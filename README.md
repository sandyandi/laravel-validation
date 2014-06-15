# Extended Laravel Validation

This is a slightly modified version of KaneCohen's [laravel-validation](https://github.com/KaneCohen/laravel-validation) library that focuses on displaying individual error messages and utilizing Laravel's validation language file.

## Installation

1. Add the following to your `require` `composer.json` file:

 `"sandyandi/validation": "dev-master"`

2. Run `composer update` and wait for it to download and install.
3. Open `app/config/app.php`, comment out Laravel's default validation service provider: `'Illuminate\Validation\ValidationServiceProvider',` and add this library's service provider `'Sandyandi\Validation\ValidationServiceProvider',`

## Usage

The core usage documentation is found here: [laravel-validation](https://github.com/KaneCohen/laravel-validation#usage)

The modification made to this library are the following:

* You can use indexes in your validation rules array, eg:

 ```php
 $rules = array(
        'income_sources:0:employer_name' => 'required',
        'income_sources:1:employer_name' => 'required'
 );
 ```

 If the validation fails, you can know which `employer_name` failed the validation as it has an index and you can show it's individual error message using something like:

 ```php
 $errors->has('income_sources:0:employer_name');
 ```

 ...or

 ```php
 $errors->first('income_sources:0:employer_name');
 ```

 **Tip:** Use a loop to create those indexes.

* You can use the validation language file (`app/lang/en/validation.php`) like the following:

 ```php
 'custom' => array(
        'income_sources:employer_name' => 'Please let us know who your employer is.'
 )
 ```

 ...and

 ```php
 'attributes' => array(
        'income_sources:employer_name' => 'employer name.'
 )
 ```

 And those language keys will refer to validation rule keys like `'income_sources:0:employer_name'`, `'income_sources:1:employer_name'` _(whatever index you specify)_ or `'income_sources:*:employer_name'`