<?php

use Codeception\Example;

class SeoCest {
    /**
     * @dataProvider associativeProvider
     * @param SeoTester $i
     * @param Example $example
     */
    public function csv(SeoTester $i, Example $example) {
        $expected = array(
            'url'=>$example['url'], 'header'=>$example['header'], 'title'=>$example['title'],
            'meta'=>$example['meta description']
        );
        $actual = array(
            'url'=>'/myPage.php', 'header'=>'some header text', 'title'=>'some title',
            'meta description'=>'some meta description'
        );
        $i->assertEqualsCanonicalizing($actual, $expected);
    }

    public function associativeProvider() {
        $rows   = array_map('str_getcsv', file('./tests/resources/seo/seoDataSet.csv'));
        $header = array_shift($rows);
        $csv    = array();
        foreach($rows as $row) {
            $csv[] = array_combine($header, $row);
        }
        return $csv;
    }
}
