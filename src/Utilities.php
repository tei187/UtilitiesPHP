<?php
namespace tei187;

class Utilities {
    /**
     * List of allowed HTML element tags that are considered safe for use in HTML e-mails.
     * 
     * @link https://helpdesk.bitrix24.com/open/14099114/
     */
    const EMAIL_ALLOWED_HTML_TAGS = [
        "a", "b", "br", "big", "blockquote", "caption", "code", "del", "div", "dt", "dd", "font", 
        "h1", "h2", "h3", "h4", "h5". "h6", "hr", "i", "img", "ins", "li", "map", "ol", "p", "s", 
        "small", "strong", "span", "sub", "sup", "table", "tbody", "td", "tfoot", "th", "thead", 
        "tr", "u", "ul", "php", "html", "head", "body", "meta", "title", "style", "link", "DOCTYPE"
    ];

    /**
     * Check if all of the items in array are bool `TRUE`. Assumed that all items are boolean ONLY.
     * 
     * Not recursive.
     *
     * @param array $array
     * @return boolean
     */
    static function array_all_true(array $array) : bool {
        return
            in_array(false, $array, true)
                ? false
                : true;
    }

    /**
     * All values to `null`, leave key/index structure as-is.
     *
     * @param array $array
     * @return array
     */
    static function array_clear(array $array) : array {
        array_walk_recursive(
            $array, 
            function($item, $key) { return $item = null; }
        );
        return $array;
    }

    /**
     * Gets column from array recursively.
     * 
     * @link https://github.com/NinoSkopac/array_column_recursive
     *
     * @param array $haystack
     * @param mixed $needle
     * @return array
     */
    static function array_column_recursive(array $haystack, $needle) : array {
        $found = [];
        array_walk_recursive($haystack, function($value, $key) use (&$found, $needle) {
            if ($key == $needle)
                $found[] = $value;
        });
        return $found;
    }

    /**
     * Leaves integers, floats and bools that otherwise may be considered empty (0 or FALSE).
     *
     * @param array $array
     * @return array
     */
    static function array_filter_recursive(array $array) : array {
        foreach($array as $key => $item) {
            if(empty($item) && !is_array($item) && !is_int($item) && !is_bool($item) && !is_float($item)) {
                unset($array[$key]);
            }

            if(is_array($item)) {
                $array[$key] = self::array_filter_recursive($array[$key]);
            }
        }

        return $array;
    }

    /**
     * Filters values obtained recurisvely from an array.
     *
     * @param array $array Input array.
     * @param boolean $strict Flag. If true, removes only `NULL` and strings which after trimming equal to `` or length is 0. If false, compares by default `empty()` function.
     * @param boolean $unique If true returns only unique values.
     * @return array
     */
    static function array_filter_values_recursive(array $array, bool $strict = true, $unique = false) : array {
        $list = self::array_values_recursive($array, $unique);

        if(!$strict) {
            foreach($list as $k => $value) {
                if(empty($value))
                    unset($list[$k]);
            }
        } else {
            foreach($list as $k => $value) {
                switch(gettype($value)) {
                    case "NULL": case "null":
                        unset($list[$k]);
                        break;
                    case "string":
                        if(trim($value) === '' || strlen(trim($value)) == 0)
                            unset($list[$k]);
                        break;
                    case "boolean": case "integer": case "double": case "float": case "object": case "resource": case "resource (closed)": case "unknown type": 
                    default:
                        break;
                }
            }
        }

        return array_values($list);
    }

    /**
     * Recursive `array_map()` function.
     *
     * @param array $array
     * @param callback $fn
     * @return array
     */
    static function array_map_recursive(&$array, $fn) : array {
        return array_map(
            function($item) use($fn){
                return 
                    is_array($item) 
                        ? self::array_map_recursive($item, $fn) 
                        : $fn($item);
            }, 
            $array);
    }

    /**
     * Checks if every value in array is a `true` boolean type.
     *
     * @param array $array Array to check.
     * @return boolean `TRUE` if only `true` boolean, `FALSE` if other found.
     */
    static function array_only_bool_true(array $array) : bool {
        if(!empty($array)) {
            $temp = array_unique($array, SORT_REGULAR);
            $key = array_search(true, $temp, true);
            if($key !== false) {
                unset($temp[$key]);
            }
            $key = array_search(null, $temp, true);
            if($key !== false) {
                unset($temp[$key]);
            }
            
            return
                count($temp) > 0
                    ? false
                    : true;
        }
        return true;
    }

