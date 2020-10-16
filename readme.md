# Summary
Learn [codeception](https://codeception.com/) framework. This set contain 2 tests in 2 suits:
1. acceptance suite: using browser check is preview available on youtube
2. seo suite: parameterised test to check some static seo data

# Run
from project root call

1. run all tests:
```shell script
/path/to/installed/codeception/codecept run
```
2. run only one suite:
```shell script
/path/to/installed/codeception/codecept run seo
```
3. run only one class from a suite:
```shell script
/path/to/installed/codeception/codecept run acceptance TubeCest
```
4. run only one test:
```shell script
/path/to/installed/codeception/codecept run acceptance TubeCest:videoShouldHavePreview
```

# Requirements
selenium server with web driver should be started 
```shell script
java -Dwebdriver.chrome.driver=./chromedriver -jar ./selenium-server-standalone-3.141.59.jar
```

# Details
## acceptance
1. test is using chromedriver
2. steps
    1. open https://youtube.com, url and driver type set in acceptance.suite.yml
    2. look for 'nice job'
    3. hover mouse over second video ('Latest from NiceJob' block)
    4. wait for 'play' symbol, it appears only after preview.
    
## seo
1. parameterised test
2. parameters should be provided via tests/resources/seo/seoDataSet.csv
3. steps
    1. open http://localhost/newApp: url and cookie 'test'='set' are set in seo.suite.yml, driver also set in this yml, i'm using PhpBrowser (something like curl as far as i understand)
    2. go to seoDataSet.csv\[i][url], here and on 'i' is a number of string
    3. build actual data array(title text, header/meta[name="description"] content);
    4. build expected data array(seoDataSet.csv\[i][title], seoDataSet.csv\[i][metaDescription])
    5. assert this arrays are equal
4. mock i'm using to check seo test, newApp/index.php:
```injectablephp
<head>
<?php
	$isTestCookieSet = isset($_COOKIE['test']);
	$isExpectedTestCookie = $isTestCookieSet && 'seo' == $_COOKIE["test"];
	if ($isExpectedTestCookie) {
		echo "<title>My fancy title</title>";
		echo "<meta name=\"description\" content=\"Free Web tutorials\">";
	} else {
		echo "<title>Default title</title>";
	}
?>
</head>
<body>
<?php
if ($isExpectedTestCookie) {
	echo "<div>'test' cookie is set<div>";
} elseif ($isTestCookieSet) {
	echo "<div>'test' cookie value is: " . $_COOKIE["test"] . "<div>";
} else {
	echo "<div>cookie is not set<div>";
}
```