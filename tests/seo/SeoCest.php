<?php

use Codeception\Example;

class SeoCest {
    /**
     * @dataProvider associativeProvider
     * @param SeoTester $i
     * @param Example $example
     */
    public function csv(SeoTester $i, Example $example) {
        $i->amOnPage($example['url']);
        $actualSeoData = array(
            'title'=>$i->grabTextFrom('//title'),
            'metaDescription'=>$i->grabAttributeFrom('//meta[@name=\'description\']', 'content')
        );
        $expected = array('title'=>$example['title'], 'metaDescription'=>$example['metaDescription']);
        $i->assertEqualsCanonicalizing($expected, $actualSeoData, $example['url']);
    }

    private function associativeProvider() {
        $rows = array_map('str_getcsv', file('./tests/resources/seo/seoDataSet.csv'));
        $header = array_shift($rows);
        $csv = array();
        foreach($rows as $row) {
            $csv[] = array_combine($header, $row);
        }
        return $csv;
    }
}
