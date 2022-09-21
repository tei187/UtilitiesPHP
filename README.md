# Documentation

## Table of Contents

| Method | Description |
|--------|-------------|
| [**Utilities**](#Utilities) |  |
| [Utilities::array_all_true](#Utilitiesarray_all_true) | Check if all of the items in array are bool `TRUE`. Assumed that all items are boolean ONLY. |
| [Utilities::array_clear](#Utilitiesarray_clear) | All values to `null`, leave key/index structure as-is. |
| [Utilities::array_column_recursive](#Utilitiesarray_column_recursive) | Gets column from array recursively. |
| [Utilities::array_filter_recursive](#Utilitiesarray_filter_recursive) | Leaves integers, floats and bools that otherwise may be considered empty (0 or FALSE). |
| [Utilities::array_filter_values_recursive](#Utilitiesarray_filter_values_recursive) | Filters values obtained recurisvely from an array. |
| [Utilities::array_map_recursive](#Utilitiesarray_map_recursive) | Recursive `array_map()` function. |
| [Utilities::array_only_bool_true](#Utilitiesarray_only_bool_true) | Checks if every value in array is a `true` boolean type. |
| [Utilities::array_values_not_null](#Utilitiesarray_values_not_null) | Recursively check if any of the values is empty. |
| [Utilities::array_values_recursive](#Utilitiesarray_values_recursive) | Lists values in array recursively. |
| [Utilities::array_keys_exist](#Utilitiesarray_keys_exist) | Check if all passed keys exist in array. |
| [Utilities::copy_directory](#Utilitiescopy_directory) | Copy directory with files from one path to another. |
| [Utilities::empty](#Utilitiesempty) | Returns true only on `null` type, `string` with length of 0 characters (after trimming), or arrays containing arrays with no items, or items only `null` type and `string` with 0 chars length (after trimming). Other types are automatically being considered not empty. |
| [Utilities::EncodeEmail](#UtilitiesEncodeEmail) | Encodes email address to entities. |
| [Utilities::file_exists_suggest](#Utilitiesfile_exists_suggest) | Filename suggestion if path already used. |
| [Utilities::GetDirectoriesFromPath](#UtilitiesGetDirectoriesFromPath) | Returns directories from given path. |
| [Utilities::GetFilesFromPath](#UtilitiesGetFilesFromPath) | Returns only filenames from given path. |
| [Utilities::GetFilesFromPathRecursive](#UtilitiesGetFilesFromPathRecursive) | Return all files from given path recursively. |
| [Utilities::Host](#UtilitiesHost) | Return full host address. |
| [Utilities::is_object_of_class](#Utilitiesis_object_of_class) | Checks if passed variable is of a specific class. |
| [Utilities::MimeByExtension](#UtilitiesMimeByExtension) | Returns some epxected MIME-types by file extension. |
| [Utilities::modTime](#UtilitiesmodTime) | Retrieves modification time from given file. |
| [Utilities::not_outside_document_root](#Utilitiesnot_outside_document_root) | Checks if path is not outside of document root, as specified in *$_SERVER[&#039;DOCUMENT_ROOT&#039;]*. |
| [Utilities::outside_document_root](#Utilitiesoutside_document_root) | Alias of inverted `self::not_outside_document_root` :D |
| [Utilities::get_absolute_path](#Utilitiesget_absolute_path) | Returns absolute path based on input. Does not verify whether the path exists or not. |
| [Utilities::proper_class_name](#Utilitiesproper_class_name) | Checks if class name is proper to be used with PHP. |
| [Utilities::proper_property_name](#Utilitiesproper_property_name) | Check if name can be used as a variable/property name. |
| [Utilities::rmdir_files_recursive](#Utilitiesrmdir_files_recursive) | Removes files and directories recursively. |
| [Utilities::safechars](#Utilitiessafechars) | Strips string from characters considered not safe. |
| [Utilities::scandir_clean](#Utilitiesscandir_clean) | Works as `scandir()` but removes relative and parent dots pointers. |
| [Utilities::scandir_clean_dirs](#Utilitiesscandir_clean_dirs) |  |
| [Utilities::scandir_clean_files](#Utilitiesscandir_clean_files) |  |
| [Utilities::trim_path](#Utilitiestrim_path) | Trims and removes errorenous path parts, forbids relative directory tree traversal. |
| [Utilities::ValidateEmail](#UtilitiesValidateEmail) | Validates email address. |

## Utilities





* Full name: \tei187\Utilities


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
### Utilities::array_clear

All values to `null`, leave key/index structure as-is.

```php
Utilities::array_clear( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


**Return Value:**





---
### Utilities::array_column_recursive

Gets column from array recursively.

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
### Utilities::array_filter_recursive

Leaves integers, floats and bools that otherwise may be considered empty (0 or FALSE).

```php
Utilities::array_filter_recursive( array array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |


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
| `array` | **array** | Input array. |
| `strict` | **bool** | Flag. If true, removes only `NULL` and strings which after trimming equal to `` or length is 0. If false, compares by default `empty()` function. |
| `unique` | **bool** | If true returns only unique values. |


**Return Value:**





---
### Utilities::array_map_recursive

Recursive `array_map()` function.

```php
Utilities::array_map_recursive( array &array, callable fn ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `array` | **array** |  |
| `fn` | **callable** |  |


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
| `array` | **array** | Array to check. |


**Return Value:**

`TRUE` if only `true` boolean, `FALSE` if other found.



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
| `array` | **array** | Input array. |
| `pathContext` | **bool** | Flag. If TRUE treats items as paths. |
| `restrictDots` | **bool** | Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path. |


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
| `array` | **array** | Input array. |
| `unique` | **bool** | Flag switch. If TRUE returns only unique values. |


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
| `keys` | **array** | Array with items with values corresponding to keys to check against. |
| `array` | **array** | Array to check keys against. |


**Return Value:**





---
### Utilities::copy_directory

Copy directory with files from one path to another.

```php
Utilities::copy_directory( string from, string to, bool limitRoot = true, bool restrictDots = true ): bool
```

**WARNING:** it is not app-dir limited, so picking "/" for from will start copying your root path.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `from` | **string** | Path to copy from. |
| `to` | **string** | Path to copy to. |
| `limitRoot` | **bool** | Flag. |
| `restrictDots` | **bool** | Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path. |


**Return Value:**





---
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
### Utilities::EncodeEmail

Encodes email address to entities.

```php
Utilities::EncodeEmail( string email ): string|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `email` | **string** | Email address. |


**Return Value:**





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
| `path` | **string** | Path to check. |
| `suggestType` | **string** | Can be `&#039;timestamp&#039;` or `&#039;iterator&#039;`. |
| `returnPath` | **bool** | If `TRUE` returns entire path to file, if `FALSE` only the filename. `FALSE` by default. |


**Return Value:**

Suggested filename or path to it, otherwise `FALSE`.



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
| `path` | **mixed** | Path. |
| `fullPaths` | **bool** | If `TRUE` returns entire path to resource. `FALSE` by default, returning only directory names. |


**Return Value:**





---
### Utilities::GetFilesFromPath

Returns only filenames from given path.

```php
Utilities::GetFilesFromPath( string path, bool fullPaths = false, bool restrictDots = true ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Path. |
| `fullPaths` | **bool** | Return only filenames or entire paths. By default FALSE. |
| `restrictDots` | **bool** | Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path. |


**Return Value:**

If path doesn't exist, returns empty array.



---
### Utilities::GetFilesFromPathRecursive

Return all files from given path recursively.

```php
Utilities::GetFilesFromPathRecursive( mixed path, bool fullPaths = false, bool restrictDots = true ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **mixed** | Path. |
| `fullPaths` | **bool** | Return only filenames or entire paths. By default FALSE. |
| `restrictDots` | **bool** | Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path. |


**Return Value:**

If path doesn't exist, returns empty array.



---
### Utilities::Host

Return full host address.

```php
Utilities::Host(  ): string
```



* This method is **static**.

**Return Value:**

Formatted string [http|https]://domain:port



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
### Utilities::MimeByExtension

Returns some epxected MIME-types by file extension.

```php
Utilities::MimeByExtension( string ext ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `ext` | **string** | Extension. |


**Return Value:**





---
### Utilities::modTime

Retrieves modification time from given file.

```php
Utilities::modTime( string path, bool formatted = false, bool pathSafe = true ): string|int|false
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Path to resource. |
| `formatted` | **bool** | If `formatted` set to true, if `true` will return as a `Y-m-d_His` formatted string, otherwise `Y-m-d, H:i:s` formatted string. |
| `pathSafe` | **bool** |  |


**Return Value:**

String or integer if found, false if file does not exist.



---
### Utilities::not_outside_document_root

Checks if path is not outside of document root, as specified in *$_SERVER['DOCUMENT_ROOT']*.

```php
Utilities::not_outside_document_root( string path = "", string|null basePath = null, bool restrictDots = true ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Path to check. |
| `basePath` | **string\|null** | Base path to check against. If `null` will use `$_SERVER[&#039;DOCUMENT_ROOT]` instead. |
| `restrictDots` | **bool** | Flag. If `TRUE` removes traversal and relative dots (`..`, `.`) from input path. |


**Return Value:**





---
### Utilities::outside_document_root

Alias of inverted `self::not_outside_document_root` :D

```php
Utilities::outside_document_root( string path = "", string|null basePath = null, bool restrictDots = true ): bool
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** |  |
| `basePath` | **string\|null** |  |
| `restrictDots` | **bool** |  |


**Return Value:**





---
### Utilities::get_absolute_path

Returns absolute path based on input. Does not verify whether the path exists or not.

```php
Utilities::get_absolute_path( string path ): string
```

Will recognize some structures in `$path` argument:
* `.` - if place at beginning of variable, forms absolute path in relation to current directory.
* `..` - skips to parent directory. If used on root being current directory, does nothing.
* `\\` - if placed at beginning of variable, will treat as Windows network share
* `/` - if placed at beginning of variable, forms absolute path in relation to root directory.

Otherwise assumes `DOCUMENT_ROOT` as the base path.

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Path to parse. Will not recognize difference between `/` or `\`. |


**Return Value:**





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
| `name` | **string** | Class name to check. |


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
| `name` | **string** | Property name to check. |


**Return Value:**





---
### Utilities::rmdir_files_recursive

Removes files and directories recursively.

```php
Utilities::rmdir_files_recursive( mixed path, string[] blacklist = [], bool limitRoot = true, bool restrictDots = true ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **mixed** | Path. |
| `blacklist` | **string[]** | Array with paths that should be blacklisted and not used with function (e.g. system root). Very important to set up if `limitRoot` parameter is set to FALSE. |
| `limitRoot` | **bool** | Flag. If TRUE will check if the script is in scope of document root. |
| `restrictDots` | **bool** | Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path. |


**Return Value:**





---
### Utilities::safechars

Strips string from characters considered not safe.

```php
Utilities::safechars( mixed text ): string
```

Replaces "..", "/", "\\", ":", "*", "?", '"', "<", ">", "|", ";" with "-".

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `text` | **mixed** | Input text. |


**Return Value:**





---
### Utilities::scandir_clean

Works as `scandir()` but removes relative and parent dots pointers.

```php
Utilities::scandir_clean( string path, bool fullPaths = false, bool restrictDots = true ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Path to scan. |
| `fullPaths` | **bool** | Return only filenames or entire paths. By default FALSE. |
| `restrictDots` | **bool** | Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path. |


**Return Value:**

Array of paths.



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
### Utilities::scandir_clean_files



```php
Utilities::scandir_clean_files( mixed path, bool fullPaths = false, bool restrictDots = true ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **mixed** |  |
| `fullPaths` | **bool** |  |
| `restrictDots` | **bool** |  |


**Return Value:**




**See Also:**

* \tei187\Utilities::GetFilesFromPath() - Alias.

---
### Utilities::trim_path

Trims and removes errorenous path parts, forbids relative directory tree traversal.

```php
Utilities::trim_path( string path, bool restrictDots = true ): mixed|string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Input path. |
| `restrictDots` | **bool** | Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path. |


**Return Value:**





---
### Utilities::ValidateEmail

Validates email address.

```php
Utilities::ValidateEmail( string email ): string|false
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `email` | **string** | Email address. |


**Return Value:**





---