    /**
     * Recursively check if any of the values is empty.
     *
     * @todo what is this all about? something is off with forach and $output
     * 
     * @param array $array Input array.
     * @param boolean $pathContext Flag. If TRUE treats items as paths.
     * @param boolean $restrictDots Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path.
     * @return boolean
     */
    static function array_values_not_null(array $array, bool $pathContext = false, bool $restrictDots = false) : bool {
        $outcome = true;

        foreach($array as $v) {
            if(is_string($v) && $pathContext) {
                $v = self::trim_path($v, $restrictDots);
            }

            if(empty($v) && !is_int($v)) {
                $outcome = false;
            } elseif(!empty($v) && is_array($v)) {
                $outcome = self::array_values_not_null($v, $pathContext, $restrictDots);
            }
        }

        return $outcome;
    }

    /**
     * Lists values in array recursively.
     *
     * @param array $array Input array.
     * @param boolean $unique Flag switch. If TRUE returns only unique values.
     * @return array
     */
    static function array_values_recursive(array $array, bool $unique = false) : array {
        $pool = [];
        foreach($array as $k => $val) {
            is_array($val)
                ? $pool = array_merge($pool, self::array_values_recursive($array[$k]))
                : $pool[] = $val;
        }

        return 
            $unique === true
                ? array_unique($pool)
                : $pool;
    }

    /**
     * Check if all passed keys exist in array.
     * 
     * Useful for verifying if structure is correct.
     *
     * @param array $keys Array with items with values corresponding to keys to check against.
     * @param array $array Array to check keys against.
     * @return boolean
     */
    static function array_keys_exist(array $keys, array $array) : bool {
        foreach($keys as $key) {
            if(!array_key_exists($key, $array)) return false;
        }
        return true;
    }

    /**
     * Copy directory with files from one path to another.
     * 
     * **WARNING:** it is not app-dir limited, so picking "/" for from will start copying your root path.
     *
     * @param string $from Path to copy from.
     * @param string $to Path to copy to.
     * @param boolean $limitRoot Flag.
     * @param boolean $restrictDots Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path.
     * @return boolean
     */
    static function copy_directory(string $from, string $to, bool $limitRoot = true, bool $restrictDots = true) : bool {
        $from = realpath(self::trim_path($from, $restrictDots));
        $to   = realpath(self::trim_path($to,   $restrictDots));

        if($limitRoot) {
            if(!self::not_outside_document_root($from) || !self::not_outside_document_root($to))
                return false;
        }

        if(is_dir($from)) {
            $from = realpath($from);
            $to = rtrim(str_replace("/", "\\", self::trim_path($to)), "\\/");
            $check = [];
            
            if((!is_dir($to) && mkdir($to, fileperms($from), true)) || is_dir($to)) {
                $files = self::GetFilesFromPath($from, false);
                $directories = self::GetDirectoriesFromPath($from, true);
                foreach($files as $file) {
                    if(!copy($from . "/" . $file, $to . "/" . $file)) {
                        $check[] = "Could not copy " . $from . "/" . $file;
                    }
                }

                foreach($directories as $directory) {
                    $directoryTo = trim(str_replace($from, "", $directory), "\\/");
                    if(!is_dir($to . "/". $directoryTo) && !mkdir($to . "/". $directoryTo)) {
                        $check[] = "Could not create" . $to . "/" . $directoryTo;
                    } else {
                        $t = self::copy_directory($from . "/" . $directoryTo, $to . "/" . $directoryTo);
                        if($t !== true) {
                            $check = array_merge($check, $t);
                        }
                    }
                }
            }
        }

        return
            empty($check)
                ? true
                : false;
    }

