# Documentation

## Table of Contents

| Method | Description |
|--------|-------------|
| [**Utilities**](#Utilities) |  |
| [Utilities::empty](#Utilitiesempty) | Returns true only on `null` type, `string` with length of 0 characters (after trimming), or arrays containing arrays with no items, or items only `null` type and `string` with 0 chars length (after trimming). Other types are automatically being considered not empty. |
| [Utilities::array_values_recursive](#Utilitiesarray_values_recursive) | Lists values in array recursively. |
| [Utilities::array_filter_values_recursive](#Utilitiesarray_filter_values_recursive) | Filters values obtained recurisvely from an array. |
| [Utilities::Host](#UtilitiesHost) | Return full host address. |
| [Utilities::EncodeEmail](#UtilitiesEncodeEmail) | Encodes email address to entities. |
| [Utilities::ValidateEmail](#UtilitiesValidateEmail) | Validates email address. |
| [Utilities::scandir_clean](#Utilitiesscandir_clean) | Works as `scandir()` but removes relative and parent dots pointers. |
| [Utilities::trim_path](#Utilitiestrim_path) | Trims and removes errorenous path parts, forbids relative directory tree traversal. |
| [Utilities::array_values_not_null](#Utilitiesarray_values_not_null) | Recursively check if any of the values is empty. |
| [Utilities::array_column_recursive](#Utilitiesarray_column_recursive) |  |
| [Utilities::array_clear](#Utilitiesarray_clear) | All values to `null`, leave key/index structure as-is. |
| [Utilities::array_map_recursive](#Utilitiesarray_map_recursive) | Recursive `array_map()` function. |
| [Utilities::array_filter_recursive](#Utilitiesarray_filter_recursive) | Leaves integers, floats and bools that otherwise may be considered empty (0 or FALSE). |
| [Utilities::array_keys_exist](#Utilitiesarray_keys_exist) | Check if all passed keys exist in array. |
| [Utilities::array_all_true](#Utilitiesarray_all_true) | Check if all of the items in array are bool `TRUE`. Assumed that all items are boolean ONLY. |
| [Utilities::array_only_bool_true](#Utilitiesarray_only_bool_true) | Checks if every value in array is a `true` boolean type. |
| [Utilities::file_exists_suggest](#Utilitiesfile_exists_suggest) | Filename suggestion if path already used. |
| [Utilities::copy_directory](#Utilitiescopy_directory) | Copy directory with files from one path to another. |
| [Utilities::is_object_of_class](#Utilitiesis_object_of_class) | Checks if passed variable is of a specific class. |
| [Utilities::proper_class_name](#Utilitiesproper_class_name) | Checks if class name is proper to be used with PHP. |
| [Utilities::proper_property_name](#Utilitiesproper_property_name) | Check if name can be used as a variable/property name. |
| [Utilities::safechars](#Utilitiessafechars) | Strips string from characters considered not safe. |
| [Utilities::MimeByExtension](#UtilitiesMimeByExtension) | Returns some epxected MIME-types by file extension. |
| [Utilities::scandir_clean_files](#Utilitiesscandir_clean_files) |  |
| [Utilities::GetFilesFromPath](#UtilitiesGetFilesFromPath) | Returns only filenames from given path. |
| [Utilities::GetFilesFromPathRecursive](#UtilitiesGetFilesFromPathRecursive) | Return all files from given path recursively. |
| [Utilities::scandir_clean_dirs](#Utilitiesscandir_clean_dirs) |  |
| [Utilities::GetDirectoriesFromPath](#UtilitiesGetDirectoriesFromPath) | Returns directories from given path. |
| [Utilities::rmdir_files_recursive](#Utilitiesrmdir_files_recursive) | Removes files and directories recursively. |

## Utilities





* Full name: \tei187\Utilities


### Utilities::empty

Returns true only on `null` type, `string` with length of 0 characters (after trimming), or arrays containing arrays with no items, or items only `null` type and `string` with 0 chars length (after trimming). Other types are automatically being considered not empty.

```php
Utilities::empty( mixed val, bool strict = true ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `val` | **mixed** | Value to evaluate if empty. |
| `strict` | **bool** | Switch. If `FALSE` returns as basic `empty()` function. If `TRUE` returns after check for type and context. |


**Return Value:**





---
### Utilities::array_values_recursive

Lists values in array recursively.

```php
Utilities::array_values_recursive( array array, bool unique = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `unique` | **bool** |  |


**Return Value:**





---
### Utilities::array_filter_values_recursive

Filters values obtained recurisvely from an array.

```php
Utilities::array_filter_values_recursive( array array, bool strict = true, bool unique = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `strict` | **bool** | Flag. If true, removes only `NULL` and strings which after trimming equal to `` or length is 0. If false, compares by default `empty()` function. |
| `unique` | **bool** | If true returns only unique values. |


**Return Value:**





---
### Utilities::Host

Return full host address.

```php
Utilities::Host(  ): string
```



* This method is **static**.

**Return Value:**





---
### Utilities::EncodeEmail

Encodes email address to entities.

```php
Utilities::EncodeEmail( string e ): string|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `e` | **string** | Email address. |


**Return Value:**





---
### Utilities::ValidateEmail

Validates email address.

```php
Utilities::ValidateEmail( string e ): string|false
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `e` | **string** |  |


**Return Value:**





---
### Utilities::scandir_clean

Works as `scandir()` but removes relative and parent dots pointers.

```php
Utilities::scandir_clean( string path, bool fullpaths = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** |  |
| `fullpaths` | **bool** | If `TRUE` returns entire path to resource. `FALSE` by default, returning only files and directory names. |


**Return Value:**





---
### Utilities::trim_path

Trims and removes errorenous path parts, forbids relative directory tree traversal.

```php
Utilities::trim_path( string v, bool restrictDots = true ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `v` | **string** |  |
| `restrictDots` | **bool** |  |


**Return Value:**





---
### Utilities::array_values_not_null

Recursively check if any of the values is empty.

```php
Utilities::array_values_not_null( array array, bool pathContext = false, bool restrictDots = false ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `pathContext` | **bool** |  |
| `restrictDots` | **bool** |  |


**Return Value:**





---
### Utilities::array_column_recursive



```php
Utilities::array_column_recursive( array haystack, mixed needle ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `haystack` | **array** |  |
| `needle` | **mixed** |  |


**Return Value:**




**See Also:**

* https://github.com/NinoSkopac/array_column_recursive - 

---
### Utilities::array_clear

All values to `null`, leave key/index structure as-is.

```php
Utilities::array_clear( array a ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `a` | **array** |  |


**Return Value:**





---
### Utilities::array_map_recursive

Recursive `array_map()` function.

```php
Utilities::array_map_recursive( array &arr, callable fn ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `arr` | **array** |  |
| `fn` | **callable** |  |


**Return Value:**





---
### Utilities::array_filter_recursive

Leaves integers, floats and bools that otherwise may be considered empty (0 or FALSE).

```php
Utilities::array_filter_recursive( array arr ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `arr` | **array** |  |


**Return Value:**





---
### Utilities::array_keys_exist

Check if all passed keys exist in array.

```php
Utilities::array_keys_exist( array keys, array array ): bool
```

Useful for verifying if structure is correct.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `keys` | **array** |  |
| `array` | **array** |  |


**Return Value:**





---
### Utilities::array_all_true

Check if all of the items in array are bool `TRUE`. Assumed that all items are boolean ONLY.

```php
Utilities::array_all_true( array array ): bool
```

Not recursive.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### Utilities::array_only_bool_true

Checks if every value in array is a `true` boolean type.

```php
Utilities::array_only_bool_true( array array ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**

True if only `true` boolean, false if other found.



---
### Utilities::file_exists_suggest

Filename suggestion if path already used.

```php
Utilities::file_exists_suggest( string path, string suggestType = 'timestamp', bool returnPath = false ): string|false
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** |  |
| `suggestType` | **string** | Can be `&#039;timestamp&#039;` or `&#039;iterator&#039;`. |
| `returnPath` | **bool** |  |


**Return Value:**

Suggested filename or path to it, otherwise `FALSE`.



---
### Utilities::copy_directory

Copy directory with files from one path to another.

```php
Utilities::copy_directory( string from, string to ): bool
```

**WARNING:** it is not app-dir limited, so picking "/" for form will start copying your root path.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `from` | **string** |  |
| `to` | **string** |  |


**Return Value:**





---
### Utilities::is_object_of_class

Checks if passed variable is of a specific class.

```php
Utilities::is_object_of_class( object|mixed obj, string class ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `obj` | **object\|mixed** | Variable to test. |
| `class` | **string** | Class name. |


**Return Value:**

If not object or not an object of specified class, returns `FALSE`. Otherwise `TRUE`.



---
### Utilities::proper_class_name

Checks if class name is proper to be used with PHP.

```php
Utilities::proper_class_name( string name ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** |  |


**Return Value:**





---
### Utilities::proper_property_name

Check if name can be used as a variable/property name.

```php
Utilities::proper_property_name( string name ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** |  |


**Return Value:**





---
### Utilities::safechars

Strips string from characters considered not safe.

```php
Utilities::safechars( mixed text ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `text` | **mixed** |  |


**Return Value:**





---
### Utilities::MimeByExtension

Returns some epxected MIME-types by file extension.

```php
Utilities::MimeByExtension( string ext ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `ext` | **string** |  |


**Return Value:**





---
### Utilities::scandir_clean_files



```php
Utilities::scandir_clean_files( mixed path, bool fullPaths = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **mixed** |  |
| `fullPaths` | **bool** |  |


**Return Value:**




**See Also:**

* \tei187\Utilities::GetFilesFromPath() - Alias.

---
### Utilities::GetFilesFromPath

Returns only filenames from given path.

```php
Utilities::GetFilesFromPath( string path, bool fullPaths = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Path. |
| `fullPaths` | **bool** | Return only filenames or entire paths. |


**Return Value:**

If path doesn't exist, returns empty array.



---
### Utilities::GetFilesFromPathRecursive

Return all files from given path recursively.

```php
Utilities::GetFilesFromPathRecursive( mixed path ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **mixed** |  |


**Return Value:**





---
### Utilities::scandir_clean_dirs



```php
Utilities::scandir_clean_dirs( mixed path, bool fullPaths = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **mixed** |  |
| `fullPaths` | **bool** |  |


**Return Value:**




**See Also:**

* \tei187\Utilities::GetDirectoriesFromPath() - Alias.

---
### Utilities::GetDirectoriesFromPath

Returns directories from given path.

```php
Utilities::GetDirectoriesFromPath( mixed path, bool fullPaths = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **mixed** |  |
| `fullPaths` | **bool** |  |


**Return Value:**





---
### Utilities::rmdir_files_recursive

Removes files and directories recursively.

```php
Utilities::rmdir_files_recursive( mixed path ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **mixed** |  |


**Return Value:**





---