    /**
     * Returns true only on `null` type, `string` with length of 0 characters (after trimming), or arrays containing arrays with no items, or items only `null` type and `string` with 0 chars length (after trimming). Other types are automatically being considered not empty.
     *
     * @param mixed $val Value to evaluate if empty.
     * @param boolean $strict Switch. If `FALSE` returns as basic `empty()` function. If `TRUE` returns after check for type and context.
     * @return boolean
     */
    static function empty($val, bool $strict = true) : bool {
        if(!$strict) {
            return empty($val);
        } else {
            switch(gettype($val)) {
                case "boolean": case "integer": case "double": case "float": case "object": case "resource": case "resource (closed)": case "unknown type":
                        return false; 
                    break;
                case "NULL":
                        return true;
                    break;
                case "string":
                    return
                        $val === '' || strlen(trim($val)) == 0
                            ? true
                            : false;
                    break;
                case "array":
                    $outcome = [];
                    foreach($val as $v) {
                        self::empty($v, true)
                            ? $outcome[] = 1
                            : $outcome[] = 0;
                        if($outcome[array_key_last($outcome)] == 0) break;
                    }
                    $outcome = array_unique($outcome);
                    return !in_array(0, $outcome);
            };
        }
    }

    /**
     * Encodes email address to entities.
     *
     * @param string $email Email address.
     * @return string|null
     */
    static function EncodeEmail(?string $email) {
        $output = null;

        if(empty($email))
            return $output;

        for ($i = 0; $i < strlen($email); $i++) { 
            $output .= '&#'.ord($email[$i]).';'; 
        }

        return $output;
    }

    /**
     * Filename suggestion if path already used.
     *
     * @todo check if file exists
     * 
     * @param string $path Path to check.
     * @param string $suggestType Can be `'timestamp'` or `'iterator'`.
     * @param boolean $returnPath If `TRUE` returns entire path to file, if `FALSE` only the filename. `FALSE` by default.
     * @return string|false Suggested filename or path to it, otherwise `FALSE`.
     */
    static function file_exists_suggest(string $path, string $suggestType = 'timestamp', bool $returnPath = false) {
        if(file_exists($path)) {
            $info = pathinfo($path);
            switch($suggestType) {
                case "iterator":
                    $foundNewName = false;
                    for($i=0; !$foundNewName; $i++) {
                        $foundNewName =
                            file_exists($info['dirname'] . "/" . $info['filename'] . "-" . $i . "." . $info['extension'])
                                ? false
                                : true;
                    }
                    $suggestion = "-" . $i;
                    break;
                case "timestamp":
                case null:
                default:
                    $mtime = filemtime($path);
                    if(!file_exists($info['dirname'] . "/" . $info['filename'] . "_" . $mtime . "." . $info['extension'])) {
                        $suggestion = "_" . $mtime;
                    } else {
                        $foundNewName = false;
                        for($i=0; !$foundNewName; $i++) {
                            $foundNewName =
                                file_exists($info['dirname'] . "/" . $info['filename'] . "_" . $mtime . "-" . $i . "." . $info['extension'])
                                    ? false
                                    : true;
                        }
                        $suggestion = "_" . $mtime . "-" . $i;
                    }
                    break;

            }

            $suggestedFile = $info['filename'] . $suggestion . "." . $info['extension'];
            $suggestedPath = $info['dirname'] . "/" . $suggestedFile;
            
            return 
                $returnPath
                    ? $suggestedPath
                    : $suggestedFile;
        }
        return false;
    }

    /**
     * Returns directories from given path.
     *
     * @param mixed $path Path.
     * @param boolean $fullPaths If `TRUE` returns entire path to resource. `FALSE` by default, returning only directory names.
     * @return array
     */
    static function GetDirectoriesFromPath($path, bool $fullPaths = false) : array {
        $contents = self::scandir_clean($path, $fullPaths);

        foreach($contents as $k => $v) {
            if(!$fullPaths) {
                $v = $path . "/" . $v;
            }
            if(!is_dir($v) || is_file($v)) {
                unset($contents[$k]);
                continue;
            }
        }

        return array_values($contents);
    }

    /**
     * Returns only filenames from given path.
     *
     * @uses Utilities::scandir_clean() Name
     * 
     * @param string $path Path.
     * @param boolean $fullPaths Return only filenames or entire paths. By default FALSE.
     * @param boolean $restrictDots Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path.
     * @return array If path doesn't exist, returns empty array.
     */
    static function GetFilesFromPath(string $path, bool $fullPaths = false, bool $restrictDots = true) : array {
        $path = realpath(self::trim_path($path, $restrictDots));
        if($path === false)
            return [];

        $contents = self::scandir_clean($path, $fullPaths);

        foreach($contents as $k => $v) {
            if(!$fullPaths) {
                $v = $path . "/" . $v;
            }
            if(!is_file($v) || is_dir($v)) {
                unset($contents[$k]);
            }
        }

        return $contents;
    }

    /**
     * Return all files from given path recursively.
     *
     * @param mixed $path Path.
     * @param boolean $fullPaths Return only filenames or entire paths. By default FALSE.
     * @param boolean $restrictDots Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path.
     * @return array If path doesn't exist, returns empty array.
     */
    static function GetFilesFromPathRecursive($path, bool $fullPaths = false, bool $restrictDots = true) : array {
        $path = realpath(self::trim_path($path, $restrictDots));
        if($path === false)
            return [];

        $files = self::GetFilesFromPath($path, $fullPaths);
        $directories = self::GetDirectoriesFromPath($path, $fullPaths);
        
        if(!empty($directories)) {
            foreach($directories as $directory) {
                $files = array_merge($files, self::GetFilesFromPathRecursive($directory, $fullPaths, $restrictDots));
            }
        }

        return $files;
    }

    /**
     * Return full host address.
     *
     * @return string Formatted string [http|https]://domain:port
     */
    static function Host() : string {
        return $_ENV['HOST_PROTOCOL'] . "://"
		     . $_ENV['HOST_DOMAIN']
             . (!is_null($_ENV['HOST_PORT']) && strlen(trim($_ENV['HOST_PORT'])) > 0
                    ? ":" . $_ENV['HOST_PORT'] . "/"
                    : "/"
                );
    }

    /**
     * Checks if passed variable is of a specific class.
     *
     * @param object|mixed $obj Variable to test.
     * @param string $class Class name.
     * @return boolean If not object or not an object of specified class, returns `FALSE`. Otherwise `TRUE`.
     */
    static function is_object_of_class($obj, string $class) : bool {
        return 
            is_object($obj) && get_class($obj) == $class
                ? true
                : false;
    }

    /**
     * Returns some epxected MIME-types by file extension.
     *
     * @param string $ext Extension.
     * @return string
     */
    static function MimeByExtension(string $ext) : string {
        $ext = trim($ext, "\t\n\r\0\x0B .");

        $mime = "application/x-empty";
        
        switch(strtolower($ext)) {
            case "htm": case "html":    $mime = "text/html";  break;
            case "pdf":                 $mime = "application/pdf"; break;
            case "json":                $mime = "application/json"; break;
            case "jpg": case "jpeg":    $mime = "image/jpeg"; break;
            case "png":                 $mime = "image/png";  break;
            case "webp":                $mime = "image/webp"; break;
            case "bmp":                 $mime = "image/bmp";  break;
            case "gif":                 $mime = "image/gif";  break;
            case "svg":                 $mime = "image/svg+xml"; break;
            case "tif": case "tiff":    $mime = "image/tiff"; break;
            case "vcf": case "vcard":   $mime = "text/vcard"; break;
            default:                    $mime = "text/plain"; break;
        }
        return $mime;
    }

    /**
     * Checks if path is not outside of document root, as specified in *$_SERVER['DOCUMENT_ROOT']*.
     *
     * @param string $path Path to check.
     * @param boolean $restrictDots Flag. If `TRUE` removes traversal and relative dots (`..`, `.`) from input path.
     * @return boolean
     */
    static function not_outside_document_root(string $path = "", bool $restrictDots = true) : bool {
        $path     = self::trim_path($path, $restrictDots);
        $path     = trim(preg_replace('/[\\/]+/', "/", $path));
        $realpath = realpath($path);

        return
            in_array($path, ["/", "\\"])
                ? false
                : (
                    strpos($realpath, $_SERVER['DOCUMENT_ROOT']) !== 0
                        ? false
                        : true
                );
    }

    /**
     * Checks if class name is proper to be used with PHP.
     *
     * @param string $name Class name to check.
     * @return boolean
     */
    static function proper_class_name(string $name) : bool {
        $o = preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $name);
        return $o == 1
            ? true
            : false;
    }

    /**
     * Check if name can be used as a variable/property name.
     *
     * @param string $name Property name to check.
     * @return boolean
     */
    static function proper_property_name($name) : bool {
        if(is_string($name)) {
            return preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $name);
        }
        return false;
    }

    /**
     * Removes files and directories recursively.
     *
     * @param mixed $path Path.
     * @param string[] $blacklist Array with paths that should be blacklisted and not used with function (e.g. system root). Very important to set up if `limitRoot` parameter is set to FALSE.
     * @param boolean $limitRoot Flag. If TRUE will check if the script is in scope of document root.
     * @param boolean $restrictDots Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path.
     * @return void
     */
    static function rmdir_files_recursive($path, array $blacklist = [], bool $limitRoot = true, bool $restrictDots = true) {
        // 1. standarize path
        $path = realpath(self::trim_path($path, $restrictDots));

        // 2. check if outside root (if flag is bool true)
        $limitRoot
            ? ( self::not_outside_document_root($path, $restrictDots)
                    ? null
                    : $path = false )
            : null;

        // 3. standarize blacklisted paths
        foreach($blacklist as $key => $item) {
            $itemRealpath = realpath(self::trim_path($item, $restrictDots));
            if($itemRealpath === false) {
                unset($blacklist[$key]);
            } else {
                $blacklist[$key] = $itemRealpath;
            }
        }
        $blacklist = array_values($blacklist);

        // 4. check if standarized path is valid (not false itself, not in blacklisted array)
        if($path !== false && !in_array($path, $blacklist)) {
            $files = self::scandir_clean_files($path, true);
            $dirs  = self::scandir_clean_dirs($path, true);

            // 4a. for each file, check if not blacklisted - if not, remove
            foreach($files as $file) {
                if(!in_array(realpath($file), $blacklist))
                    unlink($file);
            }
            // 4b. for each directory, check if not blacklisted - if not, remove
            foreach($dirs as $dir) { 
                if(!in_array(realpath($dir), $blacklist))
                    rmdir($dir);
            }
            rmdir($path);
        }
    }

    /**
     * Strips string from characters considered not safe.
     * 
     * Replaces "..", "/", "\\", ":", "*", "?", '"', "<", ">", "|", ";" with "-".
     *
     * @param mixed $text Input text.
     * @return string
     */
    static function safechars($text) : string {
        return str_replace([ "..", "/", "\\", ":", "*", "?", '"', "<", ">", "|", ";" ], "-", $text);
    }

    /**
     * Works as `scandir()` but removes relative and parent dots pointers.
     *
     * @param string $path Path to scan.
     * @param boolean $fullPaths Return only filenames or entire paths. By default FALSE.
     * @param boolean $restrictDots Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path.
     * @return array Array of paths.
     */
    static function scandir_clean(string $path, bool $fullPaths = false, bool $restrictDots = true) : array {
        $path = realpath(self::trim_path($path, $restrictDots));

        if($path === false) 
            return [];

        $files =
            is_dir($path)
                ? array_filter(scandir($path), function($v) { return !($v == "." || $v == ".."); })
                : [];
        
        if($fullPaths) {
            foreach($files as $k => $v) {
                $files[$k] = $path . DIRECTORY_SEPARATOR . $v;
            }
        }

        return array_values($files);
    }

    /**
     * @see \tei187\Utilities::GetDirectoriesFromPath() Alias.
     */
    static function scandir_clean_dirs($path, bool $fullPaths = false) : array {
        return self::GetDirectoriesFromPath($path, $fullPaths);
    }

    /**
     * @see \tei187\Utilities::GetFilesFromPath() Alias.
     */
    static function scandir_clean_files($path, bool $fullPaths = false, bool $restrictDots = true) : array {
        return self::GetFilesFromPath($path, $fullPaths, $restrictDots);
    }

    /**
     * Trims and removes errorenous path parts, forbids relative directory tree traversal.
     *
     * @param string $path Input path.
     * @param boolean $restrictDots Flag. If TRUE removes traversal and relative dots (`..`, `.`) from input path.
     * @return mixed|string
     */
    static function trim_path(string $path, bool $restrictDots = true) {
        $path = trim($path, " \t\n\r\x0B");
        
        if($restrictDots) {
            $path = trim($path, ".");
            $path = str_replace(['../', '..\\', '..'], "", $path);
        }

        return $path;
    }

    /**
     * Validates email address.
     *
     * @param string $email Email address.
     * @return string|false
     */
    static function ValidateEmail(string $email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
